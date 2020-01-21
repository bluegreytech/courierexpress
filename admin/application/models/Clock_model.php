<?php

class Clock_model extends CI_Model
 {
	function clock_add()
	{	
            $data = array(
			'CountryTitle'=>trim($this->input->post('CountryTitle')),			
			'CountryTime'=>trim($this->input->post('CountryTime')),		
			'CountryTimeZone'=>trim($this->input->post('CountryTimeZone')),	
			'TimeScope'=>trim($this->input->post('TimeScope')),		
			'IsActive' =>$this->input->post('IsActive'),			
			'CreatedOn'=>date('Y-m-d')		
			);
		  	//echo "<pre>";print_r($data);die;	        
            $res=$this->db->insert('tblclock',$data);	
			return $res;
	}

	function getclock(){
		$this->db->select('*');
		$this->db->from('tblclock');
		$this->db->where('IsDelete','0');
		$this->db->order_by('ClockId','desc');
		$query=$this->db->get();
		$res = $query->result();
		return $res;

	}
	

	function getdata($ClockId){
		$this->db->select("*");
		$this->db->from("tblclock");
		$this->db->where("IsDelete",'0');
		$this->db->where("ClockId",$ClockId);
	    $this->db->order_by('ClockId','desc');
		$query=$this->db->get();
		return $query->row_array();
	}

	function clock_update(){

		  $ClockId=$this->input->post('ClockId');
            $data = array(
			'ClockId' =>trim($this->input->post('ClockId')),	
			'CountryTitle' =>trim($this->input->post('CountryTitle')),			
			'CountryTime' => trim($this->input->post('CountryTime')),
			'CountryTimeZone'=>trim($this->input->post('CountryTimeZone')),	
			'TimeScope'=>trim($this->input->post('TimeScope')),			
			'IsActive' => $this->input->post('IsActive'),			
			'CreatedOn'=>date('Y-m-d')		
			); 
			//print_r($data);die;
			$this->db->where("ClockId",$ClockId);
			$res=$this->db->update('tblclock',$data);		
			return $res;
	}

	
}
