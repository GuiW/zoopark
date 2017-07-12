(function($){
  $(function(){

    $('.button-collapse').sideNav();
    $('.parallax').parallax();


    //Toggle tel
    //var inputState = true
    $('#test5').on('change', function() {
      //inputState = !inputState;

      if ($('#icon_telephone).is('[disabled=disabled]')) {
        alert("I'm disabled ! :(")
      }

      $('#icon_telephone').prop('disabled', inputState);

      if (inputState) {
        $('#icon_telephone').val("I am not editable")
      }
      else {
        $('#icon_telephone').val("")
      }
    })

  }); // end of document ready
})(jQuery); // end of jQuery name space