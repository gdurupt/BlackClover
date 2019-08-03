// -----------------------------------------------------------------------------------------------------//

//  Event Page Gestion Commentaire

// -----------------------------------------------------------------------------------------------------//

var EventGestionCommentaire = {

        EventChoose: function (choose) {
            
        $(".anime").css("display", "none");
            
        $(".manga").css("display", "none");
               
        var className = "." + choose;
            
        $(className).css("display", "flex");

    },
    
    EventFirstClickManga: function (manga) {

        var eventManga = "#manga_" + manga;

        var viewComs = "#DivGestionComsManga" + manga;

        $(viewComs).css("display", "flex");

        $(eventManga).attr("onclick","EventGestionCommentaire.EventSecondClickManga(" + manga + ")");

    },
    
        EventSecondClickManga: function (manga) {

        var eventManga = "#manga_" + manga;

        var viewComs = "#DivGestionComsManga" + manga;

        $(viewComs).css("display", "none");

        $(eventManga).attr("onclick","EventGestionCommentaire.EventFirstClickManga(" + manga + ")");

    },
    
    
    EventFirstClickArc: function (arc) {

        var eventArc = "#arc_" + arc;

        var viewEpisodes = "#DivGestionComsEp" + arc;

        $(viewEpisodes).css("display", "flex");

        $(eventArc).attr("onclick","EventGestionCommentaire.EventSecondClickArc(" + arc + ")");

    },

    EventSecondClickArc: function (arc) {

        var eventArc = "#arc_" + arc;

        var viewEpisodes = "#DivGestionComsEp" + arc;

        $(viewEpisodes).css("display", "none");
        
        $(".CommentaireBloc").css("display", "none");

        $(eventArc).attr("onclick","EventGestionCommentaire.EventFirstClickArc(" + arc + ")");

    },
    
    EventFirstClickEpisode: function (episode) {

        $(".CommentaireBloc").css("display", "none");

        var viewComs = "#DivGestionComs" + episode;

        $(viewComs).css("display", "flex");

    },
    

};
