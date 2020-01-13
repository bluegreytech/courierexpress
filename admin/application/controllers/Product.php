<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function __construct()
	{
      	parent::__construct();
		$this->load->model('Product_model');
      
    }

	function productlist()
	{	
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{	
			$data['activeTab']="productlist";		
			$data['result']=$this->Product_model->getproduct();
			$this->load->view('product/productlist',$data);
		}
	}
	
	public function productadd()
	{      
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}   
			
		$data=array();	
		$data['ProductId']=$this->input->post('ProductId');
		$data['ProductName']=$this->input->post('ProductName');
		$data['ProductDescription']=$this->input->post('ProductDescription');
		$data['ProductImage']=$this->input->post('ProductImage');
		$data['IsActive']=$this->input->post('IsActive');

		if($_POST)
		{	
				if($this->input->post("ProductId")!="")
				{
					$this->Product_model->product_update();
					$this->session->set_flashdata('success', 'Record has been Updated Succesfully!');
					redirect('Product/productlist');
					
				}
				else
				{ 
					$this->Product_model->product_add();
					$this->session->set_flashdata('success', 'Record has been Inserted Succesfully!');
					redirect('Product/productlist');
				
				}
		}	
			
		    $data['activeTab']="productadd";	
			$this->load->view('product/productadd',$data);
				
	}
	
	function editproduct($ProductId){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			$data=array();
			$result=$this->Product_model->getdata($ProductId);	
			$data['redirect_page']='aboutlist';
			$data['ProductId']=$result['ProductId'];
			$data['ProductName']=$result['ProductName'];	
			$data['ProductDescription']=$result['ProductDescription'];			
	      	$data['ProductImage']=$result['ProductImage'];
			$data['IsActive']=$result['IsActive'];
			//echo "<pre>";print_r($data);die;	
			$data['activeTab']="productadd";	
			$this->load->view('product/productadd',$data);	
		
	}


	function product_delete(){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			$data= array('IsActive' =>'Inactive','IsDelete' =>'1');
			$ProductId=$this->input->post('ProductId');
			$this->db->where("ProductId",$ProductId);			
			$res=$this->db->update('tblproduct',$data);
			//echo $this->db->last_query();die;
			echo json_encode($res);
			die;
		
	}

	
}
