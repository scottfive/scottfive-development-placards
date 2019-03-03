<?php
/**
 * Plugin Name: ScottFive™ Development Placards
 * Plugin URI: https://scottfive.com/
 * Description: Displays placards to help developers distinguish between development and live/production versions of sites they are working on.
 * Version: 1.0
 * Author: Scott Bryner, Dyspersion Media Corporation
 * Author URI: https://dyspersion.com
 *
 * This is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.
 *
 * This software is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this package. If not, see <http://www.gnu.org/licenses/>.
 *
 * @todo Add admin options to control nagbar text and colors, WP Admin notification text, and selection of body background png.
 *
 * @package SFDP
 * @category Plugin
 * @author Scott Bryner
 * @version 1.0
 */


/**
 * FUNCTIONAL DESCRIPTION:
 *
 * For the wp-admin side of the site, we attach our nagbar to the bottom of the
 * #wpadminbar div.
 *
 * For the regular, non-admin side of the side, we prepend our nagbar to body
 * so it shows at the top of the page.
 *
 * In both cases, our stylesheet adds a 2em padding to the top of the body, and
 * a transparent png is placed in the body background with the text 'DEVELOPMENT'.
 */


// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ){ exit; }


/**
 * sfdp_enqueue
 *
 * Enqueues our stylesheet and javascript.
 */
function sfdp_enqueue(){
	// Enqueue our main stylesheet and javascript.
	wp_enqueue_style( 'sfdp-style', trailingslashit( plugin_dir_url( __FILE__ ) ) . 'assets/sfdevplacards.css', array() , '1.0' );
	wp_enqueue_script( 'sfdp-script', trailingslashit( plugin_dir_url( __FILE__ ) ) . 'assets/sfdevplacards.js', array(), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'sfdp_enqueue' );
add_action( 'admin_enqueue_scripts', 'sfdp_enqueue' );



/**
 * sfdp_attach_admin_notice
 *
 * Attaches a standard admin warning box to the admin pages only.
 */
function sfdp_attach_admin_notice(){
?>
	<div class="notice notice-warning"><p><strong>You are running this on a development server.</strong></p></div>
<?php
}
add_action( 'admin_notices', 'sfdp_attach_admin_notice', 1000 );
