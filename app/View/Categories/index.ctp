<!-- File: /app/View/Categories/index.ctp -->
<h1>Lista de Categorias</h1>
<p>
  <?php echo $this->Html->link('Add Categoy', array('action' => 'add')); ?>
</p>
<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Nome</th>
    </tr>
  </thead>


<?php foreach ($categories as $category): ?>
  <tbody>
    <tr>
      <td><?php echo $category['Category']['id']; ?></td>
      <td><?php echo $category['Category']['name']; ?></td>
    </tr>
  </tbody>

<?php endforeach; ?>
</table>
