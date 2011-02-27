$(function() {
  fancybox();
});

function fancybox() {
  $("a[href *= '.jpg'], a[href *= '.jpeg'], a[href *= '.png'], a[href *= '.gif']").fancybox({
    'zoomOpacity': true,
    'overlayShow': false,
    'zoomSpeedIn': 500,
    'zoomSpeedOut': 500,
    'transitionIn': 'elastic',
    'transitionOut': 'elastic',
    'easingIn': 'easeOutBack',
    'easingOut': 'easeInBack',
    'centerOnScroll': true,
    'hideOnContentClick': false
  });
}