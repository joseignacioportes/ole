<%
'******************************************************************
'Nombre del Sistema: Envío de correo externo
'Versión: 1.0
'Descripción: Envío de correo electrónico a direcciones externas.
'             El envío se hace a través de la librería CDO de Microsoft.
'             Se utiliza el servidor de correo de OLE como transporte.
'             Esta aplicación requiere autienticación para utilización.
'Autor: Ing. Mauricio Ramos - mramos@bsolutionsmx.com
'Fecha Creación: 23/Mar/2020
'Lenguaje: Microsoft ASP 3.5
'Libreria: cdo.dll
'******************************************************************
On Error Resume Next
%>
<!--#include file="sustituye_a_vocales_acentuadas.asp"-->
<%
'Asignación de valores a variables y validaciones
strCredencial = "52O37L62E"
strPassword = trim(Request.Form("strPassword"))
if strPassword <> strCredencial then
	strMsgConfirmacion = "<font face='arial' size='3'>"
	strMsgConfirmacion = strMsgConfirmacion & "<i>La contraseña proporcionada es incorrecta. Acceso denegado.</i>"
	strMsgConfirmacion = strMsgConfirmacion & "</font>"
	Response.Redirect "confirmacion.asp?msg=" & strMsgConfirmacion
end if

x_emp_id = Request.Form("x_emp_id")
if x_emp_id = "" then x_emp_id = 0

strTo = trim(Request.Form("strTo"))
if instr(strTo,"@") = 0 then
	strMsgConfirmacion = "<font face='arial' size='3'>"
	strMsgConfirmacion = strMsgConfirmacion & "<i>Correo electrónico del destinatario inválido. No se envió el correo.</i>"
	strMsgConfirmacion = strMsgConfirmacion & "</font>"
	Response.Redirect "confirmacion.asp?msg=" & strMsgConfirmacion
end if

strCc = trim(Request.Form("strCc"))
strBCC = trim(Request.Form("strBCC"))

strSubject = trim(Request.Form("strSubject"))
if strSubject = "" then
	strMsgConfirmacion = "<font face='arial' size='3'>"
	strMsgConfirmacion = strMsgConfirmacion & "<i>No se proporcionó el asunto del correo. No se envió el correo.</i>"
	strMsgConfirmacion = strMsgConfirmacion & "</font>"
	Response.Redirect "confirmacion.asp?msg=" & strMsgConfirmacion
else
	strSubject = vocales_acentuadas(strSubject)
end if

strHTMLBody = trim(Request.Form("strHTMLBody"))
if strHTMLBody = "" then
	strMsgConfirmacion = "<font face='arial' size='3'>"
	strMsgConfirmacion = strMsgConfirmacion & "<i>No se proporcionó el cuerpo del correo. No se envió el correo.</i>"
	strMsgConfirmacion = strMsgConfirmacion & "</font>"
	Response.Redirect "confirmacion.asp?msg=" & strMsgConfirmacion
else
	strHTMLBody = vocales_acentuadas(strHTMLBody) & "<br><br><br>"
end if

strAttachment = trim(Request.Form("strAttachment"))

srtRedirect = trim(Request.Form("srtRedirect"))
if srtRedirect = "" then
	strMsgConfirmacion = "<font face='arial' size='3'>"
	strMsgConfirmacion = strMsgConfirmacion & "<i>Se envió satisfactoriamente el correo a: " & strTo & "</i>"
	strMsgConfirmacion = strMsgConfirmacion & "</font>"
	srtRedirect = "confirmacion.asp?msg=" & strMsgConfirmacion
end if

strFrom = "admin@olemx.com"
strSendUsing = 2
strSMTPserver = "mail.olemx.com"
strSMTPserverPort = 465
strSMTPauthenticate = 1 'Basic authentication
strSebdUserName = "admin@olemx.com"
strSebdUserPass = "f15Y~0ie"

'Creación de objeto CDO y envío de correo.
Set myMail=CreateObject("CDO.Message")
myMail.Subject = strSubject
myMail.From = strFrom
myMail.To = strTo
myMail.Cc = strCc
myMail.Bcc = strBCC
if strAttachment <> "" then myMail.AddAttachment = strAttachment
myMail.HTMLBody = strHTMLBody
myMail.Configuration.Fields.Item ("http://schemas.microsoft.com/cdo/configuration/sendusing") = strSendUsing
myMail.Configuration.Fields.Item ("http://schemas.microsoft.com/cdo/configuration/smtpserver") = strSMTPserver
myMail.Configuration.Fields.Item ("http://schemas.microsoft.com/cdo/configuration/smtpserverport") = strSMTPserverPort
myMail.Configuration.Fields.Item ("http://schemas.microsoft.com/cdo/configuration/smtpauthenticate") = strSMTPauthenticate 
myMail.Configuration.Fields.Item ("http://schemas.microsoft.com/cdo/configuration/sendusername") = strSebdUserName
myMail.Configuration.Fields.Item ("http://schemas.microsoft.com/cdo/configuration/sendpassword") = strSebdUserPass
myMail.Configuration.Fields.Item ("http://schemas.microsoft.com/cdo/configuration/smtpusessl") = True
myMail.Configuration.Fields.Update
myMail.Send

'Destruciión de objetos
set myMail=nothing

if Err then
	'Redireccionamiento
	Response.Redirect "confirmacion.asp?msg=Error: " & Err.Number & " " & Err.Description
else
	'Actualiza status de envío
	%>
	<!--#include file="actualiza_status_envio_correo.asp"-->
	<%
	'Redireccionamiento
	Response.Redirect srtRedirect
end if
%>