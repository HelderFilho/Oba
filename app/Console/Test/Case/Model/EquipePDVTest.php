<?php
App::uses('EquipePDV', 'Model');

/**
 * EquipePDV Test Case
 *
 */
class EquipePDVTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.equipe_p_d_v'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EquipePDV = ClassRegistry::init('EquipePDV');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EquipePDV);

		parent::tearDown();
	}

}
