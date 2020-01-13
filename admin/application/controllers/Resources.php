<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resources extends CI_Controller {

	public function __construct()
	{
      	parent::__construct();
		$this->load->model('Resources_model');
      
    }

	function resourceslist()
	{	
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{	
			$data['activeTab']="resourceslist";		
			$data['result']=$this->Resources_model->getresources();
			$this->load->view('resources/resourceslist',$data);
		}
	}
	
	public function resourcesadd()
	{      
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}   
			
		$data=array();	
		$data['ResourcesId']=$this->input->post('ResourcesId');
		$data['ResourcesTitle']=$this->input->post('ResourcesTitle');
		$data['IsActive']=$this->input->post('IsActive');
		if($_POST)
		{	
				if($this->input->post("ResourcesId")!="")
				{
					$this->Resources_model->resources_update();
					$this->session->set_flashdata('success', 'Record has been Updated Succesfully!');
					redirect('Resources/resourceslist');
					
				}
				else
				{ 
					$this->Resources_model->resources_add();
					$this->session->set_flashdata('success', 'Record has been Inserted Succesfully!');
					redirect('Resources/resourceslist');
				
				}
		}	
			
		    $data['activeTab']="resourcesadd";	
			$this->load->view('resources/resourcesadd',$data);
				
	}
	
	function editresources($ResourcesId){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			$data=array();
			$result=$this->Resources_model->getdata($ResourcesId);	
			$data['redirect_page']='aboutlist';
			$data['ResourcesId']=$result['ResourcesId'];
			$data['ResourcesTitle']=$result['ResourcesTitle'];			
			$data['IsActive']=$result['IsActive'];
			//echo "<pre>";print_r($data);die;	
			$data['activeTab']="resourcesadd";	
			$this->load->view('resources/resourcesadd',$data);	
		
	}


	function resources_delete(){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			$data= array('IsActive' =>'Inactive','IsDelete' =>'1');
			$ResourcesId=$this->input->post('ResourcesId');
			$this->db->where("ResourcesId",$ResourcesId);			
			$res=$this->db->update('tblresources',$data);
			//echo $this->db->last_query();die;
			echo json_encode($res);
			die;
		
	}

	
}
