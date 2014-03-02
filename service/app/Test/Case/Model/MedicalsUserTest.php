<?php
App::uses('MedicalsUser', 'Model');

/**
 * MedicalsUser Test Case
 *
 */
class MedicalsUserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.medicals_user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MedicalsUser = ClassRegistry::init('MedicalsUser');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MedicalsUser);

		parent::tearDown();
	}

}
