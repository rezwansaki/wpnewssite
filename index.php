<?php get_header(); ?>
            
           <?php get_template_part('slider'); ?>
            
            <div class="row" id="body">
                <div class="col-md-8" id="content">
                    <!-- Content -->
                    
                    <?php get_template_part('post-loop'); ?>
                    

                    <!-- /Content -->
                </div>
                
                
                
               <?php get_sidebar(); ?>
               
               
               
            </div>
            


<?php get_footer(); ?>