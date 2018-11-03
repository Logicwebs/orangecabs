<?php 
//connect db via unix socket
$user = 'root';
$password = '';
$db = 'orangecabs_db';
$host = '127.0.0.1';
$port = 3306;
$socket = '/Applications/XAMPP/xamppfiles/var/mysql/mysql.sock';
$link = new mysqli($host,
   $user,
   $password,
   $db,
   $port,
   $socket);

if(mysqli_connect_error()){
    
    die("ERROR: unable to connect:" .mysqli_connect_error());
}else{
//    echo "connected succefully";
}


?>