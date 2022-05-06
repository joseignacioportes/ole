<%
'Obtiene la información del empleado correspondiente
strsql = "select" & vblf
strsql = strsql & " bce_emp_numero" & vblf
strsql = strsql & ",bce_emp_nombre" & vblf
strsql = strsql & ",bce_emp_puesto" & vblf
strsql = strsql & ",bce_emp_depto" & vblf
strsql = strsql & ",bce_emp_gerencia" & vblf
strsql = strsql & ",bce_bien" & vblf
strsql = strsql & ",bce_desc_compra" & vblf
strsql = strsql & ",bce_time_stamp" & vblf
strsql = strsql & "from" & vblf
strsql = strsql & "buzon_compras_empleados" & vblf
strsql = strsql & "where" & vblf
strsql = strsql & "bce_emp_numero = " & x_num_emp & vblf
strsql = strsql & "order by" & vblf
strsql = strsql & "bce_time_stamp desc" & vblf
'Response.Write replace(strsql,vblf,"<br>")
'Response.End

set rs = conn.Execute(strsql)

if rs.eof = false then
	rs.movefirst
	%>
	
	<table border=0 align="center">
	<tr bgcolor="<%=titulos_bgcolor%>">
	<td align="center" colspan="8"><font face="arial" size="2" color="white">Historico de Solicitudes</font></td>
	</tr>
	<tr bgcolor="<%=titulos_bgcolor%>">
	<td align="center"><font face="arial" size="2" color="white">Num Emp</font></td>
	<td align="center"><font face="arial" size="2" color="white">Nombre</font></td>
	<td align="center"><font face="arial" size="2" color="white">Puesto</font></td>
	<td align="center"><font face="arial" size="2" color="white">Departmento</font></td>
	<td align="center"><font face="arial" size="2" color="white">Gerencia</font></td>
	<td align="center"><font face="arial" size="2" color="white">Bien</font></td>
	<td align="center"><font face="arial" size="2" color="white">Observaciones</font></td>
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
%>