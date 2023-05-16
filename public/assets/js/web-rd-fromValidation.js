$(document).ready(function () {
//----------------validation----------------------//
    $('.form-control').on('input', function () {
        validateInput($(this));
      });
      
      $('.form-control').on('focusout', function () {
        validateInput($(this));
      });
      
      function validateInput(input) {
        var value = input.val();
        
        if (input.prop('required') && value.trim() === '') {
          input.removeClass('is-valid').addClass('is-invalid');
          return;
        }
        
        if (input.attr('type') === 'number' && !$.isNumeric(value)) {
          input.removeClass('is-valid').addClass('is-invalid');
          return;
        }
        
        input.removeClass('is-invalid').addClass('is-valid');
      }


//---------------------end of validation------------------------------//
});