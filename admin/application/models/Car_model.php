<?php

class Car_model extends CI_Model
 {
	function car_insert()
	{	
		$car_image='';
		if(isset($_FILES['CarImage']) &&  $_FILES['CarImage']['name']!='')
		{
			$this->load->library('upload');
			$rand=rand(0,100000); 
			 
		   $_FILES['userfile']['name']     =   $_FILES['CarImage']['name'];
		   $_FILES['userfile']['type']     =   $_FILES['CarImage']['type'];
		   $_FILES['userfile']['tmp_name'] =   $_FILES['CarImage']['tmp_name'];
		   $_FILES['userfile']['error']    =   $_FILES['CarImage']['error'];
		   $_FILES['userfile']['size']     =   $_FILES['CarImage']['size'];
  
		   $config['file_name'] = $rand.'Car';			
		   $config['upload_path'] = base_path().'upload/car_orig/';		
		   $config['allowed_types'] = 'jpg|jpeg|gif|png|bmp';  

			$this->upload->initialize($config);

			 if (!$this->upload->do_upload())
			 {
			   $error =  $this->upload->display_errors();
			   echo "<pre>";print_r($error);
			 } 
				$picture = $this->upload->data();	   
			 $this->load->library('image_lib');		   
			 $this->image_lib->clear();
			 $gd_var='gd2';

			 $this->image_lib->initialize(array(
			   'image_library' => $gd_var,
			   'source_image' => base_path().'upload/car_orig/'.$picture['file_name'],
			   'new_image' => base_path().'upload/carimages/'.$picture['file_name'],
			   'maintain_ratio' => FALSE,
			   'quality' => '100%',
			   'width' => 300,
			   'height' => 300
			));
		   
		   
		   if(!$this->image_lib->resize())
		   {
			   $error = $this->image_lib->display_errors();
		   }
		   
		   $car_image=$picture['file_name'];
	   
		   
	   
		   if($this->input->post('pre_car_image')!='')
			   {
				   if(file_exists(base_path().'upload/carimages/'.$this->input->post('pre_car_image')))
				   {
					   $link=base_path().'upload/carimages/'.$this->input->post('pre_car_image');
					   unlink($link);
				   }
				   
				   if(file_exists(base_path().'upload/car_orig/'.$this->input->post('pre_car_image')))
				   {
					   $link2=base_path().'upload/car_orig/'.$this->input->post('pre_car_image');
					   unlink($link2);
				   }
			   }
		   } else {
			   if($this->input->post('pre_car_image')!='')
			   {
				   $car_image=$this->input->post('pre_car_image');
			   }
		   }

            $data = array(
            	'CarBrandId'=>trim($this->input->post('CarBrandId')),
				'CarName'=>trim($this->input->post('CarName')),
				'CarRate'=>trim($this->input->post('CarRate')),
				'DriveAllowance'=>trim($this->input->post('DriveAllowance')),
				'ExtraKMS'=>trim($this->input->post('ExtraKMS')),	
				'NumberOfSeat'=>trim($this->input->post('NumberOfSeat')),
				'NoOfBaggage'=>trim($this->input->post('NoOfBaggage')),
				// 'StartPointCityId'=>trim($this->input->post('StartPointCityId')),
				// 'EndPointCityId'=>trim($this->input->post('EndPointCityId')),	
				'StateTax'=>trim($this->input->post('StateTax')),	
				'AirCondition'=>trim($this->input->post('AirCondition')),	
				'CarNumber'=>trim($this->input->post('CarNumber')),			
				'CarImage'=>$car_image,	
				'CarDescription' =>$this->input->post('CarDescription'),	
				'IsActive' =>$this->input->post('IsActive'),			
				'CreatedOn'=>date('Y-m-d')		
			);
		   // echo "<pre>";print_r($data);die;	         
            $res=$this->db->insert('tblcartype',$data);	
			return $res;
	}

	function getcarlist(){
		// $this->db->select('*');
		$this->db->select('car.*,brand.BrandName');
		$this->db->from("tblcartype as car");
		$this->db->join('tblcarbrand as brand','car.CarBrandId = brand.CarBrandId', 'LEFT');
		$this->db->where('car.IsDelete','0');
		$this->db->order_by('car.CarId','desc');
		$query=$this->db->get();
		$res = $query->result();
		return $res;

	}

	function list_city()
	{
		$where= array('IsActive' =>'Active','IsDelete' =>'0');
		$this->db->select('*');
		$this->db->from('tblcity');
		$this->db->where($where);
		$this->db->order_by('StartCity','ACE');
		$query=$this->db->get();
		$res = $query->result();
		return $res;
	}
	

	function getdata($CarId){
		$this->db->select("car.*,brand.BrandName");
		$this->db->from("tblcartype as car");
		$this->db->join('tblcarbrand as brand','car.CarBrandId = brand.CarBrandId', 'LEFT');
		$this->db->where("car.IsDelete",'0');
		$this->db->where("CarId",$CarId);
	    $this->db->order_by('CarId','desc');
		$query=$this->db->get();
		return $query->row_array();
	}

	function car_update()
	{

		$car_image='';
		//$image_settings=image_setting();
		 if(isset($_FILES['CarImage']) &&  $_FILES['CarImage']['name']!='')
		{
			$this->load->library('upload');
			$rand=rand(0,100000); 
			 
		   $_FILES['userfile']['name']     =   $_FILES['CarImage']['name'];
		   $_FILES['userfile']['type']     =   $_FILES['CarImage']['type'];
		   $_FILES['userfile']['tmp_name'] =   $_FILES['CarImage']['tmp_name'];
		   $_FILES['userfile']['error']    =   $_FILES['CarImage']['error'];
		   $_FILES['userfile']['size']     =   $_FILES['CarImage']['size'];
  
		   $config['file_name'] = $rand.'Car';			
		   $config['upload_path'] = base_path().'upload/car_orig/';		
		   $config['allowed_types'] = 'jpg|jpeg|gif|png|bmp';  

			$this->upload->initialize($config);

			 if (!$this->upload->do_upload())
			 {
			   $error =  $this->upload->display_errors();
			   echo "<pre>";print_r($error);
			 } 
				$picture = $this->upload->data();	   
			 $this->load->library('image_lib');		   
			 $this->image_lib->clear();
			 $gd_var='gd2';

			 $this->image_lib->initialize(array(
			   'image_library' => $gd_var,
			   'source_image' => base_path().'upload/car_orig/'.$picture['file_name'],
			   'new_image' => base_path().'upload/carimages/'.$picture['file_name'],
			   'maintain_ratio' => FALSE,
			   'quality' => '100%',
			   'width' => 300,
			   'height' => 300
			));
		   
		   
		   if(!$this->image_lib->resize())
		   {
			   $error = $this->image_lib->display_errors();
		   }
		   
		   $car_image=$picture['file_name'];
	   
		   
	   
		   if($this->input->post('pre_car_image')!='')
			   {
				   if(file_exists(base_path().'upload/carimages/'.$this->input->post('pre_car_image')))
				   {
					   $link=base_path().'upload/carimages/'.$this->input->post('pre_car_image');
					   unlink($link);
				   }
				   
				   if(file_exists(base_path().'upload/car_orig/'.$this->input->post('pre_car_image')))
				   {
					   $link2=base_path().'upload/car_orig/'.$this->input->post('pre_car_image');
					   unlink($link2);
				   }
			   }
		   } else {
			   if($this->input->post('pre_car_image')!='')
			   {
				   $car_image=$this->input->post('pre_car_image');
			   }
		   }

		   $CarId=$this->input->post('CarId');
            $data = array(
            'CarBrandId'=>trim($this->input->post('CarBrandId')),
			'CarName'=>trim($this->input->post('CarName')),
			'CarRate'=>trim($this->input->post('CarRate')),
			'DriveAllowance'=>trim($this->input->post('DriveAllowance')),
			'ExtraKMS'=>trim($this->input->post('ExtraKMS')),	
			'NumberOfSeat'=>trim($this->input->post('NumberOfSeat')),
			'NoOfBaggage'=>trim($this->input->post('NoOfBaggage')),
			// 'StartPointCityId'=>trim($this->input->post('StartPointCityId')),
			// 'EndPointCityId'=>trim($this->input->post('EndPointCityId')),	
			'StateTax'=>trim($this->input->post('StateTax')),	
			'AirCondition'=>trim($this->input->post('AirCondition')),	
			'CarNumber'=>trim($this->input->post('CarNumber')),			
			'CarImage'=>$car_image,	
			'CarDescription' =>$this->input->post('CarDescription'),	
			'IsActive' =>$this->input->post('IsActive'),					
			'UpdatedOn'=>date('Y-m-d')		
			); 
			//print_r($data);die;
			$this->db->where("CarId",$CarId);
			$res=$this->db->update('tblcartype',$data);		
			return $res;
	}



	function carbrand_insert()
	{	
		$brand_car_image='';
		if(isset($_FILES['BrandCarImage']) &&  $_FILES['BrandCarImage']['name']!='')
		{
			$this->load->library('upload');
			$rand=rand(0,100000); 
			 
		   $_FILES['userfile']['name']     =   $_FILES['BrandCarImage']['name'];
		   $_FILES['userfile']['type']     =   $_FILES['BrandCarImage']['type'];
		   $_FILES['userfile']['tmp_name'] =   $_FILES['BrandCarImage']['tmp_name'];
		   $_FILES['userfile']['error']    =   $_FILES['BrandCarImage']['error'];
		   $_FILES['userfile']['size']     =   $_FILES['BrandCarImage']['size'];
  
		   $config['file_name'] = $rand.'Car';			
		   $config['upload_path'] = base_path().'upload/car_orig/';		
		   $config['allowed_types'] = 'jpg|jpeg|gif|png|bmp';  

			$this->upload->initialize($config);

			 if (!$this->upload->do_upload())
			 {
			   $error =  $this->upload->display_errors();
			   echo "<pre>";print_r($error);
			 } 
				$picture = $this->upload->data();	   
			 $this->load->library('image_lib');		   
			 $this->image_lib->clear();
			 $gd_var='gd2';

			 $this->image_lib->initialize(array(
			   'image_library' => $gd_var,
			   'source_image' => base_path().'upload/car_orig/'.$picture['file_name'],
			   'new_image' => base_path().'upload/carimages/'.$picture['file_name'],
			   'maintain_ratio' => FALSE,
			   'quality' => '100%',
			   'width' => 512,
			   'height' => 189
			));
		   
		   
		   if(!$this->image_lib->resize())
		   {
			   $error = $this->image_lib->display_errors();
		   }
		   
		   $brand_car_image=$picture['file_name'];
	   
		   
	   
		   if($this->input->post('pre_brand_car_image')!='')
			   {
				   if(file_exists(base_path().'upload/carimages/'.$this->input->post('pre_brand_car_image')))
				   {
					   $link=base_path().'upload/carimages/'.$this->input->post('pre_brand_car_image');
					   unlink($link);
				   }
				   
				   if(file_exists(base_path().'upload/car_orig/'.$this->input->post('pre_brand_car_image')))
				   {
					   $link2=base_path().'upload/car_orig/'.$this->input->post('pre_brand_car_image');
					   unlink($link2);
				   }
			   }
		   } else {
			   if($this->input->post('pre_brand_car_image')!='')
			   {
				   $brand_car_image=$this->input->post('pre_brand_car_image');
			   }
		   }

        $data = array(
			'BrandName'=>trim($this->input->post('BrandName')),
			'PerHoureFare'=>trim($this->input->post('PerHoureFare')),
			'PerKmRate'=>trim($this->input->post('PerKmRate')),
			'ExtraKMS'=>trim($this->input->post('ExtraKMS')),
			'DriverAllowancePerDay'=>trim($this->input->post('DriverAllowancePerDay')),
			'StateTax'=>trim($this->input->post('StateTax')),

			'TotalSeat'=>trim($this->input->post('TotalSeat')),
			'TotalBaggage'=>trim($this->input->post('TotalBaggage')),
			'BrandCarDescription'=>trim($this->input->post('BrandCarDescription')),
			'BrandCarImage'=>$brand_car_image,
			'IsActive' =>$this->input->post('IsActive'),			
			'CreatedOn'=>date('Y-m-d')		
		);
	    //echo "<pre>";print_r($data);die;	         
        $res=$this->db->insert('tblcarbrand',$data);	
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

	function getcarbranddata($CarBrandId)
	{

		$this->db->select("brand.*,brand.BrandName");
		$this->db->from("tblcarbrand as brand");
		$this->db->where("brand.IsDelete",'0');
		$this->db->where("brand.CarBrandId",$CarBrandId);
	    $this->db->order_by('brand.CarBrandId','desc');
		$query=$this->db->get();
		return $query->row_array();

		// $this->db->select("*");
		// $this->db->from("tblcarbrand");
		// $this->db->where("CarBrandId",$CarBrandId);
	 //    $this->db->order_by('CarBrandId','desc');
		// $query=$this->db->get();
		// return $query->row_array();
	}


	function carbrand_update()
	{

		$brand_car_image='';
		if(isset($_FILES['BrandCarImage']) &&  $_FILES['BrandCarImage']['name']!='')
		{
			$this->load->library('upload');
			$rand=rand(0,100000); 
			 
		   $_FILES['userfile']['name']     =   $_FILES['BrandCarImage']['name'];
		   $_FILES['userfile']['type']     =   $_FILES['BrandCarImage']['type'];
		   $_FILES['userfile']['tmp_name'] =   $_FILES['BrandCarImage']['tmp_name'];
		   $_FILES['userfile']['error']    =   $_FILES['BrandCarImage']['error'];
		   $_FILES['userfile']['size']     =   $_FILES['BrandCarImage']['size'];
  
		   $config['file_name'] = $rand.'Car';			
		   $config['upload_path'] = base_path().'upload/car_orig/';		
		   $config['allowed_types'] = 'jpg|jpeg|gif|png|bmp';  

			$this->upload->initialize($config);

			 if (!$this->upload->do_upload())
			 {
			   $error =  $this->upload->display_errors();
			   echo "<pre>";print_r($error);
			 } 
				$picture = $this->upload->data();	   
			 $this->load->library('image_lib');		   
			 $this->image_lib->clear();
			 $gd_var='gd2';

			 $this->image_lib->initialize(array(
			   'image_library' => $gd_var,
			   'source_image' => base_path().'upload/car_orig/'.$picture['file_name'],
			   'new_image' => base_path().'upload/carimages/'.$picture['file_name'],
			   'maintain_ratio' => FALSE,
			   'quality' => '100%',
			   'width' => 512,
			   'height' => 189
			));
		   
		   
		   if(!$this->image_lib->resize())
		   {
			   $error = $this->image_lib->display_errors();
		   }
		   
		   $brand_car_image=$picture['file_name'];
	   
		   
	   
		   if($this->input->post('pre_brand_car_image')!='')
			   {
				   if(file_exists(base_path().'upload/carimages/'.$this->input->post('pre_brand_car_image')))
				   {
					   $link=base_path().'upload/carimages/'.$this->input->post('pre_brand_car_image');
					   unlink($link);
				   }
				   
				   if(file_exists(base_path().'upload/car_orig/'.$this->input->post('pre_brand_car_image')))
				   {
					   $link2=base_path().'upload/car_orig/'.$this->input->post('pre_brand_car_image');
					   unlink($link2);
				   }
			   }
		   } else {
			   if($this->input->post('pre_brand_car_image')!='')
			   {
				   $brand_car_image=$this->input->post('pre_brand_car_image');
			   }
		   }

	   	$CarBrandId=$this->input->post('CarBrandId');
	   	// $StartPointCityId=implode(',',$this->input->post('StartPointCityId'));
	   	// $EndPointCityId=implode(',',$this->input->post('EndPointCityId'));
        $data = array(
		'BrandName'=>trim($this->input->post('BrandName')),
		'PerHoureFare'=>trim($this->input->post('PerHoureFare')),
		// 'StartPointCityId'=>trim($StartPointCityId),
		// 'EndPointCityId'=>trim($EndPointCityId),
		'PerKmRate'=>trim($this->input->post('PerKmRate')),
		'ExtraKMS'=>trim($this->input->post('ExtraKMS')),
		'DriverAllowancePerDay'=>trim($this->input->post('DriverAllowancePerDay')),
		'StateTax'=>trim($this->input->post('StateTax')),

		'TotalSeat'=>trim($this->input->post('TotalSeat')),
		'TotalBaggage'=>trim($this->input->post('TotalBaggage')),
		'BrandCarDescription'=>trim($this->input->post('BrandCarDescription')),
		'BrandCarImage'=>$brand_car_image,	
		'IsActive' =>$this->input->post('IsActive'),					
		'UpdatedOn'=>date('Y-m-d')		
		); 
		//print_r($data);die;
		$this->db->where("CarBrandId",$CarBrandId);
		$res=$this->db->update('tblcarbrand',$data);		
		return $res;
	}
	
}
