<?php
namespace Nitsan\NitsanMaintenance\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
/**
 * Subscriber
 */
class Subscriber extends AbstractEntity
{

    /**
     * subscriberEmail
     *
     * @var string
     */
    protected string $subscriberEmail = '';

    /**
     * Returns the subscriberEmail
     *
     * @return string $subscriberEmail
     */
    public function getSubscriberEmail(): string
    {
        return $this->subscriberEmail;
    }

    /**
     * Sets the subscriberEmail
     *
     * @param string $subscriberEmail
     * @return void
     */
    public function setSubscriberEmail(string $subscriberEmail): void
    {
        $this->subscriberEmail = $subscriberEmail;
    }
}
