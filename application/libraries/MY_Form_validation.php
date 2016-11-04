<?php

	class MY_form_validation extends CI_Form_validation{


		public function is_edit($str) {

				$ci =&get_instance();

				$query = $ci->db->where('text', $str) ->get('notes');

				if($query->result()){

					return false;
				}

				else{

					return true;
				}

		}


	}
?>