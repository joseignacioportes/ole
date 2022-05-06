<script type="text/javascript">
function edita_bien(item)
{
	var x_bcb_precio = document.getElementById('x_bcb_precio' + item).value;
	var y_bcb_precio = x_bcb_precio.replace("$", "");
	var z_bcb_precio = y_bcb_precio.replace(",", "");

	document.getElementById('x_bcb_id').value = document.getElementById('x_bcb_id' + item).value;
	document.getElementById('x_bcb_sku').value = document.getElementById('x_bcb_sku' + item).value;
	document.getElementById('x_bcb_desc_corta').value = document.getElementById('x_bcb_desc_corta' + item).value;
	CKEDITOR.instances.x_bcb_desc_completa.setData(document.getElementById('x_bcb_desc_completa' + item).value);	
	document.getElementById('x_bcb_precio').value = z_bcb_precio
	document.getElementById('x_bcb_status').value = document.getElementById('x_bcb_status' + item).value;
	document.getElementById('x_bcb_vigencia').value = document.getElementById('x_bcb_vigencia' + item).value;
	document.getElementById('x_bcb_criterio').value = document.getElementById('x_bcb_criterio' + item).value;
}


function borra_bien(item)
{
	var r = confirm("¿Está seguro que desea borrar el Bien ID: " + item + "?. No podrá deshacer el cambio.");

	if (r == true)
	{
		location.href="./bienes_delete.asp?key=" + item;
	}	
}
</script>

<%
'Asigna valores a variables
x_bce_bien = Request.Form("x_bce_bien")

'Obtiene la información de los bienes
strsql = "select" & vblf
strsql = strsql & " bcb_id" & vblf
strsql = strsql & ",bcb_sku" & vblf
strsql = strsql & ",bcb_desc_corta" & vblf
strsql = strsql & ",bcb_desc_completa" & vblf
strsql = strsql & ",bcb_precio" & vblf
strsql = strsql & ",bcb_status" & vblf
strsql = strsql & ",bcb_vigencia" & vblf
strsql = strsql & ",bcb_modifico" & vblf
strsql = strsql & ",bcb_time_stamp" & vblf
strsql = strsql & "from" & vblf
strsql = strsql & "buzon_compras_bienes" & vblf
if x_bce_bien <> "" then
	strsql = strsql & "where" & vblf
	strsql = strsql & "bcb_desc_corta = '" & x_bce_bien & "'" & vblf
end if
strsql = strsql & "order by" & vblf
strsql = strsql & "bcb_time_stamp desc" & vblf
'Response.Write replace(strsql,vblf,"<br>")
'Response.End

'Open Connection to the database
set conn = Server.CreateObject("ADODB.Connection")
conn.Open xDb_CHSAPPS_Conn_Str

set rs = conn.Execute(strsql)

if rs.eof = false then
	rs.movefirst
	%>
	
	<table border=0 align="center">
	<tr bgcolor="<%=titulos_bgcolor%>">
	<td align="center" colspan="10"><font face="arial" size="2" color="white">Bienes para Venta</font></td>
	</tr>
	<tr bgcolor="<%=titulos_bgcolor%>">
	<td colspan="2">&nbsp;</td>
	<td align="center"><font face="arial" size="2" color="white">ID</font></td>
	<td align="center"><font face="arial" size="2" color="white">Status</font></td>
	<td align="center"><font face="arial" size="2" color="white">SKU</font></td>
	<td align="center"><font face="arial" size="2" color="white">Descripción Corta</font></td>
	<td align="center"><font face="arial" size="2" color="white">Precio</font></td>
	<td align="center"><font face="arial" size="2" color="white">Vigencia</font></td>
	<td align="center"><font face="arial" size="2" color="white">Modificó</font></td>
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
				
		x_bcb_id = rs("bcb_id")
		x_bcb_sku = trim(rs("bcb_sku"))
		x_bcb_desc_corta = trim(rs("bcb_desc_corta"))
		x_bcb_desc_completa = trim(rs("bcb_desc_completa"))
		x_bcb_precio = formatcurrency(rs("bcb_precio"),2)
		x_bcb_status = trim(rs("bcb_status"))
		x_bcb_vigencia = trim(rs("bcb_vigencia"))
		x_bcb_modifico = trim(rs("bcb_modifico"))
		x_bcb_time_stamp = rs("bcb_time_stamp")
		%>

		<input type="hidden" id="x_bcb_id<%=recCount%>" name="x_bcb_id<%=recCount%>" value="<%=x_bcb_id%>">
		<input type="hidden" id="x_bcb_sku<%=recCount%>" name="x_bcb_sku<%=recCount%>" value="<%=x_bcb_sku%>">
		<input type="hidden" id="x_bcb_desc_corta<%=recCount%>" name="x_bcb_desc_corta<%=recCount%>" value="<%=x_bcb_desc_corta%>">
		<input type="hidden" id="x_bcb_desc_completa<%=recCount%>" name="x_bcb_desc_completa<%=recCount%>" value="<%=x_bcb_desc_completa%>">
		<input type="hidden" id="x_bcb_precio<%=recCount%>" name="x_bcb_precio<%=recCount%>" value="<%=x_bcb_precio%>">
		<input type="hidden" id="x_bcb_status<%=recCount%>" name="x_bcb_status<%=recCount%>" value="<%=x_bcb_status%>">
		<input type="hidden" id="x_bcb_vigencia<%=recCount%>" name="x_bcb_vigencia<%=recCount%>" value="<%=x_bcb_vigencia%>">
		<input type="hidden" id="x_bcb_criterio<%=recCount%>" name="x_bcb_criterio<%=recCount%>" value="<%=x_bcb_criterio%>">


		<tr bgcolor="<%=bgcolor%>">
		<td align="center"><a href="javascript:edita_bien(<%=recCount%>);" title="Edita Bien"><img src="images/writing.gif" border=0></a></td>
		<td align="center"><a href="javascript:borra_bien(<%=x_bcb_id%>);" title="Borra Bien"><img src="images/trash.gif" border=0></a></td>
		<td align="center"><font face="arial" size="2"><%=x_bcb_id%></font></td>
		<td><font face="arial" size="2"><%=x_bcb_status%></font></td>
		<td><font face="arial" size="2"><%=x_bcb_sku%></font></td>
		<td><font face="arial" size="2"><%=x_bcb_desc_corta%></font></td>
		<td align="center"><font face="arial" size="2"><%=x_bcb_precio%></font></td>
		<td align="center"><font face="arial" size="2"><%=x_bcb_vigencia%></font></td>
		<td align="center"><font face="arial" size="2"><%=x_bcb_modifico%></font></td>
		<td><font face="arial" size="2"><%=x_bcb_time_stamp%></font></td>
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