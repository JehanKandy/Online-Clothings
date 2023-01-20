<?php 
    include("config.php");

    use FTP\Connection;

    session_start();

    function subsctibe($email){
        $con = Connection();

        $select_data = "SELECT * FROM subscribe_tbl WHERE email = '$email'";
        $select_data_result = mysqli_query($con, $select_data);
        


    }


?>
