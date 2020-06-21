<?php

include 'connection.php';

function addUser($name,$email,$pword){
    $db = db_connect();
    $sql = "INSERT INTO login(email,password)VALUES('$email','$pword')";
    $firstsql = $db->query($sql);
    if($firstsql == TRUE){
        $recentID = $db->insert_id; //method insert_id is user to get the 
        $secondsql = "INSERT INTO user(loginid,name)VALUES('$recentID','$name')"; //
        $secondresult = $db->query($secondsql);
  
        if($secondresult == FALSE){
            die('second query is noy working'.$db->error);

   

}
}else{
    die("First query is not working ".$db->error);
}
}


function login($email,$pass){
    $db = db_connect();
    // $sql = "SELECT * FROM login WHERE username='$username'AND password = '$password'";
    $sql = "SELECT * FROM login WHERE email = '$email' AND password = '$pass'";
        $result = $db->query($sql);

        if($result->num_rows==1){
            $row = $result->fetch_assoc();
            $_SESSION['login_id'] = $row['user_id'];

            if($row['status'] == "A"){
                header('Location: dashboard.php');
            }else{
                header("location: profile.php");
            }

        }
    }

    


?>