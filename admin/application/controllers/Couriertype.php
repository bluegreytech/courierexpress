<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Couriertype extends CI_Controller {

	public function __construct()
	{
      	parent::__construct();
		$this->load->model('Couriertype_model');
      
    }

	function courierlist()
	{	
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{	
			$data['activeTab']="courierlist";		
			$data['result']=$this->Couriertype_model->getcourier();
			$this->load->view('couriertype/courierlist',$data);
		}
	}
	
	public function courieradd()
	{      
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}   
			
		$data=array();	
		$data['CourierId']=$this->input->post('CourierId');
		$data['CourierName']=$this->input->post('CourierName');
		$data['CourierSite']=$this->input->post('CourierSite');
		$data['CourierImage']=$this->input->post('CourierImage');
		$data['IsActive']=$this->input->post('IsActive');

		if($_POST)
		{	//print_r($_POST);die;
				if($this->input->post("CourierId")!="")
				{
					$this->Couriertype_model->courier_update();
					$this->session->set_flashdata('success', 'Record has been Updated Succesfully!');
					redirect('couriertype/courierlist');
					
				}
				else
				{ 
					$this->Couriertype_model->courier_add();
					$this->session->set_flashdata('success', 'Record has been Inserted Succesfully!');
					redirect('couriertype/courierlist');
				
				}
		}	
			
		    $data['activeTab']="courieradd";	
			$this->load->view('couriertype/courieradd',$data);
				
	}
	
	function editcourier($CourierId){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			$data=array();
			$result=$this->Couriertype_model->getdata($CourierId);	
			$data['redirect_page']='aboutlist';
			$data['CourierId']=$result['CourierId'];
			$data['CourierName']=$result['CourierName'];	
			$data['CourierSite']=$result['CourierSite'];			
	      	$data['CourierImage']=$result['CourierImage'];
			$data['IsActive']=$result['IsActive'];
			//echo "<pre>";print_r($data);die;	
			$data['activeTab']="courieradd";	
			$this->load->view('couriertype/courieradd',$data);	
		
	}


	function courier_delete(){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			$data= array('IsActive' =>'Inactive','IsDelete' =>'1');
			$CourierId=$this->input->post('CourierId');
			$this->db->where("CourierId",$CourierId);			
			$res=$this->db->update('tblcourier',$data);
			//echo $this->db->last_query();die;
			echo json_encode($res);
			die;
		
	}

	
}
