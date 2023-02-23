// reference: https://css-tricks.com/how-to-recreate-the-ripple-effect-of-material-design-buttons/
let ripple = document.querySelector('.js-ripple');

;(function($, window, document, undefined) {

    'use strict';
  
    var $ripple = $('.js-ripple');
  
    $ripple.mousedown(function(e) {
  
        var $this = $(this);
        var $offset = $this.parent().offset();
        var $circle = $this.find('.ripple-effect');

        var x = e.pageX - $offset.left;
        var y = e.pageY - $offset.top;

        $circle.css({
            top: y + 'px',
            left: x + 'px'
        });

        $this.addClass('is-active');  

        Promise.all([
            new Promise(rsv => ripple.addEventListener('mouseup', rsv, { once: true })),
            new Promise(rsv => setTimeout(rsv, 600))
        ])
            .then(() => { ripple.classList.remove('is-active');});
    });  

})(jQuery, window, document);