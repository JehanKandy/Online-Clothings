<?php 
    include("config.php");

    use FTP\Connection;

    session_start();

    function subsctibe($email){
        $con = Connection();

        $select_data = "SELECT * FROM subscribe_tbl WHERE sub_email = '$email'";
        $select_data_result = mysqli_query($con, $select_data);
        $select_data_nor = mysqli_num_rows($select_data_result);

        if($select_data_nor == 0){
            $insert_data = "INSERT INTO subscribe_tbl(sub_email,is_subscribe,sub_date)VALUES('$email',1,NOW())";
            $insert_data_resilt = mysqli_query($con, $insert_data);

            if(!$insert_data_resilt){
                return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Process Error</strong>Cannot Process the Request..!
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                        </button>
                </div>";
            }
            else{
                return  "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Thank You </strong>For Subscribe Us..!
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                        </button>
                </div>";
            }
        }
        else{
            return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>Error</strong>You Already Subscribe..!
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                    </button>
            </div>";
        }
    }

    function reg_user($username, $email, $pass, $cpass){
        $con = Connection();

        if(empty($username)){
            return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>Username Error</strong>Username Cannot be empty..!
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                    </button>
            </div>";
        }
        elseif(empty($email)){
            return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>Email Error</strong>Email Cannot be empty..!
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                    </button>
            </div>";
        }elseif(empty($pass)){
            return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>Password Error</strong>Password Cannot be empty..!
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                    </button>
            </div>";
        }
        elseif(empty($cpass)){
            return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>Password Error</strong>Confirm Password Cannot be empty..!
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                    </button>
            </div>";
        }
    }


?>
