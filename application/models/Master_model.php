<?php if( !defined('BASEPATH')) exit('No direct script access alloed');
//require(APPPATH.'libraries/image.php');
class Master_model extends CI_Model
{
	/*
		# function getRecordCount($tbl_name,$condition=FALSE)
		# * indicates paramenter is must
		# Use : 
			1) return number of rows
		# Parameters : 
			$tbl_name* =name of table 
			$condition=array('column_name1'=>$column_val1,'column_name2'=>$column_val2);
		
		# How to call:
			$this->master_model->getRecordCount('tbl_name',$condition_array);
	*/

	public function arrayColumn($array, $key)
    {
        foreach (explode('.', $key) as $segment) {
            $results = [];

            foreach ($array as $value) {
                if (array_key_exists($segment, $value = (array) $value)) {
                    $results[] = $value[$segment];
                }
            }

            $array = array_values($results);
        }

        return array_values($results);
    }
	
	public function getRecordCount($tbl_name,$condition=FALSE)
	{
		if($condition!="" && count($condition)>0)
		{
			foreach($condition as $key=>$val)
			{ $this->db->where($key,$val); }
		}
		$num=$this->db->count_all_results($tbl_name);
		return $num;
	}
	
	/*
		# function getRecords($tbl_name,$condition=FALSE,$select=FALSE,$order_by=FALSE,$limit=FALSE,$start=FALSE)
		# * indicates paramenter is must
		# Use : 
			1) return array of records from table
		# Parameters : 
			1) $tbl_name* =name of table 
			2) $condition=array('column_name1'=>$column_val1,'column_name2'=>$column_val2);
			3) $select=('col1,col2,col3');
			4) $order_by=array('colname1'=>order,'colname2'=>order); Order='ASC OR DESC'
			5) $limit= limit for paging
			6) $start=start for paging
		
		# How to call:
			$this->master_model->getRecords('tbl_name',$condition_array,$select,...);
			
		# In case where we need joins, you can pass joins in controller also.
		Ex: 
			$this->db->join('tbl_nameB','tbl_nameA.col=tbl_nameB.col','left');
			$this->master_model->getRecords('tbl_name',$condition_array,$select,...);
			
		# Instruction 
			1) check number of counts in controller or where you are displying records
			
	*/
	
	public function getRecords($tbl_name,$condition=FALSE,$select=FALSE,$order_by=FALSE,$start=FALSE,$limit=FALSE)
	{
		if($select!="")
		{$this->db->select($select);}
		
		if(count($condition)>0 && $condition!="")
		{ $condition=$condition; }
		else
		{$condition=array();}
		if(count($order_by)>0 && $order_by!="")
		{
			foreach($order_by as $key=>$val)
			{$this->db->order_by($key,$val);}
		}
		if($limit!="" || $start!="")
		{ $this->db->limit($limit,$start);}
		
		$rst=$this->db->get_where($tbl_name,$condition);
		return $rst->result_array();
	}
	
	public function insertRecord($tbl_name,$data_array,$insert_id=FALSE)
	{
		if($this->db->insert($tbl_name,$data_array))
		{
			if($insert_id==true)
			{return $this->db->insert_id();}
			else
			{return true;}
		}
		else
		{return false;}
	}
	
	/*
		# function updateRecord($tbl_name,$data_array,$pri_col,$id)
		# * indicates paramenter is must
		# Use : 
			1) updates record, on successful updates return true.
		# Parameters : 
			1) $tbl_name* = name of table 
			2) $data_array* = array('column_name1'=>$column_val1,'column_name2'=>$column_val2);
			3) $pri_col* = primary key or column name depending on which update query need to fire.
			4) $id* = primary column or condition column value.

		# How to call:
			$this->master_model->updateRecord('tbl_name',$data_array,$pri_col,$id)
	*/
	public function updateRecord($tbl_name,$data_array,$where_arr)
	{
		$this->db->where($where_arr,NULL,FALSE);
		if($this->db->update($tbl_name,$data_array))
		{return true;}
		else
		{return false;}
	}
	
	
	/*
		# function deleteRecord($tbl_name,$pri_col,$id)
		# * indicates paramenter is must
		# Use : 
			1) delete record from table, on successful deletion returns true.
		# Parameters : 
			1) $tbl_name* = name of table 
			2) $pri_col* = primary key or column name depending on which update query need to fire.
			3) $id* = primary column or condition column value.

		# How to call:
			$this->master_model->deleteRecord('tbl_name','pri_col',$id)
		# It will useful while deleting record from  single table. delete join will not work here.
	*/
	public function deleteRecord($tbl_name,$pri_col,$id)
	{
		$this->db->where($pri_col,$id);
		if($this->db->delete($tbl_name))
		{return true;}
		else
		{return false;}
	}
	
	/* 
		# function createThumb($file_name,$path,$width,$height,$maintain_ratio=FALSE)
		# * indicates paramenter is must
		# Use : 
			1) create thumb of uploaded image.
		# Parameters : 
			1) $file_name* = name of uploaded file 
			2) $path* = path of directory
			3) $width* = width of thumb
			4) $height* = height of thumb
			5) $maintain_ratio = if need to maintain ration of original image then pass true, in this case thumb may vary in
								height and width provided. default it is FALSE.

		# How to call:
			$this->master_model->createThumb($file_name,$path,$width,$height,$maintain_ratio=FALSE)
			
		# !!Important : thumb foler  name must be 'thumb'
	*/
	public function createThumb($file_name,$path,$width,$height,$maintain_ratio=FALSE)
	{
		$config_1['image_library']='gd2';
		$config_1['source_image']=$path.$file_name;		
		$config_1['create_thumb']=TRUE;
		$config_1['maintain_ratio']=$maintain_ratio;
		$config_1['thumb_marker']='';
		$config_1['new_image']=$path."thumb/".$file_name;
		$config_1['width']=$width;
		$config_1['height']=$height;
		$this->load->library('image_lib',$config_1);	
		$this->image_lib->initialize($config_1);
		$this->image_lib->resize();
		
		if(!$this->image_lib->resize())
		echo $this->image_lib->display_errors();
		
	}

	public function createThumbdetail($file_name,$path,$width,$height,$maintain_ratio=FALSE)
	{
		$config_1['image_library']='gd2';
		$config_1['source_image']=$path.$file_name;		
		$config_1['create_thumb']=TRUE;
		$config_1['maintain_ratio']=$maintain_ratio;
		$config_1['thumb_marker']='';
		$config_1['new_image']=$path."thumbdetail/".$file_name;
		$config_1['width']=$width;
		$config_1['height']=$height;
		$this->load->library('image_lib',$config_1);	
		$this->image_lib->initialize($config_1);
		$this->image_lib->resize();
		
		if(!$this->image_lib->resize())
		echo $this->image_lib->display_errors();
		
	}
	
	/* create slug */
	function create_slug($phrase,$tbl_name,$title_col,$pri_col='',$id='',$maxLength=100000000000000)
	{
		$result = strtolower($phrase);
		$result = preg_replace("/[^A-Za-z0-9\s-._\/]/", "", $result);
		$result = trim(preg_replace("/[\s-]+/", " ", $result));
		$result = trim(substr($result, 0, $maxLength));
		$result = preg_replace("/\s/", "-", $result);
		$slug=$result;
		if($id!="")
		{
			$this->db->where($pri_col.' !=' ,$id);
		}
		$rst=$this->db->get_where($tbl_name,array($title_col=>$slug));
		
		if($rst->num_rows() > 0)
		{
			//$count=$rst->num_rows()+1;
			return $slug=$slug;
		}
		else
		{return $slug;}
	}
	public function video_image($url)
	{
		$image_url = parse_url($url);
		if($image_url['host'] == 'www.youtube.com' || $image_url['host'] == 'youtube.com'){
		$array = explode("&", $image_url['query']);
		return "http://img.youtube.com/vi/".substr($array[0], 2)."/0.jpg";
		} else if($image_url['host'] == 'www.vimeo.com' || $image_url['host'] == 'vimeo.com'){
		$hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/".substr($image_url['path'], 1).".php"));
		return $hash[0]["thumbnail_large"];
		}
	}
	
	public function document_upload($file_name,$id,$config,$company_id,$config1)
	{ 
		$this->load->library('upload');
		$this->upload->initialize($config1);
	
		if($this->upload->do_upload($file_name))
		{  echo 'model';exit;
			$dt=$this->upload->data();
			$config_1['image_library']='gd2';
			$config_1['source_image']="uploads/project_document/".$dt['file_name'];
			$config_1['thumb_marker']='';
			$this->load->library('image_lib', $config_1);
			$this->image_lib->initialize($config_1);
			$this->image_lib->resize();	
			
			$qry=array('company_id'=>$company_id,'project_id'=>$id,'document_name'=>$dt['file_name']);
			if($this->db->insert('project_document',$qry))
			{ //echo $this->db->last_query();
		//	exit;
				return true;
			}
			else
			{return false;
			}
		}
		else
		{
			//print_r($this->upload->display_errors());	
		}
	}
	
	public function resizeImage($filename, $width, $height,$dir_path) 
	{
		
		/*$DIRIMAGE = 'D:/wamp/www/pioneer_realestate/uploads/property_image/';*/
		/*$DIRIMAGE = 'uploads/property_image/';*/
		
		/*echo '******* '.$DIRIMAGE.$filename;*/

		if($dir_path=="")
		{
			log_message("error","Empty Directory Error ");
			return;
		}
		$DIRIMAGE = $dir_path;
		if (!file_exists($DIRIMAGE.$filename) || !is_file($DIRIMAGE . $filename)) {
			
			/*echo '**-------*** '.$DIRIMAGE.$filename;*/
			log_message("error","File ".$DIRIMAGE.$filename." Dosenot Exists ");
			return;
		} 
		
		$info = pathinfo($filename);
		$extension = $info['extension'];
		
		$old_image = $filename;
		$new_image = 'img_cache/' . substr($filename, 0, strrpos($filename, '.')) . '-' . $width . 'x' . $height . '.' . $extension;
		
		if (!file_exists($DIRIMAGE . $new_image)) {
			
		
			$path = '';
			
			$directories = explode('/', dirname(str_replace('../', '', $new_image)));
			
			foreach ($directories as $directory) 
			{
				$path = $path . '/' . $directory;
				if (!file_exists($DIRIMAGE . $path)) {
					@mkdir($DIRIMAGE . $path, 0777);
				}		
			}
			//echo $new_image;exit;
			$image = new Image($DIRIMAGE . $old_image);
			$image->resize($width, $height);
			$image->save($DIRIMAGE . $new_image);
		}

		return base_url().$DIRIMAGE.$new_image;
	}

	/*Developer Kiran*/
	public function calculate_profile_completion()
 	{
 		$curr_user = $this->session->all_userdata();

 		$this->db->limit(1);
 		$business_info 				= $this->master_model->getRecords(TBL_BUSINESS_INFORMATION,array('business_id'=>$curr_user['business_id']));

 		$this->db->limit(1);
 		$location_info 				= $this->master_model->getRecords(TBL_BUSINESS_LOCATIONS,array('fk_business_id'=>$curr_user['business_id']));

 		$this->db->limit(1);
 		$staff_info 				= $this->master_model->getRecords(TBL_BUSINESS_STAFF,array('fk_business_id'=>$curr_user['business_id']));

 		$this->db->limit(1);
 		$staff_location_hours_info 	= $this->master_model->getRecords(TBL_STAFF_LOCATION_HOURS,array('fk_business_id'=>$curr_user['business_id']));

 		$this->db->limit(1);
 		$services_info 				= $this->master_model->getRecords(TBL_SERVICES_MENU,array('fk_business_id'=>$curr_user['business_id']));

 		$this->db->limit(1);
 		$business_photo_info 		= $this->master_model->getRecords(TBL_BUSINESS_PHOTOS,array('fk_business_id'=>$curr_user['business_id']));

 		$this->db->limit(1);
		$business_settings 			= $this->master_model->getRecords(TBL_BUSINESS_SETTINGS,array('fk_business_id'=>$curr_user['business_id'])); 		
 		
 		$profile_completed = 0;

 		if(isset($business_info) && count($business_info) > 0)
 		{
 			if(isset($business_info[0]['facebook_link']) && $business_info[0]['facebook_link']!="" && 
 				isset($business_info[0]['site_url']) && $business_info[0]['site_url']!="" &&
 				isset($business_info[0]['instagram_link']) && $business_info[0]['instagram_link']!="" &&
 				isset($business_info[0]['twitter_link']) && $business_info[0]['twitter_link']!="" &&
 				isset($business_info[0]['linkedin_link']) && $business_info[0]['linkedin_link']!=""
 				)
 			{
 				$profile_completed += 7;	
 			}

 			if(isset($business_info[0]['business_description']) && $business_info[0]['business_description']!="")
 			{
 				$profile_completed += 2;
 			}

 			if(isset($business_info[0]['business_attraction']) && $business_info[0]['business_attraction']!="")
 			{
 				$profile_completed += 2;
 			}

 			if(isset($business_info[0]['business_competition']) && $business_info[0]['business_competition']!="")
 			{
 				$profile_completed += 2;
 			}

 			if(isset($business_info[0]['training_info']) && $business_info[0]['training_info']!="")
 			{
 				$profile_completed += 1;
 			}
			// $profile_completed += 14;
 		}
 		if(isset($location_info) && count($location_info) > 0)
 		{
			$profile_completed += 14;
 		}
 		if(isset($staff_info) && count($staff_info) > 0)
 		{
			$profile_completed += 14;
 		}
 		if(isset($staff_location_hours_info) && count($staff_location_hours_info) > 0)
 		{
			$profile_completed += 15;
 		}
 		if(isset($services_info) && count($services_info) > 0)
 		{
			$profile_completed += 15;
 		}
 		if(isset($business_photo_info) && count($business_photo_info) > 0)
 		{
			$profile_completed += 14;
 		}
 		if(isset($business_settings) && count($business_settings) > 0)
 		{
			$profile_completed += 14;
 		}

		return $profile_completed;
 	}

 	public function createUrl()
 	{
	 	$curr_user 	= 	$this->session->all_userdata();
	 	$url_array	=	array();
 		if(isset($curr_user["business_id"]))
		{
	 		/*Create Url*/
			$this->db->join(TBL_SUB_CATEGORY,TBL_CATEGORY.'.category_id='.TBL_SUB_CATEGORY.'.fk_category_id');
			$url_category_info=$this->master_model->getRecords(TBL_CATEGORY);
			
			$this->db->join(TBL_SERVICES_MENU,TBL_BUSINESS_INFORMATION.'.business_id='.TBL_SERVICES_MENU.'.fk_business_id');
			$this->db->join(TBL_BUSINESS_LOCATIONS,TBL_BUSINESS_INFORMATION.'.business_id='.TBL_BUSINESS_LOCATIONS.'.fk_business_id');
			$this->db->join(TBL_BUSINESS_STAFF,TBL_BUSINESS_INFORMATION.'.business_id='.TBL_BUSINESS_STAFF.'.fk_business_id');
			$url_data=$this->master_model->getRecords(TBL_BUSINESS_INFORMATION,array(TBL_BUSINESS_INFORMATION.'.business_id'=>$curr_user["business_id"]));

			$city="";
			$country="";
			$category_name="";
			$subcategory_name="";
			$business_name="";
			$business_id="";
			$location_id="";
			$service_menu_id="";

			if(isset($url_data[0]['city'])) 
			{ 
				 $city=$url_data[0]['city']; 
			}
			else
			{
				$city;
			}
			if(isset($url_data[0]['country'])) 
			{ 
				 $country=$url_data[0]['country']; 
			}
			else
			{
				$country;
			}
			
			if(isset($url_category_info[0]['category_name'])) 
			{ 
				 $category_name=$url_category_info[0]['category_name']; 
			}
			else
			{
				$category_name;
			}
			if(isset($url_category_info[0]['sub_category'])) 
			{ 
				 $subcategory=$url_category_info[0]['sub_category']; 
			}
			else
			{
				$subcategory;
			}
			if(isset($url_data[0]['business_name'])) 
			{ 
				 $business_name=$url_data[0]['business_name']; 
			}
			else
			{
				$business_name;
			}
			if(isset($url_data[0]['business_id'])) 
			{ 
				 $business_id=$url_data[0]['business_id']; 
			}
			else
			{
				$business_id;
			}
			if(isset($url_data[0]['location_id'])) 
			{ 
				 $location_id=$url_data[0]['location_id']; 
			}
			else
			{
				$location_id;
			}
			if(isset($url_data[0]['service_menu_id'])) 
			{ 
				 $service_menu_id=$url_data[0]['service_menu_id']; 
			}
			else
			{
				$service_menu_id;
			}

			$url_array	=	array('city'=>$city,
									 'country'=>$country,
									 'category'=>$category_name,
									 'subcategory'=>$subcategory,
									 'business_name'=>$business_name,
									 'enc_business_id'=>$business_id,
									 'enc_location_id'=>$location_id,
									 'enc_service_menu_id'=>$service_menu_id	
									);
	 	}

	 	return $url_array;
	}

}
?>