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

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class DemoForm extends FormBase {

    /**
     * {@inheritdoc}.
     */
    public function getFormId() {
        return 'demo_form';
    }

    /**
     * {@inheritdoc}
     */
    protected function blockAccess(AccountInterface $account) {
        return AccessResult::allowedIfHasPermission($account, 'generate lorem ipsum');
    }

    /**
     * {@inheritdoc}.
     */
    public function buildForm(array $form, FormStateInterface $form_state) {
//        $form = \Drupal::formBuilder()->getForm('Drupal\demo\Form\DemoForm');
        //Immutable Config (Read Only)
        $config = \Drupal::config('demo.settings');
        //Mutable Config (Read / Write)
//        $config = \Drupal::service('config.factory')->getEditable('demo.settings');
        $default_value = $config->get('settings.email_value');

        $form['email'] = array(
            '#type' => 'email',
            '#title' => $this->t('Your .com email address.'),
            '#default_value' => $default_value,
            '#weight' => 10
        );
        $form['details'] = array(
            '#type' => 'details',
            '#title' => $this->t('details.'),
            '#weight' => 11
        );
        $form['language_select'] = array(
            '#type' => 'language_select',
            '#title' => $this->t('language_select.'),
            '#weight' => 12
        );
        $form['dropbutton'] = array(
            '#type' => 'dropbutton',
            '#title' => $this->t('dropbutton.'),
            '#weight' => 13
        );
        $form['operations'] = array(
            '#type' => 'operations',
            '#title' => $this->t('operations.'),
            '#weight' => 14
        );
//        $form['entity_autocomplete'] = array(
//            '#type' => 'entity_autocomplete',
//            '#title' => $this->t('entity_autocomplete.'),
//            '#weight' => 15
//        );
        $form['show'] = array(
            '#type' => 'submit',
            '#value' => $this->t('Submit'),
            '#weight' => 30
        );
        
//        $this->_db();
        
        return $form;
    }
    
    private function _db(){
        
        // Create an object of type Select
        $connection = \Drupal::database();
        $query = $connection->select('demo_user', 'u');

        // Add extra detail to this query object: a condition, fields and a range
        $query->condition('u.id', 0, '<>');
        $query->fields('u', ['id', 'email', 'phone']);
        $query->range(0, 50);

        $num_rows = $query->countQuery()->execute()->fetchField();

        www($num_rows);
        $result = $query->execute();
        foreach ($result as $record) {
            www($record->id . ' - ' . $record->email . ' - ' . $record->phone);
        }

        $connection->merge('demo_user')
                ->key(['phone' => '13533615795'])
                ->fields([
                    'email' => '123456@qq.com',
                    'phone' => '13533615795',
                ])
                ->execute();

//        echo $query;
        print_r($query->__toString());
        echo '<br>', '<br>';
        print_r($query->arguments());

        exit();
    }

    /**
     * {@inheritdoc}
     */
    public function validateForm(array &$form, FormStateInterface $form_state) {
        $values = $form_state->getValues();
        if (strpos($values['email'], '.com') === FALSE) {
//            $this->setFormError('email', $form_state, $this->t('This is not a .com email address.'));
//            drupal_set_message($this->t('This is not a .com email address.'), 'error');
            $form_state->setErrorByName('email', $this->t('This is not a .com email address.'));
//            return false;
            // Logs an error
            \Drupal::logger('my_module')->error('This is not a .com email address.');
        }
        if (strlen($values['phone']) < 3) {
            $form_state->setErrorByName('phone', $this->t('The phone number is too short. Please enter a full phone number.'));
            // Logs an error
            \Drupal::logger('my_module')->error('The phone number is too short. Please enter a full phone number.');
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
        $this->configuration['demo_block_email_name'] = $form_state->getValue('email');

        db_insert("demo_user")->fields(array('email' => $values['email'], 'phone' => $values['phone']))->execute();
//      
        // Logs a notice
        \Drupal::logger('my_module')->notice('Success');
        drupal_set_message($this->t('Success!Your email address is @email,phone is @phone', array('@email' => $values['email'], '@phone' => $values['phone'])));
    }

}
