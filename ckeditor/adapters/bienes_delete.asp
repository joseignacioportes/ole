<!--#include file="global_header.asp"-->
<%
'Asigna valores a variables
x_bcb_id = Request.Querystring("key")

if x_bcb_id <> "" then
	'Borra registro de la tabla "buzon_compras_bienes"
	strsql = "delete from buzon_compras_bienes where bcb_id = " & x_bcb_id
	'Response.Write replace(strsql,vblf,"<br>")
	'Response.End

	'Open Connection to the database
	set conn = Server.CreateObject("ADODB.Connection")
	conn.Open xDb_CHSAPPS_Conn_Str

	'Ejecuta comando DML
	conn.execute(strsql)

	'Cierra y destruye objetos
	conn.close
	set conn = nothing
end if

Response.Redirect "bienes.asp"
%>
