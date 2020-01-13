<?php

class Contact_model extends CI_Model
 {
	function about_insert()
	{	
            $data = array(
			'AboutTitle'=>trim($this->input->post('AboutTitle')),			
			'AboutDescription'=>trim($this->input->post('AboutDescription')),		
			'IsActive' =>$this->input->post('IsActive'),			
			'CreatedOn'=>date('Y-m-d')		
			);
		  // echo "<pre>";print_r($data);die;	
                    
            $res=$this->db->insert('tblaboutus',$data);	
			return $res;
	}

	function getinquirylist()
	{
		$this->db->select('*');
		$this->db->from('tblinquiry');
		$this->db->where('IsDelete','0');
		$this->db->order_by('ContactId','desc');
		$query=$this->db->get();
		$res = $query->result();
		return $res;

	}


	function contact_add()
	{	
        $data = array(
		'OfficeTitle'=>trim($this->input->post('OfficeTitle')),	
		'OfficeLocation'=>trim($this->input->post('OfficeLocation')),	
		'Address'=>trim($this->input->post('Address')),			
		'ContactPersonName'=>trim($this->input->post('ContactPersonName')),	
		'LandlineNumber'=>trim($this->input->post('LandlineNumber')),			
		'ContactNumber'=>trim($this->input->post('ContactNumber')),	
		'EmailAddress'=>trim($this->input->post('EmailAddress')),	
		'IsActive' =>$this->input->post('IsActive'),			
		'CreatedOn'=>date('Y-m-d')		
		);
	  	//echo "<pre>";print_r($data);die;	        
        $res=$this->db->insert('tblcontact',$data);	
		return $res;
	}

	function getcontact(){
		$this->db->select('*');
		$this->db->from('tblcontact');
		$this->db->where('IsDelete','0');
		$this->db->order_by('OfficeId','desc');
		$query=$this->db->get();
		$res = $query->result();
		return $res;

	}
	

	function getdata($OfficeId){
		$this->db->select("*");
		$this->db->from("tblcontact");
		$this->db->where("IsDelete",'0');
		$this->db->where("OfficeId",$OfficeId);
	    $this->db->order_by('OfficeId','desc');
		$query=$this->db->get();
		return $query->row_array();
	}

	function contact_update(){

		$OfficeId=$this->input->post('OfficeId');
        $data = array(
		'OfficeId' =>trim($this->input->post('OfficeId')),	
		'OfficeTitle'=>trim($this->input->post('OfficeTitle')),
		'OfficeLocation'=>trim($this->input->post('OfficeLocation')),	
		'Address'=>trim($this->input->post('Address')),			
		'ContactPersonName'=>trim($this->input->post('ContactPersonName')),	
		'LandlineNumber'=>trim($this->input->post('LandlineNumber')),			
		'ContactNumber'=>trim($this->input->post('ContactNumber')),	
		'EmailAddress'=>trim($this->input->post('EmailAddress')),	
		'IsActive' => $this->input->post('IsActive'),			
		'CreatedOn'=>date('Y-m-d')		
		); 
		//print_r($data);die;
		$this->db->where("OfficeId",$OfficeId);
		$res=$this->db->update('tblcontact',$data);		
		return $res;
	}
	

	
}
