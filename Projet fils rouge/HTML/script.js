$(document).ready(function() {
    $.ajax({
        url: 'header.php', // Le fichier PHP qui génère le contenu
        type: 'GET', // La méthode HTTP (GET ou POST)
        dataType: 'html', // Le type de données à attendre en réponse (html, json, etc.)
        success: function(data) {
            // La fonction à exécuter lorsque la requête réussit
            $('#content').html(data); // Inclure le contenu dans le conteneur
        },
        error: function() {
            // La fonction à exécuter en cas d'erreur
            alert('Une erreur s\'est produite.');
        }
    });
});

$(document).ready(function() {
    $.ajax({
        url: 'footer.php', // Le fichier PHP qui génère le contenu
        type: 'GET', // La méthode HTTP (GET ou POST)
        dataType: 'html', // Le type de données à attendre en réponse (html, json, etc.)
        success: function(data) {
            // La fonction à exécuter lorsque la requête réussit
            $('#content2').html(data); // Inclure le contenu dans le conteneur
        },
        error: function() {
            // La fonction à exécuter en cas d'erreur
            alert('Une erreur s\'est produite.');
        }
    });
});