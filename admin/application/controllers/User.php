<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
      	parent::__construct();
		$this->load->model('User_model');
      
    }

	function Userlist()
	{	
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{	
			$data['activeTab']="Userlist";	
			$data['result']=$this->User_model->userlist();	
			//echo "<pre>";print_r($data["result"]);die;		
			$data['redirect_page']="userlist";
			$this->load->view('User/UserList',$data);
		}
	}

	public function Useradd()
	{   
		// print_r($_POST);die;
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}   
			$data=array();
			$data['activeTab']="Useradd";	
			$this->load->library("form_validation");
			$this->form_validation->set_rules('FirstName', 'Full Name', 'required');
			$this->form_validation->set_rules('ContactNumber', 'Mobileno', 'required');
		
			if($this->form_validation->run() == FALSE)
			{	
				//echo "gygu";die;
				if(validation_errors())
				{
					$data["error"] = validation_errors();
					//echo "<pre>";print_r($data["error"]);die;
				}else{
					$data["error"] = "";
				}
	           //	$data['redirect_page']="userlist";
				$data['UserId']=$this->input->post('UserId');
				$data['FirstName']=$this->input->post('FirstName');
				$data['LastName']=$this->input->post('LastName');	
				$data['EmailAddress']=$this->input->post('EmailAddress');
				$data['ContactNumber']=$this->input->post('ContactNumber');
				$data['IsActive']=$this->input->post('IsActive');
				$data['payment_status']=$this->input->post('payment_status');	
			}
			else
			{
					//echo "sdgddg";   die;
					if($this->input->post("UserId")!="")
					{	
						$this->User_model->user_update();
						$this->session->set_flashdata('success', 'Record has been Updated Succesfully!');
						redirect('User/Userlist');
						
					}
					else
					{ 
						$this->User_model->user_insert();
						$this->session->set_flashdata('success', 'Record has been Inserted Succesfully!');
						redirect('User/Userlist');
					
					}
				
			}
			     $this->load->view('User/UserAdd',$data);	
	}
	
	function Edituser($UserId){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{
			$data=array();
			$data['activeTab']="AddUser";	
			$result=$this->User_model->getdata($UserId);
			//print_r($result);die;	
			$data['UserId']=$result['UserId'];
			$data['FirstName']=$result['FirstName'];
			$data['LastName']=$result['LastName'];	
			$data['EmailAddress']=$result['EmailAddress'];	
			$data['ContactNumber']=$result['ContactNumber'];	
			$data['IsActive']=$result['IsActive'];
			$data['payment_status']=$result['payment_status'];	
			$data['redirect_page']="userlist";		
			$this->load->view('User/UserAdd',$data);	
		}
	}

	function updatedata($UserId){
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{
		$result=$this->User_model->updatedata($UserId);	
    	if($result=='1'){
		  $this->session->set_flashdata('success', 'Record has been updated Succesfully!');
		 	redirect('User/Userlist');	
			}
			redirect('User/Userlist');
		}
	}

	function deletedata(){
		
		if(!check_admin_authentication())
		{ 
			redirect(base_url());
		}
		$data= array('IsDelete' =>'1','IsActive'=>'Inactive');
		$UserId=$this->input->post('UserId');
		$this->db->where("UserId",$UserId);
		$res=$this->db->update('tbluser',$data);
		echo json_encode($res);
		die;
		
	}

	function Cabhistory($ContactNumber)
	{
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}else{
			$data=array();
			$data['activeTab']="AddUser";	
			$data['cabhistory']=$this->User_model->get_cabhistory($ContactNumber);
			//echo "<pre>";print_r($data['cabhistory']);die;	
			$data['redirect_page']="userlist";		
			$this->load->view('User/Usercabhistorylist',$data);	
		}
	}

	function ajaxuserdata()
	{	
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
		
		$UserId=$this->input->post('UserId');
		$result=$this->User_model->getajaxdata($UserId);
		echo json_encode($result);
		//die;
	}
    
}
