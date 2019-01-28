<?php
//Comment this two lines if you are in production
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/cinetpay.php';
require_once __DIR__ . '/commande.php';


$commande = new Commande();
try {
    //transaction id
    $id_transaction = Cinetpay::generateTransId();
    // Payment description
    $description_du_paiement = "Mon produit de ref: $id_transaction";
    // Payment Date must be on date format
    $date_transaction = date("Y-m-d H:i:s");
    // Amount
    $montant_a_payer = $_POST['cpm_amount'];

    $identifiant_du_payeur = 'payeur@domaine.ci';


    //Blanche met ici  ton apiKey et ton side_id
 
    $apiKey = "173450395b4734073656d1.28965845";
    
    //Serge met ici  ton site_id
    $site_id ="410521";
      
    $plateform = "TEST";

    //la version ,  utilisé V1 si vous voulez utiliser la version 1 de l'api
    $version = "V2";

    // nom du formulaire CinetPay
    $formName = "goCinetPay";
    // serge met ici le lien pour les notification
    $notify_url = 'http://a83e565a.ngrok.io/cinetpay-php-sdk/exemple/notify/';
    // return url
    $return_url = 'http://a83e565a.ngrok.io/cinetpay-php-sdk/exemple/return/';
    // cancel url
    $cancel_url = 'http://a83e565a.ngrok.io/cinetpay-php-sdk/exemple';

    // cinetpay button type, must be 1, 2, 3, 4 or 5
    $btnType = 2;
    // button size, can be 'small' , 'large' or 'larger'
    $btnSize = 'large';
    // fill command class
    $commande->setTransId($id_transaction);
    $commande->setMontant($montant_a_payer);

    // save transaction in db
    $commande->create();

    // create html form for your basket
    $CinetPay = new cinetPay($site_id, $apiKey, $plateform, $version);
    $CinetPay->setTransId($id_transaction)
        ->setDesignation($description_du_paiement)
        ->setTransDate($date_transaction)
        ->setAmount($montant_a_payer)
        ->setAmount($montant_a_payer)
        ->setDebug(false)// put it on true, if you want to activate debug
        ->setCustom($identifiant_du_payeur)// optional
        ->setNotifyUrl($notify_url)// optional
        ->setReturnUrl($return_url)// optional
        ->setCancelUrl($cancel_url)// optional
        ->setCelPhoneNum($_POST['cel_phone_num'])
        ->setPhonePrefixe($_POST['cpm_phone_prefixe'])
        ->displayPayButton($formName, $btnType, $btnSize);
} catch (Exception $e) {
    echo $e->getMessage();
}

