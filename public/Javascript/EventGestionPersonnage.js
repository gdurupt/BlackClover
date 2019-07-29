// -----------------------------------------------------------------------------------------------------//

//  Event Page GestionPersonnage

// -----------------------------------------------------------------------------------------------------//

var EventGestionPersonnage = {

    EventClick: function (id) {
        
        $(".buttonPersonnage").css("display", "none"); 
        
        if (id === "0") {
            $("#personnageNew").css("display", "flex");
        } else if (id != "0") {
            $("#personnageNew").css("display", "none");
        }
        
        if (id >= "1") {
            var personnageFlex = "#personnage" + id;

            $(personnageFlex).css("display", "flex");
        }
    
        
    },

};
