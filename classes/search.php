<?php

/**
* 
*/
class search extends mysqli
{
	
	
	public function __construct()
	{
		parent::__construct("localhost","root","","dbi290400");
		if($this->connect_error)
		{
			echo "Fail to connect to Database :".$this->connect_error;
		}


	}

	

	public function search($search_term)
	{
		$sanitized = $this->real_escape_string($search_term);

		$q = "SELECT `RMA No`,`cust_ref_no`,`Original SN`,`UID Status`,`Tracking No` 
		FROM `report` 
		WHERE `RMA No` LIKE '%{$sanitized}%' 
		OR `cust_ref_no` LIKE '%{$sanitized}%' ";

		if(!$sanitized)
		{
			echo "please input search term";
			return false;

		} else {
			$query = $this->query($q);
		}



		if(!$query->num_rows)
		{
			
			echo "something is wrong";
			return false;
		}

		while($row = $query->fetch_object())
		{
			$rows[] = $row;
		}

		$search_results = array(
			'count' => $query->num_rows,
			'results' => $rows, );

		return $search_results;
		;
	}

	public function profilesearch($search_term)
	{
		$sanitized = $this->real_escape_string($search_term);

		$q = "SELECT `RMA No`,`cust_ref_no`, `RMA Ref No`,`Original SN`,`UID Status`,`Tracking No` 
		FROM `report` 
		WHERE `RMA No` LIKE '%{$sanitized}%' 
		OR `cust_ref_no` LIKE '%{$sanitized}%' 
		OR `RMA Ref No` LIKE '%{$sanitized}%'";

		if(!$sanitized)
		{
			echo "please input search term";
			return false;

		} else {
			$query = $this->query($q);
		}



		if(!$query->num_rows)
		{
			
			echo "something is wrong";
			return false;
		}

		while($row = $query->fetch_object())
		{
			$rows[] = $row;
		}

		$search_results = array(
			'count' => $query->num_rows,
			'results' => $rows, );

		return $search_results;
		;
	}


	public function adminsearch($date_data)
	{
		

		$string = explode('-', $date_data);    
		$date1=  date("Y-m-d", strtotime($string[0]));
		$date2=  date("Y-m-d", strtotime($string[1]));


		$q = "SELECT `Date of complaint`, COUNT(`Date of complaint`) as 'case_count'
		FROM complaints 
		WHERE `Date of complaint` BETWEEN '{$date1}' AND  '{$date2}'
		GROUP BY `Date of complaint`";

		$query = $this->query($q);

		if(!$query->num_rows)
		{
			
			echo "something is wrong";
			return false;
		}

		while($row = $query->fetch_object())
		{
			$rows[] = $row;
		}

		$admin_search_results = array(

			'results' => $rows);

		return $admin_search_results;



	}

	public function test()
	{
		$q = "SELECT `Date of complaint`, COUNT(`Date of complaint`) as 'case_count'
		FROM complaints 
		WHERE `Date of complaint` BETWEEN '2017-05-09' AND  '2017-05-13'
		GROUP BY `Date of complaint`";

		$query = $this->query($q);

		if(!$query->num_rows)
		{
			
			echo "something is wrong";
			return false;
		}

		while($row = $query->fetch_object())
		{
			$rows[] = $row;
		}

		$admin_search_results = array(

			'results' => $rows);

		return $admin_search_results;
	}

	






}