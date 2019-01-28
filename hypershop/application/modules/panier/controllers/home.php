<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'helpers/vendor/autoload.php'; 
class Home extends CI_Controller {
		
	public function __construct ()
	{
		parent::__construct();
		//load model -> model_products 
		$this->load->model('model_products');
		$this->load->model('model_settings');
		$this->load->model('model_orders');
		$this->load->model('dashboard/dashboard_model');
	}

	public function index()
	{	
		$data['get_sitename'] = $this->model_settings->sitename_settings();
		$data['get_footer'] = $this->model_settings->footer_settings();	
		$data['products'] = $this->model_products->all_products();	//this all_products from model 
		$data['starts'] = $this->model_products->dis_products();
		$this->load->view('home/home_view',$data); //this $data from model inside class model_products
		
		
		
	}
	
	public function showme($pro_name)
	{		
			$data['get_sitename'] = $this->model_settings->sitename_settings();
			$data['get_footer'] = $this->model_settings->footer_settings();	
			$data['starts'] = $this->model_products->dis_products();
			$data['comes'] = $this->model_products->showme($pro_name); //for showme function in home/showme
			$this->load->view('this_products',$data);
	}
	
	public function add_to_cart($pro_id)
	{
		$product = $this->model_products->find($pro_id);
		$data = array(
						'id'      => $product->pro_id,
						'qty'     => 1,
						'price'   => $product->pro_price,
						'name'    => $product->pro_name,
						'title'	  => $product->pro_title,
						'slug'	  => $product->pro_slug,
						'pro_image' => $product->pro_image,
						'id_cat' => $product->id_cat
						);
		
		$result = $this->cart->insert($data);	

		//echo json_encode($result);
		$this->session->set_flashdata('succes','Produit ajoutée dans votre panier !');
		redirect('home');
	
		
	}

	public function update_commande($rowid,$qty)
	{
		header("Access-Control-Allow-Origin: *");
        $cart=$this->cart->contents();

        foreach ($cart as $cart) {		
		//now match your item whose qty is updated
          if($rowid==$cart['rowid']){
        		$qty=$cart['qty'];
          }
        }
//var_dump($cart);
      $datag=array(
            'rowid'=>$rowid,
            'qty'=>$qty
            );
      $data=$this->cart->update($datag);
      echo json_encode(array('result'=>$data));
	}



	public function addpanier($pro_id,$qty)
	{
		
		header("Access-Control-Allow-Origin: *");
        $product = $this->model_products->find($pro_id);
		$data = array(
						'id'      => $product->pro_id,
						'qty'     => $qty,
						'price'   => $product->pro_price,
						'name'    => $product->pro_name,
						'title'	  => $product->pro_title,
						'slug'	  => $product->pro_slug,
						'pro_image' => $product->pro_image,
						'id_cat' => $product->id_cat
						);
		
		$result = $this->cart->insert($data);

		echo json_encode(array('result'=>$data));
	}

	
	public function cart()
	{
		$data['get_sitename'] = $this->model_settings->sitename_settings();
		$data['get_footer'] = $this->model_settings->footer_settings();	
		$this->load->view('show_cart',$data);	
		
	}//view inside cart
	
	public function clear_cart()
	{
		$this->cart->destroy();
		redirect(base_url());
	}


	public function clear_one_item($rowid,$page)
	{
		$data = array(
            'rowid'   => $rowid,
            'qty'     => 0
        );

        $this->cart->update($data);

        if($page==1){
        	$this->session->set_flashdata('remove','Produit supprimé de votre panier !');
        	redirect(site_url('home'));
        }
        if($page==2){
        	$this->session->set_flashdata('remove','Produit supprimé de votre panier !');
        	redirect(site_url('panier/voir-mes-commandes'));
        }
        //var_dump($data);
		//$this->cart->destroy();
		
	}

	function removeCartItem($rowid) {   
        $data = array(
            'rowid'   => $rowid,
            'qty'     => 0
        );

        $this->cart->update($data);

}

	function details_produit($pro_slug)
	{
		  $data['single_product'] = $this->model_products->get_product($pro_slug);
	      if ($data['single_product']) {
	        $data['products'] = $this->model_products->all_products();
	        $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
	        $data['single_product'] = $this->model_products->get_product($pro_slug);
	        $data['categories'] = $this->dashboard_model->get_all_prod_cat();
	        $this->load->view('home/details_pro_view',$data); 
	      }else{
	        redirect('notre-store');
	      } 
	}
	
	public function report($pro_id)
	{
		$product = $this->model_products->find($pro_id);
		
		if($this->session->userdata('group')	!=	('2' ||'3'))
		{
			$group_usr = Gost;
			$name_usr = Gost;	
		}else{
				$group_usr = $this->session->userdata('group');
				$name_usr = $this->session->userdata('username');
			}
		
		
		
		$report_products = array
		(
			'rep_id_product'			=> $product->pro_id,
			'rep_name'					=> $product->pro_name,
			'rep_title_product'			=> $product->pro_title,
			'rep_usr_name'				=> $name_usr,
			'rep_usr_group'				=> $group_usr
		);
		$this->model_products->report($report_products);
		redirect(base_url());
		
	}
	function redi_payement_gateway()
	{
		//echo "Retour after payment";
				$invoice = array(
				'data'		=>	date('Y-m-d H:i:s'),
				'due_date'	=>	date('Y-m-d H:i:s',mktime(date('H'),date('i'),date('s'),date('m'),date('d') + 1,date('Y'))),
				'user_id'	=> $this->session->userdata('usr_id'),
				'status'	=>	'commande'
				);
				$this->db->insert('invoices',$invoice);
				$invoice_id = $this->db->insert_id();
				//here for put ordered items in orders table
				$tokenPrint= $this->generateRandomString();
				foreach ($this->cart->contents() as $item)
				{
					$data = array(
								'invoice_id'		=> $invoice_id,
								'product_id'		=> $item['id'],
								'product_type'		=> $item['name'],
								'product_title'		=> $item['title'],
								'qty'				=> $item['qty'],
								'price'				=> $item['price'],
								'token_print'				=> $tokenPrint
								
								 );
					$this->db->insert('orders',$data);
				}

				$this->cart->destroy();
				//$getting = file_get_contents(base_url().'panier/retour-paiement/?order_id=&status_id=&transaction_id');
				/*$getting = file_get_contents('http://africanvillage.epizy.com/panier/retour-paiement?transaction_id=52807744&order_id=AF201804280438OR&status_id=1&wallet=orange_money_ci&transaction_amount=25000.00&currency=XOF&paid_transaction_amount=25000.0&paid_currency=XOF&change_rate=1.0&id=');
              $json=json_encode($getting);
              $data['response'] = json_decode($json);
              
              var_dump($data['response']);*/
              //$this->load->view('home/paiement_effectue_view',$data);

              

	}

	function payer()
	{
		if($this->session->userdata('usr_id')){

				if($_POST){

				$amount=$this->input->post('order');
				$auth_token=$this->input->post('auth_token');

				$service_url = 'http://crossroadtest.net:6968';
				$curl = curl_init($service_url.'/order');
				curl_setopt($curl, CURLOPT_POSTFIELDS, '{
						"auth": {
							"currency": "xof",
							"operation_token": "a051d3d0-c35b-4f15-a59c-854f2f041728",
							"transaction_amount": "'.$amount.'",
							"jwt": "'.$auth_token.'"
							}
					}');

				curl_setopt($curl, CURLOPT_POST, 1);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($curl, CURLOPT_VERBOSE, 1);
				curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
				$reponse_in_json = curl_exec($curl);
				curl_close($curl);
				//return $reponse_in_json;
				echo $auth_token;
				var_dump(json_decode($reponse_in_json));

			/*	$invoice = array(
				'data'		=>	date('Y-m-d H:i:s'),
				'due_date'	=>	date('Y-m-d H:i:s',mktime(date('H'),date('i'),date('s'),date('m'),date('d') + 1,date('Y'))),
				'user_id'	=> $this->session->userdata('usr_id'),
				'status'	=>	'paye'
				);
				$this->db->insert('invoices',$invoice);
				$invoice_id = $this->db->insert_id();
				//here for put ordered items in orders table
				$tokenPrint= $this->generateRandomString();
				foreach ($this->cart->contents() as $item)
				{
					$data = array(
								'invoice_id'		=> $invoice_id,
								'product_id'		=> $item['id'],
								'product_type'		=> $item['name'],
								'product_title'		=> $item['title'],
								'qty'				=> $item['qty'],
								'price'				=> $item['price'],
								'token_print'				=> $tokenPrint
								
								 );
					$this->db->insert('orders',$data);
				}

				$this->cart->destroy();*/
				//var_dump(json_decode($reponse_in_json));
				//redirect('panier/paiement-effectue');
				}else{
					redirect('panier/voir-mes-commandes','refresh');
				}
			}else{
				redirect('utilisateur/se-connecter','refresh');
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

/*Paiement Function*/
    public function retour()
    {
    	
		    if (isset($_POST['cpm_trans_id'])) {
		    // SDK PHP de CinetPay
		   	//require_once '/modules/home/views/pay/cinetpay.php';
		   	 require_once APPPATH.'modules/home/views/pay/cinetpay.php';
           // require_once __DIR__ . 'modules/home/views/pay/commande.php';
		    try {
		        $id_transaction = $_POST['cpm_trans_id'];
		        $apiKey = "173450395b4734073656d1.28965845";
                $site_id ="410521";

		        $plateform = "TEST"; // Valorisé à PROD si vous êtes en production
		        $version = "V2"; // Valorisé à V1 si vous voulez utiliser la version 1 de l'api
		        $CinetPay = new CinetPay($site_id, $apiKey, $plateform, $version);
		        // Reprise exacte des bonnes données chez CinetPay
		        $CinetPay->setTransId($id_transaction)->getPayStatus();
		        $cpm_site_id = $CinetPay->_cpm_site_id;
		        $signature = $CinetPay->_signature;
		        $cpm_amount = $CinetPay->_cpm_amount;
		        $cpm_trans_id = $CinetPay->_cpm_trans_id;
		        $cpm_custom = $CinetPay->_cpm_custom;
		        $cpm_currency = $CinetPay->_cpm_currency;
		        $cpm_payid = $CinetPay->_cpm_payid;
		        $cpm_payment_date = $CinetPay->_cpm_payment_date;
		        $cpm_payment_time = $CinetPay->_cpm_payment_time;
		        $cpm_error_message = $CinetPay->_cpm_error_message;
		        $payment_method = $CinetPay->_payment_method;
		        $cpm_phone_prefixe = $CinetPay->_cpm_phone_prefixe;
		        $cel_phone_num = $CinetPay->_cel_phone_num;
		        $cpm_ipn_ack = $CinetPay->_cpm_ipn_ack;
		        $created_at = $CinetPay->_created_at;
		        $updated_at = $CinetPay->_updated_at;
		        $cpm_result = $CinetPay->_cpm_result;
		        $cpm_trans_status = $CinetPay->_cpm_trans_status;
		        $cpm_designation = $CinetPay->_cpm_designation;
		        $buyer_name = $CinetPay->_buyer_name;
		        if ($cpm_result == '00') {
		        	$data["numeros"] = explode(",", $cpm_custom);

		            echo 'Felicitation, votre paiement a été effectué avec succès';

		     	      $code = rand();
						$msg=urlencode("Bravo, nous avons reçu votre paiement. Pour récupérer votre marchandise, veuillez présenter ce code : ".$code. "Merci !");
						$numero=urlencode($data["numeros"][1]);
						$invoice = array(
							'data'		=>	date('Y-m-d H:i:s'),
							'due_date'	=>	date('Y-m-d H:i:s',mktime(date('H'),date('i'),date('s'),date('m'),date('d') + 1,date('Y'))),
							'user_id'	=> $this->session->userdata('usr_id'),
							'status'	=>	'paye_nonlivre',
							'codepikup'	=>	$code,
							'id_magasin'	=>	$data["numeros"][0],
							'numero_pickup'	=>	$data["numeros"][1],
							'type_paid'	=>	1,
							'method_pay'	=> $payment_method
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
										'price'				=> $item['price'],
										'total'				=> $item['qty']*$item['price']
										
										 );
							$this->db->insert('orders',$data);

								$pro_stock= $this->model_products->getStockLeftProduct($item['id']);
							     $newStock = $pro_stock - $item['qty'];
							     $this->db->set('pro_stock',$newStock, TRUE);
							     $this->db->where('pro_id', $item['id']);
							     $this->db->update('products');
						}
						

						$this->sendSMS($msg,$numero);
						
						$this->cart->destroy();

						$this->session->set_flashdata('valide','Merci pour votre achat. Prière aller récupérer votre marchandise avec le code que vous avez reçu en SMS!');
						redirect('panier/voir-mes-commandes');

		        } else {
		            $this->session->set_flashdata('error','Échec de la commande de votre commande! , Veuillez réessayer');
					redirect('panier/voir-mes-commandes');
		        }
		    } catch (Exception $e) {
		        echo "Erreur :" . $e->getMessage();
		    }
		} else {
		    header('Location: /');
		    die();
		}




    }
    public function notify()
    {
    	echo "notify";
    }
    public function annuler()
    {
    	echo "annuler";
    }

    public function sendSMS($message,$numero)
		{
			$login = 'admin';
			$password = 'admin';
			$url = "https://api.hypersmspro.com/api/addOneSms?Code=CMPT120180710153044&Sender=HyperSHOP&Sms=$message&Dest=$numero";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL,$url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
			$result = curl_exec($ch);
			curl_close($ch);  
			echo($result);
		}
   

   public function odoooo()
   {
   	$pro_stock= $this->model_products->getStockLeftProduct("2");
     echo $pro_stock;
     $this->db->set('pro_stock',2, TRUE);
     $this->db->where('pro_id', 2);
     $this->db->update('products');
   }

   function details_categorie($slug_cat)
	{
		  $data['single_categorie'] = $this->model_products->get_product_cat($slug_cat);
	      if ($data['single_categorie']) {
	        $data['products'] = $this->model_products->all_products();
	        $data['user_connected'] = $this->dashboard_model->get_user($this->session->userdata('usr_id'));
	        $data['single_categorie'] = $this->model_products->get_product_cat($slug_cat);
	        $data['categories'] = $this->dashboard_model->get_all_prod_cat();
	        $this->load->view('home/details_cat_view',$data); 
	      }else{
	        redirect('notre-store');
	      } 
	}
  }
