<?php
namespace Nitsan\NitsanMaintenance\ExpressionLanguage;

use Doctrine\DBAL\Exception;
use TYPO3\CMS\Core\ExpressionLanguage\AbstractProvider;

class AuthCheckMaintenanceMode extends AbstractProvider
{
    /**
     * @throws Exception
     */
    public function __construct(
    )
    {
        $this->expressionLanguageProviders = [
            FrontendUserConditionFunctionsProvider::class,
        ];
    }
}

