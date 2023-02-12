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
                $insert_data = "INSERT INTO user_tbl(nic_no,username,email,pass1,user_type,is_pending,is_active,join_date)VALUES('$nic','$username','$email','$pass','user',1,0,NOW())";
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
                3rd is user tring to access admin account - Unauthorized Access
                4th user successfully login
            */

            // user pending check

            $user_is_pending = "SELECT * FROM user_tbl WHERE username = '$username' && pass1 = '$pass' && is_active = 0 && is_pending = 1 && un_access = 0";
            $user_is_pending_result = mysqli_query($con, $user_is_pending);
            $user_is_pending_nor = mysqli_num_rows($user_is_pending_result);

            if($user_is_pending_nor != 0){
                header("location:waiting_user.php");
            }
            else{
                // user deactive check
                $user_is_deactive = "SELECT * FROM user_tbl WHERE username = '$username' && pass1 = '$pass' && is_active = 0 && is_pending = 0 && un_access = 0";
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
                
                $user_is_access = "SELECT * FROM user_tbl WHERE username = '$username' && pass1 = '$pass' && is_active = 0 && is_pending = 0 && un_access = 1";
                $user_is_access_result = mysqli_query($con, $user_is_access);
                $user_is_access_nor = mysqli_num_rows($user_is_access_result);
                
                $access_tbl_data = "SELECT * FROM u_accsess_tbl WHERE username = '$username'";
                $access_tbl_data_result = mysqli_query($con, $access_tbl_data);
                $access_tbl_data_row = mysqli_fetch_assoc($access_tbl_data_result);

                $access_time = $access_tbl_data_row['access_time'];

                if($user_is_access_nor != 0){
                    return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                            <strong>Unauthorized Access </strong> You tried to access the admin Account at ".$access_time.", so Your account is suspended. 
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
                            header("location:../routes/all_products.php");
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
                        $insert_data = "INSERT INTO pass_reset_tbl(nic_no,email,otp_no,get_date)VALUES('$nic','$email','$enc_otp',NOW())";
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
                header("location:update_pass.php");
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
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>Email Error</strong> Invalied Email Format..!
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
            $check_user_row = mysqli_fetch_assoc($check_user_result);

            if($check_user_nor > 0){
                if($email == $check_user_row['email']){
                    $update_data = "UPDATE user_tbl SET pass1 = '$pass' WHERE nic_no = '$nic' && email = '$email'";
                    $update_data_result = mysqli_query($con, $update_data);
                    
                    if(!$update_data_result){
                        return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                            <strong>Process Error</strong>Can not Process the Request..!
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                    </div>";
                    }elseif($update_data_result){
                        $delete_otp = "DELETE FROM pass_reset_tbl WHERE nic_no = '$nic'";
                        $delete_otp_result = mysqli_query($con, $delete_otp);
                        header("location:logout.php");
                    }
                }elseif($email != $check_user_row['email']){
                    return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Email Error</strong> Email Cannot Find...!
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

    function user_access(){
        $con = Connection();

        $nic = strval($_SESSION['LoginSession']);

        $check_roll = "SELECT * FROM user_tbl WHERE nic_no = '$nic'";
        $check_roll_result = mysqli_query($con, $check_roll);
        $check_roll_row = mysqli_fetch_assoc($check_roll_result);

        if($check_roll_row['user_type'] != "user"){
            header("location:../views/logout.php");
        }
    }

    function admin_access(){
        $con = Connection();

        $nic = strval($_SESSION['LoginSession']);

        $check_roll = "SELECT * FROM user_tbl WHERE nic_no = '$nic'";
        $check_roll_result = mysqli_query($con, $check_roll);
        $check_roll_row = mysqli_fetch_assoc($check_roll_result);

        if($check_roll_row['user_type'] != "admin"){
            $update_user = "UPDATE user_tbl SET is_active = 0, un_access = 1 WHERE nic_no = '$nic'";
            $update_user_result = mysqli_query($con, $update_user);

            $email = $check_roll_row['email'];
            $username = $check_roll_row['username'];

            $desc = "Tyring to Access Admin Account";

            $insert_data = "INSERT INTO u_accsess_tbl(nic_no,username,email,decs1,access_time)VALUES('$nic','$username','$email','$desc',NOW())";
            $insert_data_result = mysqli_query($con, $insert_data);
            
            header("location:../views/logout.php");
        }
    }

    function to_dashboard(){
        $con = Connection();

        $nic = strval($_SESSION['LoginSession']);

        $select_data = "SELECT * FROM user_tbl WHERE nic_no = '$nic'";
        $select_data_result = mysqli_query($con, $select_data);
        $select_data_row = mysqli_fetch_assoc($select_data_result);

        if($select_data_row['user_type'] == "admin"){
            echo "<a href='admin.php'><button class='product-nav-btn'><i class='fas fa-tachometer-alt'></i> &nbsp; To Dashboard</button></a>";
        }
        elseif($select_data_row['user_type'] == "user"){
            echo "<a href='user.php'><button class='product-nav-btn'><i class='fas fa-tachometer-alt'></i> &nbsp; To Dashboard</button></a>";
        }
    }

    function user_data(){
        $con = Connection();

        $nic = strval($_SESSION['LoginSession']);

        $select_user_data = "SELECT * FROM user_tbl WHERE nic_no = '$nic'";
        $select_user_data_result = mysqli_query($con, $select_user_data);
        $user_row = mysqli_fetch_assoc($select_user_data_result);

        $user_data = "
        <img src='../../upload/".$user_row['profile_img']."' alt='Profile Image' class='profile-edit-img'><br>
        <a href='update_pimg.php?id=".$nic."'><button class='btn btn-primary' style='margin-bottom:20px;'>Update Profile Image</button></a>
            <table border='0'>
                <tr>
                    <td>NIC Number : </td>
                    <td><input type='text' class='input-feild' value='".$user_row['nic_no']."' disabled></td>
                </tr>
                <tr>
                    <td>Username : </td>
                    <td><input type='text' class='input-feild' value='".$user_row['username']."' disabled></td>
                </tr>
                <tr>
                    <td>Email : </td>
                    <td><input type='text' class='input-feild' value='".$user_row['email']."' disabled></td>
                </tr>
                <tr>
                    <td>First Name : </td>
                    <td><input type='text' class='input-feild' value='".$user_row['fname']."' disabled></td>
                </tr>
                <tr>
                    <td>Last Name : </td>
                    <td><input type='text' class='input-feild' value='".$user_row['lname']."' disabled></td>
                </tr>
                <tr>
                    <td style='vertical-align:top; padding-top:10px;'>Address : </td>
                    <td>
                        <textarea class='input-area' disabled>".$user_row['address_user']."</textarea>
                    </td>
                </tr>
                <tr>
                    <td>Gender : </td>
                    <td><input type='text' class='input-feild' value='".$user_row['gender']."' disabled></td>
                </tr>
                <tr>
                    <td>Date Of Birth : </td>
                    <td><input type='text' class='input-feild' value='".$user_row['dob']."' disabled></td>
                </tr>
                <tr>
                    <td style='padding-top:10px;'>User Type : </td>";

                if($user_row['user_type'] == "admin"){
                    $user_data .= "<td style='padding-top:10px;'><span class='user_type_b'>Admin</span></td>";              
                }
                elseif($user_row['user_type'] == "user"){
                    $user_data .= "<td style='padding-top:10px;'><span class='user_type_b'>User</span></td>";              
                }               

            $user_data .="
                </tr>
                <tr>
                    <td style='padding-top:20px;'>Pending Status : </td>";

                if($user_row['is_pending'] == 1){
                    $user_data .="<td style='padding-top:20px;'><span class='user_pending_b'>Pending User</span></td>";
                }
                elseif($user_row['is_pending'] == 0){
                    $user_data .="<td style='padding-top:20px;'><span class='user_not_pending_b'>Active User</span></td>";
                }

            $user_data .="
                </tr>
                <tr>
                    <td style='padding-top:20px;'>Active Status : </td>";
                    
                if($user_row['is_active'] == 1){
                    $user_data .="<td style='padding-top:20px;'><span class='user_active_b'>Active User</span></td>";
                }
                elseif($user_row['is_active'] == 0){
                    $user_data .="<td style='padding-top:20px;'><span class='user_deactive_b'>Deactive User</span></td>";
                }


            $user_data .="
                </tr>
                <tr>
                    <td>Join Date : </td>
                    <td><input type='text' class='input-feild' value='".$user_row['join_date']."' disabled></td>
                </tr>
            </table>";

            if($user_row['user_type'] == "admin"){
                $user_data .= " <a href='edit_admin.php?id=".$user_row['nic_no']."'><button class='user-data-edit-btn'> <i class='fas fa-user-edit'></i> Edit Information</button></a>";
            }
            elseif($user_row['user_type'] == "user"){
                $user_data .= " <a href='edit_user.php?id=".$user_row['nic_no']."'><button class='user-data-edit-btn'> <i class='fas fa-user-edit'></i> Edit Information</button></a>";
            }
            $user_data .="
                <br><a href='pass_update_admin.php?id=".$user_row['nic_no']."'><button class='pass-edit-btn'><i class='fas fa-key'></i> Update Password</button></a>
                <br><a href='email_update_admin.php?id=".$user_row['nic_no']."'><button class='email-edit-btn'><i class='fas fa-at'></i> Update Email</button></a>
            ";      

        echo $user_data;
    }

    function user_data_edit(){
        $con = Connection();

        $nic = strval($_SESSION['LoginSession']);

        $select_user_data = "SELECT * FROM user_tbl WHERE nic_no = '$nic'";
        $select_user_data_result = mysqli_query($con, $select_user_data);
        $user_row = mysqli_fetch_assoc($select_user_data_result);


        $user_data = "
            <table border='0'>
            <form action='' method='post'>
                <tr>
                    <td>NIC Number : </td>
                    <td><input type='text' class='input-feild' value='".$user_row['nic_no']."' disabled>                    
                    </td>
                </tr>
                <tr>
                    <td>Username : </td>
                    <td><input type='text' name='username' class='input-feild' value='".$user_row['username']."' disabled></td>
                </tr>
                <tr>
                    <td>Email : </td>
                    <td><input type='text' name='email' class='input-feild' value='".$user_row['email']."' disabled></td>
                </tr>
                <tr>
                    <td>First Name : </td>
                    <td><input type='text' name='fn' class='input-feild' value='".$user_row['fname']."' ></td>
                </tr>
                <tr>
                    <td>Last Name : </td>
                    <td><input type='text' name='ln' class='input-feild' value='".$user_row['lname']."' ></td>
                </tr>
                <tr>
                    <td style='vertical-align:top; padding-top:10px;'>Address : </td>
                    <td>
                        <textarea class='input-area' name='user_address'>".$user_row['address_user']."</textarea>
                    </td>
                </tr>
                <tr>
                    <td>Gender : </td>
                    <td><input type='text' name='update_gender' class='input-feild' value='".$user_row['gender']."' ></td>
                </tr>
                <tr>
                    <td>Date Of Birth : </td>
                    <td><input type='date' name='date_birth' class='input-feild' value='".$user_row['dob']."'>
                        <p style='color:red;'>use this date formart to enter Date of Birth (yyyy-mm-dd)</p>
                    </td>
                </tr>
                <tr>
                <td style='padding-top:10px;'>User Type : </td>";

                    if($user_row['user_type'] == "admin"){
                        $user_data .= "<td style='padding-top:10px;'><span class='user_type_b'>Admin</span></td>";              
                    }
                    elseif($user_row['user_type'] == "user"){
                        $user_data .= "<td style='padding-top:10px;'><span class='user_type_b'>User</span></td>";              
                    }     

                $user_data .="
                    </tr>
                    <tr>
                        <td style='padding-top:20px;'>Pending Status : </td>";
    
                    if($user_row['is_pending'] == 1){
                        $user_data .="<td style='padding-top:20px;'><span class='user_pending_b'>Pending User</span></td>";
                    }
                    elseif($user_row['is_pending'] == 0){
                        $user_data .="<td style='padding-top:20px;'><span class='user_not_pending_b'>Active User</span></td>";
                    }    

                $user_data .="
                    </tr>
                    <tr>
                        <td style='padding-top:20px;'>Active Status : </td>";
                        
                    if($user_row['is_active'] == 1){
                        $user_data .="<td style='padding-top:20px;'><span class='user_active_b'>Active User</span></td>";
                    }
                    elseif($user_row['is_active'] == 0){
                        $user_data .="<td style='padding-top:20px;'><span class='user_deactive_b'>Deactive User</span></td>";
                    }
                
                $user_data .="
                    </tr>

                    <tr>
                        <td colspan='2'><input type='submit' name='edit_user' value='Update Data' class='edit-data-btn'></td>
                    </tr>
                </form>
                ";
        echo $user_data;    
    }

    function user_edit($fn,$ln,$address_user,$gender,$dob){
        $con = Connection();
        $nic = strval($_SESSION['LoginSession']);

        $select_data = "SELECT * FROM user_tbl WHERE nic_no = '$nic'";
        $select_data_result = mysqli_query($con, $select_data);
        $select_data_row = mysqli_fetch_assoc($select_data_result);
        $select_data_nor = mysqli_num_rows($select_data_result);

        //check user edit values are already in the table

        $select_already_data = "SELECT username FROM user_tbl";
        $select_already_data_result = mysqli_query($con, $select_already_data);
        $alredy_row = mysqli_fetch_assoc($select_already_data_result);

        if($select_data_nor != 0){
            
                if($nic == $select_data_row['nic_no']){
                    $update_data = "UPDATE user_tbl SET fname = '$fn', lname = '$ln', address_user = '$address_user', gender = '$gender', dob = '$dob' WHERE nic_no = '$nic'";
                    $update_data_result = mysqli_query($con, $update_data);

                    if($update_data_result){
                        header("location:my_account_admin.php");
                    }
                    elseif(!$update_data_result){
                        return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                <strong>Update Error</strong>Update Query not Working..!
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                                </button>
                        </div>";
                    }
                
                }elseif($nic != $select_data_row['nic_no']){
                    return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                            <strong>Process Error</strong>Can not Process the Requestss..!
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                    </div>";
                }
           
        }
        elseif($select_data_nor == 0){
            return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>Process Error</strong>Can not Process the Request..!
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                    </button>
            </div>";
        }
    }

    function update_pass_login(){
        $con = Connection();

        $id = $_GET['id'];

        $nic = strval($_SESSION['LoginSession']);

        $check_user = "SELECT * FROM user_tbl WHERE nic_no = '$nic'";
        $check_user_result = mysqli_query($con, $check_user);
        $check_user_row = mysqli_fetch_assoc($check_user_result);

        if($id == $nic){
            $pass_update = "

                <a href='my_account_admin.php'><button class='btn btn-primary'>Back</button></a>

                <table class='tabel' style='margin-top:30px;'>
                    <tr>
                        <td>NIC : </td>
                        <td>".$nic."</td>
                    </tr>
                    <tr>
                        <td>Name : </td>
                        <td>".$check_user_row['username']."</td>
                    </tr>
                    <tr>
                        <td>Email : </td>
                        <td>".$check_user_row['email']."</td>
                    </tr>
                </table>


                <form action='' method='POST'>
                    <div class='container' style='margin-top:20px;'>
                        <div class='form-group'>
                            <label>Old Password : </label>
                            <input type='password' name='old_pass' class='form-control'>
                        </div>
                        <div class='form-group'>
                            <label>New Password : </label>
                            <input type='password' name='new_pass' class='form-control'>
                        </div>
                        <div class='form-group'>
                            <label>Confirm New Password : </label>
                            <input type='password' name='new_cpass' class='form-control'>
                        </div>
                        <div class='form-group'>
                            <input type='submit' name='update_dpass' class='btn btn-success' value='Update Password'>
                        </div>
                    </div>
                </form>
            ";

            echo $pass_update;
        }else{
            header("location:../views/logout.php");
        }
    }

    function update_pass_data($old_pass, $new_pass, $cnew_pass){
        $con = Connection();

        $nic = strval($_SESSION['LoginSession']);

        $check_user = "SELECT * FROM user_tbl WHERE nic_no = '$nic'";
        $check_user_result = mysqli_query($con, $check_user);
        $check_user_row = mysqli_fetch_assoc($check_user_result);

        if(empty($old_pass)){
            return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>Password Error</strong> Old Password Cannot be Empty..!
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                    </button>
            </div>"; 
        }elseif(empty($new_pass)){
            return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>Password Error</strong> New Password Cannot be Empty..!
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                    </button>
            </div>"; 
        }elseif(empty($cnew_pass)){
            return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>Password Error</strong>Confirm New Password Cannot be Empty..!
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                    </button>
            </div>"; 
        }elseif($new_pass != $cnew_pass){
            return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>Password Error</strong> Passwords Not Match..!
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                    </button>
            </div>"; 
        }
        else{
            if($old_pass == $check_user_row['pass1']){
                $update_data = "UPDATE user_tbl SET pass1 = '$new_pass' WHERE nic_no = '$nic'";
                $update_data_result = mysqli_query($con, $update_data);

                header("location:my_account_admin.php");
            }else{
                return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Password Error</strong> Old Password Cannot be find in database..!
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                        </button>
                </div>"; 
            }
        }
    }

    function update_email(){
        $con = Connection();
        
        $nic = strval($_SESSION['LoginSession']);

        $select_user = "SELECT * FROM user_tbl WHERE nic_no = '$nic'";
        $select_user_result = mysqli_query($con, $select_user);
        $select_user_row = mysqli_fetch_assoc($select_user_result);

        $id = $_GET['id'];
        
        if($id == $nic){
            $user_data = "
                <a href='my_account_admin.php'><button class='btn btn-primary' style='margin-bottom:10px;'>Back</button></a>

                <table>
                    <tr>
                        <td>NIC Number : </td>
                        <td>&nbsp;".$nic."</td>
                    </tr>
                    <tr>
                        <td>Userame : </td>
                        <td>&nbsp;".$select_user_row['username']."</td>
                    </tr>
                </table>


                <form action='' method='POST'>
                    <label style='margin-top:30px;'>Email : </label> <br>
                    <input type='email' value='".$select_user_row['email']."' class='form-control' disabled>
                    
                    <label style='margin-top:30px;'>Enter New Email : </label><br>
                    <input type='email' name='new_email' id='new_email' class='form-control'>

                    <label style='margin-top:30px;'>Confarm New Email : </label><br>
                    <input type='email' name='new_cemail' id='new_cemail' class='form-control'>

                    <input type='submit' name='update_email' value='Update Email' class='btn btn-success' style='margin-top:20px;'>
                </form>
            ";

            echo $user_data;
        }else{
            return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>Proceess Error</strong> Can not Process the request..!
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                    </button>
            </div>"; 
        }
    }

    function update_email_data($update_email, $update_cemail){
        $con = Connection();
              
        $nic = strval($_SESSION['LoginSession']);
        
        $select_data = "SELECT * FROM user_tbl WHERE nic_no = '$nic'";
        $select_data_result = mysqli_query($con, $select_data);
        $select_data_row = mysqli_fetch_assoc($select_data_result);

        if(empty($update_email)){
            return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>Email Error</strong> Email Can not be Empty..!
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                    </button>
            </div>"; 
        }elseif(empty($update_cemail)){
            return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>Email Error</strong> Confarm Email Can not be Empty..!
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                    </button>
            </div>"; 
        }
        elseif($update_email != $update_cemail){
            return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>Email Error</strong> Emails not Match..!
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                    </button>
            </div>"; 
        }
        elseif($update_email == $select_data_row['email']){
            return  "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>Email Error</strong> Email Already Used..!
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                    </button>
            </div>";   
        }
        else{
            $update_data = "UPDATE user_tbl SET email = '$update_email' WHERE nic_no = '$nic'";
            $update_data_result = mysqli_query($con, $update_data);

            if($update_data_result){
                $recever = $update_email;
                $subject = "Online Clothings";
                $body = "Online Clothings";
                $body .= "Use this email as user Email";
                $sender = "From:jehankandy@gmail.com";

                if(mail($recever,$subject,$body,$sender)){
                    header("location:../views/logout.php");
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
                        <strong>Proceess Error</strong> Can not Process the request..!
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                        </button>
                </div>"; 
            }
        }
    }    
    function profile_img(){
        $con = Connection();

        $nic = strval($_SESSION['LoginSession']);

        $view_profile_img = "SELECT * FROM user_tbl WHERE nic_no = '$nic'";
        $view_profile_img_result = mysqli_query($con, $view_profile_img);
        $view_profile_img_row = mysqli_fetch_assoc($view_profile_img_result);

        $profile_img_view ="
        <img src='../../upload/".$view_profile_img_row['profile_img']."' alt='Profile Image' class='profile-img'>
        ";

        echo $profile_img_view;
    }
    
    function user_id_loged(){
        $con = Connection();

        $nic = strval($_SESSION['LoginSession']);

        $select_usern = "SELECT * FROM user_tbl WHERE nic_no = '$nic'";
        $select_usern_result = mysqli_query($con, $select_usern);
        $select_usern_row = mysqli_fetch_assoc($select_usern_result);

        echo $select_usern_row['username'];
    }

    function update_profile_img(){
        $con = Connection();

        $nic = strval($_SESSION['LoginSession']);

        $select_profile = "SELECT* FROM user_tbl WHERE nic_no = '$nic'";
        $select_profile_result = mysqli_query($con, $select_profile);
        $select_profile_row = mysqli_fetch_assoc($select_profile_result);

        $view_form = "
            <img src='../../upload/".$select_profile_row['profile_img']."' alt='Profile Image' class='profile-edit-img'>
            
            <form action='' method='POST' enctype='multipart/form-data'>
                New Profile Image
                <input type='file' name='images' class='form-control' style='margin-bottom:20px;'>
                <input type='submit' name='profile_img_update' value='Update Profile Image' class='btn btn-success btn-lg btn-block'>      
            </form>";

            if($select_profile_row['user_type'] == 'admin'){
                $view_form .="<a href='my_account_admin.php'><button class='btn btn-primary' style='margin-top:30px;'>Back</button></a>";
            }elseif($select_profile_row['user_type'] == 'user'){
                $view_form .="<a href='user.php'><button class='btn btn-primary' style='margin-top:30px;'>Back</button></a>";
            }          
        
        echo $view_form;
        
    }
    function update_profile_image($img){
        $con = Connection();


        $nic = strval($_SESSION['LoginSession']);


        $check_user = "SELECT * FROM user_tbl WHERE nic_no = '$nic'";
        $check_user_result = mysqli_query($con, $check_user);
        $check_user_row = mysqli_fetch_assoc($check_user_result);


        $image_dir = "../../upload/";
        
        $filename = basename($_FILES["images"]["name"]);
        $image_target_path = $image_dir . $filename;
        $filetype = pathinfo($image_target_path, PATHINFO_EXTENSION);

        $image_types = array('jpg','png','jpeg','gif','PNG');

        if(in_array($filetype, $image_types)){
            if(move_uploaded_file($_FILES["images"]["tmp_name"], $image_target_path)){
                $update_img = "UPDATE user_tbl SET profile_img = '$filename' WHERE nic_no = '$nic'";
                $update_img_result = mysqli_query($con, $update_img); 

                if($check_user_row['user_type'] == 'admin'){
                    header("location:my_account_admin.php");
                }elseif($check_user_row['user_type'] == 'user'){
                    header("location:user.php");
                }             
            }
        }
    }

    function count_members(){
        $con = Connection();

        $all_memebers = "SELECT * FROM user_tbl WHERE user_type = 'user'";
        $all_memebers_result = mysqli_query($con, $all_memebers);
        $all_memebers_nor = mysqli_num_rows($all_memebers_result);

        echo $all_memebers_nor;
    }

    function count_admin(){
        $con = Connection();

        $all_admin = "SELECT * FROM user_tbl WHERE user_type = 'admin'";
        $all_admin_result = mysqli_query($con, $all_admin);
        $all_admin_nor = mysqli_num_rows($all_admin_result);

        echo $all_admin_nor;
    }

    function all_members(){
        $con = Connection();

        $all_members = "SELECT * FROM user_tbl WHERE user_type = 'user'";
        $all_memebers_result = mysqli_query($con, $all_members);
        $all_members_row = mysqli_fetch_assoc($all_memebers_result);

        $all_members ="
            <tr>
                <td>".$all_members_row['nic_no']."</td>
                <td>".$all_members_row['username']."</td>
                <td>".$all_members_row['email']."</td>";

                if($all_members_row['is_active'] == 1){
                    $all_members .="<td><h3><span class='badge bg-success'>Active</span></h3></td>";
                }
                elseif($all_members_row['is_active'] == 0){
                    $all_members .="<td><h3><span class='badge bg-danger'>Deactive</span></h3></td>";
                }
                if($all_members_row['is_pending'] == 1){
                    $all_members .="<td><h3><span class='badge bg-info'>User is Pending</span></h3></td>";
                }
                elseif($all_members_row['is_pending'] == 0){
                    $all_members .="<td><h3><span class='badge bg-success'>Account Activeted</span></h3></td>";
                }
                if($all_members_row['un_access'] == 1){
                    $all_members .="<td><h3><span class='badge bg-danger'>Unauthorized Access</span></h3></td>";
                }
                elseif($all_members_row['un_access'] == 0){
                    $all_members .="<td><h3><span class='badge bg-info'>Verify</span></h3></td>";
                }
        $all_members .="
                <td><a href='member_edit.php?id=".$all_members_row['nic_no']."'><button class='btn btn-primary'>Info</button></a></td>

            </tr>
        
        ";

        echo $all_members;
    }

    function member_id(){
        $con = Connection();
    }
?>
