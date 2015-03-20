<?
/* Database Configuration */

$host="127.0.0.1";        // MySQL Host ip
$user="root";       // MysQL DB User
$pass="davide";      // MySQL DB Pass
$dbname="progettoAM";     // MySQL DB Name

mysql_connect($host,$user,$pass) or die('Connection Error.');
mysql_select_db($dbname) or die('Not found database.');
?>
