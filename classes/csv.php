<?php

class csv extends mysqli
{
	private $state_csv = false;
	public function __construct()
	{
		parent::__construct("localhost","root","","dbi290400");
		if($this->connect_error)
		{
			echo "Fail to connect to Database :".$this->connect_error;
		}


	}

	public function import($file)
	{
		$first = false;
		$file = fopen($file, 'r');
		$this->state_csv = false;

		while ($row = fgetcsv($file) ) 
		{
			if(!$first)
			{
				$first = true;
			} else {
			
			$value = "'". implode("','", $row) ."'";
			$query = "INSERT INTO report VALUES (".$value.")";
		

			if ($this->query($query) ) 
			{

				$this->state_csv = true;
			
			}
			else 
			{
				$this->state_csv = false;

			}
			
			}


		}

		if($this->state_csv)
		{
				echo "Successfully Imported";
		} else {
			echo "Import Failed";
		}



	}

	public function export()
	{

		require_once('classes/redirect.php');
		$this->state_csv = false;
		$query = "SELECT * FROM complaints as c";
		$run = $this->query($query);
		if ($run->num_rows > 0) {
		 	$fn = "Report".uniqid().".csv";
		 	$file = fopen("download/".$fn,"w");

		 	while ($row = $run->fetch_array(MYSQLI_NUM)) 
		 	{
		 		if (fputcsv($file, $row)) 
		 		{
		 			$this->state_csv = true;
		 		} else {
		 			$this->state_csv = false;
		 		}
		 	}
		 	Redirect::to("download/".$fn);

		 	if ($this->state_csv) {
		 		echo "Exported";
		 	} else {
		 		echo "export failed";
		 	}

		 	

		 } else {
		 	echo "No data found";
		 } 
	}

	public function download()
	{
		require_once('classes/redirect.php');
		Redirect::to("download/Report59653d034c5a8.csv");


	}

	public function test($file)
	{
		$file = fopen($file, 'r');
		while ($row = fgetcsv($file) ) 
		{
			print "<pre>";
			print_r($row);
			print "<pre>";
			$value = "'". implode("';'", $row) ."'";
			echo $value;

		}

	}

	public function truncate() 
	{
		$q = "TRUNCATE TABLE report";

		$run = $this->query($q);
	}
}	

?>