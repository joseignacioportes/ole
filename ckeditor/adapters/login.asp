<!--#include file="db.asp"-->
<%
If Request.Form("submit") <> "" Then
	validpwd = False

	'Asignación de valores a variables
	userid = trim(Request.Form("userid"))
	userid = ucase(userid)
	passwd = Request.Form("passwd")
	
	'Administradores del sistema
	strUsrAdmin = "SISTEMAS," 'Sistemas
	strUsrAdmin = strUsrAdmin & "LZJ1440," 'Jaime Lezama
	strUsrAdmin = strUsrAdmin & "PHAL1470," 'PEREZ HERNANDEZ ANA LILIA
	strUsrAdmin = strUsrAdmin & "VGE2301," 'VAZQUEZ GARCIA EDGAR


	'Valida contraseña y usuario autorizado
    if not validpwd then
		srtsql = "select nombre, nombre_lar, pwd from tcausr where nombre = '" & userid & "'"
		'Response.Write srtsql
		'Response.End 
		
		Set conn = Server.CreateObject("ADODB.Connection")
		conn.open xDb_ASSIST_Conn_Str
		
		Set rs = conn.Execute(srtsql)
		
		if rs.Eof = false Then
			if trim(UCase(rs("pwd"))) = UCase(passwd) and instr(strUsrAdmin,trim(userid)) > 0 then
				Response.Cookies("cbe")("userid") = trim(rs("nombre"))
				Response.Cookies("cbe")("user_name") = trim(rs("nombre_lar"))
				Response.Cookies("cbe")("user_profile") = "Admin"
				validpwd = true
			end if
		else
			Response.Cookies("cbe")("user_profile") = ""
		end if
		
		rs.Close
		Set rs = Nothing
		conn.Close
		Set conn = Nothing
	end if

	if validpwd Then
		Response.Cookies("cbe")("session_status") = "login"
		Response.Cookies("cbe").Expires = Date + 1
		Response.Redirect "bienes_activos_list.asp"
	end if
Else
	validpwd = True
End If
%>
<html>
<head>
	<title>Compras de Bienes para Empleados</title>	
	<link rel="shortcut icon" href="images/chs_favicon.ico">
	<link href="css/login.css" rel="stylesheet" type="text/css">
	<meta name="author" content="BSOLUTIONSMX.COM / mramos@bsolutionsmx.com" />
	<script type="text/javascript" src="javascript/icons_library.js"></script>
</head>

<script language="JavaScript" src="javascript/ew.js"></script>
<script language="JavaScript">
<!-- start JavaScript
function  EW_checkMyForm(EW_this)
{
if  (!EW_hasValue(EW_this.userid, "TEXT" ))
	{
    if  (!EW_onError(EW_this, EW_this.userid, "TEXT", "Proporciona el Usuario"))
        return false; 
	}

if  (!EW_hasValue(EW_this.passwd, "PASSWORD" ))
	{
    if  (!EW_onError(EW_this, EW_this.passwd, "PASSWORD", "Proporciona la Contraseña"))
        return false; 
	}
return true;
}
// end JavaScript -->
</script>
<body leftmargin=0 topmargin=0 marginheight=0 marginwidth=0>

<div style="border:1px solid; border-radius: 30px; background-color:#053064; width:520px; margin:10px auto;">
	<table border="0" cellspacing="0" cellpadding="8" align="center">
		<tr align="center">
			<td>
			<img src="images/chs_logo_blanco.png" border="0">
			<br><br>
			<font face="arial" size="4" color="white"><b>Compras de Bienes para Empleados</b></font>
			</td>
		</tr>
	</table>
</div>

<p><hr><p>


<p>

<%if not validpwd then%>
	<p align="center"><font face="arial" size="-1" color="#FF0000">Usuario o Clave incorrectos o usuario no autorizado</font></p>
<%end if%>

<form action="login.asp" method="post" onSubmit="return EW_checkMyForm(this);">
<table style="border-radius: 20px; box-shadow: 8px 8px 10px 0;" cellspacing="0" cellpadding="4" align="center" background="images/fondo_body.gif">
	<tr>
		<td><input class="user" type="text" name="userid" size="20" placeholder="Usuario"></td>
	</tr>
	<tr>
		<td><input class="password" type="password" name="passwd" size="20" placeholder="Contraseña"></td>
	</tr>
	<tr>
		<td colspan="2" align="center"><input type="submit" name="submit" value="Login"></td>
	</tr>
</table>
</form>

</body>
</html>
