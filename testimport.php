<?php

require_once 'core/init.php';

include('classes/csv.php');
$csv = new csv();

include('classes/search.php');
$search = new search();

require_once('classes/upload_image.php');  
$upload_image = new uploadimage();

 $search_results = false;

if (isset($_POST['submit'])) 
{
  $csv->truncate();
  $csv->import($_FILES['file']['tmp_name']);
   
}

if(isset($_POST['download'])) {
  
  $csv->export();
}

if(isset($_GET['search']))
{

  $search_term = $_GET['search'];

  $search_results = $search->search($search_term);

}


if(isset($_FILES["files"]))
{


  $filename = $_FILES['files'];
  $serialnumber = $_POST['serialnumber'];

  $upload = $upload_image->upload($filename, $serialnumber);


}

if (isset($_POST['test'])) {
  $upload_image->test();
}
                  



?>

<!doctype html>
<html lang="en-US">


<head>
  
  <title>User Profile </title>
  
</head>

<body>
<form method="post" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" name="submit" value="import">
</form>     

<form method="post">
 <input type="submit" value="download" name="download">
</form>

<form method="get">
  <input type="search" name="search" placeholder="input search here">
  <input type="submit" value="Search" >
</form>

<form method="post">
  <input type="submit" name="truncate" value="delete">
</form>


<form method ="post" enctype="multipart/form-data">
 <input type="text" name="serialnumber">
 <input type="file" name="files[]" multiple="">
 <input type="submit" name="image" >
</form>

<form method="post">
  <input type="submit" name="test" value="nasi">
</form>

<?php if ($search_results) :?>
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
</body>

</html>

