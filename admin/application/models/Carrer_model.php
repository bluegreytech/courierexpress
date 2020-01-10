<?php

class Carrer_model extends CI_Model
 {
	function carrer_insert()
	{	

        $data = array(	
			'CarrerTitle'=>trim($this->input->post('CarrerTitle')),
			'CarrerDescription'=>trim($this->input->post('CarrerDescription')),
			'IsActive' =>$this->input->post('IsActive'),			
			'CreatedOn'=>date('Y-m-d')		
		);
	    //echo "<pre>";print_r($data);die;	         
        $res=$this->db->insert('tblcarrer',$data);	
		return $res;
	}

	function list_carrer()
	{
		$this->db->select('*');
		$this->db->from('tblcarrer');
		$this->db->where('IsDelete','0');
		$this->db->order_by('CarrerId','desc');
		$query=$this->db->get();
		$res = $query->result();
		return $res;

	}

	function getcarrerdata($CarrerId)
	{
		$this->db->select("*");
		$this->db->from("tblcarrer");
		$this->db->where("CarrerId",$CarrerId);
		$query=$this->db->get();
		return $query->row_array();
	}


	function carrer_update()
	{
	   	$CarrerId=$this->input->post('CarrerId');
        $data = array(
      	'CarrerId'=>trim($this->input->post('CarrerId')),
		'CarrerTitle'=>trim($this->input->post('CarrerTitle')),
		'CarrerDescription'=>trim($this->input->post('CarrerDescription')),
		'IsActive' =>$this->input->post('IsActive'),					
		'UpdatedOn'=>date('Y-m-d')		
		); 
		//print_r($data);die;
		$this->db->where("CarrerId",$CarrerId);
		$res=$this->db->update('tblcarrer',$data);		
		return $res;
	}

	function getcarbrandlist()
	{
		$this->db->select('*');
		$this->db->from('tblcarbrand');
		$this->db->where('IsDelete','0');
		$this->db->order_by('CarBrandId','desc');
		$query=$this->db->get();
		$res = $query->result();
		return $res;
	}
	
}
