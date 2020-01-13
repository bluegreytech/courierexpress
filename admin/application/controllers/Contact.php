<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function __construct()
	{
      	parent::__construct();
		$this->load->model('Contact_model');
      
    }

	function inquirylist()
	{	
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{	
			$data['activeTab']="inquirylist";		
			$data['result']=$this->Contact_model->getinquirylist();
			$this->load->view('contact/inquirylist',$data);
		}
	}
	

	function inquiry_delete(){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
	
			$data= array('IsDelete' =>'1');
			$ContactId=$this->input->post('ContactId');
			$this->db->where("ContactId",$ContactId);			
			$res=$this->db->update('tblinquiry',$data);
			//echo $this->db->last_query();die;
			echo json_encode($res);
			die;
		
	}


	function contactlist()
	{	
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{	
			$data['activeTab']="contactlist";		
			$data['result']=$this->Contact_model->getcontact();
			$this->load->view('contact/contactlist',$data);
		}
	}
	
	public function contactadd()
	{      
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}   
			
		$data=array();	
		$data['OfficeId']=$this->input->post('OfficeId');
		$data['OfficeTitle']=$this->input->post('OfficeTitle');
		$data['OfficeLocation']=$this->input->post('OfficeLocation');
		$data['Address']=$this->input->post('Address');
		$data['ContactPersonName']=$this->input->post('ContactPersonName');
		$data['LandlineNumber']=$this->input->post('LandlineNumber');
		$data['ContactNumber']=$this->input->post('ContactNumber');
		$data['EmailAddress']=$this->input->post('EmailAddress');
		$data['IsActive']=$this->input->post('IsActive');

		if($_POST)
		{	
				if($this->input->post("OfficeId")!="")
				{
					$this->Contact_model->contact_update();
					$this->session->set_flashdata('success', 'Record has been Updated Succesfully!');
					redirect('contact/contactlist');
					
				}
				else
				{ 
					$this->Contact_model->contact_add();
					$this->session->set_flashdata('success', 'Record has been Inserted Succesfully!');
					redirect('contact/contactlist');
				
				}
		}	
			
		    $data['activeTab']="contactadd";	
			$this->load->view('contact/contactadd',$data);
				
	}
	
	function editcontact($OfficeId){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			$data=array();
			$result=$this->Contact_model->getdata($OfficeId);	
			$data['redirect_page']='aboutlist';
			$data['OfficeId']=$result['OfficeId'];
			$data['OfficeTitle']=$result['OfficeTitle'];
			$data['OfficeLocation']=$result['OfficeLocation'];
			$data['Address']=$result['Address'];	
			$data['ContactPersonName']=$result['ContactPersonName'];
			$data['LandlineNumber']=$result['LandlineNumber'];
			$data['ContactNumber']=$result['ContactNumber'];
			$data['EmailAddress']=$result['EmailAddress'];		
			$data['IsActive']=$result['IsActive'];
			//echo "<pre>";print_r($data);die;	
			$data['activeTab']="contactadd";	
			$this->load->view('contact/contactadd',$data);	
		
	}


	function contact_delete(){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			$data= array('IsActive' =>'Inactive','IsDelete' =>'1');
			$OfficeId=$this->input->post('OfficeId');
			$this->db->where("OfficeId",$OfficeId);			
			$res=$this->db->update('tblcontact',$data);
			//echo $this->db->last_query();die;
			echo json_encode($res);
			die;
		
	}


	
}
