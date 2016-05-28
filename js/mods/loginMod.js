function showNoLoad(){
  $("#resultadoNo").hide();
}

function showSub(valProceso){
  var parametros = {
  "valProceso" : valProceso
  };
  $.ajax({
      data:  parametros,
      url:   'lib/mods/logiSub.php',
      type:  'post',
      success:  function (response) {
              $("#resultadoSub").html(response);
              $("#resultadoAre").hide();
      },

   });
}


function showAre(valSubdir){
  var parametros = {
  "valSubdir" : valSubdir
  };
  $.ajax({
      data:  parametros,
      url:   'lib/mods/logiAre.php',
      type:  'post',
      success:  function (response) {
              $("#resultadoAre").html(response);
               $("#resultadoAre").show();
          
      },

   });
}

function showNo(){
  $("#resultadoNo").show();
}