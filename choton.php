
<?php

/*
 * Plugin Name:       choton
 * Plugin URI:        http://www.chotonbhowmik.com/
 * Description:       Handle the basics with this plugin.
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Choton Bhowmik
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       my-basics-plugin
 * Domain Path:       /languages
 */
 //Create a function called "wporg_init" if it doesn't already exist
/* Create one or more meta boxes to be displayed on the post editor screen. */
// function smashing_add_post_meta_boxes() {

//   add_meta_box(
//     'smashing-post-class',      // Unique ID
//     esc_html__( 'Post Class', 'example' ),    // Title
//     'smashing_post_class_meta_box',   // Callback function
//     'post',         // Admin page (or post type)
//     'side',         // Context
//     'default'         // Priority
//   );
// }


// function wporg_create_post_type()
// {
//     $post_type_params = [/* ... */];
 
//     register_post_type(
//         'post_type_slug',
//         apply_filters( 'wporg_post_type_params', $post_type_params )
//     );



// /**
//  * Adds a privacy policy statement.
//  */
// function wporg_add_privacy_policy_content() {
//     if ( ! function_exists( 'wp_add_privacy_policy_content' ) ) {
//         return;
//     }
//     $content = '<p class="privacy-policy-tutorial">' . __( 'Some introductory content for the suggested text.', 'text-domain' ) . '</p>'
//             . '<strong class="privacy-policy-tutorial">' . __( 'Suggested Text:', 'my_plugin_textdomain' ) . '</strong> '
//             . sprintf(
//                 __( 'When you leave a comment on this site, we send your name, email address, IP address and comment text to example.com. Example.com does not retain your personal data. The example.com privacy policy is <a href="%1$s" target="_blank">here</a>.', 'text-domain' ),
//                 'https://example.com/privacy-policy'
//             );
//     wp_add_privacy_policy_content( 'Example Plugin', wp_kses_post( wpautop( $content, false ) ) );
// }
 
// add_action( 'admin_init', 'wporgmy_example_plugin_add_privacy_policy_content' );


//for creating a top level menu

function wporg_options_page_html() {
    ?>
    <div class="wrap">
      <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
      <form action="" method="post">
        <?php
        // output security fields for the registered setting "wporg_options"
        settings_fields( 'wporg_options' );
        // output setting sections and their fields
        // (sections are registered for "wporg", each field is registered to a specific section)
        do_settings_sections( 'wporg' );
        ?>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
        <?php
        // output save settings button
        submit_button( __( 'Save Settings', 'textdomain' ) );
        ?>
      </form>
    </div>
    <?php
}
add_action( 'admin_menu', 'wporg_options_page' );
function wporg_options_page() {
    add_menu_page(
        'WPOrg',
        'Choton Options',
        'manage_options',
        'wporg',
        'wporg_options_page_html',
        plugin_dir_url(__FILE__) . 'images/download.png',
        20
    );
}
function choton_option_menu() {
    // check user capabilities
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }
    ?>
    <div class="wrap">
        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
        <form action="options.php" method="post">
            <?php
            // output security fields for the registered setting "wporg_options"
            settings_fields( 'wporg_options' );
            // output setting sections and their fields
            // (sections are registered for "wporg", each field is registered to a specific section)
            do_settings_sections( 'wporg' );
            // output save settings button
            submit_button( __( 'Save Settings', 'textdomain' ) );
            ?>
        </form>
    </div>
    <?php
}
function choton_page()
{
    add_submenu_page(
        'tools.php',
        'WPOrg Options',
        'WPOrg Options',
        'manage_options',
        'wporg',
        'choton_option_menu'
    );
}
add_action('admin_menu', 'choton_page');

function choton_smenu(){
$args = array(
    'public' => true,
    'label' => 'choton book',
);
register_post_type('choton book', $args);
}
add_action('init', 'choton_smenu');
?>