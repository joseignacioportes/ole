<%@ LCID = 2058  %>

<%
'Configuración de variables de ambiente
Response.expires = 0
Response.expiresabsolute = Now() - 1
Response.addHeader "pragma", "no-cache"
Response.addHeader "cache-control", "private"
Response.CacheControl = "no-cache"
Response.Buffer = True
titulos_bgcolor = "#053064"
detalle_bgcolor = "#F5F5F5"
%>
<script language="JavaScript" src="javascript/ew.js"></script>
<!--#include file="db.asp"-->
<!--#include file="aspmkrfn.asp"-->
