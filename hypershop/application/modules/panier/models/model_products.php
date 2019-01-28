<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_products extends CI_Model {
	
		public function all_products()//لجلب  جميع البيانات واظهاراها في الصفحة الرئيسية
		{ //$show -> guery to get all products from table products
			/*$show = $this->db->get('products');
			if($show->num_rows() > 0 ) {
					return $show->result();
			} else {
					 return array();
			} //end if num_rows*/

			 $this->db->select()->from('products')->order_by('products.created_at','desc');
			 $this->db->join('prod_cat','prod_cat.id_cat=products.id_cat');
            $query=$this->db->get();
            return $query->result();

					
		}//end function all_products

		function all_packs_products(){
            $this->db->select()->from('products')->where('id_cat',1);
            $query=$this->db->get();
            return $query->result();
    }
		
		public function dis_products()
		{
				$this->db->distinct();
				$query = $this->db->query('SELECT DISTINCT pro_name FROM products');
				return $query->result();
		}//without repeated values
		
		public function showme($pro_name)
		{ 
			
			$query = $this->db->get_where('products', array('pro_name' => $pro_name));
			return $query->result();
			
		}//end function this --------- this will find product and show all same product
		
		public function find($pro_id)
			//this is for find record id->product
		{ 
			$code = $this->db->where('pro_id',$pro_id)
							->limit(1)
							->get('products');
			if ($code->num_rows() > 0 )
				{
					return $code->row();
				}else {
					return array();
				}//end if code->num_rows > 0 
				
		}//end function find
		

		public function create($data_products)//لانشاء منتج جديد
		{
			//guery insert into database 	
			$this->db->insert('products',$data_products);
				
		}//end function craete
		
		public function edit($pro_id,$data_products)//للتعديل على المنتج
		{
			//guery update FROM .. WHERE id->products
			$this->db->where('pro_id',$pro_id)
					->update('products',$data_products);
		}
		
		public function delete($pro_id)//لحذف منتج
		{
			//guery delete id->products
			$this->db->where('pro_id',$pro_id)
					->delete('products');
		}
		
	public function report($report_products)
	{
		
		$this->db->insert('reports',$report_products);
		
	}//end function craete
	
	public function reports()
	{ 
		$report = $this->db->get('reports');
		if($report->num_rows() > 0 ) {
			return $report->result();
		} else {
			return array();
		} //end if num_rows
		
	}//end function report
	
	
	public function del_report($rep_id_product)
	{
		$this->db->where('rep_id_product',$rep_id_product)
		->delete('reports');
	}

	function get_product($pro_slug){
            $this->db->select()->from('products')->where('pro_slug',$pro_slug);
            $this->db->join('users','users.usr_id=products.usr_id');
            $query=$this->db->get();
            return $query->first_row();
    }

    function get_product_cat($slug_cat){
            $this->db->select()->from('prod_cat')->where('slug_cat',$slug_cat);
            //$this->db->join('users','users.usr_id=products.usr_id');
            $query=$this->db->get();
            return $query->first_row();
    }

    function get_full_product()
    {
    	 $this->db->select()->from('products')->order_by('products.created_at','desc');
    	 $this->db->join('prod_cat','prod_cat.id_cat=products.id_cat');
     /*   $this->db->join('produit_variante','produit_variante.pro_id=products.pro_id');
        $this->db->join('variante','variante.id_variante=produit_variante.id_variante');*/
        
        $query=$this->db->get();
        return $query->result();
    }

    function get_full_product_variante($pro_id)
    {
    	 $this->db->select()->from('produit_variante')->where('pro_id',$pro_id);
        $this->db->join('variante','variante.id_variante=produit_variante.id_variante');
        
        $query=$this->db->get();
        return $query->result();
    }
	

	/* function getStockLeftProduct($pro_id)
	{
		$this->db->select()->from('products')->where('pro_id',$pro_id);
        $query=$this->db->get();
        return $query->result();
	}*/
	
	    	 function getStockLeftProduct($pro_id){
		             $this->db->from('products'); 
					 $this->db->where('pro_id', $pro_id);
					 
					 $query = $this->db->get();
					 
					 if($query->num_rows()>0) {
					 
						 $data = $query->row_array();						 
						 $value = $data['pro_stock'];
						 

						 return $value;
						 

						 } else {
						 
						 return false;
						 
	 					}
	             
	  		 } 


function get_full_product_by_category($id_cat)
    {
    	 $this->db->select()->from('prod_cat')->where('prod_cat.id_cat',$id_cat);
    	 $this->db->join('products','products.id_cat=prod_cat.id_cat');
        
        $query=$this->db->get();
        return $query->result();
    }
		
} //end class Model_products
///////////////////////////////  Model_products : this is use in controller admin/products + home 