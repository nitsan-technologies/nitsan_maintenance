<?php

namespace Nitsan\NitsanMaintenance\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2016 
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class \Nitsan\NitsanMaintenance\Domain\Model\Maintenance.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class MaintenanceTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \Nitsan\NitsanMaintenance\Domain\Model\Maintenance
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \Nitsan\NitsanMaintenance\Domain\Model\Maintenance();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getRobotsmetaReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getRobotsmeta()
		);
	}

	/**
	 * @test
	 */
	public function setRobotsmetaForStringSetsRobotsmeta()
	{
		$this->subject->setRobotsmeta('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'robotsmeta',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getTitleReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getTitle()
		);
	}

	/**
	 * @test
	 */
	public function setTitleForStringSetsTitle()
	{
		$this->subject->setTitle('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'title',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getHeadingReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getHeading()
		);
	}

	/**
	 * @test
	 */
	public function setHeadingForStringSetsHeading()
	{
		$this->subject->setHeading('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'heading',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getTextReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getText()
		);
	}

	/**
	 * @test
	 */
	public function setTextForStringSetsText()
	{
		$this->subject->setText('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'text',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getCountdownReturnsInitialValueForBool()
	{
		$this->assertSame(
			FALSE,
			$this->subject->getCountdown()
		);
	}

	/**
	 * @test
	 */
	public function setCountdownForBoolSetsCountdown()
	{
		$this->subject->setCountdown(TRUE);

		$this->assertAttributeEquals(
			TRUE,
			'countdown',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getStartdateReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getStartdate()
		);
	}

	/**
	 * @test
	 */
	public function setStartdateForStringSetsStartdate()
	{
		$this->subject->setStartdate('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'startdate',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getEnddateReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getEnddate()
		);
	}

	/**
	 * @test
	 */
	public function setEnddateForStringSetsEnddate()
	{
		$this->subject->setEnddate('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'enddate',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getFontcolorReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getFontcolor()
		);
	}

	/**
	 * @test
	 */
	public function setFontcolorForStringSetsFontcolor()
	{
		$this->subject->setFontcolor('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'fontcolor',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getFootertextReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getFootertext()
		);
	}

	/**
	 * @test
	 */
	public function setFootertextForStringSetsFootertext()
	{
		$this->subject->setFootertext('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'footertext',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getFblinkReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getFblink()
		);
	}

	/**
	 * @test
	 */
	public function setFblinkForStringSetsFblink()
	{
		$this->subject->setFblink('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'fblink',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getTwlinkReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getTwlink()
		);
	}

	/**
	 * @test
	 */
	public function setTwlinkForStringSetsTwlink()
	{
		$this->subject->setTwlink('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'twlink',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getLinkedinlinkReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getLinkedinlink()
		);
	}

	/**
	 * @test
	 */
	public function setLinkedinlinkForStringSetsLinkedinlink()
	{
		$this->subject->setLinkedinlink('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'linkedinlink',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getGitlinkReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getGitlink()
		);
	}

	/**
	 * @test
	 */
	public function setGitlinkForStringSetsGitlink()
	{
		$this->subject->setGitlink('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'gitlink',
			$this->subject
		);
	}
}
