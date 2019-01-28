<?php
defined('BASEPATH') OR exit('No direct script access allowed');
   
class Dashboard extends MX_Controller {
    public function __construct() {
        parent::__construct();
        
        $this->load->model('dashboard/dashboard_model');
        $this->load->model('panier/model_products');
        $this->load->model('cp/cp_model');
        $this->load->library('upload');
        //restriction de session

       
        if(!$this->session->userdata('usr_id') and $this->session->userdata('usr_group')!=1) {
            redirect('cp');
        }


    }

    public function index() {
      $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));

      $data['count_client'] = $this->dashboard_model->count_client();
      $data['count_order'] = $this->dashboard_model->count_order();
      $data['orders'] = $this->dashboard_model->get_all_order();
      $data['ventes_reel'] = $this->dashboard_model->get_all_ventes_reel();
      $data['ventes_solde'] = $this->dashboard_model->get_all_ventes_solde();
      $data['factures'] = $this->dashboard_model->get_all_vente();
      $data['admin_magasin'] = $this->dashboard_model->get_admin_magasin($this->session->userdata('usr_id'));
      $data['magasins'] = $this->dashboard_model->get_all_magasin();
      $data['ventes'] = $this->dashboard_model->get_all_vente();

      //debug($data['ventes_solde']);
      $this->load->view('dashboard/dashboard_view',$data);
    }

    public function connexion() {
      $this->load->view('dashboard/connexion_view');
    }
    function seDeconnecter() {
      $this->session->unset_userdata('usr_id');
      //session_destroy();
      redirect('dashboard/connexion', 'refresh');
        
    }

    public function client() {
      $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
      $data['users'] = $this->dashboard_model->get_all_user();
      $data['admin_magasin'] = $this->dashboard_model->get_admin_magasin($this->session->userdata('usr_id'));
       $data['factures'] = $this->dashboard_model->get_all_vente();
      $this->load->view('dashboard/client_view',$data);
    }

    public function Gproduit() {
      $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
      $data['categories'] = $this->dashboard_model->get_all_prod_cat();
      $data['variantes'] = $this->dashboard_model->get_all_variante();
      $data['produits'] = $this->model_products->get_full_product();
      $data['magasins'] = $this->dashboard_model->get_all_magasin();
      $data['admin_magasin'] = $this->dashboard_model->get_admin_magasin($this->session->userdata('usr_id'));
      $this->load->view('dashboard/produit_view',$data);
    }

    //GEstion des catégories de produits
    public function categorieProduit() {
      $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
      $data['categories'] = $this->dashboard_model->get_all_prod_cat();
      $data['admin_magasin'] = $this->dashboard_model->get_admin_magasin($this->session->userdata('usr_id'));
      $this->load->view('dashboard/categorie_view',$data);
    }
    public function addcategorieProduit()
    {
        $this->form_validation->set_rules('label_cat', 'Libellé', 'trim|required');

        if($this->form_validation->run()){
          $data = array(
                  'label_cat' => $this->input->post('label_cat'),
                   'slug_cat' => strtolower($this->wd_remove_accents(str_replace ( ' ', '-',$this->input->post('label_cat'))))                      
                );
                $this->dashboard_model->insert_prod_cat($data);

                $this->session->set_flashdata('add','Catégorie bien ajoutée');
                redirect('dashboard/categorieProduit');


        }else{
          $data['categories'] = $this->dashboard_model->get_all_prod_cat();
          $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
          $data['admin_magasin'] = $this->dashboard_model->get_admin_magasin($this->session->userdata('usr_id'));
          $this->load->view('dashboard/categorie_view',$data);
        }
    }
    public function updateCategorieProduit()
    {
        $this->form_validation->set_rules('label_cat', 'Libellé', 'trim|required');

        if($this->form_validation->run()){
          $id_cat = $this->input->post('id_cat');
          $data = array(
                  'label_cat' => $this->input->post('label_cat'),
                  'slug_cat' => strtolower($this->wd_remove_accents(str_replace ( ' ', '-',$this->input->post('label_cat'))))                     
                );
                $this->dashboard_model->update_prod_cat($id_cat, $data);

                $this->session->set_flashdata('update','Catégorie bien modifiée');
                redirect('dashboard/categorieProduit');


        }else{
          $data['categories'] = $this->dashboard_model->get_all_prod_cat();
          $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
          $data['admin_magasin'] = $this->dashboard_model->get_admin_magasin($this->session->userdata('usr_id'));
          $this->load->view('dashboard/categorie_view',$data);
        }
    }

    public function deleteCategorieProduit($id_cat)
    {
      $this->dashboard_model->delete_prod_cat($id_cat);
      $this->session->set_flashdata('delete','Catégorie bien supprimée');
      redirect('dashboard/categorieProduit');

    }

    //FIN Gestion des catégories de produits


    //GEstion des variantes de produits
    public function varianteProduit() {
      $data['variantes'] = $this->dashboard_model->get_all_variante();
      $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
      $data['admin_magasin'] = $this->dashboard_model->get_admin_magasin($this->session->userdata('usr_id'));
      $this->load->view('dashboard/variante_view',$data);
    }
       public function addVarianteProduit()
    {
        $this->form_validation->set_rules('label_variante', 'Libellé', 'trim|required');
        $this->form_validation->set_rules('content_variante', 'Elements', 'trim|required');

        if($this->form_validation->run()){
          $data = array(
                  'label_variante' => $this->input->post('label_variante'),                         
                  'content_variante' => $this->input->post('content_variante'),                         
                );
                $this->dashboard_model->insert_variante($data);

                $this->session->set_flashdata('add','Catégorie bien ajoutée');
                redirect('dashboard/varianteProduit');


        }else{
          $data['variantes'] = $this->dashboard_model->get_all_variante();
          $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
          $data['admin_magasin'] = $this->dashboard_model->get_admin_magasin($this->session->userdata('usr_id'));
          $this->load->view('dashboard/variante_view',$data);
        }
    }

         public function updateVarianteProduit()
    {
        $this->form_validation->set_rules('label_variante', 'Libellé', 'trim|required');
        $this->form_validation->set_rules('content_variante', 'Elements', 'trim|required');

        if($this->form_validation->run()){
          $id_variante = $this->input->post('id_variante');
          $data = array(
                  'label_variante' => $this->input->post('label_variante'),                         
                  'content_variante' => $this->input->post('content_variante'),                         
                );
                $this->dashboard_model->update_variante($id_variante, $data);

                $this->session->set_flashdata('add','Variante bien modifié');
                redirect('dashboard/varianteProduit');


        }else{
          $data['variantes'] = $this->dashboard_model->get_all_variante();
          $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
          $data['admin_magasin'] = $this->dashboard_model->get_admin_magasin($this->session->userdata('usr_id'));
          $this->load->view('dashboard/variante_view',$data);
        }
    }

    public function deleteVarianteProduit($id_variante)
    {
      $this->dashboard_model->delete_variante($id_variante);
      $this->session->set_flashdata('delete','Variantes bien supprimée');
      redirect('dashboard/varianteProduit');

    }


    function addProduit()
    {
     /* var_dump($this->input->post('id_magasin'));
      exit();*/
        $this->form_validation->set_rules('pro_name', 'Nom', 'trim|required');
        $this->form_validation->set_rules('pro_price', 'Prix', 'trim|required');
        $this->form_validation->set_rules('pro_description', 'Description', 'trim|required');
        $this->form_validation->set_rules('pro_stock', 'Quantité', 'trim|required');
        $this->form_validation->set_rules('id_magasin', 'Magasin', 'trim|required');
            
            if ($this->form_validation->run()) {

                    $config['upload_path'] = './assets/uploads/';
                    $config['allowed_types'] = 'gif|jpg|jpeg|png';
                    $config['encrypt_name'] = TRUE;

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
 
                    if ( ! $this->upload->do_upload()) {

                        $this->session->set_flashdata('img_error', "<div class='alert alert-danger' id='img_error'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                        <strong>Erreur !</strong>".$this->upload->display_errors()."</div>");
                        redirect_back();
                        return FALSE;

                    } else {
                        $file_data = $this->upload->data();

                        $data = array(
                                'pro_name' => $this->input->post('pro_name'),
                                'pro_title' => $this->input->post('pro_name'),
                                'pro_slug' => strtolower($this->wd_remove_accents(str_replace ( ' ', '-',$this->input->post('pro_name')))),
                                'pro_description' => $this->input->post('pro_description'),
                                'pro_price' => $this->input->post('pro_price'),
                                'pro_stock' => $this->input->post('pro_stock'),
                                'pro_image' => $file_data['file_name'],
                                'id_cat' => $this->input->post('id_cat'),                                
                                'usr_id' => $this->session->userdata('usr_id'),
                                'id_magasin' => $this->input->post('id_magasin')
                    );

                    $this->model_products->create($data);
                    


                    $this->session->set_flashdata('add','Elément bien ajouté !'); 
                    
                    redirect('dashboard/Gproduit');

                    

                    }

                
                    } else {
                            $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
                        $data['categories'] = $this->dashboard_model->get_all_prod_cat();
                        $data['variantes'] = $this->dashboard_model->get_all_variante();
                        $data['produits'] = $this->model_products->get_full_product();
                        $data['admin_magasin'] = $this->dashboard_model->get_admin_magasin($this->session->userdata('usr_id'));
                        $this->load->view('dashboard/produit_view',$data);

                    }
    }

    function updateProduit()
    {
        $this->form_validation->set_rules('pro_name', 'Nom', 'trim|required|xss_clean');
        $this->form_validation->set_rules('pro_price', 'Prix', 'trim|required|xss_clean');
        $this->form_validation->set_rules('pro_description', 'Description', 'trim|required|xss_clean');
        $this->form_validation->set_rules('pro_stock', 'Quantité', 'trim|required|xss_clean');
        $this->form_validation->set_rules('id_magasin', 'Magasin', 'trim|required|xss_clean');
            
            if ($this->form_validation->run()) {

                    $config['upload_path'] = './assets/uploads/';
                    $config['allowed_types'] = 'gif|jpg|jpeg|png';
                    $config['encrypt_name'] = TRUE;

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
 
                    if ( ! $this->upload->do_upload()) {
                      if($this->input->post('pro_image')){

                        $pro_idPost=$this->input->post('pro_id');
                        $id_variante=$this->input->post('id_variante');
                        $data = array(
                                'pro_name' => $this->input->post('pro_name'),
                                'pro_title' => $this->input->post('pro_name'),
                                'pro_slug' => strtolower($this->wd_remove_accents(str_replace ( ' ', '-',$this->input->post('pro_name')))),
                                'pro_description' => $this->input->post('pro_description'),
                                'pro_price' => $this->input->post('pro_price'),
                                'pro_stock' => $this->input->post('pro_stock'),
                                'pro_image' => $this->input->post('pro_image'),
                                'id_cat' => $this->input->post('id_cat'),                                
                                'usr_id' => $this->session->userdata('usr_id'),
                                'id_magasin' => $this->input->post('id_magasin')
                    );

                    $this->model_products->edit($pro_idPost,$data);
                    

                    /*$prod_id= $pro_idPost;

                    //var_dump($data);
                    $record=$this->input->post('id_variante');
                    $n=count($record);

                    for ($i=0; $i<$n;$i++){
                      $t=explode(",",$record[$i]);
                      //echo $t[0]." ".$t[1]."<br>";
                        $data = array(
                                'pro_id' => $prod_id,
                                'id_variante' =>$t[0],
                                'selection_variante_pro' => $t[1]
                    );

                      $this->dashboard_model->update_produit_variante($id_variante, $data);
                    }*/


                    $this->session->set_flashdata('update','Elément bien modifié !'); 
                    
                    redirect('dashboard/Gproduit');
                      }

                        $this->session->set_flashdata('img_error', "<div class='alert alert-danger' id='img_error'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                        <strong>Erreur !</strong>".$this->upload->display_errors()."</div>");
                        redirect_back();
                        return FALSE;

                    } else {
                        $file_data = $this->upload->data();
                        $pro_idPost=$this->input->post('pro_id');
                        $id_variante=$this->input->post('id_variante');
                        $data = array(
                                'pro_name' => $this->input->post('pro_name'),
                                'pro_title' => $this->input->post('pro_name'),
                                'pro_slug' => strtolower($this->wd_remove_accents(str_replace ( ' ', '-',$this->input->post('pro_name')))),
                                'pro_description' => $this->input->post('pro_description'),
                                'pro_price' => $this->input->post('pro_price'),
                                'pro_stock' => $this->input->post('pro_stock'),
                                'pro_image' => $file_data['file_name'],
                                'id_cat' => $this->input->post('id_cat'),                                
                                'usr_id' => $this->session->userdata('usr_id'),
                                'id_magasin' => $this->input->post('id_magasin')
                    );

                    $this->model_products->edit($pro_idPost,$data);
                    

                    /*$prod_id= $pro_idPost;

                    //var_dump($data);
                    $record=$this->input->post('id_variante');
                    $n=count($record);

                    for ($i=0; $i<$n;$i++){
                      $t=explode(",",$record[$i]);
                      //echo $t[0]." ".$t[1]."<br>";
                        $data = array(
                                'pro_id' => $prod_id,
                                'id_variante' =>$t[0],
                                'selection_variante_pro' => $t[1]
                    );

                      $this->dashboard_model->update_produit_variante($id_variante, $data);
                    }*/


                    $this->session->set_flashdata('update','Elément bien modifié !'); 
                    
                    redirect('dashboard/Gproduit');

                    

                    }

                
                    } else {
                       $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
                        $data['categories'] = $this->dashboard_model->get_all_prod_cat();
                        $data['variantes'] = $this->dashboard_model->get_all_variante();
                        $data['admin_magasin'] = $this->dashboard_model->get_admin_magasin($this->session->userdata('usr_id'));
                        $this->load->view('dashboard/produit_view',$data);

                    }
    }

    public function deleteProduit($prod_id)
    {
      $this->model_products->delete($prod_id);
      $this->session->set_flashdata('delete','Produit bien supprimé');
      redirect('dashboard/Gproduit');

    }

    public function stock() {
      //$data['variantes'] = $this->dashboard_model->get_all_variante();
      $data['produits'] = $this->model_products->get_full_product();
      $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
      $data['admin_magasin'] = $this->dashboard_model->get_admin_magasin($this->session->userdata('usr_id'));
      $this->load->view('dashboard/stock_view',$data);
    }


      public function paiement() {
      //$data['variantes'] = $this->dashboard_model->get_all_variante();
      $data['produits'] = $this->model_products->get_full_product();
      $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
      $data['admin_magasin'] = $this->dashboard_model->get_admin_magasin($this->session->userdata('usr_id'));
      $data['orders'] = $this->dashboard_model->get_all_order();
      //$data['ventes'] = $this->dashboard_model->get_all_ventes();
      $data['paiements'] = $this->dashboard_model->get_all_commande();
      $this->load->view('dashboard/paiement_view',$data);
    }

     public function commande() {
      //$data['variantes'] = $this->dashboard_model->get_all_variante();
      $data['produits'] = $this->model_products->get_full_product();
      $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
      $data['admin_magasin'] = $this->dashboard_model->get_admin_magasin($this->session->userdata('usr_id'));
      $data['orders'] = $this->dashboard_model->get_all_order();
      //$data['ventes'] = $this->dashboard_model->get_all_ventes();
      $data['factures'] = $this->dashboard_model->get_all_commande();
      $this->load->view('dashboard/commande_view',$data);
    }

    function wd_remove_accents($str, $charset='utf-8')
    {
        $str = htmlentities($str, ENT_NOQUOTES, $charset);
        
        $str = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
        $str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str); // pour les ligatures e.g. '&oelig;'
        $str = preg_replace('#&[^;]+;#', '', $str); // supprime les autres caractères
        
        return $str;
    }




























   
    public function profil() {
        $data['transactions'] = $this->dashboard_model->get_all_transaction($this->session->userdata('usr_id'));
        $data['connected_user'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));

       
        $this->load->view('dashboard/template/header',$data);
        $this->load->view('dashboard/template/sidebar',$data);
        $this->load->view('dashboard/profil_view',$data);
        $this->load->view('dashboard/template/footer',$data);
    }

    public function compte() {
        $data['connected_user'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
        $data['transactions'] = $this->dashboard_model->get_all_transaction($this->session->userdata('usr_id'));

        $this->load->view('dashboard/template/header',$data);
        $this->load->view('dashboard/template/sidebar',$data);
        $this->load->view('dashboard/compte_view',$data);
        $this->load->view('dashboard/template/footer',$data);
    }

    public function transfert() {
        $data['userDebit'] = $this->dashboard_model->get_user_debit($this->session->userdata('usr_id'));
        $data['userCredit'] =$this->dashboard_model->get_user_credit($this->session->userdata('usr_id'));
        $data['connected_user'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
        $this->load->view('dashboard/template/header', $data);
        $this->load->view('dashboard/template/sidebar', $data);
        $this->load->view('dashboard/transfert_view', $data);
        //$this->load->view('dashboard/template/footer',$data);
    }

     public function transferCheckPhoneNumber() {
         $this->form_validation->set_rules('montant', 'Montant', 'trim|numeric|required|xss_clean');
         $this->form_validation->set_rules('numero_destinataire', 'Numéro de téléphone destinataire', 'trim|numeric|required|xss_clean');
         
         if ($this->form_validation->run()) {
              $data['error_message']  = '';

              $numero_destinataire = $this->input->post('numero_destinataire');
              $montant = (double)$this->input->post('montant');
              $montant += $montant * (10 / 100);

              $userDebit  = $this->dashboard_model->get_user_debit($this->session->userdata('usr_id'));
              $userCredit = $this->dashboard_model->get_user_credit($this->session->userdata('usr_id'));

              $debit = 0;
              $credit = 0;
              foreach ($userDebit as $key => $value) {
                  $debit = $value->debit_compte;
              }
              foreach($userCredit as $key => $value) {
                  $credit = $value->credit_compte;
              }
              
              $solde = $credit - $debit;
              
              if(!$user_receiver = $this->dashboard_model->get_user_by_phone($numero_destinataire)) {
                  $data['error_message']  = "Désolé, ce numéro n'est pas lié à un compte Scash-Payment!";
                  $data['userDebit']  = $this->dashboard_model->get_user_debit($this->session->userdata('usr_id'));
                  $data['userCredit'] = $this->dashboard_model->get_user_credit($this->session->userdata('usr_id'));
                  $data['connected_user'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
                  $this->load->view('dashboard/template/header', $data);
                  $this->load->view('dashboard/template/sidebar', $data);
                  $this->load->view('dashboard/transfert_view', $data);
              } else if($solde <= 0 || $solde < $montant) {
                  $data['error_message']  = "Désolé, votre solde actuel est insuffisant pour tranférer ce montant!";
                  $data['userDebit']  = $this->dashboard_model->get_user_debit($this->session->userdata('usr_id'));
                  $data['userCredit'] = $this->dashboard_model->get_user_credit($this->session->userdata('usr_id'));
                  $data['connected_user'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
                  $this->load->view('dashboard/template/header', $data);
                  $this->load->view('dashboard/template/sidebar', $data);
                  $this->load->view('dashboard/transfert_view', $data);
              } else {
                  $this->session->set_userdata('transfert_scash_numero_destinataire', $numero_destinataire);
                  $this->session->set_userdata('transfert_scash_montant', $montant);
                  redirect('dashboard/transfertCheckCodeSecret');
              }

         } else {
             $data['userDebit']=$this->dashboard_model->get_user_debit($this->session->userdata('usr_id'));
             $data['userCredit']=$this->dashboard_model->get_user_credit($this->session->userdata('usr_id'));
             $data['connected_user'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
             $this->load->view('dashboard/template/header',$data);
             $this->load->view('dashboard/template/sidebar',$data);
             $this->load->view('dashboard/transfert_view',$data);
         }


    }

    public function transfertCheckCodeSecret() {
        if(!$this->session->userdata('transfert_scash_montant') || !$this->session->userdata('transfert_scash_numero_destinataire')) {
            redirect('dashboard/transfert');
        }

        if($this->input->server('REQUEST_METHOD') == 'GET') {
            $montant = $this->session->userdata('transfert_scash_montant');
            $montant += $montant * (10 / 100);
            $numero_destinataire = $this->session->userdata('transfert_scash_numero_destinataire');
            $formated_montant = number_format($montant, 0, ' ', ' ') . ' CFA';
            $message = "<h3>Vous êtes sur le point de transférer $formated_montant au numéro Scash suivant: $numero_destinataire<br/>";
            $message .= "(Frais de transaction 2%)</h3>";
            $data['transfert_message'] = $message;
            $data['userDebit']=$this->dashboard_model->get_user_debit($this->session->userdata('usr_id'));
            $data['userCredit']=$this->dashboard_model->get_user_credit($this->session->userdata('usr_id'));
            $data['connected_user'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
            $this->load->view('dashboard/template/header',$data);
            $this->load->view('dashboard/template/sidebar',$data);
            $this->load->view('dashboard/transfert_check_code_secret_view',$data);
        } else if($this->input->server('REQUEST_METHOD') == 'POST') {
            $code_secret = $this->input->post('code_secret');
            $user = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
            if($user->code !== $code_secret) {
                $data['error_message']  = "Désolé, le code secret est invalide!";

                $montant = $this->session->userdata('transfert_scash_montant');
                $montant += $montant * (10 / 100);
                $numero_destinataire = $this->session->userdata('transfert_scash_numero_destinataire');
                $formated_montant = number_format($montant, 0, ' ', ' ') . ' CFA';
                $message = "<h3>Vous êtes sur le point de transférer $formated_montant au numéro Scash: $numero_destinataire<br/>";
                $message .= " (Frais de transaction 2%)</h3>";
                $data['transfert_message'] = $message;
                $data['userDebit']  = $this->dashboard_model->get_user_debit($this->session->userdata('usr_id'));
                $data['userCredit'] = $this->dashboard_model->get_user_credit($this->session->userdata('usr_id'));

                $data['connected_user'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
                $this->load->view('dashboard/template/header', $data);
                $this->load->view('dashboard/template/sidebar', $data);
                $this->load->view('dashboard/transfert_check_code_secret_view',$data);
            } else {
                $user_receiver = $this->dashboard_model->get_user_by_phone($this->session->userdata('transfert_scash_numero_destinataire'));
                if($user_receiver && $compte_receiver = $this->dashboard_model->get_compte_2($user_receiver->id_user)) {
                      $data_compte_receiver = array(
                          'credit_compte'  => $compte_receiver->credit_compte + (double)$this->session->userdata('transfert_scash_montant')
                      );
                      $this->dashboard_model->update_compte($compte_receiver->id_compte, $data_compte_receiver);
                      $this->dashboard_model->update_solde_by_compte_id($compte_receiver->id_compte, (double)$this->session->userdata('transfert_scash_montant'));
                      
                      $data_transaction_receiver = array(
                         'id_compte' => $compte_receiver->id_compte,
                         'id_user' => $compte_receiver->id_user,
                         'id_type_operation' => 1,
                         'moyen_utilisee' => 'Compte Scash',
                         'montant_transaction' => $this->session->userdata('transfert_scash_montant')
                      );
                      $this->dashboard_model->insert_transaction($data_transaction_receiver);
                      
                      $numero_sender = $this->session->userdata('transfert_scash_numero_destinataire');
                      $montant = $this->session->userdata('transfert_scash_montant');
                      $message_notification = "Bonjour {$user_receiver->name_user} {$user_receiver->surname_user},<br/>";
                      $message_notification .= "<p>Vous venez de réçevoir un transfert de {$montant} depuis le numéro Scash: {$numero_sender}</p>";
                      $message_notification .= "<br/>";
                      $ref = uniqid(mt_rand(), true) . microtime(true);
                      $ref = explode('.', $ref)[1];
                      $message_notification .= "<p>RÉF: {$ref}</p>";
                      $message_notification .= "<br/><br/>";
                      $data_notification_receiver = array(
                         'id_user_destinataire' => $user_receiver->id_user,
                         'titre_notification'   => 'Alert dépôt',
                         'message_notification' => $message_notification,
                         'created_by'           => $this->session->userdata('usr_id'),
                      );
                      $this->dashboard_model->insert_notification($data_notification_receiver);


                      // For sender
                      $user_sender = $this->dashboard_model->get_user($this->session->userdata('usr_id'));

                      if($compte_sender = $this->dashboard_model->get_compte_2($user_sender->id_user)) {

                          $data_compte_sender = array(
                              'debit_compte'  => $compte_sender->debit_compte + (double)$this->session->userdata('transfert_scash_montant')
                          );
                          $this->dashboard_model->update_compte($compte_sender->id_compte, $data_compte_sender);
                          $this->dashboard_model->update_solde_by_compte_id($compte_sender->id_compte, (double)$this->session->userdata('transfert_scash_montant'));
                          
                          $data_transaction_sender = array(
                             'id_compte' => $compte_sender->id_compte,
                             'id_user' => $compte_sender->id_user,
                             'id_type_operation' => 2,
                             'moyen_utilisee' => 'Compte Scash',
                             'montant_transaction' => $this->session->userdata('transfert_scash_montant')
                          );
                          $this->dashboard_model->insert_transaction($data_transaction_sender);

                      }
                      
                      $this->session->unset_userdata('transfert_scash_numero_destinataire');
                      $this->session->unset_userdata('transfert_scash_montant');
                      $this->session->set_userdata('transfert_success', true);
                      $data['transfert_message'] = "<h3>Transfert effectué avec success!</h3>";
                      $data['userDebit'] = $this->dashboard_model->get_user_debit($this->session->userdata('usr_id'));
                      $data['userCredit'] = $this->dashboard_model->get_user_credit($this->session->userdata('usr_id'));
                      $data['connected_user'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
                      $this->load->view('dashboard/template/header',$data);
                      $this->load->view('dashboard/template/sidebar',$data);
                      $this->load->view('dashboard/transfert_check_code_secret_view',$data);
                  
                }

            }


        }
    }

    public function transferer() {
       $this->form_validation->set_rules('numero_carte_user', 'Numéro de la carte', 'trim|numeric|required|xss_clean');
       $this->form_validation->set_rules('montant', 'Montant', 'trim|numeric|required|xss_clean');

       if ($this->form_validation->run()) {
          $data['Scashcartecode']=$this->dashboard_model->checkScashCarteCode($this->input->post('numero_carte_user'));
          $data['Scashcartesolde']=$this->dashboard_model->get_solde_Scashcarte($this->input->post('numero_carte_user'));

          if ($data['Scashcartecode']) {

              //Get Scash Carte Solde
              $soldecarteScash=$this->dashboard_model->get_solde_Scashcarte($this->input->post('numero_carte_user'));
              foreach ($soldecarteScash as $key => $value) {
                  $SOLDECARTEScash=$value->solde_Scashcarte;
              }

              $newSoldeCarte=$SOLDECARTEScash+$this->input->post('montant');
              $this->db->set('solde_Scashcarte', $newSoldeCarte, FALSE);
              $this->db->where('code_Scashcarte', $this->input->post('numero_carte_user'));
              $this->db->update('Scashcarte');



              //Moyens utilisé
             if($this->input->post('id_type_opertaion')==1){ $moyens="Dépôt";}
             if($this->input->post('id_type_opertaion')==2){ $moyens="Transfert";}
             if($this->input->post('id_type_opertaion')==3){ $moyens="Emprunt";}


             $compteid=$this->dashboard_model->get_compte_id($this->session->userdata('usr_id'));
              foreach ($compteid as $key => $value) {
                  $IDCOMPTE=$value->id_compte;
              }
              $data = array(
                      'id_user' => $this->session->userdata('usr_id'),
                      'id_compte' => $IDCOMPTE,
                      'id_type_operation' => $this->input->post('id_type_opertaion'),
                      'moyen_utilisee' => $moyens." ".$this->input->post('action_t'),
                      'montant_transaction' => $this->input->post('montant')                            
              );
              $this->dashboard_model->insert_transaction($data);


              $datauserDebit=$this->dashboard_model->get_user_debit($this->session->userdata('usr_id'));
              foreach ($datauserDebit as $key => $value) {
                  $USERDEBIT=$value->debit_compte;
              }

              $newdebit_compte=$USERDEBIT+$this->input->post('montant');
              $this->db->set('debit_compte', $newdebit_compte, FALSE);
              $this->db->where('id_user',$this->session->userdata('usr_id'));
              $this->db->update('compte');


              $datauserCredit=$this->dashboard_model->get_user_credit($this->session->userdata('usr_id'));
              foreach ($datauserCredit as $key => $value) {
                  $USERCREDIT=$value->credit_compte;
              }

              $newcredit_compte=$USERCREDIT -  $this->input->post('montant');
              $this->db->set('credit_compte', $newcredit_compte, FALSE);
              $this->db->where('id_user',$this->session->userdata('usr_id'));
              $this->db->update('compte');


              $this->session->set_flashdata('carteOn','Transfert éffectué avec succès. <br> Merci d\'avoir utilisé Scash');
               redirect('dashboard/transfert');

              }else{

               $this->session->set_flashdata('carteOff','Désolé, merci de vérifier la validité ou le numéro de votre carte Scash. <br> Ou veuillez contacter notre service technique. <br> Merci');
               redirect('dashboard/transfert');

              }

       } else {
          $data['userDebit']=$this->dashboard_model->get_user_debit($this->session->userdata('usr_id'));
          $data['userCredit']=$this->dashboard_model->get_user_credit($this->session->userdata('usr_id'));
          $data['connected_user'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
          $this->load->view('dashboard/template/header', $data);
          $this->load->view('dashboard/template/sidebar', $data);
          $this->load->view('dashboard/transfert_view', $data);
          //$this->load->view('dashboard/template/footer',$data);
       }

    }

    public function notification() {
        $segment1 = (int)$this->uri->segment('3');
        if(!$segment1) redirect('dashboard');
        $notification = $this->dashboard_model->get_notification_by_id($segment1);

        $data['userDebit']      = $this->dashboard_model->get_user_debit($this->session->userdata('usr_id'));
        $data['userCredit']     = $this->dashboard_model->get_user_credit($this->session->userdata('usr_id'));
        $data['connected_user'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));

        $data['notification'] = $notification;

        $this->load->view('dashboard/template/header', $data);
        $this->load->view('dashboard/template/sidebar', $data);
        $this->load->view('dashboard/notification_view', $data);
        $this->load->view('dashboard/template/footer',$data); //#4285f4
    }

    public function notifications() {
         $user_id_destinataire  = $this->session->userdata('usr_id'); 
         $notifications         = $this->dashboard_model->get_notification_by_user_id_destinataire($user_id_destinataire);

        $data['userDebit']      = $this->dashboard_model->get_user_debit($this->session->userdata('usr_id'));
        $data['userCredit']     = $this->dashboard_model->get_user_credit($this->session->userdata('usr_id'));
        $data['connected_user'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));

        $data['notifications'] = $notifications;

        $this->load->view('dashboard/template/header', $data);
        $this->load->view('dashboard/template/sidebar', $data);
        $this->load->view('dashboard/notifications_view', $data);
        $this->load->view('dashboard/template/footer',$data); //#4285f4
    }

    public function credit() {
        $data['connected_user'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
        $this->load->view('dashboard/template/header',$data);
        $this->load->view('dashboard/template/sidebar',$data);
        $this->load->view('dashboard/credit_view',$data);
        //$this->load->view('dashboard/template/footer',$data);
    }
    public function checkStatus() {
       $id_user=$this->uri->segment(3);
       $i=$this->uri->segment(4);
        if($i == 1) {
              $type = 1;
              $montant = 50000;
              $modele="Modèle 1 : 50 000 FCFA";
        }
        if ($i == 2) {
          $type = 2;
          $montant = 100000;
          $modele="Modèle 2 : 100 000 FCFA";
        }
        if ($i == 3) {
          $type = 3;
          $montant = 250000;
          $modele="Modèle 3 : 250 000 FCFA";
        }
        if ($i == 4) {
          $type = 4;
          $montant = 500000;
          $modele="Modèle 4 : 500 000 FCFA";
        }
        if ($i == 5) {
          $type = 5;
          $montant = 1000000;
          $modele="Modèle 5 : 1 000 000 FCFA";
        }

        $userDebit  = $this->dashboard_model->get_user_debit($this->session->userdata('usr_id'));
        $userCredit = $this->dashboard_model->get_user_credit($this->session->userdata('usr_id'));

        $debit  = 0;
        $credit = 0;
        foreach ($userDebit as $key => $value) {
           $debit = $value->debit_compte;
        }
        foreach ($userCredit as $key => $value) {
           $credit = $value->credit_compte;
        }
        $user_solde = $credit - $debit;



        $datahave_carte = $this->dashboard_model->getUserCarteStatus($this->session->userdata('usr_id'));
        $datauserduration = $this->dashboard_model->getInscriptionDurationUser($this->session->userdata('usr_id'));

        foreach($datahave_carte as $key => $value) {
            $reponse_carte = $value->have_carte;
        }

        foreach($datauserduration as $key => $value) {
            $reponse_user_duration = $value->created_at;
        }
        //echo $reponse_carte; 
        //echo "<br>";       
        //echo $this->nb_mois($reponse_user_duration);

        if($this->nb_mois($reponse_user_duration) > 6 || $reponse_carte == 1 ){
            $this->session->set_flashdata('nonApte','Désolé, vous ne pouvez pas bénéficier d\'un emprunt Scash. <br> Car vous ne remplissez les conditions énumérées ci-dessus. <br>');
            redirect('dashboard/credit');
        }
        
        if($type == 1 && $user_solde < 15000) {
          $this->session->set_flashdata('nonApte','Désolé, vous ne pouvez pas bénéficier d\'un emprunt Scash. <br> Car vous ne remplissez les conditions énumérées ci-dessus. <br>');
            redirect('dashboard/credit');
        }

        else {
             $this->session->set_flashdata('aptePourEmprunt','Vous êtes apte pour l\'emprunt Scash. Notre équipe vous conatctera sous peu. <br>Merci pour la confiance ! ');

            $data = array(
                    'id_user' => $this->session->userdata('usr_id'),
                    'modele_choisi' => $modele,
                    'type' => $type,
                    'montant' => $montant
           );
           $this->dashboard_model->insert_emprunt($data);
           redirect('dashboard/credit');
        }

    }

    public function nb_mois($date1) {
        $now    = date("Y-m-d");
        $date1  = strtotime($date1);
        $date2  = strtotime($now);

        $months = 0;

        while(strtotime('+1 MONTH', $date1) < $date2) {
            $months++;
            $date1 = strtotime('+1 MONTH', $date1);
        }
       
        return $months; // 120 month, 26 days
    }

    public function nb_jours($date1) {
      $start = strtotime(date("Y-m-d", strtotime(strtr($date1, '/', '-'))));
      $end = strtotime(date("Y-m-d"));
      $days_between = ceil(abs($end - $start) / 86400);

      return $days_between;
    }


    public function depot() {
        $data['userDebit'] = $this->dashboard_model->get_user_debit($this->session->userdata('usr_id'));
        $data['userCredit'] =$this->dashboard_model->get_user_credit($this->session->userdata('usr_id'));
        $data['connected_user'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));

        if($this->input->server('REQUEST_METHOD') == 'GET') {

            $data['userDebit'] = $this->dashboard_model->get_user_debit($this->session->userdata('usr_id'));
            $data['userCredit'] = $this->dashboard_model->get_user_credit($this->session->userdata('usr_id'));
            $data['connected_user'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
            
            $this->load->view('dashboard/template/header',$data);
            $this->load->view('dashboard/template/sidebar',$data);
            $this->load->view('dashboard/depot_view',$data);
            //$this->load->view('dashboard/template/footer',$data);

        }
        if($this->input->server('REQUEST_METHOD') == 'POST') {
            $this->form_validation->set_rules('montant', 'Montant', 'trim|numeric|required|xss_clean');
            if ($this->form_validation->run()) {
                $mobilemoney_type = $this->input->post('mobilemoney_type');
                $montant =  $this->input->post('montant');

                $user = $this->dashboard_model->get_user($this->session->userdata('usr_id'));

                $url_notify = site_url('process/cinetpay_notify');
                $url_return = site_url('process/cinetpay_return');
                $url_cancel = site_url('process/cinetpay_cancel');
                
                $cinetpay_form = cinetpay_form($montant, $user->email_user, $url_notify, $url_return, $url_cancel);
                $data['cinetpay_form'] = $cinetpay_form;

                $this->load->view('dashboard/template/header',$data);
                $this->load->view('dashboard/template/sidebar',$data);
                $this->load->view('dashboard/depot_view', $data);

                // Process for mobile money trans
            } else {
               $this->load->view('dashboard/template/header',$data);
               $this->load->view('dashboard/template/sidebar',$data);
               $this->load->view('dashboard/depot_view',$data);
               //$this->load->view('dashboard/template/footer',$data);
            }
        }
    }

    public function depotViaCarte() {
        $this->form_validation->set_rules('code_carte', 'Code de la carte', 'trim|numeric|required|xss_clean');
        if ($this->form_validation->run()) {
            $post=$this->input->post('code_carte');
                $code_carte = substr($post, 0,4)." ".substr($post, 4,4)." ".substr($post, 8,4)." ".substr($post, 12,4);
                $data =  $this->dashboard_model->checkAvaibleCarte($code_carte);

                if ($data) {

                    //Carte maintenant utilisé
                    $this->db->set('used', 1, FALSE);
                    $this->db->where('code_carte', $code_carte);
                    $this->db->update('carte');

                    //var_dump($code_carte);

                    //get montant carte
                    $datamontant=$this->dashboard_model->get_montant_carte($code_carte);
                    foreach ($datamontant as $key => $value) {
                        $montantCarte=$value->montant_carte;
                    }
                    


                    //Ajout dans le compte du user
                    $datacredit=$this->dashboard_model->get_user_credit($this->session->userdata('usr_id'));
                    foreach ($datacredit as $key => $value) {
                        $user_credit=$value->credit_compte;
                    }

                    $new_credit=$user_credit+$montantCarte;

                    $this->db->set('credit_compte', $new_credit, FALSE);
                    $this->db->where('id_user', $this->session->userdata('usr_id'));
                    $this->db->update('compte');



                    $datadebit=$this->dashboard_model->get_user_debit("0");
                    foreach ($datadebit as $key => $value) {
                        $user_debit=$value->debit_compte;
                    }

                    $new_debit=$user_debit+$montantCarte;  

                    $this->db->set('debit_compte', $new_debit, FALSE);
                    $this->db->where('id_compte', 2);
                    $this->db->update('compte');

                    $compteid=$this->dashboard_model->get_compte_id($this->session->userdata('usr_id'));
                    foreach ($compteid as $key => $value) {
                        $IDCOMPTE=$value->id_compte;
                    }

                    $data = array(
                            'id_user' => $this->session->userdata('usr_id'),
                            'id_compte' => $IDCOMPTE,
                            'id_type_operation' => 1,
                            'moyen_utilisee' => "Carte Scash",
                            'montant_transaction' => $montantCarte                            
                );
                $this->dashboard_model->insert_transaction($data);

                    $this->session->set_flashdata('depotDone','Dépôt éffectué avec succès !');
                    redirect('dashboard/depot');
                } 
                else {
                   $this->session->set_flashdata('depotFailed','Carte inexistante ou déjà utilisée !');
                   redirect('dashboard/depot');
                }
        }else{
            $data['connected_user'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));

            $this->load->view('dashboard/template/header',$data);
            $this->load->view('dashboard/template/sidebar',$data);
            $this->load->view('dashboard/depot_view',$data);
            //$this->load->view('dashboard/template/footer',$data);
        }
    }

    public function updateClient() {      

        $this->form_validation->set_rules('name_user', 'Nom', 'trim|required|xss_clean');
        $this->form_validation->set_rules('surname_user', 'Prenom', 'trim|required|xss_clean');
        $this->form_validation->set_rules('code', 'Code secret', 'trim|numeric|required|xss_clean|max_length[4]');
        $this->form_validation->set_rules('email_user', 'Email', 'trim|required|xss_clean');
        //$this->form_validation->set_rules('password_user', 'Mot de passe', 'trim|required|xss_clean');
        $this->form_validation->set_rules('living_local', 'Lieu habitation', 'trim|required|xss_clean');
        //$this->form_validation->set_rules('adress_user', 'Adresse', 'trim|required|xss_clean');
        $this->form_validation->set_rules('phone_user', 'Téléphone', 'trim|numeric|required|xss_clean');
        $this->form_validation->set_rules('profession_user', 'Profession', 'trim|required|xss_clean');
        $this->form_validation->set_rules('date_naissance', 'Date de naissance', 'trim|required|xss_clean');
        $this->form_validation->set_rules('presentation_user', 'Présentation', 'trim|required|xss_clean');

        if(trim($this->input->post('password_user'))) {
            $this->form_validation->set_rules('password_user', 'Mot de passe', 'trim|required|xss_clean|min_length[6]');
        }

        $this->load->library('encrypt');


        if($this->form_validation->run()) {
                    $filename = random_string() . '_' . $_FILES['userfile']['name'];
                    $config['file_name']     = $filename;
                    $config['upload_path']   = './uploads/clients/';
                    $config['full_path']     = './uploads/clients/' . $filename;  
                    $config['allowed_types'] = 'gif|jpg|jpeg|png|PNG|JPG|JPEG';
                    $config['encrypt_name']  = TRUE;

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    

                    $user = $this->dashboard_model->get_user($this->session->userdata('usr_id'));

                    if (!$this->upload->do_upload()) {

                        $id_user = $this->input->post('id_user');
                        $compteLabel = $this->generateLabelCompte();
                        $data = array(
                            'label_compte' => "SP-".$compteLabel,
                            'id_type_compte' => 1,
                            'id_user' => $id_user,
                        );
                        $this->dashboard_model->insert_compte($data);
                        $dataidcompte= $this->dashboard_model->get_compte_id($id_user);

                        foreach ($dataidcompte as $key => $value) {
                            $id_compte=$value->id_compte;
                        }

                        $data = array(
                            'name_user' => $this->input->post('name_user'),
                            'surname_user'  => $this->input->post('surname_user'),
                            'code'  => $this->input->post('code'),
                            'living_local'  => $this->input->post('living_local'),
                            'adress_user'   => $this->input->post('adress_user'),
                            'phone_user'    => $this->input->post('phone_user'),
                            'email_user'    => $this->input->post('email_user'),
                            //'password_user' => $this->encrypt->sha1($this->input->post('password_user')),
                            //'picture_user' => $this->input->post('picture_user'),
                            'profession_user' => $this->input->post('profession_user'),
                            'date_naissance' => formatDateToDB($this->input->post('date_naissance')),
                            'presentation_user' => $this->input->post('presentation_user'),
                            'id_role' => $this->input->post('id_role'),
                            'id_compte' => $id_compte,
                            'status' => 2
                        );

                        if(trim($this->input->post('password_user')) && trim($this->input->post('password_user')) != $user->password_user) {
                            $data['password_user'] = $this->encrypt->sha1($this->input->post('password_user'));
                        }

                        $this->dashboard_model->update_user($id_user, $data);


                        $this->load->library('encrypt');
                        require_once APPPATH.'third_party/phpqrcode/phpqrcode.php';

                        $filename_qrcode = "uploads/qrcode/qrcode_{$id_user}_" . $this->encrypt->sha1(random_string()) . '.png';
                        
                        //$hashed1_id_compte = $this->encrypt->sha1($id_compte);
                        QRcode::png($id_compte, $filename_qrcode, QR_ECLEVEL_L, 4);

                        $data_qrcode['filename_qrcode'] = $filename_qrcode;
                        $data_qrcode['id_user'] = $id_user;
                        $this->dashboard_model->insert_qrcode($data_qrcode);


                        $this->session->set_flashdata('complete','Compte bien rempli !');
                        if ($this->input->post('form') == 1) {
                            $this->session->set_flashdata('update','Données modifiés !'); 
                            redirect('dashboard/profil');
                        }
                        redirect('dashboard');

                    } else {  // end if uploaded file
                        $file_data = $this->upload->data();

                        $id_user = $this->input->post('id_user');
                        $compteLabel = $this->generateLabelCompte();
                        $data = array(
                                'label_compte' => "SP-".$compteLabel,
                                'id_type_compte' => 1,
                                'id_user' => $id_user,
                        );
                        $this->dashboard_model->insert_compte($data);
                        $dataidCompte= $this->dashboard_model->get_compte_id($id_user);

                        foreach($dataidCompte as $key => $value) {
                            $id_compte = $value->id_compte;
                        }
                        $data = array(
                                'name_user' => $this->input->post('name_user'),
                                'surname_user' => $this->input->post('surname_user'),
                                'code'  => $this->input->post('code'),
                                'living_local' => $this->input->post('living_local'),
                                'adress_user' => $this->input->post('adress_user'),
                                'phone_user' => $this->input->post('phone_user'),
                                'email_user' => $this->input->post('email_user'),
                                //'password_user' => $this->input->post('password_user'),
                                'picture_user' => $file_data['file_name'],
                                'profession_user' => $this->input->post('profession_user'),
                                'date_naissance' => formatDateToDB($this->input->post('date_naissance')),
                                'presentation_user' => $this->input->post('presentation_user'),
                                'id_role' => $this->input->post('id_role'),
                                'id_compte' => $id_compte,
                                'status' => 2
                        );

                        if(trim($this->input->post('password_user')) && trim($this->input->post('password_user')) != $user->password_user) {
                            $data['password_user'] = $this->encrypt->sha1($this->input->post('password_user'));
                        }

                        $this->dashboard_model->update_user($id_user,$data);

                        $this->load->library('encrypt');
                        require_once APPPATH.'third_party/phpqrcode/phpqrcode.php';

                        $filename_qrcode = "uploads/qrcode/qrcode_{$id_user}_" . $this->encrypt->sha1(random_string()) . '.png';
                        
                        QRcode::png($id_compte, $filename_qrcode, QR_ECLEVEL_L, 4);

                        $data_qrcode['filename_qrcode'] = $filename_qrcode;
                        $data_qrcode['id_user'] = $id_user;
                        $this->dashboard_model->insert_qrcode($data_qrcode);


                        //var_dump($data);
                        $this->session->set_flashdata('complete','Compte bien rempli !');                      

                        if ($this->input->post('form')==1) {
                            $this->session->set_flashdata('update','Données modifiés !'); 
                            redirect('dashboard/profil');
                        }
                        
                        redirect('dashboard');

                    } // end if not uploaded file  

                
                } else {
                    
                    $data['userDebit']  = $this->dashboard_model->get_user_debit($this->session->userdata('usr_id'));
                    $data['userCredit'] = $this->dashboard_model->get_user_credit($this->session->userdata('usr_id'));
                    
                    $data['transactions'] = $this->dashboard_model->get_all_transaction($this->session->userdata('usr_id'));
                    $data['connected_user'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
                    
                    $data['error'] = true;
                    $this->load->view('dashboard/template/header',$data);
                    $this->load->view('dashboard/template/sidebar',$data);
                    $this->load->view('profil_view',$data);
                    //$this->load->view('dashboard/template/footer',$data);

                }        
        
    }

   



    /**
    * GESTION DES ACTUALITES
    **/
    public function actualite()
    {      
        $data['actualities'] = $this->dashboard_model->get_all_actuality();
        $data['types'] = $this->dashboard_model->get_all_type_actuality();
        $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
        $this->load->view('dashboard/actuality_view',$data);
    }


    public function addActualite()
    {      

        $this->form_validation->set_rules('label_actuality', 'Titre', 'trim|required|xss_clean');
        $this->form_validation->set_rules('description_actuality', 'Description', 'trim|required|xss_clean');
        $this->form_validation->set_rules('id_type_actuality', 'Catégorie', 'trim|required|xss_clean');
            
            if ($this->form_validation->run()) {

                    $config['upload_path'] = './uploads/actualite/';
                    $config['allowed_types'] = 'gif|jpg|jpeg|png';
                    $config['encrypt_name'] = TRUE;

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
 
                    if ( ! $this->upload->do_upload()) {

                        $this->session->set_flashdata('img_error', "<div class='alert alert-danger' id='img_error'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                        <strong>Erreur !</strong>".$this->upload->display_errors()."</div>");
                        redirect_back();
                        return FALSE;

                    } else {
                        $file_data = $this->upload->data();

                    $data = array(
                                'label_actuality' => $this->input->post('label_actuality'),
                                'slug_actuality' => strtolower($this->wd_remove_accents(str_replace ( ' ', '-',$this->input->post('label_actuality')))),
                                'description_actuality' => $this->input->post('description_actuality'),
                                'id_type_actuality' => $this->input->post('id_type_actuality'),
                                'actuality_image' => $file_data['file_name'],
                                'id_user' => $this->session->userdata('usr_id')
                    );
                    $this->dashboard_model->insert_actuality($data);

                    //var_dump($data);
                    $this->session->set_flashdata('add','Elément bien ajouté !'); 
                    redirect('dashboard/actualite');
                    }

                
                    } else {
                        $data['actualities'] = $this->dashboard_model->get_all_actuality();
                        $data['types'] = $this->dashboard_model->get_all_type_actuality();
                        $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
                        $this->load->view('actuality_view',$data);

                    }        
        
    }

    public function updateActualite()
    {      
        $this->form_validation->set_rules('label_actuality', 'Titre', 'trim|required|xss_clean');
        $this->form_validation->set_rules('description_actuality', 'Description', 'trim|required|xss_clean');
        $this->form_validation->set_rules('id_type_actuality', 'Catégorie', 'trim|required|xss_clean');
            
            if ($this->form_validation->run()) {

                    $config['upload_path'] = './uploads/actualite/';
                    $config['allowed_types'] = 'gif|jpg|jpeg|png';
                    $config['encrypt_name'] = TRUE;

                    $this->load->library('upload', $config);

                    if ( ! $this->upload->do_upload()) {

                        $id_actuality=$this->input->post('id_actuality');
                        $data = array(
                                'label_actuality' => $this->input->post('label_actuality'),
                                'slug_actuality' => str_replace ( ' ', '-',$this->input->post('label_actuality')),
                                'description_actuality' => $this->input->post('description_actuality'),
                                'id_type_actuality' => $this->input->post('id_type_actuality'),
                                'actuality_image' => $this->input->post('actuality_image'),
                                'id_user' => $this->session->userdata('usr_id')
                    );
                    $this->dashboard_model->update_actuality($id_actuality,$data);

                    //var_dump($data);
                    $this->session->set_flashdata('add','Elément bien ajouté !'); 
                    redirect('dashboard/actualite');

                    } else {
                        $file_data = $this->upload->data();
                         $id_actuality=$this->input->post('id_actuality');
                        $data = array(
                                'label_actuality' => $this->input->post('label_actuality'),
                                'slug_actuality' => str_replace ( ' ', '-',$this->input->post('label_actuality')),
                                'description_actuality' => $this->input->post('description_actuality'),
                                'id_type_actuality' => $this->input->post('id_type_actuality'),
                                'actuality_image' => $file_data['file_name'],
                                'id_user' => $this->session->userdata('usr_id')
                    );
                    $this->dashboard_model->update_actuality($id_actuality,$data);

                    //var_dump($data);
                    $this->session->set_flashdata('update','Elément bien ajouté !'); 
                    redirect('dashboard/actualite');
                    }

                
                    } else {
                        $data['actualities'] = $this->dashboard_model->get_all_actuality();
                        $data['types'] = $this->dashboard_model->get_all_type_actuality();
                        $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
                        $this->load->view('actuality_view',$data);

                    }        
        
    }

    function deleteActualite($id_actuality) 
    {
        $this->dashboard_model->delete_actuality($id_actuality);
        $this->session->set_flashdata('delete','Elément bien supprimé !'); 
        redirect('dashboard/actualite');
    }


    public function categorie()
    {      
        $data['categories'] = $this->dashboard_model->get_all_category_actu();
        $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
        $this->load->view('dashboard/category_view',$data);
    }

    public function addCatActualite()
    {      
            $this->form_validation->set_rules('label', 'Libelle', 'trim|required|xss_clean');
            
            if ($this->form_validation->run()) {
                    $data = array(
                         'label' => $this->input->post('label')
                    );
                    $this->dashboard_model->insert_category_actu($data);

                    //var_dump($data);
                    $this->session->set_flashdata('add','Elément bien ajouté !'); 
                    redirect('dashboard/categorie');
                    
                
                    } else {
                        $data['categories'] = $this->dashboard_model->get_all_category_actu();
                        $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
                        $this->load->view('category_view',$data);

                    }      
        
    }

    public function updateCatActualite()
    {      
            $this->form_validation->set_rules('label', 'Libelle', 'trim|required|xss_clean');
            
            if ($this->form_validation->run()) {

                    $id_type=$this->input->post('id_type');
                    $data = array(
                         'label' => $this->input->post('label')
                    );
                    $this->dashboard_model->update_category_actu($id_type,$data);
                    

                    //var_dump($data);
                    $this->session->set_flashdata('update','Elément bien modifié !'); 
                    redirect('dashboard/categorie');
                    
                
                    } else {
                        $data['categories'] = $this->dashboard_model->get_all_category_actu();
                        $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
                        $this->load->view('category_view',$data);

                    }      
        
    }

    function deleteCatActualite($id_type) 
    {
        $this->dashboard_model->delete_category_actu($id_type);
        $this->session->set_flashdata('delete','Elément bien supprimé !'); 
        redirect('dashboard/categorie');
    }



    /**
    * GESTION DES ACTIVITES
    **/
    public function activite()
    {      
        $data['activities'] = $this->dashboard_model->get_all_activity();
        $this->load->view('dashboard/activity_view',$data);
    }

    public function addActivite()
    {      

        $this->form_validation->set_rules('label_activity', 'Titre', 'trim|required|xss_clean');
        $this->form_validation->set_rules('description_activity', 'Description', 'trim|required|xss_clean');
            
            if ($this->form_validation->run()) {

                    $config['upload_path'] = './uploads/activite/';
                    $config['allowed_types'] = 'gif|jpg|jpeg|png';
                    $config['encrypt_name'] = TRUE;

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if ( ! $this->upload->do_upload()) {

                        $this->session->set_flashdata('img_error', "<div class='alert alert-danger' id='img_error'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                        <strong>Erreur !</strong>".$this->upload->display_errors()."</div>");
                        redirect_back();
                        return FALSE;

                    } else {
                        $file_data = $this->upload->data();

                        $data = array(
                                'label_activity' => $this->input->post('label_activity'),
                                'slug_activity' => str_replace ( ' ', '-',$this->input->post('label_activity')),
                                'description_activity' => $this->input->post('description_activity'),
                                'image_activity' => $file_data['file_name'],
                                'id_user' => $this->session->userdata('usr_id')
                    );
                    $this->dashboard_model->insert_activity($data);

                    //var_dump($data);
                    $this->session->set_flashdata('add','Elément bien ajouté !'); 
                    redirect('dashboard/activite');
                    }

                
                    } else {
                        $data['actualities'] = $this->dashboard_model->get_all_actuality();
                        $data['types'] = $this->dashboard_model->get_all_type_actuality();
                        $this->load->view('actuality_view',$data);

                    }        
        
    }


    public function updateActivite()
    {      

        $this->form_validation->set_rules('label_activity', 'Titre', 'trim|required|xss_clean');
        $this->form_validation->set_rules('description_activity', 'Description', 'trim|required|xss_clean');
            
            if ($this->form_validation->run()) {

                    $config['upload_path'] = './uploads/activite/';
                    $config['allowed_types'] = 'gif|jpg|jpeg|png';
                    $config['encrypt_name'] = TRUE;

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if ( ! $this->upload->do_upload()) {

                        $id_activity=$this->input->post('id_activity');
                        $image_activity=$this->input->post('image_activity');
                        $data = array(
                                'label_activity' => $this->input->post('label_activity'),
                                'slug_activity' => str_replace ( ' ', '-',$this->input->post('label_activity')),
                                'description_activity' => $this->input->post('description_activity'),
                                'image_activity' => $this->input->post('image_activite'),
                                'id_user' => $this->session->userdata('usr_id')
                    );
                    $this->dashboard_model->update_activity($id_activity,$data);

                    //var_dump($data);
                    $this->session->set_flashdata('update','Elément bien modifié !'); 
                    redirect('dashboard/activite');

                    } else {
                        $file_data = $this->upload->data();

                        $id_activity=$this->input->post('id_activity');
                        $data = array(
                                'label_activity' => $this->input->post('label_activity'),
                                'slug_activity' => str_replace ( ' ', '-',$this->input->post('label_activity')),
                                'description_activity' => $this->input->post('description_activity'),
                                'image_activity' => $file_data['file_name'],
                                'id_user' => $this->session->userdata('usr_id')
                    );
                    $this->dashboard_model->update_activity($id_activity,$data);

                    //var_dump($data);
                    $this->session->set_flashdata('update','Elément bien modifié !'); 
                    redirect('dashboard/activite');
                    }

                
                    } else {
                        $data['activities'] = $this->dashboard_model->get_all_activity();
                        $this->load->view('dashboard/activity_view',$data);

                    }        
        
    }


    function deleteActivite($id_activity) 
    {
        $this->dashboard_model->delete_activity($id_activity);
        $this->session->set_flashdata('delete','Elément bien supprimé !'); 
        redirect('dashboard/activite');
    }



    /**
    * GESTION DES ANNONCES
    **/
    public function annonce()
    {     
        $data['classifieds'] = $this->dashboard_model->get_all_classified(); 
        $this->load->view('dashboard/classified_view',$data);
    }

    public function addAnnonce()
    {      

        $this->form_validation->set_rules('label_classified', 'Titre', 'trim|required|xss_clean');
        $this->form_validation->set_rules('description_classified', 'Description', 'trim|required|xss_clean');
            
            if ($this->form_validation->run()) {

                    $config['upload_path'] = './uploads/annonce/';
                    $config['allowed_types'] = 'gif|jpg|jpeg|png';
                    $config['encrypt_name'] = TRUE;

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if ( ! $this->upload->do_upload()) {

                        $this->session->set_flashdata('img_error', "<div class='alert alert-danger' id='img_error'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                        <strong>Erreur !</strong>".$this->upload->display_errors()."</div>");
                        redirect_back();
                        return FALSE;

                    } else {
                        $file_data = $this->upload->data();

                        $data = array(
                                'label_classified' => $this->input->post('label_classified'),
                                'slug_classified' => str_replace ( ' ', '-',$this->input->post('label_classified')),
                                'description_classified' => $this->input->post('description_classified'),
                                'image_classified' => $file_data['file_name'],
                                'id_user' => $this->session->userdata('usr_id')
                    );
                    $this->dashboard_model->insert_classified($data);

                    //var_dump($data);
                    $this->session->set_flashdata('add','Elément bien ajouté !'); 
                    redirect('dashboard/annonce');
                    }

                
                    } else {
                        $data['classifieds'] = $this->dashboard_model->get_all_classified(); 
                        $this->load->view('dashboard/classified_view',$data);

                    }        
        
    }

    public function updateAnnonce() {      

        $this->form_validation->set_rules('label_classified', 'Titre', 'trim|required|xss_clean');
        $this->form_validation->set_rules('description_classified', 'Description', 'trim|required|xss_clean');
            
            if ($this->form_validation->run()) {

                    $config['upload_path'] = './uploads/annonce/';
                    $config['allowed_types'] = 'gif|jpg|jpeg|png';
                    $config['encrypt_name'] = TRUE;

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if ( ! $this->upload->do_upload()) {

                        $image_classified=$this->input->post('image_classified');                        
                        $id_classified=$this->input->post('id_classified');
                        $data = array(
                                'label_classified' => $this->input->post('label_classified'),
                                'slug_classified' => str_replace ( ' ', '-',$this->input->post('label_classified')),
                                'description_classified' => $this->input->post('description_classified'),
                                'image_classified' => $image_classified,
                                'id_user' => $this->session->userdata('usr_id')
                    );
                    $this->dashboard_model->update_classified($id_classified,$data);

                    //var_dump($data);
                    $this->session->set_flashdata('update','Elément bien modifié !'); 
                    redirect('dashboard/annonce');

                    } else {
                        $file_data = $this->upload->data();

                        $id_classified=$this->input->post('id_classified');
                        $data = array(
                                'label_classified' => $this->input->post('label_classified'),
                                'slug_classified' => str_replace ( ' ', '-',$this->input->post('label_classified')),
                                'description_classified' => $this->input->post('description_classified'),
                                'image_classified' => $file_data['file_name'],
                                'id_user' => $this->session->userdata('usr_id')
                    );
                    $this->dashboard_model->update_classified($id_classified,$data);

                    //var_dump($data);
                    $this->session->set_flashdata('update','Elément bien modifié !'); 
                    redirect('dashboard/annonce');
                    }

                
                    } else {
                        $data['classifieds'] = $this->dashboard_model->get_all_classified(); 
                        $this->load->view('dashboard/classified_view',$data);

                    }        
        
    }

    function deleteAnnonce($id_classified) 
    {
        $this->dashboard_model->delete_classified($id_classified);
        $this->session->set_flashdata('delete','Elément bien supprimé !'); 
        redirect('dashboard/annonce');
    }

    /**
    * GESTION DES FICHIERS
    **/
    public function fichier()
    {    
        $data['files'] = $this->dashboard_model->get_all_file();
        $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
        $this->load->view('dashboard/file_view',$data);
    }

    public function addFichier()
    {      

        $this->form_validation->set_rules('label_file', 'Titre', 'trim|required|xss_clean');
        $this->form_validation->set_rules('description_file', 'Description', 'trim|required|xss_clean');
            
            if ($this->form_validation->run()) {

                    $config['upload_path'] = './uploads/fichier/';
                    $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|ppt|pptx';
                    $config['encrypt_name'] = TRUE;

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);


                    if ( ! $this->upload->do_upload()) {

                        $this->session->set_flashdata('img_error', "<div class='alert alert-danger' id='img_error'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                        <strong>Erreur !</strong>".$this->upload->display_errors()."</div>");
                        redirect_back();
                        return FALSE;

                    } else {
                        $file_data = $this->upload->data();

                        $data = array(
                                'label_file' => $this->input->post('label_file'),
                                'slug_file' => str_replace ( ' ', '-',$this->input->post('label_file')),
                                'description_file' => $this->input->post('description_file'),
                                'link_file' => $file_data['file_name'],
                                'id_user' => $this->session->userdata('usr_id')
                    );
                    $this->dashboard_model->insert_file($data);

                    //var_dump($data);
                    $this->session->set_flashdata('add','Elément bien ajouté !'); 
                    redirect('dashboard/fichier');
                    }

                
                    } else {
                        $data['files'] = $this->dashboard_model->get_all_file();
                        $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
                        $this->load->view('dashboard/classified_view',$data);

                    }        
        
    }

    function deleteFichier($id_file) 
    {
        $this->dashboard_model->delete_file($id_file);
        $this->session->set_flashdata('delete','Elément bien supprimé !'); 
        redirect('dashboard/fichier');
    }

    /**
    * GESTION DES MEMBRES
    **/
    public function membre()
    {      
        $data['users'] = $this->dashboard_model->get_all_member_arc();
        $this->load->view('dashboard/membre_view',$data);
    }

   

    public function updateMembre()
    {      

        $this->form_validation->set_rules('name_user', 'Nom', 'trim|required|xss_clean');
        $this->form_validation->set_rules('surname_user', 'Prenom', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email_user', 'Email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password_user', 'Mot de passe', 'trim|required|xss_clean');
        $this->form_validation->set_rules('id_role', 'Rôle', 'trim|required|xss_clean');
            
            if ($this->form_validation->run()) {

                    $config['upload_path'] = './uploads/utilisateur/';
                    $config['allowed_types'] = 'gif|jpg|jpeg|png|PNG|JPG|JPEG';
                    $config['encrypt_name'] = TRUE;

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if ( ! $this->upload->do_upload()) {

                        $id_user=$this->input->post('id_user');
                        $data = array(
                                'name_user' => $this->input->post('name_user'),
                                'surname_user' => $this->input->post('surname_user'),
                                'african_name' => $this->input->post('african_name'),
                                'name_father' => $this->input->post('name_father'),
                                'name_mother' => $this->input->post('name_mother'),
                                'name_village' => $this->input->post('name_village'),
                                'name_town' => $this->input->post('name_town'),
                                'name_department' => $this->input->post('name_department'),
                                'living_local' => $this->input->post('living_local'),
                                'adress_user' => $this->input->post('adress_user'),
                                'phone_user' => $this->input->post('phone_user'),
                                'email_user' => $this->input->post('email_user'),
                                'password_user' => $this->input->post('password_user'),
                                'picture_user' => $this->input->post('picture_user'),
                                'id_role' => $this->input->post('id_role')
                    );
                    $this->dashboard_model->update_user($id_user,$data);
                    $this->session->set_flashdata('update','Elément bien modifié !'); 
                    redirect('dashboard/membre');

                    } else {
                        $file_data = $this->upload->data();

                        $id_user=$this->input->post('id_user');
                        $data = array(
                               'name_user' => $this->input->post('name_user'),
                                'surname_user' => $this->input->post('surname_user'),
                                'african_name' => $this->input->post('african_name'),
                                'name_father' => $this->input->post('name_father'),
                                'name_mother' => $this->input->post('name_mother'),
                                'name_village' => $this->input->post('name_village'),
                                'name_town' => $this->input->post('name_town'),
                                'name_department' => $this->input->post('name_department'),
                                'living_local' => $this->input->post('living_local'),
                                'adress_user' => $this->input->post('adress_user'),
                                'phone_user' => $this->input->post('phone_user'),
                                'email_user' => $this->input->post('email_user'),
                                'password_user' => $this->input->post('password_user'),
                                'picture_user' => $file_data['file_name'],
                                'id_role' => $this->input->post('id_role')
                    );
                    $this->dashboard_model->update_user($id_user,$data);

                    //var_dump($data);
                    $this->session->set_flashdata('update','Elément bien modifié !'); 
                     

                    redirect('dashboard/membre');

                    }

                
                    } else {
                        $data['users'] = $this->dashboard_model->get_all_user();
                        $data['roles'] = $this->dashboard_model->get_all_user_role();
                        $this->load->view('user_view',$data);

                    }        
        
    }


    /**
    * GESTION DES GALERIES
    **/
    public function galerie()
    {      
        $data['galeries'] = $this->dashboard_model->get_all_gallery();
        $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
        $data['types'] = $this->dashboard_model->get_all_type_actuality();
        $this->load->view('dashboard/galerie_view',$data);
        /*echo "<pre>";
        print_r($data['galeries']);
        echo "<pre>";*/
    }

    public function ajouterGalerie()
    {      
        $data['types'] = $this->dashboard_model->get_all_type_actuality();
        $this->load->view('dashboard/add_galerie_view',$data);
    }

    public function image_upload()
    {
             $this->form_validation->set_rules('label_gallery', 'Titre', 'trim|required|xss_clean');
             $this->form_validation->set_rules('description_gallery', 'Description', 'trim|required|xss_clean');
            
                    if ($this->form_validation->run()) 
                    {
                        $files = $_FILES;
                        $cpt = count($_FILES['userfile']['name']);
                         for($i=0; $i<$cpt; $i++)
                        {
                            $_FILES['userfile']['name']= $files['userfile']['name'][$i];
                            $_FILES['userfile']['type']= $files['userfile']['type'][$i];
                            $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
                            $_FILES['userfile']['error']= $files['userfile']['error'][$i];
                            $_FILES['userfile']['size']= $files['userfile']['size'][$i];
                            $this->upload->initialize($this->set_upload_options());
                            $this->upload->do_upload();
                            $fileName = $_FILES['userfile']['name'];
                            $images[] = $fileName;
                       }
                      //Create galerie

                       $data = array(
                                'label_gallery' => $this->input->post('label_gallery'),
                                'slug_gallery' => str_replace ( ' ', '-',$this->input->post('label_gallery')),
                                'description_gallery' => $this->input->post('description_gallery'),
                                'id_user' => $this->session->userdata('usr_id'),
                                'id_category' => $this->input->post('id_category')
                    );
                    $this->dashboard_model->insert_gallery($data);

                    $data['IDgallery']=$this->dashboard_model->get_id_gallery($this->input->post('label_gallery'));

                    foreach ($data['IDgallery'] as $key => $value) 
                      {
                          $id_gallery=$value['id_gallery'];
                      }

                      foreach ($images as $key => $value) 
                      {
                          $data = array(
                                'link_image' => $value,
                                'id_gallery' => $id_gallery
                          );
                          $this->dashboard_model->insert_image_gallery($data);                          
                      }
                     $this->session->set_flashdata('add','Galérie bien ajoutée !'); 
                     redirect('dashboard/galerie');

                    
                
                    } else {
                        $this->load->view('dashboard/add_galerie_view');

                    }
    }

    function deleteGalerie($id_gallery) 
    {
        $this->dashboard_model->delete_gallery($id_gallery);
        $this->dashboard_model->delete_image_gallery($id_gallery);

        $this->session->set_flashdata('delete','Galérie bien supprimée !'); 
        redirect('dashboard/galerie');
    }

    private function set_upload_options()
      { 
      // upload an image options
             $config = array();
             $config['upload_path'] = './uploads/galerie/'; //give the path to upload the image in folder
             $config['allowed_types'] = 'gif|jpg|png';
             $config['max_size'] = '0';
             $config['overwrite'] = FALSE;
      return $config;
      }


      public function video_upload()
    {
             $this->form_validation->set_rules('label_video', 'Titre', 'trim|required|xss_clean');
            
                    if ($this->form_validation->run()) 
                    {
                        if ($this->input->post('id_type_video')==1) {

                            $config['upload_path'] = './uploads/video/';
                            $config['allowed_types'] = '*';
                            $config['encrypt_name'] = TRUE;
                            $config['max_size'] = 100000000;

                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);

                            if ( ! $this->upload->do_upload()) {

                                $this->session->set_flashdata('img_error', "<div class='alert alert-danger' id='img_error'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                <strong>Erreur !</strong>".$this->upload->display_errors()."</div>");

                                //var_dump($this->upload->display_errors());
                                redirect_back();
                                return FALSE;

                            } else {
                                $file_data = $this->upload->data();
                                $data = array(
                                            'label_video' => $this->input->post('label_video'),
                                            'slug_video' => str_replace ( ' ', '-',$this->input->post('label_video')),
                                            'video_path' => $file_data['file_name'],
                                            'id_user' => $this->session->userdata('usr_id'),
                                            'id_category' => $this->input->post('id_category'),
                                            'a_la_une' => $this->input->post('a_la_une')
                                );
                                $this->dashboard_model->insert_video($data);
                                $this->session->set_flashdata('add','Elément bien ajouté !'); 
                                redirect('dashboard/video');
                            }
                        }
                        
                        elseif ($this->input->post('id_type_video')==2) {
                            $data = array(
                                            'label_video' => $this->input->post('label_video'),
                                            'slug_video' => str_replace ( ' ', '-',$this->input->post('label_video')),
                                            'link_video' => $this->input->post('link_video'),
                                            'id_user' => $this->session->userdata('usr_id'),
                                            'id_category' => $this->input->post('id_category'),
                                             'a_la_une' => $this->input->post('a_la_une')
                                );
                                $this->dashboard_model->insert_video($data);
                                $this->session->set_flashdata('add','Elément bien ajouté !'); 
                                redirect('dashboard/video');

                        } else {
                           redirect('dashboard/video');
                        }
                           
                    
                
                    } else {
                        $data['mistake'] = $this->upload->display_errors();
                        $data['videos'] = $this->dashboard_model->get_all_video();
                         $data['types'] = $this->dashboard_model->get_all_type_actuality();
                        $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
                        $this->load->view('dashboard/video_view',$data);
                        $this->load->view('dashboard/video_view',$data);

                    }
    }

    function deleteVideo($id_video) 
    {
        $this->dashboard_model->delete_video($id_video);
        $this->session->set_flashdata('delete','Vidéo bien supprimée !'); 
        redirect('dashboard/video');
    }


    /**
    * GESTION DES SLIDES
    **/
    public function slide()
    {      
        $data['slides'] = $this->dashboard_model->get_all_slide(); 
        $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
        $this->load->view('dashboard/slide_view',$data);
    }

    public function addSlide()
    {      

        $this->form_validation->set_rules('label_slide', 'Titre', 'trim|required|xss_clean');
            
            if ($this->form_validation->run()) {

                    $config['upload_path'] = './uploads/slides/';
                    $config['allowed_types'] = 'png|PNG|jpg|JPG|jpeg|JPEG';
                    $config['encrypt_name'] = TRUE;

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if ( ! $this->upload->do_upload()) {

                        $this->session->set_flashdata('img_error', "<div class='alert alert-danger' id='img_error'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                        <strong>Erreur !</strong>".$this->upload->display_errors()."</div>");
                        redirect_back();
                        return FALSE;

                    } else {
                        $file_data = $this->upload->data();

                        $data = array(
                                'label_slide' => $this->input->post('label_slide'),
                                'link_slide' => $file_data['file_name'],
                                'date_slide' => $this->input->post('date_slide'),
                                'a_la_une' => $this->input->post('a_la_une'),
                                'link_redirection' => $this->input->post('link_redirection')
                    );
                    $this->dashboard_model->insert_slide($data);

                    //debug($data);
                    //var_dump($data);
                    $this->session->set_flashdata('add','Elément bien ajouté !'); 
                    redirect('dashboard/slide');
                    }

                
                    } else {
                        $data['slides'] = $this->dashboard_model->get_all_slide(); 
                        $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
                        $this->load->view('dashboard/slide_view',$data);

                    }        
        
    }

    public function updateSlide()
    {      

        $this->form_validation->set_rules('label_slide', 'Titre', 'trim|required|xss_clean');
            
            if ($this->form_validation->run()) {

                    $config['upload_path'] = './uploads/slides/';
                    $config['allowed_types'] = 'png|PNG|jpg|JPG|jpeg|JPEG';
                    $config['encrypt_name'] = TRUE;

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if ( ! $this->upload->do_upload()) {

                        $id_slide = $this->input->post('id_slide');
                        $link_slide = $this->input->post('link_slide');
                        $data = array(
                                'label_slide' => $this->input->post('label_slide'),
                                'link_slide' => $link_slide,
                                'a_la_une' => $this->input->post('a_la_une'),
                                'link_redirection' => $this->input->post('link_redirection')
                    );
                    $this->dashboard_model->update_slide($id_slide,$data);

                    //var_dump($data);
                    $this->session->set_flashdata('update','Elément bien modifié !'); 
                    redirect('dashboard/slide');

                    } else {
                        $file_data = $this->upload->data();
                        $id_slide = $this->input->post('id_slide');
                        $data = array(
                                'label_slide' => $this->input->post('label_slide'),
                                'link_slide' => $file_data['file_name'],
                                'a_la_une' => $this->input->post('a_la_une'),
                                'link_redirection' => $this->input->post('link_redirection')
                    );
                    $this->dashboard_model->update_slide($id_slide,$data);

                    //var_dump($data);
                    $this->session->set_flashdata('update','Elément bien modifié !'); 
                    redirect('dashboard/slide');
                    }

                
                    } else {
                        $data['slides'] = $this->dashboard_model->get_all_slide(); 
                        $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
                        $this->load->view('dashboard/slide_view',$data);

                    }        
        
    }

    function deleteSlide($id_slide) 
    {
        $this->dashboard_model->delete_slide($id_slide);
        $this->session->set_flashdata('delete','Elément bien supprimé !'); 
        redirect('dashboard/slide');
    }

     function activerSlide($id_slide) 
    {
        $this->db->set('status', 1, FALSE);
        $this->db->where('id_slide', $id_slide);
        $this->db->update('slide');
        $this->session->set_flashdata('add','Slide bien activé !'); 
        redirect('dashboard/slide');
    }

     function desactiverSlide($id_slide) 
    {
        $this->db->set('status', 0, FALSE);
        $this->db->where('id_slide', $id_slide);
        $this->db->update('slide');
        $this->session->set_flashdata('delete','Slide désactivé avec succès !'); 
        redirect('dashboard/slide');
    }

    function historique()
    {
        $data['logs'] = $this->dashboard_model->get_all_log();
        $this->load->view('dashboard/historique_view',$data);
    }


    public function partenaire()
    {   
        $data['partners'] = $this->dashboard_model->get_all_partner();
        $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
        $this->load->view('dashboard/partenaire_view',$data);
    }
    public function addPartner()
    {   
            $this->form_validation->set_rules('label_partner', 'Titre', 'trim|required|xss_clean');
            
            if ($this->form_validation->run()) {

                    $config['upload_path'] = './uploads/slides/';
                    $config['allowed_types'] = 'png|PNG|jpg|JPG|jpeg|JPEG';
                    $config['encrypt_name'] = TRUE;

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if ( ! $this->upload->do_upload()) {

                        $this->session->set_flashdata('img_error', "<div class='alert alert-danger' id='img_error'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                        <strong>Erreur !</strong>".$this->upload->display_errors()."</div>");
                        redirect_back();
                        return FALSE;

                    } else {
                        $file_data = $this->upload->data();

                        $data = array(
                                'label_partner' => $this->input->post('label_partner'),
                                'image_partner' => $file_data['file_name'],
                                'link_site_partner' => $this->input->post('link_site_partner'),
                                'a_la_une' => $this->input->post('a_la_une')
                    );
                    $this->dashboard_model->insert_partner($data);

                    //debug($data);
                    $this->session->set_flashdata('add','Elément bien ajouté !'); 
                    redirect('dashboard/partenaire');
                    }

                
                    } else {
                        $data['partners'] = $this->dashboard_model->get_all_partner(); 
                        $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
                        $this->load->view('dashboard/partenaire_view',$data);

                    }
    }

    public function updatePartner()
    {      

        $this->form_validation->set_rules('label_partner', 'Titre', 'trim|required|xss_clean');
            
            if ($this->form_validation->run()) {

                    $config['upload_path'] = './uploads/slides/';
                    $config['allowed_types'] = 'png|PNG|jpg|JPG|jpeg|JPEG';
                    $config['encrypt_name'] = TRUE;

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if ( ! $this->upload->do_upload()) {

                        $id_partner = $this->input->post('id_partner');
                         $data = array(
                                'label_partner' => $this->input->post('label_partner'),
                                'image_partner' => $this->input->post('image_partner'),
                                'link_site_partner' => $this->input->post('link_site_partner'),
                                'a_la_une' => $this->input->post('a_la_une')
                    );
                    $this->dashboard_model->update_partner($id_partner,$data);

                    //var_dump($data);
                    $this->session->set_flashdata('update','Elément bien modifié !'); 
                    redirect('dashboard/partenaire');

                    } else {
                        $file_data = $this->upload->data();
                        $id_partner = $this->input->post('id_partner');
                         $data = array(
                                'label_partner' => $this->input->post('label_partner'),
                                'image_partner' => $file_data['file_name'],
                                'link_site_partner' => $this->input->post('link_site_partner'),
                                'a_la_une' => $this->input->post('a_la_une')
                    );
                    $this->dashboard_model->update_partner($id_partner,$data);

                    //var_dump($data);
                    $this->session->set_flashdata('update','Elément bien modifié !'); 
                    redirect('dashboard/partenaire');
                    }

                
                    } else {
                        $data['partners'] = $this->dashboard_model->get_all_partner(); 
                        $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
                        $this->load->view('dashboard/partenaire_view',$data);

                    }        
        
    }

    function deletePartner($id_partner) 
    {
        $this->dashboard_model->delete_partner($id_partner);
        $this->session->set_flashdata('delete','Elément bien supprimé !'); 
        redirect('dashboard/partenaire');
    }




    public function newsletter()
    {   
        $data['newsletters'] = $this->dashboard_model->get_all_newsletter();
        $this->load->view('dashboard/newsletter_view',$data);
    }

    function deleteNewsletter($id_newsletter) 
    {
        $this->dashboard_model->delete_newsletter($id_newsletter);
        $this->session->set_flashdata('delete','Elément bien supprimé !'); 
        redirect('dashboard/newsletter');
    }

    /**
    * GESTION DES GALERIES
    **/
    public function video()
    {      
        $data['videos'] = $this->dashboard_model->get_all_video();
         $data['types'] = $this->dashboard_model->get_all_type_actuality();
        $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
        $this->load->view('dashboard/video_view',$data);
        
    }

    public function ajouterVideo()
    {      
        $data['types'] = $this->dashboard_model->get_all_type_actuality();
        $this->load->view('dashboard/add_video_view',$data);
    }


    //GEstion des flashs
    public function flash() {
      $data['flashs'] = $this->dashboard_model->get_all_flash();
      $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
      $this->load->view('dashboard/flash_view',$data);
    }
       public function addflash()
    {
        $this->form_validation->set_rules('label_flash', 'Libellé', 'trim|required');
        $this->form_validation->set_rules('content_flash', 'Contenu', 'trim|required');

        if($this->form_validation->run()){
          $data = array(
                  'label_flash' => $this->input->post('label_flash'),                         
                  'content_flash' => $this->input->post('content_flash'),                         
                );
                $this->dashboard_model->insert_flash($data);

                $this->session->set_flashdata('add','flash bien ajoutée');
                redirect('dashboard/flash');


        }else{
          $data['flashs'] = $this->dashboard_model->get_all_flash();
          $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
          $this->load->view('dashboard/flash_view',$data);
        }
    }

         public function updateFlash()
    {
        $this->form_validation->set_rules('label_flash', 'Libellé', 'trim|required');
        $this->form_validation->set_rules('content_flash', 'Elements', 'trim|required');

        if($this->form_validation->run()){
          $id_flash = $this->input->post('id_flash');
          $data = array(
                  'label_flash' => $this->input->post('label_flash'),                         
                  'content_flash' => $this->input->post('content_flash'),                         
                );
                $this->dashboard_model->update_flash($id_flash, $data);

                $this->session->set_flashdata('add','flash bien modifié');
                redirect('dashboard/flash');


        }else{
          $data['flashs'] = $this->dashboard_model->get_all_flash();
          $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
          $this->load->view('dashboard/flash_view',$data);
        }
    }

    public function deleteFlash($id_flash)
    {
      $this->dashboard_model->delete_flash($id_flash);
      $this->session->set_flashdata('delete','flash bien supprimée');
      redirect('dashboard/flash');

    }

    /**
    * GESTION DES UTILISATEURS
    **/

    public function utilisateur()
    {   
        $data['users'] = $this->dashboard_model->get_all_user();
        $data['roles'] = $this->dashboard_model->get_all_user_role();
        $data['magasins'] = $this->dashboard_model->get_all_magasin();
        $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
        $data['admin_magasin'] = $this->dashboard_model->get_admin_magasin($this->session->userdata('usr_id'));
        $this->load->view('dashboard/user_view',$data);
    }

    public function addUtilisateur()
    {      

        $this->form_validation->set_rules('usr_name', 'Nom', 'trim|required|xss_clean');
        $this->form_validation->set_rules('usr_surname', 'Prenom', 'trim|required|xss_clean');
        $this->form_validation->set_rules('usr_email', 'Email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('usr_password', 'Mot de passe', 'trim|required|xss_clean');
        $this->form_validation->set_rules('id_role', 'Rôle', 'trim|required|xss_clean');
        $this->form_validation->set_rules('id_magasin', 'Magasin', 'trim|required|xss_clean');
            
            if ($this->form_validation->run()) {

                    $this->load->library('encrypt');
                    $config['upload_path'] = './uploads/utilisateur/';
                    $config['allowed_types'] = 'gif|jpg|jpeg|png';
                    $config['encrypt_name'] = TRUE;

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if ( ! $this->upload->do_upload()) {

                        $this->session->set_flashdata('img_error', "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                        <strong>Erreur !</strong>".$this->upload->display_errors()."</div>");
                        redirect_back();
                        return FALSE;

                    } else {
                        $file_data = $this->upload->data();

                        $data = array(
                                'usr_name' => $this->input->post('usr_name'),
                                'usr_surname' => $this->input->post('usr_surname'),
                                'usr_email' => $this->input->post('usr_email'),
                                'usr_password' => $this->encrypt->sha1($this->input->post('usr_password')),
                                'usr_group' => $this->input->post('id_role'),
                                'usr_photo' => $file_data['file_name'],
                                'id_magasin' => $this->input->post('id_magasin')
                    );

                    $this->dashboard_model->insert_utilisateur($data);

                    //var_dump($data);
                    $this->session->set_flashdata('add','Elément bien ajouté !'); 

                    redirect('dashboard/utilisateur');

                    }

                
                    } else { 
                        $data['users'] = $this->dashboard_model->get_all_user();
                        $data['roles'] = $this->dashboard_model->get_all_user_role();
                        $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
                        $data['admin_magasin'] = $this->dashboard_model->get_admin_magasin($this->session->userdata('usr_id'));
                        $this->load->view('user_view',$data);

                    }        
        
    }

    public function updateUtilisateur()
    {      

        $this->form_validation->set_rules('usr_name', 'Nom', 'trim|required|xss_clean');
        $this->form_validation->set_rules('usr_surname', 'Prenom', 'trim|required|xss_clean');
        $this->form_validation->set_rules('usr_email', 'Email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('usr_password', 'Mot de passe', 'trim|required|xss_clean');
        $this->form_validation->set_rules('id_role', 'Rôle', 'trim|required|xss_clean');
        $this->form_validation->set_rules('id_magasin', 'Magasin', 'trim|required|xss_clean');
            
            if ($this->form_validation->run()) {
                    $this->load->library('encrypt');
                    
                    $config['upload_path'] = './uploads/utilisateur/';
                    $config['allowed_types'] = 'gif|jpg|jpeg|png|PNG|JPG|JPEG';
                    $config['encrypt_name'] = TRUE;

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if ( ! $this->upload->do_upload()) {

                        $id_user=$this->input->post('usr_id');
                        $data = array(
                                'usr_name' => $this->input->post('usr_name'),
                                'usr_surname' => $this->input->post('usr_surname'),
                                'usr_email' => $this->input->post('usr_email'),
                                'usr_password' => $this->encrypt->sha1($this->input->post('usr_password')),
                                'usr_photo' => $this->input->post('usr_photo'),
                                'usr_group' => $this->input->post('id_role'),
                                'id_magasin' => $this->input->post('id_magasin')
                    );
                    $this->dashboard_model->update_utilisateur($id_user,$data);
                    $this->session->set_flashdata('update','Elément bien modifié !'); 
                    redirect('dashboard/utilisateur');

                    } else {
                        $file_data = $this->upload->data();

                        $id_user=$this->input->post('usr_id');
                        $data = array(
                                'usr_name' => $this->input->post('usr_name'),
                                'usr_surname' => $this->input->post('usr_surname'),
                                'usr_email' => $this->input->post('usr_email'),
                                'usr_password' => $this->encrypt->sha1($this->input->post('usr_password')),
                                'usr_photo' => $file_data['file_name'],
                                'usr_group' => $this->input->post('id_role'),
                                'id_magasin' => $this->input->post('id_magasin')
                    );
                    $this->dashboard_model->update_utilisateur($id_user,$data);

                    //var_dump($data);
                    $this->session->set_flashdata('update','Elément bien modifié !'); 
                    if($this->input->post('postU')){
                      $this->session->set_flashdata('update','Compte bien modifié !'); 
                      redirect('dashboard/monCompte');
                    }

                    redirect('dashboard/utilisateur');

                    }

                
                    } else {
                      if($this->input->post('postU')==1){
                          $data['users'] = $this->dashboard_model->get_all_user();
                        $data['roles'] = $this->dashboard_model->get_all_user_role();
                        $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
                        $this->load->view('moncompte_view',$data);
                        }
                        $data['users'] = $this->dashboard_model->get_all_user();
                        $data['roles'] = $this->dashboard_model->get_all_user_role();
                        $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
                        $data['admin_magasin'] = $this->dashboard_model->get_admin_magasin($this->session->userdata('usr_id'));
                        $this->load->view('user_view',$data);

                    }        
        
    }

    function deleteUtilisateur($usr_id) 
    {
        $this->dashboard_model->delete_utilisateur($usr_id);
        $this->session->set_flashdata('delete','Elément bien supprimé !'); 
        redirect('dashboard/utilisateur');
    }

    function monCompte() 
    {
        $data['users'] = $this->dashboard_model->get_all_user();
        $data['roles'] = $this->dashboard_model->get_all_user_role();
        $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
        $data['admin_magasin'] = $this->dashboard_model->get_admin_magasin($this->session->userdata('usr_id'));
        $this->load->view('moncompte_view',$data);
    }

     public function magasin()
    {   
        $data['magasins'] = $this->dashboard_model->get_all_magasin();
        $data['villes'] = $this->dashboard_model->get_all_ville();
        $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
        $data['admin_magasin'] = $this->dashboard_model->get_admin_magasin($this->session->userdata('usr_id'));
        $this->load->view('dashboard/magasin_view',$data);
    }
    public function addMagasin()
    {   
            $this->form_validation->set_rules('label_magasin', 'Nom du magasin', 'trim|required|xss_clean');
            $this->form_validation->set_rules('adresse_magasin', 'Adresse', 'trim|required|xss_clean');
            $this->form_validation->set_rules('contact_magasin', 'Contact', 'trim|required|xss_clean');
            
            if ($this->form_validation->run()) {

                 
                        $data = array(
                                'label_magasin' => $this->input->post('label_magasin'),
                                'adresse_magasin' => $this->input->post('adresse_magasin'),
                                'contact_magasin' => $this->input->post('contact_magasin'),
                                'id_ville' => $this->input->post('id_ville')
                    );
                    $this->dashboard_model->insert_magasin($data);

                    //debug($data);
                    $this->session->set_flashdata('add','Elément bien ajouté !'); 
                    redirect('dashboard/magasin');
                    

                
                    } else {
                       $data['magasins'] = $this->dashboard_model->get_all_magasin(); 
                        $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
                        $data['admin_magasin'] = $this->dashboard_model->get_admin_magasin($this->session->userdata('usr_id'));
                        $this->load->view('dashboard/magasin_view',$data);

                    }
    }

    public function updateMagasin()
    {      

        $this->form_validation->set_rules('label_magasin', 'Nom du magasin', 'trim|required|xss_clean');
            $this->form_validation->set_rules('adresse_magasin', 'Adresse', 'trim|required|xss_clean');
            $this->form_validation->set_rules('contact_magasin', 'Contact', 'trim|required|xss_clean');
            
            if ($this->form_validation->run()) {

                
                        $file_data = $this->upload->data();
                        $id_magasin = $this->input->post('id_magasin');
                       $data = array(
                                'label_magasin' => $this->input->post('label_magasin'),
                                'adresse_magasin' => $this->input->post('adresse_magasin'),
                                'contact_magasin' => $this->input->post('contact_magasin'),
                                'id_ville' => $this->input->post('id_ville')
                    );
                    $this->dashboard_model->update_magasin($id_magasin,$data);

                    //var_dump($data);
                    $this->session->set_flashdata('update','Elément bien modifié !'); 
                    redirect('dashboard/magasin');
                    

                
                    } else {
                        $data['magasins'] = $this->dashboard_model->get_all_magasin(); 
                        $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
                        $data['admin_magasin'] = $this->dashboard_model->get_admin_magasin($this->session->userdata('usr_id'));
                        $this->load->view('dashboard/magasin_view',$data);

                    }        
        
    }

    function deleteMagasin($id_magasin) 
    {
        $this->dashboard_model->delete_magasin($id_magasin);
        $this->session->set_flashdata('delete','Elément bien supprimé !'); 
        redirect('dashboard/magasin');
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


    public function actionCommande()
    {
        if($_POST){
          switch ($this->input->post('status')) {
            case 'paye_livre':

              $this->db->set('status', 'paye_livre', TRUE);
              $this->db->where('id', $this->input->post('id'));
              $this->db->update('invoices');
              $this->session->set_flashdata('add','Commande payé et livrée avec succès. !');
              //sendSMS(urlencode("Votre commande a été payé. Merci"), urlencode($this->input->post('numero_pickup')));

              $this->db->set('is_pick', 1, TRUE);
              $this->db->where('id', $this->input->post('id'));
              $this->db->update('invoices');

              redirect('dashboard');

              break;
           case 'paye_nonlivre':
              
              $this->db->set('status', 'paye_nonlivre', TRUE);
              $this->db->where('id', $this->input->post('id'));
              $this->db->update('invoices');
              $this->session->set_flashdata('add','Commande payé et non livrée. !');
              //sendSMS(urlencode("Votre commande a été enregistrée. Merci"), urlencode($this->input->post('numero_pickup')));
              redirect('dashboard');

              break;
     
            
          }
        }else{

        }
    }

    public function getcommuneVille($id_ville)
    {
          echo json_encode(array('content' => $this->dashboard_model->getComVille($id_ville)));
    } 


   public function statistique()
    {   
        $data['magasins'] = $this->dashboard_model->get_all_magasin();
        $data['villes'] = $this->dashboard_model->get_all_ville();
        $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
        $data['admin_magasin'] = $this->dashboard_model->get_admin_magasin($this->session->userdata('usr_id'));
        $this->load->view('dashboard/statistique_view',$data);
    }


}

/* End of file compte.php */
/* Location: ./application/modules/compte/controllers/compte.php */
