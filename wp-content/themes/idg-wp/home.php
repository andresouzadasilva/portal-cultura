<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Identidade_Digital_do_Governo_-_WordPress
 */

get_header();
?>

	<main id="main" class="site-main">

		<section class="carousel-wrapper">
			<?php
			$args               = array(
				'posts_per_page' => 3,
				'category_name'  => 'destaque'
			);
			$feature_news_query = new WP_Query( $args ); ?>

			<?php if ( $feature_news_query->have_posts() ) : $i = 0; ?>
				<div id="jumbotron-carousel" class="carousel slide carousel-fade" data-ride="carousel"
				     data-interval="5000">
					<div class="carousel-inner">
						<?php while ( $feature_news_query->have_posts() ) : $feature_news_query->the_post(); ?>
							<div class="carousel-item <?php echo $i == 0 ? 'active' : ''; ?>">
								<?php
								if ( has_post_thumbnail() ) {
									$post_thumb = get_the_post_thumbnail_url();
								} else {
									$post_thumb = get_template_directory_uri() . '/assets/img/teste-personagem.jpg';
								}
								?>
								<img class="d-block w-100" src="<?php echo $post_thumb; ?>" alt="Second slide">
								<div class="carousel-caption d-none d-md-block">
									<div class="container">
										<a href="#">
											<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
											<?php the_excerpt(); ?>
										</a>
									</div>
								</div>
							</div>
							<?php $i ++; endwhile;
						wp_reset_postdata(); ?>
					</div>
					<a class="carousel-control-prev" href="#jumbotron-carousel" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#jumbotron-carousel" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
					<ol class="carousel-indicators">
						<?php
						for ( $indicators = 0; $indicators < $i; $indicators ++ ) {
							$class = $indicators == 0 ? 'active' : '';
							echo '<li data-target="#jumbotron-carousel" data-slide-to="' . $indicators . '" class="' . $class . '"></li>';
						}
						?>
					</ol>
				</div>
			<?php endif; ?>
		</section>

		<section class="services mt-5 mb-5">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<h2 class="section-title mb-5 text-center">Serviços</h2>
					</div>
					<div class="col-sm-12 col-md-6 col-lg-3 text-center mb-4">
						<div class="feature-card static-height">
							<div class="align">
								<div class="icon icon-lei-rouanet"></div>
								<h3 class="card-title">Lei Rouanet</h3>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-md-6 col-lg-3 text-center mb-4">
						<div class="feature-card static-height">
							<div class="align">
								<div class="icon icon-editais"></div>
								<h3 class="card-title">Editais</h3>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-md-6 col-lg-3 text-center mb-4">
						<div class="feature-card static-height">
							<div class="align">
								<div class="icon icon-apoio"></div>
								<h3 class="card-title">Apoio à Projetos</h3>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-md-6 col-lg-3 text-center mb-4">
						<div class="feature-card static-height">
							<div class="align">
								<div class="icon icon-patrimonio"></div>
								<h3 class="card-title">Patrimônio</h3>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-md-6 col-lg-3 text-center mb-4">
						<div class="feature-card static-height">
							<div class="align">
								<div class="icon icon-centros-culturais"></div>
								<h3 class="card-title">Centros Culturais</h3>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-md-6 col-lg-3 text-center mb-4">
						<div class="feature-card static-height">
							<div class="align">
								<div class="icon icon-pontos-cultura"></div>
								<h3 class="card-title">Pontos de Cultura</h3>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-md-6 col-lg-3 text-center mb-4">
						<div class="feature-card static-height">
							<div class="align">
								<div class="icon icon-snc"></div>
								<h3 class="card-title">SNC</h3>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-md-6 col-lg-3 text-center mb-4">
						<div class="feature-card static-height">
							<div class="align">
								<div class="icon icon-economia-criativa"></div>
								<h3 class="card-title">Economia Criativa</h3>
							</div>
						</div>
					</div>
					<div class="col-lg-12 text-center">
						<a href="#" class="btn text-uppercase mt-4">Mais Serviços</a>
					</div>
				</div>
			</div>
		</section>
		<section id="noticias" class="pb-5 pt-5 bg-grey-2">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<h2 class="section-title mb-5 text-center">Notícias</h2>
					</div>
					<?php
					$args      = array(
						'posts_per_page' => 3,
						'category_name'  => 'noticias'
					);
					$news_query = new WP_Query( $args ); ?>

					<?php if ( $news_query->have_posts() ) : ?>

						<?php while ( $news_query->have_posts() ) : $news_query->the_post(); ?>
							<h2></h2>
							<div class="col-lg-4">
								<?php
								if ( has_post_thumbnail() ) {
									$post_thumb = get_the_post_thumbnail_url();
								} else {
									$post_thumb = get_template_directory_uri() . '/assets/img/fake-img.jpg';
								}
								?>
								<div class="highlight-box" style="background-image: url('<?php echo $post_thumb; ?>')">
									<div class="box-body">
										<?php if( $post_subtitle = get_post_meta( $post->ID, '_post_subtitle', true ) ): ?>
											<span class="cat"><?php echo $post_subtitle?></span>
										<?php endif; ?>
										<h3 class="box-title">
											<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										</h3>
									</div>
								</div>
							</div>
						<?php endwhile; ?>

						<?php wp_reset_postdata(); ?>

					<?php else : ?>
						<p class="text-uppercase text-center">Sem notícias</p>
					<?php endif; ?>
				</div>
				<div class="col-lg-12 text-center">
					<a href="<?php echo home_url( '/categoria/noticias/' ); ?>" class="btn text-uppercase mt-5">Mais
						notícias</a>
				</div>
			</div>
		</section>

		<section class="pt-5 pb-5 mb-5" id="agenda">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<?php echo do_shortcode( '[gs-agenda]' ); ?>
					</div>
				</div>
			</div>
		</section>

		<section class="pt-5 pb-5 mb-5">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<h2 class="section-title mb-5 text-center">Conheça o Ministério</h2>
					</div>
					<div class="col-sm-12 col-md-6 col-lg-3 text-center mb-4">
						<div class="feature-card static-height card-2">
							<div class="align">
								<div class="icon icon-ministro"></div>
								<h3 class="card-title"><a href="#">O Ministro</a></h3>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-md-6 col-lg-3 text-center mb-4">
						<div class="feature-card static-height card-2">
							<div class="align">
								<div class="icon icon-ministerio"></div>
								<h3 class="card-title"><a href="#">O Ministério</a></h3>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-md-6 col-lg-3 text-center mb-4">
						<div class="feature-card static-height card-2">
							<div class="align">
								<div class="icon icon-secretarias"></div>
								<h3 class="card-title"><a href="#">Secretarias</a></h3>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-md-6 col-lg-3 text-center">
						<div class="feature-card static-height card-2">
							<div class="align">
								<div class="icon icon-vinculadas"></div>
								<h3 class="card-title"><a href="#">Entidades Vinculadas</a></h3>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-md-6 col-lg-3 text-center">
						<div class="feature-card static-height card-2">
							<div class="align">
								<div class="icon icon-internacional"></div>
								<h3 class="card-title"><a href="#">Internacional</a></h3>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-md-6 col-lg-3 text-center">
						<div class="feature-card static-height card-2">
							<div class="align">
								<div class="icon icon-acoes-programadas"></div>
								<h3 class="card-title"><a href="#">Ações e Programas</a></h3>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-md-6 col-lg-3 text-center">
						<div class="feature-card static-height card-2">
							<div class="align">
								<div class="icon icon-legislacao"></div>
								<h3 class="card-title"><a href="#">Legislação</a></h3>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-md-6 col-lg-3 text-center">
						<div class="feature-card static-height card-2">
							<div class="align">
								<div class="icon icon-escritorios-regionais"></div>
								<h3 class="card-title"><a href="#">Escritórios Regionais</a></h3>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="pt-5 pb-5" id="section-content">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<h2 class="section-title mb-5 text-center">Conteúdos</h2>
					</div>
					<div class="col-md-6 col-lg-3 text-center">
						<div class="feature-card static-height active card-2">
							<div class="align">
								<div class="icon icon-assessoria"></div>
								<h3 class="card-title"><a href="#">Imprensa</a></h3>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 text-center">
						<div class="feature-card static-height active card-2">
							<div class="align">
								<div class="icon icon-noticias"></div>
								<h3 class="card-title"><a href="#">Notícias</a></h3>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 text-center">
						<div class="feature-card static-height active card-2">
							<div class="align">
								<div class="icon icon-publicacoes"></div>
								<h3 class="card-title"><a href="#">Publicações</a></h3>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 text-center">
						<div class="feature-card static-height active card-2">
							<div class="align">
								<div class="icon icon-multimidia"></div>
								<h3 class="card-title"><a href="#">Multimídia</a></h3>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="mt-5 mb-5">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<h2 class="section-title mb-5 text-center">Participação Social</h2>
					</div>
					<div class="col-lg-3 mb-4 text-center">
						<div class="feature-card">
							<div class="align">
								<div class="icon icon-fale-conosco"></div>
								<h3 class="card-title">Fale Conosco</h3>
								<p class="card-desc">Mande sua dúvida ou sugestão sobre o site do MinC</p>
								<a class="card-btn btn" href="#">Acesse</a>
							</div>
						</div>
					</div>
					<div class="col-lg-3 mb-4 text-center">
						<div class="feature-card">
							<div class="align">
								<div class="icon icon-consultas-publicas"></div>
								<h3 class="card-title">Consultas Públicas</h3>
								<p class="card-desc">Espaço de construção conjunta entre governo e sociedade</p>
								<a class="card-btn btn" href="#">Acesse</a>
							</div>
						</div>
					</div>
					<div class="col-lg-3 mb-4 text-center">
						<div class="feature-card">
							<div class="align">
								<div class="icon icon-ouvidoria"></div>
								<h3 class="card-title">Ouvidoria</h3>
								<p class="card-desc">Canal para envio de sugestões, elogios, solicitações e
									denúncias</p>
								<a class="card-btn btn" href="#">Acesse</a>
							</div>
						</div>
					</div>
					<div class="col-lg-3 mb-4 text-center">
						<div class="feature-card">
							<div class="align">
								<div class="icon icon-dados-br"></div>
								<h3 class="card-title">Dados.br</h3>
								<p class="card-desc">Ferramenta para obtenção de dados e as informações públicas</p>
								<a class="card-btn btn" href="#">Acesse</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="mt-5" id="multimidia">
			<div class="container">
				<div class="row">

					<div class="video"
					     style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/video-thumb.png');"></div>

					<div class="col-lg-4">
						<div class="highlight-box"
						     style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/default.png')"></div>
					</div>
					<div class="col-lg-4">
						<div class="highlight-box"
						     style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/default.png')"></div>
					</div>
					<div class="col-lg-4">
						<div class="highlight-box"
						     style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/default.png')"></div>
					</div>
				</div>
			</div>
		</section>

	</main>

<?php
get_footer();