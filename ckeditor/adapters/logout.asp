<% 
Session.Abandon
Response.Cookies("cbe")("user_profile") = ""
Response.Cookies("cbe").Expires = now() - 1
Response.redirect "login.asp"
%>
