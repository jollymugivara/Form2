<?php

namespace Drupal\ex_form\Form;

use Drupal\Core\Form\FormBase;																			
use Drupal\Core\Form\FormStateInterface;													


class ExForm extends FormBase {

	 public $properties = [];

      public function getFormId() {
        return 'ex_form';
      }


      public function buildForm(array $form, FormStateInterface $form_state) {
    $form['firstname'] = array(
      '#type' => 'textfield',
      '#title' => 'Firstname',
      '#required' => TRUE
    );
    $form['lastname'] = array(
      '#type' => 'textfield',
      '#title' => 'Lastname',
      '#required' => TRUE
    );
    $form['subject'] = array(
      '#type' => 'textfield',
      '#title' => 'Subject',
      '#required' => TRUE
    );
    $form['message'] = array(
      '#type' => 'textarea',
      '#title' => 'Message',
      '#required' => TRUE
    );
    $form['email'] = array(
      '#type' => 'email',
      '#title' => $this->t('Your e-mail address'),
      '#required' => TRUE
    );
    $form['button'] = array(
      '#type' => 'submit',
      '#value' => 'Submit'
    );
  return $form;
      }

      public function validateForm(array &$form, FormStateInterface $form_state) {

        if (strpos($form_state->getValue('email'), '.com') === FALSE) {

           $form_state->setErrorByName('email', 'E-mail is incorrect!');

        }

      }

     public function submitForm(array &$form, FormStateInterface $form_state) {

        $message = $form_state->getValue('message');

        $message = wordwrap($message, 70, "\r\n");

        $subject = $form_state->getValue('subject');

        $res = mail('admin@mail.ru', $subject, $message);

        if($res) {

            \Drupal::logger('ex_form')->notice('Mail is sent. E-mail: '.$form_state->getValue('email'));

            drupal_set_message('E-mail is sent!');

        }

    $email = $form_state->getValue('email');
    $firstname = $form_state->getValue('firstname');
    $lastname = $form_state->getValue('lastname');


    $url = "https://api.hubapi.com/contacts/v1/contact/createOrUpdate/email/".$email."/?hapikey=$email = $form_state->getValue('email');
    $firstname = $form_state->getValue('firstname');
    $lastname = $form_state->getValue('lastname');


    $url = "https://api.hubapi.com/contacts/v1/contact/createOrUpdate/email/".$email."/?hapikey=0425c9e1-339a-495d-9acf-02363b6f9b8c";

    $data = array(
      'properties' => [
        [
          'property' => 'firstname',
          'value' => $firstname
        ],
        [
          'property' => 'lastname',
          'value' => $lastname 
        ]
      ]
    );


    $json = json_encode($data,true);

    $response = \Drupal::httpClient()->post($url.'&_format=hal_json', [
      'headers' => [
        'Content-Type' => 'application/json'
      ],
        'body' => $json
    ]);";

    $data = array(
      'properties' => [
        [
          'property' => 'firstname',
          'value' => $firstname
        ],
        [
          'property' => 'lastname',
          'value' => $lastname 
        ]
      ]
    );


    $json = json_encode($data,true);

    $response = \Drupal::httpClient()->post($url.'&_format=hal_json', [
      'headers' => [
        'Content-Type' => 'application/json'
      ],
        'body' => $json
    ]);

      }

    }

        ?>
