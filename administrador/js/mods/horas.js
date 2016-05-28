
    $(document).ready(function() {
    var callAjax = function(){
      $.ajax({
	    type: "POST",
	    url: "../lib/mods/obtenerFechaHora.php",
	    success: function(a) {
                $('#horafecha').html(a);
	    }});}
    setInterval(callAjax,200);
    });

    $(document).ready(function() {
    var callAjax = function(){
      $.ajax({
	    type: "POST",
	    url: "../lib/mods/obtenerFechaHoraVal.php",
	    success: function(a) {
                $('#horafechaval').val(a);
	    }});}
    setInterval(callAjax,200);
    });

    $(document).ready(function() {
    var callAjax = function(){
      $.ajax({
	    type: "POST",
	    url: "../lib/mods/obtenerFechaHoraValMod.php",
	    success: function(a) {
                $('#horafechaval2').val(a);
	    }});}
    setInterval(callAjax,200);
    });