<?
	if ($_FILES["filename"]["error"]==0) {
		$fname=$_FILES["filename"]["name"];
		$fsize=$_FILES["filename"]["size"];
		if (file_exists("product/$fname")) exit("동일한 파일이 존재합니다");
		if (!move_uploaded_file($_FILES["filename"]["tmp_name"],"product/$fname")) 
			exit ("에러 코드: " . $_FILES["filename"]["error"]);
			//exit("업로드에 실패했습니다.");
		echo("파일이름 : $fname<br> 파일크기 : $fsize");
	}
?>