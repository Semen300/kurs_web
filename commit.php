<?php
    session_start();
    $con=mysqli_connect('localhost','root','root','kurs_data');
    $req_upd = "UPDATE results SET ansv_".$_POST['question_id']."=".$_POST['ansv']." WHERE nickname='".$_SESSION['nickname']."'";
    echo $req_upd;
    if(mysqli_query($con, $req_upd)!=false){
    header("Location:".$_POST['next']);
    }
    else echo 'Ошибка выполения запроса'
?>