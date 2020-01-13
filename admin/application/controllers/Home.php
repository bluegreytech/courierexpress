<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
      	parent::__construct();
		$this->load->model('Login_model');
		$this->load->model('user_model');
      
	}

	public function SitesettingAdd()
	{      
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}   
			
		$data=array();	
		//$data['redirect_page']='aboutlist';
		$data['SettingId']=$this->input->post('SettingId');
		$data['FullName']=$this->input->post('FullName');
		$data['SiteName']=$this->input->post('SiteName');
		$data['SiteEmail']=$this->input->post('SiteEmail');
		$data['SiteContactNumber']=$this->input->post('SiteContactNumber');
		$data['OtherContactNumber']=$this->input->post('OtherContactNumber');
		$data['OfficeAddress']=$this->input->post('OfficeAddress');
		$data['OfficeTime']=$this->input->post('OfficeTime');
		$data['Tax']=$this->input->post('Tax');
		$data['HappyClients']=$this->input->post('HappyClients');
		$data['TripsDaily']=$this->input->post('TripsDaily');
		$data['Cabs']=$this->input->post('Cabs');
		$data['KilometersDaily']=$this->input->post('KilometersDaily');
		if($_POST)
		{	
				if($this->input->post("SettingId")!="")
				{
					$this->Login_model->sitesetting_update();
					$this->session->set_flashdata('success', 'Your data has been Updated Succesfully!');
					redirect('home/Sitesetting');
				}
				else
				{ 
					
				
				}
		}	
			
			$data['activeTab']="sitesetting";	
			$this->load->view('common/sitesetting',$data);
				
	}
	
	public function Sitesetting()
	{
		if(!check_admin_authentication()){ 
			redirect(base_url());
		}
		$data=array();
		$result=$this->Login_model->get_sitedata();	
		//$data['redirect_page']='aboutlist';
		$data['SettingId']=$result['SettingId'];
		$data['FullName']=$result['FullName'];	
		$data['SiteName']=$result['SiteName'];		
		$data['SiteEmail']=$result['SiteEmail'];
		$data['SiteContactNumber']=$result['SiteContactNumber'];
		$data['OtherContactNumber']=$result['OtherContactNumber'];
		$data['OfficeAddress']=$result['OfficeAddress'];
		$data['OfficeTime']=$result['OfficeTime'];
		$data['Tax']=$result['Tax'];
		$data['HappyClients']=$result['HappyClients'];
		$data['TripsDaily']=$result['TripsDaily'];
		$data['Cabs']=$result['Cabs'];
		$data['KilometersDaily']=$result['KilometersDaily'];
		$data['activeTab']="Editabout";	
		//echo "<pre>";print_r($data);die;	
		$data['activeTab']="sitesettinglist";	
		$this->load->view('common/sitesetting',$data);	
	}

	public function dashboard()
	{ 
		if(!check_admin_authentication()){
			redirect(base_url());
		}		
		
		$data['branch']=$this->Login_model->getbranch();
		$data['users']=$this->Login_model->getuser();
		$data['inquiry']=$this->Login_model->get_inquiry();
		$data['product']=$this->Login_model->get_product();
		$data['services']=$this->Login_model->get_services();
		$data['resources']=$this->Login_model->get_resources();
		$data['recentlyuser']=$this->Login_model->get_recentuser();
		$data['activeTab']="dashboard";
		//echo count($data['inquiry']); die;
		$this->load->view('common/dashboard',$data);
	}

	public function profile($msg='')
    {  //echo "fdsf";die;
            
		if(!check_admin_authentication())
		{
		redirect('login');
		}
                
		$data = array();
		$data['activeTab']="profile";
		//echo "<pre>";print_r($_POST);die;
        $this->load->library('form_validation');
		$this->form_validation->set_rules('EmailAddress', 'Email', 'required|valid_email|callback_adminmail_check');
		$this->form_validation->set_rules('full_name', 'Full Name', 'required');
		$this->form_validation->set_rules('AdminContact', 'Contact', 'required');
		$this->form_validation->set_rules('EmailAddress', 'Email', 'required');		
		
		if($this->form_validation->run() == FALSE){	
		
			if(validation_errors())
			{
				$data["error"] = validation_errors();
				//echo "<pre>";print_r($data);die;
			}else{
				$data["error"] = "";
			}
			if($_POST){			
				$data["EmailAddress"] = $this->input->post('EmailAddress');
				$data["first_name"]   = $this->input->post('first_name');
				$data["last_name"]    = $this->input->post('last_name');
				$data["phone"]        = $this->input->post('phone');
				$data["gender"]       = $this->input->post('gender');
                //$data['pre_profile_image']=$this->input->post('pre_profile_image');
			
			}else{
			$oneAdmin=get_one_admin(get_authenticateadminID());
			//print_r($oneAdmin);die;
			$data["EmailAddress"] 	= $oneAdmin->EmailAddress;
			$data["full_name"] = $oneAdmin->FullName;				
			$data["contact"]      = $oneAdmin->AdminContact;			
           	$data['ProfileImage']=$oneAdmin->ProfileImage;
           	$data['IsActive']=$oneAdmin->IsActive;
			
			}
		}else{
			//echo "else fdf";die;
            $this->session->set_flashdata('successmsg', 'Profile has been updated successfully');				
			$res=$this->Login_model->updateProfile();
			redirect('home/profile/');
		}
		$data['msg'] = $msg; //login success message
		$offset = 0;
		 $limit =10;

        $this->load->view('common/profile',$data);    
            
    }

	function adminmail_check($email)
	{  //echo $email; die;

		$query = $this->db->query("select Email from ".$this->db->dbprefix('tbluser')." where Email = '$email' and UserId!='".get_authenticateadminID()."'");

		if($query->num_rows() == 0)
		{
		return TRUE;
		}
		else
		{
		$this->form_validation->set_message('adminmail_check', 'There is an existing account associated with this Email');
		return FALSE;
		}
	}
   
   public function logout()
	{
		
			$this->session->sess_destroy();
			redirect('Login');
	

	}   
	
	public function Forgotpassword($msg='')
	{
		$this->form_validation->set_rules('EmailAddress', 'Email', 'required|valid_email');

			if($this->form_validation->run() == FALSE){			
				if(validation_errors())
				{
					echo json_encode(array("status"=>"error","msg"=>validation_errors()));
				}
			}
			else
			{ 
			
				$chk_mail=$this->Login_model->forgot_email();
				//echo $chk_mail;die;
				if($chk_mail==0)
				{
					$error=EMAIL_NOT_FOUND;
					 $this->session->set_flashdata('error',EMAIL_NOT_FOUND);
	              
				}
				elseif($chk_mail==2)
				{
				 	$error=EMAIL_NOT_FOUND;
					$this->session->set_flashdata('error',EMAIL_NOT_FOUND);   
				}elseif($chk_mail==3)
				{
					$error=ACCOUNT_INACTIVE;
					 $this->session->set_flashdata('error',ACCOUNT_INACTIVE);
					 
				}
				else
				{				
					$forget=FORGET_SUCCESS;
					
					 $this->session->set_flashdata('success','Please check your email for reset the password!');
					redirect('login');

				}
			}
		$this->load->view('common/ForgotPassword');
	}


	function reset_password($code='')
	{
		if(check_admin_authentication())
		{
			redirect('home/dashbord');
		}
			
			$admin_id=$this->Login_model->checkResetCode($code);
			//print_r($admin_id);die;

			$data = array();
			$data['errorfail']=($code=='' || $admin_id=='')?'fail':'';
			$data['AdminId']=$admin_id;
			$data['code']=$code;
	        
            if($admin_id==1)
            {
            	if($_POST)
            	{
					if($this->input->post('AdminId') != '')
					{
						$this->form_validation->set_rules('Password', 'Password', 'required');
						$this->form_validation->set_rules('Confrim_password', 'Re-type Password', 'required|matches[Password]');
				
						if($this->form_validation->run() == FALSE)
						{			
							if(validation_errors())
							{
								echo json_encode(array("status"=>"error","msg"=>validation_errors()));
							}
						}
						else
						{
						
							$up=$this->Login_model->updatePassword();
							if($up>0){
								$this->session->set_flashdata('success',RESET_SUCCESS); 
								redirect('login');
							}elseif($up=='') {
								
								$error = EXPIRED_RESET_LINK;
						      $this->session->set_flashdata('error',EXPIRED_RESET_LINK); die; 
							}
							else{
							
								$error = PASS_RESET_FAIL;
			                    $this->session->set_flashdata('error',PASS_RESET_FAIL); die; 
							}
						}
					}
					else
					{
						$error = EXPIRED_RESET_LINK;
	              		$this->session->set_flashdata('error',EXPIRED_RESET_LINK); die; 
					}
				 		$this->load->view('common/ResestPassword',$data);
		    	}
		    	else
		    	{
		    		$this->load->view('common/ResestPassword',$data);
		    	}
            }
            else if($code=='')
            {

				$this->session->set_flashdata('error','Your link has been expired!'); 
				redirect('home');
		    }
	}

	//change password
    public function change_password()
    {
        
   		if(!check_admin_authentication()){
			redirect('login');
		}
		
		$data = array();
		$data['activeTab']="change_password";
        $this->load->library('form_validation');	
		$this->form_validation->set_rules('password', 'Password', 'required|matches[cpassword]|min_length[8]');
		$this->form_validation->set_rules('cpassword', 'Password Confirm', 'required|min_length[8]');	
	
		if($this->form_validation->run() == FALSE){			
			if(validation_errors())
			{
				$data["error"] = validation_errors();
			}else{
				$data["error"] = "";
			}
			if($_POST){
				
				$data["password"] = $this->input->post('password');
                $data["cpassword"] = $this->input->post('cpassword');
			}else{
				$data["password"] = '';
                $data["cpassword"] = '';
			}
			
		}else{
			//echo "fghg";die;
            $res=$this->Login_model->updateAdminPassword();
			if($res){
         		$this->session->set_flashdata('success', 'Your password change successfully');
				redirect('home/change_password');
			}
		}
	
        $this->load->view('common/ChangePassword',$data);    
	}
	function oldpassword_check() {
		$query = $this->db->query("select Password from " . $this->db->dbprefix('tbladmin') . " where Password ='".md5($this->input->post('password'))."' and AdminId='" . $this->session->userdata('AdminId') . "'");
		//aecho $this->db->last_query();die;
		if ($query->num_rows() > 0) {
			echo 1;die;
		} else {
			echo 0;die;
		}
	}
   

  //  public function add_pages($msg='')
  //   {  //echo "fdsf";die;
            
		// if(!check_admin_authentication())
		// {
		// redirect('login');
		// }
                
		// $data = array();
		// $data['activeTab']="add_pages";	
  //       $this->load->library('form_validation');
	
		// $this->form_validation->set_rules('PageTitle', 'Page Title', 'required');
		// $this->form_validation->set_rules('IsActive', 'IsActive', 'required');		
		
		// if($this->form_validation->run() == FALSE){	
		
		// 	if(validation_errors())
		// 	{
		// 		$data["error"] = validation_errors();
		// 		//echo "<pre>";print_r($data);die;
		// 	}else{
		// 		$data["error"] = "";
		// 	}
		// 	if($_POST){			
		// 		$data["PageTitle"] = $this->input->post('PageTitle');
		// 		$data["PageDescription"]   = $this->input->post('PageDescription');
				
              
			
		// 	}else{
		// 	$oneAdmin=get_page_by_slug('termcondition');
		// 	//print_r($oneAdmin);die;
		// 	$data["page_id"] 	= $oneAdmin->page_id;
		// 	$data["slug"] 		= $oneAdmin->slug;				
		// 	$data["PageTitle"]      = $oneAdmin->PageTitle;			
  //          	$data['PageDescription']=$oneAdmin->PageDescription;
  //          	$data['IsActive']=$oneAdmin->IsActive;
			
		// 	}
		// }else{
		// 	//echo "else fdf";die;
  //           $this->session->set_flashdata('successmsg', 'Page has been updated successfully');				
		// 	$res=$this->Login_model->updatePages();
		// 	redirect('home/add_pages/');
		// }

  //       $this->load->view('common/termsandcondition',$data);    
            
  //   }


		

}
