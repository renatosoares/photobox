<!-- File: /app/View/Posts/index.ctp -->

<h1>Recentes</h1>
<p><?php echo $this->Html->link('Adicionar postagem', array('action' => 'add')); ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Título</th>
        <th>Ações</th>
        <th>Publicado</th>
    </tr>

<!-- Aqui é onde nós percorremos nossa matriz $posts, imprimindo
as informações dos posts -->

    <?php foreach ($posts as $post): ?>
    <tr>
        <td><?php echo $post['Post']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($post['Post']['title'], array('action' => 'view', $post['Post']['id']));?>
        </td>
        <td>
            <?php echo $this->Form->postLink('Deletar', array('action' => 'delete', $post['Post']['id']), array('confirm' => 'Você tem certeza?')); ?>
            <?php echo $this->Html->link('Editar', array('action' => 'edit', $post['Post']['id'])); ?>
        </td>
        <td><?php echo $post['Post']['created']; ?></td>
    </tr>
    <?php endforeach; ?>

</table>