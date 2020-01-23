<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	public function __construct()
	{
      	parent::__construct();
		$this->load->model('News_model');
      
    }

	function newslist()
	{	
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{	
			$data['activeTab']="newslist";		
			$data['result']=$this->News_model->getnews();
			$this->load->view('news/newslist',$data);
		}
	}
	
	public function newsadd()
	{      
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}   
			
		$data=array();	
		$data['NewsId']=$this->input->post('NewsId');
		$data['NewsTitle']=$this->input->post('NewsTitle');
		$data['NewsDescription']=$this->input->post('NewsDescription');
		// $data['ProductImage']=$this->input->post('ProductImage');
		$data['IsActive']=$this->input->post('IsActive');
		if($_POST)
		{	
			if($this->input->post("NewsId")!="")
			{
				$this->News_model->news_update();
				$this->session->set_flashdata('success', 'Record has been Updated Succesfully!');
				redirect('news/newslist');	
			}
			else
			{ 
				$this->News_model->news_add();
				$this->session->set_flashdata('success', 'Record has been Inserted Succesfully!');
				redirect('news/newslist');
			}
		}	
			
		    $data['activeTab']="newsadd";	
			$this->load->view('news/newsadd',$data);
				
	}
	
	function editnews($NewsId){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			$data=array();
			$result=$this->News_model->getdata($NewsId);	
			$data['redirect_page']='aboutlist';
			$data['NewsId']=$result['NewsId'];
			$data['NewsTitle']=$result['NewsTitle'];	
			$data['NewsDescription']=$result['NewsDescription'];			
	      	// $data['ProductImage']=$result['ProductImage'];
			$data['IsActive']=$result['IsActive'];
			//echo "<pre>";print_r($data);die;	
			$data['activeTab']="newsadd";	
			$this->load->view('news/newsadd',$data);	
		
	}


	function news_delete(){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
			$data= array('IsActive' =>'Inactive','IsDelete' =>'1');
			$NewsId=$this->input->post('NewsId');
			$this->db->where("NewsId",$NewsId);			
			$res=$this->db->update('tblnews',$data);
			//echo $this->db->last_query();die;
			echo json_encode($res);
			die;
		
	}

	
}
