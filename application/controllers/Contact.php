<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $config = array(
            'protocol'      => 'smtp',
            'smtp_host'     => 'ssl://smtp.googlemail.com',
            'smtp_port'     => '465',
            'smtp_user'     => MESSAGE_SENDER_EMAIL,
            'smtp_pass'    => MESSAGE_SENDER_EMAIL_PASSWORD,
            'mailtype'  => 'html',
            'charset'   => 'iso-8859-1'
        );

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->load->model("ContactModel");
    }

	public function index()
	{
		$data['body_id'] = "CONTACT";
		$info = $this->ContactModel->GetContactInfo();
		$data["data"] = array(
		    "address"   =>  $info->address,
            "tel"       =>  "Tel : " . $info->tel,
            "email"     =>  $info->email
        );
		if(isset($_SESSION['mail_notification']))
		    $data['notification_message'] = $_SESSION['mail_notification'];
		$this->load->view('TemplateContact', $data);
	}

	public function sendMail(){
        $info = $this->ContactModel->GetContactInfo();
        print_r($info);
        $this->email->from(MESSAGE_SENDER_EMAIL, $this->input->post("client_name"));
        $this->email->to($info->receiverEmail);
        $this->email->subject($this->input->post("client_name") . " via Contact Form");
        $message = "Sender : " . $this->input->post("client_name");
        $message .= "<br/>Email : " . $this->input->post("client_email");
        $message .= "<br/>Phone : " . $this->input->post("client_phone");
        $message .= "<br/>Interest : " . $this->input->post("client_interest");
        $message .= "<br/>Comment : " . $this->input->post("client_comment");

        $this->email->message($message);

        if ( ! $this->email->send())
            $this->session->set_flashdata('mail_notification', 'There was an error sending the mail. Please try again later. ');
        else
            $this->session->set_flashdata('mail_notification', 'Mail successfully sent.');


        redirect("contact/index");
    }

	public function jobs()
	{
		$data['body_id'] = "JOBS";
		$this->load->view('TemplateContact', $data);
	}

	public function location()
	{
		$data['body_id'] = "LOCATION";
		$this->load->view('TemplateContact', $data);
	}
}
