/* Template Name: Two Column Lay-Out */

<!-- als er posts zijn, loop door de posts, geef mij de huidige post -->
    <?php $mycustomquery = new WP_Query(array('category_name' => 'algemeen', 'posts_per_page' => 2  )); ?>
    <?php if($mycustomquery->have_posts()) : while($mycustomquery->have_posts()) : $mycustomquery->the_post(); ?>

        <h1><?php the_title(); ?></h1>
        <h3><?php the_date(); ?></h3>

        <div>
            <?php the_content(); ?>
        </div>

<!-- Loop sluiten -->
<?php endwhile; ?>

<?php else : ?>

<?php endif; ?>
<?php wp_reset_post_data(); ?>