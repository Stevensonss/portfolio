<?php
/* 
Template Name: projet-design
* Template Post Type: projets
*/
?>

<?php get_header(); ?>
  <div style="display:none;" class="isProjetTemplate"></div>

    <section style="position:relative;" class="projetWelcome">
        <div style="height:100%; text-transform:uppercase; max-width:1140px;);" class="container-fluid d-flex flex-column justify-content-center align-items-center">
          <?php
            // Récupère l'identifiant du post actuel
            $post_id = get_the_ID();

            // Récupère la valeur du champ personnalisé ACF "mon_champ"
            $title = get_field( 'titre', $post_id );
            $subtitle = get_field( 'sujet', $post_id );

            // Affiche le contenu du champ personnalisé ACF en exécutant les shortcodes
            echo do_shortcode( $title ) . do_shortcode($subtitle);
          ?>
        </div>
    </section>

    <section style="position:relative; z-index:2; background:#fff; padding: 50px 0; width:100vw" class="fullWith d-flex justify-content-start align-items-center flex-column">
            <div class="introductionProjet" style="color:#000; margin-bottom:50px;">
              <!-- <p style="max-width:769px; margin: 0 auto;">Imaginez-vous à Saint-Martin, sur une plage de sable blanc, avec le soleil qui brille et le bruit des vagues en arrière-plan. Vous cherchez un endroit où manger, et vous tombez sur Wonderfood by dé, un restaurant au design moderne et élégant. J'ai eu la chance de concevoir cinq logotypes pour ce restaurant, en utilisant Adobe Illustrator pour créer une identité visuelle qui reflète l'esprit dynamique et innovant de la chef d'établissement.</p> -->
              <div style="">
                <?php
                  // Boucle WordPress pour récupérer le post "projet" actuel
                  while ( have_posts() ) : the_post();

                    // Affiche le contenu de l'éditeur de blocs
                    the_content();

                  endwhile;
                ?>
              </div>
            </div>

            <div style="width:80vw; height:max-content; position:static; color:#000;" class="feedbackSection d-flex flex-column justify-content-center align-items-center">
                <?php
                  $conclusion = get_field( 'conclusion', $post_id ); 
                  echo do_shortcode( $conclusion );
                ?>
                <div class="container">
                    <div class="row align-items-center">
                        <div style="" class="col-md-6 presentation">
                            <?php 
                            
                              $retour = get_field( 'retourexperience', $post_id ); 
                              echo do_shortcode( $retour );
                            
                            ?>
                        </div>
                        <div class="col-md-6 d-flex presentation">
                            <!-- <img style="" src="</*?php echo wp_get_attachment_url(69);*/ ?>" alt="Image description" class="aboutImg img-fluid"> -->
                            <?php

                              $caroussel = get_field( 'caroussel', $post_id );

                              // Affiche le contenu du champ personnalisé ACF en exécutant les shortcodes
                              echo do_shortcode( $caroussel );
                            
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="spaceLine"></div>
            
            <div class="container">
              <h2 style="color:#000; text-align:center; margin:0px auto 50px; auto">Autres projets</h2>
              <div class="row allProjects">
                <?php
                    $args = array(
                        'post_type' => 'projets',
                        'posts_per_page' => 3,
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
    </section>

    

    <!-- <section style="position:static; background:#000; padding: 50px 0;" class="projetIllustration fullWith sectionAbout d-flex justify-content-start align-items-center flex-column">
            <div style="width:80vw; height:max-content; position:static; " class="about d-flex justify-content-center align-items-center">
                <div class="container">
                    <div class="row align-items-center">
                        <div style="" class="col-md-6 presentation">
                            <h2>C'EST L'HISTOIRE DE...</h2><br/>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tenetur quibusdam eos aperiam atque sunt ab temporibus ullam voluptates error.</p>
                        </div>
                        <div class="col-md-6 d-flex"> -->
                            <!-- <img style="" src="</*?php echo wp_get_attachment_url(69);*/ ?>" alt="Image description" class="aboutImg img-fluid"> -->
                            <!-- php
                            echo do_shortcode('[smartslider3 slider="4"]');
                            ?>
                        </div>
                    </div>
                </div>
            </div>
    </section> -->

    <!-- <section style="" class="projetGallery">
      <div style="max-width:1140px;" class="container">
        <h2 style="text-transform:uppercase;" class="text-center">Plusieurs étapes</h2>
        <hr />
        <div class="row">
          <div class="col-md-4">
            <div class="card border-0 shadow-lg">
              <img src="https://placehold.it/300x200" class="card-img-top" alt="...">
              <div style="background:#fff; color:#000;" class="card-body">
                <h5 class="card-title">HTML</h5>
                <p style="text-align:start!important; margin:0!important;" class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ac quam a dolor ornare auctor.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card border-0 shadow-lg">
              <img src="https://placehold.it/300x200" class="card-img-top" alt="...">
              <div style="background:#fff; color:#000;" class="card-body">
                <h5 class="card-title">CSS</h5>
                <p style="text-align:start!important; margin:0!important;" class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ac quam a dolor ornare auctor.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card border-0 shadow-lg">
              <img src="https://placehold.it/300x200" class="card-img-top" alt="...">
              <div style="background:#fff; color:#000;" class="card-body">
                <h5 class="card-title">JavaScript</h5>
                <p style="text-align:start!important; margin:0!important;" class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ac quam a dolor ornare auctor.</p>
              </div>
            </div>
          </div
        </div>
      </div>
    </section> -->

<?php get_footer(); ?>