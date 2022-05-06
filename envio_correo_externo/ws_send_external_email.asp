<script language="JavaScript" src="ckeditor/ckeditor.js"></script>
<script language="JavaScript">
function  valida_formulario(EW_this)
{
	var strEmail = EW_this.strTo.value;
	var n = strEmail.search("@");
	var m = strEmail.length;

	if (EW_this.strPassword.value=="")
	{
		alert("Proporcione la contraseña para poder utilizar este servicio");
		EW_this.strPassword.focus();
		return false;
	}
	else if (n == -1 || m < 6)
	{
		alert("Proporcione un correo electrónico válido para el destinatario");
		EW_this.strTo.focus();
		return false;
	}
	else if (EW_this.strSubject.value=="")
	{
		alert("Proporcione el asunto del correo");
		EW_this.strSubject.focus();
		return false;
	}
	else
	{
		return true;
	}
}
</script>

<form onsubmit="return valida_formulario(this);" id="frm_send_external_email" name="frm_send_external_email" action="send_external_email.asp" method="post">
	<table border="0">
		<tr><td align="center" colspan="2"><font face="arial" size="4"><b>OLE Meetings</b></font></td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td align="center" colspan="2"><font face="arial" size="3"><b>Web Service: Envío de correo externo</b></font></td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
		<td><font face="arial" size="2">Contraseña:</font></td>
		<td><input type="password" id="strPassword" name="strPassword"></td>
		</tr>
		<tr>
		<td><font face="arial" size="2">Para:</font></td>
		<td><input type="text" id="strTo" name="strTo"></td>
		</tr>
		<tr>
		<td><font face="arial" size="2">Copia para:</font></td>
		<td><input type="text" id="strCc" name="strCc"></td>
		</tr>
		<tr>
		<td><font face="arial" size="2">Copia oculta para:</font></td>
		<td><input type="text" id="strBCC" name="strBCC"></td>
		</tr>
		<tr>
		<td><font face="arial" size="2">Asunto:</font></td>
		<td><input type="text" id="strSubject" name="strSubject"></td>
		</tr>
	</table>
		
	<table border="0">
		<tr>
		<td><font face="arial" size="2">Cuerpo del mensaje:</font></td>
		</tr>
		<tr>
		<td><textarea rows=15 cols=50 id="strHTMLBody" name="strHTMLBody"></textarea></td>
		</tr>
	</table>
		
	<table border="0">
		<tr>
		<td><font face="arial" size="2">UNC archivo anexo:</font></td>
		<td><input type="text" id="strAttachment" name="strAttachment"></td>
		</tr>
		<tr>
		<td><font face="arial" size="2">Redireccionar a:</font></td>
		<td><input type="text" id="srtRedirect" name="srtRedirect"></td>
		</tr>
	</table>
	
	<hr>
	
	<table border="0" width="100%">
		<tr><td align="center"><input type="submit" value="Enviar" id="btn_send_external_email" name="btn_send_external_email"></td></tr>
	</table>
</form>

<script>
    // Replace the textarea id with a CKEditor
    CKEDITOR.replace( 'strHTMLBody' );
</script>