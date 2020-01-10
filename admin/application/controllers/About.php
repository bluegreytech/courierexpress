<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	public function __construct()
	{
      	parent::__construct();
		$this->load->model('About_model');
      
    }

	function Aboutlist()
	{	
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{	
			$data['activeTab']="aboutuslist";		
			$data['result']=$this->About_model->getabout();
			$this->load->view('about/aboutuslist',$data);
		}
	}
	
	public function Aboutadd()
	{      
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}   
			
		$data=array();	
		//$data['redirect_page']='aboutlist';
		$data['AboutusId']=$this->input->post('AboutusId');
		$data['AboutTitle']=$this->input->post('AboutTitle');
		$data['AboutDescription']=$this->input->post('AboutDescription');
		$data['SecondTitle']=$this->input->post('SecondTitle');
		$data['SecondDescription']=$this->input->post('SecondDescription');
		$data['ThirdTitle']=$this->input->post('ThirdTitle');
		$data['ThirdDescription']=$this->input->post('ThirdDescription');
		$data['FourthTitle']=$this->input->post('FourthTitle');
		$data['FourthDescription']=$this->input->post('FourthDescription');
		$data['IsActive']=$this->input->post('IsActive');

		if($_POST)
		{	
				if($this->input->post("AboutusId")!="")
				{
					$this->About_model->about_update();
					$this->session->set_flashdata('success', 'Record has been Updated Succesfully!');
					redirect('About/Aboutlist');
					
				}
				else
				{ 
					$this->About_model->about_insert();
					$this->session->set_flashdata('success', 'Record has been Inserted Succesfully!');
					redirect('About/Aboutlist');
				
				}
		}	
			
		    $data['activeTab']="aboutusadd";	
			$this->load->view('About/aboutusadd',$data);
				
	}
	
	function Editabout($AboutusId){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			$data=array();
			$result=$this->About_model->getdata($AboutusId);	
			$data['redirect_page']='aboutlist';
			$data['AboutusId']=$result['AboutusId'];
			$data['AboutTitle']=$result['AboutTitle'];	
			$data['AboutDescription']=$result['AboutDescription'];	
			$data['SecondTitle']=$result['SecondTitle'];	
			$data['SecondDescription']=$result['SecondDescription'];
			$data['ThirdTitle']=$result['ThirdTitle'];	
			$data['ThirdDescription']=$result['ThirdDescription'];
			$data['FourthTitle']=$result['FourthTitle'];	
			$data['FourthDescription']=$result['FourthDescription'];		
	      	$data['AboutImage']=$result['AboutImage'];
			$data['IsActive']=$result['IsActive'];
			$data['activeTab']="Editabout";	
			//echo "<pre>";print_r($data);die;	
			$data['activeTab']="aboutusadd";	
			$this->load->view('About/aboutusadd',$data);	
		
	}

	function updatedata($ProjectId){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{
		$result=$this->About_model->updatedata($ProjectId);	
    	if($result=='1'){
		  $this->session->set_flashdata('success', 'Record has been updated Succesfully!');
		 	redirect('Project/Projectlist');	
			}
			redirect('Project/Projectlist');
		}
	}

	function about_delete(){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			$data= array('IsDelete' =>'1');
			$AboutusId=$this->input->post('AboutusId');
			$this->db->where("AboutusId",$AboutusId);			
			$res=$this->db->update('tblaboutus',$data);
			//echo $this->db->last_query();die;
			echo json_encode($res);
			die;
		
	}

	
}
