<?php
/* 
Template Name: contact-page
*/
?>

<?php get_header(); ?>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>


    <section class="contactSection d-flex justify-content-start align-items-center flex-column">

      <!--contactForm-->
      <div class="contactForm">

        <h1>Contactez-moi !</h1>
        <?php echo get_contact_page_content(); ?>

      <div>

      <!-- <div style="" class="skillsBackground container container-md-fluid p-0">
                <div style="padding:0px;" class="skills-section d-flex justify-content-end align-items-center flex-column">
                    <div class="row mt-2">
                        <div class="rowSpace col-md-4">
                          <a href="https://github.com/Stevensonss">
                            <div class="card"> 
                                <div class="card-body p-0">
                                    <div class="UiUx githubBackground imgSkill d-flex justify-content-center align-items-center"><img class="img-fluid" src="</?php echo wp_get_attachment_url(143); ?>" alt="illustration skill"></div>
                                    <h3 class="card-title mt-3"></h3>
                                    <p>
                                    Github 
                                    </p>
                                </div>
                            </div>
                          </a>
                        </div>
                        <div class="Linkedin rowSpace col-md-4">
                          <a href="https://codepen.io/stevensonsss">
                            <div class="card"> 
                                <div class="card-body p-0">
                                    <div style="" class="codePenBackground  front imgSkill d-flex justify-content-center align-items-center"><img class="img-fluid" src="</?php echo wp_get_attachment_url(146); ?>" alt="illustration skill"></div>
                                    <h3 class="card-title mt-3"></h3>
                                    <p>
                                    CodePen
                                    </p>
                                </div>
                            </div>
                          </a>
                        </div>
                        <div class="rowSpace last col-md-4">
                        <a href="https://dribbble.com/stevensons">
                            <div class="marketing imgSkill d-flex justify-content-center align-items-center"><img class="img-fluid" src="</*?php echo wp_get_attachment_url(144); ?>" alt="illustration skill"></div>
                            <div class="card"> 
                              <div class="card-body p-0">
                                <h3 class="card-title mt-3"></h3>
                                <p>
                                Dribble
                                </p>
                              </div>
                        </div>
                        </a>
                    </div>
                </div>
            </div> -->

    </section>
            
  
  <?php endwhile; endif; ?>

<?php get_footer(); ?>