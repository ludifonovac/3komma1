/*
// Header menu for responsive
*/
jQuery(function ($) {
    $(document).ready(function () {
        $("div.navicon").click(function () {
            $(".main-navigation").toggle('collapse');
            /*console.log($("div.navicon").hasClass('open'));
            if($("div.navicon").hasClass('open')){
                $("#lamp").css("float", "right");
            }else{
                $("#lamp").css("float", "none");
            }*/
            $("div.navicon").toggleClass('open');
            $("#lamp").toggleClass('unshow');
        });
    });
});
/*
// Change of header style when scrolled
*/
jQuery(function ($) {
    $(window).on("scroll", function () {
        if ($(window).scrollTop() > 5) {
            $("#masthead").addClass("header-scrolled");
        }
        else {
            //remove the background property so it comes transparent again (defined in your css)
            $("#masthead").removeClass("header-scrolled");
        }
    });
});
/*
// Jump to top
*/
jQuery(function ($) {
    $('.return-to-top').click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 500);
    });
});
/*
// Show more
*/
jQuery(function ($) {
    $('.more-link').click(function () {
        var article = $(this).parents('.entry-content');
        $(article).find(".more-link").each(function () {
            $(this).toggle();
        });
        $(article).find("div.extended-text").each(function () {
            $(this).slideDown();
            //$(this).toggle();
        });
    });
    $('.less-link').click(function () {
        var article = $(this).parents('.entry-content');
        $(article).find(".more-link").each(function () {
            $(this).toggle();
        });
        $(article).find("div.extended-text").each(function () {
            $(this).slideUp();
            //$(this).toggle();
        });
    });
});
/*
// Jump to section
*/
jQuery(function ($) {
    $(document).ready(function () {
        var offsetSize = $(".site-header").innerHeight();
        if (typeof $(window.location.hash).offset() != "undefined") {
            $("html, body").animate({scrollTop: $(window.location.hash).offset().top - offsetSize}, 500);
        }
    });
});
/*
// Change contact form
*/
jQuery(function ($) {
    $('select.contact-form-heading').change(function () {
        var value = $("select.contact-form-heading option:selected").val();
        $('.form-container.multiple-forms').slideUp();
        $('#' + value).slideDown();
        $('.form-container.multiple-forms').removeClass('show-form');
        $('#' + value).addClass('show-form');
    });
});

/*
// Parallax effect
*/
function parallax() {
    // Create cross browser requestAnimationFrame method:
    window.requestAnimationFrame = window.requestAnimationFrame
        || window.mozRequestAnimationFrame
        || window.webkitRequestAnimationFrame
        || window.msRequestAnimationFrame
        || function (f) {
            setTimeout(f, 1000 / 60)
        }

    var lamp = document.getElementById('lamp');

    var scrolltop = window.pageYOffset; // get number of pixels document has scrolled vertically
    lamp.style.top = scrolltop * .3 + 'px'
}

window.addEventListener('scroll', function () { // on page scroll
    requestAnimationFrame(parallax) // call parallaxbubbles() on next available screen paint
}, false)

jQuery(function ($) {
    $('#immobilien-management').find('.right-image').attr('id','coffeemug');
    $('#quartiers-netzwerk').find('.right-image').attr('id','reader');
    $('#mehrwert').find('.right-section-image').attr('id','lampe');
    $('#service').find('.right-section-image').find('img').attr('id','diagram');
    animate('immobilien-management', 300, 600, 'opacity');
    animate('service', 300, 600, 'opacity');
    animate('quartiers-netzwerk', 300, 600, 'opacity');
    animate('mehrwert', 300, 600, 'opacity');

    $('.go-top-border').each(function(i, element){
        $(element).attr('id', 'go-top-border_' + i);
        if(!$(element).hasClass('last')) {
            animate('go-top-border_' + i, $(element).width(), 1000, 'gradiant');
        }
    });

    function animate(id, duration, offset, type){
        var element = $('#'+id);
        element.addClass('animate');
        element.attr('data-animate-duration', duration);
        element.attr('data-animate-offset', offset);
        element.attr('data-animate-type', type);
        animateType(element, type, 0);
    }

    $( window ).scroll(function(scroll_event) {
        var windowTop = $(window).scrollTop();

        $(".animate").each(function(index, element){
            animation(windowTop, element);
        }.bind(windowTop));

    });

    function animation(windowTop, element){
        var elementType = $(element).attr('data-animate-type');
        if(elementType == 'rotate'){
            var elementTop = Number($(element).parent().position().top);
        }else{
            var elementTop = Number($(element).position().top);
        }
        var elementDuration = Number($(element).attr('data-animate-duration'));
        var elementOffset = Number($(element).attr('data-animate-offset'));
        if(windowTop  + elementOffset < elementTop){
            animateType(element, elementType, 0, 'before');
        }
        if(windowTop  + elementOffset > elementTop && windowTop + elementOffset < elementTop + elementDuration){
            animateType(element, elementType, getMarginTop(windowTop + elementDuration + elementOffset, elementTop  + elementDuration), 'animation');
        }
        if(windowTop + elementOffset > elementTop + elementDuration){
            animateType(element, elementType, elementDuration, 'after');
        }
    }

    function animateType(element, elementType, value, status){
        switch (elementType){
            case 'gradiant':
                if(status != 'animation'){
                    $(element).find('.glow').css('display', 'none');
                }else{
                    $(element).find('.glow').css('display', 'block');
                }
                $(element).find('.glow').css('left', value+'px');
               // $(element).css('background-image', 'linear-gradient(90deg, #ffffff '+value/2+'%,  #000000 '+value+'%)');
                break;
            case 'rotate':
                $(element).css('transform', 'rotate('+value+'deg)');
                break;
            case 'opacity':
                $(element).css(elementType, value/300);
                break;
            default:
                $(element).css(elementType, value);
        }

    }

    function getMarginTop(windowTop, elementTop, elementDuration){
        if(windowTop - elementTop > elementDuration){
            return elementDuration;
        }
        if(windowTop - elementTop < 0){
            return 0;
        }
        return Math.floor(windowTop - elementTop);
    }



    $('#coffeemug').css('margin-top', "0px");
    $('#service').find('.right-section-image').find('img').attr('id','diagram');
    $('#quartiers-netzwerk').find('.right-image').attr('id','reader');
    $('#quartiers-netzwerk').find('.middle-section').attr('id','reader-duration');
    var readerDuration = (jQuery('#reader-duration').height() - jQuery('#reader').height());
    $('#reader').css('vertical-align', 'top');


/*    var controller = new ScrollMagic.Controller();

// create a scene
    var scene1 = new ScrollMagic.Scene({
        triggerElement: "#immobilien-management",
        offset: -300,
        duration: 200})
        .setPin("#coffeemug")
        .addIndicators({name: "1 (duration: 300)"})// pins the element for the the scene's duration
        .addTo(controller);

    var tween = TweenMax.to("#diagram", 1, {rotation: 360, ease: Linear.easeNone, duration: 400});

    var screne2 = new ScrollMagic.Scene({
        triggerElement: "#service",
        duartion: 300,
        offset: -300,
        })
        .setTween(tween)
       //.setPin("#service", {pushFollowers: false})
        .addIndicators()
        .addTo(controller);

    var scene3 = new ScrollMagic.Scene({
        triggerElement: "#quartiers-netzwerk",
        offset: -readerDuration,
        duration: readerDuration
    })
        .setPin("#reader")
        .addIndicators({name: "3 (duration: "+readerDuration+")"})// pins the element for the the scene's duration
        .addTo(controller);
*/
    function getNumberOfPx(value){
        value = value.replace('px', '');
        value = Number(value);
        return value;
    }
});