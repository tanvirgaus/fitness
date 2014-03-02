<?php
App::uses('AppModel', 'Model');
/**
 * MedicalsUser Model
 *
 */
class MedicalsUser extends AppModel {
	public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        ),
        'Medical' => array(
            'className' => 'Medical',
            'foreignKey' => 'medical_id'
        )
    );
	
}
