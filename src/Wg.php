<?php
/**
 * @package Wordpress Plugin Post Favorite
 * @category Wordpress
 * @version 1.0
 * @author Thiago Trivelato(ttrivelato@gmail.com)
 */

class favorites_widget extends WP_Widget 
{
    /**
     * @name __construct
     * @access public
     * @return Construct the Widget Plugin
     */
    function __construct() 
    {
        parent::__construct('favorites_widget',__( 'Favorites Widget' ),array( 'description' => __('List of Favorites')));
    }
    
    /**
     * @name widget
     * @access public
     * @return Manipule the widget WP
     * @param collection $args obj $instance
     */
    public function widget($args, $instance) 
    {
        $listTitleFavorites = array();
        $listTitleFavorites = \Wppf::listTitleFavorites();
        
        $title = apply_filters('widget_title', $instance['title']);
        
        echo $args['before_widget'];
        
        if (!empty($title)) 
        {
            echo $args['before_title'] . $title . $args['after_title'];
        }
               
        ?>

        <ul id="wppf-favorite-widget">
            
            <!--Verify if not exist favorite -->            
            <?php if(count($listTitleFavorites) == 0):?>
            
                <li><?php echo __('Favorites is empty');?></li>
            
            <?php else:?>
                <?php
                foreach ($listTitleFavorites as $key => $favorite) 
                {
                    echo "<li><a href=?p=$key>$favorite</a></li>";
                }
                ?>
            <?php endif;?>
            
        </ul>

        <?php
        echo $args['after_widget'];
    }

    /**
     * @name form
     * @access public
     * @return Manipule the widget WP
     * @param obj $instance
     */
    public function form($instance) 
    {
        if (isset($instance['title'])) 
        {
            $title = $instance['title'];
        } else {
            $title = __('New title');
        }
        ?>
        
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>"/>
        </p>
            
        <?php
    }
    
    /**
     * @name update
     * @access public
     * @return Manipule the widget WP
     * @param obj $new_instance obj/string $old_instance
     */
    public function update($new_instance, $old_instance = "") 
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';

        return $instance;
    }
}

function fv_wd() {
    register_widget('favorites_widget');
}