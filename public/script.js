$(document).ready(function() {
    
    $('#filtre-form').submit(function(event) {
      event.preventDefault();
  
      
      var prixMin = $('#prix-min').val();
      var prixMax = $('#prix-max').val();
      var kmMin = $('#km-min').val();
      var kmMax = $('#km-max').val();
      var anneeMin = $('#annee-min').val();
      var anneeMax = $('#annee-max').val();
  
      
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
          $('#liste-voitures').html(response);
        }
      });
    });
  });
  