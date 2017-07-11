<?php
	class upload
	{
		private $_fileName,
				$_tmpName,
				$_target,
				$_validExtensions,
				$_message,
				$_maxSize,
				$_isImage;

		function Upload()
    	{

    	}


		public function ValidateExtension(){
			$fileName = trim($this->_fileName);
	        $fileParts = pathinfo($fileName);
	        $Extension = strtolower($fileParts['extension']);
	        $ValidExtensions = $this->_validExtensions;

	        if (!$fileName) {
	            $this->SetMessage("ERROR: File name is empty.");
	            return false;
        	}

	        if (!$ValidExtensions) {
	            $this->SetMessage("WARNING: All extensions are valid.");
	            return true;
	        }

	        if (in_array($Extension, $ValidExtensions)) {
            	$this->SetMessage("MESSAGE: The extension '$Extension' appears to be valid.");
            	return true;
        	} else {
            	$this->SetMessage("Error: The extension '$Extension' is invalid.");
            	return false;  
        	}
		}

		function ValidateSize()
	    {
	        $MaximumFileSize = $this->_maxSize;
	        $TempFileName = $this->GetTempName();
	        $TempFileSize = filesize($TempFileName);

	        if($_maxSize == "") {
	            $this->SetMessage("WARNING: There is no size restriction.");
	            return true;
	        }

	        if ($_maxSize <= $TempFileSize) {
	            $this->SetMessage("ERROR: The file is too big. It must be less than $_maxSize and it is $TempFileSize.");
	            return false;
	        }

	        $this->SetMessage("Message: The file size is less than the MaximumFileSize.");
	        return true;
	    }

	    function ValidateExistance()
	    {
	        $fileName = $this->_fileName;
	        $targetDirectory = $this->_target;
	        $File = $targetDirectory . $fileName;

	        if (file_exists($File)) {
	            $this->SetMessage("Message: The file '$fileName' already exist.");
	            $UniqueName = rand() . $fileName;
	            $this->SetFileName($UniqueName);
	            $this->ValidateExistance();
	        } else {
	            $this->SetMessage("Message: The file name '$fileName' does not exist.");
	            return false;
	        }
	    }


	    function UploadFile()
	    {

	        if (!$this->ValidateExtension()) {
	            die($this->GetMessage());
	        } 

	        else if ($this->ValidateExistance()) {
	            die($this->GetMessage());
	        }

	        else if ($this->_isImage && !$this->ValidateImage()) {
	            die($this->GetMessage());
	        }

	        else {

	            $fileName = $this->_fileName;
	            $TempFileName = $this->_tmpName;
	            $targetDirectory = $this->_target;

	            if (is_uploaded_file($TempFileName)) { 
	                move_uploaded_file($TempFileName, $targetDirectory . $fileName);
	                return true;
	            } else {
	                return false;
	            }

	        }

    	}

    	public function SetFileName($fileName)
		{
		    $this->_fileName = $fileName;
		}
		public function SetUploadDirectory($dir)
	    {
	        $this->_target = $dir;
	    }
	    public function SetTempName($tempName)
	    {
	        $this->_tmpName = $tempName;
	    }

	    public function SetValidExtensions($ext)
	    {
	        $this->_validExtensions = $ext;
	    }

	    public function SetMessage($message)
	    {
	        $this->_message = $message;
	    }

	    public function SetMaximumFileSize($maxSize)
	    {
	        $this->_maxSize = $maxSize;
	    }
	    public function SetIsImage($isit)
	    {
	        $this->_isImage = $isit;
	    }
	    public function GetFileName()
	    {
	        return $this->_fileName;
	    }

	    public function GetUploadDirectory()
	    {
	        return $this->_target;
	    }

	    public function GetTempName()
	    {
	        return $this->_tmpName;
	    }

	    public function GetValidExtensions()
	    {
	        return $this->_validExtensions;
	    }

	    public function GetMessage()
	    {
	        if (!isset($this->_message)) {
	            $this->SetMessage("No Message");
	        }

	        return $this->_message;
	    }

	    public function GetMaximumFileSize()
	    {
	        return $this->_maxSize;
	    }
	    public function GetIsImage()
	    {
	        return $this->_isImage;
	    }



	}
?>
