<!--#include file="global_header.asp"-->
<%x_encabezado = "Sorteo de Bienes"%>
<!--#include file="header.asp"-->

<script type="text/javascript">
function valida_formulario()
{
	var num_emp = document.getElementById("x_bce_bien").value;
	
	if(num_emp == "")
	{
		alert("Favor de seleccionar un Bien");
		frm_busqueda_bien.x_bce_bien.focus();
	}
	else
	{
		frm_busqueda_bien.submit();
	}
}
</script>

<form id="frm_busqueda_bien" name="frm_busqueda_bien" action="sorteo_bienes.asp" method="post">
	<table border="0" cellspacing="0" cellpadding="4" align="center">
		<tr>
			<td><font face="arial" size="2"><b>Bien:</b></font></td>
			<td>
			<!--#include file="bienes_select.asp"-->
			</td>
			<td align="left"><input type="button" id="btn_sortea" value="Realiza Sorteo Aleatorio" onclick="valida_formulario();"></td>
		</tr>
	</table>
</form>

<%
'Asigna valores a variables
x_bce_bien = Request.Form("x_bce_bien")

if x_bce_bien <> "" then
	'Obtiene la información del Bien seleccionado para realizar el sorteo
	strsql = "select *" & vblf
	strsql = strsql & "from" & vblf
	strsql = strsql & "buzon_compras_empleados" & vblf
	strsql = strsql & "left outer join" & vblf
	strsql = strsql & "(select bcb_id,bcb_criterio_venta from buzon_compras_bienes) as buzon_compras_bienes" & vblf
	strsql = strsql & "on" & vblf
	strsql = strsql & "buzon_compras_empleados.bcb_id = buzon_compras_bienes.bcb_id" & vblf
	strsql = strsql & "where" & vblf
	strsql = strsql & "buzon_compras_empleados.bce_bien = '" & x_bce_bien & "'" & vblf
	strsql = strsql & "and" & vblf
	strsql = strsql & "buzon_compras_empleados.bce_emp_numero in (select num_empleado from empleados_chs where nivel_estructura)" & vblf
	'Response.Write replace(strsql,vblf,"<br>")
	'Response.End

	'Open Connection to the database
	set conn = Server.CreateObject("ADODB.Connection")
	conn.Open xDb_CHSAPPS_Conn_Str
	
	'Crea Recodrset
	set rs = Server.CreateObject("ADODB.Recordset")
	rs.Open strsql,conn, 3

	if rs.eof = true then
		Response.Write "<table boder=0 align=center>"
		Response.Write "<tr><td><font face='arial' size='2'>No se encontró ninguna solicitud de compra para el bien '" & x_bce_bien & "' con el criterio de venta definido<br>en la tabla 'buzon_compras_empleados'.</font></td></tr>"
		Response.Write "<tr><td>&nbsp;</td></tr>"
		Response.Write "<tr><td><a href='javascript:history.back()'><img src='images/BotonRegresar.png' border=0></a></td></tr>"
		Response.Write "</table>"
	else
		x_Number_Of_Records = rs.recordcount
		'Coloca el cursor en el primer registro
		rs.movefirst
		
		'Asigna valores a variables
		x_bce_id = rs("bce_id")

		'Genera el ID Random
		Dim x_rndID
		Randomize Timer
		x_rndID = Int(RND * x_Number_Of_Records)
		'Coloca el cursor en el registro random
		rs.Move x_rndID
		x_bce_id_random = rs("bce_id")
		
		'Coloca el cursor en el primer registro
		rs.movefirst	
		%>
		<table border=0 align="center">
		<tr bgcolor="<%=titulos_bgcolor%>">
		<td align="center" colspan="9"><font face="arial" size="2" color="white">Resultado del Sorteo Aleatorio</font></td>
		</tr>
		<tr bgcolor="<%=titulos_bgcolor%>">
		<td align="center"><font face="arial" size="2" color="white">Num Emp</font></td>
		<td align="center"><font face="arial" size="2" color="white">Nombre</font></td>
		<td align="center"><font face="arial" size="2" color="white">Puesto</font></td>
		<td align="center"><font face="arial" size="2" color="white">Departmento</font></td>
		<td align="center"><font face="arial" size="2" color="white">Gerencia</font></td>
		<td align="center"><font face="arial" size="2" color="white">Bien</font></td>
		<td align="center"><font face="arial" size="2" color="white">Precio</font></td>
		<td align="center"><font face="arial" size="2" color="white">Desc Compra</font></td>
		<td align="center"><font face="arial" size="2" color="white">Fecha/Hora</font></td>
		</tr>
		<%
		recCount = 0
		do while rs.eof = false
			'Display alternate color for rows
			If recCount Mod 2 <> 0 Then
				bgcolor="#F5F5F5"
			else
				bgcolor="#FFFFFF"
			End If
					
			'Asigna valores a variables
			x_bce_id = rs("bce_id")
			if x_bce_id = x_bce_id_random then bgcolor="#fbbc05"
			x_numero_emp = rs("bce_emp_numero")
			x_nombre_emp = trim(rs("bce_emp_nombre"))
			x_puesto_emp = trim(rs("bce_emp_puesto"))
			x_departamento_emp = trim(rs("bce_emp_depto"))
			x_gerencia_emp = trim(rs("bce_emp_gerencia"))
			x_bce_bien = trim(rs("bce_bien"))
			x_bce_precio= rs("bce_precio")
			if isnull(x_bce_precio) then
				x_bce_precio = "$0.00"
			else
				x_bce_precio= formatcurrency(rs("bce_precio"),2)
			end if
			x_desc_compra = trim(rs("bce_desc_compra"))
			x_bce_time_stamp = trim(rs("bce_time_stamp"))
			%>
			<tr bgcolor="<%=bgcolor%>">
			<td align="center"><font face="arial" size="2"><%=x_numero_emp%></font></td>
			<td><font face="arial" size="2"><%=x_nombre_emp%></font></td>
			<td><font face="arial" size="2"><%=x_puesto_emp%></font></td>
			<td><font face="arial" size="2"><%=x_departamento_emp%></font></td>
			<td><font face="arial" size="2"><%=x_gerencia_emp%></font></td>
			<td><font face="arial" size="2"><%=x_bce_bien%></font></td>
			<td align="right"><font face="arial" size="2"><%=x_bce_precio%></font></td>
			<td><font face="arial" size="2"><%=x_desc_compra%></font></td>
			<td><font face="arial" size="2"><%=x_bce_time_stamp%></font></td>
			</tr>
			<%
			recCount = recCount + 1
			rs.movenext
		loop
		%>
		</table>
		<%
	end if

	'Cierra y destruye objetos
	rs.close
	set rs = nothing

	'Actualiza el status del Bien a "Vendido"
	strsql = "update buzon_compras_bienes set bcb_status = 'Vendido' where bcb_desc_corta = '" & x_bce_bien & "'"
	'Response.Write replace(strsql,vblf,"<br>")
	'Response.End
	
	'Ejecuta comando DML
	conn.execute(strsql)

	'Obtiene la información del Bien y del Ganador
	strsql = "select * from buzon_compras_empleados where bce_id = " & x_bce_id_random
	'Response.Write replace(strsql,vblf,"<br>")
	'Response.End

	set rs = conn.execute(strsql)

	if rs.eof = false then
		rs.movefirst
		x_bce_id = rs("bce_id")
		x_bce_emp_numero = trim(rs("bce_emp_numero"))
		x_bce_emp_nombre = trim(rs("bce_emp_nombre"))
		x_bce_emp_puesto = trim(rs("bce_emp_puesto"))
		x_bce_emp_depto = trim(rs("bce_emp_depto"))
		x_bce_emp_gerencia = trim(rs("bce_emp_gerencia"))
		x_bce_bien = trim(rs("bce_bien"))
		x_bce_precio = trim(rs("bce_precio"))
		x_bce_desc_compra = trim(rs("bce_desc_compra"))
		x_bce_time_stamp = rs("bce_time_stamp")
	end if

	'Cierra y destruye objetos
	set rs = nothing
	conn.close
	set conn = nothing

	'Envia notificación del ganador
	strSubject = "Sistema Compras de Bienes::Ganador::Item:" & x_bce_bien
	strTo = "aperez@hospitalsatelite.com"
	strCC = ""
	strBCC = "mramos@hospitalsatelite.com"

	'Arma el cuerpo del mensaje
	strTextBody = "<font face=arial size=2>Se ha determinado al <u><b>GANADOR</b></u> de compra con la siguiente información</font>" & vbLf
	strTextBody = strTextBody & "<br><br>" & vbLf
	strTextBody = strTextBody & "<table border=1 cellpadding=3>" & vbLf
	strTextBody = strTextBody & "<tr>" & vbLf
	strTextBody = strTextBody & "<td><font face=arial size=2><b>Colaborador:</b></font></td>" & vbLf
	strTextBody = strTextBody & "<td><font face=arial size=2>" & x_bce_emp_numero & "-" & x_bce_emp_nombre & "</font></td>" & vbLf
	strTextBody = strTextBody & "</tr>" & vbLf
	strTextBody = strTextBody & "<tr>" & vbLf
	strTextBody = strTextBody & "<td><font face=arial size=2><b>Puesto:</b></font></td>" & vbLf
	strTextBody = strTextBody & "<td><font face=arial size=2>" & x_bce_emp_puesto & "</font></td>" & vbLf
	strTextBody = strTextBody & "</tr>" & vbLf
	strTextBody = strTextBody & "<tr>" & vbLf
	strTextBody = strTextBody & "<td><font face=arial size=2><b>Departamento:</b></font></td>" & vbLf
	strTextBody = strTextBody & "<td><font face=arial size=2>" & x_bce_emp_depto & "</font></td>" & vbLf
	strTextBody = strTextBody & "</tr>" & vbLf
	strTextBody = strTextBody & "<tr>" & vbLf
	strTextBody = strTextBody & "<td><font face=arial size=2><b>Gerencia:</b></font></td>" & vbLf
	strTextBody = strTextBody & "<td><font face=arial size=2>" & x_bce_emp_gerencia & "</font></td>" & vbLf
	strTextBody = strTextBody & "</tr>" & vbLf
	strTextBody = strTextBody & "<tr>" & vbLf
	strTextBody = strTextBody & "<td><font face=arial size=2><b>Bien:</b></font></td>" & vbLf
	strTextBody = strTextBody & "<td><font face=arial size=2>" & x_bce_bien & " " & x_bce_precio & "</font></td>" & vbLf
	strTextBody = strTextBody & "</tr>" & vbLf
	strTextBody = strTextBody & "<tr>" & vbLf
	strTextBody = strTextBody & "<td><font face=arial size=2><b>Comentarios:</b></font></td>" & vbLf
	strTextBody = strTextBody & "<td><font face=arial size=2>" & x_bce_desc_compra & "</font></td>" & vbLf
	strTextBody = strTextBody & "</tr>" & vbLf
	strTextBody = strTextBody & "</table>" & vbLf
	strTextBody = strTextBody & "<br><br>" & vbLf
	strTextBody = strTextBody & "<font face=arial size=2>Favor de comunicar al colaborador y realizar las actividades respectivas.</font>" & vbLf
	%>
	<!--#include file="envia_email_interno.asp"-->
	<%
end if
%>

<!--#include file="footer.asp"-->