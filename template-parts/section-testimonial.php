<?php 
global $mosacademy_options;
$animation = $mosacademy_options['sections-testimonial-animation'];
$animation_delay = ( $mosacademy_options['sections-testimonial-animation-delay'] ) ? $mosacademy_options['sections-testimonial-animation-delay'] : 0;
$title = $mosacademy_options['sections-testimonial-title'];
$content = $mosacademy_options['sections-testimonial-content'];


include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'mos-image-alt/mos-image-alt.php' ) ) {
	$alt_tag = mos_alt_generator(get_the_ID());
} 
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_testimonial', $page_details ); 
?>
<section id="section-testimonial" <?php if ($animation) echo 'data-wow-delay="'.$animation_delay.'s" class="wow '.$animation.'"' ?>>
	<div class="content-wrap">
		
		<?php 
		/*
		* action_before_testimonial hook
		* @hooked start_container 10 (output .container)
		*/
		do_action( 'action_before_testimonial', $page_details ); 
		?>
				<?php if ($title) : ?>				
					<div class="title-wrapper">
						<h2 class="title"><?php echo do_shortcode( $title ); ?></h2>				
					</div>
				<?php endif; ?>
				<?php if ($content) : ?>				
					<div class="content-wrapper"><?php echo do_shortcode( $content ) ?></div>
				<?php endif; ?>
<?php
$args = array(
	'post_type' => 'testimonial',
	'posts_per_page' => -1
);
$the_query = new WP_Query( $args );?>
<?php if ( $the_query->have_posts() ) :?>
	<div id="testimonials" class="owl-carousel owl-theme">
	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<?php
		$author = get_post_meta( get_the_ID(), '_mos_testimonial_designation', true );
		?>
		<div class="wrapper">
			<div class="desc"><?php the_content(); ?></div>
			<div class="author"><?php echo get_the_title(); ?></div>
			<?php if($author) : ?>
			<div class="desi"><?php echo $author ?></div>
			<?php endif ?>
		</div>
	<?php endwhile; ?>	
	</div>
	<?php wp_reset_postdata();?>
<?php endif;?>
		<?php 
		/*
		* action_after_testimonial hook
		* @hooked end_div 10 
		*/
		do_action( 'action_after_testimonial', $page_details ); 
		?>	
	</div>
</section>
<?php do_action( 'action_below_testimonial', $page_details  ); ?>