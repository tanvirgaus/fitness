<?php
App::uses('Medical', 'Model');

/**
 * Medical Test Case
 *
 */
class MedicalTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.medical'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Medical = ClassRegistry::init('Medical');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Medical);

		parent::tearDown();
	}

}
