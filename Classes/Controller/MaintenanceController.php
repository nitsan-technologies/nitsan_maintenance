<?php
namespace Nitsan\NitsanMaintenance\Controller;

use TYPO3\CMS\Core\Mail\MailMessage;
use TYPO3\CMS\Core\Page\PageRenderer;
use TYPO3\CMS\Core\Resource\Exception;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Fluid\View\StandaloneView;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use Psr\Http\Message\ServerRequestInterface;
use TYPO3\CMS\Backend\Template\ModuleTemplate;
use TYPO3\CMS\Core\Utility\VersionNumberUtility;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;
use TYPO3\CMS\Core\Type\ContextualFeedbackSeverity;
use TYPO3\CMS\Core\Utility\File\ExtendedFileUtility;
use Nitsan\NitsanMaintenance\Domain\Model\Subscriber;
use TYPO3\CMS\Backend\Template\ModuleTemplateFactory;
use Nitsan\NitsanMaintenance\Domain\Model\Maintenance;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;
use TYPO3\CMS\Extbase\Persistence\Exception\UnknownObjectException;
use Nitsan\NitsanMaintenance\Domain\Repository\SubscriberRepository;
use Nitsan\NitsanMaintenance\Domain\Repository\MaintenanceRepository;
use TYPO3\CMS\Extbase\Persistence\Exception\IllegalObjectTypeException;

/**
 * MaintenanceController
 */
class MaintenanceController extends ActionController {


    /**
     * @param ModuleTemplateFactory $moduleTemplateFactory
     * @param MaintenanceRepository $maintenanceRepository
     * @param SubscriberRepository $subscriberRepository
     */
    public function __construct(
		protected readonly ModuleTemplateFactory $moduleTemplateFactory,
        protected MaintenanceRepository $maintenanceRepository,
        protected SubscriberRepository $subscriberRepository,
        protected PersistenceManager $persistenceManager
	) {
	}

	/**
	 * action list
	 *
	 * @return ResponseInterface
	 */
	public function listAction(): ResponseInterface
	{
		$view = $this->initializeModuleTemplate($this->request);
		$maintenances = $this->maintenanceRepository->findAll();
		$view->assign('newMaintenance', $maintenances[0]);
        return $view->renderResponse("Maintenance/List");
	}

    public function createAction(Maintenance $newMaintenance = null): ResponseInterface
    {
        if (!empty($newMaintenance)) {
            if(strtotime($newMaintenance->getEndtime()) < strtotime(date('Y-m-d H:i:s'))){
                $this->addFlashMessage(
                    LocalizationUtility::translate('error.enddate','nitsan_maintenance'),
                    LocalizationUtility::translate('error.title','nitsan_maintenance'),
                    ContextualFeedbackSeverity::ERROR
                );

            }else{

                $newMaintenance->setEndtime(strtotime($newMaintenance->getEndtime() . ' ' . date_default_timezone_get()));
                $this->processImageRemove($newMaintenance, 'logo_image', 'logo-delete');
                $this->processImageRemove($newMaintenance, 'image', 'bg-delete');

                $uid = $newMaintenance->getUid();
                if ($uid !== null && $this->maintenanceRepository->findByUid($uid)) {
                    $this->maintenanceRepository->update($newMaintenance);
                } else {
                    $this->maintenanceRepository->add($newMaintenance);
                }
                $this->persistenceManager->persistAll();
                $this->processFileUpload($newMaintenance, 'logo_image');
                $this->processFileUpload($newMaintenance, 'image');
        
                $updateMassage = LocalizationUtility::translate('updateMassage', 'nitsan_maintenance');
                $this->addFlashMessage($updateMassage);
            
            }
        }
        $this->view->assign('maintenances', $newMaintenance);
        return $this->redirect('list');
    }

/**
 * @param Maintenance $newMaintenance
 * @param string $fieldName
 * @param string $deleteFlag
 * @return void
 */
private function processImageRemove(Maintenance $newMaintenance, string $fieldName, string $deleteFlag): void
{
    // Get the correct images to process
    $images = ($fieldName === 'logo_image') ? $newMaintenance->getLogoImage() : $newMaintenance->getImage();

    // Check if files were uploaded or deleteFlag is triggered
    if (
        count($images) > 0 &&
        (
            (!empty($_FILES['image']['name']) && $fieldName === 'image') || 
            (!empty($_FILES['logo_image']['name']) && $fieldName === 'logo_image') ||
            $this->request->getArguments()[$deleteFlag] === '1'
        )
    ) {
        // Remove the corresponding images
        foreach ($images as $img) {
            if ($fieldName === 'logo_image') {
                $newMaintenance->removeLogoImage($img);
            } else {
                $newMaintenance->removeImage($img);
            }
        }
    }
}


    /**
     * @param Maintenance $newMaintenance
     * @param string $fieldName
     * @return void
     * @throws Exception
     */
    private function processFileUpload(Maintenance $newMaintenance, string $fieldName): void
    {
        if (!empty($_FILES[$fieldName]['name'])) {
            $fileData = [];
            $targetFalDirectory = '1:/user_upload/';
    
            // Register the upload field from the form:
            $this->registerUploadField($fileData, $fieldName, $targetFalDirectory);
    
            /** @var ExtendedFileUtility $fileProcessor */
            $fileProcessor = GeneralUtility::makeInstance(ExtendedFileUtility::class);
            $fileProcessor->setActionPermissions(['addFile' => true]);
    
            $typo3VersionArray = VersionNumberUtility::convertVersionStringToArray(
                VersionNumberUtility::getCurrentTypo3Version()
            );
    
            if (version_compare((string)$typo3VersionArray['version_main'], '12', '=')) {
                $fileProcessor->setExistingFilesConflictMode(\TYPO3\CMS\Core\Resource\DuplicationBehavior::REPLACE);
            } else {
                $fileProcessor->setExistingFilesConflictMode(\TYPO3\CMS\Core\Resource\Enum\DuplicationBehavior::tryFrom('replace'));
            }
    
            // Perform the actual upload
            $fileProcessor->start($fileData);
            $fileImages = $fileProcessor->processData();
    
            if (!empty($fileImages['upload'])) {
                foreach ($fileImages['upload'] as $files) {
                    /** @var \TYPO3\CMS\Core\Resource\File $file */
                    foreach ($files as $file) {
                        $this->maintenanceRepository->updateSysFileReferenceRecord(
                            $file->getUid(),
                            $newMaintenance->getUid(),
                            $fieldName,
                            $newMaintenance->getPid()
                        );
                    }
                }
            }
        }
    }

	/**
	 * action page
	 *
	 * @return ResponseInterface
	 */
	public function pageAction(): ResponseInterface
	 {
        $querySetting = $this->maintenanceRepository->createQuery()->getQuerySettings();
        $querySetting->setRespectStoragePage(false);
        $this->maintenanceRepository->setDefaultQuerySettings($querySetting);
        $configurationManager = GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Configuration\\ConfigurationManagerInterface');
        $config = $configurationManager->getConfiguration(ConfigurationManagerInterface::CONFIGURATION_TYPE_FULL_TYPOSCRIPT);
        $storagePid = $config['module.']['tx_nitsanmaintenance.']['persistence.']['storagePid'] ?? 0;
		$maintenanceSettings = $this->maintenanceRepository->findByPid($storagePid)[0];
        $this->view->assign('Maintenance10', 1);
		if($maintenanceSettings){
            $css = '
                .footer-social-link{
                    color: #fff !important;
                }
                .description-text {
                    margin-top: 20px;
                }
			';
            if($maintenanceSettings->getfontcolor() != ''){
                $css .= '
                    .heading h1, .heading h2, div.description-text p, .copyright p, .odometer-digit, .item-title{
                        color: '.$maintenanceSettings->getfontcolor().' !important;
                    }';
            }

			$pageRenderer = GeneralUtility::makeInstance(PageRenderer::class);
			$pageRenderer->addCssInlineBlock('beFixed',$css);
            $pageRenderer->addCssInlineBlock('customcss',$maintenanceSettings->getcustomcss());

        }
		$this->view->assign('settings', $maintenanceSettings);

		

		if(isset($this->request->getQueryParams()['tx_nitsanmaintenance_mode']['key'])) {
            if($this->request->getQueryParams()['tx_nitsanmaintenance_mode']['key'] == 'error'){

                $errorMassage = LocalizationUtility::translate('errorMassage', 'nitsan_maintenance');
                $errorMassageTitle = LocalizationUtility::translate('errorMassageTitle', 'nitsan_maintenance');
                $this->addFlashMessage(
                    $errorMassage,
                    $errorMassageTitle,
                    ContextualFeedbackSeverity::ERROR
                );

            }elseif($this->request->getQueryParams()['tx_nitsanmaintenance_mode']['key'] == 'errorEmail'){

                $errorMassage = LocalizationUtility::translate('subscription.error.email.message', 'nitsan_maintenance');
                $errorMassageTitle = LocalizationUtility::translate('subscription.error.invalidemail', 'nitsan_maintenance');
                $this->addFlashMessage(
                    $errorMassage,
                    $errorMassageTitle,
                    ContextualFeedbackSeverity::ERROR
                );

            }else{
                $thanksMassage = LocalizationUtility::translate('thanksMassage', 'nitsan_maintenance');
		        $successfullMassage = LocalizationUtility::translate('successfullMassage', 'nitsan_maintenance');
                $this->addFlashMessage(
                    $thanksMassage,
                    $successfullMassage
                );
            }
		
		}
		return $this->htmlResponse();
	}

    /**
     * action newSubscriber
     *
     * @param Subscriber|null $newSubscriber
     * @return ResponseInterface
     * @throws IllegalObjectTypeException
     */
	public function subscriberAction(Subscriber $newSubscriber = null): ResponseInterface
	{
		$subscriberMail = $newSubscriber->getSubscriberEmail();
        if(GeneralUtility::validEmail($subscriberMail)){
            $url = $this->getURL();

            $adminMail = $this->settings['adminEmail'];
            $data = [
                'subscriber_mail' => $subscriberMail,
                'siteAddress' => $url,
            ];

            if ($adminMail) {
                $this->subscriberRepository->add($newSubscriber);
                $this->sendTemplateEmail(
                    [$adminMail => LocalizationUtility::translate('email.admin','nitsan_maintenance')],
                    [$subscriberMail => LocalizationUtility::translate('email.subscription','nitsan_maintenance')],
                    LocalizationUtility::translate('email.subject','nitsan_maintenance'),
                    'AdminMail',
                    $data
                );
                return $this->redirect('page',null,null,['key'=> 'successful']);
            }else{
                return $this->redirect('page',null,null,['key'=> 'error']);
            }
        }else{
            return $this->redirect('page',null,null,['key'=> 'errorEmail']);
        }

	}

	/**
	 * @param array $recipient recipient of the email in the format array('recipient@domain.tld' => 'Recipient Name')
	 * @param array $sender sender of the email in the format array('sender@domain.tld' => 'Sender Name')
	 * @param string $subject subject of the email
	 * @param string $templateName template name (UpperCamelCase)
	 * @param array $variables variables to be passed to the Fluid view
	 */
	protected function sendTemplateEmail(
        array $recipient,
        array $sender,
        string $subject,
        string $templateName,
        array $variables = []
    ): bool
    {
		/** @var StandaloneView $emailView */
		$emailView = GeneralUtility::makeInstance(StandaloneView::class);
		$extbaseFrameworkConfiguration = $this->configurationManager->getConfiguration(ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK);
		$templateRootPath = GeneralUtility::getFileAbsFileName($extbaseFrameworkConfiguration['view']['templateRootPaths']['0']);
		$templatePathAndFilename = $templateRootPath . 'Maintenance/Email/' . $templateName . '.html';
		$emailView->setTemplatePathAndFilename($templatePathAndFilename);
		$emailView->assignMultiple($variables);
		$emailBody = $emailView->render();
		/**@var $message MailMessage */
		$message = GeneralUtility::makeInstance(MailMessage::class);
		$message->setTo($recipient)->setFrom($sender)->setSubject($subject);
		$message->html($emailBody);
		$message->send();
        return $message->isSent();
	}

    /**
     * @return string
     */
    public function getURL(): string
    {
		return sprintf(
			'%s://%s',
			isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
			$_SERVER['SERVER_NAME']
		);
	}

    /**
     * Generates the action menu
     * @param ServerRequestInterface $request
     * @return ModuleTemplate
     */
    protected function initializeModuleTemplate(
        ServerRequestInterface $request
    ): ModuleTemplate {
        return $this->moduleTemplateFactory->create($request);
    }

    /**
     * Registers an uploaded file for TYPO3 native upload handling.
     *
     * @param array &$data
     * @param string $namespace
     * @param string $fieldName
     * @param string $targetDirectory
     * @return void
     */
    protected function registerUploadField(
        array &$data,
        string $fieldName,
        string $targetDirectory = '1:/_temp_/'
    ): void {
        if (!isset($data['upload'])) {
            $data['upload'] = [];
        }
    
        $counter = count($data['upload']) + 1;
        if (isset($_FILES[$fieldName]) && !empty($_FILES[$fieldName]['name'])) {
            foreach ($_FILES[$fieldName] as $key => $value) {
                $_FILES['upload_' . $counter][$key] = $value;
            }
            $data['upload'][$counter] = [
                'data' => $counter,
                'target' => $targetDirectory,
            ];
        }
    }

}
