<?php
    include '../server/connect.php'; 

	if(is_array($_FILES)){
		if(is_uploaded_file($_FILES['File_Name']['tmp_name']) == ""){
		}else{
			$joe = $_FILES['File_Name']['tmp_name'];
			$namecv = $_FILES['File_Name']['name'];
			$data = "../cv/".$_FILES['File_Name']['name'];
			if(move_uploaded_file($joe,$data)){



	
	 $sql = "INSERT INTO Cri_Law_files_Labieb (Law_ID, Law_Name, Law_NmE, File_Name)
     VALUES (?, ?, ?, ?)";
	 $params = array(
           $_POST["Law_ID"],
           $_POST["Law_Name"],
           $_POST["Law_NmE"],
		   $namecv
          
     );

	$stmt = sqlsrv_query($conn, $sql, $params);
	if( $stmt === false ) {
		 die( print_r( sqlsrv_errors(), true));
	}
	else
	{
		echo "<script>alert('ບັນທຶກສຳເລັດ');location.href='../basic-FrmLaw_Files_Labieb.php';</script>";
	}
}
}
}

	sqlsrv_close($conn);
	
?>