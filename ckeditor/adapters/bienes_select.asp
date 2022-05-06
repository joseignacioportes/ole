<select id="x_bce_bien" name="x_bce_bien">
<option value=""></option>
<%
'Obtiene la información de los bienes
strs_bienesql = "select bcb_desc_corta from buzon_compras_bienes where bcb_status = 'Activo' order by bcb_desc_corta"
			
'Open Connection to the database
set conn2 = Server.CreateObject("ADODB.Connection")
conn2.Open xDb_CHSAPPS_Conn_Str

set rs_bienes = conn2.Execute(strs_bienesql)

if rs_bienes.eof = false then
	rs_bienes.movefirst
	do while rs_bienes.eof = false
		x_bcb_desc_corta = trim(rs_bienes("bcb_desc_corta"))
		Response.Write "<option value='" & x_bcb_desc_corta & "'>" & x_bcb_desc_corta & "</option>"
		rs_bienes.movenext
	loop
end if
			
'Cierra y destruye objetos
set rs_bienes = nothing
conn2.close
set conn2 = nothing
%>
</select>