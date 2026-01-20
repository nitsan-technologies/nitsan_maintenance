<?php
namespace Nitsan\NitsanMaintenance\Domain\Repository;

use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\Repository;


/**
 * The repository for Maintenances
 */
class MaintenanceRepository extends Repository
{
    /**
     * @param int $uid_local
     * @param int|null $uid_foreign
     * @param string $field_name
     * @param int|null $pid
     * @return void
     */
    public function updateSysFileReferenceRecord(int $uid_local, ?int $uid_foreign, string $field_name,  ?int $pid): void
    {
        $tableConnectionCategoryMM = GeneralUtility::makeInstance(ConnectionPool::class)
            ->getConnectionForTable('sys_file_reference');

        $sysFileReferenceData = [
            'uid_local' => $uid_local,
            'uid_foreign' => $uid_foreign,
            'tablenames' => 'tx_nitsanmaintenance_domain_model_maintenance',
            'fieldname' => $field_name,
            'sorting_foreign' => 1,
            'pid' => $pid,
        ];
        $tableConnectionCategoryMM->bulkInsert(
            'sys_file_reference',
            [$sysFileReferenceData],
            array_keys($sysFileReferenceData)
        );
    }
}
