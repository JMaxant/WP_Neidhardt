jQuery(document).ready(function($) {
    var nsSwiper = new Swiper('.swiper-container', {
        direction: 'horizontal',
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        scrollbar: {
            el: '.swiper-scrollbar',
        },
        keyboard: {
            enabled: true,
            onlyInViewport: true,
        },
    });

    /* --------------- MENU ---------------- */
    var burger = document.querySelector('.burger-container'),
        header = document.querySelector('.header');

    burger.onclick = function() {
        header.classList.toggle('menu-opened');
    };

    /* --------------- PORTFOLIO ---------------- */

    let portfolio = $('#portfolio'),
        sortingBtns = $('.fil-cat'),
        catDescriptions = $('#cat-descriptions .cat-desc');

    sortingBtns.mouseenter(function() {
        $(catDescriptions.selector+'.'+this.getAttribute('data-rel')).addClass('hovered');
        $(catDescriptions.selector+'.'+this.getAttribute('data-rel')).siblings('.cat-desc.active').fadeTo(0,0);
    });

    sortingBtns.mouseleave(function() {
        $(catDescriptions.selector+'.'+this.getAttribute('data-rel')).removeClass('hovered');
        $(catDescriptions.selector+'.'+this.getAttribute('data-rel')).siblings('.cat-desc.active').fadeTo(0,1);
    });

    sortingBtns.click(function(){
        let selectedClass = this.getAttribute('data-rel');
        portfolio.children().removeAttr('style');

        catDescriptions.removeAttr('style');
        portfolio.fadeTo(100, 0.1);
        portfolio.children('figure').not('.'+selectedClass).fadeOut().removeClass('scale-anm');
        catDescriptions.removeClass('active');
        setTimeout(function() {
            $(catDescriptions.selector+'.'+selectedClass).addClass('active');
            $("#portfolio figure."+selectedClass).fadeIn().addClass('scale-anm');
            portfolio.fadeTo(300, 1);
        }, 300);
    });

    /* --------------- video controls ---------------- */
    if($('body').hasClass('home')) {

        let videos = $('.video-slider'),
            videosWrapper = $('.swiper-slide'),
            volumeBtn = $('.volume-button');

        // Function used to toggle play/pause on videos, depending on whether they are displayed or not
        function togglePlay() {
            videos.each(function(index, video) {
                // for some reasons, Firefox is buggy with muted attribute, so we force the volume to 0
                this.volume = 0;
                $('.sound-off').css('opacity','1');
                $('.sound-on').css('opacity', '0');
                if($(video).parent().hasClass('swiper-slide-active')){
                    this.play();
                } else {
                    this.pause();
                }
            });
        }

        // Initial call of the function : as soon as the document is loaded, the function parses all videos
        togglePlay();

        // Mutation Observer
        var MutationObserver = window.MutationObserver;

        $.fn.attrchange = function(callback) {
            if(MutationObserver) {
                var options = {
                    subtree: false,
                    attributes: true
                };

                var observer = new MutationObserver(function (mutations) {
                    mutations.forEach(function(e){
                        callback.call(e.target, e.attributeName);
                    });
                });

                return this.each(function () {
                    observer.observe(this, options);
                })
            }
        };

        videosWrapper.attrchange(function (attrName) {
            if(attrName === 'class'){
                setTimeout(togglePlay(), 800);
            }
        });


        //on click or spacebar, toggles play/pause
        videos.on('click', function() {
            if(!this.paused) {
                this.pause();
            } else {
                this.play();
            }
        });


            $(document).on('keyup', function (e) {
                if (e.keyCode === 32) {
                    $('.swiper-slide-active .video-slider').trigger('click');
                }
            });

            // Sound management

            volumeBtn.click(function () {
                let currentVideo = this.parentNode.getElementsByClassName('video-slider').item(0),
                    currentVolumeBtn = $(this);

                if (currentVideo.volume === 0) {
                    currentVideo.volume = 0.5;
                    currentVolumeBtn.css('opacity','0');
                    currentVolumeBtn.siblings('.sound-on').css('opacity','1');
                } else {
                    currentVideo.volume = 0;
                    currentVolumeBtn.css('opacity','1');
                    currentVolumeBtn.siblings('.sound-on').css('opacity','0');
                }
            });

        }
        /* --------------- Toolbar button selected ---------------- */
    $('button').on('click', function(){
        $('button').removeClass('selected');
        $(this).addClass('selected');
    });
});