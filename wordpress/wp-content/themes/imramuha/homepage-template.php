<?php
/*
Template Name: homepage-template
*/

    // Get the 2 most recent & PUBLISHED posts
    $recent_q = array( 
                        'post_type' => 'post' ,
                        'numberposts' => '2',
                        'post_type'   => 'post',
                        'post_status' =>'publish',
                    );
    $recent_posts = wp_get_recent_posts($recent_q);

    // Get posts with the category WEETJES
    $weetjes_q = array(
                        'post_type' => 'post' ,
                        'numberposts' => '2',
                        'category_name' => 'weetjes',
                    ); 
    $weetjes_posts = new WP_Query($weetjes_q);
?>

<section class="jumbotron">
<div class="container">
<h1 class="jumbotron-heading pb-5 pt-2">TWEE MEEST RECENTE POSTS</h1>
    <?php
        // loop through all the posts
        echo '<div class="row">';
        foreach( $recent_posts as $recent ){
            echo '<div class="col-md-4">
                    <div class="card mb-4 box-shadow"> 
                        <div class="card-body">
                            <h2 >' . $recent["post_title"] . '</h2> <p class="card-text bg-light"><small>' . $recent["post_date"] . '</small><br/>' . $recent["post_content"] . '</p>
                        </div>
                    </div>
                </div>';
        }
        echo '</div>';
        wp_reset_query();
    ?>
</div>
</section>


<section class="jumbotron">
<div class="container">
<h1 class="jumbotron-heading pb-5 pt-2">TWEE WEETJES</h1>
<?php
    // loop through all the posts
    if ( $weetjes_posts->have_posts() ) {
        echo '<div class="row">';
        while ( $weetjes_posts->have_posts() ) {
            $weetjes_posts->the_post();
            echo '<div class="col-md-4">
                    <div class="card mb-4 box-shadow"> 
                        <div class="card-body"> <h2>' . get_the_title() . '</h2><br/> <p class="card-text bg-light"><small>' . get_the_category() . '</small> <br/>' . get_the_content() .'</p>' .
                        
                        '</div>
                        </div>
                    </div>';
        }
        echo '</div>';
        /* Restore original Post Data */
        wp_reset_postdata();
    } else {
        echo '<div>
                <h1>No posts were found</h1>
            </div>';
    }
?>
</div>
</section>