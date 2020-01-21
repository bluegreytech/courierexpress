<?php

class Couriertype_model extends CI_Model
 {
	function courier_add()
	{	
		$CourierImage='';
		if(isset($_FILES['CourierImage']) &&  $_FILES['CourierImage']['name']!='')
		{
			$this->load->library('upload');
			$rand=rand(0,100000); 
	
			$_FILES['userfile']['name']     =   $_FILES['CourierImage']['name'];
			$_FILES['userfile']['type']     =   $_FILES['CourierImage']['type'];
			$_FILES['userfile']['tmp_name'] =   $_FILES['CourierImage']['tmp_name'];
			$_FILES['userfile']['error']    =   $_FILES['CourierImage']['error'];
			$_FILES['userfile']['size']     =   $_FILES['CourierImage']['size'];   
			$config['file_name'] = $rand.'Courier';      
			$config['upload_path'] = base_path().'upload/courierimage/';      
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
			  'source_image' => base_path().'upload/courierimage/'.$picture['file_name'],
			  'new_image' => base_path().'upload/courier/'.$picture['file_name'],
			  'maintain_ratio' => FALSE,
			  'quality' => '100%',
			  'width' => 172,
			  'height' => 80
			));
	
	
			if(!$this->image_lib->resize())
			{
			$error = $this->image_lib->display_errors();
			}
	
			$CourierImage=$picture['file_name'];
			$this->input->post('pre_courier_image');
			if($this->input->post('pre_courier_image')!='')
			{
			if(file_exists(base_path().'upload/courier/'.$this->input->post('pre_courier_image')))
			{
			$link=base_path().'upload/courier/'.$this->input->post('pre_courier_image');
			unlink($link);
			}
	
			if(file_exists(base_path().'upload/courierimage/'.$this->input->post('pre_courier_image')))
			{
			$link2=base_path().'upload/courierimage/'.$this->input->post('pre_courier_image');
			unlink($link2);
			}
			}
		  }else{
			if($this->input->post('pre_courier_image')!='')
			{
				$CourierImage=$this->input->post('pre_courier_image');
			}
		  }
		
            $data = array(
			'CourierName'=>trim($this->input->post('CourierName')),			
			'CourierSite'=>trim($this->input->post('CourierSite')),
			'CourierImage'=>$CourierImage,		
			'IsActive' =>$this->input->post('IsActive'),			
			'CreatedOn'=>date('Y-m-d')		
			);
		  	//echo "<pre>";print_r($data);die;	        
            $res=$this->db->insert('tblcourier',$data);	
			return $res;
	}

	function getcourier(){
		$this->db->select('*');
		$this->db->from('tblcourier');
		$this->db->where('IsDelete','0');
		$this->db->order_by('CourierId','desc');
		$query=$this->db->get();
		$res = $query->result();
		return $res;

	}
	

	function getdata($CourierId){
		$this->db->select("*");
		$this->db->from("tblcourier");
		$this->db->where("IsDelete",'0');
		$this->db->where("CourierId",$CourierId);
	    $this->db->order_by('CourierId','desc');
		$query=$this->db->get();
		return $query->row_array();
	}

	function courier_update(){

		  $CourierId=$this->input->post('CourierId');
		  $CourierImage='';
		  //$image_settings=image_setting();
		  if(isset($_FILES['CourierImage']) &&  $_FILES['CourierImage']['name']!='')
		  {
			$this->load->library('upload');
			$rand=rand(0,100000); 
	
			$_FILES['userfile']['name']     =   $_FILES['CourierImage']['name'];
			$_FILES['userfile']['type']     =   $_FILES['CourierImage']['type'];
			$_FILES['userfile']['tmp_name'] =   $_FILES['CourierImage']['tmp_name'];
			$_FILES['userfile']['error']    =   $_FILES['CourierImage']['error'];
			$_FILES['userfile']['size']     =   $_FILES['CourierImage']['size'];   
			$config['file_name'] = $rand.'Courier';      
			$config['upload_path'] = base_path().'upload/courierimage/';      
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
			  'source_image' => base_path().'upload/courierimage/'.$picture['file_name'],
			  'new_image' => base_path().'upload/courier/'.$picture['file_name'],
			  'maintain_ratio' => FALSE,
			  'quality' => '100%',
			  'width' => 172,
			  'height' => 80
			));
	
	
			if(!$this->image_lib->resize())
			{
			$error = $this->image_lib->display_errors();
			}
	
			$CourierImage=$picture['file_name'];
			$this->input->post('pre_courier_image');
			if($this->input->post('pre_courier_image')!='')
			{
			if(file_exists(base_path().'upload/courier/'.$this->input->post('pre_courier_image')))
			{
			$link=base_path().'upload/courier/'.$this->input->post('pre_courier_image');
			unlink($link);
			}
	
			if(file_exists(base_path().'upload/courierimage/'.$this->input->post('pre_courier_image')))
			{
			$link2=base_path().'upload/courierimage/'.$this->input->post('pre_courier_image');
			unlink($link2);
			}
			}
		  }else{
			if($this->input->post('pre_courier_image')!='')
			{
				$CourierImage=$this->input->post('pre_courier_image');
			}
		  }

            $data = array(
			'CourierId' =>trim($this->input->post('CourierId')),	
			'CourierName' =>trim($this->input->post('CourierName')),			
			'CourierSite' => trim($this->input->post('CourierSite')),		
			'CourierImage'=>$CourierImage,
			'IsActive' => $this->input->post('IsActive'),			
			'CreatedOn'=>date('Y-m-d')		
			); 
			//print_r($data);die;
			$this->db->where("CourierId",$CourierId);
			$res=$this->db->update('tblcourier',$data);		
			return $res;
	}

	
}
