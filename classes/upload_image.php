<?php
 /**
 * 
 */
 class uploadimage extends mysqli
 {
 	public function __construct()
	{
		parent::__construct("localhost","root","","dbi290400");
		if($this->connect_error)
		{
			echo "Fail to connect to Database :".$this->connect_error;
		}


	}


	public function create($fields = array()){
        if(!$this->_db->insert('images', $fields)) {

            throw new Exception('there was a problem upload');

        }
    }

    public function test() 
    {
    	$q = "INSERT into images (image1, image2, image3) values ('kakaka596650893cda40.79554822','kakaka596650893cda40.79554822','kakaka596650893cda40.79554822')";
    	$query = $this->query($q);

    }




	public function upload($imagefile, $serialNumber, $caseid)
	{
				$errors = array();
				$uploadedFiles = array();
				$extension = array("jpeg","jpg","png","gif");
				$UploadFolder = "UploadFolder";
				
				
				foreach($imagefile["name"] as $position=>$file_name){

					$file_tmp = $imagefile["tmp_name"][$position];
					$file_size = $imagefile["size"][$position];
					$file_error = $imagefile["error"][$position];

					$file_ext = explode('.',$file_name);
					$file_ext = strtolower(end($file_ext));

					if(in_array($file_ext, $extension)) 
					{
						if($file_error === 0)
						{
							if($file_size <= 2097152)
							{
								$file_name_new = $serialNumber.'_'.uniqid('',true).'_case '.$caseid.'.'.$file_ext;
								$file_destination = $UploadFolder.'/'.$file_name_new;

								if (move_uploaded_file($file_tmp, $file_destination)) {
									$uploadedFiles[$position] = $file_destination;
									


								} else {
									$failed[$position] = "[{$file_name}] failed to upload.";
								}

							} else {
								$errors[$position] = "[{$file_name}] is to large.";
							}

						} else {
							$errors[$position] = "[{$file_name}] failed to upload.";
						}

					} else {
						$errors[$position] = "[{$file_name}] file extension '{$file_ext}' is not allowed.";
					}


					$q = "INSERT into images (image, case_id) values ('{$uploadedFiles[$position]}', '{$caseid}')";
    				$query = $this->query($q);

				}

				if(!empty($uploadedFiles))
				{
					print_r($uploadedFiles);

				}

				if(!empty($errors))
				{
					print_r($errors);
				}


					
					
			

	}
 }

?>