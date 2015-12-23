<!-- File: /app/View/Categories/add.ctp -->
<h1>Adicionar categoria</h1>
<?php
echo $this->Form->create('Category');
echo $this->Form->input('name');
echo $this->Form->end('Save Category');
 ?>
