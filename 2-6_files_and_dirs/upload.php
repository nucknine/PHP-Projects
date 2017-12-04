<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){

		if ( $_FILES["userfile"]["error"] != UPLOAD_ERR_OK){
			switch($_FILES["userfile"]["error"]){
				case UPLOAD_ERR_INI_SIZE:
					echo "Превышен максимально допустимый размер"; break;
				case UPLOAD_ERR_FORM_SIZE:
					echo "Превышено значение MAX_FILE_SIZE"; break;
				case UPLOAD_ERR_PARTIAL:
					echo "Файл загружен частично"; break;
				case UPLOAD_ERR_NO_FILE:
					echo "Файл не был загружен"; break;
				case UPLOAD_ERR_NO_TMP_DIR:
					echo "Отсутствует временная папка"; break;
				case UPLOAD_ERR_CANT_WRITE:
					echo "Не удалось записать файл на диск";
			}
		} else {
				echo "Размер загруженного файла: " . $_FILES["userfile"]["size"];
				echo "<br />";
				echo "Тип загруженного файла: " . $_FILES["userfile"]["type"];
				move_uploaded_file($_FILES["userfile"]["tmp_name"], "upload/" . $_FILES["userfile"]["name"]);
				}
	}
?>
<form action='upload.php' method='post' enctype='multipart/form-data'>
<input type="hidden" name="MAX_FILE_SIZE" value="4096" />
<input type='file' name='userfile' />
<input type='submit' />
</form>