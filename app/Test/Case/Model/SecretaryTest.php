<?php
App::uses('Secretary', 'Model');

/**
 * Secretary Test Case
 *
 */
class SecretaryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.secretary',
		'app.prefecture'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Secretary = ClassRegistry::init('Secretary');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Secretary);

		parent::tearDown();
	}

}
