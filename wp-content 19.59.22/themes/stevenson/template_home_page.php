<?php
/* 
Template Name: home-page
*/
?>

<?php get_header(); ?>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

  <div style="height: 150vh;" class="slidesContainer">
        <style> ::-webkit-scrollbar {width: .1px;} </style>

        <section class="welcome">
            <div class="">
                <h1>welcome!</h1>
                <p>Illustrator, designer &amp; front end developer</p>
            </div>
        </section>

        <section style="" class="sectionAbout d-flex justify-content-start align-items-center flex-column">
            <div style="width:80vw; height:100vh;" class="about d-flex justify-content-center align-items-center">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6 presentation">
                            <?php echo get_homepage_content(); ?>
                        </div>
                        <div class="col-md-6 d-flex">
                            <img style="" src="<?php echo wp_get_attachment_url(29); ?>" alt="Image description" class="aboutImg img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="sectionSkills d-flex justify-content-start justify-content-md-center align-items-end flex-column">
            <div style="" class="skillsBackground container container-md-fluid p-0">
                <h2 style="text-transform:uppercase;  text-align:center;">centres d'int&eacute;r&egrave;ts</h2>
                <div style="padding:0px;" class="skills-section d-flex justify-content-end align-items-center flex-column">
                    <div class="row mt-2">
                        <div class="rowSpace col-md-4">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="UiUx imgSkill d-flex justify-content-center align-items-center"><img class="img-fluid" src="<?php echo wp_get_attachment_url(16); ?>" alt="illustration skill"></div>
                                    <h3 class="card-title mt-3">ui/ux</h3>
                                    <p>
                                        Adobe xd, Figma, Photoshop
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="rowSpace col-md-4">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div style="" class="front imgSkill d-flex justify-content-center align-items-center"><img class="img-fluid" src="<?php echo wp_get_attachment_url(19); ?>" alt="illustration skill"></div>
                                    <h3 class="card-title mt-3">Front</h3>
                                    <p>
                                        FromScrach, Bootstrap, TailwindCss, Jquery, React.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="rowSpace col-md-4">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="cms imgSkill d-flex justify-content-center align-items-center"><img class="img-fluid" src="<?php echo wp_get_attachment_url(17); ?>" alt="illustration skill"></div>
                                    <h3 class="card-title mt-3">WordPress</h3>
                                    <p>
                                        Thèmes, Thèmes enfants sur mesures.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="rowSpace col-md-4">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="conceptionGraphique imgSkill d-flex justify-content-center align-items-center"><img class="img-fluid" src="<?php echo wp_get_attachment_url(18); ?>" alt="illustration skill"></div>
                                    <h3 class="card-title mt-3">Conception Graphique</h3>
                                    <p>
                                        Illustrator, InDesign, Photoshop
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="rowSpace col-md-4">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="projectManagement imgSkill d-flex justify-content-center align-items-center"><img class="img-fluid" src="<?php echo wp_get_attachment_url(21); ?>" alt="illustration skill"></div>
                                    <h3 class="card-title mt-3">Design 3D</h3>
                                    <p>
                                        Blender, Unity, C4D, Lumion (d&eacute;butant)
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="rowSpace last col-md-4">
                            <div class="marketing imgSkill d-flex justify-content-center align-items-center"><img class="img-fluid" src="<?php echo wp_get_attachment_url(22); ?>" alt="illustration skill"></div>
                            <div class="card"> <div class="card-body p-0">
                                <h3 class="card-title mt-3">AudioVisuel</h3>
                                <p>
                                    Première Pro, After effect
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section style="overflow-Y:scroll;" class="sectionProjects">
            <div  class="layoutProjects container align-items-start">
            <h2 style="text-transform: uppercase; text-align:center; margin-bottom:30px;">Mon travail</h2>
            <div style="max-width:1140px; margin: 0 auto;" class="row">
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
                                        <p class=""><?php the_excerpt(); ?></p>
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
    </div>
  
  <?php endwhile; endif; ?>

<?php get_footer(); ?>