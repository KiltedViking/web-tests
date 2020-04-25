<? /****************************************************************************
* Name:       item.php
* Purpose:    Handle log in form for kv.net
* Created by: Björn G.D. Persson, bjorn(a)kiltedviking.net.nospam.
* Remark:     The name of the file/page and the fields are 'obscured' to try to
*             fool visitors of the purpose of the page/fields. Anybody intelligent
*             might work it out, but anyway....
*             The original fil (i.e. file to change) is in folder /news.
*******************************************************************************/
require('../db_kiltedviking.php');

//Change for title of page
$strTitle = "Album item";
//Change to filename to redirect to
$strHeaderLocation = "Location: ./albumsbyartist.php";

session_start();
if(isset($_SESSION['uid']))
  header($strHeaderLocation);

/*** Check uid ***************************************************************/
//If uid and pwd sent - check them...
if(isset($_POST['pelle']) && isset($_POST['plutt']))
{
  $strId = $_POST['pelle'];
  $strPassword = $_POST['plutt'];

  $strSql = "SELECT password FROM users WHERE id='$strId'";

  $res = mysql_query($strSql);

  if($arr = mysql_fetch_assoc($res))
  {
    if($arr['password'] == $strPassword)
    {
      $_SESSION['uid'] = $strId;
      header($strHeaderLocation);
    }
    else
      $strMessage = "Try again... but only if you're authorized!";
  }
  else
    $strMessage = "Do you know what you're doing? If not, please continue to my start page!";

  mysql_free_result($res);
}

//If field guru not sent - send to news page...
if(!isset($_REQUEST['guru']))
  header($strHeaderLocation);
else  //... else flag for showing login form
  $blnShowForm = TRUE;
?>
<html>
  <head>
  <meta http-equiv="Content-Language" content="sv">
  <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
  <title><?php echo $strTitle ?> (Kilted Viking)</title>
  <link rel="shortcut icon" href="../favicon.ico" >
  <link rel="stylesheet" type="text/css" href="../kiltedviking.css">
  <script type="text/javascript">
  <!--
    function formfocus()
    {
      document.forms[0].pelle.focus();
    }
  //-->
  </script>
</head>
<body bgcolor="#800000" onload="formfocus()">
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
              <td align="center" valign="top"><a href="../">
                <!-- <img alt="teddy" src="../bilder/teddy1.gif" border="0"></a> -->
                <img alt="Rosemount" src="../images/kv_logo.jpg" width="145" height="60" border="0"></a>
              </td>
              <td valign="top">
                <h1><?php echo $strTitle ?></h1>
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
                  <tr>
                    <td class="menuitem"><a href="./" class="menuitem">News</a></td>
                  </tr>
                  <tr>
                    <td><hr></td>
                  </tr>
                  <tr>
                    <td class="menuitem"><a href="javascript:history.back()"
                      class="menuitem">&lt;&lt; Back</a></td>
                  </tr>
                </table>
              </td>
              <td width="520" class="maincolumn">
                <p>This page is <b>private</b>! If you happened to end up on this
                  page, please continue to my <a href="../">start page</a> (or click
                  one of the options in the menu).</p>
<?
//If show the form, show the form...
if($blnShowForm)
{
?>
  <form method="post">
  <table>
    <tr>
      <td><b>Who:</b></td>
      <td><input type="textbox" name="pelle"></td>
    </tr>
    <tr>
      <td><b>And?:</b></td>
      <td><input type="password" name="plutt"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" value="Go"> <?= $strMessage ?></td>
    </tr>
  </table>
  </form>
<?
}  //if($blnShowForm)
?>
                <p class="instructions">There is really not much of interest 'beyond
                  this point'. :-) So please continue to my <a href="../">Start page</a>.</p>
              </td>
              <td width="125" class="newscolumn">
                <p class="contentsheader">Something... :-)</p>
              </td>
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