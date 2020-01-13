<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {

	public function __construct()
	{
      	parent::__construct();
		$this->load->model('Services_model');
      
    }

	function servicelist()
	{	
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{	
			$data['activeTab']="servicelist";		
			$data['result']=$this->Services_model->getservice();
			$this->load->view('services/servicelist',$data);
		}
	}
	
	public function serviceadd()
	{      
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}   
			
		$data=array();	
		$data['ServiceId']=$this->input->post('ServiceId');
		$data['ServiceName']=$this->input->post('ServiceName');
		$data['ServiceTitle']=$this->input->post('ServiceTitle');
		$data['ServiceDescription']=$this->input->post('ServiceDescription');
		$data['IsActive']=$this->input->post('IsActive');

		if($_POST)
		{	
				if($this->input->post("ServiceId")!="")
				{
					$this->Services_model->service_update();
					$this->session->set_flashdata('success', 'Record has been Updated Succesfully!');
					redirect('services/servicelist');
					
				}
				else
				{ 
					$this->Services_model->service_add();
					$this->session->set_flashdata('success', 'Record has been Inserted Succesfully!');
					redirect('services/servicelist');
				
				}
		}	
			
		    $data['activeTab']="serviceadd";	
			$this->load->view('services/serviceadd',$data);
				
	}
	
	function editservice($ServiceId){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			$data=array();
			$result=$this->Services_model->getdata($ServiceId);	
			$data['redirect_page']='aboutlist';
			$data['ServiceId']=$result['ServiceId'];
			$data['ServiceName']=$result['ServiceName'];
			$data['ServiceTitle']=$result['ServiceTitle'];	
			$data['ServiceDescription']=$result['ServiceDescription'];			
			$data['IsActive']=$result['IsActive'];
			//echo "<pre>";print_r($data);die;	
			$data['activeTab']="serviceadd";	
			$this->load->view('services/serviceadd',$data);	
		
	}


	function service_delete(){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			$data= array('IsActive' =>'Inactive','IsDelete' =>'1');
			$ServiceId=$this->input->post('ServiceId');
			$this->db->where("ServiceId",$ServiceId);			
			$res=$this->db->update('tblservice',$data);
			//echo $this->db->last_query();die;
			echo json_encode($res);
			die;
		
	}

	
}
