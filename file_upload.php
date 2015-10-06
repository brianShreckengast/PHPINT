
<form action="<?php echo ($_SERVER['PHP_SELF']);?>" method = "POST" enctype = "multipart/form-data">
	
	<input type = "text" name ="profileName"/>

	<input type ="file" name="avatar"/>

	<input type = "submit" value ="Upload Picture"/>

</form>

<?php

if(move_uploaded_file($_FILES['avatar']['tmp_name'], getcwd().'/'.$_FILES['avatar']['name'])){

	echo '<img width ="300px" src ="'.$_FILES['avatar']['name'].'">';
} else {

	echo "file has not moved";
}

echo "<pre>";
echo 'Files:';
print_r($_FILES);

echo "<br>";

echo 'POST:';
print_r($_POST);


?>