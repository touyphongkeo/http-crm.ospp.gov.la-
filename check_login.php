<?php
#starts a new sessionfd
session_start();
#includes a database connection
include 'admin/server/connect.php';
#catches user/password submitted by html form
$user = $_POST['user'];
$password = $_POST['password'];
#checks if the html form is filled
if(empty($_POST['user']) || empty($_POST['password'])){
    echo "Fill all the fields!";
}else{
#searches for user and password in the database
$query = "SELECT * FROM IT_Users_CRM WHERE Usr_nm='{$user}' AND PWD='{$password}' AND UsrPermit='Administrator'";
$result = sqlsrv_query($conn, $query);  //$conn is your connection in 'connection.php'
#checks if the search was made
if($result === false){
     die( print_r( sqlsrv_errors(), true));
}
#checks if the search brought some row and if it is one only row
if(sqlsrv_has_rows($result) != 1){
       echo "<script>alert('ບັນຊີຜູ້ໃຊ້ ແລະ ລະຫັດຜ່ານບໍຖືກຕ້ອງ!');location='index.php'</script>";
}else{
#creates sessions
    while($row = sqlsrv_fetch_array($result)){
       $_SESSION['Usr_id'] = $row['Usr_id'];
       $_SESSION['Usr_nm'] = $row['Usr_nm'];    
    }
#redirects user
    header("Location: admin/index.php");
}
}
?> 
