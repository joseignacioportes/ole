<!--#include file="global_header.asp"-->
<%x_encabezado = "Administración de Bienes"%>
<!--#include file="header.asp"-->

<script language="JavaScript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript">
function busca_bien()
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


function valida_formulario()
{
	if (document.getElementById('x_bcb_sku').value == "")
	{
		alert("Favor de proporcionar el SKU / Actvo Fijo / Bien Controlable");
		document.getElementById('x_bcb_sku').focus();
	}
	else if (document.getElementById('x_bcb_desc_corta').value == "")
	{
		alert("Favor de proporcionar la Descripción Corta del Bien");
		document.getElementById('x_bcb_desc_corta').focus();
	}
	else if (document.getElementById('x_bcb_precio').value == "")
	{
		alert("Favor de proporcionar el Precio del Bien");
		document.getElementById('x_bcb_precio').focus();
	}
	else if (document.getElementById('x_bcb_status').value == "")
	{
		alert("Favor de proporcionar el Status del Bien");
		document.getElementById('x_bcb_status').focus();
	}
	else if (document.getElementById('x_bcb_vigencia').value == "")
	{
		alert("Favor de proporcionar la Vigencia del Bien en formato 'dd/mm/aaa'");
		document.getElementById('x_bcb_vigencia').focus();
	}
	else
	{
		frm_bienes.submit();
	}
}
</script>


<form id="frm_busqueda_bien" name="frm_busqueda_bien" action="bienes.asp" method="post">
	<table border="0" cellspacing="0" cellpadding="4" align="center">
		<tr>
			<td><font face="arial" size="2"><b>Bien:</b></font></td>
			<td>
			<!--#include file="bienes_select.asp"-->
			</td>
			<td><a href="javascript:busca_bien();" title="Buscar"><img src="images/view.gif" border="0"></a></td>
			<td><a href="bienes.asp" title="Mostrar Todos"><img src="images/mostrar_todos.png" border="0"></a></td>
			</td>
		</tr>
	</table>
</form>

<form id="frm_bienes" name="frm_bienes" action="bienes_add.asp" method="post">
	<input type="hidden" id="x_bcb_id" name="x_bcb_id" value="">
	
	<table border="0" cellspacing="0" cellpadding="4" align="center" bgcolor="#eeeeee">
		<tr>
			<td><font face="arial" size="2"><b>SKU / AF / BC:</b></font></td>
			<td colspan="2">
			<input type="text" id="x_bcb_sku" name="x_bcb_sku" value="" size="15" maxlength="20">
			</td>
		</tr>
		<tr>
			<td><font face="arial" size="2"><b>Descripción Corta:</b></font></td>
			<td colspan="2"><input type="text" id="x_bcb_desc_corta" name="x_bcb_desc_corta" value="" size="60" maxlength="100" placeholder="100 caracteres max."></td>
		</tr>
		<tr>
			<td><font face="arial" size="2"><b>Descripción Completa:</b></font></td>
		</tr>
		<tr>
			<td colspan="3"><textarea id="x_bcb_desc_completa" name="x_bcb_desc_completa" placeholder="Describir todas las características del Bien."></textarea></td>
		</tr>
		<tr>
			<td><font face="arial" size="2"><b>Precio:</b></font></td>
			<td colspan="2">
			<input type="text" id="x_bcb_precio" name="x_bcb_precio" value="" size="10">
			&nbsp;
			<font face="arial" size="2">Sin signo ni comas</font>
			</td>
		</tr>
		<tr>
			<td><font face="arial" size="2"><b>Status:</b></font></td>
			<td colspan="2">
			<select id="x_bcb_status" name="x_bcb_status">
			<option value="Activo">Activo</option>
			<option value="Cancelado">Cancelado</option>
			<option value="Vendido">Vendido</option>
			</select>
			</td>
		</tr>
		<tr>
			<td><font face="arial" size="2"><b>Vigencia:</b></font></td>
			<td colspan="2">
			<input type="text" id="x_bcb_vigencia" name="x_bcb_vigencia" value="" size="9" maxlength="10" placeholder="dd/mm/aaaa">
			&nbsp;
			<font face="arial" size="2">23:59:59 hrs.</font>
			</td>
		</tr>
		<tr>
			<td><font face="arial" size="2"><b>Criterio de venta:</b></font></td>
			<td colspan="2">
			<select id="x_bcb_criterio" name="x_bcb_criterio">
			<option value=2>Sólo N3</option>
			<option value=1>Aplica para Todos</option>
			</select>
			</td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr align="center"><td colspan="2"><input type="button" id="btn_guardar" value="Guardar" onclick="valida_formulario();"></td></tr>
	</table>
</form>

<script>
    // Replace the textarea id with a CKEditor
    CKEDITOR.replace( 'x_bcb_desc_completa' );
</script>

<!--#include file="bienes_list.asp"-->
<!--#include file="footer.asp"-->
