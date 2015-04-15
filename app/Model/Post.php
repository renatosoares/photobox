<?php
// O CakePHP pode automaticamente deduzir que este model será usado num PostsController,
// e que manipulará os dados de uma tabela do banco chamada de posts.

class Post extends AppModel {
    public $name = 'Post';

    /*
		O array $validate diz ao CakePHP sobre como validar seus dados
		quando o método save() for chamado. Aqui, eu especifiquei que
		tanto os campos body e title não podem ser vazios.
    */
    public $validate = array(
        'title' => array(
            'rule' => 'notEmpty'
        ),
        'body' => array(
            'rule' => 'notEmpty'
        )
    );

}
?>