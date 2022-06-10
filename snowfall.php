<?php

/*
Plugin Name: Snow fall
Plugin URI: http://wordpress.org/estelle
Description: This plugin is for the snow fall
Author: Estelle
Version: 1.0
Author URI: http://ma.tt/
*/

//display content in front
function display_snowflakes($content){
    return '<div class="snowflakes" aria-hidden="true">

<div class="snowflake">
'.get_option('my_flake_value') .'
</div>
<div class="snowflake">
'.get_option('my_flake_value') .'
</div>
<div class="snowflake">
'.get_option('my_flake_value') .'
</div>
<div class="snowflake">
'.get_option('my_flake_value') .'
</div>
<div class="snowflake">
'.get_option('my_flake_value') .'
</div>
<div class="snowflake">
'.get_option('my_flake_value') .'
</div>
<div class="snowflake">
'.get_option('my_flake_value') .'
</div>
<div class="snowflake">
'.get_option('my_flake_value') .'
</div>
<div class="snowflake">
'.get_option('my_flake_value') .'
</div>
<div class="snowflake">
'.get_option('my_flake_value') .'
</div>
</div>' .$content;
}

add_filter("the_content","display_snowflakes",1);

//get the css file
function enqueue_my_snowfall_css(){
    wp_enqueue_style(
        'my_snowfall',
        plugin_dir_url(__FILE__) .'/snowfall.css'
    );
}

add_action("wp_enqueue_scripts","enqueue_my_snowfall_css");

add_action("admin_menu","my_admin_page");

function my_admin_page(){
    add_menu_page("manage the snow fall","Snowfall", "manage_options", "snowfall-plugin", "my_admin_page_function");
}

function my_setting(){
    if(!get_option('my_flake_value')){
    register_setting('my_snowflake_option_group', 'my_flake_value');
    update_option('my_flake_value', '❄');
    }
}

add_action('admin_init','my_setting');


function my_admin_page_function(){
   echo "<h1> This is my admin page !</h1>";
?>

   <h2>Please choose your emoji:</h2>
   <p>$_POST return : <?php print_r($_POST)?></p>
   <?php
   if (isset($_POST['my-flake']))  update_option('my_flake_value', $_POST['my-flake']);
    ?>
    <p>Value of my option : <?php echo get_option("my_flake_value") ?></p>
   <form method="post">
       <label for="">❄</label>
       <input type="radio" name="my-flake" id="my-flake" value="❄" 
       <?=(get_option('my_flake_value')==='❄') ? 'checked' : null ?>>

       <label for="">🕉</label>
       <input type="radio" name="my-flake" id="my-flake" value="🕉" 
       <?=(get_option('my_flake_value')==='🕉') ? 'checked' : null ?>>

       <label for="">💧</label>
       <input type="radio" name="my-flake" id="my-flake" value="💧" 
       <?=(get_option('my_flake_value')==='💧') ? 'checked' : null ?>>
       <?php submit_button() ?>
   </form>
   <?php
}
