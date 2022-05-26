<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://nielsoffice197227997.wordpress.com/
 * @since      1.0.0
 *
 * @package    Getratings
 * @subpackage Getratings/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Getratings
 * @subpackage Getratings/admin
 * @author     nielsoffice <nielsoffice.wordpress.php@gmail.com>
 */
class WPGetRatingsMenu {

    public function __construct()
    {

       add_action( 'admin_menu', [ $this,'nielsofice_wine_wp_get_rating_wine' ] );
       add_action( 'admin_menu', [ $this,'wp_wine_get_ratings_category' ] );
       add_action( 'admin_menu', [ $this,'wp_wine_get_ratings_layout' ] );

    }

    /**
     * Defined: create admin menu back end wp for create post
     * @since 25.05.2022
     */
    public function nielsofice_wine_wp_get_rating_wine() : void  {

    add_menu_page(

      'Get Ratings',
      'WP Add Ratings',
      'manage_options',
      'wp-get-ratings',
      [$this, 'wp_get_rating_wine_rendered'],
      'dashicons-format-quote'
    
    );
    
  }

  /**
   * Defined: create admin sub menu back end wp for adding categpry
   * @since 25.05.2022
   */  
  public function wp_wine_get_ratings_category() : void  {
    
    add_submenu_page(

      'wp-get-ratings',  
      'GetRatings Taxonomy',
      'Add Categories',
      'manage_options',
      'get-ratings-categories',
      [$this, 'wp_wine_get_ratings_category_rendered']

    );
   
  }
  
  /**
   * Defined: create admin sub menu back end wp for adding layout
   * @since 25.05.2022
   */  
  public function wp_wine_get_ratings_layout() : void  {
    
    add_submenu_page(

      'wp-get-ratings', 
      'GetRatings',
      'Get Ratings',
      'manage_options',
      'get-ratings',
      [$this, 'wp_wine_get_ratings_layout_rendered']

    );
    
  }

  /**
   * Defined: call back function class for Admin menu 
   * @since 25.05.2022
   */    
   public function wp_get_rating_wine_rendered() {

     require_once ( 'WPGetRatingWineRendered.php' );
     if( class_exists('WPGetRatingWineRendered') ) {
       new WPGetRatingWineRendered();
     }

   }

  /**
   * Defined: call back function class for sub menu
   * @since 25.05.2022
   */   
   public function wp_wine_get_ratings_category_rendered() {

    require_once ( 'WPWineGetRatingsCategoryRendered.php' );
    if( class_exists('WPWineGetRatingsCategoryRendered') ) {
      new WPWineGetRatingsCategoryRendered();
    }

   }

  /**
   * Defined: call back function class for sub menu
   * @since 25.05.2022
   */   
   public function wp_wine_get_ratings_layout_rendered() {
    
    require_once ( 'WPWineGetRatingsLayoutRendered.php' );
    if( class_exists('WPWineGetRatingsLayoutRendered') ) {
      new WPWineGetRatingsLayoutRendered();
    }

   }

}


