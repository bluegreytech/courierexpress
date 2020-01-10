<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonial extends CI_Controller {

	public function __construct()
	{
      	parent::__construct();
		$this->load->model('Testimonial_model');
      
    }

	function Testimoniallist()
	{	
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{	
			$data['activeTab']="testimoniallist";		
			$data['result']=$this->Testimonial_model->gettestimoniallist();
			$this->load->view('testimonial/testimoniallist',$data);
		}
	}
	
	public function Testimonialadd()
	{      
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}   
			
		$data=array();	
		//$data['redirect_page']='aboutlist';
		$data['TestimonialId']=$this->input->post('TestimonialId');
		$data['FirstName']=$this->input->post('FirstName');
		$data['LastName']=$this->input->post('LastName');
		$data['ContactNumber']=$this->input->post('ContactNumber');
		$data['TestimonialDescription']=$this->input->post('TestimonialDescription');
		$data['TestimonialImage']=$this->input->post('TestimonialImage');
		$data['IsActive']=$this->input->post('IsActive');
		$data['ApproveStatus']=$this->input->post('ApproveStatus');

		if($_POST)
		{	
				if($this->input->post("TestimonialId")!="")
				{
					$this->Testimonial_model->testimonial_update();
					$this->session->set_flashdata('success', 'Record has been Updated Succesfully!');
					redirect('Testimonial/Testimoniallist');
					
				}
				else
				{ 
					$this->Testimonial_model->testimonial_insert();
					$this->session->set_flashdata('success', 'Record has been Inserted Succesfully!');
					redirect('Testimonial/Testimoniallist');
				
				}
		}	
			
		    $data['activeTab']="testimonialadd";	
			$this->load->view('testimonial/testimonialadd',$data);
				
	}
	
	function Edittestimonial($TestimonialId){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			$data=array();
			$result=$this->Testimonial_model->getdata($TestimonialId);	
			$data['TestimonialId']=$result['TestimonialId'];
			$data['FirstName']=$result['FirstName'];
			$data['LastName']=$result['LastName'];	
			$data['ContactNumber']=$result['ContactNumber'];	
			$data['TestimonialDescription']=$result['TestimonialDescription'];
			$data['TestimonialImage']=$result['TestimonialImage'];		
			$data['IsActive']=$result['IsActive'];	
			$data['ApproveStatus']=$result['ApproveStatus'];
			//echo "<pre>";print_r($data);die;	
			$data['activeTab']="testimonialadd";	
			$this->load->view('testimonial/testimonialadd',$data);	
		
	}

	function updatedata($ProjectId){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{
		$result=$this->Testimonial_model->updatedata($ProjectId);	
    	if($result=='1'){
		  $this->session->set_flashdata('success', 'Record has been updated Succesfully!');
		 	redirect('Project/Projectlist');	
			}
			redirect('Project/Projectlist');
		}
	}

	function testimonial_delete(){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			$data= array('IsDelete' =>'1','IsActive' =>'Inactive');
			$TestimonialId=$this->input->post('TestimonialId');
			$this->db->where("TestimonialId",$TestimonialId);			
			$res=$this->db->update('tbltestimonial',$data);
			//echo $this->db->last_query();die;
			echo json_encode($res);
			die;
		
	}

	
}
