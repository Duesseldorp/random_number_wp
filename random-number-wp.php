<?php
/*
Plugin Name: Random Number WP
Description: A tool to assign random numbers to a list of names and display them in a sorted list. Use the shortcode [random_number_wp] to display the tool.
Version: 1.0
Author: Martin Gräbing
Text Domain: random-number-wp
Domain Path: /languages
*/

// Load the text domain for translations
function rnw_load_textdomain() {
    load_plugin_textdomain(
        'random-number-wp', // Text domain
        false, // Deprecated argument (always false)
        dirname(plugin_basename(__FILE__)) . '/languages' // Relative path to languages folder
    );
}
add_action('plugins_loaded', 'rnw_load_textdomain');

// Enqueue CSS and JavaScript
function rnw_enqueue_scripts() {
    // Enqueue CSS
    wp_enqueue_style('rnw-style', plugins_url('style.css', __FILE__));

    // Enqueue JavaScript
    wp_enqueue_script('rnw-script', plugins_url('script.js', __FILE__), array('jquery'), null, true);

    // Localize script for translations and nonce
    wp_localize_script('rnw-script', 'rnw_translations', array(
        'enter_names' => esc_html__('Please enter at least one name.', 'random-number-wp'),
        'invalid_input' => esc_html__('Invalid input. Only letters, numbers, and commas are allowed.', 'random-number-wp'),
        'sorted_list' => esc_html__('Sorted List:', 'random-number-wp'),
        'nonce' => wp_create_nonce('rnw_nonce'), // Add nonce for security
    ));
}
add_action('wp_enqueue_scripts', 'rnw_enqueue_scripts');

// Shortcode to display the tool
function rnw_shortcode() {
    ob_start(); // Start output buffering
    ?>
    <div class="rnw-container">
        <h1 class="rnw-heading"><?php echo esc_html__('Random Number WP', 'random-number-wp'); ?></h1>
        <div class="rnw-explanation-box">
            <p>
                <?php echo esc_html__('This tool assigns a random number to each name you enter. After displaying the results one by one, it shows a sorted list of names and their numbers in ascending order. Perfect for games, contests, or team assignments!', 'random-number-wp'); ?>
            </p>
        </div>
        <form id="rnw-form">
            <label for="rnw-names"><?php echo esc_html__('Enter names (comma-separated):', 'random-number-wp'); ?></label>
            <textarea id="rnw-names" rows="4" required></textarea>
            <button type="submit"><?php echo esc_html__('Start', 'random-number-wp'); ?></button>
        </form>
        <div id="rnw-output" class="rnw-output"></div>
        <div id="rnw-sorted-list" class="rnw-sorted-list"></div>
    </div>
    <?php
    return ob_get_clean(); // Return the buffered content
}
add_shortcode('random_number_wp', 'rnw_shortcode');