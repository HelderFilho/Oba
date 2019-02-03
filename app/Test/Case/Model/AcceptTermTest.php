<?php
App::uses('AcceptTerm', 'Model');

/**
 * AcceptTerm Test Case
 *
 */
class AcceptTermTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.accept_term',
		'app.prefecture'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AcceptTerm = ClassRegistry::init('AcceptTerm');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AcceptTerm);

		parent::tearDown();
	}

}
