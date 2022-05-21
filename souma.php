<?php
/*
Plugin Name: souma 
Plugin URI: https://wordpress.com
Description: form de feedback
Version: 1.0
Author: Souma
Author URI: https://wordpress.com
*/

if( !defined('ABSPATH'))
{
    die;
}

class Souma{

    public function __construct()
    {
        //Create custom post type
        add_action('init', array($this, 'create_custom_post_type'));   
        
        //Add assets (js, css, etc)
        add_shortcode('feedback-form', array($this, 'load_shortcode'));

        //Add shortcode
        add_action('wp_enqueue_scripts', array($this, 'load_assets'));
    }

    public function create_custom_post_type()
    {
        $args= array(
            'public' => true,
            'has_archive' => true,
            'supports' => array('title'),
            'exlude_from_search' => true,
            'publicly_queryable' => false,
            'capability' => 'manage_options',
            'labels' => array(
                'name' => 'Feedback Form',
                'singular_name' => 'Feedback Form Entry'
            ),
            'menu_icon' => 'dashicons-media-text'
        );

        register_post_type('simple_feedback_form', $args);
    }

    public function load_assets()
    {
        wp_enqueue_style(
            'simple-feedback-form',
            plugin_dir_url(__FILE__) . 'css/feedback.css',
            array(), 
            1, 
            'all'
        );
    }

    public function load_shortcode()
    {?>
    <script src="https://cdn.tailwindcss.com"></script>
    <div style="background-image:url('https://i.pinimg.com/564x/d9/d3/61/d9d361878bfcfa801a96ae9f466fbe11.jpg')  ;" class="bg-no-repeat bg-cover object-cover h-2/4 w-2/4 m-auto rounded-lg p-5">
    <h1 style="text-align:center ;" class=" font-black text-lg text-5xl text-black content-center m-4"> Feedback Form</h1>
    <div class="">
        <h3>Please help us to serve you better by taking a couple of minutes. </h3>
        <form action="http://localhost/wordpress/e-commerce/thank-you/" method="post" class="agile_form">
            <h2 class="mb-7">How satisfied were you with our Service?</h2>
            <ul class="">
            <li>
                <input class="ml-2 mb-3" type="radio" name="view" value="very satisfied" id="very satisfied" required> 
                <label class="text-black font-extrabold" for="very satisfied">very satisfied</label>
                <div class="check w3"></div>
            </li>
            <li>
                <input class="ml-2 mb-3" type="radio" name="view" value="satisfied" id="satisfied"> 
                <label class="text-black font-extrabold" for="satisfied"> satisfied</label>
                <div class=""></div>
            </li>
            <li>
                <input class="ml-2 mb-3" type="radio" name="view" value="neutral" id="neutral">
                <label class="text-black font-extrabold" for="neutral">neutral</label>
                <div class=""></div>
            </li>
            <li>
                <input class="ml-2 mb-3" type="radio" name="view" value="unsatisfied" id="unsatisfied"> 
                <label class="text-black font-extrabold" for="unsatisfied">unsatisfied</label>
                <div class=""></div>

            <li>
                <input class="ml-2 mb-3" type="radio" name="view" value="very unsatisfied" id="very unsatisfied"> 
                <label class="text-black font-extrabold" for="very unsatisfied">very unsatisfied</label>
                <div class=""></div>
            </li>
            </ul>
            <h2 class="mt-7">If you have specific feedback, please write to us...</h2>
            <div><textarea placeholder="Additional comments" class="h-24 w-full rounded-lg" name="comments" required=""></textarea></div>
            <div><input class="h-10 w-full rounded-lg mt-3" type="text" placeholder="Your Name (optional)" name="name"/></div>
            <div><input class="h-10 w-full rounded-lg mt-3" type="email" placeholder="Your Email (optional)" name="email"/></div>
            <div><input class="h-10 w-full rounded-lg mt-3" type="text" placeholder="Your Number (optional)" name="num"/></div>
            <div><input type="hidden" name="id" value="<?php echo get_the_ID() ?> "></div>
            <div class="md:flex md:justify-center mt-4"><input type="submit" name="submit" value="submit" class=" rounded-lg h-10 w-20 bg-blue-700 font-bold font-sans border-none text-white hover:bg-blue-500 p-10" /></div>
        </form>
    </div>
</div>

    <?php }
}

new Souma;

global $wpdb;
if (isset($_POST['submit'])) {
   $comments = $_POST['comments'];
   $name = $_POST['name'];
   $email = $_POST['email'];
   $num = $_POST['num'];
   $id = $_POST['id'];
   $view = $_POST['view'];
   
   $wpdb->insert('wp_feedback', array('comments' => $comments, 'name' => $name, 'email' => $email, 'num' => $num, 'view' => $view, 'id' => $id));
   echo " <script> alert('thank you for send us your feedback ') </script>";
   header('refresh:0', 'Location: ' . $_SERVER['HTTP_REFERER']);
   exit();
}