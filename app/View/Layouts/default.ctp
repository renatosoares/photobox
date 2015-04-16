<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
	
		<?php  echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<!-- Se você quiser exibir algum menu em todas as suas views, inclua-o aqui -->
	<header id="header">
	    <nav id="menu">Menu...</nav>
	</header>
	<!-- Aqui é onde eu quero que minhas views sejam exibidas -->

	<section id="content">
		<article>
			<?php echo $this->fetch('content'); ?>
		</article>
		
	</section>
	

	<!-- Adicionar um rodapé para cada página exibida -->
	<footer id="footer">Rodapé...</footer>
										
</body>
</html>