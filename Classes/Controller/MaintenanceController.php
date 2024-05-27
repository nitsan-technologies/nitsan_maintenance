<?php
namespace Nitsan\NitsanMaintenance\Controller;

use Nitsan\NitsanMaintenance\Domain\Model\Maintenance;
use Nitsan\NitsanMaintenance\Domain\Repository\MaintenanceRepository;
use Nitsan\NitsanMaintenance\Property\TypeConverter\UploadedFileReferenceConverter;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Property\PropertyMappingConfiguration;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

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
class MaintenanceController extends ActionController
{

    /**
     * maintenanceRepository
     *
     * @var MaintenanceRepository
     */
    protected $maintenanceRepository = null;

    /**
     * @param MaintenanceRepository $maintenanceRepository
     */
    public function injectMaintenanceRepository(MaintenanceRepository $maintenanceRepository)
    {
        $this->maintenanceRepository = $maintenanceRepository;
    }

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $querySetting = $this->maintenanceRepository->createQuery()->getQuerySettings();
        $querySetting->setRespectStoragePage(false);
        $this->maintenanceRepository->setDefaultQuerySettings($querySetting);
        $maintenances = $this->maintenanceRepository->findMaintenance();
        $this->view->assign('newMaintenance', $maintenances[0]);
        //@extensionScannerIgnoreLine
        if (version_compare(TYPO3_branch, '8.0', '<')) {
            $this->view->assign('Maintenance7', 1);
        }
        if (version_compare(TYPO3_branch, '10.0', '>=')) {
            $this->view->assign('Maintenance10', 1);
        }
    }

    protected function initializeCreateAction()
    {
        if (isset($this->arguments['newMaintenance'])) {
            $this->arguments['newMaintenance']
                ->getPropertyMappingConfiguration()
                ->forProperty('endtime')
                ->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter',
                    \TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT, 'Y-m-d H:i:s'
                );

            $this->setTypeConverterConfigurationForImageUpload('newMaintenance');
        }
    }

    /**
     * action create
     *
     * @param Maintenance $newMaintenance
     * @return void
     */
    public function createAction(Maintenance $newMaintenance)
    {
        if(strtotime($newMaintenance->getEndtime()) < time()){
            $this->addFlashMessage(
                LocalizationUtility::translate('error.enddate','nitsan_maintenance'),
                LocalizationUtility::translate('error.title','nitsan_maintenance'),
                \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR
            );
        } else {
            $newMaintenance->setEndtime(strtotime($newMaintenance->getEndtime()));
            $image = $newMaintenance->getImage();
            if (is_null($image)) {
                if ($newMaintenance->getImage()[0]) {
                    unset($newMaintenance->getImage()[0]);
                }
            }
            if ($newMaintenance->getUid() !== null) {
                $this->maintenanceRepository->update($newMaintenance);
            } else {
                $this->maintenanceRepository->add($newMaintenance);
            }
            $this->addFlashMessage('Settings were updated', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        }
        $this->view->assign('maintenances', $newMaintenance);
        $this->redirect('list');
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
     * @return void
     */
    public function pageAction()
    {
        $querySetting = $this->maintenanceRepository->createQuery()->getQuerySettings();
        $querySetting->setRespectStoragePage(false);
        $this->maintenanceRepository->setDefaultQuerySettings($querySetting);
        $maintenanceSettings = $this->maintenanceRepository->findMaintenance();
        $maintenanceSettings[0]->setEndtime(date('Y-m-d H:i:s', $maintenanceSettings[0]->getEndtime()));
        if (version_compare(TYPO3_branch, '10.0', '>=')) {
            $this->view->assign('Maintenance10', 1);
        }
        $this->view->assign('settings', $maintenanceSettings[0]);
    }
}
