<?php
    session_start();
    $con=mysqli_connect('localhost','root','root','kurs_data');
    $sql="SELECT ansv, coef from ansvers";
    $sql2="SELECT ansv_1,ansv_2,ansv_3,ansv_4,ansv_5 from results WHERE nickname='".$_SESSION['nickname']."'";
    $res_keys=mysqli_query($con, $sql);
    $res_ua=mysqli_query($con, $sql2);
    if($res_keys!=false){
        if($res_ua!=false){
            $ansvs = mysqli_fetch_all($res_keys, MYSQLI_NUM);
            $u_ansvs = mysqli_fetch_array($res_ua, MYSQLI_NUM);
            $res=[0,0,0,0,0];
            $itog=0;
            for($i=0;$i<5;$i++){
                if($u_ansvs[$i]==$ansvs[$i][0]){
                    $res[$i]=$ansvs[$i][1];
                    $itog+=$ansvs[$i][1];
                }
            }
            $sql_upd = "UPDATE results SET res_1=".$res[0].", res_2=".$res[1].", res_3=".$res[2].", res_4=".$res[3].", res_5=".$res[4].", res_itog=".$itog." WHERE nickname='".$_SESSION['nickname']."'";
            mysqli_query($con, $sql_upd);
            header("Location: results.phtml");
        }
        else{
            echo $sql2."<br>";
            echo "Ошибка при получении ответов пользователя";
        }
    }
    else{
        echo $sql."<br>";
        echo "Ошибка при получении правильных ответов";
    }

?>
