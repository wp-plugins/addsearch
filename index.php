<?php

/**
 * @package AddSearch
 * @version 1.6
 */
/*
  Plugin Name: AddSearch Instant Search
  Plugin URI: http://www.addsearch.com/support/wordpress-plugin/
  Description: AddSearch is an instant site search engine for your website. 
  Author: AddSearch Ltd.
  Version: 1.0
  Author URI: http://addsearch.com/
 */

if(!empty($_POST['ccsave'])){
    $code = trim($_POST['custommercode']);
    update_option('addSearchCustomerKey',$code);
}

function AddSearchActive(){
    add_option('addSearchCustomerKey','');
}

register_activation_hook(__FILE__,AddSearchActive);

function AddSearchDeactive(){
    delete_option('addSearchCustomerKey');
}

register_deactivation_hook(__FILE__,AddSearchDeactive);

function AddSearchAdmin(){
    include_once 'adminform.php';
}

function AddSearchMenu() {
    add_menu_page('Setup Instant Search For Your Website', 'AddSearch', 'manage_options', 'addsearch-admin', 'AddSearchAdmin');
}
add_action( 'admin_menu', 'AddSearchMenu' );


class AddSearchWidget extends WP_Widget {
    public function __construct() {
        parent::__construct(
                'AddSearchWidget', // Base ID
                'AddSearch Instant Search', // Name
                array('description' => 'Instant Search for Your Website! Use this to replace your default site search engine. Set your customer key on admin page before using this widget.')
        );
        
    }
    
    public function widget($args, $instance) {
        extract($args); 
        $result = '<script type="text/javascript" src="//addsearch.com/js/?key='.get_option('addSearchCustomerKey').'"></script>';
        $addSearchCustomerKey = get_option('addSearchCustomerKey');
        ?>
        <p id="AddSearchWidget">   
            <?php if($instance['title']!=''){?>
            <h2 class="widget-title"><?php echo $instance['title'] ?></h2>
            <?php }?>
        <?php
        if(!empty($addSearchCustomerKey)){
            echo $result;
        }else{
            echo '';
        }
        ?>
        </p>
        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];      
        return $instance;
    }

    public function form($instance) {
        if (empty($instance['title'])) {
            $title = '';
        } else {
            $title = $instance['title'];
        }
        
        ?>
       
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>     
        <?php
    }

}

add_action('widgets_init', create_function('', 'register_widget( "AddSearchWidget" );'));
?>