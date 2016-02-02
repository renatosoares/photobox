<!-- File: /app/View/Posts/add.ctp -->
<section class="explorer">
  <div class="container text-center wow fadeIn">
    <h2>Adicione uma imagem</h2>
    <hr class="colored">
    <p>bla bla bla.</p>
    <div class="row content-row">
      <div class="col-md-6">
        <?php

        foreach ($categories as $category):
          $idCategorias[$category['Category']['id']] = $category['Category']['name'];
        endforeach;
          echo $this->Form->create('Post', array('role' => 'form', 'type' => 'file'));
          echo $this->Form->select('category_id', $idCategorias, array('div' => 'form-group', 'class' => 'form-control', 'label' => 'Categoria'));
          //echo $this->Html->div('form-group', $this->Form->input("title"));
          echo $this->Form->input('title', array('div' => 'form-group', 'class' => 'form-control', 'label' => 'Título'));
          echo $this->Form->input('description', array('rows' => '2', 'div' => 'form-group', 'class' => 'form-control', 'label' => 'Descrição'));
          echo $this->Form->input('keywords', array('div' => 'form-group', 'class' => 'form-control', 'label' => 'Keywords'));
          echo $this->Form->file('urlImage', array('div' => 'form-group', 'class' => 'form-control', 'label' => 'Url imagem'));
          echo $this->Form->end('Save Post');
          ?>
      </div>
      <div class="col-md-6">
        &nbsp;
      </div>
    </div>
  </div>
</section>
