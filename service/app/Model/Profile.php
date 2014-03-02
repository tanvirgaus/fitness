<?php
App::uses('AppModel', 'Model');
/**
 * Profile Model
 *
 */
class Profile extends AppModel {
	 public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        )
    );
}
