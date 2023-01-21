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

    function reg_user($nic, $username, $email, $pass, $cpass){
        $con = Connection();

        $_SESSION['UserName'] = $username;

        if(empty($nic)){
            return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>NIC Error</strong>NIC Cannot be empty..!
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                    </button>
            </div>";
        }
        elseif(empty($username)){
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
        elseif($pass != $cpass){
            return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>Password Error</strong>Password not Match..!
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                    </button>
            </div>";
        }
        else{
            $check_user = "SELECT * FROM user_tbl WHERE nic_no = '$nic'";
            $check_user_result = mysqli_query($con, $check_user);
            $check_user_nor = mysqli_num_rows($check_user_result);

            if($check_user_nor == 0){
                $insert_data = "INSERT INTO user_tbl(nic_no,username,email,pass1,is_pending,is_active,join_date)VALUES('$nic','$username','$email','$pass',1,0,NOW())";
                $insert_data_result = mysqli_query($con, $insert_data);

                if(!$insert_data_result){
                    return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                            <strong>Process Error</strong>Can not Process the Request..!
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                    </div>";
                }elseif($insert_data_result){
                    return  "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>Successfull </strong>User Created Successfully <a href='login.php'>Login Here..!</a>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                    </div>";
                }

            }else{
                return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>User Error</strong>User Doesn't Exists..!
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                        </button>
                </div>";
            }
        }
    }

    function waiting_user(){
        $con = Connection();
        
        
    }


?>
