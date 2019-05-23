<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContactModel extends CI_Model {
    public function GetContactInfo(){
        $data = json_decode(file_get_contents('./assets/contactInfo.json'));
        return $data;
    }

    public function UpdateContactInfo(){
        $data = array(
            'receiverEmail' => $this->input->post("receiverEmail"),
            'address'       => $this->input->post('address'),
            'tel'           =>  $this->input->post('telephone'),
            'email'         =>  $this->input->post('displayEmail')
        );
        $newJsonString = json_encode($data);
        file_put_contents('./assets/contactInfo.json', $newJsonString);
        //print_r($this->input->post());
    }
}
