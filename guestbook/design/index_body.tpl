<!-- header -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <title>{gaestebuch_titel}</title>
	<meta name="author" content="Mathias Possinke" />	<meta name="language" content="german,deutsch,DE,AT,CH,US" />
	<meta http-equiv="content-language" content="de"/>
	<meta http-equiv="content-type" content="application/xhtml+xml charset=ISO-8859-1"/>
	<link rel="stylesheet" href="design/css/styles.css" type="text/css" />
	<link rel="alternate" type="application/rss+xml" title="Mapos-Scripts.de News RSS" href="http://www.mapos-scripts.de/news.php?rss=true" />
	<script type="text/javascript" src="js/javascript.js"></script>
</head>

<body>
<table width="500" cellpadding="0" cellspacing="0" align="center">
    <tr>
        <td align="left"><h2>{gaestebuch_titel}</h2></td>
    </tr>
</table> 
<!-- /header -->
<!-- eintrag -->
<!-- vorschau -->
<table width="500" cellpadding="0" cellspacing="0" align="center">
    <tr>
        <td width="120" class="beitrag_titel">&nbsp;</td>
        <td class="beitrag_titel">{vorschau_titel}&nbsp;</td>
    </tr>
    <tr>
        <td width="120" class="beitrag_ersteller">
            Geschrieben von: {vorschau_name}
            am {vorschau_datum}<br />
            um {vorschau_zeit}<br />
            <!-- beitrag_email --><a href="mailto:{vorschau_email}"><img src="design/images/email.gif" border="0" alt="{vorschau_email}"/></a><!-- /beitrag_email --><!-- homepage_email --><a href='{vorschau_homepage}' target='_blank'><img src='design/images/homepage.gif' border='0' alt='{vorschau_homepage}'/></a><!-- /homepage_email --><!-- beitrag_icq --><a href="http://www.icq.com/people/about_me.php?uin={vorschau_icq}" target="_blank"><img src="http://status.icq.com/online.gif?icq={vorschau_icq}&img=5" border="0" alt="{vorschau_icq}"/></a><!-- /beitrag_icq --><br />
        </td>
        <td class="beitrag_text">
            {vorschau_beitrag}&nbsp;
        </td>
    </tr>
</table>
<br />
<!-- /vorschau -->
<form name="eintrag" method="post" action="index.php?id=beitrag_erstellen">
    <table width="500" cellpadding="0" cellspacing="0" align="center">
        <tr>
            <td colspan="2" class="erstellen_titel">Beitrag Schreiben</td>
        </tr>
        <tr>
            <td width="157" class="erstellen_links">
                * Name:
            </td>
            <td class="erstellen_rechts">
                <input type="text" name="name" size="20" maxlength="20" value="{name}"></input>
            </td>
        </tr>
        <tr>
            <td width="157" class="erstellen_links">
                eMail:
            </td>
            <td class="erstellen_rechts">
                <input type="text" name="email" size="22" value="{email}"></input>
            </td>
        </tr>
        <!-- beitrag_icq_box -->
        <tr>
            <td width="157" class="erstellen_links">
                ICQ:
            </td>
            <td class="erstellen_rechts">
                <input type="text" name="icq" size="11" maxlength="11" value="{icq}"></input>
            </td>
        </tr>
        <!-- /beitrag_icq_box -->
        <tr>
            <td width="157" class="erstellen_links">
                Homepage:
            </td>
            <td class="erstellen_rechts">
                <input type="text" name="homepage" value="{homepage}" size="25"></input>
            </td>
        </tr>
        <!-- beitrag_titel_box -->
        <tr>
            <td width="157" class="erstellen_links">
                Titel:
            </td>
            <td class="erstellen_rechts">
                <input type="text" name="titel" size="30" maxlength="50" value="{titel}"></input>
            </td>
        </tr>
        <!-- /beitrag_titel_box -->
        <!-- bbcode_box -->
        <tr>
            <td width="157" height="5" class="erstellen_links">&nbsp;</td>
            <td class="erstellen_rechts">
                <input type="button" name="b" value="B" onclick="javascript:Smilies('[b][/b]')"></input> 
				        <input type="button" name="U" value="U" onclick="javascript:Smilies('[u][/u]')"></input>
				        <input type="button" name="i" value="I" onclick="javascript:Smilies('[i][/i]')"></input>
				        <input type="button" name="url" value="URL" onclick="javascript:Smilies('[url][/url]')"></input>
				        <input type="button" name="bild" value="IMG"  onclick="javascript:Smilies('[img][/img]')"></input>
				        <input type="button" name="color" value="Farbe" onclick="javascript:Smilies('[color=red][/color]')"></input>
				        <input type="button" name="color" value="Zitat" onclick="javascript:Smilies('[zitat][/zitat]')"></input>
				        <input type="button" name="color" value="Code" onclick="javascript:Smilies('[code][/code]')"></input>
            </td>
        </tr>
        <!-- /bbcode_box -->
        <tr>
            <td width="157" class="erstellen_links">
               	<table  width="100%" cellpadding="0" cellspacing="0">
               			<tr>
               					<td>* Beitrag:</td>
               			</tr>
               			<!-- smilies_box -->
               			<tr>
               					<td>&nbsp;</td>
               			</tr>
               			<tr>
               					<td>
                <table cellpadding="0" cellspacing="0" align="right">
                    <tr>
                        <td width="25" height="20"><a href="javascript:Smilies(':)')"><img src="smilies/1.gif" border="0" width="15" height="15" alt=""/></a></td>
                        <td width="25" height="20"><a href="javascript:Smilies(':D')"><img src="smilies/icon_biggrin.gif" border="0" width="15" height="15" alt=""/></a></td>
                        <td width="25" height="20"><a href="javascript:Smilies(':S')"><img src="smilies/icon_confused.gif" border="0" width="15" height="15" alt=""/></a></td>
                    </tr>
                    <tr>
                        <td width="25" height="20"><a href="javascript:Smilies(':!:')"><img src="smilies/icon_exclaim.gif" border="0" width="15" height="15" alt=""/></a></td>
                        <td width="25" height="20"><a href="javascript:Smilies(':frown:')"><img src="smilies/icon_frown.gif" border="0" alt=""/></a></td>
                        <td width="25" height="20"><a href="javascript:Smilies(':idee:')"><img src="smilies/icon_idea.gif" border="0" width="15" height="15" alt=""/></a></td>
                    </tr>
                    <tr>
                        <td width="25" height="20"><a href="javascript:Smilies(';)')"><img src="smilies/icon_wink.gif" border="0" width="15" height="15" alt=""/></a></td>
                        <td width="25" height="20"><a href="javascript:Smilies(':neutral:')"><img src="smilies/icon_neutral.gif" border="0" width="15" height="15" alt=""/></a></td>
                        <td width="25" height="20"><a href="javascript:Smilies(':question:')"><img src="smilies/icon_question.gif" border="0" width="15" height="15" alt=""/></a></td>
                    </tr>
                    <tr>
                        <td width="25" height="20"><a href="javascript:Smilies(':arrow:')"><img src="smilies/icon_arrow.gif" border="0" width="15" height="15" alt=""/></a></td>
                        <td width="25" height="20"><a href="javascript:Smilies(':evil:')"><img src="smilies/icon_evil.gif" border="0" width="15" height="15" alt=""/></a></td>
                        <td width="25" height="20"><a href="javascript:Smilies(':twisted:')"><img src="smilies/icon_twisted.gif" border="0" width="15" height="15" alt=""/></a></td>
                    </tr>
                    <tr>
                        <td width="25" height="20"><a href="javascript:Smilies(':O')"><img src="smilies/icon_surprised.gif" border="0" width="15" height="15" alt=""/></a></td>
                        <td width="25" height="20"><a href="javascript:Smilies('8)')"><img src="smilies/rolleyes.gif" border="0" width="15" height="15" alt=""/></a></td>
                        <td width="25" height="20">&nbsp;</td>
                    </tr>
                </table>
                					</td>
                		</tr>
                		<!-- /smilies_box -->
               			<tr>
               					<td>&nbsp;</td>
               			</tr>
               			<tr>
               					<td>
													html [aus]<br />
													Smilies [{smilies}]<br />
													BBcode [<a href="bbcode.php" title="BBcode" target="_blank">{bbcode}</a>]<br />
               					</td>
               			</tr>
               	</table>
            </td>
            <td class="erstellen_rechts">
                <textarea name="beitrag" rows="12" cols="35">{beitrag}</textarea>
            </td>
        </tr>
       <!-- captcha -->
        <tr>
            <td width="157" class="erstellen_links">
                Bestätigungs-Code: *
            </td>
            <td class="erstellen_rechts">
                <img src="index.php?captcha=bild" border="0" align="top" alt="Captcha"/> ==> <input type="text" name="code" size="5" maxlength="5" value=""></input>
            </td>
        </tr>
        <!-- /captcha -->
        <tr>
            <td width="157" class="erstellen_links">
                &nbsp;
            </td>
            <td class="erstellen_rechts">
                <input type="submit" name="eintragen" value="Eintragen"></input> <input type="submit" name="vorschau" value="Vorschau"></input> <input type="reset" value="Löschen"></input><br />
                Mit * markierte Felder sind erforderlich.
            </td>
        </tr>
    </table>
</form>
<a href="index.php">Zurück</a>
<!-- /eintrag -->

<!-- index_body -->
<table width="500" cellpadding="0" cellspacing="0" align="center">
		<tr>
				<td align="center" colspan="2"><b>[<a href="?id=beitrag_erstellen">Eintragen</a>]</b></td>
		</tr>
		<tr>
				<td align="left">Einträge im Gästebuch: {counter_beitraege}</td>
				<td align="right">Einträge pro Seite: {pro_seite}</td>
		</tr>
		<tr>
				<td align="center" colspan="2">
				<table width="100%" cellpadding="0" cellspacing="0" align="center">
						<tr>
								<td align="left">[<a href='index.php?seite={seite_zurueck}'>&lt;</a>]</td>
								<td align="center">{atuelle_seite}</td>
								<td align="right">[<a href='index.php?seite={seite_vor}'>&gt;</a>]</td>
						</tr>
				</table>
				</td>
		</tr>
</table>
<br />
<!-- beitrag_body -->
<table width="500" cellpadding="0" cellspacing="0" align="center">
    <tr>
        <td class="beitrag_titel">
            <!-- admin_eingelogt --><!-- beitrag_unsichtbar --><b style="color: red"> Unsichtbar </b><!-- /beitrag_unsichtbar --><!-- beitrag_sichtbar --><b style="color: lime">  Sichtbar </b><!-- /beitrag_sichtbar --><!-- /admin_eingelogt -->&nbsp;
        </td>
        <td class="beitrag_titel"> 
            {beitrag_titel}&nbsp;
        </td>
    </tr>
    <tr>
        <td width="120" class="beitrag_ersteller">
            Geschrieben von: {name}
            am {datum}<br />
            um {time}<br />
            <!-- admin_eingelogt --><!-- beitrag_ip --><a href="http://network-tools.com/default.asp?host={ip}"><img src="design/images/ip.gif" border="0" alt="{ip}"/></a><!-- /beitrag_ip --><!-- /admin_eingelogt --><!-- beitrag_email --><a href="mailto:{email}"><img src="design/images/email.gif" border="0" alt="{email}"/></a><!-- /beitrag_email --><!-- homepage_email --><a href="{homepage}" target="_blank"><img src="design/images/homepage.gif" border="0" alt="{homepage}"/></a><!-- /homepage_email --><!-- beitrag_icq --><a href="http://www.icq.com/people/about_me.php?uin={icq}" target="_blank"><img src="http://status.icq.com/online.gif?icq={icq}&img=5" border="0" alt="{icq}"/></a><!-- /beitrag_icq --><br />
        		<!-- admin_eingelogt --><br /><!-- beitrag_unsichtbar --><a href="admin.php?beitrag=sichtbar&amp;id={id}"><img src="design/images/auge.gif" border="0" alt="Sichtbar"/></a> <!-- /beitrag_unsichtbar --><!-- beitrag_sichtbar --><a href="admin.php?beitrag=unsichtbar&amp;id={id}"><img src="design/images/auge_2.gif" border="0" alt="Unsichtbar"/></a> <!-- /beitrag_sichtbar --><a href="admin.php?beitrag=kommentar&amp;id={id}"><img src="design/images/kommentar.gif" border="0" alt="Kommentar"/></a> <a href="admin.php?beitrag=edit&amp;id={id}"><img src="design/images/edit.gif" border="0" alt="Edit"/></a> <a href="admin.php?beitrag=loeschen&amp;id={id}"><img src="design/images/loeschen.gif" border="0" alt="Löschen"/></a><!-- /admin_eingelogt -->
        </td>
        <td class="beitrag_text">
            {beitrag}&nbsp;
        </td>
    </tr>
</table>
<br />
<!-- /beitrag_body -->
<table width="500" cellpadding="0" cellspacing="0" align="center">
		<tr>
				<td align="left">[<a href='index.php?seite={seite_zurueck}'>&lt;</a>]</td>
				<td align="center">{atuelle_seite}</td>
				<td align="right">[<a href='index.php?seite={seite_vor}'>&gt;</a>]</td>
		</tr>
</table>
<!-- /index_body -->
<!-- box_1 -->
            <table width="500" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td class="erstellen_titel">{titel}</td>
                </tr>
                <tr>
                    <td class="erstellen_rechts">{text}</td>
                </tr>
            </table>
<!-- /box_1 -->
<!-- footer -->
<p id="copyrigt">Copyright © 2006 - 2007 by <a href="http://www.Mapos-Scripts.de" target="_blank" class="hover">Mapos-Scripts.de</a> <!-- admin_eingelogt -->(<a href="admin.php">Adminbereich</a> <a href="admin.php?logout=true">Logout</a>)<!-- /admin_eingelogt --><!-- admin_ausgelogt -->(<a href="admin.php">Login</a>)<!-- /admin_ausgelogt --><br />Version {version}</p>
</body>
</html>
<!-- /footer -->