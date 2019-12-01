<?php
include("tool/functions.php");

$error = "";
if ($_GET["action"] == "checkIn") {
    $visitername = $_POST['visitername'];
    $visiteremail = $_POST['visiteremail'];
    $visiterphoneNo = $_POST['visiterphoneNo'];
    $hostname = $_POST['hostname'];
    $hostemail = $_POST['hostemail'];
    $hostphoneNo = $_POST['hostphoneNo'];
    
    if (!$visiteremail or !filter_var($visiteremail, FILTER_VALIDATE_EMAIL)) {
        $error = "Visiter Email id is empty or invalid ";
    }
    if (!$visitername) {
        $error = "Enter Visitername";
    }
    if (!$visiterphoneNo) {
        $error = "Enter VisiterPhoneNo";
    }
    if (!$hostemail or !filter_var($hostemail, FILTER_VALIDATE_EMAIL)) {
        $error = "Host Email id is empty or invalid";
    }
    if (!$hostname) {
        $error = "Enter Hostname";
    }
    if (!$hostphoneNo) {
        $error = "Enter HostPhoneNo";
    }
    if($error==""){
        $query = "SELECT * FROM hosts WHERE email= '$hostemail'";
        $res = mysqli_query($mySql_db, $query);
        if (mysqli_num_rows($res) == 0) {
            $error ="Such Host does Not exists.";
        }
        $sql1 = "SELECT * FROM visiters WHERE email='$visiteremail'";
		$sql_rec = mysqli_query($mySql_db, $sql1);
		if (mysqli_num_rows($sql_rec) == 0) {
            $myTimeZone = date_default_timezone_set("Asia/kolkata");
            $today = date('Y-m-d H:i:s');
			$sql2 = "INSERT INTO visiters(email,name,phoneNo,checkIn,host) VALUES('$visiteremail','$visitername','$visiterphoneNo','$today','$hostemail')";
            mysqli_query($mySql_db, $sql2);
            
            //mail
            ini_set("SMTP","ssl://smtp.gmail.com");
            ini_set("smtp_port","25");
            $to = $hostemail;
            $subject = 'Visiter Detail';
            $body = '<p>Name: '.$visitername.'</p>
            <p>Email: '.$visiteremail.'</p>
            <p>Phone: '.$visiterphoneNo.'</p>
            <p>CheckIn Time: '.$today.'</p>';
            $headers =  'MIME-Version: 1.0' . "\r\n"; 
            $headers .= 'From: Your name <nitin10101999@gmail.com>' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
            if (mail($to, $subject, $body, $headers)) {
               $error = "";
             } else {
                $error = "Message delivery failed...";
                
             }
        }
        else{
            $error ="Visiter Already CheckedIn";
        }
        
    }
    if($error=="")
        echo 1;
    else
        echo $error;
}
else if($_GET['action']=='search'){
    $email = $_POST['email'];
    if (!$email or !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = $error."Visiter Email id is empty or invalid!";
    }
    if($error==""){
        $query = "SELECT * FROM visiters WHERE email= '$email'";
        $res = mysqli_query($mySql_db, $query);
        if (mysqli_num_rows($res) == 0) {
            $error = $error."visiter  does Not Exist!";
        }
    }
    if($error==""){
        echo 1;
    }
    else
        echo $error;

}
else if($_GET['action']=='checkOut'){
    $email = $_POST['email'];
    $query = "SELECT * FROM visiters WHERE email= '$email'";
    $res = mysqli_query($mySql_db, $query);
    $result = mysqli_fetch_assoc($res);

    ///delete the visiter from table
    $querydel = "DELETE  FROM visiters WHERE email= '$email'";
    mysqli_query($mySql_db, $querydel);
    ////
    $myTimeZone = date_default_timezone_set("Asia/kolkata");
    $today = date('Y-m-d H:i:s');
    ////for finding host name
    $hostemail = $result['host'];
    $query = "SELECT * FROM hosts WHERE email= '$hostemail'";
    $res2 = mysqli_query($mySql_db, $query);
    $result2 = mysqli_fetch_assoc($res2);
    $hostname = $result2['name'];
    
    //mail
    ini_set("SMTP","ssl://smtp.gmail.com");
    ini_set("smtp_port","25");
    $to = $email;
    $subject = 'Thanks For visit';
    $body = '<p>Name: '.$result['name'].'</p>
            <p>Phone: '.$result['phoneNo'].'</p>
            <p>CheckIn Time: '.$result['checkIn'].'</p>
            <p>CheckOut Time: '.$today.'</p>
            <p>Host name: '.$hostname.'</p>';
    $headers =  'MIME-Version: 1.0' . "\r\n"; 
    $headers .= 'From: Your name <nitin10101999@gmail.com>' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
    if (mail($to, $subject, $body, $headers)) {
       echo 1;
     } else {
       echo "Not send";
     }

}