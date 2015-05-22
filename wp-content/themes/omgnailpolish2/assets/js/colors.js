jQuery(document).ready(function($){

  var opts = {
    lines: 13, // The number of lines to draw
    length: 9, // The length of each line
    width: 2, // The line thickness
    radius: 7, // The radius of the inner circle
    corners: 0.9, // Corner roundness (0..1)
    rotate: 0, // The rotation offset
    direction: 1, // 1: clockwise, -1: counterclockwise
    color: '#000', // #rgb or #rrggbb or array of colors
    speed: 1, // Rounds per second
    trail: 60, // Afterglow percentage
    shadow: false, // Whether to render a shadow
    hwaccel: false, // Whether to use hardware acceleration
    className: 'spinner', // The CSS class to assign to the spinner
    zIndex: 2e9, // The z-index (defaults to 2000000000)
    top: 'auto', // Top position relative to parent in px
    left: 'auto' // Left position relative to parent in px
  };

  $('#selectColor').on('change', function(){
    $('.colors-overlay').show();
    $('#spinner').spin(opts);

    var colorCat = $(this).val();
    var data = { cat : colorCat };

    $.ajax({
      type:"post",
      url:myVars.admin_ajax + '?action=get-colors',
      dataType:"json",
      data:data,
      success:function(result){
        $('#cutix-container').html('');
        $('#cutix-container').html(result.html);
        $('.colors-overlay').hide();
        $('#spinner').spin(false);
      }
    });

  });

});