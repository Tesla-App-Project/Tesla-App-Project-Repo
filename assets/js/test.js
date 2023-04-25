$(document).ready(function() {

    $('#inscription').hide();

    $('#inscription-btn').click(function() {
        $('#connexion').fadeOut(500, function() {
            $('#inscription').fadeIn(500);
        });
    });

    $('#connexion-btn').click(function() {
        $('#inscription').fadeOut(500, function() {
            $('#connexion').fadeIn(500);
        });
    });
});
