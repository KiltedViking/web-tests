<? /****************************************************************************
* Name:       itemdone.php
* Purpose:    Log user out of kv.net
* Remark:     The name of the file/page is 'obscured' to try to fool visitors of
*             the purpose of the page/fields. Anybody intelligent might work it
*             out, but anyway....
*******************************************************************************/
session_start();
unset($_SESSION['uid']);
header("Location: ./");
?>
<html>
  <head>
  <meta http-equiv="Content-Language" content="sv">
  <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
  <title>News item (Kilted Viking)</title>
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
              <td align="center" valign="top"><a href="../">
                <!-- <img alt="teddy" src="../bilder/teddy1.gif" border="0"></a> -->
                <img alt="Rosemount" src="../images/kv_logo.jpg" width="145" height="60" border="0"></a>
              </td>
              <td valign="top">
                <h1>News item</h1>
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
                <p>Something happened that shouldn't... but not to worry!  :-)
                  <a href="">Continue &gt;&gt;</a></p>
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