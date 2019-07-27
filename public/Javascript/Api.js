// -----------------------------------------------------------------------------------------------------//

//  API

// -----------------------------------------------------------------------------------------------------//
var Api = {
    // -----------------------------------------------------------------------------------------------------//
    init: function () {
        this.before = "7";
        this.after = "0"; 
        this.v = "3.0"; // Version 3.0
        this.key = "87b446de1ea2"; // Clé d'acces
        this.api(); // Recuperation des données Betaserie
    },
    // -----------------------------------------------------------------------------------------------------//
    api: function () {
        ajaxGet("https://api.betaseries.com/planning/general?key=" + this.key + "&v=" + this.v + "&before=" + this.before + "&after=" + this.after, function (reponse) {
            var data = JSON.parse(reponse);
            //console.log(data.episodes[1]);

            data.episodes.forEach(function (element) {
                if(element.show.title == "Black Clover"){
                    $("#title").text(element.title);
                    $("#episode").text("Episode " + element.episode);
                    $("#date").text(element.date);
                    $("#content").text(element.description);
                    console.log(element);
                }
            });
        });
    },
};

// -----------------------------------------------------------------------------------------------------//
Api.init(); // On active l'API
