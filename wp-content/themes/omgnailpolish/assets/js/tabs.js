$(document).ready(function(){

 var _tab_items = $('.menutabs ul li a');
 var _tab_current = 0;
 $('.tabscontentbx').eq(_tab_current).show();
 
 $('.menutabs li a').click( function (event) {
 _tab_current = _tab_items.index(this);
 $('.tabscontentbx').hide();
 $('.tabscontentbx').eq(_tab_current).show();
   
 $(this).parent().parent().find('a').removeClass('active');
 $(this).addClass('active');
 } );

});
