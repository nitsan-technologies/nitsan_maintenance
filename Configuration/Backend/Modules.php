<?php 

return [
    'nitsan_maintenance' => [
        'parent' => '',
        'position' => 'web',
        'access' => 'user',
        'icon'   => 'EXT:nitsan_maintenance/Resources/Public/Icons/Extension.svg',
        'labels' => 'LLL:EXT:nitsan_maintenance/Resources/Private/Language/locallang_maintenance.xlf',
        'path' => '/module/web/NitsanMaintenance',
        'inheritNavigationComponentFromMainModule' => false,
        'extensionName' => 'nitsan_maintenance',
        'navigationComponent' => '@typo3/backend/page-tree/page-tree-element',
        'controllerActions' => [
            \Nitsan\NitsanMaintenance\Controller\MaintenanceController::class => 'list, new, create',
        ],
    ],
];
