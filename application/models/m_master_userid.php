<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class M_master_userid extends CI_Model {
	public function __construct(){
            parent::__construct();
    }

	function get_userid($userid){
		$data_userid = $this->db->query("Select * from tb_user where username = '$userid'");
		return $data_userid;
	}
}
?>