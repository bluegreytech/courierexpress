<?php

class Testimonial_model extends CI_Model
 {
	function testimonial_insert()
	{	
		$testimonial_image='';
			if(isset($_FILES['TestimonialImage']) &&  $_FILES['TestimonialImage']['name']!='')
			{
					$this->load->library('upload');
					$rand=rand(0,100000); 
					
				$_FILES['userfile']['name']     =   $_FILES['TestimonialImage']['name'];
				$_FILES['userfile']['type']     =   $_FILES['TestimonialImage']['type'];
				$_FILES['userfile']['tmp_name'] =   $_FILES['TestimonialImage']['tmp_name'];
				$_FILES['userfile']['error']    =   $_FILES['TestimonialImage']['error'];
				$_FILES['userfile']['size']     =   $_FILES['TestimonialImage']['size'];

				$config['file_name'] = $rand.'Testimonial';			
				$config['upload_path'] = base_path().'upload/testimonialimages/';		
				$config['allowed_types'] = 'jpg|jpeg|gif|png|bmp';  

					$this->upload->initialize($config);

					if (!$this->upload->do_upload())
					{
					$error =  $this->upload->display_errors();
					echo "<pre>";print_r($error);
					} 
				$picture = $this->upload->data();	
				//echo "<pre>";print_r($picture);die;		
				$testimonial_image=$picture['file_name'];
				if($this->input->post('pre_testimonial')!='')
					{
						if(file_exists(base_path().'upload/testimonialimages/'.$this->input->post('pre_testimonial')))
						{
							$link=base_path().'upload/testimonialimages/'.$this->input->post('pre_testimonial');
							unlink($link);
						}
					}
				} else {
					if($this->input->post('pre_testimonial')!='')
					{
						$testimonial_image=$this->input->post('pre_testimonial');
					}
			}

            $data = array(
			'FirstName'=>trim($this->input->post('FirstName')),	
			'LastName'=>trim($this->input->post('LastName')),	
			'ContactNumber' =>trim($this->input->post('ContactNumber')),			
			'TestimonialDescription'=>trim($this->input->post('TestimonialDescription')),
			'TestimonialImage'=>$testimonial_image,			
			'IsActive' =>$this->input->post('IsActive'),			
			'CreatedOn'=>date('Y-m-d')		
			);
		  // echo "<pre>";print_r($data);die;	
                    
            $res=$this->db->insert('tbltestimonial',$data);	
			return $res;
	}

	function gettestimoniallist(){
		$this->db->select('*');
		$this->db->from('tbltestimonial');
		$this->db->where('IsDelete','0');
		$this->db->order_by('TestimonialId','desc');
		$query=$this->db->get();
		$res = $query->result();
		return $res;

	}
	

	function getdata($TestimonialId){
		$this->db->select("*");
		$this->db->from("tbltestimonial");
		$this->db->where("IsDelete",'0');
		$this->db->where("TestimonialId",$TestimonialId);
	    $this->db->order_by('TestimonialId','desc');
		$query=$this->db->get();
		return $query->row_array();
	}

	function testimonial_update(){
		
		  	$TestimonialId=$this->input->post('TestimonialId');
	
		  	$testimonial_image='';
				
			if(isset($_FILES['TestimonialImage']) &&  $_FILES['TestimonialImage']['name']!='')
			{
				$this->load->library('upload');
				$rand=rand(0,100000); 
				
				$_FILES['userfile']['name']     =   $_FILES['TestimonialImage']['name'];
				$_FILES['userfile']['type']     =   $_FILES['TestimonialImage']['type'];
				$_FILES['userfile']['tmp_name'] =   $_FILES['TestimonialImage']['tmp_name'];
				$_FILES['userfile']['error']    =   $_FILES['TestimonialImage']['error'];
				$_FILES['userfile']['size']     =   $_FILES['TestimonialImage']['size'];

				$config['file_name'] = $rand.'Testimonial';			
				$config['upload_path'] = base_path().'upload/testimonialimages/';		
				$config['allowed_types'] = 'jpg|jpeg|gif|png|bmp';  

				$this->upload->initialize($config);

				if (!$this->upload->do_upload())
				{
					$error =  $this->upload->display_errors();
					echo "<pre>";print_r($error);
				} 
				$picture = $this->upload->data();	
				//echo "<pre>";print_r($picture);die;		
				$testimonial_image=$picture['file_name'];
				if($this->input->post('pre_testimonial')!='')
					{
						if(file_exists(base_path().'upload/testimonialimages/'.$this->input->post('pre_testimonial')))
						{
							$link=base_path().'upload/testimonialimages/'.$this->input->post('pre_testimonial');
							unlink($link);
						}
					}
				} else {
					if($this->input->post('pre_testimonial')!='')
					{
						$testimonial_image=$this->input->post('pre_testimonial');
					}
			}

            $data = array(
			'FirstName' =>trim($this->input->post('FirstName')),
			'LastName' =>trim($this->input->post('LastName')),	
			'ContactNumber' =>trim($this->input->post('ContactNumber')),			
			'TestimonialDescription' => trim($this->input->post('TestimonialDescription')),
			'TestimonialImage'=>$testimonial_image,		
			'IsActive' => $this->input->post('IsActive'),
			'ApproveStatus' =>$this->input->post('ApproveStatus'),			
			'CreatedOn'=>date('Y-m-d')		
			); 
			//print_r($data);die;
			$this->db->where("TestimonialId",$TestimonialId);
			$res=$this->db->update('tbltestimonial',$data);		
			return $res;
	}

	
}
