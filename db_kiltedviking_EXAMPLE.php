<?php
$strUrl = "127.0.0.1";          //Address to database server
$strUserId = "user-id";
$strPwd = "password";
$strDbname = "database-name";    //Database to connect to
$blnNoDb = FALSE;

if(($link = @mysql_connect($strUrl, $strUserId, $strPwd)))
{
  if(!mysql_select_db($strDbname))
    $blnNoDb = TRUE;
}
?>