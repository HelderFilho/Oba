<?php
App::uses('Crm', 'Model');

/**
 * Crm Test Case
 *
 */
class CrmTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.crm'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Crm = ClassRegistry::init('Crm');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Crm);

		parent::tearDown();
	}

}
