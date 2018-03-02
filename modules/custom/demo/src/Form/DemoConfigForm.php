<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * @file
 * Contains \Drupal\demo\Form\DemoForm.
 */

namespace Drupal\demo\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;

class DemoConfigForm extends ConfigFormBase {

    /**
     * {@inheritdoc}.
     */
    public function getFormId() {
        return 'demo_config_form';
    }

    /**
     * {@inheritdoc}
     */
    protected function getEditableConfigNames() {
        return [
            'demo.settings',
        ];
    }

    /**
     * {@inheritdoc}.
     */
    public function buildForm(array $form, FormStateInterface $form_state) {
        // Add the core AJAX library.
//    $form['#attached']['library'][] = 'core/drupal.ajax';
//    $config = $this->config('contribute.settings');
        $form['#attributes'] = ['novalidate' => TRUE];
        $form['account'] = [
            '#type' => 'fieldset',
            '#title' => $this->t('Drupal.org Account'),
            '#states' => [
                'visible' => [
                    ':input[name="disable"]' => ['checked' => FALSE],
                ],
            ],
        ];
        $form['account']['account_type'] = [
            '#type' => 'radios',
            '#title' => $this->t('Account type'),
            '#description' => $this->t('Please select the type of Drupal.org account that you use to contribute back to Drupal'),
            '#options' => [
                'user' => $this->t('Individual user'),
                'organization' => $this->t('Organization'),
            ],
//      '#default_value' => $config->get('account_type') ?: 'user',
            '#states' => [
                'required' => [
                    ':input[name="disable"]' => ['checked' => FALSE],
                ],
            ],
        ];
        $form['account']['user_id'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Drupal.org user name'),
            '#description' => $this->t('Please enter your user name. <a href=":href">Create new user account</a>', [':href' => 'https://register.drupal.org/user/register']),
//      '#default_value' => ($config->get('account_type') === 'user') ? $config->get('account_id') : '',
            '#autocomplete_route_name' => 'contribute.autocomplete',
            '#autocomplete_route_parameters' => ['account_type' => 'user'],
            '#states' => [
                'required' => [
                    ':input[name="account_type"]' => ['value' => 'user'],
                ],
                'visible' => [
                    ':input[name="account_type"]' => ['value' => 'user'],
                ],
            ],
        ];
        $form['account']['organization_id'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Drupal.org organization name'),
            '#description' => $this->t('Please enter your organization\'s name. <a href=":href">Create new organization</a>', [':href' => 'https://www.drupal.org/node/add/organization']),
//      '#default_value' => ($config->get('account_type') === 'organization') ? $config->get('account_id') : '',
            '#autocomplete_route_name' => 'contribute.autocomplete',
            '#autocomplete_route_parameters' => ['account_type' => 'organization'],
            '#states' => [
                'required' => [
                    ':input[name="account_type"]' => ['value' => 'organization'],
                ],
                'visible' => [
                    ':input[name="account_type"]' => ['value' => 'organization'],
                ],
            ],
        ];

        $form['warning'] = [
            '#type' => 'container',
            '#markup' => '<strong>' . $this->t('Are you sure that you want to hide contribution information?') . '</strong><br/>' .
            $this->t('Contribute information will only be configurable from the <a href=":href">Extend</a> page.', [':href' => Url::fromRoute('system.modules_list')->toString()]),
            '#attributes' => ['class' => ['messages messages--warning']],
            '#states' => [
                'visible' => [
                    ':input[name="disable"]' => ['checked' => TRUE],
                ],
            ],
        ];
        $form['disable'] = [
            '#type' => 'checkbox',
            '#title' => $this->t("Do not display contribution information"),
//      '#default_value' => !$config->get('status'),
            '#return_value' => TRUE,
        ];

        $form['actions'] = ['#type' => 'actions'];
        $form['actions']['submit'] = [
            '#type' => 'submit',
            '#value' => $this->t('Save'),
            '#button_type' => 'primary',
        ];
        $form['actions']['delete'] = [
            '#type' => 'submit',
            '#value' => $this->t('Clear'),
            '#attributes' => [
                'class' => ['button--danger'],
            ],
        ];

//    return $form;
        $config = $this->config('demo.settings');

        $form['example_thing'] = array(
            '#type' => 'textfield',
            '#title' => $this->t('Things'),
            '#default_value' => $config->get('example_thing'),
        );

        $form['other_things'] = array(
            '#type' => 'textfield',
            '#title' => $this->t('Other things'),
            '#default_value' => $config->get('other_things'),
        );
return $form;
        return parent::buildForm($form, $form_state);
    }

    /**
     * {@inheritdoc}
     */
    public function validateForm(array &$form, FormStateInterface $form_state) {
        $values = $form_state->getValues();
        if (!empty($values['email']) && strpos($values['email'], '.com') === FALSE) {
//            $this->setFormError('email', $form_state, $this->t('This is not a .com email address.'));
            drupal_set_message($this->t('This is not a .com email address.'), 'error');
            return false;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state) {
        //如果你有一个字段组包裹你的表单元素，你需要传一个数组给getvalue()函数，而不是一个单个的字段值，例如
//        $this->configuration['hello_block_name'] = $form_state->getValue(array('myfieldset', 'hello_block_name'));
//        parent::submitForm($form, $form_state);
        $values = $form_state->getValues();
//        ww($values);
        drupal_set_message($this->t('Your email address is @email', array('@email' => $values['phone'])));
        $this->configuration['demo_block_email_name'] = $form_state->getValue('phone');


        // Retrieve the configuration
        $this->configFactory->getEditable('demo.settings')
                // Set the submitted configuration setting
                ->set('example_thing', 'example_thing')
                // You can set multiple configurations at once by making
                // multiple calls to set()
                ->set('other_things', 'other_things')//$form_state->getValue('other_things')
                ->save();
        
    }

}
