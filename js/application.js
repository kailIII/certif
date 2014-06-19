// Some general UI pack related JS
// Extend JS String with repeat method
String.prototype.repeat = function(num) {
    return new Array(num + 1).join(this);
};

(function($) {

  // Add segments to a slider
  $.fn.addSliderSegments = function (amount) {
    return this.each(function () {
      var segmentGap = 100 / (amount - 1) + "%"
        , segment = "<div class='ui-slider-segment' style='margin-left: " + segmentGap + ";'></div>";
      $(this).prepend(segment.repeat(amount - 2));
    });
  };

  $(function() {
  
    // Todo list
    $(".todo li").click(function() {
        $(this).toggleClass("todo-done");
    });

    // Custom Selects
    $("select[name='huge']").selectpicker({style: 'btn-hg btn-primary', menuStyle: 'dropdown-inverse'});
    $("select[name='tipocertf']").selectpicker({style: 'btn-primary', menuStyle: 'dropdown-inverse'});
    $("select[name='perfil']").selectpicker({style: 'btn-primary', menuStyle: 'dropdown-inverse'});
    $("select[name='nombreobra']").selectpicker({style: 'btn-primary', menuStyle: 'dropdown-inverse'});
    $("select[name='comitente']").selectpicker({style: 'btn-primary', menuStyle: 'dropdown-inverse'});
    $("select[name='info']").selectpicker({style: 'btn-info'});

    // Show and create tooltip first so we can apply the data-tooltip-style
    $('[data-toggle=tooltip]').tooltip();

    // Add style class name to a tooltips
//    $(".tooltip").addClass(function() {
//      if ($(this).prev().attr("data-tooltip-style")) {
//        return "tooltip-" + $(this).prev().attr("data-tooltip-style");
//      }
//    });
//
//    // Hide the tooltip so it's not visible until hovering
//    $("[data-toggle=tooltip]").tooltip("hide");

    // Tags Input
    $(".tagsinput").tagsInput();

    // jQuery UI Sliders
    var $slider = $("#slider");
    if ($slider.length) {
      $slider.slider({
        min: 1,
        max: 5,
        value: 2,
        orientation: "horizontal",
        range: "min"
      }).addSliderSegments($slider.slider("option").max);
    }

    // Placeholders for input/textarea
    $("input, textarea").placeholder();

    // Make pagination demo work
    $(".pagination a").on('click', function() {
      $(this).parent().siblings("li").removeClass("active").end().addClass("active");
    });

    $(".btn-group a").on('click', function() {
      $(this).siblings().removeClass("active").end().addClass("active");
    });

    // Disable link clicks to prevent page scrolling
    $('a[href="#fakelink"]').on('click', function (e) {
      e.preventDefault();
    });

    // Switch
    $("[data-toggle='switch']").wrap('<div class="switch" />').parent().bootstrapSwitch();
    
  });
  $(function(){
    $(".custom-input-file input:file").change(function(){
        $(this).parent().find(".archivo").html($(this).val());
    }).css('border-width',function(){
        if(navigator.appName == "Microsoft Internet Explorer")
            return 0;
    });
});
})(jQuery);