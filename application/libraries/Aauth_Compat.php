<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * a CodeIgniter-Aauth Compatibility Pack for deleted functions after v2.5.0  
 *
 * @author		Raphael Jackstadt <info@rejack.de>
 * @contributor Emre Akay <emreakayfb@hotmail.com>
 *
 * @copyright 2016 Raphael Jackstadt
 *
 * @version 1.0.0
 *
 * @license MIT
 *
 * The latest version of Aauth-Compat can be obtained from:
 * https://github.com/REJack/CodeIgniter-Aauth-Compat
 *
 */
class Aauth_Compat {

	/**
	 * The CodeIgniter object variable
	 * @access public
	 * @var object
	 */
	public $CI;

	/**
	 * Variable for loading the Aauth config array into
	 * @access public
	 * @var array
	 */
	public $aauth_config_vars;

	/**
	 * Variable for loading the config array into
	 * @access public
	 * @var array
	 */
	public $config_vars;

	/**
     * The CodeIgniter object variable
	 * @access public
     * @var object
     */
    public $aauth_db;


	/**
	 * Constructor
	 */
	public function __construct() {

		$this->CI = & get_instance();
		$this->CI->lang->load('aauth');
		$this->CI->config->load('aauth');
		$this->CI->config->load('aauth_compat');
		$this->aauth_config_vars = $this->CI->config->item('aauth');
		$this->config_vars = $this->CI->config->item('aauth_compat');

		$this->aauth_db = $this->CI->load->database($this->aauth_config_vars['db_profile'], TRUE); 
	}

	/**
	 * Add/Update System Variable
	 * if variable not set before, it will be set
	 * if set, overwrites the value
	 * @param string $key
	 * @param string $value
	 * @return bool
	 */
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

	/**
	 * Unset Aauth System Variable as key value
	 * @param string $key
	 * @return bool
	 */
	public function unset_system_var( $key ) {
		$this->aauth_db->where('data_key', $key);
		return $this->aauth_db->delete($this->config_vars['system_variables']);
	}

	/**
	 * Get Aauth System Variable by key
	 * Return string of variable value or FALSE
	 * @param string $key
	 * @return bool|string , FALSE if var is not set, the value of var if set
	 */
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
	
	 /**
	 * List System Variable Keys
	 * Return array of variable keys or FALSE
	 * @return bool|array , FALSE if var is not set, the value of var if set
	 */
	public function list_system_var_keys(){
		$query = $this->aauth_db->select('data_key');
		$query = $this->aauth_db->get($this->config_vars['system_variables']);

		if($query->num_rows() < 1) {
			return FALSE;
		} else {
			return $query->result();
		}
	}

}