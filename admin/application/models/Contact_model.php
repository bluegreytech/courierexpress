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

	function getcontact(){
		$this->db->select('*');
		$this->db->from('tblcontactus');
		$this->db->where('IsDelete','0');
		$this->db->order_by('ContactId','desc');
		$query=$this->db->get();
		$res = $query->result();
		return $res;

	}
	

	function get_luxuryquotelist(){
		$this->db->select('*');
		$this->db->from('tblluxuryquotes');
		$this->db->where('IsDelete','0');
		$this->db->order_by('LuxuryQuoteId','desc');
		$query=$this->db->get();
		$res = $query->result();
		return $res;
	}

	function get_carrierlist(){
		$this->db->select('*');
		$this->db->from('tblcarrierinquiry');
		$this->db->where('IsDelete','0');
		$this->db->order_by('CarrierInquiryId','desc');
		$query=$this->db->get();
		$res = $query->result();
		return $res;
	}
	
	

	

	
}
