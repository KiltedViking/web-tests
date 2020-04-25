<? /****************************************************************************
* Name:       albumedit.php
* Purpose:    Edit or add album
* Remark:     
*******************************************************************************/
require('../db_kiltedviking.php');

//Change for filename to return to after adding/saving changes to an album
$strPageReturnTo = "albumsbyartist.php";

session_start();
//If not logged in - send to music page...
if(!isset($_SESSION['uid']))
  header("Location: ./");

$blnShowForm = FALSE;  //Don't show form (flag changed if form is to be shown)

if(isset($_POST['nartist']) && isset($_POST['ntitle']))
{
  if(isset($_POST['nalbumindex']) && $_POST['nalbumindex'] != "")
    $intAlbumIndex = htmlspecialchars($_POST['nalbumindex']);

  $strNArtist = htmlspecialchars($_POST['nartist']);
  $strNTitle = htmlspecialchars($_POST['ntitle']);
  //$intNReleased = htmlspecialchars($_POST['nreleased']);
  $strNMedia = htmlspecialchars($_POST['nmedia']);
  $strNAcomment = htmlspecialchars($_POST['nacomment']);

  //If nreleased is set and not empty - ...
  if(isset($_POST['nreleased']) && $_POST['nreleased'] != "")
    $intNReleased = htmlspecialchars($_POST['nreleased']);
  else  //... else put NULL in INSERT statement
    $intNReleased = "NULL";

  //If nacomment is set and not empty - ...
  if(isset($_POST['nacomment']) && $_POST['nacomment'] != "")
    $strNAcomment = "'".htmlspecialchars($_POST['nacomment'])."'";
  else  //... else put NULL in INSERT statement
    $strNAcomment = "NULL";

  if(isset($intAlbumIndex))
    $strSql = "UPDATE albums SET artist = '$strNArtist', title = '$strNTitle', "
      ."released = $intNReleased, media = '$strNMedia', acomment = $strNAcomment WHERE albumindex = $intAlbumIndex";
  else
    $strSql = "INSERT INTO albums(artist, title, released, media, acomment) "
      ."VALUES('$strNArtist', '$strNTitle', $intNReleased, '$strNMedia', $strNAcomment)";

  if(mysql_query($strSql))
    $strMessage = "Album saved/added. <a href=\"$strPageReturnTo\">Continue &gt;&gt;</a>";
  else
    $strMessage = "<b>ERROR!</b> Something went wrong. ($strSql)";
}
else
{
  $blnShowForm = TRUE;  //Show form

  if(isset($_REQUEST['index']))
  {
    $intAlbumIndex = htmlspecialchars($_REQUEST['index']);

    $strSql = "SELECT artist, title, released, media, acomment FROM albums WHERE albumindex=$intAlbumIndex";

    $res = mysql_query($strSql);

    if($arr = mysql_fetch_assoc($res))
    {
      $strNArtist = $arr['artist'];
      $strNTitle = $arr['title'];
      $intNReleased = $arr['released'];
      $strNMedia = $arr['media'];
      $strNAcomment = $arr['acomment'];
    }

    mysql_free_result($res);
  }
//  else
//    $datNdate = date("Y-m-d");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
  <head>
  <meta http-equiv="Content-Language" content="sv" />
  <meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
  <title>Album add/edit (Kilted Viking)</title>
  <link rel="shortcut icon" href="../favicon.ico" />
  <link rel="stylesheet" type="text/css" href="../kiltedviking.css" />
  <script type="text/javascript">
  <!--
    function formfocus()
    {
      document.forms[0].artist.focus();
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
      <table cellpadding="0" cellspacing="0" border="0" width="100%">
        <tr>
          <td><img alt="" src="../bilder/ovrevanstra.gif" width="20" height="22" /></td>
          <td class="contentcell">&nbsp;</td>
          <td height="22"><img alt="" src="../bilder/ovrehogra.gif" width="20" height="22" /></td>
        </tr>
        <tr>
          <td class="contentcell">&nbsp;</td>
          <td valign="top" height="100%" class="contentcell">
          <table width="100%">
            <!-- Rad med logo och rubrik -->
            <tr>
              <td align="center" valign="top"><a href="../">
                <!-- <img alt="teddy" src="../bilder/teddy1.gif" border="0"></a> -->
                <img alt="Rosemount" src="../images/kv_logo.jpg" width="145" 
                  height="60" border="0" /></a>
              </td>
              <td valign="top">
                <h1>Album add/edit</h1>
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
                    <td><hr /></td>
                  </tr>
                  <tr>
                    <td class="menuitem"><a href="itemdone.php"
                      class="menuitem">Log out</a></td>
                  </tr>
                </table>
              </td>
              <td width="645" class="maincolumn" colspan="2">
<?
if($blnShowForm)
{
  ?>
                <!-- ***** FORM START ************************************** -->
                <form method="post" action="<?php print($_SERVER['SCRIPT_NAME'])?>">
                <input type="hidden" name="nalbumindex" value="<?= $intAlbumIndex ?>" />
                <table width="100%">
                  <tr>
                    <td class="normalboldtext">Artist</td>
                    <td><input type="text" name="nartist" size="37" maxlength="35"
                      value="<?= $strNArtist ?>" /> <span class="normaltext">(max 35)</span></td>
                  </tr>
                  <tr>
                    <td class="normalboldtext">Title</td>
                    <td><input type="text" name="ntitle" size="47"
                      maxlength="45" value="<?= $strNTitle ?>" /> <span class="normaltext">(max 45)</span></td>
                  </tr>
                  <tr>
                    <td class="normalboldtext">Year released</td>
                    <td><input type="text" name="nreleased" size="6"
                      maxlength="4" value="<?= $intNReleased ?>" /> <span class="normaltext">(i.e. 2010)</span></td>
                  </tr>
                  <tr valign="top">
                    <td class="normalboldtext">Media</td>
                    <td>
                      <select name="nmedia">
<?
  $strSql = "SELECT media FROM albummedias ORDER BY media";

  $res = mysql_query($strSql);

  while($row = mysql_fetch_array($res))
  {
    print "<option";
    if($strNcategory == $row[0])
      print " selected";
    print ">".$row[0]."</option>\n";
  }
?>
                      </select>
                    </td>
                  </tr>
                  <tr valign="top">
                    <td class="normalboldtext">Comment</td>
                    <td><textarea name="nacomment" cols="50" rows="4"><?= $strNAcomment ?></textarea></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" value="Save" /> <input type="button"
                      value="Cancel" onclick="javascript:history.back()" /></td>
                  </tr>
                </table>
                </form>
                <!-- ***** FORM END **************************************** -->
<?
}
else
{
  print "<p>&nbsp;</p>\n<p class=\"centre\">$strMessage</p>\n";
}  //if($blnShowForm)
?>
              </td>
              <!-- News column removed -->
            </tr>
            <!-- Rad med sidfot -->
            <tr>
              <td colspan="3">
                <hr />
                <p class="pagefooter">Created by: Björn G. D. Persson. Last updated:
                <?= date("Y-m-d", filemtime($_SERVER["SCRIPT_FILENAME"])) ?>.</p>
              </td>
            </tr>
          </table>
          </td>
          <td class="contentcell">&nbsp;</td>
        </tr>
        <tr>
          <td width="20"><img alt="" src="../bilder/nedrevanstra.gif" width="20" height="22" /></td>
          <td class="contentcell">&nbsp;</td>
          <td height="22" width="20"><img alt="" src="../bilder/nedrehogra.gif" width="20" height="22" /></td>
        </tr>
      </table>
    </td>
  </tr>
</table>
</div>
</center>
</body>
</html>