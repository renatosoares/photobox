<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->script('plugins/retina/retina.min');
		//echo $this->Html->css('cake.generic');
		echo $this->Html->css(array('bootstrap/bootstrap.min', 'vitality-red', 'font-awesome/css/font-awesome.min', 'plugins/owl-carousel/owl.carousel', 'plugins/owl-carousel/owl.theme', 'plugins/owl-carousel/owl.transitions', 'plugins/magnific-popup', 'plugins/background', 'plugins/animate' ));

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body id="page-top">
	<div id="container">
		<!-- ***************** header block ***************** -->
		<div id="header">
			<!-- Navigation -->
			<!-- Note: navbar-default and navbar-inverse are both supported with this theme. -->
			<nav class="navbar navbar-inverse navbar-fixed-top navbar-expanded">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand page-scroll" href="#page-top">
							PHOTOBOX
							<!-- <img src="assets/img/logo.png" class="img-responsive" alt=""> -->
						</a>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-right">
							<li class="hidden">
								<a class="page-scroll" href="#page-top"></a>
							</li>
							<li>
								<a class="page-scroll" href="#explorer">Explorar</a>
							</li>
							<li>
								<a class="page-scroll" href="#newsletter">Newsletter</a>
							</li>
							<li>
								<a class="page-scroll" href="#contact">Contato</a>
							</li>
						</ul>
					</div>
					<!-- /.navbar-collapse -->
				</div>
				<!-- /.container -->
			</nav>
		</div> <!-- /header -->

		<!-- ***************** content block ***************** -->
		<div id="content">
			<?php echo $this->Flash->render(); ?>

			<?php echo $this->fetch('content'); ?>
		</div> <!-- /content -->

		<!-- ***************** footer block ***************** -->
		<div id="footer">

		</div> <!-- /footer -->

	</div> <!-- /container -->
		<!-- Core Scripts -->
	<?php
		echo $this->Html->script(array('jquery', 'bootstrap.min'));
	?>

	<!-- <script src="assets/js/jquery.js"></script> -->
	<!-- <script src="assets/js/bootstrap/bootstrap.min.js"></script> -->
	<!-- Plugin Scripts -->
	<script src="assets/js/plugins/jquery.easing.min.js"></script>
	<script src="assets/js/plugins/classie.js"></script>
	<script src="assets/js/plugins/cbpAnimatedHeader.js"></script>
	<script src="assets/js/plugins/owl-carousel/owl.carousel.js"></script>
	<script src="assets/js/plugins/jquery.magnific-popup/jquery.magnific-popup.min.js"></script>
	<script src="assets/js/plugins/background/core.js"></script>
	<script src="assets/js/plugins/background/transition.js"></script>
	<script src="assets/js/plugins/background/background.js"></script>
	<script src="assets/js/plugins/jquery.mixitup.js"></script>
	<script src="assets/js/plugins/wow/wow.min.js"></script>
	<script src="assets/js/contact_me.js"></script>
	<script src="assets/js/plugins/jqBootstrapValidation.js"></script>
	<!-- Vitality Theme Scripts -->
	<script src="assets/js/vitality.js"></script>
	<!-- Style Switcher Scripts - Demo Purposes Only! -->
	<script src="assets/demo/style.switcher.js"></script>
	<!-- <?php// echo $this->element('sql_dump'); ?>  -->
</body>
</html>
