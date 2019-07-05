// -----------------------------------------------------------------------------------------------------//

//  Event Page GestionArcEpisode

// -----------------------------------------------------------------------------------------------------//

var EventGestionArcEpisode = {

    EventChooseArc: function (arc) {
        
        $(".gestionAll").css("display", "none"); 
        
        if (arc == "newArc") {
            $("#newArc").css("display", "flex");
        } else if (arc > "0") {
            $("#newArc").css("display", "none");
        }
        
        if (arc >= "1") {
            var arcFlex = "#arc_" + arc;

            $(arcFlex).css("display", "flex");
        }
    
        
    },

    
    EventChooseEpisode: function (episode) {
        $(".episodeliste").css("display", "none"); 
        
        if (episode == "gestionArc") {
            $("#gestionArc").css("display", "flex");
            $("#addEpisode").css("display", "none");
            $(".episodeliste").css("display", "none");
        } else if (episode == "addEpisode") {
            $("#addEpisode").css("display", "flex");
            $("#gestionArc").css("display", "none");
            $(".episodeliste").css("display", "none");
        }
        
        if (episode >= 1) {
            var episodeFlex = "#episode_" + episode;

            $(episodeFlex).css("display", "flex");
            $("#gestionArc").css("display", "none");
            $("#addEpisode").css("display", "none");
        }
    
        
    },
};
