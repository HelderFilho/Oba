<?php
App::uses('Demand', 'Model');

/**
 * Demand Test Case
 *
 */
class DemandTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.demand',
		'app.secretarie',
		'app.prefecture',
		'app.accept_term',
		'app.department',
		'app.secretary',
		'app.user',
		'app.group',
		'app.log',
		'app.ombudsman_area',
		'app.sector'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Demand = ClassRegistry::init('Demand');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Demand);

		parent::tearDown();
	}

}
