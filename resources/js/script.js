$(document).ready(function(){

  $('.ajax-form').submit(function(){
    var $this = $(this),
        data = $this.serialize(),
        url = $this.attr('action');

    $('.error-message').empty();
    $this.find('input').removeClass('error-alert');

    $.ajax({
      url: url,
      method: 'post',
      data: data,
      dataType: 'json',
      success: function(response) {

        console.log(response);

        var final_check = true;

        for (var i in response) {
          if (response[i] !== null) {
            final_check = false;
            break;
          }
        }

        if (final_check) {
          window.location.pathname = '/shoosh-alpha/public/';
        } else {
          $.each(response, function(key, value){

            if (value !== null) {
              $('<li><span>'+ value +'</span></li>').appendTo('.error-message');
              $this.find('input[name='+ key.replace(/_/g, "-") +']').addClass('error-alert');
            }

          });
        }

      }
    });
    return false;
  })

});
