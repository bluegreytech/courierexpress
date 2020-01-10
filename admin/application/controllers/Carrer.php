<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carrer extends CI_Controller 
{

	public function __construct()
	{
      	parent::__construct();
		$this->load->model('Carrer_model');  
    }

	public function carreradd()
	{      
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}   
			
		$data=array();	
		$data['CarrerId']=$this->input->post('CarrerId');
		$data['CarrerTitle']=$this->input->post('CarrerTitle');
		$data['CarrerDescription']=$this->input->post('CarrerDescription');
		$data['IsActive']=$this->input->post('IsActive');
	
		if($_POST)
		{	
				if($this->input->post("CarrerId")!="")
				{
					$this->Carrer_model->carrer_update();
					$this->session->set_flashdata('success', 'Record has been Updated Succesfully!');
					redirect('carrer');
					
				}
				else
				{ 
					$this->Carrer_model->carrer_insert();
					$this->session->set_flashdata('success', 'Record has been Inserted Succesfully!');
					redirect('carrer');
				
				}
		}	
			
			$data['activeTab']="carreradd";
			//$data['cityData']=$this->City_model->list_city();
			//print_r($data['cityData']);die;
			$data['carbrand']=$this->Carrer_model->getcarbrandlist();	
			$this->load->view('carrer/carreradd',$data);
				
	}


	function index()
	{	
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{	
			$data['activeTab']="carrerlist";		
			$data['result']=$this->Carrer_model->list_carrer();
			//echo "<pre>";print_r($data['result']);die;
			$this->load->view('carrer/carrerlist',$data);
		}
	}

	function editcarrer($CarrerId){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			$data=array();
			$result=$this->Carrer_model->getcarrerdata($CarrerId);
			//echo "<pre>";print_r($result);die;		
			$data['CarrerId']=$result['CarrerId'];
			$data['CarrerTitle']=$result['CarrerTitle'];
			$data['CarrerDescription']=$result['CarrerDescription'];
			$data['IsActive']=$result['IsActive'];

			//echo "<pre>";print_r($data);die;	
			$data['activeTab']="carreradd";
			$data['carbrand']=$this->Carrer_model->getcarbrandlist();	
			$this->load->view('carrer/carreradd',$data);	
		
	}

	function carrer_delete(){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			$data= array('IsActive' =>'Inactive','IsDelete' =>'1');
			$CarrerId=$this->input->post('CarrerId');
			$this->db->where("CarrerId",$CarrerId);			
			$res=$this->db->update('tblcarrer',$data);
			//echo $this->db->last_query();die;
			echo json_encode($res);
			die;
		}

	
}
