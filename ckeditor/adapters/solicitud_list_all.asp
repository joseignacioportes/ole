<!--#include file="global_header.asp"-->
<%x_encabezado = "Todas las Solicitudes de Compra"%>
<!--#include file="header.asp"-->

<script type="text/javascript">
function valida_formulario()
{
	var x_bien = document.getElementById("x_bce_bien").value;
	
	if(x_bien == "")
	{
		alert("Favor de ingresar el Bien");
		frm_busqueda_bien.x_bce_bien.focus();
	}
	else
	{
		frm_busqueda_bien.submit();
	}
}
</script>

<form id="frm_busqueda_bien" name="frm_busqueda_bien" action="solicitud_list_all.asp" method="post">
	<table border="0" cellspacing="0" cellpadding="4" align="center">
		<tr>
			<td><font face="arial" size="2"><b>Bien:</b></font></td>
			<td>
			<!--#include file="bienes_select.asp"-->
			</td>
			<td align="left" nowrap><a href="javascript:valida_formulario();" title="buscar"><img src="images/view.gif" border="0"></a></td>
		</tr>
	</table>
</form>

<%
'Asigna valores a variables
x_bce_bien = Request.Form("x_bce_bien")

'Verifica si el formulario se a sumitido
if x_bce_bien <> "" then
	'Obtiene la información del empleado correspondiente
	strsql = "select" & vblf
	strsql = strsql & " bce_emp_numero" & vblf
	strsql = strsql & ",bce_emp_nombre" & vblf
	strsql = strsql & ",bce_emp_puesto" & vblf
	strsql = strsql & ",bce_emp_depto" & vblf
	strsql = strsql & ",bce_emp_gerencia" & vblf
	strsql = strsql & ",bce_bien" & vblf
	strsql = strsql & ",bce_precio" & vblf
	strsql = strsql & ",bce_desc_compra" & vblf
	strsql = strsql & ",bce_time_stamp" & vblf
	strsql = strsql & "from" & vblf
	strsql = strsql & "buzon_compras_empleados" & vblf
	strsql = strsql & "where" & vblf
	strsql = strsql & "bce_bien = '" & x_bce_bien & "'" & vblf
	strsql = strsql & "order by" & vblf
	strsql = strsql & "bce_time_stamp desc" & vblf
	'Response.Write replace(strsql,vblf,"<br>")
	'Response.End

	'Open Connection to the database
	set conn = Server.CreateObject("ADODB.Connection")
	conn.Open xDb_CHSAPPS_Conn_Str

	set rs = conn.Execute(strsql)
	
	if rs.eof then
		set rs = nothing
		conn.close
		Set conn = nothing
		Response.Write "<table boder=0 align=center>"
		Response.Write "<tr><td><font face='arial' size='2'>No se encontró ninguna solicitud de compra para el bien '" & x_bce_bien & "'<br>en la tabla 'buzon_compras_empleados'.</font></td></tr>"
		Response.Write "<tr><td>&nbsp;</td></tr>"
		Response.Write "<tr><td><a href='javascript:history.back()'><img src='images/BotonRegresar.png' border=0></a></td></tr>"
		Response.Write "</table>"
		Response.End
	else
		rs.movefirst
		%>
		<table border=0 align="center">
		<tr bgcolor="<%=titulos_bgcolor%>">
		<td align="center" colspan="9"><font face="arial" size="2" color="white">Historico de Solicitudes</font></td>
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
	set rs = nothing
	conn.close
	set conn = nothing
end if
%>

<!--#include file="footer.asp"-->