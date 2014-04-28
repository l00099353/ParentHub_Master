<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Site Front Page
 *
 * Note: You can overwrite front-page.php as well as any other Template in Child Theme.
 * Create the same file (name) include in /responsive-child-theme/ and you're all set to go!
 * @see            http://codex.wordpress.org/Child_Themes and
 *                 http://themeid.com/forum/topic/505/child-theme-example/
 *
 * @file           front-page.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2014 CyberChimps
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/front-page.php
 * @link           http://codex.wordpress.org/Template_Hierarchy
 * @since          available since Release 1.0
 */

/**
 * Globalize Theme Options
 */
$responsive_options = responsive_get_options();
/**
 * If front page is set to display the
 * blog posts index, include home.php;
 * otherwise, display static front page
 * content
 */
if ( 'posts' == get_option( 'show_on_front' ) && $responsive_options['front_page'] != 1 ) {
	get_template_part( 'home' );
} elseif ( 'page' == get_option( 'show_on_front' ) && $responsive_options['front_page'] != 1 ) {
	$template = get_post_meta( get_option( 'page_on_front' ), '_wp_page_template', true );
	$template = ( $template == 'default' ) ? 'index.php' : $template;
	locate_template( $template, true );
} else {

	get_header();

	//test for first install no database
	$db = get_option( 'responsive_theme_options' );
	//test if all options are empty so we can display default text if they are
	$empty = ( empty( $responsive_options['home_headline'] ) && empty( $responsive_options['home_subheadline'] ) && empty( $responsive_options['home_content_area'] ) ) ? false : true;

	?>
	
	
	
		<div>
			<H2>Working together to provide up to date information to support parents.</H2>
		</div>
		
			<div class="main">
				
					<div class="mynav">
						<ul>
							<li><a href="<?php	_e( 'Pregnancy', 'responsive' );?>" class="orange button2">Pregnancy</a></li>
				
							<li><a href="<?php	_e( 'Baby-0-5', 'responsive' );?>"class="blue button2">Baby (0-5)</a></li>
				
							<li><a href="<?php	_e( 'Child-6-12', 'responsive' );?>"class="yellow button2">Child (6-12)</a></li>
				
							<li><a href="<?php	_e( 'Teenager-13-18', 'responsive' );?>"class="green button2">Teenager (13-18)</a></li>
				
							<li><a href="<?php	_e( 'Parenting', 'responsive' );?>"class="red button2">Parenting</a></li>
				
							<li><a href="<?php	_e( 'Family Life', 'responsive' );?>"class="pink button2">Family Life</a></li>
						</ul>	
					</div>
				
					<div class="content1">
					
							<h3>Welcome to the Parent Hub Donegal. This site provides details of a wide range
								of services provided by statutory, voluntary and community organisations. 
								You can access up to date information about day to day parenting challenges. 
								The Parent Hub will signpost parents, young people, children and practitioners
								in Donegal to find local services to meet their needs.
							</h3>
					</div>
					
						<div class="content2">
							<img src = "http://localhost/wordpress/wp-content/uploads/2014/04/advice.jpg"  alt="Pathways to support" style="display: block; margin: 0 auto" >
						</div>
						
	
		
			</div>
			
	
				
			
	

		
	<?php
	get_sidebar( 'home' );
	get_footer();
}
?>
