<?php
/**
 * Fired during plugin activation
 *
 * @link       https://everestthemes.com
 * @since      1.0.0
 *
 * @package    Viable_Blog
 * @subpackage Viable_Blog/includes/widgets
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Viable_Blog
 * @subpackage Viable_Blog/includes/widgets
 * @author     everestthemes <everestthemes@gmail.com>
 */
class Viable_Blog_Author_Widget extends WP_Widget {
 
    function __construct() { 

        parent::__construct(
            'viable-blog-author-widget',  // Base ID
            esc_html( 'VB: Author Widget', 'viable-blog' ),   // Name
            array(
                'classname' => 'vb_author_widget',
                'description' => esc_html__( 'Displays Brief Author Description.', 'viable-blog' ), 
            )
        );
    }
 
    public function widget( $args, $instance ) {

        $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
            
        $author_page = !empty( $instance['author_page'] ) ? $instance['author_page'] : ''; 

        $link_title = !empty( $instance['link_title'] ) ? $instance['link_title'] : '';

        $author_signature = !empty( $instance['author_signature'] ) ? $instance['author_signature'] : '';

        echo $args[ 'before_widget' ];

            $author_args = array(
                'post_type' => 'page',
                'posts_per_page' => 1,
            ); 

            if( $author_page > 0 ) {
                $author_args['page_id'] = absint( $author_page );
            }

            $author = new WP_Query( $author_args );

            if( $author->have_posts() ) :
                if( !empty( $title ) ) {
                    echo $args['before_title'];
                    echo esc_html( $title );
                    echo $args['after_title'];
                }
                while( $author->have_posts() ) : $author->the_post();
                    ?>
                    <div class="widget_content">
                        <?php if( has_post_thumbnail() ) : ?>
                        <div class="author_thumb">
                            <?php the_post_thumbnail( 'viable-blog-thubmnail-3', array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) ); ?>
                        </div><!-- .author_thumb -->
                        <?php endif; ?>
                        <div class="author_name">
                            <h4><?php the_title(); ?></h4>
                        </div><!-- .author_name -->
                        <div class="author_bio">
                            <?php the_excerpt(); ?>
                            <?php if( !empty( $link_title ) ) : ?>
                            <a href="<?php the_permalink(); ?>"><?php echo esc_html( $link_title ); ?></a>
                            <?php endif; ?>
                        </div><!-- .author_bio -->
                        <?php if( !empty( $author_signature ) ) : ?>
                        <div class="author_signature">
                            <img src="<?php echo esc_url( $author_signature ); ?>" alt="<?php echo esc_attr( the_title() ); ?>">
                        </div><!-- .author_signature -->
                        <?php endif; ?>
                    </div><!-- .widget_content -->
                    <?php
                endwhile;
                wp_reset_postdata();                
            endif;
        echo $args[ 'after_widget' ]; 
 
    }
 
    public function form( $instance ) {
        $defaults = array(
            'title' => '',
            'author_page' => '',
            'link_title' => '',
            'author_signature' => '',
        );

        $instance = wp_parse_args( (array) $instance, $defaults );

        $author_sign_img = esc_url( $instance['author_signature'] );

        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_name('title') ); ?>">
                <strong><?php esc_html_e('Title', 'viable-blog'); ?></strong>
            </label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />   
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'author_page' ) )?>"><strong><?php echo esc_html__( 'Author Page', 'viable-blog' ); ?></strong></label>
            <?php
                wp_dropdown_pages( array(
                    'id'               => esc_attr( $this->get_field_id( 'author_page' ) ),
                    'class'            => 'widefat',
                    'name'             => esc_attr( $this->get_field_name( 'author_page' ) ),
                    'selected'         => esc_attr( $instance[ 'author_page' ] ),
                    'show_option_none' => esc_html__( '&mdash; Select Page &mdash;', 'viable-blog' ),
                    )
                );
            ?>
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_name('link_title') ); ?>">
                <strong><?php esc_html_e('Link Title', 'viable-blog'); ?></strong>
            </label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_title') ); ?>" type="text" value="<?php echo esc_attr( $instance['link_title'] ); ?>" />   
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('author_signature')); ?>">
                <strong><?php esc_html_e('Author Signature', 'viable-blog'); ?></strong>
            </label>
            <br/>
            <?php
            if (!empty($author_sign_img)) :
                echo '<img class="custom_media_image widefat" src="' . esc_url( $author_sign_img ) . '"/><br />';
            endif;
            ?>
            <input type="text" class="widefat custom_media_url"
                   name="<?php echo esc_attr($this->get_field_name('author_signature')); ?>"
                   id="<?php echo esc_attr($this->get_field_id('author_signature')); ?>" value="<?php echo esc_url( $author_sign_img ); ?>">
            <input type="button" class="button button-primary custom_media_button" id="custom_media_button"
                   name="<?php echo esc_attr($this->get_field_name('author_signature')); ?>"
                   value="<?php esc_attr_e('Upload', 'viable-blog') ?>"/>
        </p>
        <?php 
    }
 
    public function update( $new_instance, $old_instance ) {
 
        $instance = $old_instance;

        $instance['title']      = sanitize_text_field( $new_instance['title'] );

        $instance['author_page']        = absint( $new_instance['author_page'] );

        $instance['link_title']     = sanitize_text_field( $new_instance['link_title'] );

        $instance['author_signature']       = esc_url_raw( $new_instance['author_signature'] );

        return $instance;
    } 
}