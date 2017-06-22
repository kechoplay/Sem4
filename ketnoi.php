<?php
    $ketnoi['Server']['name'] = 'localhost';
    $ketnoi['Database']['dbname'] = 'shopthethao';
    $ketnoi['Database']['username'] = 'root'; 
    $ketnoi['Database']['password'] = '';
    // $ketnoi['Server']['name'] = 'localhost';
    // $ketnoi['Database']['dbname'] = 'u679797693_sport';
    // $ketnoi['Database']['username'] = 'u679797693_tungs'; 
    // $ketnoi['Database']['password'] = 'Sontunglkmtp123';
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
// $conn=mysql_connect('localhost','u679797693_tungs','Sontunglkmtp123') or die('Khong the ket noi');
// mysql_select_db('u679797693_sport');
?>