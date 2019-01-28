<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		 $this->load->model('dashboard/dashboard_model');
		 $this->load->model('panier/model_products');
		$this->load->model('panier/model_settings');
    $this->load->model('cp/cp_model');
        $this->load->library('upload');

        
	}

	public function index()
	{

		$data['get_sitename'] = $this->model_settings->sitename_settings();
		$data['get_footer'] = $this->model_settings->footer_settings();	
    $data['products'] = $this->model_products->all_products();  //this all_products from model 
		$data['packsProducts'] = $this->model_products->all_packs_products();	//this all_products from model 
		$data['starts'] = $this->model_products->dis_products();
    $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
    $data['categories'] = $this->dashboard_model->get_all_prod_cat();
     //$data['partners'] = $this->dashboard_model->get_all_partner();
		$this->load->view('home_view',$data);
	}
  public function construction()
  {
    $this->load->view('construction_view');
  }

	public function inscription()
	{
   if($this->session->userdata('usr_id')){
      redirect('utilisateur/espace-personnel');
    }else{
    $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
     $data['categories'] = $this->dashboard_model->get_all_prod_cat();
      $data['magasins'] = $this->dashboard_model->get_all_magasin();
    $this->load->view('inscription_view',$data);
   }
	}
	public function connexion()
	{
    if($this->session->userdata('usr_id')){
      redirect('utilisateur/espace-personnel');
    }else{
    $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
     $data['categories'] = $this->dashboard_model->get_all_prod_cat();
      $data['magasins'] = $this->dashboard_model->get_all_magasin();
		$this->load->view('connexion_view',$data);
   }
	}
	



	public function russie()
	{
    $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
		$this->load->view('russie2018_view',$data);
	}

   public function galerie()
  {
    $data['videos'] = $this->dashboard_model->get_all_video();
    $data['galeries'] = $this->dashboard_model->get_all_gallery();
    $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
    $this->load->view('galerie_view',$data);
  }

  public function details_galerie($slug_gallery)
    {
        $data['single_gallery'] = $this->dashboard_model->get_gallery($slug_gallery);
      if ($data['single_gallery']) {
        $data['galeries'] = $this->dashboard_model->get_all_gallery();
        $data['single_gallery'] = $this->dashboard_model->get_gallery($slug_gallery);
        $this->load->view('home/details_gallery_view',$data); 
      }else{
        redirect('galerie');
      } 
    }

  public function galerie_photo()
  {
    $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
    $this->load->view('galerie_photo_view',$data);
  }

  public function galerie_video()
  {
    $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
    $this->load->view('galerie_video_view',$data);
  }

  public function packs()
  {
    $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
    $data['packsProducts'] = $this->model_products->all_packs_products();
    $this->load->view('pack_view',$data);
  }

   public function store()
  {
    $data['products'] = $this->model_products->all_products();  //this all_products from model 
    $data['starts'] = $this->model_products->dis_products();
     $data['categories'] = $this->dashboard_model->get_all_prod_cat();
    $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
    $this->load->view('store_view',$data);
    //$this->construction();
  }

  public function espace_perso()
  {
    if($this->session->userdata('usr_id') and $this->session->userdata('usr_group')== 3) 
          {
            $data['factures'] = $this->dashboard_model->get_all_vente();
            $data['orders'] = $this->dashboard_model->get_all_order();
            $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
            $this->load->view('espace_personnel_view',$data);            
          }else{
            redirect('dashboard');
          }
    
  }

  public function web_tv()
  {
    $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
    $this->load->view('web_tv_view',$data);
  }

  public function langue()
  {
    if($this->session->userdata('site_lang') == 'french'){
        redirect('home'); 
    }
    if($this->session->userdata('site_lang') == 'english'){
        redirect('home');  
    } 
      
  }

  function se_deconnecter() {
      $this->session->unset_userdata('usr_id');
      //session_destroy();
      redirect('home', 'refresh');
        
    }

function post_captcha($user_response){
  $fields_string = "";
  $fields = array(
      'secret' => '6LdbnFQUAAAAAEaINKMZMo2XZL7jUAaTMH-qv8BA',
      'response' =>$user_response
      );

  foreach($fields as $key=>$value){
    $fields_string.= $key . '=' .$value . '&';
    $fields_string= rtrim($fields_string, '&');

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
    curl_setopt($ch, CURLOPT_POST, count($fields));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

    $result = curl_exec($ch);

    curl_close($ch);

    return jsqon_decode($result, true);


  }

  $res = post_captcha($this->input->post('g-recaptcha-response'));

  if(!$res['success']){
    echo '<p> Veuillez vous retourner pour cocher le Captcha</p>';
  }else{
    $this->step1();
  }
}




	//Inscription
	public function step1()
    {      

        $this->form_validation->set_rules('usr_civilite', 'Civilité', 'trim|required');
        $this->form_validation->set_rules('usr_name', 'Nom', 'trim|required');
        $this->form_validation->set_rules('usr_surname', 'Prénoms', 'trim|required');
        $this->form_validation->set_rules('usr_email', 'Email', 'trim|required');
        $this->form_validation->set_rules('usr_telephone', 'Téléphone', 'trim|required');
        $this->form_validation->set_rules('usr_adresse', 'Lieu Habitation', 'trim|required');
        $this->form_validation->set_rules('password', 'Mot de passe', 'trim|required');
        $this->form_validation->set_rules('id_magasin', 'Magasin', 'trim|required');
            
            if ($this->form_validation->run()) {

            		$this->load->library('encrypt');
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

                    $usr_id = $this->dashboard_model->insert_user($data);

                    //$this->sendmail($this->input->post('usr_email'),$token);

                     //var_dump($data);
                    $this->load->library('encrypt');
                    $email    = $this->input->post('usr_email');
                    $password = md5($this->input->post('usr_password'));

                   
                       
                       $data['userInformations'] = $this->cp_model->getUserInfos_by($usr_id);
                        //debug($data['userInformations']);
                       foreach ($data['userInformations'] as $lign) {
                            $data['usr_id']=$lign->usr_id;
                            $data['usr_group']=$lign->usr_group;
                       }

                       $store_data_inSession = array(
                           'usr_id'  => $data['usr_id'],
                           'usr_group'  => $data['usr_group']
                       );

                      $this->session->set_userdata($store_data_inSession);

                     // debug($store_data_inSession);

                     $this->session->set_flashdata('successInsc','<br>Votre compte  HyperSHOP a été créé avec succès.  Merci !'); 

                    redirect('panier/voir-mes-commandes'); 
                
                    } else { 
                        
                       $this->load->view('home/connexion_view');

                    }        
        
    }

    public function step2()
    {      

        $this->form_validation->set_rules('usr_pseudo', 'Pseudo', 'trim|required|xss_clean');
        $this->form_validation->set_rules('usr_name', 'Nom', 'trim|required|xss_clean');
        $this->form_validation->set_rules('usr_surname', 'Prénoms', 'trim|required|xss_clean');
        $this->form_validation->set_rules('usr_email', 'Email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('usr_telephone', 'Téléphone', 'trim|required|xss_clean');
        $this->form_validation->set_rules('usr_date_naissance', 'Date de naissance', 'trim|required|xss_clean');
        $this->form_validation->set_rules('usr_nationalite', 'Nationalité', 'trim|required|xss_clean');
        $this->form_validation->set_rules('usr_adresse', 'Adresse', 'trim|required|xss_clean');
        $this->form_validation->set_rules('usr_pays', 'Pays', 'trim|required|xss_clean');
        $this->form_validation->set_rules('usr_numero_passeport', 'Numéro de passeport', 'trim|required|xss_clean');
        /*$this->form_validation->set_rules('confirmpassword', 'Confirmation de Mot de passe', 'trim|required|matches[password]');
        $this->form_validation->set_rules('password', 'Mot de passe', 'trim|required|matches[password]');*/
            
            if ($this->form_validation->run()) {

                if($this->input->post('usr_scan_passeport')){

                  $usr_id=$this->input->post('usr_id');
                        $data = array(
                                'usr_civilite' => $this->input->post('usr_civilite'),
                                'usr_pseudo' => $this->input->post('usr_pseudo'),
                                'usr_name' => $this->input->post('usr_name'),
                                'usr_surname' => $this->input->post('usr_surname'),
                                'usr_email' => $this->input->post('usr_email'),
                                'usr_telephone' => $this->input->post('usr_telephone'),
                                'usr_group' => 3,
                                'usr_date_naissance' => $this->input->post('usr_date_naissance'),
                                'usr_nationalite' => $this->input->post('usr_nationalite'),
                                'usr_adresse' => $this->input->post('usr_adresse'),
                                'usr_pays' => $this->input->post('usr_pays'),
                                'usr_numero_passeport' => $this->input->post('usr_numero_passeport'),
                                'usr_scan_passeport' => $this->input->post('usr_scan_passeport')
                        );

                    $this->dashboard_model->update_user($usr_id,$data);

                    $this->session->set_flashdata('successUpdate','<br>Votre compte  African Village a été mis à jours !'); 

                    redirect('utilisateur/espace-personnel'); 

                }

                $config['upload_path'] = './uploads/utilisateur/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                $this->load->library('encrypt');
                

                 if ( ! $this->upload->do_upload()) {

                        $this->session->set_flashdata('img_error', "<div class='alert alert-danger' id='img_error'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                        <strong>Erreur !</strong>".$this->upload->display_errors()."</div>");
                        redirect_back();
                        return FALSE;

                    } else {
                        $file_data = $this->upload->data();
                        $usr_id=$this->input->post('usr_id');
                        $data = array(
                                'usr_civilite' => $this->input->post('usr_civilite'),
                                'usr_pseudo' => $this->input->post('usr_pseudo'),
                                'usr_name' => $this->input->post('usr_name'),
                                'usr_surname' => $this->input->post('usr_surname'),
                                'usr_email' => $this->input->post('usr_email'),
                                'usr_telephone' => $this->input->post('usr_telephone'),
                                'usr_group' => 3,
                                'usr_date_naissance' => $this->input->post('usr_date_naissance'),
                                'usr_nationalite' => $this->input->post('usr_nationalite'),
                                'usr_adresse' => $this->input->post('usr_adresse'),
                                'usr_pays' => $this->input->post('usr_pays'),
                                'usr_numero_passeport' => $this->input->post('usr_numero_passeport'),
                                'usr_scan_passeport' => $file_data['file_name']
                        );

                    $this->dashboard_model->update_user($usr_id,$data);

                    $this->session->set_flashdata('successUpdate','<br>Votre compte  African Village a été mis à jours !'); 

                    redirect('utilisateur/espace-personnel'); 
                
                    }
                  } else { 
                        
                        $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
                        $this->load->view('espace_personnel_view',$data); 

                    }        
        
    }

    public function changer_pwd()
    {
       $this->form_validation->set_rules('old_password', 'Ancien mot de passe', 'trim|required|xss_clean');
       $this->form_validation->set_rules('new_passeword', 'Mot de passe', 'trim|required');
        $this->form_validation->set_rules('confirm_new_passeword', 'Confirmation de Mot de passe', 'trim|required|matches[new_passeword]');
        
            
            if ($this->form_validation->run()) {
              $this->load->library('encrypt');
                $data['user_passeword'] = $this->dashboard_model->get_user_password($this->input->post('usr_id'));
                foreach ($data['user_passeword'] as $value) {
                    $dbPwd=$value->usr_password;
                }
                if($dbPwd == $this->encrypt->sha1($this->input->post('old_password')) ){
                    $this->db->set('usr_password', $this->encrypt->sha1($this->input->post('new_passeword')), TRUE);
                    $this->db->where('usr_id', $this->input->post('usr_id'));
                    $this->db->update('users');
                    $this->session->set_flashdata('successUpdatePwd','<br>Votre mot de passe a été changé correctement.'); 
                    redirect('utilisateur/espace-personnel');
                }else{
                  $this->session->set_flashdata('EchecUpdatePwd','<br>Votre ancien mot de passe entré nest pas correct avec celui disponible dans ntre base de données.'); 
                  redirect('utilisateur/espace-personnel'); 
                }
                    } else { 
                        
                       $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
                        $this->load->view('espace_personnel_view',$data); 

                    }        
    }

    public function mot_passe_oublie()
    {
       $this->form_validation->set_rules('usr_email_retreive', 'E-mail', 'trim|required|xss_clean');
       
        
            
            if ($this->form_validation->run()) {

              $data['user_email'] = $this->dashboard_model->get_user_by_email($this->input->post('usr_email_retreive'));

              foreach ($data['user_email'] as $userEmail) {
                $userMdp = $userEmail->usr_password;
                $userEmail = $userEmail->usr_email;
                $userName = $userEmail->usr_name;
              }
                  if($userEmail==$this->input->post('usr_email_retreive')){

                     $this->load->library('email');

                    $this->email->initialize(array(
                            'protocol' => 'mail',
                            'mail_host' => 'mail.lendici.com',
                            'mail_user' => 'ne-pas-repondre@lendici.com',
                            'mail_pass' => 'lendici2017',
                            'mail_port' => 25,
                            
                            'crlf' => '\r\n',
                            'newline' => '\r\n'
                    ));
                      $this->email->set_mailtype("html");
                      $this->email->from('ne-pas-repondre@lendici.com', 'Notification AFRICAN Village');
                      $this->email->to($email);

                      $this->email->subject('AFRICAN Village - Mot de passe oublié');
                      $this->email->message("Bonjour ".$userName."<br><br>Vous avez fait la demande de l'envoie de votre mot de passe. <br> Votre mot de passe est : ".$userMdp."<br> Merci !<br><br><br>L'équipe African Village");
                       $this->email->send();


                    $this->session->set_flashdata('successRetreivePwd','<br>Votre mot de passe a été envoyé par email.');               
                   redirect('utilisateur/se-connecter');
                  }else{

                    $this->session->set_flashdata('echecRetreivePwd','<br>Votre e-mail nexiste pas dans notre base de données.'); 
                  redirect('utilisateur/se-connecter');

                  }
               } else { 
                        
               $this->load->view('connexion_view');

            }
    }

        public function sendmail($email,$token)
    {

                    $this->load->library('email');

                    $this->email->initialize(array(
                            'protocol' => 'mail',
                            'mail_host' => 'mail.lendici.com',
                            'mail_user' => 'ne-pas-repondre@lendici.com',
                            'mail_pass' => 'lendici2017',
                            'mail_port' => 25,
                            
                            'crlf' => '\r\n',
                            'newline' => '\r\n'
                    ));
                      $this->email->set_mailtype("html");
                      $this->email->from('ne-pas-repondre@lendici.com', 'Notification AFRICAN Village');
                      $this->email->to($email);

                      $this->email->subject('AFRICAN Village - Création de compte');
                      $this->email->message("<div style='background:#fafafa' bgcolor='#fafafa'><br><p>.</p>
          <table width='650' border='0' align='center' cellpadding='0' cellspacing='0' style='background:#fff;border:1px solid #ccc;color:#6c6d6d;font-family:arial,verdana;font-size:14px;line-height:24px' bgcolor='#FFF'><tbody><tr><td width='40' height='20'></td><td></td><td width='40'></td></tr><tr><td width='40' height='40'></td>
                        <td><table width='100%' border='0' cellspacing='0' cellpadding='0' style='border-bottom-color:#999;border-bottom-style:dotted;border-bottom-width:1px'><tbody><tr><td width='156' height='65'><img src='http://africanvillage.epizy.com/assets/images/logo.png' alt='LENDICI'  style='margin-right:15px;padding-bottom:8px' class='CToWUd' height='100'></td><td width='53' align='right'></td></tr></tbody></table></td><td width='40'></td></tr><tr> <td width='40' height='20'></td>
                        <td></td><td width='40'></td></tr><tr> <td></td><td style='color:#6c6d6d;font-family:arial,verdana;font-size:14px;line-height:24px'><span style='font-size:20px'></span> <br><br><strong>Salut à vous,<br>Bravo votre compte vient d'être crée sur AFRICAN Village !</strong>
                          <br><table width='85%' border='0' cellspacing='0' cellpadding='0' style='color:#6c6d6d;font-family:arial,verdana;font-size:12px'><tbody></tr><tr><p style='font-size:9px;text-align:center;'>Merci de votre confiance. <br>
                              AFRICAN Village<br>
                              Ceci est un mail automatique. Vous ne pouvez pas utiliser ce mail pour répondre.</p></tr></tbody>
                        </table>
                        <div class='yj6qo'></div>
                        <div class='adL'></div>
                    </div>");
                       $this->email->send();
    }



function checkapi(){
  $fields_string = "";
  $fields = array(
      'secret' => '6LdbnFQUAAAAAEaINKMZMo2XZL7jUAaTMH-qv8BA',
      'response' =>'$user_response'
      );

  foreach($fields as $key=>$value){
    $fields_string.= $key . '=' .$value . '&';
    $fields_string= rtrim($fields_string, '&');

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
    curl_setopt($ch, CURLOPT_POST, count($fields));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

    $result = curl_exec($ch);

    curl_close($ch);

    return jsqon_decode($result, true);


  }

  $res = post_captcha($this->input->post('g-recaptcha-response'));

  if(!$res['success']){
    echo '<p> Veuillez vous retourner pour cocher le Captcha</p>';
  }else{
    $this->step1();
  }
}
}

/* End of file home.php */
/* Location: ./application/modules/home/controllers/home.php */