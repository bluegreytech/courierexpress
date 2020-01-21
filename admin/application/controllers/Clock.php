<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clock extends CI_Controller {

	public function __construct()
	{
      	parent::__construct();
		$this->load->model('Clock_model');
      
    }

	function clocklist()
	{	
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{	
			$data['activeTab']="clocklist";		
			$data['result']=$this->Clock_model->getclock();
			//echo "<pre>";print_r($data['result']);die;	
			$this->load->view('clock/clocklist',$data);
		}
	}
	
	public function clockadd()
	{      
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}   
			
		$data=array();	
		$data['ClockId']=$this->input->post('ClockId');
		$data['CountryTitle']=$this->input->post('CountryTitle');
		$data['CountryTime']=$this->input->post('CountryTime');
		$data['CountryTimeZone']=$this->input->post('CountryTimeZone');
		$data['TimeScope']=$this->input->post('TimeScope');
		$data['IsActive']=$this->input->post('IsActive');

		if($_POST)
		{	
				if($this->input->post("ClockId")!="")
				{
					$this->Clock_model->clock_update();
					$this->session->set_flashdata('success', 'Record has been Updated Succesfully!');
					redirect('clock/clocklist');
					
				}
				else
				{ 
					$this->Clock_model->clock_add();
					$this->session->set_flashdata('success', 'Record has been Inserted Succesfully!');
					redirect('clock/clocklist');
				
				}
		}	
			
		    $data['activeTab']="clockadd";	
			$this->load->view('clock/clockadd',$data);
				
	}
	
	function editclock($ClockId){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			$data=array();
			$result=$this->Clock_model->getdata($ClockId);	
			$data['redirect_page']='aboutlist';
			$data['ClockId']=$result['ClockId'];
			$data['CountryTitle']=$result['CountryTitle'];	
			$data['CountryTime']=$result['CountryTime'];			
	      	$data['CountryTimeZone']=$result['CountryTimeZone'];
	      	$data['TimeScope']=$result['TimeScope'];
			$data['IsActive']=$result['IsActive'];
			//echo "<pre>";print_r($data);die;	
			$data['activeTab']="clockadd";	
			$this->load->view('clock/clockadd',$data);	
		
	}


	function clock_delete(){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			$data= array('IsActive' =>'Inactive','IsDelete' =>'1');
			$ClockId=$this->input->post('ClockId');
			$this->db->where("ClockId",$ClockId);			
			$res=$this->db->update('tblclock',$data);
			//echo $this->db->last_query();die;
			echo json_encode($res);
			die;
		
	}

	
}
