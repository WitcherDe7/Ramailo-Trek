/*
 |--------------------------------------------------------------------------
 | Shards Dashboards: Components Overview Template
 |--------------------------------------------------------------------------
 */

'use strict';

(function ($) {
  $(document).ready(function() {

    // Slider example 1
    $('#slider-example-1').customSlider({
      start: 50,
      connect: [true, false],
      tooltips: [false],
      pips: {
        mode: 'count',
        values: 3,
        format: {
          to: function(value) {
            if (value < 33.33) {
              return 'Low';
            } else if (value >= 33.33 && value < 66.66) {
              return 'Moderate';
            } else {
              return 'High';
            }
          }
        }
      },
      range: {
        'min': 0,
        'max': 100
      }
    });
    

    // Slider example 2
    $('#slider-example-2').customSlider({
      start: 15,
      connect: [false, true],
      range: {
        'min':  0,
        'max':  100
      }
    });

    // Slider example 3
    $('#slider-example-3').customSlider({
      start: [35],
      range: {
        min: 0,
        max: 100
      },
      connect: true,
      pips: {
        mode: 'positions',
        values: [0, 50, 100],
        density: 15
      }
    });

  });
})(jQuery);
