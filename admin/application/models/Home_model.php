<?php

class Home_model extends CI_Model
 {
	function home_add()
	{	
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
			$config['file_name'] = $rand.'Home';      
			$config['upload_path'] = base_path().'upload/homeimage/';      
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
			  'source_image' => base_path().'upload/homeimage/'.$picture['file_name'],
			  'new_image' => base_path().'upload/home/'.$picture['file_name'],
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
			if(file_exists(base_path().'upload/home/'.$this->input->post('pre_about_image')))
			{
			$link=base_path().'upload/home/'.$this->input->post('pre_about_image');
			unlink($link);
			}
	
			if(file_exists(base_path().'upload/homeimage/'.$this->input->post('pre_about_image')))
			{
			$link2=base_path().'upload/homeimage/'.$this->input->post('pre_about_image');
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
		'HomeTitle'=>trim($this->input->post('HomeTitle')),			
		'HomeDescription'=>trim($this->input->post('HomeDescription')),
		'AboutImage'=>$about_image,		
		'IsActive' =>$this->input->post('IsActive'),			
		'CreatedOn'=>date('Y-m-d')		
		);
	    //echo "<pre>";print_r($data);die;	         
        $res=$this->db->insert('tblhome',$data);	
		return $res;
	}

	function gethome(){
		$this->db->select('*');
		$this->db->from('tblhome');
		$this->db->where('IsDelete','0');
		$this->db->order_by('HomeAboutId','desc');
		$query=$this->db->get();
		$res = $query->result();
		return $res;

	}
	

	function getdata($id){
		$this->db->select("*");
		$this->db->from("tblhome");
		$this->db->where("IsDelete",'0');
		$this->db->where("HomeAboutId",$id);
	    $this->db->order_by('HomeAboutId','desc');
		$query=$this->db->get();
		return $query->row_array();
	}

	function home_update(){

		  $HomeAboutId=$this->input->post('HomeAboutId');
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
			$config['file_name'] = $rand.'Home';      
			$config['upload_path'] = base_path().'upload/homeimage/';      
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
			  'source_image' => base_path().'upload/homeimage/'.$picture['file_name'],
			  'new_image' => base_path().'upload/home/'.$picture['file_name'],
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
			if(file_exists(base_path().'upload/home/'.$this->input->post('pre_about_image')))
			{
			$link=base_path().'upload/home/'.$this->input->post('pre_about_image');
			unlink($link);
			}
	
			if(file_exists(base_path().'upload/homeimage/'.$this->input->post('pre_about_image')))
			{
			$link2=base_path().'upload/homeimage/'.$this->input->post('pre_about_image');
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
			'HomeAboutId' =>trim($this->input->post('HomeAboutId')),	
			'HomeTitle' =>trim($this->input->post('HomeTitle')),			
			'HomeDescription' => trim($this->input->post('HomeDescription')),		
			'AboutImage'=>$about_image,
			'IsActive' => $this->input->post('IsActive'),			
			'UpdatedOn'=>date('Y-m-d')		
			); 
			//print_r($data);die;
			$this->db->where("HomeAboutId",$HomeAboutId);
			$res=$this->db->update('tblhome',$data);		
			return $res;
	}

	
}
