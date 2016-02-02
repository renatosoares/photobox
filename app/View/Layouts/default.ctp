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

		//echo $this->Html->css('cake.generic');
		echo $this->Html->css(array('bootstrap/bootstrap.min', 'vitality-red', 'font-awesome/css/font-awesome.min', 'plugins/owl-carousel/owl.carousel', 'plugins/owl-carousel/owl.theme', 'plugins/owl-carousel/owl.transitions', 'plugins/magnific-popup', 'plugins/background', 'plugins/animate' ));

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body id="page-top">
	<!-- <div id="container"> -->
		<!-- ***************** header block ***************** -->
		<!-- <div id="header"> -->
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
			<header style="background-image: url('<?php echo $this->webroot; ?>img/bg-header2.jpg');">
			    <div class="intro-content">
			        <img src="<?php echo $this->webroot; ?>img/photobox-logo.png" class="img-responsive img-centered" alt="">
			        <div class="brand-name">PHOTOBOX</div>
			        <hr class="colored">
			        <div class="brand-name-subtext">Encontre tudo que você precisa para seus projetos criativos.</div>
			    </div>
			    <div class="scroll-down">
			        <a class="btn page-scroll" href="#explorer"><i class="fa fa-angle-down fa-fw"></i></a>
			    </div>
			</header>
	<!--	</div>  /header -->

		<!-- ***************** content block ***************** -->
		<!-- <div id="content"> -->

					<?php echo $this->Flash->render(); ?>

					<?php echo $this->fetch('content'); ?>
	<!--	</div>  /content -->

		<!-- ***************** footer block ***************** -->
		<!-- <div id="footer"> -->
			<footer class="footer" style="background-image: url('<?php echo $this->webroot; ?>img/bg-footer.jpg')">
					<div class="container text-center">
							<div class="row">
									<div class="col-md-4 contact-details">
											<h4><i class="fa fa-phone"></i> Ligue</h4>
											<p>84 98892 0750</p>
									</div>
									<div class="col-md-4 contact-details">
											<h4><i class="fa fa-map-marker"></i> Visite</h4>
											<p>Tirol, 700
													<br>Natal, RN, Brasil</p>
									</div>
									<div class="col-md-4 contact-details">
											<h4><i class="fa fa-envelope"></i> Email</h4>
											<p><a href="mailto:mail@example.com">mail@example.com</a>
											</p>
									</div>
							</div>
							<div class="row social">
									<div class="col-lg-12">
											<ul class="list-inline">
													<li><a href="#"><i class="fa fa-facebook fa-fw fa-2x"></i></a>
													</li>
													<li><a href="#"><i class="fa fa-twitter fa-fw fa-2x"></i></a>
													</li>
													<li><a href="#"><i class="fa fa-linkedin fa-fw fa-2x"></i></a>
													</li>
											</ul>
									</div>
							</div>
							<div class="row copyright">
									<div class="col-lg-12">
											<p class="small">&copy; 2015</p>
									</div>
							</div>
					</div>
			</footer>
	<!--	</div>  /footer -->

<!--	</div>  /container -->
<!-- Core Scripts -->
<?php
echo $this->Html->script(array('plugins/retina/retina.min', 'jquery', 'bootstrap/bootstrap.min', 'plugins/jquery.easing.min', 'plugins/classie', 'plugins/cbpAnimatedHeader', 'plugins/owl-carousel/owl.carousel', 'plugins/jquery.magnific-popup/jquery.magnific-popup.min', 'plugins/background/core', 'plugins/background/transition', 'plugins/background/background', 'plugins/jquery.mixitup', 'plugins/wow/wow.min', 'contact_me', 'plugins/jqBootstrapValidation', 'vitality'));
?>

	<!-- <?php// echo $this->element('sql_dump'); ?>  -->
</body>
</html>
