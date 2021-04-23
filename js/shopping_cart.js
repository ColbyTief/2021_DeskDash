//$(function(){
//  //Initialize variables of the elements that are being animated. 
//  var $shoppingCart = $('#shoppingCart');
//  var $loginButton = $('#login');
//
//  $shoppingCart.css({
//    opacity: '20%',
//    transform: 'scale(' + 10 + ',' + 20 + ')'
//  }).animate({
//    transform: 'scale(' + 1 + ')',
//    opacity: '80%'
//  }, 1000, 'easeInQuad', function() {
//    $shoppingCart.animate({ 
//      left: '-205px'
//    }, 500, 'easeInElastic')
//  })
//});

$(function() {
  var $shoppingCart = $('#shoppingCart');
  $shoppingCart.animate({left: "-=500"}, 500);
  $shoppingCart.animate({left: "+=500"}, 1000);
  $shoppingCart.animate({
    opacity: '70%'
  }, 1000)
  
  $shoppingCart.hover(function() {
    $(this).css({ opacity: '100%'});
  },
   function() {
    $(this).css({ opacity: '70%'});
  });
});