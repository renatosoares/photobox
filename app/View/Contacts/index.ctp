<!-- View: Views/Contacts/index.ctp -->
<h1>teste de envio</h1>
<article class="row">
	<section class="col-md-6">
		<?php
		echo $this->Form->create(null, array(
    'url' => array('controller' => 'contacts', 'action' => 'index')
));
		echo $this->Form->input('name');
    echo $this->Form->input('email');
    echo $this->Form->input('message');
		echo $this->Form->end(__('Submit'));

		 ?>
	</section>
</article>
