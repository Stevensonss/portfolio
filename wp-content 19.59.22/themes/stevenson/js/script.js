jQuery(document).ready(function($) {

    // navbar
    $('.mobileOnly').on('click', function() {
        // toggle
        $('.line-menu.start').toggleClass('line-menu-start-active');
        $('.line-menu.end').toggleClass('line-menu-end-active');
        $('.toggleMobile').toggleClass('toggleMobile-active');

        // menu

        $('.navbarMenuMobile').toggleClass('navbarMenuMobileActive');
        $('#main').toggleClass('navbarMenuActiveMain');
    });

    // home-page 

    if (jQuery('.projectsHome').hasClass('projectsHome')) {
        $(".menu-navbarmenu-container>ul>li:nth-child(1)").addClass("menuPosition");
    }

    if (jQuery('div').hasClass('credit')) {
        $(".menu-navbarmenu-container>ul>li:nth-child(2)").addClass("menuPosition");
    }

    if (jQuery('.contactForm').hasClass('contactForm')) {
        $("input[name='your-name']").attr("placeholder", "Nom");
        $("input[name='your-email']").attr("placeholder", "Email");
        $(".menu-navbarmenu-container>ul>li:nth-child(3)").addClass("menuPosition");
    }


    // Sélectionne toutes les sections qui n'ont pas la classe "fullWidth"
    jQuery('section:not(.fullWidth)').each(function() {
        // Sélectionne la première div enfant de la section et applique la limitation de largeur
        jQuery(this).children('div:first-child').css('max-width', '1920px');
    });

    if (jQuery('div').hasClass('isProjetTemplate')) {

        $('.navbarMenu > .menu-navbarmenu-container > ul > li > a').css('color', '#000');
        $('.navbarMenu > h2 > a').css('color', '#000');
        $('#header').css('background', '#fff');
        $('.line-menu').css('background-color', '#000');
    }

    if (jQuery('section').hasClass('welcome')) {

        $('body').addClass('responsiveBody')

        //slider

        const slidesContainer = document.querySelector('.slidesContainer');
        const sections = Array.from(slidesContainer.querySelectorAll('section'));

        sections.forEach((section, index) => {
            const className = `slide${index + 1}`;
            section.classList.add(className);

            section.classList.add("slide");

            // Ajouter un style CSS pour chaque section
            section.style.transform = `translateY(${index * 100}%)`;
        });

        const sectionLen = sections.map((section, index) => `section${index + 1}`);
        console.log(sectionLen.length); // affiche ["section1", "section2", "section3", ...]

        var index = 1;
        var scrollPosition = 0;
        var timeTransition = 1000; //transition de 1s
        var IsLocked = false;

        function scrollToTop() {
            window.scroll({
                top: 50,
                left: 0,
                behavior: 'auto'
            });
        }

        scrollToTop();

        /*Immobilisation du scroll*/

        function scrollFixEnable() { $('.home').addClass('bodySlide'); }

        function scrollFixDisable() { $('.home').removeClass('bodySlide'); }

        function scrollInit() {
            scrollFixEnable();
            setInterval(() => {
                scrollFixDisable();
            }, timeTransition);
        }
        scrollInit();

        // retirer 100% à la propriété "transform" de chaque section
        function removeTransform() {
            sections.forEach((section, index) => {
                const currentTransform = section.style.transform;
                const currentTransformValue = parseInt(currentTransform.split('(')[1]) || 0;
                const newTransformValue = currentTransformValue + 100;
                section.style.transform = `translateY(${newTransformValue}%)`;
                window[`section${index + 1}Transform`] = section.style.transform;
            });
        }

        // ajouter 100% à la propriété "transform" de chaque section
        function addTransform() {
            sections.forEach((section, index) => {
                const currentTransform = section.style.transform;
                const currentTransformValue = parseInt(currentTransform.split('(')[1]) || 0;
                const newTransformValue = currentTransformValue - 100;
                section.style.transform = `translateY(${newTransformValue}%)`;
                window[`section${index + 1}Transform`] = section.style.transform;
            });
        }

        function unlockSlide() {
            setTimeout(() => {
                IsLocked = false;
                console.log("unlock");
                scrollFixDisable();
            }, timeTransition);
        }

        function isVisible() {
            setTimeout(() => {
                sections.forEach((section, i) => {
                    if ((i + 1) < index) {
                        $(section).find('div:first-child').addClass('sectionFadeUp');
                    } else if ((i + 1) == index) {
                        $(section).find('div:first-child').removeClass('sectionFadeUp sectionFadeDown');
                    } else {
                        $(section).find('div:first-child').addClass('sectionFadeDown');
                    }
                });
            }, timeTransition);
        }

        isVisible();

        window.addEventListener("scroll", () => {
            scrollPosition = window.pageYOffset;
            console.log(scrollPosition);

            if (scrollPosition > 60 & IsLocked == false) {

                console.log("scrollDown");
                IsLocked = true;
                console.log("lock");

                if (index < sectionLen.length) {
                    index++;
                    addTransform();
                    console.log("check");
                    scrollFixEnable();
                    isVisible();
                }

                unlockSlide();

            } else if (scrollPosition < 40 & IsLocked == false) {

                console.log("scrollUp");
                IsLocked = true;
                console.log("lock");

                if (index > 1) {
                    index--;
                    removeTransform();
                    scrollFixEnable();
                    isVisible();
                }

                unlockSlide();

            }

            setTimeout(() => { scrollToTop() }, timeTransition);
        });









        //     /* scrollDefault */
        //     window.scrollTo({top: 50, behavior: 'auto'});

        //     /*varDefault*/
        //     var position = true; /*true = home, false = lastProjects*/
        //     var previousScroll = 0;
        //     var collDown = 0;

        //     $(window).on('scroll', function() {
        //         //variables par défaut après écoute du scroll
        //         var currentScroll = $(this).scrollTop();
        //         var executeIf = 0;
        //         var minScroll = 10;

        //         function onScrollSlide(direction) {
        //             if (collDown != 1 && position != direction) { /*ont execute pas la fonction de slide si le colldown est encore = a 1*/
        //                 position = (position == true) ? false : true; //redéfinir la position
        //                 collDown = 1; //bloquer la fonction pour éviter les spam et bug
        //                 executeIf = 1;

        //                 $('.welcome').toggleClass('welcomeActive');
        //                 $('.scroller').toggleClass('scrolleractive');
        //                 $('.lastProjects').toggleClass('lastProjectsActive');

        //                 setTimeout(() => {
        //                     $('.lastProjects > div').toggleClass('sectionFadeDown');
        //                     $('.welcome > div').toggleClass('sectionFadeUp');
        //                     // $('.lastProjects').addClass('absolute');
        //                 }, 900);
        //             }

        //             setTimeout(() => {
        //                 console.log(position, direction);
        //                 collDown = 0;
        //             }, 900);

        //            return collDown;
        //         }


        //         if (currentScroll > 50 + minScroll){collDown = onScrollSlide(false);} 

        //         else if (currentScroll < 50 - minScroll) {collDown = onScrollSlide(true);}

        //         if (executeIf == 1) {
        //             $('body').addClass('bodySlide');
        //             setTimeout(() => {
        //                 $('body').removeClass('bodySlide');
        //             }, 1000);
        //              // Met à jour la position précédente lors de chaque changement de position
        //             previousScroll = currentScroll;

        //             console.log(currentScroll);
        //             console.log(collDown);
        //         }

        //         /*Reset du scroll 300ms après écoute*/
        //         setTimeout(() => {window.scrollTo({top: 50,behavior: 'auto'});}, 700);
        //     });
    }

});