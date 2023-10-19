<?php

namespace Drupal\my_simple_module\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configuration form definition for the salutation message.
 */
class SalutationConfigurationForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['my_simple_module.custom_salutation'];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'salutation_configuration_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('my_simple_module.custom_salutation');

    $form['salutation'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Salutation'),
        '#description' => $this->t('Please provide the salutation you want to use.'),
        '#default_value' => $config->get('salutation'),
    ];
    $form['greeting'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Greeting'),
        '#description' => $this->t('Please provide the greeting you want to use.'),
        '#default_value' => $config->get('greeting'),
      ];
    $form['greeting_type'] = [
        '#type' => 'select',
        '#title' => $this->t('Greeting Type'),
        '#description' => $this->t('Please select the type of greeting.'),
        '#options' => [
            'morning' => $this->t('Morning'),
            'afternoon' => $this->t('Afternoon'),
            'evening' => $this->t('Evening'),
        ],
        '#default_value' => $config->get('greeting_type'),
    ];
    $form['greeting_date'] = [
        '#type' => 'date_popup',
        '#title' => $this->t('Greeting Date'),
        '#description' => $this->t('Please select a date for the greeting.'),
        '#default_value' => $config->get('greeting_date'),
        '#date_date_format' => 'Y-m-d',
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('my_simple_module.custom_salutation')
        ->set('salutation', $form_state->getValue('salutation'))
        ->set('greeting', $form_state->getValue('greeting'))
        ->set('greeting_type', $form_state->getValue('greeting_type'))
        ->set('greeting_date', $form_state->getValue('greeting_date'))
        ->save();

    parent::submitForm($form, $form_state);
  }

}