<?php
App::uses('Notification', 'Model');

/**
 * Notification Test Case
 *
 */
class NotificationTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.notification',
		'app.user',
		'app.group',
		'app.employee',
		'app.position',
		'app.documents_comission',
		'app.document',
		'app.client',
		'app.seller',
		'app.table_rate',
		'app.rate',
		'app.bank_flow',
		'app.bank_account',
		'app.log'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Notification = ClassRegistry::init('Notification');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Notification);

		parent::tearDown();
	}

}
