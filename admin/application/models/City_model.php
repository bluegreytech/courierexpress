<?php

class City_model extends CI_Model
 {
	function city_insert()
	{	

        $data = array(	
        	'CarBrandId'=>trim($this->input->post('CarBrandId')),
			'StartCity'=>trim($this->input->post('StartCity')),
			'EndCity'=>trim($this->input->post('EndCity')),
			'LocalCity' =>$this->input->post('LocalCity'),
			'IsActive' =>$this->input->post('IsActive'),			
			'CreatedOn'=>date('Y-m-d')		
		);
	    //echo "<pre>";print_r($data);die;	         
        $res=$this->db->insert('tblcity',$data);	
		return $res;
	}

	function list_city()
	{
		$this->db->select('city.*,brand.BrandName');
		$this->db->from('tblcity as city');
		$this->db->join('tblcarbrand as brand','city.CarBrandId = brand.CarBrandId', 'LEFT');
		$this->db->where('city.IsDelete','0');
		$this->db->order_by('city.CityId','desc');
		$query=$this->db->get();
		$res = $query->result();
		return $res;

	}

	function getcitydata($CityId)
	{
		$this->db->select("city.*,brand.BrandName");
		$this->db->from("tblcity as city");
		$this->db->join('tblcarbrand as brand','city.CarBrandId = brand.CarBrandId', 'LEFT');
		$this->db->where("city.CityId",$CityId);
	    $this->db->order_by('city.CityId','desc');
		$query=$this->db->get();
		return $query->row_array();
	}


	function city_update()
	{
	   	$CityId=$this->input->post('CityId');
        $data = array(
        'CarBrandId'=>trim($this->input->post('CarBrandId')),
		'StartCity'=>trim($this->input->post('StartCity')),
		'EndCity'=>trim($this->input->post('EndCity')),
		'LocalCity' =>$this->input->post('LocalCity'),
		'IsActive' =>$this->input->post('IsActive'),					
		'UpdatedOn'=>date('Y-m-d')		
		); 
		//print_r($data);die;
		$this->db->where("CityId",$CityId);
		$res=$this->db->update('tblcity',$data);		
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
