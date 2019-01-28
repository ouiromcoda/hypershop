<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Odooconnector extends CI_Controller {

	public function index()
	{
		/*include('libraries/xmlrpc/lib/xmlrpc.inc.php');
		include('libraries/xmlrpc/lib/xmlrpcs.inc.php');*/

		/*require_once APPPATH.'libraries/lib/xmlrpc.inc.php';
		require_once APPPATH.'libraries/lib/xmlrpcs.inc.php';*/


		echo include("libraries/lib/xmlrpc.inc.php");
		include("libraries/lib/xmlrpcs.inc.php");
		$GLOBALS['xmlrpc_internalencoding']='UTF-8';

		$user = 'admin';
		$password = 'mY5up3rPwd';
		$dbname = 'test';

		$server_url = 'http://192.168.1.120:8069'; 
		$connexion = new xmlrpc_client($server_url . "/xmlrpc/common");
		$connexion->setSSLVerifyPeer(0);

		$c_msg = new xmlrpcmsg('login');
		$c_msg->addParam(new xmlrpcval($dbname, "string"));
		$c_msg->addParam(new xmlrpcval($user, "string"));
		$c_msg->addParam(new xmlrpcval($password, "string"));
		$c_response = $connexion->send($c_msg);

		if ($c_response->errno != 0){
		    echo  '<p>error : ' . $c_response->faultString() . '</p>';
		}
		else{
		    
		    $uid = $c_response->value()->scalarval();

		    $val = array ( 
		        "name"    => new xmlrpcval("Godin Thierry", "string"),
		        "street"  => new xmlrpcval("Au fond à gauche", "string"),
		        "city"    => new xmlrpcval("Marne la Vallée", "string"),
		        "zip"     => new xmlrpcval("77000", "string"),
		        "website" => new xmlrpcval("http://www.lapinmoutardepommedauphine.com", "string"),
		        "lang"    => new xmlrpcval("fr_FR", "string"),
		        "tz"      => new xmlrpcval("Europe/Paris", "string"),
		        ); 
		    
		    $client = new xmlrpc_client($server_url . "/xmlrpc/object");
		    $client->setSSLVerifyPeer(0);

		    $msg = new xmlrpcmsg('execute'); 
		    $msg->addParam(new xmlrpcval($dbname, "string")); 
		    $msg->addParam(new xmlrpcval($uid, "int")); 
		    $msg->addParam(new xmlrpcval($password, "string")); 
		    $msg->addParam(new xmlrpcval("res.partner", "string")); 
		    $msg->addParam(new xmlrpcval("create", "string")); 
		    $msg->addParam(new xmlrpcval($val, "struct")); 
		    $response = $client->send($msg);
		    
		    echo 'Partner created - partner_id = ' . $response->value()->scalarval();
}

		
	}
}

/* End of file odooconnecter.php */
/* Location: ./application/modules/odooconnector/controllers/odooconnecter.php */