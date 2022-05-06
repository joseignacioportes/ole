<!--#include file="global_header.asp"-->
<%x_encabezado = "Solicitud de Compra"%>
<!--#include file="header.asp"-->

<%
'Asignación de valores a variables
x_bcb_id = Request.QueryString("item")

'Obtiene la información de los bienes
strsql = "select * from buzon_compras_bienes where bcb_id = " & x_bcb_id & vblf
'Response.Write replace(strsql,vblf,"<br>")
'Response.End

'Open Connection to the database
set conn = Server.CreateObject("ADODB.Connection")
conn.Open xDb_CHSAPPS_Conn_Str

set rs = conn.Execute(strsql)

if rs.eof = false then
	rs.movefirst
	x_bcb_sku = trim(rs("bcb_sku"))
	x_bcb_desc_corta = trim(rs("bcb_desc_corta"))
	x_bcb_desc_completa = trim(rs("bcb_desc_completa"))
	x_bcb_desc_completa = replace(x_bcb_desc_completa,"&#39;",chr(34))
	x_bcb_precio = formatcurrency(rs("bcb_precio"),2) & " MXN"
	x_bcb_vigencia = trim(rs("bcb_vigencia"))
end if
%>

<script type="text/javascript">
function valida_formulario()
{
	var num_emp = document.getElementById("x_num_emp").value;
	
	if(num_emp == "")
	{
		alert("Favor de ingresar su Número de Empleado");
		frm_busqueda.x_num_emp.focus();
	}
	else
	{
		frm_busqueda.submit();
	}
}
</script>

<form id="frm_busqueda" name="frm_busqueda" action="solicitud.asp" method="post">
	<input type="hidden" id="x_bcb_id" name="x_bcb_id" value="<%=x_bcb_id%>">
	<input type="hidden" id="x_bcb_desc_corta" name="x_bcb_desc_corta" value="<%=x_bcb_desc_corta%>">
	<input type="hidden" id="x_bcb_display" name="x_bcb_display" value="<%=x_bcb_desc_corta & " / " & x_bcb_precio%>">

	<table border="0" cellspacing="0" cellpadding="4" align="center">
		<tr>
			<td><font face="arial" size="2"><b>Ingrese su Número de Empleado:</b></font></td>
			<td nowrap><input type="text" id="x_num_emp" name="x_num_emp" size="7"></td>
			<td align="left" nowrap><a href="javascript:valida_formulario();" title="buscar"><img src="images/buscar.png" border="0"></a></td>
		</tr>
	</table>
	
	<br>
	
	<table border=0 align="center" width="600">
		<tr>
			<td colspan="2"><font face="arial" size="2"><b>Estoy interesado en comprar:</b></font></td>
		</tr>
		<tr bgcolor="<%=titulos_bgcolor%>">
			<td align="center" colspan="2"><font face="arial" size="2" color="white"><b><%=x_bcb_sku%>::<%=x_bcb_desc_corta%></b></font></td>
		</tr>
		<tr bgcolor="<%=bgcolor%>">
			<td align="center">
			<font face="arial" size="3"><b><%=x_bcb_precio%></b></font>
			<br>
			<font face="arial" size="2">Vigencia:<%=x_bcb_vigencia%></b></font>
			</td>
			<td>
			<font face="arial" size="2"><%=x_bcb_desc_completa%></font>
			</td>
		</tr>
	</table>
</form>

<!--#include file="footer.asp"-->
