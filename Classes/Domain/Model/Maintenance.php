<?php
namespace Nitsan\NitsanMaintenance\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;

/**
 * Maintenance
 */
class Maintenance extends AbstractEntity
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
     * countdown
     *
     * @var bool
     */
    protected bool $countdown = false;

    /**
    * fontcolor
    *
    * @var string
    */
    protected string $fontcolor = '';

    /**
     * subscriptionheader
     *
     * @var string
     */
    protected string $subscriptionheader = '';

    /**
     * subscriptionplaceholder
     *
     * @var string
     */
    protected string $subscriptionplaceholder = '';

    /**
     * subscriptionbtnlabel
     *
     * @var string
     */
    protected string $subscriptionbtnlabel = '';

    /**
    * backgroundcolor
    *
    * @var string
    */
    protected string $backgroundcolor = '';

    /**
    * fblink
    *
    * @var string
    */
    protected string $fblink = '';

    /**
     * twlink
     *
     * @var string
     */
    protected string $twlink = '';

    /**
     * linkedinlink
     *
     * @var string
     */
    protected string $linkedinlink = '';

    /**
     * whitelist
     *
     * @var string
     */
    protected string $whitelist = '';

    /**
     * themelayout
     *
     * @var string
     */
    protected string $themelayout = '';

    /**
     * countboxstyle
     *
     * @var string
     */
    protected string $countboxstyle = '';

    /**
    * gitlink
    *
    * @var string
    */
    protected string $gitlink = '';

    /**
     * youtubelink
     *
     * @var string
     */
    protected string $youtubelink = '';

    /**
     * instagramlink
     *
     * @var string
     */
    protected string $instagramlink = '';

    /**
     * pagelink
     *
     * @var string
     */
    protected string $pagelink = '';

    /**
     * pagelinklabel
     *
     * @var string
     */
    protected string $pagelinklabel = '';

    /**
     * hide
     *
     * @var bool
     */
    protected bool $hide = false;

    /**
     * animate
     *
     * @var bool
     */
    protected bool $animate = false;

    /**
     * endtime
     *
     * @var string|null
     */
    protected ?string $endtime = null;

    /**
     * text
     *
     * @var string
     */
    protected string $footertext = '';

    /**
     * image
     *
     * @var ObjectStorage<FileReference>|null
     */
    protected ?ObjectStorage $image = null;

    /**
     * logoImage
     *
     * @var ObjectStorage<FileReference>
     */
    protected ObjectStorage $logoImage;

     /**
     * logoPosition
     *
     * @var string
     */
    protected string $logoPosition = '';

    /**
     * status
     *
     * @var bool
     */
    protected bool $status = false;

    /**
     * customcss
     *
     * @var string
     */
    protected string $customcss = '';

    /**
     * whitelistfrontend
     *
     * @var int
     */
    protected int $whitelistfrontend = 1;

    /**
     * Frontend user ids
     *
     * @var string
     */
    protected string $users = '';

    /**
     * Frontend user group ids
     *
     * @var string
     */
    protected string $usergroups = '';    
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
        $this->logoImage = new ObjectStorage();
    }

    /**
     * Returns the boolean state of status
     *
     * @return bool
     */
    public function isStatus(): bool
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
     * Returns the subscriptionheader
     *
     * @return string $subscriptionheader
     */
    public function getSubscriptionheader(): string
    {
        return $this->subscriptionheader;
    }

    /**
     * Sets the subscriptionheader
     *
     * @param string $subscriptionheader
     * @return void
     */
    public function setSubscriptionheader(string $subscriptionheader): void
    {
        $this->subscriptionheader = $subscriptionheader;
    }

    /**
     * Returns the subscriptionplaceholder
     *
     * @return string $subscriptionplaceholder
     */
    public function getSubscriptionplaceholder(): string
    {
        return $this->subscriptionplaceholder;
    }

    /**
     * Sets the subscriptionplaceholder
     *
     * @param string $subscriptionplaceholder
     * @return void
     */
    public function setSubscriptionplaceholder(string $subscriptionplaceholder): void
    {
        $this->subscriptionplaceholder = $subscriptionplaceholder;
    }

    /**
     * Returns the subscriptionbtnlabel
     *
     * @return string $subscriptionbtnlabel
     */
    public function getSubscriptionbtnlabel(): string
    {
        return $this->subscriptionbtnlabel;
    }

    /**
     * Sets the subscriptionbtnlabel
     *
     * @param string $subscriptionbtnlabel
     * @return void
     */
    public function setSubscriptionbtnlabel(string $subscriptionbtnlabel): void
    {
        $this->subscriptionbtnlabel = $subscriptionbtnlabel;
    }

    /**
     * Returns the countboxstyle
     *
     * @return string $countboxstyle
     */
    public function getCountboxstyle(): string
    {
        return $this->countboxstyle;
    }

    /**
     * Sets the countboxstyle
     *
     * @param string $countboxstyle
     * @return void
     */
    public function setCountboxstyle(string $countboxstyle): void
    {
        $this->countboxstyle = $countboxstyle;
    }

    /**
     * Returns the countdown
     *
     * @return bool $countdown
     */
    public function getCountdown(): bool
    {
        return $this->countdown;
    }

    /**
     * Sets the countdown
     *
     * @param bool $countdown
     * @return void
     */
    public function setCountdown(bool $countdown): void
    {
        $this->countdown = $countdown;
    }

    /**
     * Returns the whitelist
     *
     * @return string $whitelist
     */
    public function getWhitelist(): string
    {
        return $this->whitelist;
    }

    /**
     * Sets the whitelist
     *
     * @param string $whitelist
     * @return void
     */
    public function setWhitelist(string $whitelist): void
    {
        $this->whitelist = $whitelist;
    }

    /**
     * Returns the fontcolor
     *
     * @return string $fontcolor
     */
    public function getFontcolor(): string
    {
        return $this->fontcolor;
    }

    /**
     * Sets the fontcolor
     *
     * @param string $fontcolor
     * @return void
     */
    public function setFontcolor(string $fontcolor): void
    {
        $this->fontcolor = $fontcolor;
    }

    /**
     * Returns the themelayout
     *
     * @return string $themelayout
     */
    public function getThemelayout(): string
    {
        return $this->themelayout;
    }

    /**
     * Sets the themelayout
     *
     * @param string $themelayout
     * @return void
     */
    public function setThemelayout(string $themelayout): void
    {
        $this->themelayout = $themelayout;
    }

    /**
     * Returns the backgroundcolor
     *
     * @return string $backgroundcolor
     */
    public function getBackgroundcolor(): string
    {
        return $this->backgroundcolor;
    }

    /**
     * Sets the backgroundcolor
     *
     * @param string $backgroundcolor
     * @return void
     */
    public function setBackgroundcolor(string $backgroundcolor): void
    {
        $this->backgroundcolor = $backgroundcolor;
    }

    /**
    * Returns the fblink
    *
    * @return string $fblink
    */
    public function getFblink(): string
    {
        return $this->fblink;
    }

    /**
     * Sets the fblink
     *
     * @param string $fblink
     * @return void
     */
    public function setFblink(string $fblink): void
    {
        $this->fblink = $fblink;
    }

    /**
     * Returns the youtubelink
     *
     * @return string $youtubelink
     */
    public function getYoutubelink(): string
    {
        return $this->youtubelink;
    }

    /**
     * Sets the youtubelink
     *
     * @param string $youtubelink
     * @return void
     */
    public function setYoutubelink(string $youtubelink): void
    {
        $this->youtubelink = $youtubelink;
    }

    /**
     * Returns the instagramlink
     *
     * @return string $instagramlink
     */
    public function getInstagramlink(): string
    {
        return $this->instagramlink;
    }

    /**
     * Sets the instagramlink
     *
     * @param string $instagramlink
     * @return void
     */
    public function setInstagramlink(string $instagramlink): void
    {
        $this->instagramlink = $instagramlink;
    }

    /**
     * Returns the pagelink
     *
     * @return string $pagelink
     */
    public function getPagelink(): string
    {
        return $this->pagelink;
    }

    /**
     * Sets the pagelink
     *
     * @param string $pagelink
     * @return void
     */
    public function setPagelink(string $pagelink): void
    {
        $this->pagelink = $pagelink;
    }

    /**
     * Returns the pagelinklabel
     *
     * @return string $pagelinklabel
     */
    public function getPagelinklabel(): string
    {
        return $this->pagelinklabel;
    }

    /**
     * Sets the pagelinklabel
     *
     * @param string $pagelinklabel
     * @return void
     */
    public function setPagelinklabel(string $pagelinklabel): void
    {
        $this->pagelinklabel = $pagelinklabel;
    }

    /**
     * Returns the twlink
     *
     * @return string $twlink
     */
    public function getTwlink(): string
    {
        return $this->twlink;
    }

    /**
     * Sets the twlink
     *
     * @param string $twlink
     * @return void
     */
    public function setTwlink(string $twlink): void
    {
        $this->twlink = $twlink;
    }

    /**
     * Returns the linkedinlink
     *
     * @return string $linkedinlink
     */
    public function getLinkedinlink(): string
    {
        return $this->linkedinlink;
    }

    /**
     * Sets the linkedinlink
     *
     * @param string $linkedinlink
     * @return void
     */
    public function setLinkedinlink(string $linkedinlink): void
    {
        $this->linkedinlink = $linkedinlink;
    }

    /**
     * Returns the gitlink
     *
     * @return string $gitlink
     */
    public function getGitlink(): string
    {
        return $this->gitlink;
    }

    /**
     * Sets the gitlink
     *
     * @param string $gitlink
     * @return void
     */
    public function setGitlink(string $gitlink): void
    {
        $this->gitlink = $gitlink;
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
     * Returns the animate
     *
     * @return bool $animate
     */
    public function getAnimate(): bool
    {
        return $this->animate;
    }

    /**
     * Sets the animate
     *
     * @param bool $animate
     * @return void
     */
    public function setAnimate(bool $animate): void
    {
        $this->animate = $animate;
    }

    /**
     * Returns the endtime
     *
     * @return string|null endtime
     */
    public function getEndtime(): ?string
    {
        return $this->endtime;
    }

    /**
     * Sets the endtime
     *
     * @param string $endtime
     * @return void
     */
    public function setEndtime(string $endtime): void
    {
        $this->endtime = $endtime;
    }

    /**
     * Returns the footertext
     *
     * @return string $footertext
     */
    public function getFootertext(): string
    {
        return $this->footertext;
    }

    /**
     * Sets the footertext
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
     * @param FileReference $image
     * @return void
     */
    public function addImage(FileReference $image): void
    {
        $this->image->attach($image);
    }

    /**
     * Removes a FileReference
     *
     * @param FileReference $imageToRemove The FileReference to be removed
     * @return void
     */
    public function removeImage(FileReference $imageToRemove): void
    {
        $this->image->detach($imageToRemove);
    }

    /**
     * Returns the image
     *
     * @return ObjectStorage<FileReference> $image
     */
    public function getImage(): ?ObjectStorage
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
     * Adds a FileReference
     *
     * @param FileReference $logoImage
     * @return void
     */
    public function addLogoImage(FileReference $logoImage): void
    {
        $this->logoImage->attach($logoImage);
    }

    /**
     * Removes a FileReference
     *
     * @param FileReference $logoImageToRemove The FileReference to be removed
     * @return void
     */
    public function removeLogoImage(FileReference $logoImageToRemove): void
    {
        $this->logoImage->detach($logoImageToRemove);
    }

    /**
     * Returns the logoImage
     *
     * @return ObjectStorage<FileReference> $logoImage
     */
    public function getLogoImage(): ObjectStorage
    {
        return $this->logoImage;
    }

    /**
     * Sets the logoImage
     *
     * @param ObjectStorage|null $logoImage
     * @return void
     */
    public function setLogoImage(ObjectStorage $logoImage = null): void
    {
        $this->logoImage = $logoImage;
    }

    /**
     * Returns the logoPosition
     *
     * @return string $logoPosition
     */
    public function getLogoPosition(): string
    {
        return $this->logoPosition;
    }

    /**
     * Sets the logoPosition
     *
     * @param string $logoPosition
     * @return void
     */
    public function setLogoPosition(string $logoPosition): void
    {
        $this->logoPosition = $logoPosition;
    }

    /**
     * Returns the customcss
     *
     * @return string $logoPosition
     */
    public function getCustomcss(): string
    {
        return $this->customcss;
    }

    /**
     * Sets the customcss
     *
     * @param string $customcss
     * @return void
     */
    public function setCustomcss(string $customcss): void
    {
        $this->customcss = $customcss;
    }

    /**
     * Returns the whitelistfrontend
     *
     * @return int $whitelistfrontend
     */
    public function getWhitelistfrontend(): int
    {
        return $this->whitelistfrontend;
    }

    /**
     * Sets the whitelistfrontend
     *
     * @param int $whitelistfrontend
     * @return void
     */
    public function setWhitelistfrontend(int $whitelistfrontend): void
    {
        $this->whitelistfrontend = $whitelistfrontend;
    }

    /**
     * Returns the users ids
     *
     * @return string $users
     */
    public function getUsers(): string
    {
        return $this->users;
    }

    /**
     * Sets the user ids
     *
     * @param string $users
     * @return void
     */
    public function setUsers(string $users): void
    {
        $this->users = $users;
    }   
    
    /**
     * Returns the usergroups ids
     *
     * @return string $usergroups
     */
    public function getUsergroups(): string
    {
        return $this->usergroups;
    }

    /**
     * Sets the user ids
     *
     * @param string $usergroups
     * @return void
     */
    public function setUsergroups(string $usergroups): void
    {
        $this->usergroups = $usergroups;
    }        
}
