// -----------------------------------------------------------------------------------------------------//

//  Event EventNav

// -----------------------------------------------------------------------------------------------------//

var EventNav = {

    init: function () {
        this.button = $("#navButton");
        this.menuNav = $("#menuNav");
        this.eventButton();
    },

    eventButton: function () {
        $(".iconeNav").addClass("fa-bars");
        
        $('#navButton').click(function () {

            $(".iconeNav").removeClass("fa-bars");
            $(".iconeNav").addClass("fa-times");
            $("#menuNav").css("display", "flex");

            $("#navButton").click(function () {

                $(".iconeNav").removeClass("fa-times");
                $("#menuNav").css("display", "none");
                EventNav.eventButton();
            });
        });
    },

}

EventNav.init();
