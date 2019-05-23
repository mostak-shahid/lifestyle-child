<?php
// add_action( 'action_before_footer', 'bottom_section_fnc', 10, 1 );
// function bottom_section_fnc ($page_details) {
//  get_template_part( 'template-parts/section', 'bottom' );
// }
add_action( 'action_before_banner_title', 'banner_layout_start_func', 11, 1 );
function banner_layout_start_func ($page_details) {
    echo '<div class="row"><div class="col-lg-6">';
}
add_action( 'action_after_contact_form', 'banner_layout_end_func', 10 , 1 );
add_action( 'action_after_banner_url', 'banner_layout_end_func', 9 , 1 );
function banner_layout_end_func ($page_details) {
    echo '</div></div>';
}


add_action( 'action_before_contact_form', 'contact_layout_start_func', 9, 1 );
function contact_layout_start_func ($page_details) {
    echo '<div class="row"><div class="col-lg-5 offset-lg-1 order-lg-last">';
    echo '<div class="contact-info text-center">';
    echo do_shortcode( '[phone index=1][email index=1]' );
    echo '</div></div><div class="col-lg-6 order-lg-first">';
}

add_action( 'wp_head', 'remove_theme_actions' );
function remove_theme_actions () {
    remove_action( 'mos_welcome_content', 'mos_welcome_content_fnc', 10, 1 );
    remove_action( 'mos_welcome_content', 'mos_welcome_media_fnc', 15, 1 );
    remove_action( 'action_above_header', 'small_device_logo_fnc' );
}
add_action( 'init', 'child_text_layout_manager' );
function child_text_layout_manager () {
    global $mosacademy_options;
    //Custom Service
    if ($mosacademy_options['sections-partner-text-layout'] == 'container-fliud-spacing') {
        add_action( 'action_before_partner', 'start_container_fluid', 10, 1 );
        add_action( 'action_before_partner', 'start_row', 11, 1 );
        add_action( 'action_before_partner', 'start_container_col_10', 12, 1 );

        add_action( 'action_after_partner', 'end_div', 10, 1 );
        add_action( 'action_after_partner', 'end_div', 11, 1 );
        add_action( 'action_after_partner', 'end_div', 12, 1 );   
    } elseif ($mosacademy_options['sections-partner-text-layout'] == 'container-fliud') {
        add_action( 'action_before_partner', 'start_container_fluid', 10, 1 );
        add_action( 'action_after_partner', 'end_div', 10, 1 );
    } elseif ($mosacademy_options['sections-partner-text-layout'] == 'container-full') {
        add_action( 'action_before_partner', 'start_full_width', 10, 1 );
        add_action( 'action_after_partner', 'end_div', 10, 1 );
    } else {
        add_action( 'action_before_partner', 'start_container', 10, 1 );
        add_action( 'action_after_partner', 'end_div', 10, 1 );
    }
    //Testimonial
    if ($mosacademy_options['sections-testimonial-text-layout'] == 'container-fliud-spacing') {
        add_action( 'action_before_testimonial', 'start_container_fluid', 10, 1 );
        add_action( 'action_before_testimonial', 'start_row', 11, 1 );
        add_action( 'action_before_testimonial', 'start_container_col_10', 12, 1 );

        add_action( 'action_after_testimonial', 'end_div', 10, 1 );
        add_action( 'action_after_testimonial', 'end_div', 11, 1 );
        add_action( 'action_after_testimonial', 'end_div', 12, 1 );   
    } elseif ($mosacademy_options['sections-testimonial-text-layout'] == 'container-fliud') {
        add_action( 'action_before_testimonial', 'start_container_fluid', 10, 1 );
        add_action( 'action_after_testimonial', 'end_div', 10, 1 );
    } elseif ($mosacademy_options['sections-testimonial-text-layout'] == 'container-full') {
        add_action( 'action_before_testimonial', 'start_full_width', 10, 1 );
        add_action( 'action_after_testimonial', 'end_div', 10, 1 );
    } else {
        add_action( 'action_before_testimonial', 'start_container', 10, 1 );
        add_action( 'action_after_testimonial', 'end_div', 10, 1 );
    }
}
add_action( 'mos_welcome_content', 'mos_child_welcome_content_fnc', 10, 1 );
add_action( 'mos_welcome_content', 'mos_child_welcome_media_fnc', 15, 1 );
function mos_child_welcome_content_fnc () {
    global $mosacademy_options;
    $title = $mosacademy_options['sections-welcome-title'];
    $content = $mosacademy_options['sections-welcome-content'];
    $image = wp_get_attachment_url( $mosacademy_options['sections-welcome-media']['id']);
    $image_align = $mosacademy_options['sections-welcome-media-align'];
    $readmore = $mosacademy_options['sections-welcome-readmore'];
    $url = $mosacademy_options['sections-welcome-url'];
    $cls = '';
    if($image_align == 'top') $cls = 'col-lg-12 order-last';
    elseif($image_align == 'right') $cls = 'col-lg-5';
    elseif($image_align == 'bottom') $cls = 'col-lg-12';
    elseif($image_align == 'left') $cls = 'col-lg-5 offset-lg-1 order-last';


    if ($readmore == 'scroll') $class = "with-scroll"; 
    elseif ($readmore == 'button') $class = "with-button"; 
    elseif ($readmore == 'popup') $class = "with-popup"; 
    elseif ($readmore == 'redirect') $class = "with-redirect"; 
    else $class = "with-none";
    if ($readmore == 'popup') : ?>
<!-- Modal -->
<div class="modal fade" id="welcomeModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo do_shortcode( $title ); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo do_shortcode( $content );//the_content(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php endif;
    if ($image) echo '<div class="row"><div class="'. $cls .'">';
    if ($title) echo '<div class="title-wrapper"><h2 class="title">' . do_shortcode( $title ) . '</h2></div>';
    if ($content) echo '<div class="desc '.$class .'"> '.do_shortcode( $content ).'</div>';
    if ($readmore == 'button') echo '<a href="javascript:void(0)" class="btn btn-welcome expand">Read More</a><a href="javascript:void(0)" class="btn btn-welcome bend" style="display: none">Close</a>';
    elseif ($readmore == 'popup') echo '<a href="javascript:void(0)" class="btn btn-welcome popup" data-toggle="modal" data-target="#welcomeModal">Read More</a>';
    elseif ($readmore == 'redirect') echo '<a href="'.esc_sql( do_shortcode( $url ) ) .'" class="btn btn-welcome redirect">Read More</a>';
    if ($image) echo '</div>';
}

function mos_child_welcome_media_fnc () {
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    if ( is_plugin_active( 'mos-image-alt/mos-image-alt.php' ) ) {
        $alt_tag = mos_alt_generator(get_the_ID());
    } 
    global $mosacademy_options;    
    $image = wp_get_attachment_url( $mosacademy_options['sections-welcome-media']['id']);    
    $image_align = $mosacademy_options['sections-welcome-media-align'];
    $cls = '';
    if($image_align == 'top') $cls = 'col-lg-12 order-first';
    elseif($image_align == 'right') $cls = 'col-lg-6 offset-lg-1';
    elseif($image_align == 'bottom') $cls = 'col-lg-12';
    elseif($image_align == 'left') $cls = 'col-lg-6 order-first';
    if ($image) echo '<div class="'. $cls .'"><div class="img-wrapper"><img class="img-responsive img-fluid img-centered img-welcome" src="'.$image.'" width="'.$mosacademy_options['sections-welcome-media']['width'].'" height="'.$mosacademy_options['sections-welcome-media']['height'].'" alt="'.$alt_tag['inner'] . $title.'"></div></div></div>';
}