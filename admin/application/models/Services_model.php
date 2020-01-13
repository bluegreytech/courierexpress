<?php

class Services_model extends CI_Model
 {
	function service_add()
	{	
        $data = array(
		'ServiceName'=>trim($this->input->post('ServiceName')),	
		'ServiceTitle'=>trim($this->input->post('ServiceTitle')),			
		'ServiceDescription'=>trim($this->input->post('ServiceDescription')),	
		'IsActive' =>$this->input->post('IsActive'),			
		'CreatedOn'=>date('Y-m-d')		
		);
	  	//echo "<pre>";print_r($data);die;	        
        $res=$this->db->insert('tblservice',$data);	
		return $res;
	}

	function getservice(){
		$this->db->select('*');
		$this->db->from('tblservice');
		$this->db->where('IsDelete','0');
		$this->db->order_by('ServiceId','desc');
		$query=$this->db->get();
		$res = $query->result();
		return $res;

	}
	

	function getdata($ServiceId){
		$this->db->select("*");
		$this->db->from("tblservice");
		$this->db->where("IsDelete",'0');
		$this->db->where("ServiceId",$ServiceId);
	    $this->db->order_by('ServiceId','desc');
		$query=$this->db->get();
		return $query->row_array();
	}

	function service_update(){

		$ServiceId=$this->input->post('ServiceId');
        $data = array(
		'ServiceId' =>trim($this->input->post('ServiceId')),	
		'ServiceName'=>trim($this->input->post('ServiceName')),	
		'ServiceTitle'=>trim($this->input->post('ServiceTitle')),			
		'ServiceDescription'=>trim($this->input->post('ServiceDescription')),
		'IsActive' => $this->input->post('IsActive'),			
		'CreatedOn'=>date('Y-m-d')		
		); 
		//print_r($data);die;
		$this->db->where("ServiceId",$ServiceId);
		$res=$this->db->update('tblservice',$data);		
		return $res;
	}

	
}
