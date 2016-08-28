<form action="1808.php" enctype="multipart/form-data" name="" method="POST">
	<input type="file" name="upload" >
	<input type="submit" name="">
</form>

<?php
if (count($_FILES) == 0){
	exit();
}
//как бы первая папка не называлась она должны быть как в putty
if (!copy($_FILES["upload"]["tmp_name"], "/vagrant/letoyii/web/upload/".$_FILES["upload"]["name"])){
	echo "ну не скопировалось";
}

?>