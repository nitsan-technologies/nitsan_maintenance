<?php

use Nitsan\NitsanMaintenance\Controller\MaintenanceController;

return [
    'nitsan_module' => [
        'labels' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/BackendModule.xlf',
        'icon' => 'EXT:nitsan_maintenance/Resources/Public/Icons/module.svg',
        'navigationComponent' => '@typo3/backend/page-tree/page-tree-element',
        'position' => ['after' => 'web'],
    ],
    'nitsan_maintenance' => [
        'parent' => 'nitsan_module',
        'position' => ['before' => 'top'],
        'access' => 'user',
        'icon'   => 'EXT:nitsan_maintenance/Resources/Public/Icons/nitsan_maintenance.svg',
        'labels' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_maintenance.xlf',
        'path' => '/module/web/NitsanMaintenance',
        'inheritNavigationComponentFromMainModule' => false,
        'extensionName' => 'nitsan_maintenance',
        'navigationComponent' => '@typo3/backend/page-tree/page-tree-element',
        'controllerActions' => [
            MaintenanceController::class => 'list, new, create, subscriber',
        ],
    ],
];
