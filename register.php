<?php
session_start();
include "db.php";

// OneMobile - Registration Logic
if (isset($_POST["f_name"])) {

    // Sanitizing inputs for OneMobile Database
    $f_name = mysqli_real_escape_string($con, $_POST["f_name"]);
    $l_name = mysqli_real_escape_string($con, $_POST["l_name"]);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
    $address1 = mysqli_real_escape_string($con, $_POST['address1']);
    $address2 = mysqli_real_escape_string($con, $_POST['address2']);
    
    // Validation Patterns
    $name = "/^[a-zA-Z ]+$/";
    $emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
    $number = "/^[0-9]+$/";

    // Check for empty fields
    if(empty($f_name) || empty($l_name) || empty($email) || empty($password) || empty($repassword) ||
        empty($mobile) || empty($address1) || empty($address2)){
        
        echo "
            <div class='alert alert-warning'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <b>OneMobile: Please fill all fields to continue.</b>
            </div>
        ";
        exit();
    } else {
        if(!preg_match($name,$f_name)){
            echo "
                <div class='alert alert-warning'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <b>$f_name is not a valid name.</b>
                </div>
            ";
            exit();
        }
        if(!preg_match($name,$l_name)){
            echo "
                <div class='alert alert-warning'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <b>$l_name is not a valid last name.</b>
                </div>
            ";
            exit();
        }
        if(!preg_match($emailValidation,$email)){
            echo "
                <div class='alert alert-warning'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <b>The email $email is not valid.</b>
                </div>
            ";
            exit();
        }
        if(strlen($password) < 9 ){
            echo "
                <div class='alert alert-warning'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <b>Security Alert: Password must be at least 9 characters.</b>
                </div>
            ";
            exit();
        }
        if($password != $repassword){
            echo "
                <div class='alert alert-warning'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <b>Passwords do not match.</b>
                </div>
            ";
            exit();
        }
        if(!preg_match($number,$mobile)){
            echo "
                <div class='alert alert-warning'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <b>Mobile number $mobile is not valid.</b>
                </div>
            ";
            exit();
        }
        
        // Updated for Kosovo Phone Standards (9 digits typically for local mobile)
        if(!(strlen($mobile) == 9)){
            echo "
                <div class='alert alert-warning'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <b>Mobile number must be 9 digits (Kosovo Standard).</b>
                </div>
            ";
            exit();
        }

        // Existing email check
        $sql = "SELECT user_id FROM user_info WHERE email = '$email' LIMIT 1" ;
        $check_query = mysqli_query($con,$sql);
        $count_email = mysqli_num_rows($check_query);
        
        if($count_email > 0){
            echo "
                <div class='alert alert-danger'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <b>This email is already registered with OneMobile. Please try another or contact oneMobile@gmail.com</b>
                </div>
            ";
            exit();
        } else {
            // Secure Password Hashing (Recommended)
            // $password = password_hash($password, PASSWORD_BCRYPT); 

            $sql = "INSERT INTO `user_info` 
            (`user_id`, `first_name`, `last_name`, `email`, 
            `password`, `mobile`, `address1`, `address2`) 
            VALUES (NULL, '$f_name', '$l_name', '$email', 
            '$password', '$mobile', '$address1', '$address2')";
            
            if(mysqli_query($con,$sql)){
                $_SESSION["uid"] = mysqli_insert_id($con);
                $_SESSION["name"] = $f_name;
                $ip_add = getenv("REMOTE_ADDR");
                
                // Update cart for the new OneMobile user
                $sql_cart = "UPDATE cart SET user_id = '$_SESSION[uid]' WHERE ip_add='$ip_add' AND user_id = -1";
                mysqli_query($con, $sql_cart);

                echo "register_success";
                echo "<script> location.href='store.php'; </script>";
                exit;
            }
        }
    }
}
?>