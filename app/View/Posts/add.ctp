<!-- File: /app/View/Posts/add.ctp -->

<!--      
	Aqui, usamos o FormHelper para gerar a tag de abertura para
	um formulário. Aqui está o HTML gerado pelo $this->Form->create():

	<form id="PostAddForm" method="post" action="/posts/add">
 -->

<h1>Add Post</h1>
<?php
echo $this->Form->create('Post');
echo $this->Form->input('title');
echo $this->Form->input('body', array('rows' => '3'));
echo $this->Form->end('Save Post'); // gera um botão de submissão e encerra o formulário.
?>