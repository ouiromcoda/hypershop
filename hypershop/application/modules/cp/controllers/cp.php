<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
  
class Cp extends CI_Controller {

        public function __construct()
    {
        parent::__construct();
        $this->load->model('cp_model');
        $this->load->model('dashboard/dashboard_model');
        $this->load->library('user_agent');
    }

    function index() {
      $user = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
      if(count($user)) {
            redirect('dashboard');
      } else {
        $this->load->view('cp/new_connexion_view');  
      }
    }
    function mot_passe_oublie() {
        //$this->load->view('cp/oublie_view');
        if($this->input->server('REQUEST_METHOD') == 'GET') {
            $this->load->view('cp/oublie_view2');  
        }
        if($this->input->server('REQUEST_METHOD') == 'POST') {
            $email = $this->input->post('email_user');
            if($user = $this->dashboard_model->get_user_by_email($email)) {
                $token_password = $this->generateRandomString();
                $data_user['token_password'] = $token_password;
                $params['email_user'] = $email;
                $params['token'] = $token_password;
                $this->sendEmail2($params);
                $this->dashboard_model->update_user($user->usr_id, $data_user);
                $this->session->set_flashdata('email_sent', "Un email de réinitialisation de votre mot de passe vous a été envoyé par email.");
                redirect('mot-de-passe-oublie');
            } else {
              $data['error_message'] = 'Aucun utilisateur trouvé';
              $this->load->view('cp/oublie_view2', $data);
            }
        } 
    }

    public function changePassword() {
      if($this->input->server('REQUEST_METHOD') == 'GET') {
          $token_password = $this->input->get('token');
          $data['token_password'] = $token_password;
          $this->load->view('cp/change_password_view', $data); 
      } else {

          $this->form_validation->set_rules('password_user', 'Mot de passe', 'trim|required|xss_clean|min_length[6]');
          $this->form_validation->set_rules('password_confirmation', 'Confirmation mot de passe', 'trim|required|xss_clean|matches[password_user]');

          if($this->form_validation->run()) {
              $token_password = $this->input->post('token_password');
              if($user = $this->dashboard_model->get_user_by_token_password($token_password)) {
                  $this->load->library('encrypt');
                  $data_user['password_user'] = $this->encrypt->sha1($this->input->post('password_user'));
                  $this->dashboard_model->update_user($user->usr_id, $data_user);
                  $this->session->set_flashdata('password_changed', 'Votre mot de passe a été changé avec sucess!');
                  redirect('changer-mot-de-passe');
              } else {
                  $data['error_message'] = 'Erreur de réinitialisation du mot de passe. Veuillez réessayez plus tard.';
                  $data['token_password'] = $this->input->post('token_password');
                  $this->load->view('cp/change_password_view', $data); 
              }
          } else {
            $data['token_password'] = $this->input->post('token_password');
            $this->load->view('cp/change_password_view', $data); 
          }
      }
    }

    public function inscription() {
        $this->load->view('cp/inscription_view'); 
    }

    
    public function check() {
         $this->form_validation->set_rules('usr_email','Email','trim|required');
         $this->form_validation->set_rules('usr_password','Mot de passe','trim|required');
        
         if($this->session->userdata('usr_id')) 
          {
            if($this->session->userdata('usr_group')==1){
              redirect('dashboard');
            }else{
              redirect('utilisateur/espace-personnel');  
            }           
          }
         else
         {

           if($this->form_validation->run()==TRUE) { 
               $this->load->library('encrypt');

               $email    = $this->input->post('usr_email');
               $password = md5($this->input->post('usr_password'));

               if($this->cp_model->checkConnection($email, $password)) {
                   
                   $data['userInformations'] = $this->cp_model->getUserInfos($email, $password);
                   
                   foreach ($data['userInformations'] as $lign) {
                        $data['usr_id']=$lign->usr_id;
                        $data['usr_group']=$lign->usr_group;
                   }

                   $store_data_inSession = array(
                       'usr_id'  => $data['usr_id'],
                       'usr_group'  => $data['usr_group']
                   );

                  $this->session->set_userdata($store_data_inSession);

                  if($this->input->post('post_type')==1){
                    redirect('dashboard');
                  }else{
                    redirect('home'); 
                 }
               }
               else {
                   
                  if($this->input->post('post_type')==1){
                      $data['error_message']=' Problème de connexion :<br> - E-mail / Mot de passe incorrects ';
                      $this->load->view('dashboard/connexion_view',$data);
                    }else{
                      $data['error_message']=' Problème de connexion :<br> - E-mail / Mot de passe incorrects ';
                      $this->load->view('home/connexion_view',$data); 
                   }
                                   
               }

               
            } else {
               if($this->input->post('post_type')==1){
                    $this->load->view('dashboard/connexion_view');
                  }else{
                    $this->load->view('home/connexion_view'); 
                 }
             
            }


          } 
    }

    public function step1() {
        $this->form_validation->set_rules('name_user', 'Nom', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email_user', 'Email', 'trim|required|xss_clean|is_unique[user.email_user]');
        $this->form_validation->set_rules('password_user', 'Mot de passe', 'trim|required|xss_clean|min_length[6]');
        $this->form_validation->set_rules('password_confirmation', 'Confirmation mot de passe', 'trim|required|xss_clean|matches[password_user]');
        $this->form_validation->set_rules('id_role', 'Rôle', 'trim|required|xss_clean');
        $this->form_validation->set_rules('tnc', 'Termes de condition & confidantialité', 'trim|required|xss_clean');
        $this->form_validation->set_message('is_unique', 'Cette adresse email existe déjà.');
            
        if ($this->form_validation->run()) {

            $this->load->library('encrypt');
            $token = $this->generateRandomString();

            $data = array(
                'name_user'     => $this->input->post('name_user'),
                'email_user'    => $this->input->post('email_user'),
                'password_user' => $this->encrypt->sha1($this->input->post('password_user')),
                'id_role'       => 2, //$this->input->post('id_role'),
                'status'        => 0,
                'token'         => $token
            );

            if($usr_id = $this->dashboard_model->insert_user($data)) {
              $params = array(
                'name_user'     => $this->input->post('name_user'),
                'email_user'    => $this->input->post('email_user'),
                'password_user' => $this->input->post('password_user'),
                'token'         => $token
              );

              $this->sendEmail($params);
            }

            //$this->send($this->input->post('email_user'), $token);

            //var_dump($data);
            $this->session->set_flashdata('succes','Vous venez de créer votre compte Scash. <br>Nous vous invitons à consulter votre adresse e-mail pour l\'activation!'); 

            //redirect('cp/succes');
            redirect('cp/step1');    
                
        } else {
            $this->load->view('inscription_view');
        }        
        
    }
    public function succes() {
      $this->load->view('cp/succes_view');
    }

    function active($token) {   
        $token=$this->uri->segment(3);
        $data['token'] = $this->cp_model->checkToken($token);
        
        if ($data['token']) {
            $this->db->set('status', '1', FALSE);
            $this->db->where('token', $token);
            $this->db->update('user');
            $this->session->set_flashdata('succesActive','Votre compte est maintenant activé. <br>Veuillez vous connecter pour finaliser votre inscription !'); 
            redirect('cp/succes');
        } else {
            redirect('cp');
        }
        
    }

    function active2() {   
        $token = $this->input->get('token');
        $data['token'] = $this->cp_model->checkToken($token);
        
        if ($data['token']) {
            $this->db->set('status', '1', FALSE);
            $this->db->where('token', $token);
            $this->db->update('user');
            $this->session->set_flashdata('succesActive','Votre compte est maintenant activé. <br>Veuillez vous connecter pour finaliser votre inscription !'); 

            redirect('cp/succes');
        } else {
            redirect('cp');
        }
        
    }


    function generateRandomString($length = 25) {
      $characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < $length; $i++) {
          $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
      return $randomString;
    }
    

    function ckeckout() {
      $this->session->unset_userdata('usr_id');
      $this->session->unset_userdata('fulname');
      $this->session->unset_userdata('id_role');
      //session_destroy();
      redirect('cp', 'refresh');
        
    }



    public function sendEmail($params = array()) {
      $this->load->library('email');
      $this->email->initialize(array(
        'protocol' => 'mail',
        'mail_host' => 'imap.1and1.com',
        'mail_user' => 'ne-pas-repondre@scash-payment.com',
        'mail_pass' => 'scashNotif',
        'mail_port' => 993,
        'crlf' => 'rn',
        'newline' => 'rn'
      ));
      $this->email->set_mailtype("html");
      $this->email->from('ne-pas-repondre@scash-payment.com', 'scash-payment.com');
      $this->email->to($params['email_user']);
      $this->email->bcc('arnoldkouya@gmail.com');
      $this->email->bcc('franck.hibo@gmail.com');
      $this->email->subject('Activation de compte - SCash Payement');
      //$message = "Bonjour ".$params['name_user'] . ",\n veuillez cliquer sur le lien ci-dessous pour activer votre compte SCash.\n\n Cordialement,\n\n\n l'équipe SCash";
      
      $token = $params['token'];
      $url_activation = site_url()."cp/active2?token=$token";
      $name_user = $params['name_user'];
      $email_user = $params['email_user'];
      $password_user = $params['password_user'];

      $background_image = base_url() . 'assets/img/scash_image_bon-01.png';
      $logo_scash =  base_url() . 'assets/images/logo_scash.png';
      $captu_scash =  base_url() . 'assets/img/captu_scash.jpg';
      $url_contactez_us = site_url('nous-contacter');
      $url_documentation = base_url() . 'assets/pdf/Mode de fonctionnement SCASH PAYMENT.pdf';


      /*$message = <<< RAW_HTML
          <div style='background:#fafafa' bgcolor='#fafafa'><br><p>.</p>
              <table width='650' border='0' align='center' cellpadding='0' cellspacing='0' style='background:#fff;border:1px solid #ccc;color:#6c6d6d;font-family:arial,verdana;font-size:14px;line-height:24px' bgcolor='#FFF'><tbody><tr><td width='40' height='20'></td><td></td><td width='40'></td></tr><tr><td width='40' height='40'></td>
                        <td><table width='100%' border='0' cellspacing='0' cellpadding='0' style='border-bottom-color:#999;border-bottom-style:dotted;border-bottom-width:1px'><tbody><tr><td width='156' height='65'></td><td width='53' align='right'></td></tr></tbody></table></td><td width='40'></td></tr><tr> <td width='40' height='20'></td>
                        <td></td><td width='40'></td></tr><tr> <td></td><td style='color:#6c6d6d;font-family:arial,verdana;font-size:14px;line-height:24px'><span style='font-size:20px'></span> <br><br><strong>Salut à vous,<br>
                              Bravo votre compte vient d'être crée sur Scash !</strong> <br>Merci de cliquer sur le bouton ci-dessous pour activer votre compte et continuer votre inscription.<br>
                          <br><a href='$url_activation' style='background:#1ABB9C;border-radius:5px;color:#ffffff;display:block;font-size:23px;min-height:35px;margin-bottom:25px;padding-top:8px;text-align:center;text-decoration:none;width:200px' target='_blank'>Je confirme!</a><br>
                              </tr></tbody>
              </table>
              <div class='yj6qo'></div>
              <div class='adL'></div>
          </div>
RAW_HTML;*/

      
      $message = <<< RAW_HTML
          <table width="100%">
            <tbody><tr>
              <td bgcolor="#52BA5D" align="center" style="background: rgb(82,186,93) url($background_image) 50% 58px no-repeat">
              
                <table width="700" align="center" cellpadding="0" cellspacing="0" border="0">
                  <tbody><tr>
                    <td width="700" colspan="3" style="height:120px">
                      <table width="100%">
                        <tbody>
                        <tr>
                          <td width="40%" align="left">
                              <a href="https://www.scash-payment.com/" target="_blank">
                              <img style="width: 120px; height: 40px; margin-top: 14%;" src="$logo_scash" title="Scash-Payment" alt="Scash-Payment" class="CToWUd"></a></td>
                          <td width="60%" align="right" style="color:#ffffff;font-size:32px;font-family:Verdana" valign="middle"></td>
                        </tr>
                        </tbody>
                      </table>
                      
                    </td>
                  </tr>
                    <tr>
                      <td height="8" bgcolor="#ffffff" width="6" style="background:url(https://ci3.googleusercontent.com/proxy/IagYkYUiYiBBsyrNxc_GY0iwqZ9NR4_X424nWkhMAnOpmembazv01Dx5etMIKXjA2L9_cCwDLu7LOWs5a7AE=s0-d-e1-ft#http://www.bitrix24.ru/mailimg/new/tl.png)"></td>
                      <td height="8" bgcolor="#ffffff" width="700"></td>
                      <td height="8" bgcolor="#ffffff" width="6" style="background:url(https://ci5.googleusercontent.com/proxy/1Es5qf7s6hJp7wzxT7lfXAHqI-QhPvXO6yFUL_2kYddTUn-c78DtjsNYRNkprrqQH9iZbGyCKBUEdV1syLBS=s0-d-e1-ft#http://www.bitrix24.ru/mailimg/new/tr.png)"></td>
                    </tr>
                    <tr>
                      <td width="700" bgcolor="#ffffff" colspan="3">
                <table width="100%" cellpadding="15">
                <tbody><tr>
                <td>


            <font color="#575757" face="Calibri" style="font-size:22px;font-weight:bold">Félicitations&nbsp;<span style="color: #262626;">$name_user</span>!<br/>Votre compte Scash-Payment a été créé et est maintenant prêt à être utilisé.</font>
            <font color="" face="Calibri" style="font-size:18px">
            <p>Vous devez maintenant confirmer votre adresse e-mail afin de terminer votre inscription. Cette étape est très importante pour poursuivre votre travail avec Scash-Payment.</p>

            <p><b>Veuillez suivre ce lien pour confirmer votre adresse e-mail:</b> <br>
            <a style="color: #52BA5D;" href="$url_activation" target="_blank">$url_activation</a></p>

            <p><strong>Vos accès de connexion:</strong>
            <br>
            Identifiant: <a style="color: #52BA5D;" href="mailto:$email_user" target="_blank">$email_user</a><br>Mot de passe: $password_user</p>

            <table align="center" cellpadding="0" cellspacing="0" border="0">
              <tbody><tr>
                <td><img src="$captu_scash" width="600" class="CToWUd a6T" tabindex="0"><div class="a6S" dir="ltr" style="opacity: 0.01; left: 785.5px; top: 1161px;"><div id=":375" class="T-I J-J5-Ji aQv T-I-ax7 L3 a5q" role="button" tabindex="0" aria-label="Download attachment " data-tooltip-class="a1V" data-tooltip="Download"><div class="aSK J-J5-Ji aYr"></div></div></div></td>
              </tr>
            </tbody></table>

            <p><strong>Lire la documentation</strong></p> 
            <p>
                <a style="color: #52BA5D;" href="$url_documentation" target="_blank">Cliquer sur ce lien</a>
            </p>

            <p><b>Un doute? Une question?</b></p> 
            <p>Contactez nous: <a style="color: #52BA5D;" href="$url_contactez_us">$url_contactez_us</a></p>
            <br><br><br>
            <p>Merci et meilleures salutations,<br>
              Votre équipe Scash-Payment<br>
            </p>
            </font>

            </td>
            </tr>
            </tbody></table>
            </td>
          </tr>
          <tr>
            <td height="8" bgcolor="#ffffff" width="6" style="background:url(https://ci5.googleusercontent.com/proxy/xwtOYawaSfNnQTuZWm1a8pR2pycgdEKraLwUr0Vmq9hIgLjPGzjFQPBnJq9S5YdLQQYAabaQDw9H-Yd92rOK=s0-d-e1-ft#http://www.bitrix24.ru/mailimg/new/bl.png)"></td>
            <td height="8" bgcolor="#ffffff"></td>
            <td height="8" bgcolor="#ffffff" width="6" style="background:url(https://ci6.googleusercontent.com/proxy/mBf9txtkphFwqffKvRXHY7j50YtzPoo_GaE30ecIiEYhzRIn3nkKuuh4lm2pjsPwqmbl8-njUXG85ZrhBfT5=s0-d-e1-ft#http://www.bitrix24.ru/mailimg/new/br.png)"></td>
          </tr>
          <tr>
            <td width="700" colspan="3" height="20"></td>
          </tr>
        </tbody></table>
      </td>
    </tr>
    <tr>
     <td bgcolor="#f5f8f9" align="center" style="background:#f5f8f9" height="100">
        <table>
          <tbody><tr>
            <td width="28px"><a href="http://www.facebook.com/" target="_blank"><img alt="Facebook" src="https://ci3.googleusercontent.com/proxy/OMlJv7kc47O5awmGhQBKEBLNjKvb48MClBwjPJxYFiefHK0wG2HIdtJ0FObosxlwUMeF8DcrwZjczjet5qsD2-_WOCEURIreo6zAdNl5eVxkmA=s0-d-e1-ft#http://bitrix24.com/bitrix/templates/b24/img/icoFacebook.png" class="CToWUd"></a></td>
            <td width="2px"></td>
            <td width="28px"><a href="http://twitter.com/" target="_blank"><img alt="Twitter" src="https://ci5.googleusercontent.com/proxy/8MnPtMf9sTTnePLZLix8dBuBoD6vpM-zUj28nFagHctVFrOS0DxeJ7GGDvCZQllNV6YoDs54100_Tkih_8btP8RWmp0ZifNN__rORIztSF25=s0-d-e1-ft#http://bitrix24.com/bitrix/templates/b24/img/icoTwitter.png" class="CToWUd"></a></td>
            <td width="2px"></td>
            <td width="28px"><a href="http://www.linkedin.com/" target="_blank"><img alt="LinkedIn" src="https://ci4.googleusercontent.com/proxy/8B4aGn_GSfIXDqNP2ZYoKFnMMeWW3tjTv6oUZDzLL3d5spIOsPIxFmEXVR9Xgp1FRRV8f6TcmczkIAwgHHO7evT_h9O9kG0W8Bb66jKsGdJeJQ=s0-d-e1-ft#http://bitrix24.com/bitrix/templates/b24/img/icoLinkedin.png" class="CToWUd"></a></td>
            <td width="2px"></td>
            <td width="28px"><a href="http://www.youtube.com/" target="_blank"><img alt="YouTube" src="https://ci3.googleusercontent.com/proxy/fL5vFH0WdszfhVqrty2NSN7-mhQ4qm73MkfHcV-eXwuGn9461h2WDXEj2_LLUKPZv5ahoBMrbFRnPVuIlG82yD_pJwE545ecxVx94zkbup8y=s0-d-e1-ft#http://bitrix24.com/bitrix/templates/b24/img/icoYoutube.png" class="CToWUd"></a></td>
          </tr>
          <tr>
            <td colspan="9" align="center">
              <font color="#575757" face="Calibri" style="font-size:13px">Développé par <a href="http://www.wellibo.ci" style="color:#575757" target="_blank">Wellibo.ci</a></font>
            </td>
          </tr>
        </tbody></table>  
      </td>
    </tr>
  </tbody></table>
RAW_HTML;


      $this->email->message($message);

      $bool = $this->email->send();
      return $bool;
      
  }


  public function sendEmail2($params = array()) {
      $this->load->library('email');
      $this->email->initialize(array(
        'protocol' => 'mail',
        'mail_host' => 'imap.1and1.com',
        'mail_user' => 'ne-pas-repondre@scash-payment.com',
        'mail_pass' => 'scashNotif',
        'mail_port' => 993,
        'crlf' => 'rn',
        'newline' => 'rn'
      ));

      $this->email->set_mailtype("html");
      $this->email->from('ne-pas-repondre@scash-payment.com', 'scash-payment.com');
      $this->email->to($params['email_user']);
      $this->email->bcc('arnoldkouya@gmail.com');
      $this->email->bcc('franck.hibo@gmail.com');
      $this->email->subject('Mot de passe oublié - SCash Payement');
      
      $token = $params['token'];
      $url_renitialisation = site_url()."cp/changePassword?token=$token";

      $background_image    = base_url() . 'assets/img/scash_image_bon-01.png';
      $logo_scash          =  base_url() . 'assets/images/logo_scash.png';
      $captu_scash         =  base_url() . 'assets/img/captu_scash.jpg';
      $url_contactez_us    = site_url('nous-contacter');
      $url_documentation   = base_url() . 'assets/pdf/Mode de fonctionnement SCASH PAYMENT.pdf';
      $url_home_page_scash = site_url();

      $message = <<< RAW_HTML
          <div style='background:#fafafa' bgcolor='#fafafa'><br><p>.</p>
                        <table width='650' border='0' align='center' cellpadding='0' cellspacing='0' style='background:#fff;border:1px solid #ccc;color:#6c6d6d;font-family:arial,verdana;font-size:14px;line-height:24px' bgcolor='#FFF'><tbody><tr><td width='40' height='20'></td><td></td><td width='40'></td></tr><tr><td width='40' height='40'></td>
                         <td><table width='100%' border='0' cellspacing='0' cellpadding='0' style='border-bottom-color:#999;border-bottom-style:dotted;border-bottom-width:1px'><tbody><tr><td width='156' height='65'>
                         <img src='http://arc-nwanyo.org/assets/img/logo_long.png' alt='Tacite.be'  style='margin-right:15px;padding-bottom:8px' class='CToWUd'></td><td width='53' align='right'></td></tr></tbody></table></td><td width='40'></td></tr><tr> <td width='40' height='20'></td>
                         <td></td><td width='40'></td></tr><tr> <td></td><td style='color:#6c6d6d;font-family:arial,verdana;font-size:14px;line-height:24px'><span style='font-size:20px'></span> <br><br>
                          Bonjour , <br>
                          Vous avez oublié le mot de passe de votre compte  sur <a style="color: #52ba5d;" href="$url_home_page_scash">www.scash-payment.com</a>, veuillez cliquer ci-dessous pour réinitialiser votre mot de passe: <br>
                           <b>Cliquer sur ce lien</b> : <a href="$url_renitialisation" style="color: #52ba5d;" >Réinitialiser mon mot de passe</a>
                           <p>Ou copier et coller dans la barre d'adresse de votre navigateur: <a href="$url_renitialisation">$url_renitialisation</a></p>
                           <br>
                           En cas de besoin ou pour tout complément d'informations, notre support se tient à votre entière disposition<br>
                           <br><br><table width='100%' border='0' cellspacing='0' cellpadding='0' style='color:#6c6d6d;font-family:arial,verdana;font-size:12px'><tbody></tr><tr><p style='font-size:9px;text-align:left;'>Merci ,Votre équipe SCASH PAYMENT. <br>
                               Abidjan, Côte d'Ivoire <br>
                              06 BP 1270 ABIDJAN 06 <br>
                              Cel : + (225) 210 14 294 <br>
                               E-mail : support@scash-payment.com<br> <br>
                               Ceci est un mail automatique. Vous ne pouvez pas utiliser ce mail pour répondre. <br>
                          En cas de questions consulter notre FAQ. Vous n’y trouvez pas une réponse satisfaisante ? Contactez notre équipe par téléphone (210 14 294) toute la semaine entre 10 et 18h ou envoyez-nous un mail cette adresse: support@scash-payment.com</p></tr></tbody>
                         </table>
                         <div class='yj6qo'></div>
                         <div class='adL'></div>
                        </div>
RAW_HTML;

$message = <<< RAW_HTML
          <table width="100%">
            <tbody><tr>
              <td bgcolor="#52BA5D" align="center" style="background: rgb(82,186,93) url($background_image) 50% 58px no-repeat">
              
                <table width="700" align="center" cellpadding="0" cellspacing="0" border="0">
                  <tbody><tr>
                    <td width="700" colspan="3" style="height:120px">
                      <table width="100%">
                        <tbody>
                        <tr>
                          <td width="40%" align="left">
                              <a style="color: #52ba5d;" href="https://www.scash-payment.com/" target="_blank">
                              <img style="width: 120px; height: 40px; margin-top: 14%;" src="$logo_scash" title="Scash-Payment" alt="Scash-Payment" class="CToWUd"></a></td>
                          <td width="60%" align="right" style="color:#ffffff;font-size:32px;font-family:Verdana" valign="middle"></td>
                        </tr>
                        </tbody>
                      </table>
                      
                    </td>
                  </tr>
                    <tr>
                      <td height="8" bgcolor="#ffffff" width="6" style="background:url(https://ci3.googleusercontent.com/proxy/IagYkYUiYiBBsyrNxc_GY0iwqZ9NR4_X424nWkhMAnOpmembazv01Dx5etMIKXjA2L9_cCwDLu7LOWs5a7AE=s0-d-e1-ft#http://www.bitrix24.ru/mailimg/new/tl.png)"></td>
                      <td height="8" bgcolor="#ffffff" width="700"></td>
                      <td height="8" bgcolor="#ffffff" width="6" style="background:url(https://ci5.googleusercontent.com/proxy/1Es5qf7s6hJp7wzxT7lfXAHqI-QhPvXO6yFUL_2kYddTUn-c78DtjsNYRNkprrqQH9iZbGyCKBUEdV1syLBS=s0-d-e1-ft#http://www.bitrix24.ru/mailimg/new/tr.png)"></td>
                    </tr>
                    <tr>
                      <td width="700" bgcolor="#ffffff" colspan="3">
                <table width="100%" cellpadding="15">
                <tbody><tr>
                <td>


            <font color="#575757" face="Calibri" style="font-size:22px;font-weight:bold">Bonjour, une demande de réinitialisation a été effectuée sur votre compte Scash-Payment (www.scash-payment.com).<br/></font>
            <font color="" face="Calibri" style="font-size:18px">
            <p>Veuillez cliquer ci-dessous pour réinitialiser votre mot de passe: <br>
               <b>Cliquer sur ce lien</b> : <a style="color: #52ba5d;" href="$url_renitialisation">Réinitialiser mon mot de passe</a>
            <p>Ou copier et coller dans la barre d'adresse de votre navigateur: $url_renitialisation</p>
            </p>
            <br/>
            
            <p><b>Un doute? Une question?</b></p> 
            <p>Contactez nous: <a style="color: #52BA5D;" href="$url_contactez_us">$url_contactez_us</a></p>
            <br><br><br>
            <p>Merci et meilleures salutations,<br>
              Votre équipe Scash-Payment<br>
            </p>
            </font>

            </td>
            </tr>
            </tbody></table>
            </td>
          </tr>
          <tr>
            <td height="8" bgcolor="#ffffff" width="6" style="background:url(https://ci5.googleusercontent.com/proxy/xwtOYawaSfNnQTuZWm1a8pR2pycgdEKraLwUr0Vmq9hIgLjPGzjFQPBnJq9S5YdLQQYAabaQDw9H-Yd92rOK=s0-d-e1-ft#http://www.bitrix24.ru/mailimg/new/bl.png)"></td>
            <td height="8" bgcolor="#ffffff"></td>
            <td height="8" bgcolor="#ffffff" width="6" style="background:url(https://ci6.googleusercontent.com/proxy/mBf9txtkphFwqffKvRXHY7j50YtzPoo_GaE30ecIiEYhzRIn3nkKuuh4lm2pjsPwqmbl8-njUXG85ZrhBfT5=s0-d-e1-ft#http://www.bitrix24.ru/mailimg/new/br.png)"></td>
          </tr>
          <tr>
            <td width="700" colspan="3" height="20"></td>
          </tr>
        </tbody></table>
      </td>
    </tr>
    <tr>
     <td bgcolor="#f5f8f9" align="center" style="background:#f5f8f9" height="100">
        <table>
          <tbody><tr>
            <td width="28px"><a href="http://www.facebook.com/" target="_blank"><img alt="Facebook" src="https://ci3.googleusercontent.com/proxy/OMlJv7kc47O5awmGhQBKEBLNjKvb48MClBwjPJxYFiefHK0wG2HIdtJ0FObosxlwUMeF8DcrwZjczjet5qsD2-_WOCEURIreo6zAdNl5eVxkmA=s0-d-e1-ft#http://bitrix24.com/bitrix/templates/b24/img/icoFacebook.png" class="CToWUd"></a></td>
            <td width="2px"></td>
            <td width="28px"><a href="http://twitter.com/" target="_blank"><img alt="Twitter" src="https://ci5.googleusercontent.com/proxy/8MnPtMf9sTTnePLZLix8dBuBoD6vpM-zUj28nFagHctVFrOS0DxeJ7GGDvCZQllNV6YoDs54100_Tkih_8btP8RWmp0ZifNN__rORIztSF25=s0-d-e1-ft#http://bitrix24.com/bitrix/templates/b24/img/icoTwitter.png" class="CToWUd"></a></td>
            <td width="2px"></td>
            <td width="28px"><a href="http://www.linkedin.com/" target="_blank"><img alt="LinkedIn" src="https://ci4.googleusercontent.com/proxy/8B4aGn_GSfIXDqNP2ZYoKFnMMeWW3tjTv6oUZDzLL3d5spIOsPIxFmEXVR9Xgp1FRRV8f6TcmczkIAwgHHO7evT_h9O9kG0W8Bb66jKsGdJeJQ=s0-d-e1-ft#http://bitrix24.com/bitrix/templates/b24/img/icoLinkedin.png" class="CToWUd"></a></td>
            <td width="2px"></td>
            <td width="28px"><a href="http://www.youtube.com/" target="_blank"><img alt="YouTube" src="https://ci3.googleusercontent.com/proxy/fL5vFH0WdszfhVqrty2NSN7-mhQ4qm73MkfHcV-eXwuGn9461h2WDXEj2_LLUKPZv5ahoBMrbFRnPVuIlG82yD_pJwE545ecxVx94zkbup8y=s0-d-e1-ft#http://bitrix24.com/bitrix/templates/b24/img/icoYoutube.png" class="CToWUd"></a></td>
          </tr>
          <tr>
            <td colspan="9" align="center">
              <font color="#575757" face="Calibri" style="font-size:13px">Développé par <a href="http://www.wellibo.ci" style="color:#575757" target="_blank">Wellibo.ci</a></font>
            </td>
          </tr>
        </tbody></table>  
      </td>
    </tr>
  </tbody></table>
RAW_HTML;

      $this->email->message($message);

      $bool = $this->email->send();
      return $bool;
      
  }




  function sendForgetPassword() {
       $this->form_validation->set_rules('email_user', 'E-mail', 'trim|required|xss_clean');
            
            if ($this->form_validation->run()) {

                $email=$this->input->post('email_user');
                $data['single_password'] = $this->dashboard_model->check_user_forget_mdp($email);
                foreach ($data['single_password'] as $key => $value) {
                  $mdp=$value->password_user;
                }

                    if ($data['single_password']) {
                        $data['single_password'] = $this->dashboard_model->check_user_forget_mdp($email);

                        $this->load->library('email');

                    $this->email->initialize(array(
                            'protocol' => 'mail',
                            'mail_host' => 'mail.arc-nwanyo.org',
                            'mail_user' => 'arcinfo@arc-nwanyo.org',
                            'mail_pass' => '06256091KWA1',
                            'mail_port' => 25,
                            
                            'crlf' => '\r\n',
                            'newline' => '\r\n'
                    ));
                     
                      $this->email->set_mailtype("html");
                      $this->email->from('arcinfo@arc-nwanyo.org', 'Equipe ARC NWANYO');
                      $this->email->to($email);
                      $this->email->subject('Mot de passe oublié  - ARC NWANYO');
                      $this->email->message("<div style='background:#fafafa' bgcolor='#fafafa'><br><p>.</p>
                        <table width='650' border='0' align='center' cellpadding='0' cellspacing='0' style='background:#fff;border:1px solid #ccc;color:#6c6d6d;font-family:arial,verdana;font-size:14px;line-height:24px' bgcolor='#FFF'><tbody><tr><td width='40' height='20'></td><td></td><td width='40'></td></tr><tr><td width='40' height='40'></td>
                         <td><table width='100%' border='0' cellspacing='0' cellpadding='0' style='border-bottom-color:#999;border-bottom-style:dotted;border-bottom-width:1px'><tbody><tr><td width='156' height='65'><img src='http://arc-nwanyo.org/assets/img/logo_long.png' alt='Tacite.be'  style='margin-right:15px;padding-bottom:8px' class='CToWUd'></td><td width='53' align='right'></td></tr></tbody></table></td><td width='40'></td></tr><tr> <td width='40' height='20'></td>
                         <td></td><td width='40'></td></tr><tr> <td></td><td style='color:#6c6d6d;font-family:arial,verdana;font-size:14px;line-height:24px'><span style='font-size:20px'></span> <br><br>
                          Salut , <br>
                          Vous avez oublié le mot de passe de votre compte  sur www.arc-nwanyo.org, ci-dessous le mot de passe : <br>
                           <b>Vous Mot de passe</b> : (".$mdp.")<br>
                          En cas de besoin ou pour tout complément d'informations, notre support se tient à votre entière disposition<br>
                           <br><br><table width='85%' border='0' cellspacing='0' cellpadding='0' style='color:#6c6d6d;font-family:arial,verdana;font-size:12px'><tbody></tr><tr><p style='font-size:9px;text-align:left;'>Merci ,Votre équipe ARC NWANYO. <br>
                               Abidjan, Côte d'Ivoire <br>
                              06 BP 1270 ABIDJAN 06 <br>
                              Cel : + (225) 210 14 294 <br>
                               E-mail : support@arc-nwanyo.org<br> <br>
                               Ceci est un mail automatique. Vous ne pouvez pas utiliser ce mail pour répondre. <br>
                          En cas de questions consulter notre FAQ. Vous n’y trouvez pas une réponse satisfaisante ? Contactez notre équipe par téléphone (210 14 294) toute la semaine entre 10 et 18h ou envoyez-nous un mail cette adresse: support@arc-nwanyo.org</p></tr></tbody>
                         </table>
                         <div class='yj6qo'></div>
                         <div class='adL'></div>
                        </div>");
                       $this->email->send();
                      
                      $data['exist']='E-mail envoyé contenant votre mot de passe!';
                      $this->load->view('cpmessage_mdp_view',$data);

                    }else{
                      $data['dont_exist']='E-mail non existant dans notre base de donnée!'; 
                      $this->load->view('cpmessage_mdp_view',$data);
                    }

            }else {
              $this->load->view('cpforget_mdp_view'); 
            }


      
    }




    function send($email,$token) {
                    $this->load->library('email');

                    $this->email->initialize(array(
                            'protocol' => 'mail',
                                'mail_host' => 'mail.wellibo.ci',
                                'mail_user' => 'info@wellibo.ci',
                                'mail_pass' => 'Arnold10!',
                                'mail_port' => 25,
                            
                            'crlf' => '\r\n',
                            'newline' => '\r\n'
                  ));
                  $this->email->set_mailtype("html");
                  $this->email->from('info@wellibo.ci', 'Equipe Scash');
                  $this->email->to($email);
                  $this->email->subject('Scash - Confirmation de votre inscription');
                  $this->email->message("<div style='background:#fafafa' bgcolor='#fafafa'><br><p>.</p>
                      <table width='650' border='0' align='center' cellpadding='0' cellspacing='0' style='background:#fff;border:1px solid #ccc;color:#6c6d6d;font-family:arial,verdana;font-size:14px;line-height:24px' bgcolor='#FFF'><tbody><tr><td width='40' height='20'></td><td></td><td width='40'></td></tr><tr><td width='40' height='40'></td>
                        <td><table width='100%' border='0' cellspacing='0' cellpadding='0' style='border-bottom-color:#999;border-bottom-style:dotted;border-bottom-width:1px'><tbody><tr><td width='156' height='65'></td><td width='53' align='right'></td></tr></tbody></table></td><td width='40'></td></tr><tr> <td width='40' height='20'></td>
                        <td></td><td width='40'></td></tr><tr> <td></td><td style='color:#6c6d6d;font-family:arial,verdana;font-size:14px;line-height:24px'><span style='font-size:20px'></span> <br><br><strong>Salut à vous,<br>
                              Bravo votre compte vient d'être crée sur Scash !</strong> <br>Merci de cliquer sur le bouton ci-dessous pour activer votre compte et continuer votre inscription.<br>
                          <br><a href='http://sellercenter.tacite.be/cp/active/".$token."' style='background:#1ABB9C;border-radius:5px;color:#ffffff;display:block;font-size:23px;min-height:35px;margin-bottom:25px;padding-top:8px;text-align:center;text-decoration:none;width:200px' target='_blank'>Je confirme!</a><br>
                    </div>");
                    $this->email->send();
    }
    



}

/* End of file compte.php */
/* Location: ./application/modules/compte/controllers/compte.php */
