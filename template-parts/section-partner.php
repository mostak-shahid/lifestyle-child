<?php 
global $mosacademy_options;
$animation = $mosacademy_options['sections-partner-animation'];
$animation_delay = ( $mosacademy_options['sections-partner-animation-delay'] ) ? $mosacademy_options['sections-partner-animation-delay'] : 0;
$title = $mosacademy_options['sections-partner-title'];
$content = $mosacademy_options['sections-partner-content'];
$slides = $mosacademy_options['sections-partner-slides'];


include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'mos-image-alt/mos-image-alt.php' ) ) {
	$alt_tag = mos_alt_generator(get_the_ID());
} 
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_partner', $page_details ); 
?>
<section id="section-partner" <?php if ($animation) echo 'data-wow-delay="'.$animation_delay.'s" class="wow '.$animation.'"' ?>>
	<div class="content-wrap">
		
		<?php 
		/*
		* action_before_partner hook
		* @hooked start_container 10 (output .container)
		*/
		do_action( 'action_before_partner', $page_details ); 
		?>
				<?php if ($title) : ?>				
					<div class="title-wrapper">
						<h2 class="title"><?php echo do_shortcode( $title ); ?></h2>				
					</div>
				<?php endif; ?>
				<?php if ($content) : ?>				
					<div class="content-wrapper"><?php echo do_shortcode( $content ) ?></div>
				<?php endif; ?>
				<?php if (sizeof($slides) > 1) : ?>
					<div class="partner-logos">
						<div class="row">
						<?php foreach ($slides as $slide):?>
							<div class="col-sm-6 col-md-4 col-lg-2">
								<div class="unit">
									<?php if ($slide["attachment_id"]) : ?>
										<img class="img-responsive img-fluid img-partner" src="<?php echo wp_get_attachment_url( $slide["attachment_id"] ); ?>" alt="<?php echo $alt_tag['inner'] . strip_tags(do_shortcode( $slide['title'] ))?>" width="<?php echo $slide["width"] ?>" height="<?php echo $slide["height"] ?>">
									<?php endif; ?>
									<?php if ($slide["url"]) : ?>
										<a class="hiddne-link" href="<?php echo esc_url( do_shortcode( $slide["url"] ) ) ?>">View More</a>
									<?php endif; ?>
								</div>
							</div>
						<?php endforeach; ?>
						</div>
					</div>
				<?php endif; ?>
		<?php 
		/*
		* action_after_partner hook
		* @hooked end_div 10 
		*/
		do_action( 'action_after_partner', $page_details ); 
		?>	
	</div>
</section>
<?php do_action( 'action_below_partner', $page_details  ); ?>