<!-- Model: Model/Contact.php -->
<?php

App::uses('AppModel', 'Model');
class Contact extends AppModel {

    public $useTable = false;  // Not using the database, of course.

    var $validate = array(
        'name' => array(
            'rule' => '/.+/',
            'allowEmpty' => false,
            'required' => true,
        )
    );



}
