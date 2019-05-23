<?php /*Template Name: Testimonial Page Template*/ ?>
<?php 
global $mosacademy_options;
$avobe_page = get_post_meta( get_the_ID(), '_mosacademy_avobe_page', true );
$before_page = get_post_meta( get_the_ID(), '_mosacademy_before_page', true );
$after_page = get_post_meta( get_the_ID(), '_mosacademy_after_page', true );
$below_page = get_post_meta( get_the_ID(), '_mosacademy_below_page', true );

$all_sections = get_post_meta( get_the_ID(), '_mosacademy_page_section_layout', true );
$sections = ( @$all_sections["Enabled"] ) ? @$all_sections["Enabled"] : $mosacademy_options['page-layout-settings']['Enabled'];
?>
<?php
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'mos-image-alt/mos-image-alt.php' ) ) {
	$alt_tag = mos_alt_generator(get_the_ID());
} 
?>
<?php 
get_header(); 
echo do_shortcode( $avobe_page );
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_page', $page_details ); 
?>
<?php $image_per_page =  get_post_meta( get_the_ID(), '_mosacademy_image_per_page', true ) ? get_post_meta( get_the_ID(), '_mosacademy_image_per_page', true ) : 6;?>
<?php $page_layout = get_post_meta( get_the_ID(), '_mosacademy_page_layout', true )? get_post_meta( get_the_ID(), '_mosacademy_page_layout', true ) : $mosacademy_options['general-page-layout']; ?>
<section id="testimonial-page" class="page-content">
	<div class="content-wrap">

		<?php 
		/*
		* action_before_gallery_page hook
		* @hooked start_container 10 (output .container)
		*/
		do_action( 'action_before_page', $page_details ); 
		echo do_shortcode( $before_page );
		?>
		<?php if($page_layout != 'ns') : ?>
			<div class="row">
				<div class="<?php if($page_layout != 'ns' ) echo 'col-md-8'; if($page_layout == 'ls') echo ' col-md-push-4' ?>">
			<?php endif; ?>
				<?php if ( have_posts() ) :?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php do_action( 'action_before_page_content_area', $page_details ); ?>	
					
					<?php get_template_part( 'content', 'page' ); ?>	
<?php
$args = array(
	'post_type' => 'testimonial',
	'posts_per_page' => -1
);
$n = 1;
$the_query = new WP_Query( $args );?>
<?php if ( $the_query->have_posts() ) :?>
	<div id="testimonials-con">
	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<?php
		$designation = get_post_meta( get_the_ID(), '_mos_testimonial_designation', true );
		?>
		<div class="media text-center <?php if ($n%2==0) echo 'text-sm-right'; else echo 'text-sm-left' ?>">
			<?php if ($n%2!=0) : ?>
			<img class="testimonial-icon mr-3" src="<?php echo get_stylesheet_directory_uri() ?>/images/Testimonials-user-transparent.png" class="mr-3" alt="<?php echo $alt_tag['inner'] . get_the_title() ?>">
			<?php endif; ?>
			<div class="media-body">
				<div class="desc"><?php the_content(); ?></div>
				<h5 class="author"><?php echo get_the_title(); ?></h5>
				<?php if($designation) : ?>
				<div class="desi"><?php echo $designation ?></div>
				<?php endif ?>
			</div>
			<?php if ($n%2==0) : ?>
			<img class="testimonial-icon ml-3" src="<?php echo get_stylesheet_directory_uri() ?>/images/Testimonials-user-transparent.png" class="mr-3" alt="<?php echo $alt_tag['inner'] . get_the_title() ?>">
			<?php endif; ?>
		</div>
		<?php $n++; ?>
	<?php endwhile; ?>	
	</div>
	<?php wp_reset_postdata();?>
<?php endif;?>
					<?php do_action( 'action_after_page_content_area', $page_details ); ?>
					</div>				
				<?php endif; ?>
			<?php if($page_layout != 'ns') : ?>
				</div>
				<div class="page-widgets col-md-4 <?php if($page_layout == 'ls') echo 'col-md-pull-8' ?>">
					<?php get_sidebar('page');?>
				</div>
			</div>
			<?php endif; ?>
		<?php 
		/*
		* action_after_gallery_page hook
		* @hooked end_div 10
		*/
		echo do_shortcode( $after_page ); 
		do_action( 'action_after_page', $page_details );
		?>
	</div>
</section>
<?php 
echo do_shortcode( $below_page );
do_action( 'action_below_page', $page_details ); 
?>
<?php if($sections ) { foreach ($sections as $key => $value) { get_template_part( 'template-parts/section', $key );}}?>
<?php get_footer(); ?>

