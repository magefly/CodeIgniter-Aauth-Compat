<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * a CodeIgniter-Aauth Compatibility Pack for deleted functions after v2.5.0  
 *
 * @author		Raphael Jackstadt <info@rejack.de>
 * @contributor Emre Akay <emreakayfb@hotmail.com>
 *
 * @copyright 2016 Raphael Jackstadt
 *
 * @version 1.0.1
 *
 * @license MIT
 *
 * The latest version of Aauth-Compat can be obtained from:
 * https://github.com/REJack/CodeIgniter-Aauth-Compat
 *
 */
class Aauth_Compat {

	public $CI;

	public $aauth_config_vars;

	public $config_vars;

    public $aauth_db;


	public function __construct() {
		$this->CI = & get_instance();
		$this->CI->lang->load('aauth');
		$this->CI->config->load('aauth');
		$this->CI->config->load('aauth_compat');
		$this->aauth_config_vars = $this->CI->config->item('aauth');
		$this->config_vars = $this->CI->config->item('aauth_compat');
		$this->aauth_db = $this->CI->load->database($this->aauth_config_vars['db_profile'], TRUE); 
	}

	public function set_system_var( $key, $value ) {
		if($this->get_system_var($key) === FALSE) {
			$data = array(
				'data_key' => $key,
				'value' => $value,
			);
			return $this->aauth_db->insert($this->config_vars['system_variables'] , $data);
		} else {
			$data = array(
				'data_key' => $key,
				'value' => $value,
			);
			$this->aauth_db->where('data_key', $key);
			return $this->aauth_db->update($this->config_vars['system_variables'], $data);
		}
	}

	public function unset_system_var( $key ) {
		$this->aauth_db->where('data_key', $key);
		return $this->aauth_db->delete($this->config_vars['system_variables']);
	}

	public function get_system_var( $key ){
		$query = $this->aauth_db->where('data_key', $key);
		$query = $this->aauth_db->get($this->config_vars['system_variables']);

		if($query->num_rows() < 1) { 
			return FALSE;
		} else {
			$row = $query->row();
			return $row->value;
		}
	}

	public function get_system_vars(){
		$query = $this->aauth_db->select('data_key, value');
		$query = $this->aauth_db->get($this->config_vars['system_variables']);
		if($query->num_rows() != 0) { 
			return $query->result();
		}else{
			return array();
		}
	}
	
	public function list_system_var_keys(){
		$query = $this->aauth_db->select('data_key');
		$query = $this->aauth_db->get($this->config_vars['system_variables']);

		if($query->num_rows() != 0) {
			return $query->result();
		} else {
			return array();
		}
	}

}