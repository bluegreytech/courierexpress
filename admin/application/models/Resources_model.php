<?php

class Resources_model extends CI_Model
 {
	function resources_add()
	{	
        $data = array(
		'ResourcesTitle'=>trim($this->input->post('ResourcesTitle')),			
		'IsActive' =>$this->input->post('IsActive'),			
		'CreatedOn'=>date('Y-m-d')		
		);
	  	//echo "<pre>";print_r($data);die;	        
        $res=$this->db->insert('tblresources',$data);	
		return $res;
	}

	function getresources(){
		$this->db->select('*');
		$this->db->from('tblresources');
		$this->db->where('IsDelete','0');
		$this->db->order_by('ResourcesId','desc');
		$query=$this->db->get();
		$res = $query->result();
		return $res;

	}
	

	function getdata($ResourcesId){
		$this->db->select("*");
		$this->db->from("tblresources");
		$this->db->where("IsDelete",'0');
		$this->db->where("ResourcesId",$ResourcesId);
	    $this->db->order_by('ResourcesId','desc');
		$query=$this->db->get();
		return $query->row_array();
	}

	function resources_update()
	{
		$ResourcesId=$this->input->post('ResourcesId');
        $data = array(
		'ResourcesId' =>trim($this->input->post('ResourcesId')),		
		'ResourcesTitle'=>trim($this->input->post('ResourcesTitle')),			
		'IsActive' => $this->input->post('IsActive'),			
		'CreatedOn'=>date('Y-m-d')		
		); 
		//print_r($data);die;
		$this->db->where("ResourcesId",$ResourcesId);
		$res=$this->db->update('tblresources',$data);		
		return $res;
	}

	
}
