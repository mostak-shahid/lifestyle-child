<?php
//Add theme setup
if ( ! function_exists( 'mosacademy_child_setup' ) ) :
	function mosacademy_child_setup() {
		//add_image_size( string $name, int $width, int $height, bool|array $crop = false );
		register_nav_menus( array(
			'bottommenu' => __('Bottom Menu', 'moslatest'),
		));
	}
endif;
add_action( 'after_setup_theme', 'mosacademy_child_setup' );
function custom_js () {
	?>
<script>
jQuery(document).ready(function($) {
	$('#banner-form .btn-icon').click(function(){		
		$(this).toggle();
		$(this).siblings().toggle();
		$('#banner-form .second-row').slideToggle();
	});	
});
</script>
	<?php
}
add_action( 'wp_footer', 'custom_js', 99999, 1 );