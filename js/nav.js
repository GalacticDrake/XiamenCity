$(document).scroll(function () {
      var $nav = $(".nav");
      var $mod = $(".module");

      if($(this).scrollTop() > ($mod.height() - 55)) {
            $nav.removeClass('secondary');
            $nav.addClass('primary');
      } else {
            $nav.removeClass('primary');
            $nav.addClass('secondary');
      }
});