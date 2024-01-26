<?php get_header(); ?>

<section class="projectsHome">
    <div>

        <?php if ( have_posts() ) : ?>

           <!----Galerie Projects----->
           <div style="width:100vw!important;margin: 0 auto!important;position: absolute;left: 50%;transform: translateX(-50%);" class="layoutProjects container align-items-start">
            <h2 style="text-transform: uppercase; text-align:center; margin: 50px;">Mon travail</h2>
            <div class="row allProjects">
                <?php
                    $args = array(
                        'post_type' => 'projets',
                        'posts_per_page' => -1,
                    );
                    $query = new WP_Query( $args );
                    if ( $query->have_posts() ) {
                        while ( $query->have_posts() ) {
                            $query->the_post();
                            ?>
                            <div class="layoutProject col-md-4">
                                <div style="border-radius:10px; overflow:hidden;" class="card">
                                    <?php if ( has_post_thumbnail() ) { ?>
                                        <a class="thumbnailLastProjects" href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'large', array( 'class' => 'img-fluid' ) ); ?></a>
                                    <?php } ?>
                                    <div style="padding:0.3rem 1.25rem; min-height:1px;" class="cardLastProjects">
                                        <h3 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                        <p><?php the_excerpt(); ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo "post not found";
                    }
                    wp_reset_postdata();
                    
                    ?>
                </div>
            </div>

        <?php endif; ?>

    </div>
</section>


<?php get_footer(); ?>