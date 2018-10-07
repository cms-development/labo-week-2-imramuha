<?php
/*
Template Name: archive-recipes
Show the recipes
*/

    // Get all recipes
    $recipes = array(
            'post_type' => 'recipes' ,
            'post_status' => 'publish',
            'numberposts' => '30',
        ); 
    $recipes_q = new WP_QUERY($recipes)
?>

<!-- HEADER -->
<?php get_header(); ?>
 
<section class="jumbotron">
    <div class="container">
        <h1 class="jumbotron-heading pb-5 pt-2">My recipes</h1>
            <!-- the loop -->
        <div class="row">
            <?php if ( $recipes_q->have_posts() ) : ?>
                <?php while ( $recipes_q->have_posts() ) : $recipes_q->the_post(); ?>
                <div class="col-md-4">
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                    <!-- CONTENT NOT SHOWING... can't find the ERROR-->
                    <div>Content:<?php the_content(); ?></div>
                </div>
                <?php endwhile; ?>

                    <?php wp_reset_postdata(); ?>

            <?php else : ?>
                <p> <?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
            <?php endif; ?>
        </div>
    </div>
</section


<!-- FOOTER -->
<?php get_footer(); ?>

