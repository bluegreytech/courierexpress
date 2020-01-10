<?php

class Login_model extends CI_Model
 {
   
    function get_sitedata()
    {
      $this->db->select("*");
      $this->db->from("tblsitesetting");
      $this->db->where("SettingId",1);
      $query=$this->db->get();
      return $query->row_array();
    }

    function sitesetting_update()
    {
        $SettingId=$this->input->post('SettingId');
        if($this->input->post('OtherContactNumber')=='')
        {
            $OtherContactNumber='N/A';
        }
        else
        {
            $OtherContactNumber=$this->input->post('OtherContactNumber');
        }

        $data = array(
          'FullName' =>trim($this->input->post('FullName')),			
          'SiteName' => trim($this->input->post('SiteName')),	
          'SiteEmail' => $this->input->post('SiteEmail'),	
          'SiteContactNumber' => trim($this->input->post('SiteContactNumber')),	
          'OtherContactNumber' => $OtherContactNumber,
          'OfficeAddress' => $this->input->post('OfficeAddress'),			
          'OfficeTime' => $this->input->post('OfficeTime'),
          'Tax' => $this->input->post('Tax'),
          'HappyClients' => $this->input->post('HappyClients'),
          'TripsDaily' => $this->input->post('TripsDaily'),
          'Cabs' => $this->input->post('Cabs'),
          'KilometersDaily' => $this->input->post('KilometersDaily'),
          ); 
        //print_r($data);die;
        $this->db->where("SettingId",$SettingId);
        $res=$this->db->update('tblsitesetting',$data);		
        return $res;
	}

    function updatePassword()
    {
        $code=$this->input->post('code');
        $query=$this->db->get_where('tbladmin',array('PasswordResetCode'=>$code));
        if($query->num_rows()>0)
        {
          $data=array('Password'=>md5(trim($this->input->post('Password'))),'PasswordResetCode'=>'');
            $this->db->where(array('AdminId'=>$this->input->post('AdminId'),'PasswordResetCode'=>trim($this->input->post('code'))));
           // print_r($data);die;
            $d=$this->db->update('tbladmin',$data);
            return $d;
          
        }else
        {
          return '';
        }
      }

    function forgotpass_check()
    {
         $EmailAddress=$this->input->post('EmailAddress'); 
         $query = $this->db->get_where('tbladmin',array('EmailAddress'=>$EmailAddress));
         if($query->num_rows()>0)
         {
            $row = $query->row();
            $admin_status=$row->IsActive;
            if($admin_status =='Inactive')
            {
              return "3"; 
            }
            else if($admin_status =='Active')
            {
                if(!empty($row) && $row->EmailAddress!="")
                {
                    $rpass= randomCode();
                    $passdata=array(
                      'PasswordResetCode'=>$rpass
                    );
                    $this->db->where('AdminId',$row->AdminId);
                    $this->db->update('tbladmin',$passdata);            
                  
                    $config['protocol']  = 'smtp';
                    $config['smtp_host'] = 'ssl://smtp.googlemail.com';
                    $config['smtp_port'] = '465';
                    $config['smtp_user']='bluegreyindia@gmail.com';
                    $config['smtp_pass']='Test@123'; 
                    $config['charset']='utf-8';
                    $config['newline']="\r\n";
                    $config['mailtype'] = 'html';	
                    $body = base_url().'Home/Resetpassword/'.$rpass;
                    //$body = str_replace(BASE_URL.'/user/edit/'.$rpass);						
                    $this->email->initialize($config);
                    $this->email->from('bluegreyindia@gmail.com', 'Admin');
                    $this->email->to($EmailAddress);		
                    $this->email->subject('FG Password');
                    $this->email->message($body);
                    if($this->email->send())
                    {
                      return '1';
                    
                    }
                             
                }
                else
                {
                  return '0';
                }
            }
        }
        else
        {
          return 2;
        }

    }

		function login_where($table,$where)
		{
			$r = $this->db->get_where($table,$where);
			$res = $r->row();
			return $res;
		}
		function updateProfile(){

	    $user_image='';
      //$image_settings=image_setting();
      if(isset($_FILES['profile_image']) &&  $_FILES['profile_image']['name']!='')
      {
        $this->load->library('upload');
        $rand=rand(0,100000); 

        $_FILES['userfile']['name']     =   $_FILES['profile_image']['name'];
        $_FILES['userfile']['type']     =   $_FILES['profile_image']['type'];
        $_FILES['userfile']['tmp_name'] =   $_FILES['profile_image']['tmp_name'];
        $_FILES['userfile']['error']    =   $_FILES['profile_image']['error'];
        $_FILES['userfile']['size']     =   $_FILES['profile_image']['size'];   
        $config['file_name'] = $rand.'Admin';      
        $config['upload_path'] = base_path().'upload/admin_orig/';      
        $config['allowed_types'] = 'jpg|jpeg|gif|png|bmp';
        $this->upload->initialize($config);

        if (!$this->upload->do_upload())
        {
        $error =  $this->upload->display_errors();
      	echo "<pre>"; print_r($error);die; 
        }        

        $picture = $this->upload->data();       
        $this->load->library('image_lib');       
        $this->image_lib->clear();       

        $gd_var='gd2';
        $this->image_lib->initialize(array(
          'image_library' => $gd_var,
          'source_image' => base_path().'upload/admin_orig/'.$picture['file_name'],
          'new_image' => base_path().'upload/admin/'.$picture['file_name'],
          'maintain_ratio' => FALSE,
          'quality' => '100%',
          'width' => 300,
          'height' => 300
        ));


        if(!$this->image_lib->resize())
        {
        $error = $this->image_lib->display_errors();
        }

        $user_image=$picture['file_name'];
        $this->input->post('prev_user_image');
        if($this->input->post('pre_profile_image')!='')
        {
        if(file_exists(base_path().'upload/admin/'.$this->input->post('pre_profile_image')))
        {
        $link=base_path().'upload/admin/'.$this->input->post('pre_profile_image');
        unlink($link);
        }

        if(file_exists(base_path().'upload/admin_orig/'.$this->input->post('pre_profile_image')))
        {
        $link2=base_path().'upload/admin_orig/'.$this->input->post('pre_profile_image');
        unlink($link2);
        }
        }
      }else{
        if($this->input->post('pre_profile_image')!='')
        {
        $user_image=$this->input->post('pre_profile_image');
        }
      }
        //$full_name=trim($this->input->post('full_name'));
        $data = array(
        'EmailAddress' =>trim($this->input->post('EmailAddress')),
        'FullName' =>trim($this->input->post('full_name')),			
        'AdminContact' => trim($this->input->post('AdminContact')),
        'Isactive' => trim($this->input->post('IsActive')),	      
        'ProfileImage'=>$user_image,
        );  
          $this->db->where('AdminId',$this->session->userdata('AdminId'));
          $this->db->update('tbladmin',$data);
       
    }

    function check_login()
    {
       //echo "vfcgcv";die;
         //$this->load->helper('cookie');
        
    $EmailAddress = trim($this->input->post('EmailAddress'));
    $password = $this->input->post('Password');
            
    $query = $this->db->get_where('tbladmin',array('EmailAddress'=>$EmailAddress,'password'=>md5($password)));
   //  echo $this->db->last_query();
   // die;
                //,'status'=>'Active'
    $admin = $query->row_array();
    //xecho "<pre>";print_r($admin);die;
    if($query->num_rows()>0)
    {
                        $admin_type=$admin['Admin_Type'];
                        $admin_status=$admin['IsActive'];
                        
                        if($admin_status !='Active')
                        {
                           return "3"; 
                        }
                        
                        
      if($admin_type == 1)
      {
          $admin_id = $admin['AdminId'];
      
        //$admin = $query->row_array();
        //$admin_id = $admin['admin_id'];
        $data = array(
           'AdminId' => $admin_id,
            'FullName' => $admin['FullName'],
            'admin_type'=>$admin_type,

            );  
        // echo "<pre>";print_r($data);die;
        $this->session->set_userdata($data);
                           
        
        /*$data1=array(
            'admin_id'=>$admin_id,
            'login_date'=> date('Y-m-d H:i:s'),
            'login_ip'=>$_SERVER['REMOTE_ADDR']
            ); 
        $this->db->insert('admin_login',$data1);*/
          
        
        return "1";
      
      }
      elseif($query->num_rows() > 0)
      {
        //$admin_type=$admin['admin_type'];
      if($admin_type == 2)
      {
        $admin_id   = $admin['AdminId'];
        //$admin_role = $admin['admin_role'];
        //$site_id    = $admin['site_id'];
        $data = array(
              'AdminId' => $admin_id,
              'FullName' => $admin['FullName'],
              'admin_type'=>$admin_type,         
            );  
          
        $this->session->set_userdata($data);

        /*$data1=array(
            'admin_id'=>$admin_id,
            'login_date'=> date('Y-m-d H:i:s'),
            'login_ip'=>$_SERVER['REMOTE_ADDR']
            ); 
        $this->db->insert('admin_login',$data1);*/
        return "2";
      }
      }
    }
    else
    {
      return "0";
    }
    }

    // forget password
    function forgot_email()
    {
      $email = trim($this->input->post('EmailAddress'));
      $rnd=randomCode();
    
      $query = $this->db->get_where('tbladmin',array('EmailAddress'=>$email));
      //echo $this->db->last_query(); die;
    if($query->num_rows()>0)
    {
      $row = $query->row();
      $admin_status=$row->IsActive;
     // echo $admin_status;die;
       if($admin_status =='Inactive')
      {
         return "3"; 
      }elseif($admin_status =='Active'){

                  if(!empty($row) && $row->EmailAddress != "")
                  {
                    $rpass= randomCode();
                    $ud=array('PasswordResetCode'=>$rnd,
                      //s'password' => MD5($rpass)
                    );
                    $this->db->where('AdminId',$row->AdminId);
                    $this->db->update('tbladmin',$ud);
                    
                    $email_template=$this->db->query("select * from ".$this->db->dbprefix('tblemail_template')." where task='Forgot Password by admin'");
                    $email_temp=$email_template->row();
                    $email_address_from=$email_temp->from_address;
                    $email_address_reply=$email_temp->reply_address;
                    $email_subject=$email_temp->subject;        
                    $email_message=$email_temp->message;
                    $username =$row->FullName;
                    $password = $rpass;
                    $email = $row->EmailAddress;
                    $email_to=$email;
                    $login_link= '<a href="'.site_url('home/reset_password/'.$rnd).'">Click Here</a>';
                   
                    $base_url=front_base_url();
                    $currentyear=date('Y');
                    $email_message=str_replace('{break}','<br/>',$email_message);
                    $email_message=str_replace('{base_url}',$base_url,$email_message);
                    $email_message=str_replace('{year}',$currentyear,$email_message);
                    $email_message=str_replace('{username}',$username,$email_message);
                    $email_message=str_replace('{email}',$email,$email_message);
                    $email_message=str_replace('{reset_link}',$login_link,$email_message);
                    $str=$email_message; //die;
                   
                    $config['protocol']='smtp';
                    $config['smtp_host']='ssl://smtp.googlemail.com';
                    $config['smtp_port']='465';
                    $config['smtp_user']='bluegreyindia@gmail.com';
                    $config['smtp_pass']='Test@123';
                    $config['charset']='utf-8';
                    $config['newline']="\r\n";
                    $config['mailtype'] = 'html';               
                    $this->email->initialize($config);
                    $body =$str;
                    //print_r($body);die;
                    $this->email->from('bluegreyindia@gmail.com');
                    $this->email->to($email_to);    
                    $this->email->subject('Forgot Password Admin');
                    $this->email->message($body); 
                    if($this->email->send()){ 
                   
                       return '1';
                    }else{
                    echo $this->email->print_debugger();die;
                    }  
                  }
                  else{
                    return '0';
                  }
        }
    }else{
      return 2;
    }
    }

    //reset password
    function checkResetCode($code='')
    {
      $query=$this->db->get_where('tbladmin',array('PasswordResetCode'=>$code));
      if($query->num_rows()>0)
      {
        return $query->row()->AdminId; 
      }
      else
      {
        return 2;
      }
    }
        
 

  function updateAdminPassword(){
    $id=$this->session->userdata('AdminId'); 

    $data = array('Password' => md5($this->input->post('password')));
    $query=$this->db->where(array('AdminId'=>$id))->get_where('tbladmin');
    if($query->num_rows()>0){
      $this->db->where(array('AdminId'=>$id));
      $this->db->update('tbladmin',$data);
      $query2 = $this->db->get_where('tbladmin',array('AdminId'=>$id));
      $row = $query2->row();
      return true;
    }else{
      return false;
    }
  } 


    function updatePages(){
        $data = array(
        'PageTitle' =>trim($this->input->post('PageTitle')),
        'PageDescription' =>trim($this->input->post('PageDescription')),
        'Isactive' => trim($this->input->post('IsActive')), 
        );  
          $this->db->where('page_id',$this->input->post('page_id'));
          $this->db->update('tblpage',$data);
       
    } 


  function getuser()
  {
    $this->db->select('*');
    $this->db->from('tbluser');
    $this->db->where('IsDelete','0');
    $this->db->order_by('UserId','desc');
    $this->db->group_by('ContactNumber');
    $query=$this->db->get();
    $res = $query->result();
    return $res;
  }

  function get_recentuser()
  {
    $this->db->select('*');
    $this->db->from('tbluser');
    $this->db->where('IsDelete','0');
    $this->db->order_by('UserId','desc');
    $this->db->limit(5);
    $query=$this->db->get();
    $res = $query->result();
    return $res;
  }

  

  
  function get_inquiry()
  {
    $this->db->select('*');
    $this->db->from('tblcontactus');
    $this->db->where('IsDelete','0');
    $query=$this->db->get();
    $res = $query->result();
    return $res;
  }

  
  function get_segment()
  {
    $this->db->select('*');
    $this->db->from('tblluxuryquotes');
    $this->db->where('IsDelete','0');
    $query=$this->db->get();
    $res = $query->result();
    return $res;
  }

}
