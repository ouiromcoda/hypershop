<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'helpers/vendor/cinetpay/cinetpay-php/src/CinetPay/Cinetpay.php'; 

class Order extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		
		/*if(!$this->session->userdata('username'))
		{
			redirect('login');
		}*/
		$this->load->model('model_settings');
		$this->load->model('model_orders');
		$this->load->model('model_users');
		$this->load->model('dashboard/dashboard_model');
		$this->load->model('model_customer');
	}
	
	public function index()
	{
		
		$is_processed = $this->model_orders->process();
		if($is_processed)
		{
			$this->cart->destroy();
			redirect('order/success');
		}else{
				$this->session->set_flashdata('error','Failed To Processed Your Order ! , please try again');
				redirect('home/cart');
			
		}
	}
	
	public function success()
	{
		$data['get_sitename'] = $this->model_settings->sitename_settings();
		$data['get_footer'] = $this->model_settings->footer_settings();	
	
		$this->load->view('order_success',$data);
			
	}

	public function vcommande(){
		$order="Hyper".date('Ymdmi')."SHOP";
		$data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
		$data['at'] = json_decode($this->get_auth_token($order));
		$data['order'] = $order;
		$data['categories'] = $this->dashboard_model->get_all_prod_cat();
		$data['magasins'] = $this->dashboard_model->get_all_magasin();
		/*echo "<pre>";
		print_r($data['at']);
			echo "</pre>";
		
		//*/$this->load->view('home/panier_view',$data);
	}
	public function paiement_effectue(){
		$data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
		
		$this->load->view('home/paiement_effectue_view',$data);
	}
	public function print_recu(){
		$this->load->helper('pdf_helper');
		$data['UserInvoiceInfo'] = $this->model_customer->getUserInfoInvoice($this->session->userdata('usr_id'));
		$this->load->view('home/recu_view');
	}


	 function get_auth_token($order)
    {	
		//$order="dfghjk";
		$service_url = 'http://crossroadtest.net:6968';
		$curl = curl_init($service_url.'/service/auth');
		curl_setopt($curl, CURLOPT_POSTFIELDS, '{
				"auth": {
					"name": "AFRICANVILLAGE",
					"authentication_token": "01ccd7f3ddf28f0bf3a3ef464e268573",
					"order": "'.$order.'"
					}
			}');
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_VERBOSE, 1);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
		$reponse_in_json = curl_exec($curl);
		curl_close($curl);
		return $reponse_in_json;
    }


    	function payer()
		{
			if($this->session->userdata('usr_id')){

					if($_POST){

						//Ici pour créer une nouvelle facture
						$code = rand();
						$msg=urlencode("Bravo, nous avons reçu votre paiement. Pour récupérer votre marchandise, veuillez présenter ce code : ".$code. "Merci !");
						$numero=urlencode($this->input->post('numero_pickup'));
						$invoice = array(
							'data'		=>	date('Y-m-d H:i:s'),
							'due_date'	=>	date('Y-m-d H:i:s',mktime(date('H'),date('i'),date('s'),date('m'),date('d') + 1,date('Y'))),
							'user_id'	=> $this->session->userdata('usr_id'),
							'status'	=>	'commande',
							'codepikup'	=>	$code,
							'id_magasin'	=>	$this->input->post('id_magasin'),
							'numero_pickup'	=>	$numero
							);
						$this->db->insert('invoices',$invoice);

						$invoice_id = $this->db->insert_id();

						//ici pour mettre les articles commandés dans la table des commandes
						foreach ($this->cart->contents() as $item)
						{
							$data = array(
										'invoice_id'		=> $invoice_id,
										'product_id'		=> $item['id'],
										'product_type'		=> $item['name'],
										'product_title'		=> $item['title'],
										'qty'				=> $item['qty'],
										'price'				=> $item['price']
										
										 );
							$this->db->insert('orders',$data);
						}
						

						$this->sendSMS($msg,$numero);
						
						$this->cart->destroy();

						$this->session->set_flashdata('valide','Merci pour votre achat. Prière aller récupérer votre marchandise avec le code que vous avez reçu en SMS!');
						redirect('panier/voir-mes-commandes');

						}else{
							$this->session->set_flashdata('error','Échec de la commande de votre commande! , Veuillez réessayer');
							redirect('panier/voir-mes-commandes');
						}

				}else{
					redirect('utilisateur/se-connecter','refresh');
				}
			
			
		}

		public function sendSMS($message,$numero)
		{
			$login = 'admin';
			$password = 'admin';
			$url = "http://api.hypersmspro.com/api/addOneSms?Code=CMPT120180710153044&Sender=HyperSHOP&Sms=$message&Dest=$numero";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL,$url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
			$result = curl_exec($ch);
			curl_close($ch);  
			echo($result);
		}
	
	
}//end  class