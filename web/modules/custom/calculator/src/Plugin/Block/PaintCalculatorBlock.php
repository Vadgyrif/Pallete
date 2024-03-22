<?php

namespace Drupal\calculator\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface; 

/**
 *
 * @Block(
 *   id = "paint_calculator",
 *   admin_label = @Translation("Paint Calculator Paint"),
 *   category = @Translation("Custom")
 * )
 */


class PaintCalculatorBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */

  public function build() {
    // Build the form.
    $form = \Drupal::formBuilder()->getForm('Drupal\calculator\Form\PaintCalculatorForm');

    return $form;
  }

}
