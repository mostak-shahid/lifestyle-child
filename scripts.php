<?php 
global $mosacademy_options; 
function child_gradient_manager($options) {
	$from = $options['from'];
	$to = $options['to'];
	echo 'background: '.$from.';';
	echo 'background: -moz-linear-gradient(top,  '.$from.' 0%, '.$to. ' 100%);';
	echo 'background: -webkit-linear-gradient(top,  '.$from.' 0%, '.$to. ' 100%);';
	echo 'background: linear-gradient(to bottom, '.$from.' 0%, '.$to. ' 100%);';
	echo 'filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="'.$from.'", endColorstr="'.$to.'",GradientType=0 );';
}
function child_theme_css () {
global $mosacademy_options; 
?>
<style>
<?php if ($mosacademy_options['sections-partner-background-type'] == 1) : ?>
#section-partner {<?php child_gradient_manager($mosacademy_options['sections-partner-background-gradient'])?>}
<?php endif;?>
<?php if ($mosacademy_options['sections-testimonial-background-type'] == 1) : ?>
#section-testimonial {<?php child_gradient_manager($mosacademy_options['sections-testimonial-background-gradient'])?>}
<?php endif;?>
</style>
<?php
}
add_action( 'wp_head', 'child_theme_css', 999, 1 );
function child_theme_js () {
	global $mosacademy_options; 
?>
<script>
	jQuery(document).ready(function($) {
	});
</script>
	<?php
}
add_action( 'wp_footer', 'child_theme_js', 998, 1 );