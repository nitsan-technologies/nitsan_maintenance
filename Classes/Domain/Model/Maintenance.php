<?php
namespace Nitsan\NitsanMaintenance\Domain\Model;

use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

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
 * Maintenance
 */
class Maintenance extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * title
     *
     * @var string
     */
    protected string $title = '';

    /**
     * heading
     *
     * @var string
     */
    protected string $heading = '';

    /**
     * text
     *
     * @var string
     */
    protected string $text = '';

    /**
     * hide
     *
     * @var bool
     */
    protected bool $hide = false;

    /**
     * endtime
     *
     * @var string
     */
    protected string $endtime = '';

    /**
     * text
     *
     * @var string
     */
    protected string $footertext = '';

    /**
     * image
     *
     * @var ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    protected ObjectStorage $image;

    /**
     * status
     *
     * @var bool
     */
    protected ?bool $status = null;

    /**
     * text
     *
     * @var string
     */
    protected string $tenimage = '';

    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    protected function initStorageObjects(): void
    {
        $this->image = new ObjectStorage();
    }

    /**
     * Returns the boolean state of status
     *
     * @return bool|null
     */
    public function isStatus(): ?bool
    {
        return $this->status;
    }

    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * Returns the heading
     *
     * @return string $heading
     */
    public function getHeading(): string
    {
        return $this->heading;
    }

    /**
     * Sets the heading
     *
     * @param string $heading
     * @return void
     */
    public function setHeading(string $heading): void
    {
        $this->heading = $heading;
    }

    /**
     * Returns the text
     *
     * @return string $text
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * Sets the text
     *
     * @param string $text
     * @return void
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }

    /**
     * Returns the hide
     *
     * @return bool $hide
     */
    public function getHide(): bool
    {
        return $this->hide;
    }

    /**
     * Sets the hide
     *
     * @param bool $hide
     * @return void
     */
    public function setHide(bool $hide): void
    {
        $this->hide = $hide;
    }

    /**
     * Returns the endtime
     *
     * @return string endtime
     */
    public function getEndtime(): string
    {
        return $this->endtime;
    }

    /**
     * Sets the endtime
     *
     * @param String $endtime
     * @return void
     */
    public function setEndtime(string $endtime): void
    {
        $this->endtime = $endtime;
    }

    /**
     * Returns the text
     *
     * @return string $footertext
     */
    public function getFootertext(): string
    {
        return $this->footertext;
    }

    /**
     * Sets the text
     *
     * @param string $footertext
     * @return void
     */
    public function setFootertext(string $footertext): void
    {
        $this->footertext = $footertext;
    }

    /**
     * Adds a FileReference
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     * @return void
     */
    public function addImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image): void
    {
        $this->image->attach($image);
    }

    /**
     * Removes a FileReference
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $imageToRemove The FileReference to be removed
     * @return void
     */
    public function removeImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $imageToRemove): void
    {
        $this->image->detach($imageToRemove);
    }

    /**
     * Returns the image
     *
     * @return ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $image
     */
    public function getImage(): ObjectStorage
    {
        return $this->image;
    }

    /**
     * Sets the image
     *
     * @param ObjectStorage|null $image
     * @return void
     */
    public function setImage(ObjectStorage $image = null): void
    {
        $this->image = $image;
    }

    /**
     * Returns the tenimage
     *
     * @return string $tenimage
     */
    public function getTenimage(): string
    {
        return $this->tenimage;
    }

    /**
     * Sets the tenimage
     *
     * @param string $tenimage
     * @return void
     */
    public function setTenimage(string $tenimage): void
    {
        $this->tenimage = $tenimage;
    }
}
