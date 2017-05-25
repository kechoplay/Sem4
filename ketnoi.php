<?php
    $ketnoi['Server']['name'] = 'localhost';
    $ketnoi['Database']['dbname'] = 'shopthethao';
    $ketnoi['Database']['username'] = 'root'; 
    $ketnoi['Database']['password'] = '';
    // $ketnoi['Server']['name'] = 'mysql.hostinger.vn';
    // $ketnoi['Database']['dbname'] = 'u225680367_sport';
    // $ketnoi['Database']['username'] = 'u225680367_tvd'; 
    // $ketnoi['Database']['password'] = 'sontunglkmtp';
    $conn=mysql_connect(
        "{$ketnoi['Server']['name']}",
        "{$ketnoi['Database']['username']}",
        "{$ketnoi['Database']['password']}")
    or
        die("Không thể kết nối database");
    mysql_select_db(
        "{$ketnoi['Database']['dbname']}") 
    or
        die("Không thể chọn database");
// $conn=mysql_connect('localhost','root','') or die('Khong the ket noi');
// mysql_select_db('shopgiay');
?>