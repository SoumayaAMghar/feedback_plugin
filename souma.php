<?php
/*
Plugin Name: souma 
Plugin URI: https://wordpress.com
Description: form de feedback
Version: 0.1
Author: Souma
Author URI: https://wordpress.com
*/

function add_my_stylesheet() 
{
    wp_enqueue_style( 'style', plugins_url( 'souma/includes/css/style.css', __FILE__ ) );
}

// add_action('admin_print_styles', 'add_my_stylesheet');

// wp_register_style( 'namespace', 'includes/css/style.css' );

function feedback_contact_plugin()
{
    add_my_stylesheet();
    $content = '';
    $content .= '<h1 class="agile_head text-center">Feedback Form</h1>';
    $content .= '<div class="w3layouts_main wrap">';
    $content .= '<h3>Please help us to serve you better by taking a couple of minutes. </h3>';
    $content .= '<form action="http://localhost/wordpress/e-commerce/thank-you/" method="post" class="agile_form">';
    $content .= '<h2>How satisfied were you with our Service?</h2>';
    $content .= '<ul class="agile_info_select">';
    $content .= '<li><input type="radio" name="view" value="very satisfied" id="very satisfied" required> ';
    $content .= '<label for="very satisfied">very satisfied</label>';
    $content .= '<div class="check w3"></div>';
    $content .= '</li>';
    $content .= '<li><input type="radio" name="view" value="satisfied" id="satisfied"> ';
    $content .= '<label for="satisfied"> satisfied</label>';
    $content .= '<div class="check w3ls"></div>';
    $content .= '</li>';
    $content .= '<li><input type="radio" name="view" value="neutral" id="neutral">';
    $content .= '<label for="neutral">neutral</label>';
    $content .= '<div class="check wthree"></div>';
    $content .= '</li>';
    $content .= '<li><input type="radio" name="view" value="unsatisfied" id="unsatisfied"> ';
    $content .= '<label for="unsatisfied">unsatisfied</label>';
    $content .= '<li><input type="radio" name="view" value="very unsatisfied" id="very unsatisfied"> ';
    $content .= '<label for="very unsatisfied">very unsatisfied</label>';
    $content .= '<div class="check w3_agileits"></div>';
    $content .= '</li>';
    $content .= '</ul>';
    $content .= '<h2>If you have specific feedback, please write to us...</h2>';
    $content .= '<textarea placeholder="Additional comments" class="w3l_summary" name="comments" required=""></textarea>';
    $content .= '<input type="text" placeholder="Your Name (optional)" name="name"/>';
    $content .= '<input type="email" placeholder="Your Email (optional)" name="email"/>';
    $content .= '<input type="text" placeholder="Your Number (optional)" name="num"/><br>';
    $content .= '<center><input type="submit" name="submit-contact" value="submit Feedback" class="agileinfo" /></center>';
    $content .= '</form>';
    $content .= '</div>';
    $content .= '<div class="agileits_copyright text-center">';
    $content .= '</div>';
   	
    echo $content;

}

add_shortcode('feedback_contact', 'feedback_contact_plugin');
function feedback_contact_capture()
{
    
    if (isset($_POST['submit-contact'])) {
        $view = $_POST['view'];
        $comments = sanitize_textarea_field($_POST['comments']);
        $name = sanitize_text_field($_POST['name']);
        $email = sanitize_text_field($_POST['email']);
        $num = sanitize_text_field($_POST['num']);

    $to = 'amghar.souma@gmail.com';
    $subject = 'Test form submission';
    $message = ''.$name.' - '.$email.' - '.$comments;
        wp_mail($to,$subject,$message);        
    }
}
add_action('wp_head','feedback_contact_capture');