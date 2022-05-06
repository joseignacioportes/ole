<%
'******************************************************************
'Nombre del Sistema: Compra de Bienes para Empleados
'Versión: 1.0
'Descripción: Gestión para compra de bienes para Colaboradores del CHS.
'Autor: Ing. Mauricio Ramos - mramos@bsolutionsmx.com
'Fecha Creación: 06/Nov/2018
'Lenguaje: Microsoft ASP 3.0
'Base de Datos: MSQL Server 2008 R2
'******************************************************************
%>

<script type="text/javascript">
function contrae_menu_completo()
{
	document.getElementById("menu_completo").style.display = "none";
	document.getElementById("menu").style.display = "block";
}


function expande_menu_completo()
{
	document.getElementById("menu").style.display = "none";
	document.getElementById("menu_completo").style.display = "block";
}
</script>

<html>
<head>
	<title>Compras de Bienes para Empleados</title>	
	<link rel="shortcut icon" href="images/chs_favicon.ico">
	<link href="css/bc.css" rel="stylesheet" type="text/css">
	<meta name="author" content="BSOLUTIONSMX.COM / mramos@bsolutionsmx.com" />
	<script type="text/javascript" src="javascript/icons_library.js"></script>
</head>

<body>
<div style="border:1px solid; border-radius: 30px; background-color:#053064; width:520px; margin:10px auto;">
	<table border="0" cellspacing="0" cellpadding="8" align="center">
		<tr align="center">
			<td>
			<img src="images/chs_logo_blanco.png" border="0">
			<br><br>
			<font face="arial" size="4" color="white"><b><%=x_encabezado%></b></font>
			</td>
		</tr>
	</table>
</div>

<p><hr><p>

<div id="menu_completo" style="position:absolute; top:8px; border:1px solid; border-radius:10px; background-color:#053064;">
	<table border="0" cellspacing="0" cellpadding="4" align="center">
		<tr><th align="center"><font face="arial" size="3" color="white"><a href="javascript:contrae_menu_completo();" style="color:white; text-decoration:none;"><i class="fas fa-bars"></i></a>&nbsp;Menú Principal</font></th></tr>
		<%if Request.Cookies("cbe")("user_profile") = "" then%>
			<tr><td><a href="tutorial.asp" style="color:white; text-decoration:none;"><font face="arial" size="2" color="white">Tutorial</font></a></td></tr>
			<tr><td><a href="bienes_activos_list.asp" style="color:white; text-decoration:none;"><font face="arial" size="2" color="white">Listado Bienes Activos</font></a></td></tr>
			<tr><td><a href="http://intranet/servicios_grales/SitePages/Inicio.aspx" style="color:white; text-decoration:none;"><font face="arial" size="2" color="white">Salir</font></a></td></tr>
		<%end if%>
		
		<%if Request.Cookies("cbe")("user_profile") = "Admin" then%>
			<tr><td><a href="bienes.asp" style="color:white; text-decoration:none;"><font face="arial" size="2" color="white">Administración de Bienes</font></a></td></tr>
			<tr><td><a href="bienes_activos_list.asp" style="color:white; text-decoration:none;"><font face="arial" size="2" color="white">Listado Bienes Activos</font></a></td></tr>
			<tr><td><a href="bienes_activos_list.asp" style="color:white; text-decoration:none;"><font face="arial" size="2" color="white">PDF Bienes Activos</font></a></td></tr>
			<tr><td><a href="solicitud_list_all.asp" style="color:white; text-decoration:none;"><font face="arial" size="2" color="white">Ver todas las solicitudes</font></a></td></tr>
			<tr><td><a href="sorteo_bienes.asp" style="color:white; text-decoration:none;"><font face="arial" size="2" color="white">Sorteo de Bienes</font></a></td></tr>
			<tr><td><a href="logout.asp" style="color:white; text-decoration:none;"><font face="arial" size="2" color="white">Salir</font></a></td></tr>
		<%end if%>
	</table>
</div>

<div id="menu" style="position:absolute; top:8px; border:1px solid; border-radius:10px; background-color:#053064; display:none;">
	<table border="0" cellspacing="0" cellpadding="4" align="center">
		<tr><th align="center"><font face="arial" size="3" color="white"><a href="javascript:expande_menu_completo();" style="color:white; text-decoration:none;"><i class="fas fa-bars"></i></a>&nbsp;Menú Principal</font></th></tr>
	</table>
</div>