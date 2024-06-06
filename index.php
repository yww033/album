<?php require_once('Connections/album.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_album, $album);
$query_Recordset1 = "SELECT * FROM album ORDER BY ID DESC";
$Recordset1 = mysql_query($query_Recordset1, $album) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>
<table width="800" border="0" align="center">
  <tr style="background-color: #000; color: #FFF;">
    <td align="center"><span style="font-family: '微軟正黑體'; font-size: 24px">網路相簿</span></td>
  </tr>
</table>
<hr />
<table width="500" border="0" align="center" cellpadding="0">
  <tr>
    <td align="center">

      <table >
        <tr>
          <?php
$Recordset1_endRow = 0;
$Recordset1_columns = 3; // number of columns
$Recordset1_hloopRow1 = 0; // first row flag
do {
    if($Recordset1_endRow == 0  && $Recordset1_hloopRow1++ != 0) echo "<tr>";
   ?>
          <td><table width="500" border="1" align="center" cellpadding="0">
            <tr>
              <td align="center"><a href="detail.php?id=<?php echo $row_Recordset1['ID']; ?>"><img src="<?php echo $row_Recordset1['Name_thum']; ?>"/></a></td>
            </tr>
            <tr>
              <td align="center"><?php echo $row_Recordset1['Comment']; ?></td>
            </tr>
          </table></td>
          <?php  $Recordset1_endRow++;
if($Recordset1_endRow >= $Recordset1_columns) {
  ?>
        </tr>
        <?php
 $Recordset1_endRow = 0;
  }
} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
if($Recordset1_endRow != 0) {
while ($Recordset1_endRow < $Recordset1_columns) {
    echo("<td>&nbsp;</td>");
    $Recordset1_endRow++;
}
echo("</tr>");
}?>
      </table>
    <p>&nbsp;</p></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
