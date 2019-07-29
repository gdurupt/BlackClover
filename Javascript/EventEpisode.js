// -----------------------------------------------------------------------------------------------------//

//  Event Page Episode

// -----------------------------------------------------------------------------------------------------//

var EventEpisode = {

    EventFirstClick: function (arc) {

        var eventArc = "#arc_" + arc;

        var viewEpisodes = "#arc_" + arc + "_episodes";

        $(viewEpisodes).css("display", "flex");

        $(eventArc).attr('onclick','EventEpisode.EventSecondClick("' + arc + '")');

    },

    EventSecondClick: function (arc) {

        var eventArc = "#arc_" + arc;

        var viewEpisodes = "#arc_" + arc + "_episodes";

        $(viewEpisodes).css("display", "none");

        $(eventArc).attr('onclick','EventEpisode.EventFirstClick("' + arc + '")');

    },

};
