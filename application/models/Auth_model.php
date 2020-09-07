<?php
/**
*
*/
class Auth_model extends CI_Model
{


	public function login_verify($data)
	{
		$username = $data['username'];
	    $password = $data['password'];

		$query = $this->db->get_where('users', array('username' => $username, 'status' => 1));
		$user_data = $query->row();
		if (!empty($user_data->username)) {
			$res = array();
			if ($password == $this->encryption->decrypt($user_data->password)) {
					$result['valid'] = true;
					$result['user_id'] = $user_data->id;
					// $result['warehouse_id'] = $user_data->warehouse_id;
					$result['username'] = $user_data->username;
                    $result['first_name'] = $user_data->first_name;
                    $result['last_name'] = $user_data->last_name;
                    $result['email'] = $user_data->email;
                    $result['user_type'] = $user_data->user_type;
                 //   $result['user_img'] = $user_data->user_img;
                    $result['status'] = $user_data->status;
                    // $result['low_stock_qty'] = $user_data->low_stock_qty;
               // }
			}else{
				$result['valid'] = false;
                $result['error'] = 'Invalid username or password! OR Account is blocked';
			}

			return $result;
		}else{
			  $result['valid'] = false;
              $result['error'] = 'Invalid username or password! OR Account is blocked';

            return $result;
		}
	}



}

?>
