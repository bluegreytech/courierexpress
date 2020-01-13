<?php

class Product_model extends CI_Model
 {
	function product_add()
	{	
		 $ProductImage='';
		  //$image_settings=image_setting();
		  if(isset($_FILES['ProductImage']) &&  $_FILES['ProductImage']['name']!='')
		  {
			$this->load->library('upload');
			$rand=rand(0,100000); 
	
			$_FILES['userfile']['name']     =   $_FILES['ProductImage']['name'];
			$_FILES['userfile']['type']     =   $_FILES['ProductImage']['type'];
			$_FILES['userfile']['tmp_name'] =   $_FILES['ProductImage']['tmp_name'];
			$_FILES['userfile']['error']    =   $_FILES['ProductImage']['error'];
			$_FILES['userfile']['size']     =   $_FILES['ProductImage']['size'];   
			$config['file_name'] = $rand.'Product';      
			$config['upload_path'] = base_path().'upload/productimage/';      
			$config['allowed_types'] = 'jpg|jpeg|png|bmp';
			$this->upload->initialize($config);
	
			if (!$this->upload->do_upload())
			{
			$error =  $this->upload->display_errors();
			  echo "<pre>"; print_r($error);die; 
			}        
	
			$picture = $this->upload->data();       
			$this->load->library('image_lib');       
			$this->image_lib->clear();       
	
			$gd_var='gd2';
			$this->image_lib->initialize(array(
			  'image_library' => $gd_var,
			  'source_image' => base_path().'upload/productimage/'.$picture['file_name'],
			  'new_image' => base_path().'upload/product/'.$picture['file_name'],
			  'maintain_ratio' => FALSE,
			  'quality' => '100%',
			  'width' => 300,
			  'height' => 300
			));
	
	
			if(!$this->image_lib->resize())
			{
			$error = $this->image_lib->display_errors();
			}
	
			$ProductImage=$picture['file_name'];
			$this->input->post('pre_product_image');
			if($this->input->post('pre_product_image')!='')
			{
			if(file_exists(base_path().'upload/product/'.$this->input->post('pre_product_image')))
			{
			$link=base_path().'upload/product/'.$this->input->post('pre_product_image');
			unlink($link);
			}
	
			if(file_exists(base_path().'upload/productimage/'.$this->input->post('pre_product_image')))
			{
			$link2=base_path().'upload/productimage/'.$this->input->post('pre_product_image');
			unlink($link2);
			}
			}
		  }else{
			if($this->input->post('pre_product_image')!='')
			{
				$ProductImage=$this->input->post('pre_product_image');
			}
		  }
		
            $data = array(
			'ProductName'=>trim($this->input->post('ProductName')),			
			'ProductDescription'=>trim($this->input->post('ProductDescription')),
			'ProductImage'=>$ProductImage,		
			'IsActive' =>$this->input->post('IsActive'),			
			'CreatedOn'=>date('Y-m-d')		
			);
		  	//echo "<pre>";print_r($data);die;	        
            $res=$this->db->insert('tblproduct',$data);	
			return $res;
	}

	function getproduct(){
		$this->db->select('*');
		$this->db->from('tblproduct');
		$this->db->where('IsDelete','0');
		$this->db->order_by('ProductId','desc');
		$query=$this->db->get();
		$res = $query->result();
		return $res;

	}
	

	function getdata($ProductId){
		$this->db->select("*");
		$this->db->from("tblproduct");
		$this->db->where("IsDelete",'0');
		$this->db->where("ProductId",$ProductId);
	    $this->db->order_by('ProductId','desc');
		$query=$this->db->get();
		return $query->row_array();
	}

	function product_update(){

		  $ProductId=$this->input->post('ProductId');
		  $ProductImage='';
		  //$image_settings=image_setting();
		  if(isset($_FILES['ProductImage']) &&  $_FILES['ProductImage']['name']!='')
		  {
			$this->load->library('upload');
			$rand=rand(0,100000); 
	
			$_FILES['userfile']['name']     =   $_FILES['ProductImage']['name'];
			$_FILES['userfile']['type']     =   $_FILES['ProductImage']['type'];
			$_FILES['userfile']['tmp_name'] =   $_FILES['ProductImage']['tmp_name'];
			$_FILES['userfile']['error']    =   $_FILES['ProductImage']['error'];
			$_FILES['userfile']['size']     =   $_FILES['ProductImage']['size'];   
			$config['file_name'] = $rand.'Product';      
			$config['upload_path'] = base_path().'upload/productimage/';      
			$config['allowed_types'] = 'jpg|jpeg|png|bmp';
			$this->upload->initialize($config);
	
			if (!$this->upload->do_upload())
			{
			$error =  $this->upload->display_errors();
			  echo "<pre>"; print_r($error);die; 
			}        
	
			$picture = $this->upload->data();       
			$this->load->library('image_lib');       
			$this->image_lib->clear();       
	
			$gd_var='gd2';
			$this->image_lib->initialize(array(
			  'image_library' => $gd_var,
			  'source_image' => base_path().'upload/productimage/'.$picture['file_name'],
			  'new_image' => base_path().'upload/product/'.$picture['file_name'],
			  'maintain_ratio' => FALSE,
			  'quality' => '100%',
			  'width' => 300,
			  'height' => 300
			));
	
	
			if(!$this->image_lib->resize())
			{
			$error = $this->image_lib->display_errors();
			}
	
			$ProductImage=$picture['file_name'];
			$this->input->post('pre_product_image');
			if($this->input->post('pre_product_image')!='')
			{
			if(file_exists(base_path().'upload/product/'.$this->input->post('pre_product_image')))
			{
			$link=base_path().'upload/product/'.$this->input->post('pre_product_image');
			unlink($link);
			}
	
			if(file_exists(base_path().'upload/productimage/'.$this->input->post('pre_product_image')))
			{
			$link2=base_path().'upload/productimage/'.$this->input->post('pre_product_image');
			unlink($link2);
			}
			}
		  }else{
			if($this->input->post('pre_product_image')!='')
			{
				$ProductImage=$this->input->post('pre_product_image');
			}
		  }

            $data = array(
			'ProductId' =>trim($this->input->post('ProductId')),	
			'ProductName' =>trim($this->input->post('ProductName')),			
			'ProductDescription' => trim($this->input->post('ProductDescription')),		
			'ProductImage'=>$ProductImage,
			'IsActive' => $this->input->post('IsActive'),			
			'CreatedOn'=>date('Y-m-d')		
			); 
			//print_r($data);die;
			$this->db->where("ProductId",$ProductId);
			$res=$this->db->update('tblproduct',$data);		
			return $res;
	}

	
}
