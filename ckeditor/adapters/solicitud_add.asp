<!--#include file="global_header.asp"-->
<%
'Asigna valores a variables
x_num_emp = Request.Form("x_num_emp2")
x_nombre_emp = Request.Form("x_nombre_emp")
x_puesto_emp = Request.Form("x_puesto_emp")
x_departamento_emp = Request.Form("x_departamento_emp")
x_gerencia_emp = Request.Form("x_gerencia_emp")
x_bcb_id = Request.Form("x_bcb_id")
x_bce_bien = Request.Form("x_bce_bien")
x_descripcion_compra = Request.Form("x_descripcion_compra")

'Obtiene la información del Bien seleccionado
strsql = "select top 1 bcb_id,bcb_sku,bcb_precio from buzon_compras_bienes where bcb_desc_corta = '" & x_bce_bien & "'" & vblf
'Response.Write replace(strsql,vblf,"<br>")
'Response.End

'Open Connection to the database
set conn = Server.CreateObject("ADODB.Connection")
conn.Open xDb_CHSAPPS_Conn_Str

set rs = conn.execute(strsql)

if rs.eof = false then
	x_bcb_id = rs("bcb_id")
	x_bcb_sku = trim(rs("bcb_sku"))
	x_bcb_precio = rs("bcb_precio")
end if

'Cierra y destruye objetos
set rs = nothing

'Inserta registro en la tabla ""
strsql = "insert into" & vblf
strsql = strsql & "buzon_compras_empleados" & vblf
strsql = strsql & "(" & vblf
strsql = strsql & " bcb_id" & vblf
strsql = strsql & ",bce_emp_numero" & vblf
strsql = strsql & ",bce_emp_nombre" & vblf
strsql = strsql & ",bce_emp_puesto" & vblf
strsql = strsql & ",bce_emp_depto" & vblf
strsql = strsql & ",bce_emp_gerencia" & vblf
strsql = strsql & ",bce_bien" & vblf
strsql = strsql & ",bce_precio" & vblf
strsql = strsql & ",bce_desc_compra" & vblf
strsql = strsql & ")" & vblf
strsql = strsql & "values" & vblf
strsql = strsql & "(" & vblf
strsql = strsql & x_bcb_id & vblf
strsql = strsql & ",'" & x_num_emp & "'" & vblf
strsql = strsql & ",'" & x_nombre_emp & "'" & vblf
strsql = strsql & ",'" & x_puesto_emp & "'" & vblf
strsql = strsql & ",'" & x_departamento_emp & "'" & vblf
strsql = strsql & ",'" & x_gerencia_emp & "'" & vblf
strsql = strsql & ",'" & x_bce_bien & "'" & vblf
strsql = strsql & "," & x_bcb_precio & vblf
strsql = strsql & ",'" & x_descripcion_compra & "'" & vblf
strsql = strsql & ")" & vblf
'Response.Write replace(strsql,vblf,"<br>")
'Response.End

'Ejecuta comando DML
conn.execute(strsql)

'Cierra y destruye objetos
conn.close
set conn = nothing


'Envia notificación de compra
strSubject = "Sistema Compras de Bienes::Solicitud::Item ID:" & x_bcb_id
strTo = "aperez@hospitalsatelite.com"
strCC = ""
strBCC = "mramos@hospitalsatelite.com"

'Arma el cuerpo del mensaje
strTextBody = "<font face=arial size=2>Se ha registgrado una solicitud de compra con la siguiente información</font>" & vbLf
strTextBody = strTextBody & "<br><br>" & vbLf
strTextBody = strTextBody & "<table border=1 cellpadding=3>" & vbLf
strTextBody = strTextBody & "<tr>" & vbLf
strTextBody = strTextBody & "<td><font face=arial size=2><b>Colaborador:</b></font></td>" & vbLf
strTextBody = strTextBody & "<td><font face=arial size=2>" & x_num_emp & "-" & x_nombre_emp & "</font></td>" & vbLf
strTextBody = strTextBody & "</tr>" & vbLf
strTextBody = strTextBody & "<tr>" & vbLf
strTextBody = strTextBody & "<td><font face=arial size=2><b>Puesto:</b></font></td>" & vbLf
strTextBody = strTextBody & "<td><font face=arial size=2>" & x_puesto_emp & "</font></td>" & vbLf
strTextBody = strTextBody & "</tr>" & vbLf
strTextBody = strTextBody & "<tr>" & vbLf
strTextBody = strTextBody & "<td><font face=arial size=2><b>Departamento:</b></font></td>" & vbLf
strTextBody = strTextBody & "<td><font face=arial size=2>" & x_departamento_emp & "</font></td>" & vbLf
strTextBody = strTextBody & "</tr>" & vbLf
strTextBody = strTextBody & "<tr>" & vbLf
strTextBody = strTextBody & "<td><font face=arial size=2><b>Gerencia:</b></font></td>" & vbLf
strTextBody = strTextBody & "<td><font face=arial size=2>" & x_gerencia_emp & "</font></td>" & vbLf
strTextBody = strTextBody & "</tr>" & vbLf
strTextBody = strTextBody & "<tr>" & vbLf
strTextBody = strTextBody & "<td><font face=arial size=2><b>Bien:</b></font></td>" & vbLf
strTextBody = strTextBody & "<td><font face=arial size=2>" & x_bcb_sku & " " & x_bce_bien & " " & x_bcb_precio & "</font></td>" & vbLf
strTextBody = strTextBody & "</tr>" & vbLf
strTextBody = strTextBody & "<tr>" & vbLf
strTextBody = strTextBody & "<td><font face=arial size=2><b>Comentarios:</b></font></td>" & vbLf
strTextBody = strTextBody & "<td><font face=arial size=2>" & x_descripcion_compra & "</font></td>" & vbLf
strTextBody = strTextBody & "</tr>" & vbLf
strTextBody = strTextBody & "</table>" & vbLf
strTextBody = strTextBody & "<br><br>" & vbLf
strTextBody = strTextBody & "<font face=arial size=2><a href='#'>Clic</a> para ir al sistema.</font>" & vbLf
%>
<!--#include file="envia_email_interno.asp"-->
<%
Response.Redirect "solicitud.asp?key=" & x_num_emp
%>
