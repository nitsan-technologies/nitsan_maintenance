<?php
namespace Nitsan\NitsanMaintenance\Domain\Model;

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
     * robotsmeta
     *
     * @var string
     */
    protected $robotsmeta = '';

    /**
     * title
     *
     * @var string
     */
    protected $title = '';

    /**
     * heading
     *
     * @var string
     */
    protected $heading = '';

    /**
     * text
     *
     * @var string
     */
    protected $text = '';

    /**
     * countdown
     *
     * @var bool
     */
    protected $countdown = false;

    /**
     * hide
     *
     * @var bool
     */
    protected $hide = false;

    /**
     * startdate
     *
     * @var string
     */
    protected $startdate = null;

    /**
     * endtime
     *
     * @var string
     */
    protected $endtime = null;

    /**
     * fontcolor
     *
     * @var string
     */
    protected $fontcolor = '';

    /**
     * text
     *
     * @var string
     */
    protected $footertext = '';

    /**
     * fblink
     *
     * @var string
     */
    protected $fblink = '';

    /**
     * twlink
     *
     * @var string
     */
    protected $twlink = '';

    /**
     * linkedinlink
     *
     * @var string
     */
    protected $linkedinlink = '';

    /**
     * whitelist
     *
     * @var string
     */
    protected $whitelist = '';

    /**
     * gitlink
     *
     * @var string
     */
    protected $gitlink = '';

    /**
     * image
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    protected $image = null;

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
    protected function initStorageObjects()
    {
        $this->image = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the boolean state of status
     *
     * @return bool
     */
    public function isStatus()
    {
        return $this->status;
    }

    /**
     * Returns the robotsmeta
     *
     * @return string $robotsmeta
     */
    public function getRobotsmeta()
    {
        return $this->robotsmeta;
    }

    /**
     * Sets the robotsmeta
     *
     * @param string $robotsmeta
     * @return void
     */
    public function setRobotsmeta($robotsmeta)
    {
        $this->robotsmeta = $robotsmeta;
    }

    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Returns the heading
     *
     * @return string $heading
     */
    public function getHeading()
    {
        return $this->heading;
    }

    /**
     * Sets the heading
     *
     * @param string $heading
     * @return void
     */
    public function setHeading($heading)
    {
        $this->heading = $heading;
    }

    /**
     * Returns the text
     *
     * @return string $text
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Sets the text
     *
     * @param string $text
     * @return void
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * Returns the countdown
     *
     * @return bool $countdown
     */
    public function getCountdown()
    {
        return $this->countdown;
    }

    /**
     * Sets the countdown
     *
     * @param bool $countdown
     * @return void
     */
    public function setCountdown($countdown)
    {
        $this->countdown = $countdown;
    }

    /**
     * Returns the boolean state of countdown
     *
     * @return bool
     */
    public function isCountdown()
    {
        return $this->countdown;
    }

    /**
     * Returns the hide
     *
     * @return bool $hide
     */
    public function getHide()
    {
        return $this->hide;
    }

    /**
     * Sets the hide
     *
     * @param bool $hide
     * @return void
     */
    public function setHide($hide)
    {
        $this->hide = $hide;
    }

    /**
     * Returns the fontcolor
     *
     * @return string $fontcolor
     */
    public function getFontcolor()
    {
        return $this->fontcolor;
    }

    /**
     * Sets the fontcolor
     *
     * @param string $fontcolor
     * @return void
     */
    public function setFontcolor($fontcolor)
    {
        $this->fontcolor = $fontcolor;
    }

    /**
     * Returns the startdate
     *
     * @return string startdate
     */
    public function getStartdate()
    {
        return $this->startdate;
    }

    /**
     * Sets the startdate
     *
     * @param String $startdate
     * @return void
     */
    public function setStartdate($startdate)
    {
        $this->startdate = $startdate;
    }

    /**
     * Returns the endtime
     *
     * @return string endtime
     */
    public function getEndtime()
    {
        return $this->endtime;
    }

    /**
     * Sets the endtime
     *
     * @param String $endtime
     * @return void
     */
    public function setEndtime($endtime)
    {
        $this->endtime = $endtime;
    }

    /**
     * Returns the text
     *
     * @return string $footertext
     */
    public function getFootertext()
    {
        return $this->footertext;
    }

    /**
     * Sets the text
     *
     * @param string $footertext
     * @return void
     */
    public function setFootertext($footertext)
    {
        $this->footertext = $footertext;
    }

    /**
     * Returns the fblink
     *
     * @return string $fblink
     */
    public function getFblink()
    {
        return $this->fblink;
    }

    /**
     * Sets the fblink
     *
     * @param string $fblink
     * @return void
     */
    public function setFblink($fblink)
    {
        $this->fblink = $fblink;
    }

    /**
     * Returns the twlink
     *
     * @return string $twlink
     */
    public function getTwlink()
    {
        return $this->twlink;
    }

    /**
     * Sets the twlink
     *
     * @param string $twlink
     * @return void
     */
    public function setTwlink($twlink)
    {
        $this->twlink = $twlink;
    }

    /**
     * Returns the linkedinlink
     *
     * @return string $linkedinlink
     */
    public function getLinkedinlink()
    {
        return $this->linkedinlink;
    }

    /**
     * Sets the linkedinlink
     *
     * @param string $linkedinlink
     * @return void
     */
    public function setLinkedinlink($linkedinlink)
    {
        $this->linkedinlink = $linkedinlink;
    }

    /**
     * Returns the gitlink
     *
     * @return string $gitlink
     */
    public function getGitlink()
    {
        return $this->gitlink;
    }

    /**
     * Sets the gitlink
     *
     * @param string $gitlink
     * @return void
     */
    public function setGitlink($gitlink)
    {
        $this->gitlink = $gitlink;
    }

    /**
     * Returns the whitelist
     *
     * @return string $whitelist
     */
    public function getWhitelist()
    {
        return $this->whitelist;
    }

    /**
     * Sets the whitelist
     *
     * @param string $whitelist
     * @return void
     */
    public function setWhitelist($whitelist)
    {
        $this->whitelist = $whitelist;
    }

    /**
     * Adds a FileReference
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     * @return void
     */
    public function addImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image)
    {
        $this->image->attach($image);
    }

    /**
     * Removes a FileReference
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $imageToRemove The FileReference to be removed
     * @return void
     */
    public function removeImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $imageToRemove)
    {
        $this->image->detach($imageToRemove);
    }

    /**
     * Returns the image
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Sets the image
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $image
     * @return void
     */
    public function setImage(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $image = null)
    {
        $this->image = $image;
    }
}
