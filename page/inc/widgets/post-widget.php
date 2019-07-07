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
class Viable_Blog_Post_Widget extends WP_Widget {
 
    function __construct() { 

        parent::__construct(
            'viable-blog-post-widget',  // Base ID
            esc_html( 'VB: Posts Widget', 'viable-blog' ),   // Name
            array(
                'classname' => 'vb_lastestpost_widget',
                'description' => esc_html__( 'Displays Recent, Most Commented or Editor Picked Posts.', 'viable-blog' ), 
            )
        );
    }
 
    public function widget( $args, $instance ) {

        $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		$post_choice = !empty( $instance[ 'post_choice' ] ) ? $instance[ 'post_choice' ] : 'recent';

		$posts_no = !empty( $instance[ 'post_no' ] ) ? $instance[ 'post_no' ] : 5;

		echo $args[ 'before_widget' ];

		$post_args = array(
			'posts_per_page' => absint( $posts_no ),
			'post_type' => 'post'
		);

		if( !empty( $post_choice ) ) {

			if( $post_choice == 'most_commented' ) {
				$post_args['orderby'] = 'comment_count';
				$post_args['order'] = 'desc';
			}
		}

		$post_query = new WP_Query( $post_args );

		if( $post_query->have_posts() ) :
			echo $args[ 'before_title' ];
				echo esc_html( $title );
			echo $args[ 'after_title' ];
			?>
			<div class="widget_content">
				<?php while( $post_query->have_posts() ) : $post_query->the_post(); ?>
                <div class="box clearfix">
                    <div class="left_box">
                    	<?php if( has_post_thumbnail() ) : ?>
                        <div class="post_thumb imghover">
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'viable-blog-thubmnail-10', array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) ); ?></a>
                        </div><!-- .post_thumb.imghover -->
                    	<?php endif; ?>
                    </div><!-- .left_box -->
                    <div class="right_box">
                        <div class="post_details">
                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <div class="meta">
                                <ul class="post_meta">
                                    <li class="posted_date"><a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a></li>
                                </ul><!-- .post_meta -->
                            </div><!-- .meta -->
                        </div><!-- .post_details -->
                    </div><!-- .right_box -->
                </div><!-- .box.clearfix -->
            	<?php endwhile; wp_reset_postdata(); ?>
            </div>
			<?php
		endif;
			
		echo $args[ 'after_widget' ]; 
 
    }
 
    public function form( $instance ) {
        $defaults = array(
            'title'       => '',
            'post_choice'	=> 'recent',
            'post_no'	  => 5,
        );

        $instance = wp_parse_args( (array) $instance, $defaults );

		?>
		<p>
            <label for="<?php echo esc_attr( $this->get_field_name('title') ); ?>">
                <strong><?php esc_html_e('Title', 'viable-blog'); ?></strong>
            </label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />   
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_name('post_choice') ); ?>">
                <?php esc_html_e('Type of Posts:', 'viable-blog'); ?>
            </label>
            <select class="widefat" id="<?php echo esc_attr( $this->get_field_id('post_choice') ); ?>" name="<?php echo esc_attr( $this->get_field_name('post_choice') ); ?>">
            	<?php
            		$post_choices = array(
            			'recent' => esc_html__( 'Recent Posts', 'viable-blog' ),
            			'most_commented' => esc_html__( 'Most Commented', 'viable-blog' ),
            		);

            		foreach( $post_choices as $key => $post_choice ) {
            	?>
            			<option value="<?php echo esc_attr( $key ); ?>" <?php if( $instance['post_choice'] == $key ) { echo esc_attr( 'selected' ); } ?>>
            				<?php
            					echo esc_html( $post_choice );
            				?>
            			</option>
            	<?php
            		}
            	?>
            </select>
        </p> 

		<p>
            <label for="<?php echo esc_attr( $this->get_field_name('post_no') ); ?>">
                <strong><?php esc_html_e('No of Popular Posts', 'viable-blog'); ?></strong>
            </label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('post_no') ); ?>" name="<?php echo esc_attr( $this->get_field_name('post_no') ); ?>" type="number" value="<?php echo esc_attr( $instance['post_no'] ); ?>" />   
        </p>
		<?php
    }
 
    public function update( $new_instance, $old_instance ) {
 
        $instance = $old_instance;

        $instance['title']  	= sanitize_text_field( $new_instance['title'] );

        $instance['post_choice']  	= sanitize_text_field( $new_instance['post_choice'] );

        $instance['post_no']  	= absint( $new_instance['post_no'] );

        return $instance;
    } 
}