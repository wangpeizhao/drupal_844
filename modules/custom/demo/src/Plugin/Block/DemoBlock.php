<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Drupal\demo\Plugin\Block;

//
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Block\BlockPluginInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'Demo' block.
 *
 * @Block(
 *   id = "demo_block",
 *   admin_label = @Translation("Demo block"),
 *   category = @Translation("Demo"),
 * )
 */
class demoBlock extends BlockBase implements BlockPluginInterface {

    /**
     * {@inheritdoc}
     */
    public function build() {
        $config = $this->getConfiguration();

        if (isset($config['demo_block_name']) && !empty($config['demo_block_name'])) {
            $value = $config['demo_block_name'];
        } else {
            $value = $this->t('to no one');
        }
        return array(
            '#markup' => $this->t('Hello @name!', array('@name' => $value)),
//            '#theme'
        );
    }

    /**
     * {@inheritdoc}
     */
//    public function access(AccountInterface $account) {
//        return $account->hasPermission('access content');
//    }

    /**
     * {@inheritdoc}
     */
    public function blockForm($form, FormStateInterface $form_state) {
        $form = parent::blockForm($form, $form_state);

        $config = $this->getConfiguration();

        $form['demo_block_name'] = array(
            '#type' => 'textfield',
            '#title' => $this->t('Who'),
            '#description' => $this->t('Who do you want to say hello to?'),
            '#default_value' => isset($config['demo_block_name']) ? $config['demo_block_name'] : '',
        );
        $form['actions']['custom_submit'] = array(
            '#type' => 'submit',
            '#name' => 'custom_submit',
            '#value' => $this->t('Custom Submit'),
            '#submit' => array('::custom_submit_form'),
        );
//        ww($form);
        return $form;
    }

    /**
     * {@inheritdoc}
     */
    public function blockSubmit($form, FormStateInterface $form_state) {
        parent::blockSubmit($form, $form_state);
        $values = $form_state->getValues();
        $this->configuration['demo_block_name'] = $values['demo_block_name'];
    }

    /**
     * Custom submit actions
     */
    public function custom_submit_hook($form, FormStateInterface $form_state) {
        $values = $form_state->getValues();ww($values);
        //Perform the required actions
    }

    /**
     * Custom submit actions
     */
    public function custom_submit_form($form, FormStateInterface $form_state) {
        $values = $form_state->getValues();ww($values);
        //Perform the required actions
    }

}
