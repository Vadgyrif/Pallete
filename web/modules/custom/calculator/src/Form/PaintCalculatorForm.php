<?php

namespace Drupal\calculator\Form;


use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\HttpFoundation\Request;

class PaintCalculatorForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'paint_calculator_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, Request $request = NULL) {
    $form['length'] = [
      '#type' => 'number',
      '#title' => $this->t('Length (m)'),
      '#required' => TRUE,
    ];

    $form['width'] = [
      '#type' => 'number',
      '#title' => $this->t('Width (m)'),
      '#required' => TRUE,
    ];

    $form['height'] = [
      '#type' => 'number',
      '#title' => $this->t('Height (m)'),
      '#required' => TRUE,
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Calculate'),
      '#ajax' => [
        'callback' => '::calculatePaintQuantity',
        'event' => 'click',
        'wrapper' => 'paint-calculator-result',
      ],
    ];

    $form['result'] = [
      '#type' => 'markup',
      '#prefix' => '<div id="paint-calculator-result">',
      '#suffix' => '</div>',
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Nothing to do here as calculation is handled by AJAX callback.
  }

  /**
   * AJAX callback to calculate paint quantity.
   */
  public function calculatePaintQuantity(array &$form, FormStateInterface $form_state) {
    $length = $form_state->getValue('length');
    $width = $form_state->getValue('width');
    $height = $form_state->getValue('height');

    // Calculate paint quantity (volume * 2mm for each layer).
    $volume = 2 * $height * ($width + $length );
    //$volume = $length * $width * $height;
    $paint_quantity = $volume / 10; // 

    $result = $this->t('Estimated paint quantity needed: @quantity liters', ['@quantity' => $paint_quantity]);
    $form['result']['#markup'] = $result;

    return $form['result'];
  }

}
