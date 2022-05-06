<!--#include file="global_header.asp"-->
<%x_encabezado = "Solicitud de Compra"%>
<!--#include file="header.asp"-->
<%
'Asigna valores a variables
x_num_emp = Request.QueryString("key")
if x_num_emp = "" then
	x_num_emp = Request.Form("x_num_emp")
	x_bcb_id = Request.Form("x_bcb_id")
	x_bcb_desc_corta = Request.Form("x_bcb_desc_corta")
	x_bcb_display = Request.Form("x_bcb_display")
	x_confirmacion_envio = 0
else
	x_confirmacion_envio = 1
end if

'Obtiene la información de los empleados
strsql = "select" & vblf
strsql = strsql & " num_empleado" & vblf
strsql = strsql & ",nombre_completo2" & vblf
strsql = strsql & ",puesto" & vblf
strsql = strsql & ",departamento" & vblf
strsql = strsql & ",gerencia" & vblf
strsql = strsql & "from" & vblf
strsql = strsql & "empleados_chs" & vblf
strsql = strsql & "where" & vblf
strsql = strsql & "num_empleado = " & x_num_emp & vblf
strsql = strsql & "and estatus in (1,3)" & vblf
strsql = strsql & "order by" & vblf
strsql = strsql & "num_empleado" & vblf
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
	Response.Write "<tr><td><font face='arial' size='2'>No se encontró el empleado " & x_num_emp & " en la tabla 'empleados_chs'.</font></td></tr>"
	Response.Write "<tr><td>&nbsp;</td></tr>"
	Response.Write "<tr><td><a href='javascript:history.back()'><img src='images/BotonRegresar.png' border=0></a></td></tr>"
	Response.Write "</table>"
	Response.End
else
	rs.movefirst
	x_nombre_emp = trim(rs("nombre_completo2"))
	x_puesto_emp = trim(rs("puesto"))
	x_departamento_emp = trim(rs("departamento"))
	x_gerencia_emp = trim(rs("gerencia"))
end if

'Cierra y destruye objetos
set rs = nothing
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

<%
if x_confirmacion_envio = 0 then
%>
	<form id="frm_busqueda" name="frm_busqueda" action="solicitud.asp" method="post">
		<table border="0" cellspacing="0" cellpadding="4" align="center">
			<tr>
				<td><font face="arial" size="2"><b>Número Empleado:</b></font></td>
				<td nowrap><input type="text" id="x_num_emp" name="x_num_emp" size="7" value="<%=x_num_emp%>"></td>
				<td align="left" nowrap><a href="javascript:valida_formulario();"><img src="images/buscar.png" border="0"></a></td>
			</tr>
		</table>
	</form>

	<form id="frm_sol_compra" name="frm_sol_compra" action="solicitud_add.asp" method="post">
		<input type="hidden" id="x_num_emp2" name="x_num_emp2" value="<%=x_num_emp%>">
		<input type="hidden" id="x_bce_bien" name="x_bce_bien" value="<%=x_bcb_desc_corta%>">
		<input type="hidden" id="x_bcb_id" name="x_bcb_id value="<%=x_bcb_id%>">
		
		<table border="0" cellspacing="0" cellpadding="4" align="center" bgcolor="#eeeeee">
			<tr>
				<td><font face="arial" size="2"><b>Empleado:</b></font></td>
				<td colspan="2">
				<font face="arial" size="2"><%=x_nombre_emp%></font>
				<input type="hidden" id="x_nombre_emp" name="x_nombre_emp" value="<%=x_nombre_emp%>">
				</td>
			</tr>
			<tr>
				<td><font face="arial" size="2"><b>Puesto:</b></font></td>
				<td colspan="2">
				<font face="arial" size="2"><%=x_puesto_emp%></font>
				<input type="hidden" id="x_puesto_emp" name="x_puesto_emp" value="<%=x_puesto_emp%>">
				</td>
			</tr>
			<tr>
				<td><font face="arial" size="2"><b>Departamento:</b></font></td>
				<td colspan="2">
				<font face="arial" size="2"><%=x_departamento_emp%></font>
				<input type="hidden" id="x_departamento_emp" name="x_departamento_emp" value="<%=x_departamento_emp%>">
				</td>
			</tr>
			<tr>
				<td><font face="arial" size="2"><b>Gerencia:</b></font></td>
				<td colspan="2">
				<font face="arial" size="2"><%=x_gerencia_emp%></font>
				<input type="hidden" id="x_gerencia_emp" name="x_gerencia_emp" value="<%=x_gerencia_emp%>">
				</td>
			</tr>
			<tr>
				<td><font face="arial" size="2"><b>Bien a comprar:</b></font></td>
				<td colspan="2">
				<font face="arial" size="2"><%=x_bcb_display%></font>
				</td>
			</tr>
			<tr>
				<td><font face="arial" size="2"><b>Observaciones:</b></font></td>
			</tr>
			<tr>
				<td colspan="3"><textarea class="formated_txtarea" id="x_descripcion_compra" name="x_descripcion_compra"></textarea></td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr align="center"><td colspan="2"><input type="submit" id="btn_guardar" value="Enviar Solicitud"></td></tr>
		</table>
	</form>
<%
else
%>
	<table border="0" cellspacing="0" cellpadding="3" align="center">
		<tr>
			<td><img src="images/green_check.png" border="0"></td>
			<td>
			<font face="arial" size="2">
			Tu solicitud de compra ha sido enviada satisfactoriamente al personal correspondiente.
			<br>
			Se comunicará al ganador en cuanto se realice el sorteo.
			</font>
			</td>
		</tr>
		<tr>
			<td align="center" colspan="2"><a href="bienes_activos_list.asp"><font face="arial" size="2">Listado de Bienes Activos</font></a></td>
		</tr>
	</table>
<%
end if
%>
<!--#include file="solicitud_list.asp"-->
<!--#include file="footer.asp"-->
