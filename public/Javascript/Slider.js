// -----------------------------------------------------------------------------------------------------//

//  SLIDER

// -----------------------------------------------------------------------------------------------------//

var Slider = {

    init: function () {
        this.slide1 = $('#Slide_1');
        this.slide2 = $('#Slide_2');
        this.slide3 = $('#Slide_3');
        this.dotSlide1 = $('#dotSlider_1');
        this.dotSlide2 = $('#dotSlider_2');
        this.dotSlide3 = $('#dotSlider_3');
        this.nextSlide();
        this.prevSlide();
        this.keypressEvent();
        this.timerSlide;
        this.dotSlide();
    },

    nextSlide: function () {
        $(".ClickRight").on('click', function ClickDroit() {
            var currentSlide = $('.ActiveSlide');
            var nextSlide = currentSlide.next();

            var currentDot = $('.ActiveDot');
            var nextDot = currentDot.next();

            if (nextSlide.length == 0) {
                nextSlide = $('.Slide').first();
                nextDot = $('.sliderDot').first();
            }

            currentSlide.removeClass("ActiveSlide");
            nextSlide.addClass('ActiveSlide');

            currentDot.removeClass("ActiveDot");
            nextDot.addClass("ActiveDot");
        });
    },

    prevSlide: function () {
        $(".ClickLeft").on('click', function () {
            var currentSlide = $('.ActiveSlide');
            var prevSlide = currentSlide.prev();

            var currentDot = $('.ActiveDot');
            var nextDot = currentDot.prev();

            if (prevSlide.length == 0) {
                prevSlide = $('div[class="Slide"]').last();
                nextDot = $('.sliderDot').last();
            }

            currentSlide.removeClass('ActiveSlide');
            prevSlide.addClass('ActiveSlide');

            currentDot.removeClass("ActiveDot");
            nextDot.addClass("ActiveDot");
        })
    },

    keypressEvent: function () {
        $('body').keydown(function (Event) {
            if (Event.which === 37) {
                var currentSlide = $('.ActiveSlide');
                var prevSlide = currentSlide.prev();

                var currentDot = $('.ActiveDot');
                var nextDot = currentDot.prev();

                if (prevSlide.length == 0) {
                    prevSlide = $('div[class="Slide"]').last();
                    nextDot = $('.sliderDot').last();
                }

                currentSlide.removeClass('ActiveSlide');
                prevSlide.addClass('ActiveSlide');

                currentDot.removeClass("ActiveDot");
                nextDot.addClass("ActiveDot");

            } else if (Event.which === 39) {
                var currentSlide = $('.ActiveSlide');
                var nextSlide = currentSlide.next();

                var currentDot = $('.ActiveDot');
                var nextDot = currentDot.next();

                if (nextSlide.length == 0) {
                    nextSlide = $('.Slide').first();
                    nextDot = $('.sliderDot').first();
                }

                currentSlide.removeClass("ActiveSlide");
                nextSlide.addClass('ActiveSlide');

                currentDot.removeClass("ActiveDot");
                nextDot.addClass("ActiveDot");
            }
        })
    },

    timerSlide: setInterval(function () {
            var currentSlide = $('.ActiveSlide');
            var nextSlide = currentSlide.next();

            var currentDot = $('.ActiveDot');
            var nextDot = currentDot.next();

            if (nextSlide.length == 0) {
                nextSlide = $('.Slide').first();
                nextDot = $('.sliderDot').first();
            }

            currentSlide.removeClass("ActiveSlide");
            nextSlide.addClass('ActiveSlide');

            currentDot.removeClass("ActiveDot");
            nextDot.addClass("ActiveDot");
    }, 5000),

    dotSlide: function () {
        $('#dotSlider_1').on('click', function () {
            clearInterval(Slider.timerSlide);

            Slider.slide1.addClass('ActiveSlide');
            Slider.slide2.removeClass('ActiveSlide');
            Slider.slide3.removeClass('ActiveSlide');

            Slider.dotSlide1.addClass('ActiveDot');
            Slider.dotSlide2.removeClass('ActiveDot');
            Slider.dotSlide3.removeClass('ActiveDot');
        })


        $('#dotSlider_2').on('click', function () {
            clearInterval(Slider.timerSlide);

            Slider.slide2.addClass('ActiveSlide');
            Slider.slide1.removeClass('ActiveSlide');
            Slider.slide3.removeClass('ActiveSlide');

            Slider.dotSlide2.addClass('ActiveDot');
            Slider.dotSlide1.removeClass('ActiveDot');
            Slider.dotSlide3.removeClass('ActiveDot');
        })

        $('#dotSlider_3').on('click', function () {
            clearInterval(Slider.timerSlide);

            Slider.slide3.addClass('ActiveSlide');
            Slider.slide2.removeClass('ActiveSlide');
            Slider.slide1.removeClass('ActiveSlide');

            Slider.dotSlide3.addClass('ActiveDot');
            Slider.dotSlide2.removeClass('ActiveDot');
            Slider.dotSlide1.removeClass('ActiveDot');
        })
    },
};

Slider.init();
