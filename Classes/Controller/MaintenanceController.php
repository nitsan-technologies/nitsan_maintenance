<?php
namespace Nitsan\NitsanMaintenance\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use TYPO3\CMS\Backend\Template\ModuleTemplate;
use TYPO3\CMS\Backend\Template\ModuleTemplateFactory;
use TYPO3\CMS\Extbase\Property\PropertyMappingConfiguration;
use Nitsan\NitsanMaintenance\Property\TypeConverter\UploadedFileReferenceConverter;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2016
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * MaintenanceController
 */
class MaintenanceController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    public function __construct(
        protected readonly ModuleTemplateFactory $moduleTemplateFactory
    ) {
    }

    /**
     * maintenanceRepository
     *
     * @var \Nitsan\NitsanMaintenance\Domain\Repository\MaintenanceRepository
     */
    protected $maintenanceRepository = null;

    /**
     * @param \Nitsan\NitsanMaintenance\Domain\Repository\MaintenanceRepository $maintenanceRepository
     */
    public function injectMaintenanceRepository(\Nitsan\NitsanMaintenance\Domain\Repository\MaintenanceRepository $maintenanceRepository)
    {
        $this->maintenanceRepository = $maintenanceRepository;
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
        $view->assign('Maintenance10', 1);
        return $view->renderResponse();
    }

    protected function initializeCreateAction()
    {
        if (isset($this->arguments['newMaintenance'])) {
            $this->arguments['newMaintenance']->getPropertyMappingConfiguration()->forProperty('endtime')->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter', \TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT, 'Y-m-d H:i:s');

            $this->setTypeConverterConfigurationForImageUpload('newMaintenance');
        }
    }

    /**
     * action create
     *
     * @param \Nitsan\NitsanMaintenance\Domain\Model\Maintenance $newMaintenance
     * @return ResponseInterface
     */
    public function createAction(\Nitsan\NitsanMaintenance\Domain\Model\Maintenance $newMaintenance): ResponseInterface
    {
        $newMaintenance->setEndtime(strtotime($newMaintenance->getEndtime()));
        $image = $newMaintenance->getImage();
        if (is_null($image)) {
            if($newMaintenance->getImage()[0]){
                unset($newMaintenance->getImage()[0]);
            }
        }
        if ($maintenances = $this->maintenanceRepository->findAll()->count() > 0) {
            $this->maintenanceRepository->update($newMaintenance);
        } else {
            $this->maintenanceRepository->add($newMaintenance);
        }
        $this->addFlashMessage('Settings were updated', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->view->assign('maintenances', $newMaintenance);
        return $this->redirect('list');
    }

    /**
     *
     */
    protected function setTypeConverterConfigurationForImageUpload($argumentName)
    {
        $uploadConfiguration = [
            UploadedFileReferenceConverter::CONFIGURATION_ALLOWED_FILE_EXTENSIONS => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
            UploadedFileReferenceConverter::CONFIGURATION_UPLOAD_FOLDER => '1:/user_upload/'
        ];

        /** @var PropertyMappingConfiguration $newExampleConfiguration */
        $newExampleConfiguration = $this->arguments[$argumentName]->getPropertyMappingConfiguration();

        $newExampleConfiguration->forProperty('image.0')
            ->setTypeConverterOptions(
                'Nitsan\\NitsanMaintenance\\Property\\TypeConverter\\UploadedFileReferenceConverter',
                $uploadConfiguration
            );
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
        $maintenanceSettings = $this->maintenanceRepository->findAll();
        $maintenanceSettings[0]->setEndtime(date('Y-m-d H:i:s', $maintenanceSettings[0]->getEndtime()));
        $this->view->assign('Maintenance10', 1);
        $this->view->assign('settings', $maintenanceSettings[0]);
        return $this->htmlResponse();
    }

    /**
     * Generates the action menu
     */
    protected function initializeModuleTemplate(
        ServerRequestInterface $request
    ): ModuleTemplate {
        return $this->moduleTemplateFactory->create($request);
    }
}
