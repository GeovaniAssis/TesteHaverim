<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_input extends CI_Input {
		
		function save_query($query_array,$user) {
			
			$CI =& get_instance();

			$rows = $CI->db->get_where('sv_query', array('user' => $user))->result();

			if(!empty($rows[0])) {

				if($rows[0]->query_string != http_build_query($query_array)){

					$CI->db->where('user', $user);
    				$CI->db->update('sv_query',  array('query_string' => http_build_query($query_array)));
    				return $rows[0]->id;

				}else{

					$this->load_query($rows[0]->id);
					return $rows[0]->id;

				}
			} 

		}
		
		function load_query($query_id) {
			
			$CI =& get_instance();
			
			$rows = $CI->db->get_where('sv_query', array('id' => $query_id))->result();
			if (isset($rows[0])) {
				parse_str($rows[0]->query_string, $_GET);		
			}
			
		}
	
}