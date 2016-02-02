<?php
/**
*
*/

class Post extends AppModel {
    public $validate = array(
        'title' => array(
            'rule' => 'notBlank'
        ),
        'description' => array(
            'rule' => 'notBlank'
        ),
        'urlImage' => array(
      			// http://book.cakephp.org/2.0/en/models/data-validation.html#Validation::uploadError
      			'uploadError' => array(
      				'rule' => 'uploadError',
      				'message' => 'Something went wrong with the file upload',
      				'required' => FALSE,
      				'allowEmpty' => TRUE,
      			),
      			// http://book.cakephp.org/2.0/en/models/data-validation.html#Validation::mimeType
      			'mimeType' => array(
      				'rule' => array('mimeType', array('image/gif','image/png','image/jpg','image/jpeg')),
      				'message' => 'Invalid file, only images allowed',
      				'required' => FALSE,
      				'allowEmpty' => TRUE,
      			),
      			// custom callback to deal with the file upload
      			'processUpload' => array(
      				'rule' => 'processUpload',
      				'message' => 'Something went wrong processing your file',
      				'required' => FALSE,
      				'allowEmpty' => TRUE,
      				'last' => TRUE,
      			)
      		)

    );
   	public function isOwnedBy($post, $user) {
    	return $this->field('id', array('id' => $post, 'user_id' => $user)) !== false;
	}
  public function isUploadedFile($params) {
    $val = array_shift($params);
    if ((isset($val['error']) && $val['error'] == 0) ||
        (!empty( $val['tmp_name']) && $val['tmp_name'] != 'none')
    ) {
        return is_uploaded_file($val['tmp_name']);
    }
    return false;
}
}
