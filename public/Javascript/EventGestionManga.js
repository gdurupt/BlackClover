// -----------------------------------------------------------------------------------------------------//

//  Event Page GestionManga

// -----------------------------------------------------------------------------------------------------//

var EventGestionManga = {

    EventClick: function (id) {
        
        $(".buttonTome").css("display", "none"); 
        
        if (id === "0") {
            $("#tomeNew").css("display", "flex");
        } else if (id != "0") {
            $("#tomeNew").css("display", "none");
        }
        
        if (id >= "1") {
            var tomeFlex = "#tome" + id;

            $(tomeFlex).css("display", "flex");
        }
    
        
    },

};
