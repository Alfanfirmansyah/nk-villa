<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_session extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	function get_session(){
		$data['session_userid'] = $this->session->userdata('session_userid');
		$data['session_status'] = $this->session->userdata('session_status');
		$data['session_key'] = $this->session->userdata('session_key');
		return $data;
	}

	function store_session($userid,$status,$key){
		//$userid='1';
		$this->session->set_userdata('session_userid', $userid);
		$this->session->set_userdata('session_status', $status);
		$this->session->set_userdata('session_key', $key);
	}

	function destroy_session(){
		$this->session->unset_userdata('session_userid');
		$this->session->unset_userdata('session_status');
		$this->session->unset_userdata('session_key');
	}
}
?>