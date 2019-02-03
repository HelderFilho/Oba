<?php
App::uses('Population', 'Model');

/**
 * Population Test Case
 *
 */
class PopulationTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.population'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Population = ClassRegistry::init('Population');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Population);

		parent::tearDown();
	}

}
