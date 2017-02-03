<!-- login_body -->
<form name="login" method="post" action="admin.php">
    <table width="508" cellpadding="0" cellspacing="0" align="center">
        <tr>
            <td colspan="2" class="erstellen_titel">Admin Login</td>
        </tr>
        <tr>
            <td width="157" class="erstellen_links">
                <p>Name:</p>
            </td>
            <td class="erstellen_rechts">
                <input type="text" name="name" size="20" value=""></input>
            </td>
        </tr>
        <tr>
            <td width="157" class="erstellen_links">
                <p>Password: </p>
            </td>
            <td class="erstellen_rechts">
                <input type="password" name="password" size="22" value=""></input>
            </td>
        </tr>
        <tr>
            <td width="157" class="erstellen_links">
                &nbsp;
            </td>
            <td class="erstellen_rechts">
                <input type="submit" name="login" value="Login"></input>
                <br /><a href="?aksion=passwort_vergessen">Passwort vergessen</a>
            </td>
        </tr>
    </table>
</form>
<a href="index.php">Zurück</a>
<!-- /login_body -->
<!-- passwort_vergessen -->
<form name="passwort_vergessen" method="post" action="admin.php?aksion=passwort_vergessen">

    <table width="508" cellpadding="0" cellspacing="0" align="center">
        <tr>
            <td colspan="2" class="erstellen_titel">Admin Password zuschicken</td>
        </tr>
        <tr>
            <td width="157" class="erstellen_links">
                Name:
            </td>
            <td class="erstellen_rechts">
                <input type="text" name="name" size="20" value=""></input>
            </td>
        </tr>
        <tr>
            <td width="157" class="erstellen_links">
                eMail:
            </td>
            <td class="erstellen_rechts">
                <input type="text" name="email" size="22" value=""></input>
            </td>
        </tr>
        <tr>
            <td width="157" class="erstellen_links">
                &nbsp;
            </td>
            <td class="erstellen_rechts">
               <input type="submit" name="zuschicken" value="Zuschicken"></input>
            </td>
        </tr>
    </table>
</form>
<a href="admin.php">Zurück</a>
<!-- /passwort_vergessen -->

<!-- admin_body -->
<form name="admin_zugangsdaten" method="post" action="admin.php">
    <table width="508" cellpadding="0" cellspacing="0" align="center">
        <tr>
            <td colspan="2" class="erstellen_titel">Admin Zugangsdaten</td>
        </tr>
        <tr>
            <td width="157" class="erstellen_links">
                Name:
            </td>
            <td class="erstellen_rechts">
                <input type="text" name="name" size="20" value="{name}"></input>
            </td>
        </tr>
        <tr>
            <td width="157" class="erstellen_links">
                eMail:
            </td>
            <td width="350" class="erstellen_rechts">
                <input type="text" name="email" size="22" value="{email}"></input>
            </td>
        </tr>
        <tr>
            <td width="157" class="erstellen_links">
                Password:
            </td>
            <td width="350" class="erstellen_rechts">
                <input type="password" name="password1" size="22" value=""></input>
            </td>
        </tr>
                <tr>
            <td width="157" class="erstellen_links">
                Password Wiederholen:
            </td>
            <td class="erstellen_rechts">
                <input type="password" name="password2" size="22" value=""></input>
            </td>
        </tr>
        <tr>
            <td width="157" height="13" class="erstellen_links">
                &nbsp;
            </td>
            <td class="erstellen_rechts">
               <input type="submit" name="zugang_aendern" value="Ändern"></input>
            </td>
        </tr>
    </table>
</form>
<form name="admin_einstellungen" method="post" action="admin.php">
    <table width="508" cellpadding="0" cellspacing="0" align="center">
       <tr>
            <td colspan="2" class="erstellen_titel">Admin Einstellungen</td>
       </tr>
       <tr>
            <td width="157" class="erstellen_links">
                Gaestebuch Titel:
            </td>
            <td class="erstellen_rechts">
                <input type="text" name="gaestebuch_titel" size="35" value="{gaestebuch_titel}"></input>
            </td>
       </tr>
       <tr>
            <td width="157" class="erstellen_links">
                Beiträge pro Seite:
            </td>
            <td class="erstellen_rechts">
                <input type="text" name="pro_seite" size="2" value="{pro_seite}"></input>
            </td>
       </tr>
       <tr>
            <td width="157" class="erstellen_links">
                eMail senden an Admin bei neuen Eintrag?
            </td>
            <td class="erstellen_rechts">

                <select name="email_senden" size="1">
                    <option {email_an} value="1">An</option>
                    <option {email_aus} value="0">Aus</option>
								</select>
            </td>
       </tr>
       <tr>
            <td width="157" class="erstellen_links">
                eMail senden bei an Gast bei neuen Eintrag?
            </td>
            <td class="erstellen_rechts">

                <select name="email_gast_senden" size="1">
                    <option {email_gast_an} value="1">An</option>
                    <option {email_gast_aus} value="0">Aus</option>
								</select>
            </td>
       </tr>
       <tr>
            <td width="157" class="erstellen_links">
                Titel Feld:
            </td>
            <td class="erstellen_rechts">
               	<select name="beitrag_titel" size="1">
                    <option {beitrag_titel_an} value="1">An</option>
                    <option {beitrag_titel_aus} value="0">Aus</option>
								</select>
            </td>
       </tr>
       <tr>
            <td width="157" class="erstellen_links">
                ICQ Feld:
            </td>
            <td class="erstellen_rechts">
               	<select name="beitrag_icq" size="1">
                    <option {beitrag_icq_an} value="1">An</option>
                    <option {beitrag_icq_aus} value="0">Aus</option>
								</select>
            </td>
       </tr>
       <tr>
            <td width="157" class="erstellen_links">
                Smilies:
            </td>
            <td class="erstellen_rechts">
               	<select name="smilies" size="1">
                    <option {smilies_an} value="1">An</option>
                    <option {smilies_aus} value="0">Aus</option>
								</select>
            </td>
       </tr>
       <tr>
            <td width="157" class="erstellen_links">
                BBCode:
            </td>
            <td class="erstellen_rechts">
                <select name="bbcode" size="1">
									    <option {bbcode_aus} value="1">An</option>
									    <option {bbcode_aus} value="0">Aus</option>
								</select>
            </td>
        </tr>
        <tr>
            <td width="157" class="erstellen_links">
                Captcha (Spamschutz):
            </td>
            <td class="erstellen_rechts">
                <select name="captcha" size="1">
                    <option {captcha_an} value="1">An</option>
                    <option {captcha_aus} value="0">Aus</option>
								</select>
            </td>
       </tr>
       <tr>
            <td width="157" class="erstellen_links">
                Floodingschutz:
            </td>
            <td class="erstellen_rechts">
                <input type="text" name="floodingschutz" size="2" value="{floodingschutz}"></input> Sekunden
            </td>
       </tr>
       <tr>
            <td width="157" class="erstellen_links">
                Kommentar Titel:
            </td>
            <td class="erstellen_rechts">
                <input type="text" name="kommentar_titel" size="25" value="{kommentar_titel}"></input>
            </td>
       </tr>
       <tr>
            <td width="157" class="erstellen_links">
                Soll der Beitrag sofort Freigeschalten werden?
            </td>
            <td class="erstellen_rechts">

                <select name="auto_beitrag_status" size="1">
                    <option {auto_beitrag_status_an} value="1">Ja</option>
                    <option {auto_beitrag_status_aus} value="0">Nein</option>
								</select>
            </td>
       </tr>
        <tr>
            <td width="157" class="erstellen_links">
                &nbsp;
            </td>
            <td class="erstellen_rechts">
               <input type="submit" name="gb_aendern" value="Ändern"></input>
            </td>
        </tr>
    </table>
</form>
<a href="index.php">Zurück</a>
<!-- /admin_body -->
<!-- edit_body -->
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
            <!-- beitrag_email --><a href="mailto:{vorschau_email}"><img src="design/images/email.gif" border="0" alt="{vorschau_email}"/></a><!-- /beitrag_email --><!-- homepage_email --><a href='{vorschau_homepage}' target='_blank'><img src='design/images/homepage.gif' border='0' alt='{vorschau_homepage}'/></a><!-- /homepage_email --><!-- beitrag_icq --><a href="http://www.icq.com/people/about_me.php?uin={vorschau_icq}" target="_blank"><img src="http://status.icq.com/online.gif?icq={vorschau_icq}&img=22" border="0" alt="{vorschau_icq}"/></a><!-- /beitrag_icq --><br />
        </td>
        <td class="beitrag_text">
            {vorschau_beitrag}&nbsp;
        </td>
    </tr>
</table>
<br />
<!-- /vorschau -->
<form name="eintrag" method="post" action="admin.php?beitrag=edit">
<input type="hidden" name="beitrag_id" value="{beitrags_id}"></input>
    <table width="500" cellpadding="0" cellspacing="0"  align="center">
        <tr>
            <td colspan="2" class="erstellen_titel">Beitrag Editieren</td>
        </tr>
        <tr>
            <td width="157" class="erstellen_links">
                * Name:
            </td>
            <td class="erstellen_rechts">
                <input type="text" name="name" size="20" value="{name}" maxlength="20"></input>
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
        <tr>
            <td width="157" class="erstellen_links">
                ICQ:
            </td>
            <td class="erstellen_rechts">
                <input type="text" name="icq" size="10" maxlength="11" value="{icq}"></input>
            </td>
        </tr>
        <tr>
            <td width="157" class="erstellen_links">
                Homepage:
            </td>
            <td class="erstellen_rechts">
                <input type="text" name="homepage" value="{homepage}" size="25"></input>
            </td>
        </tr>
        <tr>
            <td width="157" class="erstellen_links">
                Titel:
            </td>
            <td class="erstellen_rechts">
                <input type="text" name="titel" size="30" maxlength="50" value="{titel}"></input>
            </td>
        </tr>
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
               					<td class="erstellen_links">* Beitrag:</td>
               			</tr>
               			<!-- smilies_box -->
               			<tr>
               					<td class="erstellen_links">
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
               					<td class="erstellen_links">
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
        <tr>
            <td width="157" class="erstellen_links">
                &nbsp;
            </td>
            <td class="erstellen_rechts">
                <input type="submit" name="eintragen" value="Ändern"></input> <input type="submit" name="vorschau" value="Vorschau"></input> <input type="reset" value="Löschen"></input><br />
                Mit * markierte Felder sind erforderlich.
            </td>
        </tr>
    </table>
</form>
<a href="index.php">Zurück</a>
<!-- /edit_body -->
<!-- loeschen_body -->
<form name="admin_body" method="post" action="admin.php?beitrag=loeschen">
<input type="hidden" name="beitrags_id" value="{beitrags_id}"></input>
    <table width="508" cellpadding="0" cellspacing="0" align="center">
        <tr>
            <td class="erstellen_titel">Beitrag Löschen</td>
        </tr>
        <tr>
            <td class="beitrag_loeschen">Möschtest du wirklich diesen beitrag Löschen?</td>
        </tr>
        <tr>
            <td class="beitrag_loeschen"><input type="submit" name="ja" value="Ja"></input> <input type="submit" name="nein" value="Nein"></input></td>
        </tr>
    </table>
</form>
<!-- /loeschen_body -->
<!-- kommentar_body -->
<!-- vorschau -->
<table width="500" cellpadding="0" cellspacing="0" align="center">
    <tr>
        <td width="120" class="beitrag_titel">&nbsp;</td>
        <td class="beitrag_titel">{vorschau_titel}</td>
    </tr>
    <tr>
        <td width="120" class="beitrag_ersteller">
            Geschrieben von: {vorschau_name}
            am {vorschau_datum}<br />
            um {vorschau_zeit}<br />
            <!-- beitrag_email --><a href="mailto:{vorschau_email}"><img src="design/images/email.gif" border="0" alt="{vorschau_email}"/></a><!-- /beitrag_email --><!-- homepage_email --><a href='{vorschau_homepage}' target='_blank'><img src='design/images/homepage.gif' border='0' alt='{vorschau_homepage}'/></a><!-- /homepage_email --><!-- beitrag_icq --><a href="http://www.icq.com/people/about_me.php?uin={vorschau_icq}" target="_blank"><img src="http://status.icq.com/online.gif?icq={vorschau_icq}&img=22" border="0" alt="{vorschau_icq}"/></a><!-- /beitrag_icq --><br />
        </td>
        <td class="beitrag_text">
            {vorschau_beitrag}&nbsp;
        </td>
    </tr>
</table>
<br />
<!-- /vorschau -->
<form name="eintrag" method="post" action="admin.php?beitrag=kommentar">
<input type="hidden" name="beitrag_id" value="{beitrags_id}"></input> 
    <table width="500" cellpadding="0" cellspacing="0"  align="center">
        <tr>
            <td colspan="2" class="erstellen_titel">Beitrag Kommentar</td>
        </tr>
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
               					<td class="erstellen_links">* Beitrag:</td>
               			</tr>
               			<!-- smilies_box -->
               			<tr>
               					<td class="erstellen_links">
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
               					<td class="erstellen_links">
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
        <tr>
            <td width="157" class="erstellen_links">
                &nbsp;
            </td>
            <td class="erstellen_rechts">
                <input type="submit" name="eintragen" value="Ändern"></input> <input type="submit" name="vorschau" value="Vorschau"></input> <input type="reset" value="Löschen"></input><br />
                Mit * markierte Felder sind erforderlich.
            </td>
        </tr>
    </table>
</form>
<a href="index.php">Zurück</a>
<!-- /kommentar_body -->