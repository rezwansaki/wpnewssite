<?php if(have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<div class="single_post">
    <div class="title"><a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a></div> <!-- /post title-->
    <div class="post_info">
        Posted In: <?php the_category(','); ?> | Posted on: <?php the_time('M d, Y') ?> <?php comments_popup_link('No Comment', '1 Comment', '% Comments'); ?>
    </div>


    <div class="post-article">
        <a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail('post-image',array('class' => 'post-thumb')); ?></a>
        <?php the_content(); ?>
    </div>


</div>

<?php endwhile; ?>   
<?php endif; ?>    


<!-- pagination with plugins -->   
<?php
wp_paginate();
?>
<!-- /pagination -->
