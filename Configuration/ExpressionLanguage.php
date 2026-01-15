<?php

use Nitsan\NitsanMaintenance\ExpressionLanguage\CheckMaintenanceMode;
use Nitsan\NitsanMaintenance\ExpressionLanguage\AuthCheckMaintenanceMode;

return [
    'typoscript' => [
        CheckMaintenanceMode::class,
        AuthCheckMaintenanceMode::class,
    ],
];
