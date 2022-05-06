<!--#include file="db.asp"-->
<%
x_event_det_id = request.form("event_det_id")

'Open Connection to the database
Set conn = Server.CreateObject("ADODB.Connection")
conn.CommandTimeout = 1000
conn.Open xDb_Conn_Str

'Actualiza envío de correo
strsql = "update" & vblf
strsql = strsql & "eventos_detalle_comp_proveed" & vblf
strsql = strsql & "set" & vblf
strsql = strsql & "evento_enviado = true" & vblf
strsql = strsql & "where" & vblf
strsql = strsql & "event_det_id = " & x_event_det_id & vblf
strsql = strsql & ";" & vblf
'Response.Write replace(strsql,vblf,"<br>") & "<br><br>"
'Response.End
conn.Execute(strsql)

'Cierre y destrucción de objetos
conn.close
set conn = nothing
%>