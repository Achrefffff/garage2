$(document).ready(function() {
    // Écouteur d'événement pour la soumission du formulaire
    $('#filtre-form').submit(function(event) {
      // Empêcher le comportement par défaut du formulaire
      event.preventDefault();
  
      // Collecter les valeurs des champs de filtres
      var prixMin = $('#prix-min').val();
      var prixMax = $('#prix-max').val();
      var kmMin = $('#km-min').val();
      var kmMax = $('#km-max').val();
      var anneeMin = $('#annee-min').val();
      var anneeMax = $('#annee-max').val();
  
      // Envoyer une requête AJAX au serveur
      $.ajax({
        url: $(this).attr('action'),
        type: $(this).attr('method'),
        data: {
          prix_min: prixMin,
          prix_max: prixMax,
          km_min: kmMin,
          km_max: kmMax,
          annee_min: anneeMin,
          annee_max: anneeMax
        },
        success: function(response) {
          // Traiter la réponse du serveur (mise à jour de l'affichage, etc.)
          // Exemple : mettre à jour la liste des voitures avec les résultats filtrés
          $('#liste-voitures').html(response);
        }
      });
    });
  });
  