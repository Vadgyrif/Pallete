/**
 * @file
 * Global utilities.
 *
 */
(function($, Drupal) {

  'use strict';

  Drupal.behaviors.palette = {
    attach: function(context, settings) {

      document.getElementById('first-btn').addEventListener('click', function() {
        var nextBlock = document.getElementById('block-palette-views-block-short-info-block-1');
        nextBlock.scrollIntoView({ behavior: 'smooth' });
    });
    
      // Custom code here

    }
  };

})(jQuery, Drupal);