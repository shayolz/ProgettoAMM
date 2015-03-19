<?
/* Database Configuration */

$host="127.0.0.1";        // MySQL Host ip
$user="silvanoEnrico";       // MysQL DB User
$pass="criceto6923";      // MySQL DB Pass
$dbname="amm15_silvanoEnrico";     // MySQL DB Name

mysql_connect($host,$user,$pass) or die('Connection Error.');
mysql_select_db($dbname) or die('Not found database.');
?>
