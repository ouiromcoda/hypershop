<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

    /**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         AFRICAN VILLAGE
 * @category        Model
 * @author          Arnold KOUYA
 * @license         MIT
 * @link            http://www.arnoldkouya.com
 */


      /* Catégorie de Produit*/
    function get_all_prod_cat(){
            $this->db->select()->from('prod_cat');
            $query=$this->db->get();
            return $query->result();
    }
    function insert_prod_cat($data){
            $this->db->insert('prod_cat',$data);
            return $this->db->insert_id();
    }    
    function update_prod_cat($id_cat,$data){
            $this->db->where('id_cat',$id_cat);
            $this->db->update('prod_cat',$data);
    }   
    function delete_prod_cat($id_cat){
            $this->db->where('id_cat',$id_cat);
            $this->db->delete('prod_cat');
    }


       /* Variante de Produit*/
    function get_all_variante(){
            $this->db->select()->from('variante');
            $query=$this->db->get();
            return $query->result();
    }
    function insert_variante($data){
            $this->db->insert('variante',$data);
            return $this->db->insert_id();
    }

    function insert_produit_variante($data){
            $this->db->insert('produit_variante',$data);
            return $this->db->insert_id();
    }

    function update_produit_variante($id_variante, $data){
            $this->db->where('id_variante',$id_variante);
            $this->db->update('produit_variante',$data);
    }
        
    function update_variante($id_variante,$data){
            $this->db->where('id_variante',$id_variante);
            $this->db->update('variante',$data);
    }   
    function delete_variante($id_variante){
            $this->db->where('id_variante',$id_variante);
            $this->db->delete('variante');
    }

    /*utilisateur*/

    function get_all_user_role(){
            $this->db->select()->from('role');
            $query=$this->db->get();
            return $query->result();
    }
     function get_all_user(){
            $this->db->select()->from('users')->order_by('created_at','desc');
            $this->db->join('role','role.id_role=users.usr_group');
            $query=$this->db->get();
            return $query->result();
    }
    function insert_user($data){
            $this->db->insert('users',$data);
            return $this->db->insert_id();
    }

    function insert_utilisateur($data){
        $this->db->insert('users',$data);
        return $this->db->insert_id();
    } 

     function update_utilisateur($usr_id,$data){
            $this->db->where('usr_id',$usr_id);
            $this->db->update('users',$data);
    }   
    function delete_utilisateur($usr_id){
            $this->db->where('usr_id',$usr_id);
            $this->db->delete('users');
    }

    function get_all_scash_admins() {
        $this->db->select()->from('users');
        $this->db->where('id_role', 1);
        $query = $this->db->get();
        return $query->result();
    }
    
    
   function insert_error_log($data){
        $this->db->insert('error_log', $data);
        return $this->db->insert_id();
    } 

    function insert_qrcode($data){
        $this->db->insert('qrcode',$data);
        return $this->db->insert_id();
    } 
    
    function getQrCodeByUserId($id_user) {
        $this->db->select('')->from('qrcode');
        $this->db->where('id_user', $id_user);
        $query = $this->db->get();
        return $query->first_row();
    }

    function get_user($id_user){
             $this->db->select()->from('users')->where('usr_id',$id_user);
            $query=$this->db->get();
            return $query->first_row();
    } 
    function get_user_by_email($email_user){
             $this->db->select()->from('users')->where('usr_email', $email_user);
            $query=$this->db->get();
            return $query->result(); 
    }
    function get_user_by_phone($phone_user){
             $this->db->select()->from('user')->where('phone_user', $phone_user);
            $query=$this->db->get();
            return $query->first_row();
    }
    function get_user_by_token_password($token_password){
        $this->db->select()->from('user')->where('token_password', $token_password);
        $query=$this->db->get();
        return $query->first_row();
    } 

    function get_user_password($usr_id){
        $this->db->select()->from('users')->where('usr_id', $usr_id);
        $query=$this->db->get();
        return $query->result();
    } 

    function update_user($usr_id,$data){
            $this->db->where('usr_id',$usr_id);
            $this->db->update('users',$data);
    }  
    function delete_user($usr_id){
            $this->db->where('usr_id',$usr_id);
            $this->db->delete('users');
    }
    function checkToken($token){
            $this->db->select('token')->from('user')->where('token',$token);
            $this->db->where('status','0');
            $query=$this->db->get();
            return $query->first_row();
    }

    function getUserCarteStatus($id_user){
            $this->db->select('have_carte')->from('user')->where('id_user',$id_user);
            $query=$this->db->get();
            return $query->result();
    }

    function getInscriptionDurationUser($id_user){
            $this->db->select('created_at')->from('user')->where('id_user',$id_user);
            $query=$this->db->get();
            return $query->result();
    }

    /*Utilisateur*/
    /* debut Carte*/
    function get_all_carte(){
            $this->db->select()->from('carte');
            $query=$this->db->get();
            return $query->result();
    }
    function insert_carte($data){
            $this->db->insert('carte',$data);
            return $this->db->insert_id();
    }    
    function update_carte($id_carte,$data){
            $this->db->where('id_carte',$id_carte);
            $this->db->update('carte',$data);
    }   
    function delete_carte($id_carte){
            $this->db->where('id_carte',$id_carte);
            $this->db->delete('carte');
    }

    function checkAvaibleCarte($code_carte){
            $this->db->select('code_carte')->from('carte')->where('code_carte',$code_carte);
            $this->db->where('used','0');
            $query=$this->db->get();
            return $query->first_row();
    }
    function get_montant_carte($code_carte){
            $this->db->select('montant_carte')->from('type_carte')->where('code_carte',$code_carte);
            $this->db->join('carte','carte.id_type_carte=type_carte.id_type_carte');
            $query=$this->db->get();
            return $query->result();
    }

    

   /*Fin Carte*/



   /*Debut Log*/
    function get_all_log(){
            $this->db->select()->from('log');
            $query=$this->db->get();
            return $query->result();
    }
    function insert_logs($data){
            $this->db->insert('log',$data);
            return $this->db->insert_id();
    }
    /*Fin log*/




    /**        DEBUT
    *   GESTION DES SLIDES
    **/
    function get_all_slide(){
            $this->db->select()->from('slide')->order_by('created_at','desc');
            $query=$this->db->get();
            return $query->result();
    }
        
        
    function get_slide($id_gallery){
            $this->db->select()->from('slide')->where('id_slide',$id_slide);
            $query=$this->db->get();
            return $query->first_row();
    }

        
        
    function insert_slide($data){
            $this->db->insert('slide',$data);
            return $this->db->insert_id();
    }

        
        
    function update_slide($id_slide,$data){
            $this->db->where('id_slide',$id_slide);
            $this->db->update('slide',$data);
    }

        function get_image_galerie($id_gallery){
            $this->db->select()->from('image_gallery')->where('id_gallery',$id_gallery);
            $query=$this->db->get();
            return $query->result();
    }
        
    function delete_slide($id_slide){
            $this->db->where('id_slide',$id_slide);
            $this->db->delete('slide');
    }

    /**         FIN
    *   GESTION DES SLIDES
    **/

    /**        DEBUT
    *   GESTION DES GALERIES
    **/
    function get_all_gallery(){
            $this->db->select()->from('gallery')->order_by('created_at','desc');
            $query=$this->db->get();
            return $query->result();
    }

    function get_gallery($slug_gallery){
            $this->db->select()->from('gallery')->where('slug_gallery',$slug_gallery);
            $this->db->join('users','users.usr_id=gallery.id_user');
            $query=$this->db->get();
            return $query->first_row();
    }
        
        
    function get_image_gallery($id_gallery){
            $this->db->select()->from('gallery')->where('gallery.id_gallery',$id_gallery);
            $this->db->join('image_gallery','image_gallery.id_gallery=gallery.id_gallery');
            $query=$this->db->get();
            return $query->result();
    }

    function get_one_image_by_gallery($id_gallery){
            $this->db->select()->from('gallery')->where('gallery.id_gallery',$id_gallery);
            $this->db->join('image_gallery','image_gallery.id_gallery=gallery.id_gallery');
            $this->db->limit('1');
            $query=$this->db->get();
            return $query->result();
    }

    function get_all_image_gallery(){
            $this->db->select()->from('image_gallery');
            $this->db->join('gallery','gallery.id_gallery=image_gallery.id_gallery');
            $query=$this->db->get();
            return $query->result();
    }

    function get_id_gallery($label_gallery){
            $this->db->select('id_gallery')->from('gallery')->where('label_gallery',$label_gallery);
            $query=$this->db->get();
            return $query->first_row();
    }

        
        
    function insert_gallery($data){
            $this->db->insert('gallery',$data);
            return $this->db->insert_id();
    }

    function insert_image_gallery($data){
            $this->db->insert('image_gallery',$data);
            return $this->db->insert_id();
    }

        
        
    function update_gallery($id_gallery,$data){
            $this->db->where('id_gallery',$id_gallery);
            $this->db->update('gallery',$data);
    }

        
        
    function delete_gallery($id_gallery){
            $this->db->where('id_gallery',$id_gallery);
            $this->db->delete('gallery');
    }
    function delete_image_gallery($id_gallery){
            $this->db->where('id_gallery',$id_gallery);
            $this->db->delete('image_gallery');
    }

function get_image_galerie_for_presentation($id_gallery){
            $this->db->select()->from('image_gallery')->where('id_gallery',$id_gallery)->limit('1');
            $query=$this->db->get();
            return $query->result();
    }

    /**        DEBUT
    *   GESTION DES TYPE D'ACTUALITES
    **/
    function get_all_type_actuality(){
            $this->db->select()->from('type_actuality');
            $query=$this->db->get();
            return $query->result();
    }
        
        
    function get_type_actuality($id_type_actuality){
            $this->db->select()->from('gallery')->where('id_type_actuality',$id_type_actuality);
            $query=$this->db->get();
            return $query->first_row();
    }

        
        
    function insert_type_actualityy($data){
            $this->db->insert('type_actuality',$data);
            return $this->db->insert_id();
    }

        
        
    function update_type_actuality($id_type_actuality,$data){
            $this->db->where('id_type_actuality',$id_type_actuality);
            $this->db->update('type_actuality',$data);
    }

        
        
    function delete_type_actuality($id_type_actuality){
            $this->db->where('id_type_actuality',$id_type_actuality);
            $this->db->delete('type_actuality');
    }

    /**         FIN
    *   GESTION DES TYPE D'ACTUALITES
    **/


    /**        DEBUT
    *   GESTION DES TELECHARGEMENTS
    **/
    function get_all_video(){
            $this->db->select()->from('video')->order_by('video.created_at','desc');
            $this->db->join('type_actuality','type_actuality.id_type=video.id_category');
            //$this->db->join('user','user.id_user=video.id_user');
            $query=$this->db->get();
            return $query->result();
    }
       
    
    function get_video($slug_video){
            $this->db->select()->from('video')->where('slug_video',$slug_video);
            $this->db->join('user','user.id_user=video.id_user');
            $query=$this->db->get();
            return $query->first_row();
    }

    function get_video_a_la_une(){
            $this->db->select()->from('video')->order_by('video.created_at','desc');            
            $this->db->join('type_actuality','type_actuality.id_type=video.id_category');
            $this->db->where('a_la_une','1');
            $this->db->limit('1');
            $query=$this->db->get();
            return $query->result();
    }

    function get_video_by_type($id_type){
            $this->db->select()->from('video')->order_by('video.created_at','desc');            
            $this->db->join('type_actuality','type_actuality.id_type=video.id_category');
            $this->db->where('id_category',$id_type);
            $query=$this->db->get();
            return $query->result();
    }

        
        
    function insert_video($data){
            $this->db->insert('video',$data);
            return $this->db->insert_id();
    }

        
        
    function update_video($id_video,$data){
            $this->db->where('id_video',$id_video);
            $this->db->update('video',$data);
    }

        
        
    function delete_video($id_video){
            $this->db->where('id_video',$id_video);
            $this->db->delete('video');
    }

    /**         FIN
    *   GESTION DES TELECHARGEMENTS
    **/


    function get_all_flash(){
            $this->db->select()->from('flash')->order_by('created_at','desc');
            //$this->db->join('user','user.id_user=video.id_user');
            $query=$this->db->get();
            return $query->result();
    }
            
    function insert_flash($data){
            $this->db->insert('flash',$data);
            return $this->db->insert_id();
    }   
    function update_flash($id_flash,$data){
            $this->db->where('id_flash',$id_flash);
            $this->db->update('flash',$data);
    }
    
    function delete_flash($id_flash){
            $this->db->where('id_flash',$id_flash);
            $this->db->delete('flash');
    }

    /**         FIN
    *   GESTION DES TELECHARGEMENTS
    **/




    /*statistique*/
    function count_client() {
        $this->db->select()->from('users');
        $this->db->where('usr_group',3);
        $query = $this->db->get();
        return $query->result();
    }

    function count_order() {
        $this->db->select()->from('orders');
        $query = $this->db->get();
        return $query->result();
    }


    function get_all_order() {
        $this->db->select()->from('invoices');
        $this->db->join('orders','orders.invoice_id=invoices.id');
        $this->db->join('products','products.pro_id=orders.product_id');
        $query = $this->db->get();
        return $query->result();
    }

    function get_all_ventes_reel(){
            $this->db->select_sum('total')->from('orders');
            $this->db->join('invoices','invoices.id=orders.invoice_id');
             $this->db->where('invoices.is_pick',0);
            $query = $this->db->get();
            return $query->first_row();

    }
    function get_all_ventes_solde(){
            $this->db->select_sum('total')->from('orders');
            $this->db->join('invoices','invoices.id=orders.invoice_id');
            $this->db->where('invoices.is_pick',1);
            $query = $this->db->get();
            return $query->first_row();

    }



    function get_all_vente(){
            $this->db->select()->from('invoices');
            $query = $this->db->get();
            return $query->result();


             // Produces: SELECT SUM(age) as age FROM members
    }

    function get_all_commande(){
            $this->db->select()->from('invoices');
             $this->db->join('orders','orders.invoice_id=invoices.id');
            $this->db->join('magasin','magasin.id_magasin=invoices.id_magasin');
            $this->db->join('ville','ville.id_ville=magasin.id_ville');
            $query = $this->db->get();
            return $query->result();


             // Produces: SELECT SUM(age) as age FROM members
    }

    /**        DEBUT
    *   GESTION DES ACTUALITES and CATEGORY
    **/
    function get_all_actuality(){
            $this->db->select()->from('actuality')->order_by('actuality.created_at','desc');
            $this->db->join('users','users.usr_id=actuality.id_user');
            $this->db->join('type_actuality','type_actuality.id_type=actuality.id_type_actuality');
            $query=$this->db->get();
            return $query->result();
    }

    
    function get_actuality($slug_actuality){
            $this->db->select()->from('actuality')->where('slug_actuality',$slug_actuality);
            $this->db->join('users','users.usr_id=actuality.id_user');
            $this->db->join('type_actuality','type_actuality.id_type=actuality.id_type_actuality');
            $query=$this->db->get();
            return $query->first_row();
    }
        
        
    function insert_actuality($data){
            $this->db->insert('actuality',$data);
            return $this->db->insert_id();
    }

        
        
    function update_actuality($id_actuality,$data){
            $this->db->where('id_actuality',$id_actuality);
            $this->db->update('actuality',$data);
    }

        
        
    function delete_actuality($id_actuality){
            $this->db->where('id_actuality',$id_actuality);
            $this->db->delete('actuality');
    }


    function get_all_category_actu(){
            $this->db->select()->from('type_actuality');
            $query=$this->db->get();
            return $query->result();
    }
    function insert_category_actu($data){
            $this->db->insert('type_actuality',$data);
            return $this->db->insert_id();
    }
    function update_category_actu($id_type,$data){
            $this->db->where('id_type',$id_type);
            $this->db->update('type_actuality',$data);
    }
    function delete_category_actu($id_type){
            $this->db->where('id_type',$id_type);
            $this->db->delete('type_actuality');
    }

    /**        FIN
    *   GESTION DES ACTUALITES
    **/

    /**        DEBUT
    *   GESTION DES PARTENAIRES
    **/
    function get_all_partner(){
            $this->db->select()->from('partner');
            $query=$this->db->get();
            return $query->result();
    }

     function get_last_partner(){
            $this->db->select()->from('partner')->where('created_at','desc');
            $query=$this->db->get();
            return $query->first_row();
    }
        
        
    function get_partner($id_partner){
            $this->db->select()->from('slpartneride')->where('id_partner',$id_partner);
            $query=$this->db->get();
            return $query->first_row();
    }

        
        
    function insert_partner($data){
            $this->db->insert('partner',$data);
            return $this->db->insert_id();
    }

        
        
    function update_partner($id_partner,$data){
            $this->db->where('id_partner',$id_partner);
            $this->db->update('partner',$data);
    }

        
        
    function delete_partner($id_partner){
            $this->db->where('id_partner',$id_partner);
            $this->db->delete('partner');
    }

    /**         FIN
    *   GESTION DES PARTENAIRES
    **/

    /**        DEBUT
    *   GESTION DES TELECHARGEMENTS
    **/
    function get_all_file(){
            $this->db->select()->from('file')->order_by('file.created_at','desc');
            $this->db->join('users','users.usr_id=file.id_user');
            $query=$this->db->get();
            return $query->result();
    }
        
        
    function get_file($id_file){
            $this->db->select()->from('file')->where('id_file',$id_file);
            $query=$this->db->get();
            return $query->first_row();
    }

        
        
    function insert_file($data){
            $this->db->insert('file',$data);
            return $this->db->insert_id();
    }

        
        
    function update_file($id_file,$data){
            $this->db->where('id_file',$id_file);
            $this->db->update('file',$data);
    }

        
        
    function delete_file($id_file){
            $this->db->where('id_file',$id_file);
            $this->db->delete('file');
    }

    /**         FIN
    *   GESTION DES TELECHARGEMENTS
    **/


     /**        DEBUT
    *   GESTION DES MAGASINS
    **/
    function get_all_magasin(){
            $this->db->select()->from('magasin')->order_by('magasin.created_at','desc');
            $this->db->join('ville','magasin.id_ville=ville.id_ville');
            $query=$this->db->get();
            return $query->result();
    }
        
        
    function get_magasin($id_magasin){
            $this->db->select()->from('magasin')->where('id_magasin',$id_magasin);
            $query=$this->db->get();
            return $query->first_row();
    }

     function get_admin_magasin($id_user){
            $this->db->select()->from('users')->where('usr_id',$id_user);
            $this->db->join('magasin','magasin.id_magasin=users.id_magasin');
            $this->db->join('ville','ville.id_ville=magasin.id_ville');
            $query=$this->db->get();
            return $query->first_row();
    }

        
        
    function insert_magasin($data){
            $this->db->insert('magasin',$data);
            return $this->db->insert_id();
    }

        
        
    function update_magasin($id_magasin,$data){
            $this->db->where('id_magasin',$id_magasin);
            $this->db->update('magasin',$data);
    }

        
        
    function delete_magasin($id_magasin){
            $this->db->where('id_magasin',$id_magasin);
            $this->db->delete('magasin');
    }

    /**         FIN
    *   GESTION DES MAGASINS
    **/

         /**        DEBUT
    *   GESTION DES VILLES
    **/
    function get_all_ville(){
            $this->db->select()->from('ville')->order_by('ville.created_at','desc');
            //$this->db->join('ville','magasin.id_ville=ville.id_ville');
            $query=$this->db->get();
            return $query->result();
    }
        
        
    function get_ville($id_ville){
            $this->db->select()->from('ville')->where('id_ville',$id_ville);
            $query=$this->db->get();
            return $query->first_row();
    }

        
        
    function insert_ville($data){
            $this->db->insert('ville',$data);
            return $this->db->insert_id();
    }

        
        
    function update_ville($id_ville,$data){
            $this->db->where('id_ville',$id_ville);
            $this->db->update('ville',$data);
    }

        
        
    function delete_ville($id_ville){
            $this->db->where('id_ville',$id_ville);
            $this->db->delete('ville');
    }

    /**         FIN
    *   GESTION DES VILLES
    **/

        /**        DEBUT
    *   GESTION DES COMMUNES
    **/
    function get_all_commune(){
            $this->db->select()->from('commune')->order_by('commune.created_at','desc');
            //$this->db->join('ville','magasin.id_ville=ville.id_ville');
            $query=$this->db->get();
            return $query->result();
    }
        
        
    function get_commune($id_commune){
            $this->db->select()->from('commune')->where('id_commune',$id_commune);
            $query=$this->db->get();
            return $query->first_row();
    }

        
        
    function insert_commune($data){
            $this->db->insert('commune',$data);
            return $this->db->insert_id();
    }

        
        
    function update_commune($id_commune,$data){
            $this->db->where('id_commune',$id_commune);
            $this->db->update('commune',$data);
    }

        
        
    function delete_commune($id_commune){
            $this->db->where('id_commune',$id_commune);
            $this->db->delete('commune');
    }

     function getComVille($id_ville){
            $this->db->select()->from('commune')->where('id_ville',$id_ville);
            //$this->db->join('ville','magasin.id_ville=ville.id_ville');
            $query=$this->db->get();
            return $query->result();
    }

    /**         FIN
    *   GESTION DES COMMUNES
    **/
}

/* End of file carte_model.php */
/* Location: ./application/modules/carte/models/carte_model.php */