$(document).ready(function() {

    $('#inscription').hide();

    $('#inscription-btn').click(function() {
        $('#connexion').hide();
        $('#inscription').show();
    });

    $('#connexion-btn').click(function() {
        $('#inscription').hide();
        $('#connexion').show();
    });
});