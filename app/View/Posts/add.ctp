<!-- File: /app/View/Posts/add.ctp -->

<h1>Add Post</h1>
<?php
foreach ($categories as $category):
  $idCategorias[$category['Category']['id']] = $category['Category']['name'];
endforeach;

  echo $this->Form->create('Post');
  echo $this->Form->select('category_id', $idCategorias);
  echo $this->Form->input('title');
  echo $this->Form->input('description', array('rows' => '2'));
  echo $this->Form->input('keywords');
  echo $this->Form->input('urlImage');
  echo $this->Form->end('Save Post');
?>
