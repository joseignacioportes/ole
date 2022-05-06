<!--#include file="global_header.asp"-->
<%
'Asigna valores a variables
x_bcb_id = Request.Form("x_bcb_id")
x_bcb_sku = Request.Form("x_bcb_sku")
x_bcb_desc_corta = Request.Form("x_bcb_desc_corta")
x_bcb_desc_completa = Request.Form("x_bcb_desc_completa")
x_bcb_desc_completa = replace(x_bcb_desc_completa,chr(34),"&#39;")
x_bcb_desc_completa = replace(x_bcb_desc_completa,"<p ","<div ")
x_bcb_desc_completa = replace(x_bcb_desc_completa,"</p>","</div>")
x_bcb_precio = Request.Form("x_bcb_precio")
x_bcb_status = Request.Form("x_bcb_status")
x_bcb_vigencia = Request.Form("x_bcb_vigencia")
x_bcb_criterio = Request.Form("x_bcb_criterio")
x_bcb_modifico = "sistemas"

if x_bcb_id = "" then
	'Inserta registro en la tabla "buzon_compras_bienes"
	strsql = "insert into" & vblf
	strsql = strsql & "buzon_compras_bienes" & vblf
	strsql = strsql & "(" & vblf
	strsql = strsql & " bcb_sku" & vblf
	strsql = strsql & ",bcb_desc_corta" & vblf
	strsql = strsql & ",bcb_desc_completa" & vblf
	strsql = strsql & ",bcb_precio" & vblf
	strsql = strsql & ",bcb_status" & vblf
	strsql = strsql & ",bcb_vigencia" & vblf
	strsql = strsql & ",bcb_criterio_venta" & vblf
	strsql = strsql & ",bcb_modifico" & vblf
	strsql = strsql & ")" & vblf
	strsql = strsql & "values" & vblf
	strsql = strsql & "(" & vblf
	strsql = strsql & " '" & x_bcb_sku & "'" & vblf
	strsql = strsql & ",'" & x_bcb_desc_corta & "'" & vblf
	strsql = strsql & ",'" & x_bcb_desc_completa & "'" & vblf
	strsql = strsql & "," & x_bcb_precio & vblf
	strsql = strsql & ",'" & x_bcb_status & "'" & vblf
	strsql = strsql & ",'" & x_bcb_vigencia & "'" & vblf
	strsql = strsql & ",'" & x_bcb_criterio & "'" & vblf
	strsql = strsql & ",'" & x_bcb_modifico & "'" & vblf
	strsql = strsql & ")" & vblf
else
	'Actualiza registro en la tabla "buzon_compras_bienes"
	strsql = "update" & vblf
	strsql = strsql & "buzon_compras_bienes" & vblf
	strsql = strsql & "set" & vblf
	strsql = strsql & " bcb_sku = '" & x_bcb_sku & "'" & vblf
	strsql = strsql & ",bcb_desc_corta = '" & x_bcb_desc_corta & "'" & vblf
	strsql = strsql & ",bcb_desc_completa = '" & x_bcb_desc_completa & "'" & vblf
	strsql = strsql & ",bcb_precio = '" & x_bcb_precio & "'" & vblf
	strsql = strsql & ",bcb_status = '" & x_bcb_status & "'" & vblf
	strsql = strsql & ",bcb_vigencia = '" & x_bcb_vigencia & "'" & vblf
	strsql = strsql & ",bcb_criterio_venta = '" & x_bcb_criterio & "'" & vblf
	strsql = strsql & ",bcb_modifico = '" & x_bcb_modifico & "'" & vblf
	strsql = strsql & ",bcb_time_stamp = getdate()" & vblf
	strsql = strsql & "where" & vblf
	strsql = strsql & "bcb_id = " & x_bcb_id & vblf
end if
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

Response.Redirect "bienes.asp"
%>
