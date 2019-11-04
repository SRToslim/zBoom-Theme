﻿<?php get_header(); ?>

<?php
/*
Template Name: Home
*/
?>
<?php global $zBoom; ?>

<?php if($zBoom['opt-slider-visible'] == 1) : ?>
	<div class="featured">
		<div class="wrap-featured zerogrid">
			<div class="slider">
				<div class="rslides_container">
					<ul class="rslides" id="slider">
						<?php
							$slideritems = new wp_query(array(
								'post_type' => 'zboomslider'
							));
						?>
						
						<?php while($slideritems->have_posts()) : $slideritems->the_post(); ?>
						<li><?php the_post_thumbnail(); ?></li>
						<?php endwhile; ?>					
					</ul>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>

<!--------------Content--------------->
<section id="content">
	<div class="wrap-content zerogrid">
		<div class="row block01">
			<?php 
				$blockitems = new wp_query(array(
					'post_type' => 'zboomservices',
					'posts_per_page' => 3
				));
			?>
			<?php while($blockitems->have_posts()) : $blockitems->the_post(); ?>
				<div class="col-1-3">
					<div class="wrap-col box">
						<?php the_post_thumbnail(); ?>
						<h2><?php the_title(); ?></h2>
						<p><?php read_more(10); ?></p>
						<div class="more">
							<a href="<?php the_permalink(); ?>">
								<button style="">Read More</button>
							</a>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
		</div>
		<div class="row block02">
			<div class="col-2-3">
				<div class="wrap-col fbox">
					<div class="heading"><h2>Latest Blog</h2></div>
					<?php
						$post_contentss = new wp_query(array(
							'post_type' => 'post',
							'posts_per_page' => 5
						));
					?>
					<?php while($post_contentss->have_posts()) : $post_contentss->the_post(); ?>
						<article class="row">
							<div class="col-1-3">
								<div class="wrap-col">
									<?php the_post_thumbnail(); ?>
								</div>
							</div>
							<div class="col-2-3">
								<div class="wrap-col">
									<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
									<div class="info">By <?php the_author(); ?> on <?php the_time('F d, Y | g:i a'); ?> with <?php comments_popup_link(); ?></div>
									<p><?php read_more(15); ?>..... <a href="<?php the_permalink(); ?>"><button style="">Read More</button></a></p>
								</div>
							</div>
						</article>
					<?php endwhile; ?>
				</div>
			</div>
			<div class="col-1-3">
				<div class="wrap-col">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>