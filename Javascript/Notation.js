// -----------------------------------------------------------------------------------------------------//

//  Event Page Episode for notation

// -----------------------------------------------------------------------------------------------------//

var NotationEvent = {

    init: function () {
        this.element = [".note_1", ".note_2", ".note_3", ".note_4",".note_5", ".note_6", ".note_7", ".note_8", ".note_9", ".note_10"]
    },

    enter: function (number) {

        this.element.forEach(function(item, index) {   
            if(number >= index){
                $(item).removeClass("far").addClass("fas"); 
            }
        });
    },

    leave: function () {

        $(".fa-star").removeClass("fas").addClass("far");

    },

};

NotationEvent.init();
