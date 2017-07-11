<?php

require_once ('core/init.php');
$search_term = false;
$search_results = false;
$admin_search_results = false;

if(isset($_GET['search']))
{


  require_once('classes/search.php');

  $search = new search();

  $search_term = $_GET['search'];


  $search_results = $search->search($search_term);

}

if (isset($_GET['week'])) 
{

  require_once('classes/search.php');
  $search = new search();
  $date_data = $_GET['week'];
  $admin_search_results = $search->adminsearch($date_data);
  
}

if (isset($_POST['email']))
{

  $complaint = new complaint;
  $email_adress = $_POST['email'];
  $email = $complaint->phpmailer($email_adress);
}




?>





<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="css/week-picker-view.css" type="text/css" />
<script src='http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js'></script>
<script type="text/javascript" src="js/week-picker.js"></script>




	<title>search <?php echo $search_term; ?></title>
</head>
<body>

<form action="" method="get">
  <input type="search" name="search" placeholder="input search here" value="<?php echo $search_term; ?> ">
  <input type="submit" value="Search" >
</form>

<form method='get'>
  <input data-weekpicker="weekpicker" data-week_start="1" data-months="5" name="week" />
  <button type="submit" class="btn btn-default">Search</button><br>
</form>


<form method='post'>
  <input type="email" name="email">
  <input type="submit" value="submit">
</form>





<?php if($search_results) :?>
<div class="results-count" >
  <p><?php echo $search_results['count'] ;?></p>
</div>

<div class="results-table">
  <?php foreach ($search_results['results'] as $search_result) : ?> 
    <div class="result">
      <p><?php echo $search_result->cust_ref_no;?></p>
    </div>
  <?php endforeach;?>
</div>
<?php endif;?>

<?php if($admin_search_results) :?>

<div class="results-table">
  <?php foreach ($admin_search_results['results'] as $admin_search_result) : ?> 
    <div class="result">
      <p><?php echo $admin_search_result->case_count;?></p>
    </div>
  <?php endforeach;?>
</div>
<?php endif;?>





</body>
</html>