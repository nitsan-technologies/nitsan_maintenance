<?php
namespace Nitsan\NitsanMaintenance\Tests\Unit\Controller;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2016 
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
 * Test case for class Nitsan\NitsanMaintenance\Controller\MaintenanceController.
 *
 */
class MaintenanceControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \Nitsan\NitsanMaintenance\Controller\MaintenanceController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('Nitsan\\NitsanMaintenance\\Controller\\MaintenanceController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllMaintenancesFromRepositoryAndAssignsThemToView()
	{

		$allMaintenances = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$maintenanceRepository = $this->getMock('Nitsan\\NitsanMaintenance\\Domain\\Repository\\MaintenanceRepository', array('findAll'), array(), '', FALSE);
		$maintenanceRepository->expects($this->once())->method('findAll')->will($this->returnValue($allMaintenances));
		$this->inject($this->subject, 'maintenanceRepository', $maintenanceRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('maintenances', $allMaintenances);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenMaintenanceToMaintenanceRepository()
	{
		$maintenance = new \Nitsan\NitsanMaintenance\Domain\Model\Maintenance();

		$maintenanceRepository = $this->getMock('Nitsan\\NitsanMaintenance\\Domain\\Repository\\MaintenanceRepository', array('add'), array(), '', FALSE);
		$maintenanceRepository->expects($this->once())->method('add')->with($maintenance);
		$this->inject($this->subject, 'maintenanceRepository', $maintenanceRepository);

		$this->subject->createAction($maintenance);
	}
}
