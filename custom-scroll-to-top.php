<?php 

/**
 * Plugin Name:             Custom Scroll To Top Wp
 * Plugin URI:              https://wordpress.org/plugins/custom-scroll-to-top
 * Description:             It will enable scrolling back to the top, and you can modify background color and   also width of scroll icon and border radius.
 * Version:                 1.0.0
 * Requires at least:       5.2
 * Requires PHP:            7.2
 * Author:                  Shakil Khan
 * Author URI:              http://my-portfolio-app-3f665.web.app/
 * License:                 GPLv2 or later
 * License URI:             https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:              https://www.github.com/shakilkhan496
 * Text Domain:             sstt
 */


 //including css
  function sstt_enqueue_style(){
    wp_enqueue_style('sstt-style', plugins_url( 'css/sstt-style.css', __FILE__ ));
  }
  add_action( 'wp_enqueue_scripts','sstt_enqueue_style' );


  //including js
  function sstt_enqueue_scripts(){
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'sstt-plugin-script', plugins_url( 'js/sstt-plugin.js',__FILE__ ),array(),'1.0.0','true' );
  }
  add_action( 'wp_enqueue_scripts','sstt_enqueue_scripts' );

  
  
  //activate javascript

  function sstt_scroll_script(){
    ?>

<script>
jQuery(document).ready(function() {
    jQuery.scrollUp();
})
</script>
<?php }
add_action( "wp_footer", "sstt_scroll_script" );


//plugin customization settings
add_action( 'customize_register','sstt_scroll_to_top' );
function sstt_scroll_to_top($wp_customize){
  $wp_customize-> add_section('sstt_scroll_top_section', array(
    'title' => __('Scroll To Top','Shakil Khan'),
    'description' => __('It will enable scrolling back to the top, and you can modify background color and   also width of scroll icon and border radius.'),
  ));


  //bg color settings
  $wp_customize -> add_setting('sstt_default_color', array(
    'default' => '#000000',
  ));

  $wp_customize-> add_control('sstt_default_color', array(
    'label' => 'Background Color',
    'section' => 'sstt_scroll_top_section',
    'type' => 'color',
  ));






  //width
  $wp_customize -> add_setting('sstt_default_width', array(
    'default' => '50px',
  ));

  $wp_customize-> add_control('sstt_default_width', array(
    'label' => 'Width',
    'section' => 'sstt_scroll_top_section',
    'type' => 'width',
  ));


  //border radius
  $wp_customize -> add_setting('sstt_default_borderRadius', array(
    'default' => '50%',
  ));

  $wp_customize-> add_control('sstt_default_borderRadius', array(
    'label' => 'Border Radius',
    'section' => 'sstt_scroll_top_section',
    'type' => 'border-radius',
  ));



  //Position bottom
  $wp_customize -> add_setting('sstt_default_positionBottom', array(
    'default' => '30px',
  ));

  $wp_customize-> add_control('sstt_default_positionBottom', array(
    'label' => 'Position Bottom',
    'section' => 'sstt_scroll_top_section',
    'type' => 'bottom',
  ));


  //Position Right
  $wp_customize -> add_setting('sstt_default_positionRight', array(
    'default' => '30px',
  ));

  $wp_customize-> add_control('sstt_default_positionRight', array(
    'label' => 'Position Right',
    'section' => 'sstt_scroll_top_section',
    'type' => 'right',
  ));






}

// theme customization css

function sstt_customization(){
  ?>
<style>
#scrollUp {
    background-color: <?php print get_theme_mod('sstt_default_color') ?>;
    width: <?php print get_theme_mod('sstt_default_width') ?>;
    height: <?php print get_theme_mod('sstt_default_width') ?>;
    border-radius: <?php print get_theme_mod('sstt_default_borderRadius') ?>;
    bottom: <?php print get_theme_mod('sstt_default_positionBottom') ?>;
    right: <?php print get_theme_mod('sstt_default_positionRight') ?>;


}
</style>
<?php
}
add_action( 'wp_head','sstt_customization' );
  
?>