<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		 $this->load->model('dashboard/dashboard_model');
        $this->load->model('panier/model_products');
        $this->load->model('cp/cp_model');
	}

	 public function getCategorie()
    {
    header("Access-Control-Allow-Origin: *");
          echo json_encode($this->dashboard_model->get_all_prod_cat());
    }

     public function getProduct()
    {
    header("Access-Control-Allow-Origin: *");
          echo json_encode($this->model_products->all_products());
    }

     public function getOneProduct($pro_id)
    {
    header("Access-Control-Allow-Origin: *");
          echo json_encode(array($this->model_products->find($pro_id)));
    }

  public function getProductByCategory($id_cat)
    {
    header("Access-Control-Allow-Origin: *");
          echo json_encode($this->model_products->get_full_product_by_category($id_cat));
    }

    public function login ()
    {
      header("Access-Control-Allow-Origin: *");
            if($this->input->get('usr_email')){
                  $email = $this->input->get('usr_email');
             }else{
                 $email = $this->uri->segment(3);
             }

             if($this->input->get('usr_password')){
                  $password = $this->input->get('usr_password');
             }else{
                  $password = md5($this->uri->segment(4));
             }
            
            $userData = $this->cp_model->getUserInfos($email, $password);
          
           if($userData){
               $userData = json_encode($userData);
                echo '{"userData": ' .$userData . '}';
            } else {
               echo '{"error":{"text":"Mot de passe et/ou Nom d\'utilisateur erroné ! "}}';
            }

    }

    public function register ()
    {
       header("Access-Control-Allow-Origin: *");

        $this->form_validation->set_rules('usr_civilite', 'Civilité', 'trim|required');
        $this->form_validation->set_rules('usr_name', 'Nom', 'trim|required');
        $this->form_validation->set_rules('usr_surname', 'Prénoms', 'trim|required');
        $this->form_validation->set_rules('usr_email', 'Email', 'trim|required');
        $this->form_validation->set_rules('usr_telephone', 'Téléphone', 'trim|required');
        $this->form_validation->set_rules('usr_adresse', 'Lieu Habitation', 'trim|required');
        $this->form_validation->set_rules('password', 'Mot de passe', 'trim|required');
        $this->form_validation->set_rules('id_magasin', 'Magasin', 'trim|required');
            
            if ($this->form_validation->run()) {
               $data = array(
                      'usr_civilite' => $this->input->post('usr_civilite'),
                      'usr_name' => $this->input->post('usr_name'),
                      'usr_surname' => $this->input->post('usr_surname'),
                      'usr_email' => $this->input->post('usr_email'),
                      'usr_password' => md5($this->input->post('password')),
                      'usr_telephone' => $this->input->post('usr_telephone'),
                      'usr_adresse' => $this->input->post('usr_adresse'),
                      'id_magasin' => $this->input->post('id_magasin'),
                      'numero_pickup' => $this->input->post('numero_pickup'),
                      'usr_group' => 3
              );


               $value = $this->dashboard_model->insert_user($data);
            
            }else{
               echo '{"error":{"text":"Vérifiez vos saisies"}}';
            }
         
  }

  public function getMagasin()
    {
    header("Access-Control-Allow-Origin: *");
    echo json_encode($this->dashboard_model->get_all_magasin());
    
  }

}

/* End of file api.php */
/* Location: ./application/modules/api/controllers/api.php */