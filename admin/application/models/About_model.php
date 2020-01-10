<?php

class About_model extends CI_Model
 {
	function about_insert()
	{	
            $data = array(
			'AboutTitle'=>trim($this->input->post('AboutTitle')),			
			'AboutDescription'=>trim($this->input->post('AboutDescription')),
			'SecondTitle'=>trim($this->input->post('SecondTitle')),			
			'SecondDescription'=>trim($this->input->post('SecondDescription')),
			'ThirdTitle'=>trim($this->input->post('ThirdTitle')),			
			'ThirdDescription'=>trim($this->input->post('ThirdDescription')),
			'FourthTitle'=>trim($this->input->post('FourthTitle')),			
			'FourthDescription'=>trim($this->input->post('FourthDescription')),		
			'IsActive' =>$this->input->post('IsActive'),			
			'CreatedOn'=>date('Y-m-d')		
			);
		  // echo "<pre>";print_r($data);die;	
                    
            $res=$this->db->insert('tblaboutus',$data);	
			return $res;
	}

	function getabout(){
		$this->db->select('*');
		$this->db->from('tblaboutus');
		$this->db->where('IsDelete','0');
		$this->db->order_by('AboutusId','desc');
		$query=$this->db->get();
		$res = $query->result();
		return $res;

	}
	

	function getdata($id){
		$this->db->select("*");
		$this->db->from("tblaboutus");
		$this->db->where("IsDelete",'0');
		$this->db->where("AboutusId",$id);
	    $this->db->order_by('AboutusId','desc');
		$query=$this->db->get();
		return $query->row_array();
	}

	function about_update(){

		  $AboutusId=$this->input->post('AboutusId');
		  $about_image='';
		  //$image_settings=image_setting();
		  if(isset($_FILES['about_image']) &&  $_FILES['about_image']['name']!='')
		  {
			$this->load->library('upload');
			$rand=rand(0,100000); 
	
			$_FILES['userfile']['name']     =   $_FILES['about_image']['name'];
			$_FILES['userfile']['type']     =   $_FILES['about_image']['type'];
			$_FILES['userfile']['tmp_name'] =   $_FILES['about_image']['tmp_name'];
			$_FILES['userfile']['error']    =   $_FILES['about_image']['error'];
			$_FILES['userfile']['size']     =   $_FILES['about_image']['size'];   
			$config['file_name'] = $rand.'About';      
			$config['upload_path'] = base_path().'upload/aboutimage/';      
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
			  'source_image' => base_path().'upload/aboutimage/'.$picture['file_name'],
			  'new_image' => base_path().'upload/about/'.$picture['file_name'],
			  'maintain_ratio' => FALSE,
			  'quality' => '100%',
			  'width' => 300,
			  'height' => 300
			));
	
	
			if(!$this->image_lib->resize())
			{
			$error = $this->image_lib->display_errors();
			}
	
			$about_image=$picture['file_name'];
			$this->input->post('prev_about_image');
			if($this->input->post('pre_about_image')!='')
			{
			if(file_exists(base_path().'upload/about/'.$this->input->post('pre_about_image')))
			{
			$link=base_path().'upload/about/'.$this->input->post('pre_about_image');
			unlink($link);
			}
	
			if(file_exists(base_path().'upload/aboutimage/'.$this->input->post('pre_about_image')))
			{
			$link2=base_path().'upload/aboutimage/'.$this->input->post('pre_about_image');
			unlink($link2);
			}
			}
		  }else{
			if($this->input->post('pre_about_image')!='')
			{
			$about_image=$this->input->post('pre_about_image');
			}
		  }

            $data = array(
			'AboutusId' =>trim($this->input->post('AboutusId')),	
			'AboutTitle' =>trim($this->input->post('AboutTitle')),			
			'AboutDescription' => trim($this->input->post('AboutDescription')),	
			'SecondTitle' =>trim($this->input->post('SecondTitle')),			
			'SecondDescription' => trim($this->input->post('SecondDescription')),	
			'ThirdTitle' =>trim($this->input->post('ThirdTitle')),			
			'ThirdDescription' => trim($this->input->post('ThirdDescription')),	
			'FourthTitle' =>trim($this->input->post('FourthTitle')),			
			'FourthDescription' => trim($this->input->post('FourthDescription')),	
			'AboutImage'=>$about_image,
			'IsActive' => $this->input->post('IsActive'),			
			'CreatedOn'=>date('Y-m-d')		
			); 
			//print_r($data);die;
			$this->db->where("AboutusId",$AboutusId);
			$res=$this->db->update('tblaboutus',$data);		
			return $res;
	}

	
}
