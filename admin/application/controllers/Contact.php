<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function __construct()
	{
      	parent::__construct();
		$this->load->model('Contact_model');
      
    }

	function Contactlist()
	{	
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{	
			$data['activeTab']="contactlist";		
			$data['result']=$this->Contact_model->getcontact();
			$this->load->view('contact/contactlist',$data);
		}
	}
	

	function contact_delete(){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			$data= array('IsDelete' =>'1');
			$ContactId=$this->input->post('ContactId');
			$this->db->where("ContactId",$ContactId);			
			$res=$this->db->update('tblcontactus',$data);
			//echo $this->db->last_query();die;
			echo json_encode($res);
			die;
		
	}


	function luxuryquotelist()
	{	
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{	
			$data['activeTab']="luxuryquotelist";		
			$data['result']=$this->Contact_model->get_luxuryquotelist();
			$this->load->view('contact/luxuryquoteslist',$data);
		}
	}
	

	function luxurysegment_delete(){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			$data= array('IsActive'=>'Inactive','IsDelete' =>'1');
			$LuxuryQuoteId=$this->input->post('LuxuryQuoteId');
			$this->db->where("LuxuryQuoteId",$LuxuryQuoteId);			
			$res=$this->db->update('tblluxuryquotes',$data);
			//echo $this->db->last_query();die;
			echo json_encode($res);
			die;
		
	}


	function carrierlist()
	{	
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{	
			$data['activeTab']="carrierlist";		
			$data['result']=$this->Contact_model->get_carrierlist();
			$this->load->view('contact/carrierlist',$data);
		}
	}

	function carrier_delete(){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			$data= array('IsActive'=>'Inactive','IsDelete' =>'1');
			$CarrierInquiryId=$this->input->post('CarrierInquiryId');
			$this->db->where("CarrierInquiryId",$CarrierInquiryId);			
			$res=$this->db->update('tblcarrierinquiry',$data);
			//echo $this->db->last_query();die;
			echo json_encode($res);
			die;
		
	}
	
}
