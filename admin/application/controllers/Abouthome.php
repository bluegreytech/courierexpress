<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Abouthome extends CI_Controller {

	public function __construct()
	{
      	parent::__construct();
		$this->load->model('Home_model');
      
    }

	function index()
	{	
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{	
			$data['activeTab']="homelist";
			$data['result']=$this->Home_model->gethome();
			//print_r($data['result']);die;		
			$this->load->view('abouthome/homelist',$data);
		}
	}
	
	public function homeadd()
	{      
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}   
			
		$data=array();	
		//$data['redirect_page']='aboutlist';
		$data['HomeAboutId']=$this->input->post('HomeAboutId');
		$data['HomeTitle']=$this->input->post('HomeTitle');
		$data['HomeDescription']=$this->input->post('HomeDescription');
		$data['AboutImage']=$this->input->post('AboutImage');
		$data['IsActive']=$this->input->post('IsActive');
		

		if($_POST)
		{	
				if($this->input->post("HomeAboutId")!="")
				{
					$this->Home_model->home_update();
					$this->session->set_flashdata('success', 'Record has been Updated Succesfully!');
					redirect('abouthome');
					
				}
				else
				{ 
					$this->Home_model->home_add();
					$this->session->set_flashdata('success', 'Record has been Inserted Succesfully!');
					redirect('abouthome');
				
				}
		}	
			
		    $data['activeTab']="homeadd";	
			$this->load->view('abouthome/homeadd',$data);
				
	}
	
	function Edithome($HomeAboutId){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			$data=array();
			$result=$this->Home_model->getdata($HomeAboutId);	
			//$data['redirect_page']='aboutlist';
			$data['HomeAboutId']=$result['HomeAboutId'];
			$data['HomeTitle']=$result['HomeTitle'];	
			$data['HomeDescription']=$result['HomeDescription'];	
			$data['AboutImage']=$result['AboutImage'];	
			$data['IsActive']=$result['IsActive'];
			$data['activeTab']="Editabouthome";	
			//echo "<pre>";print_r($data);die;	
			$data['activeTab']="homeadd";	
			$this->load->view('abouthome/homeadd',$data);	
		
	}

	function home_delete(){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			$data= array("IsActive"=>'Inactive',"IsDelete" =>'1');
			$HomeAboutId=$this->input->post('HomeAboutId');
			$this->db->where("HomeAboutId",$HomeAboutId);			
			$res=$this->db->update('tblhome',$data);
			//echo $this->db->last_query();die;
			echo json_encode($res);
			die;
		
	}

	
}
