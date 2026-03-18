<?php
/**
 * Plugin Name: WPProAtoZ Use YARPP as Query for Elementor Related Posts
 * Plugin URI: https://wpproatoz.com
 * Description: This plugin integrates YARPP (Yet Another Related Posts Plugin) with Elementor Posts/Loop widgets. It overrides the default query for any widget with Query ID "yarpp_related" to display truly relevant related posts based on YARPP's advanced algorithm (content similarity, tags, categories, etc.). Ideal for single post templates to show smarter "related posts" sections.
 * Version: 1.0.0
 * Requires at least: 6.0
 * Requires PHP: 8.0
 * Author: WPProAtoZ.com
 * Author URI: https://wpproatoz.com
 * Text Domain: yarrp-for-elementor-query
 * Update URI: https://github.com/Ahkonsu/wpproatoz-yarrp-for-elementor-query/releases
 * GitHub Plugin URI: https://github.com/Ahkonsu/wpproatoz-yarrp-for-elementor-query
 * GitHub Branch: main
 * Requires Plugins: yet-another-related-posts-plugin, elementor
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

 ////***check for updates code

require 'plugin-update-checker/plugin-update-checker.php';
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

$myUpdateChecker = PucFactory::buildUpdateChecker(
	'https://github.com/Ahkonsu/wpproatoz-yarrp-for-elementor-query/',
	__FILE__,
	'wpproatoz-yarrp-for-elementor-query'
);

//Set the branch that contains the stable release.
$myUpdateChecker->setBranch('main');

//$myUpdateChecker->getVcsApi()->enableReleaseAssets();
 
 
//Optional: If you're using a private repository, specify the access token like this:
//$myUpdateChecker->setAuthentication('your-token-here');

/////////////////////

// Hook into Elementor's custom query filter using the chosen Query ID
add_action( 'elementor/query/yarpp_related', 'integrate_yarpp_into_elementor_posts_widget', 10, 2 );

function integrate_yarpp_into_elementor_posts_widget( $query, $widget ) {
    // Static flag to prevent recursion (one-time per request)
    static $is_running = false;
    if ( $is_running ) {
        return; // Bail if already processing (prevents re-entrancy)
    }
    $is_running = true;

    // Your existing safety check
    if ( ! is_singular( 'post' ) ) { // Adjust 'post' if using CPT
        $is_running = false;
        return;
    }

    global $post;
    if ( ! $post || empty( $post->ID ) ) {
        $is_running = false;
        return;
    }

    $yarpp_args = array(
        'limit'     => 4,
        'template'  => false,
        'post_type' => 'post',
        // Add weights/threshold if needed
    );

    // Fetch related – this is the call that can recurse, but flag prevents it
    $related_posts = yarpp_get_related( $yarpp_args, $post->ID );

    if ( ! empty( $related_posts ) && is_array( $related_posts ) ) {
        $related_ids = wp_list_pluck( $related_posts, 'ID' );

        $query->set( 'post__in', $related_ids );
        $query->set( 'orderby', 'post__in' );
        $query->set( 'posts_per_page', count( $related_ids ) );
    } else {
        // Fallback: empty or recent (your choice)
        $query->set( 'post__in', array() );
        // Or uncomment for recent posts fallback:
        // $query->set( 'orderby', 'date' );
        // $query->set( 'order', 'DESC' );
        // $query->set( 'posts_per_page', 4 );
    }

    $query->set( 'post__not_in', array( $post->ID ) );

    // Reset flag after done
    $is_running = false;
}