jQuery(document).ready(function($) {    
    var page_template = $('#page_template').val();
    show_child_meta_boxes (page_template);

    $('#page_template').change(function(){
        var page_template = $(this).val();
        show_child_meta_boxes(page_template);
    });

    function show_child_meta_boxes(page_template) {
        if(page_template == 'page-template/about-page.php') {
            $('#_mosacademy_child_person_details').show();
        } else {
           $('#_mosacademy_child_person_details').hide();
        }
    }
}); 
