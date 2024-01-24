function conf_fin(addr){
    var is_conf=confirm("Вы действительно желаете завершить тест?");
    if(is_conf==true){
        document.location.href="check.php"
    }
}