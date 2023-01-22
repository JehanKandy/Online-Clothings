<?php 
    include("config.php");

    use FTP\Connection;

    session_start();

    function subsctibe($email){
        $con = Connection();

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>Email Error</strong> Invalied Email Format..!
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                    </button>
            </div>";
        }
        else{

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
    }

    function reg_user($nic, $username, $email, $pass, $cpass){
        $con = Connection();

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
        }
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>Email Error</strong> Invalied Email Format..!
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                    </button>
            </div>";
        }
        elseif(empty($pass)){
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
                        <strong>User Error</strong>User Already Exists..!
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                        </button>
                </div>";
            }
        }
    }

    function login_user($username, $pass){
        $con = Connection();

        $_SESSION['Username'] = $username;

        if(empty($username)){
            return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>Username Error</strong>Username Cannot be empty..!
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                    </button>
            </div>";
        }
        elseif(empty($pass)){
            return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>Password Error</strong>Password Cannot be empty..!
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                    </button>
            </div>";
        }else{
            /* 
                1st check the user is pending 
                2nd check the user is deactive
                3rd successfully login
            */

            // user pending check

            $user_is_pending = "SELECT * FROM user_tbl WHERE username = '$username' && pass1 = '$pass' && is_active = 0 && is_pending = 1";
            $user_is_pending_result = mysqli_query($con, $user_is_pending);
            $user_is_pending_nor = mysqli_num_rows($user_is_pending_result);

            if($user_is_pending_nor != 0){
                header("location:waiting_user.php");
            }
            else{
                // user deactive check
                $user_is_deactive = "SELECT * FROM user_tbl WHERE username = '$username' && pass1 = '$pass' && is_active = 0 && is_pending = 0";
                $user_is_deactive_result = mysqli_query($con, $user_is_deactive);
                $user_is_deactive_nor = mysqli_num_rows($user_is_deactive_result);

                if($user_is_deactive_nor != 0){
                    return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                            <strong>User Error</strong> User Deactive..!
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                    </div>";
                }
                else{
                    //user successfully login
                    $user_is_login = "SELECT * FROM user_tbl WHERE username = '$username' && pass1 = '$pass' && is_active = 1 && is_pending = 0";
                    $user_is_login_result = mysqli_query($con, $user_is_login);
                    $user_is_login_nor = mysqli_num_rows($user_is_login_result);    
                    $user_is_login_row = mysqli_fetch_assoc($user_is_login_result);       
                    
                    if($user_is_login_nor > 0){
                        if($user_is_login_row['user_type'] == "user"){
                            setcookie('login',$user_is_login_row['nic_no'],time()+60*60,'/');
                            $_SESSION['LoginSession'] = $user_is_login_row['nic_no'];
                            header("location:../routes/user.php");
                        }if($user_is_login_row['user_type'] == "admin"){
                            setcookie('login',$user_is_login_row['nic_no'],time()+60*60,'/');
                            $_SESSION['LoginSession'] = $user_is_login_row['nic_no'];
                            header("location:../routes/admin.php");
                        }
                    }elseif($user_is_login_nor == 0){
                        return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                <strong>User Error</strong> User Doesn't Exists..!
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                                </button>
                        </div>"; 
                    }
                }
            } 
        }
    }

    function waiting_user(){
        $con = Connection();
        $username = strval($_SESSION['Username']);

        echo $username;
    }

    function request_otp($nic, $email){
        $con = Connection();

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>Email Error</strong> Invalied Email Format..!
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
        }
        elseif(empty($nic)){
            return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>NIC Error</strong>NIC Cannot be empty..!
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                    </button>
            </div>";
        }

        else{
            $check_user = "SELECT * FROM user_tbl WHERE nic_no = '$nic'";
            $check_user_result = mysqli_query($con, $check_user);
            $check_user_nor = mysqli_num_rows($check_user_result);
            $check_user_row = mysqli_fetch_assoc($check_user_result);

            if($check_user_nor > 0){
                $check_otp_user = "SELECT * FROM pass_reset_tbl WHERE nic_no = '$nic'";
                $check_otp_user_result = mysqli_query($con, $check_otp_user);
                $check_otp_user_nor = mysqli_num_rows($check_otp_user_result);
                
                if($check_otp_user_nor == 0){
                    /**
                     * Get the OTP number as random number between 10000 and 99999
                     * 
                     */
                    $otp_number = rand(10000,99999);
                    $enc_otp = md5($otp_number);

                    $recever = $email;
                    $subject = "Password Reset";
                    $body = "OTP For Resent Password";
                    $body .= " use the OTP to update Password : " .$otp_number;
                    $sender = "From:jehankandy@gmail.com";

                    if(mail($recever,$subject,$body,$sender)){
                        $insert_data = "INSERT INTO pass_reset_tbl(nic_no,email,otp_no,get_date)VALUES('$nic','$email','$enc_otp','NOW())";
                        $insert_data_result = mysqli_query($con, $insert_data);

                        if(!$insert_data_result){
                            return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Process Error</strong>Cannot Process the Request..!
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                    </button>
                            </div>";
                        }
                        elseif($insert_data_result){
                            setcookie('Otp',$check_user_row['nic_no'],time()+60*5,'/');
                            $_SESSION['OTP'] = $check_user_row['nic_no'];
                            header("location:verify_otp.php"); 
                        }
                    }
                    else{
                        return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                            <strong>Process Error</strong>Cannot send the OTP..!
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                    </div>";
                    }                    

                }else{
                    return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Process Error</strong>Can not Process the Request..!
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                        </button>
                </div>";
                }

            }else{
                return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>User Error</strong> User Doesn't Exists..!
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                    </button>
            </div>"; 
            }
        }
    }

    function check_otp($otp_no){
        $con = Connection();
        $nic_no = strval($_SESSION['OTP']);

        $check_otp = "SELECT * FROM pass_reset_tbl WHERE nic_no = '$nic_no'";
        $check_otp_result = mysqli_query($con, $check_otp);
        $check_otp_nor = mysqli_num_rows($check_otp_result);
        $check_otp_row = mysqli_fetch_assoc($check_otp_result);

        if($check_otp_nor > 0){
            if($otp_no == $check_otp_row['otp_no']){
                
            }elseif($otp_no != $check_otp_row['otp_no']){
                return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>Process Error</strong>Can not Process the Request..!
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                    </button>
            </div>";
            }
        }else{
            return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>User Error</strong> User Doesn't Exists..!
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
                </button>
        </div>"; 
        }        
    }
    
    function update_pass($nic, $email, $pass, $cpass){
        $con = Connection();
    }
?>
