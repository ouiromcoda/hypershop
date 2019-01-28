<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cp_model extends CI_Model {

    /**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         Scash V1
 * @category        Model
 * @author          DSI , WELLIBO Technologies
 * @license         MIT
 * @link            http://www.wellibo.ci
 */

  function getUserInfos($email_user,$password_user){
      $this->db->where('usr_email',$email_user);
      $this->db->where('usr_password',$password_user);
      $q = $this->db->get('users');
      if($q->num_rows()>0)
      {
          foreach ($q->result() as $lign)
          {
              $data[]=$lign;
          }
          
          return $data;
      }
    }

 function getUserInfos_by($usr_id){
      $this->db->where('usr_id',$usr_id);
      $q = $this->db->get('users');
      if($q->num_rows()>0)
      {
          foreach ($q->result() as $lign)
          {
              $data[]=$lign;
          }
          
          return $data;
      }
    }
    function checkConnection($email_user,$password_user){
       $this->db->where('usr_email',$email_user);
      $this->db->where('usr_password',$password_user);
      //$this->db->where('status >', '0');
      $q = $this->db->get('users');
    
      $count=0;

      if($q->num_rows()>0)
      {
         return True;        
      }
      else
      {
        return False;
      }


    }

    function checkToken($token){
            $this->db->select('token')->from('user')->where('token',$token);
            $this->db->where('status','0');
            $query=$this->db->get();
            return $query->first_row();
    }

}

/* End of file compte_model.php */
/* Location: ./application/modules/compte/models/compte_model.php */