<?php
namespace Nitsan\NitsanMaintenance\Domain\Repository;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;

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
 * The repository for Maintenances
 */
class MaintenanceRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    protected $defaultOrderings = ['crdate' => QueryInterface::ORDER_DESCENDING];

        /**
     * @param $uid_local
     * @param $uid_foreign
     * @param $field_name
     * @param $pid
     * @return void
     */
    public function updateSysFileReferenceRecord($uid_local, $uid_foreign, $field_name,  $pid): void
    {
        $tableConnectionCategoryMM = GeneralUtility::makeInstance(ConnectionPool::class)->getConnectionForTable('sys_file_reference');
        $sysFileReferenceData = [
            'uid_local' => $uid_local,
            'uid_foreign' => $uid_foreign,
            'tablenames' => 'tx_nitsanmaintenance_domain_model_maintenance',
            'fieldname' => $field_name,
            'sorting_foreign' => 1,
            'pid' => $pid,
        ];

        $data = $sysFileReferenceData;

        $tableConnectionCategoryMM->bulkInsert(
            'sys_file_reference',
            [$data],
            array_keys($data)
        );
    }

}
