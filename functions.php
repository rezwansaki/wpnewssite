<?php

/* right sidebar */
function right_sidebar() {
    register_sidebar( array (
        'name' => __( 'Right Menu', 'alin'),
        'id' => 'right_sidebar',
        'before_widget' => '<div class="list-group">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ) 
     );

}
add_action('widgets_init', 'right_sidebar');


/* Comments */
function comment_scripts() {
    if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
}
add_action('wp_enqueue_scripts', 'comment_scripts');


/* This code for Featured Image Support */
add_theme_support( 'post-thumbnails', array('post'));
set_post_thumbnail_size(200,200,true);
add_image_size('post-image',150,150,true);
add_image_size('single-post-image',500,500,true);


/* Menu */
add_action( 'after_setup_theme', 'bootstrap_setup' );

if ( ! function_exists( 'bootstrap_setup' ) ):

function bootstrap_setup(){

    add_action( 'init', 'register_menu' );

    function register_menu(){
        register_nav_menu( 'top-bar', 'Bootstrap Top Menu' );
    }
    
    register_nav_menu( 'top-bar-top', 'Bootstrap Top Menu Top' ); /* another menu */
    register_nav_menu( 'footer-menu', 'Bootstrap Footer Menu' ); /* footer menu */

    class Bootstrap_Walker_Nav_Menu extends Walker_Nav_Menu {


        function start_lvl( &$output, $depth ) {

            $indent = str_repeat( "\t", $depth );
            $output    .= "\n$indent<ul class=\"dropdown-menu\">\n";

        }

        function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

            $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

            $li_attributes = '';
            $class_names = $value = '';

            $classes = empty( $item->classes ) ? array() : (array) $item->classes;
            $classes[] = ($args->has_children) ? 'dropdown' : '';
            $classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
            $classes[] = 'menu-item-' . $item->ID;


            $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
            $class_names = ' class="' . esc_attr( $class_names ) . '"';

            $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
            $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

            $output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';

            $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
            $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
            $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
            $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
            $attributes .= ($args->has_children)        ? ' class="dropdown-toggle" data-toggle="dropdown"' : '';

            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'>';
            $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
            $item_output .= ($args->has_children) ? ' <b class="caret"></b></a>' : '</a>';
            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        }

        function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {

            if ( !$element )
                return;

            $id_field = $this->db_fields['id'];

            //display this element
            if ( is_array( $args[0] ) )
                $args[0]['has_children'] = ! empty( $children_elements[$element->$id_field] );
            else if ( is_object( $args[0] ) )
                $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
                $cb_args = array_merge( array(&$output, $element, $depth), $args);
            call_user_func_array(array(&$this, 'start_el'), $cb_args);

            $id = $element->$id_field;

            // descend only when the depth is right and there are childrens for this element
            if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {

                foreach( $children_elements[ $id ] as $child ){

                    if ( !isset($newlevel) ) {
                        $newlevel = true;
                        //start the child delimiter
                        $cb_args = array_merge( array(&$output, $depth), $args);
                        call_user_func_array(array(&$this, 'start_lvl'), $cb_args);
                    }
                    $this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
                }
                unset( $children_elements[ $id ] );
            }

            if ( isset($newlevel) && $newlevel ){
                //end the child delimiter
                $cb_args = array_merge( array(&$output, $depth), $args);
                call_user_func_array(array(&$this, 'end_lvl'), $cb_args);
            }

            //end this element
            $cb_args = array_merge( array(&$output, $element, $depth), $args);
            call_user_func_array(array(&$this, 'end_el'), $cb_args);

        }

    }

}
/* /Menu */



endif;



?>