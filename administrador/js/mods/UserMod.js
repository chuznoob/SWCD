function startLoadAdd(){
  $("#resultadoSub").hide();
        $("#resultadoAre").hide();
}

function showSub(valProceso,valSubdirUser,valAreaUser){
  var parametros = {
  "valProceso" : valProceso,
    "valSubdirUser" : valSubdirUser,
      "valAreaUser" : valAreaUser
  };
  $.ajax({
      data:  parametros,
      url:  'mods/userSub.php',
      type:  'post',
      success:  function (response) {
    $("#resultadoSub").show();
        $("#resultadoSub").html(response);
              $("#resultadoAre").hide();
      },

   });
}

function showAre(valSubdir,valAreUser){
  var parametros = {
  "valSubdir" : valSubdir,
       "valAreUser" : valAreUser
  };
  $.ajax({
      data:  parametros,
      url:   'mods/userAre.php',
      type:  'post',
      success:  function (response) {
          $("#resultadoAre").show();
              $("#resultadoAre").html(response);
               
          
      },

   });
}
