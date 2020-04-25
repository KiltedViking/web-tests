<?
require('../db_kiltedviking.php');
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
                <h1>Some Music</h1>
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
                    <td class="menuitem"><a href="albumsbyartist.php" class="menuitem">Albums by Artist</a></td>
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
                <p class="contentsheader">Introduction</p>
                <p>Every now and then I find an album I want while browsing a
                  music shop. But my collection of music has become so large I can't
                  remember every single album I own. By publishing my collection,
                  and thereby making it more available to me, I hope to help myself
                  avoid buying duplicates. (A future version might be
                  available for WAP clients, i.e. my mobile phone.)</p>

                <p class="contentsheader">About database</p>
                <p>I started this database when I was a student as an attempt to
                  catalog my music collection and to learn how to use Microsoft Access (v. 2.0).
                  The original database also contained songs on the albums (at the
                  time of writing this I hade about 600+ albums and 4500+ songs.)
                  Information about albums are as correct as I can make them (or
                  be bothered). Please visit All Music for, hopefully, more accurate
                  information.</p>

                <p class="comment">When learning how to use a new programming language
                  and/or database manager I have used this concept, i.e. my music
                  collection - a concept
                  that has been familiar to me. This has helped me to get started
                  faster as well as compare similarities and differences between
                  languages and/or databases.</p>
              </td>
              <td width="125" class="newscolumn">
                <p class="contentsheader">Links</p>
                <p><a href="http://www.allmusic.com" target="_blank">All Music</a>
                  [en]<br> - a very comprehensive database of music.</p>
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