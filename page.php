<?php get_header(); ?>
            
           <?php get_template_part('slider'); ?>
            
            <div class="row" id="body">
                <div class="col-md-8" id="content">
                    <!-- Content -->
                    
                    
                    <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
                    
                    <div class="title"><h3><?php the_title(); ?></h3></div>
                    
                    
                    <div class="post-article"><?php the_content(); ?></div>
                    
                    <?php comments_template('', true); ?>
                    
                    <?php endwhile; ?>

                    <?php else : ?>
                    <h3><?php _e('404 Error&58; Not Found'); ?></h3>
                    <?php endif; ?>

                    

                    <!-- /Content -->
                </div>
                
                
                
               <?php get_sidebar(); ?>
               
               
               
            </div>
            


<?php get_footer(); ?>