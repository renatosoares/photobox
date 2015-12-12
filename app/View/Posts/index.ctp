<!-- File: /app/View/Posts/index.ctp -->

<h1>Blog posts</h1>
<p><?php echo $this->Html->link('Add Post', array('action' => 'add')); ?></p>
<p><?php echo $this->Html->link('Usuários', array('controller' => 'Users', 'action' => 'index')); ?></p>
<?php  echo $this->Session->read('Auth.User.username'); ?>

<table>
    <tr>
    	<th>Autor</th>
        <th>Id</th>
        <th>Title</th>
        <th>Actions</th>
        <th>Created</th>
    </tr>

<!-- Here's where we loop through our $posts array, printing out post info -->

    <?php foreach ($posts as $post): ?>



    <tr>
    	<td>
    		<?php
    			foreach ($users as $user):
    				if($post['Post']['user_id'] == $user['User']['id']):
    					echo $user['User']['username'];
    					break;
					else:
						continue;
					endif;
				endforeach;
    		?>
    	</td>
        <td><?php echo $post['Post']['id']; ?></td>
        <td>
            <?php
                echo $this->Html->link(
                    $post['Post']['title'],
                    array('action' => 'view', $post['Post']['id'])
                );
            ?>
        </td>
        <td>
            <?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $post['Post']['id']),
                    array('confirm' => 'Are you sure?')
                );
            ?>
            <?php
                echo $this->Html->link(
                    'Edit', array('action' => 'edit', $post['Post']['id'])
                );
            ?>
        </td>
        <td>
            <?php echo $post['Post']['created']; ?>
        </td>
    </tr>
    <?php endforeach; ?>

</table>
<?php echo $this->Html->link(
    'Add Post',
    array('controller' => 'posts', 'action' => 'add')
); ?>


<section id="explorer">
    <div class="container text-center wow fadeIn">
        <h2>EXPLORE O PHOTOBOX</h2>
        <hr class="colored">
        <p>Pesquise as nossas principais categorias para encontrar as fotos que necessita.</p>
        <div class="row content-row">
            <div class="col-lg-12">
                <div class="portfolio-filter">
                    <ul id="filters" class="clearfix">
                        <li>
                            <span class="filter active" data-filter="identity graphic logo web">All</span>
                        </li>
                        <li>
                            <span class="filter" data-filter="identity">Identity</span>
                        </li>
                        <li>
                            <span class="filter" data-filter="graphic">Graphic</span>
                        </li>
                        <li>
                            <span class="filter" data-filter="web">Web</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div id="portfoliolist">

                  <?php foreach ($posts as $post): ?>

                    <div class="portfolio graphic" data-cat="graphic" href="#portfolioModal3" data-toggle="modal">
                        <div class="portfolio-wrapper">
                            <img src="img/portfolio/grid/graphic/5.jpg" alt="">
                            <div class="caption">
                                <div class="caption-text">
                                  <?php    echo $this->Html->link( $post['Post']['title'], array( 'action' => 'view', $post['Post']['id']), array('class' => 'text-title') ); ?>
                                    <!-- , 'class' => 'text-title' -->
                                    <span class="text-category">Categoria ???</span>
                                </div>
                                <div class="caption-bg"></div>
                            </div>
                        </div>
                    </div>
                  <?php endforeach; ?>
                </div> <!-- /portifolio list -->
            </div>
        </div>
    </div>
</section> <!-- listagem de imagens -->



    <section class="cta-form bg-dark" id="newsletter">
        <div class="container text-center">
            <h3>Assine nossa newsletter!</h3>
            <hr class="colored">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <!-- MailChimp Signup Form -->
                    <div id="mc_embed_signup">
                        <!-- Replace the form action in the line below with your MailChimp embed action! For more informatin on how to do this please visit the Docs! -->
                        <form role="form" action="http://startbootstrap.us3.list-manage.com/subscribe/post?u=531af730d8629808bd96cf489&amp;id=afb284632f" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank" novalidate>
                            <div class="input-group input-group-lg">
                                <input type="email" name="EMAIL" class="form-control" id="mce-EMAIL" placeholder="Email address...">
                                <span class="input-group-btn">
                                    <button type="submit" name="subscribe" id="mc-embedded-subscribe" class="btn btn-primary">Inscreva-se!</button>
                                </span>
                            </div>
                            <div id="mce-responses">
                                <div class="response" id="mce-error-response" style="display:none"></div>
                                <div class="response" id="mce-success-response" style="display:none"></div>
                            </div>
                        </form>
                    </div>
                    <!-- End MailChimp Signup Form -->
                </div>
            </div>
        </div>
    </section>
    <section id="contact">
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>FALE CONOSCO</h2>
                    <hr class="colored">
                    <p> Por favor, diga-nos sobre seu próximo projeto e veremos o que podemos fazer para ajudá-lo. </p>
                </div>
            </div>
            <div class="row content-row">
                <div class="col-lg-8 col-lg-offset-2">
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Nome</label>
                                <input type="text" class="form-control" placeholder="Name" id="name" required data-validation-required-message="Please enter your name.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Email </label>
                                <input type="email" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Celular</label>
                                <input type="tel" class="form-control" placeholder="Phone Number" id="phone" required data-validation-required-message="Please enter your phone number.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-outline-dark">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
