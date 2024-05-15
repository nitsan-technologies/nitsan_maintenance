<?php

namespace Nitsan\NitsanMaintenance\Controller;

use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use Psr\Http\Message\ServerRequestInterface;
use TYPO3\CMS\Backend\Template\ModuleTemplate;
use TYPO3\CMS\Core\Resource\DuplicationBehavior;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;
use TYPO3\CMS\Core\Type\ContextualFeedbackSeverity;
use TYPO3\CMS\Backend\Template\ModuleTemplateFactory;
use Nitsan\NitsanMaintenance\Domain\Model\Maintenance;
use Nitsan\NitsanMaintenance\Domain\Repository\MaintenanceRepository;
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
    /**
     * maintenanceRepository
     *
     * @var MaintenanceRepository
     */
    protected MaintenanceRepository $maintenanceRepository;

    public function __construct(
        protected readonly ModuleTemplateFactory $moduleTemplateFactory,
        MaintenanceRepository $maintenanceRepository,
    ) {
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

    protected function initializeCreateAction(): void
    {
        if (isset($this->arguments['newMaintenance'])) {
            $this->arguments['newMaintenance']->getPropertyMappingConfiguration()->forProperty('endtime')->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter', \TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT, 'Y-m-d H:i:s');

            $this->setTypeConverterConfigurationForImageUpload('newMaintenance');
        }
    }

    /**
     * action create
     *
     * @param Maintenance $newMaintenance
     * @return ResponseInterface
     */
    public function createAction(Maintenance $newMaintenance): ResponseInterface
    {
        $newMaintenance->setEndtime(strtotime($newMaintenance->getEndtime()));
        $this->processImageUpload($newMaintenance, 'image', 'image-delete');

        if ($this->maintenanceRepository->findAll()->count() > 0) {
            $this->maintenanceRepository->update($newMaintenance);
        } else {
            $this->maintenanceRepository->add($newMaintenance);
        }
        $this->processFileUpload($newMaintenance, 'image');

        $updateMassage = LocalizationUtility::translate('LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang.xlf:updateMassage', 'nitsan_maintenance');
        $this->addFlashMessage($updateMassage, '', ContextualFeedbackSeverity::OK);

        $this->view->assign('maintenances', $newMaintenance);
        return $this->redirect('list');
    }

    /**
     *
     */
    protected function setTypeConverterConfigurationForImageUpload($argumentName): void
    {
        $uploadConfiguration = [
            UploadedFileReferenceConverter::CONFIGURATION_ALLOWED_FILE_EXTENSIONS => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
            UploadedFileReferenceConverter::CONFIGURATION_UPLOAD_FOLDER => '1:/user_upload/'
        ];

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

    private function processImageUpload(Maintenance $newMaintenance, string $fieldName, string $deleteFlag): void
    {
        $images = $newMaintenance->getImage();
        if (count($images) > 0 && ($_FILES['newMaintenance']['name'][$fieldName] !== '' || $this->request->getArguments()[$deleteFlag] === '1')) {
            foreach ($images as $img) {
                $newMaintenance->removeImage($img);
            }
        }
    }

    private function processFileUpload(Maintenance $newMaintenance, string $fieldName): void
    {
        if ($_FILES['newMaintenance']['name'][$fieldName] !== '') {
            $fileData = [];
            $namespace = key($_FILES);
            $targetFalDirectory = '1:/user_upload/';

            // Register every upload field from the form:
            $this->registerUploadField($fileData, $namespace, $fieldName, $targetFalDirectory);

            // Initializing:
            /** @var ExtendedFileUtility $fileProcessor */
            $fileProcessor = GeneralUtility::makeInstance('TYPO3\CMS\Core\Utility\File\ExtendedFileUtility');
            $fileProcessor->setActionPermissions(['addFile' => true]);
            $fileProcessor->setExistingFilesConflictMode(DuplicationBehavior::REPLACE);
            $fileProcessor->setExistingFilesConflictMode(DuplicationBehavior::RENAME);
            // Actual upload
            // @extensionScannerIgnoreLine
            $fileProcessor->start($fileData);
            $fileImage = $fileProcessor->processData();

            $fileImage['upload'] = $fileImage['upload'] ?? '';
            if ($fileImage['upload']) {
                foreach ($fileImage['upload'] as $files) {
                    /** @var \TYPO3\CMS\Core\Resource\File $file */
                    foreach ($files as $file) {
                        $this->maintenanceRepository->updateSysFileReferenceRecord($file->getUid(), $newMaintenance->getUid(), $fieldName, $newMaintenance->getPid());
                    }
                }
            }
        }
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
    protected function registerUploadField(array &$data, $namespace, $fieldName, $targetDirectory = '1:/_temp_/'): void
    {
        if (!isset($data['upload'])) {
            $data['upload'] = array();
        }
        $counter = count($data['upload']) + 1;

        $keys = array_keys($_FILES[$namespace]);
        foreach ($keys as $key) {
            $_FILES['upload_' . $counter][$key] = $_FILES[$namespace][$key][$fieldName];
        }
        $data['upload'][$counter] = array(
            'data' => $counter,
            'target' => $targetDirectory,
        );
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
