<%
function vocales_acentuadas(str)
	str = replace(str,"a|","á")
	str = replace(str,"A|","Á")
	str = replace(str,"e|","é")
	str = replace(str,"E|","É")
	str = replace(str,"i|","í")
	str = replace(str,"I|","Í")
	str = replace(str,"o|","ó")
	str = replace(str,"O|","Ó")
	str = replace(str,"u|","ú")
	str = replace(str,"U|","Ú")
	str = replace(str,"n|","ñ")
	str = replace(str,"N|","Ñ")
	vocales_acentuadas = str
end function
%>