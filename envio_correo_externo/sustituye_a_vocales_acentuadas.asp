<%
function vocales_acentuadas(str)
	str = replace(str,"a|","�")
	str = replace(str,"A|","�")
	str = replace(str,"e|","�")
	str = replace(str,"E|","�")
	str = replace(str,"i|","�")
	str = replace(str,"I|","�")
	str = replace(str,"o|","�")
	str = replace(str,"O|","�")
	str = replace(str,"u|","�")
	str = replace(str,"U|","�")
	str = replace(str,"n|","�")
	str = replace(str,"N|","�")
	vocales_acentuadas = str
end function
%>