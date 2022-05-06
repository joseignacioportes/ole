<%
'Validación de credenciales
strMsg = Request.QueryString("msg")
strMsgConfirmacion = "<font face='arial' size='3'>"
strMsgConfirmacion = strMsgConfirmacion & "<b>OLE</b>"
strMsgConfirmacion = strMsgConfirmacion & "<br><br>"
strMsgConfirmacion = strMsgConfirmacion & "<b>WEB SERVICE ENVIO DE CORREO EXTERNO</b>"
strMsgConfirmacion = strMsgConfirmacion & "</font>"
strMsgConfirmacion = strMsgConfirmacion & "<br><br>"
strMsgConfirmacion = strMsgConfirmacion & strMsg
strMsgConfirmacion = strMsgConfirmacion & "<br>"
Response.Write strMsgConfirmacion
%>