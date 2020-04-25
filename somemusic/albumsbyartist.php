<?php
require('../db_kiltedviking.php');

session_start();  //Start using sessions in page
if(isset($_SESSION['uid']))
  $blnLoggedIn = TRUE;
else
  $blnLoggedIn = FALSE;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
  "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
  <meta http-equiv="Content-Language" content="sv">
  <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
  <title>Some Music (Kilted Viking)</title>
  <link rel="shortcut icon" href="../favicon.ico" >
  <link rel="stylesheet" type="text/css" href="../kiltedviking.css">
</head>
<body bgcolor="#800000">
<center>
<div align="center">
<table border="0" cellpadding="0" cellspacing="0" width="800">
  <tr>
    <td valign="top" width="800">
      <table cellpadding="0" cellspacing="0" border="0" width="100%" height="100%">
        <tr>
          <td><img alt="" src="../bilder/ovrevanstra.gif" width="20" height="22"></td>
          <td class="contentcell">&nbsp;</td>
          <td height="22"><img alt="" src="../bilder/ovrehogra.gif" width="20" height="22"></td>
        </tr>
        <tr>
          <td class="contentcell">&nbsp;</td>
          <td valign="top" height="100%" class="contentcell">
          <table width="100%">
            <!-- Rad med logo och rubrik -->
            <tr>
              <td align="center" valign="top"><a href="../"><img alt="Rosemount"
                src="../images/kv_logo.jpg" width="145" height="60" border="0"></a>
              </td>
              <td valign="top">
                <h1>Albums by Artist</h1>
              </td>
              <td>&nbsp;</td>
            </tr>
            <!-- Rad med innehall -->
            <tr>
              <td width="150" class="menucolumn">
                <p class="contentsheader">Contents</p>
                <table width="100%">
                  <tr>
                    <td class="menuitem"><a href="../" class="menuitem">Home</a></td>
                  </tr>
<?php
if($blnLoggedIn)
{
?>
                  <tr>
                    <td class="menuitem"><a href="albumedit.php" class="menuitem">- Add album</a></td>
                  </tr>
                  <tr>
                    <td><hr></td>
                  </tr>
                  <tr>
                    <td class="menuitem"><a href="itemdone.php" class="menuitem">Log out</a></td>
                  </tr>
<?php
}
?>
                  <tr>
                    <td><hr></td>
                  </tr>
                  <tr>
                    <td class="menuitem"><a href="./" class="menuitem">&lt;&lt; Back to Music</a></td>
                  </tr>
                  <tr>
                    <td class="menuitem"><a href="javascript:history.back()"
                      class="menuitem">&lt;&lt; Back</a></td>
                  </tr>
                </table>
              </td>
              <td width="520" class="maincolumn" colspan="2">
                <p class="contentsheader">Albums by Artist</p>
                <table width="100%" border="0">
                  <tr>
                    <th>Artist</th>
                    <th>Title (Released)</th>
                    <th>Media</th>
<?php
if($blnLoggedIn)
{
?>
                    <th>&nbsp;</th>
<?php
}
?>
                  </tr>
<?php
/*** Print news ***************************************************************/
if($link)
{
  //Get all the news (sorted by date in reverse)
  $strSql = "SELECT albumindex, artist, title, released, media FROM albums ORDER BY artist, released, title";

  $i = 0;
  $strArtist = "";

  if($res = mysql_query($strSql))
  {
    while($arr = mysql_fetch_assoc($res))
    {
      if($i % 2)
        $strClass = "normaltextjamn";
      else
        $strClass = "normaltext";

      print("<tr valign=\"top\">");

      print("<td class=\"$strClass\">");

      if($arr['artist'] != $strArtist)
        print($arr['artist']);
      else
        print(" ");

      print("</td><td class=\"$strClass\">".$arr['title']." (".$arr['released']
        .")</td><td class=\"$strClass\">".$arr['media']."</td>\n");

      if($blnLoggedIn)
      {
        print("<td class=\"$strClass\"><a href=\"albumedit.php?index="
          .$arr["albumindex"]."\">Edit</a></td>");
      }

      print("</tr>");

      $i++;
      $strArtist = $arr['artist'];
    }

    mysql_free_result($res);
  }
  else
  {
    print("<p>Sorry, no albums available...");
    print("<br><span class=\"smallertextlight\">(can't find table)</span>");
    print("</p>");
  }
}
else
{
  print("<p>Sorry, no album available...");
  if(!$link)
    print("<br><span class=\"smallertextlight\">(can't connect to server)</span>");
  if($blnNoDb)
    print("<br><span class=\"smallertextlight\">(can't connect to database)</span>");
  print("</p>");
}
?>
                </table>
                <p>Number of albums: <?= $i ?></p>
              </td>
              <!--
              <td width="125" class="newscolumn">
                <p class="contentsheader">Something... :-)</p>
              </td>
              -->
            </tr>
            <!-- Rad med sidfot -->
            <tr>
              <td colspan="3">
                <hr>
                <p class="pagefooter">Created by: Björn G. D. Persson. Last updated:
                <?= date("Y-m-d", filemtime($_SERVER["SCRIPT_FILENAME"])) ?>.</p>
              </td>
            </tr>
          </table>
          </td>
          <td class="contentcell">&nbsp;</td>
        </tr>
        <tr>
          <td width="20"><img alt="" src="../bilder/nedrevanstra.gif" width="20" height="22"></td>
          <td class="contentcell">&nbsp;</td>
          <td height="22" width="20"><img alt="" src="../bilder/nedrehogra.gif" width="20" height="22"></td>
        </tr>
      </table>
    </td>
  </tr>
</table>
</div>
</center>
</body>
</html>