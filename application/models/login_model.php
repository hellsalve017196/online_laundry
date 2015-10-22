<?php
	
	class login_model extends CI_Model
	{
		private $id;
		
		public function login_process($data)
		{
			$res = array();
			
			$query = $this->db->get_where('user',array('u_email'=>$data['u_email'],'u_password'=>$data['u_password']));
		
			if($query->num_rows() == 1)
			{
				$res = $query->row_array();
			}
			
			return $res;
		}
		
		public function user_sign_up($user)
        {
            $flag = false;

            $query = $this->db->get_where('user',array('u_email'=>$user['u_email']));

            if($query->num_rows() == 0)
            {
                if($this->db->insert('user',$user))
                {
                    $flag = true;
                }
            }

            return $flag;
        }
	}
	
?>