<?php
App::uses('AppModel', 'Model');
/**
 * Medical Model
 *
 */
class Medical extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
	
	public $hasMany = array(
        'MedicalsUser' => array(
            'className' => 'MedicalsUser',
            'foreignKey' => 'medical_id'
        )
    );

}
