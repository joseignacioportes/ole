<%
Const cdoExchangeServer = "smtp" 'Exchange Server Name 
Const cdoServerPort = 25 'Server Port 
Const cdoSendUsingPort = 2 'Send the message using the network (SMTP over the network). 
Const cdoAnonymous = 0 'Do not authenticate
Const cdoFrom = "administrador@hospitalsatelite.com" 'From whom is sending the e-mail
		
Set objCDO = Server.CreateObject("CDO.Message")
objCDO.From = cdoFrom
objCDO.To = strTo
objCDO.CC = strCC
objCDO.BCC = strBCC
objCDO.Subject = strSubject
objCDO.HTMLBody = strTextBody
objCDO.Configuration.Fields.Item ("http://schemas.microsoft.com/cdo/configuration/sendusing") = cdoSendUsingPort
objCDO.Configuration.Fields.Item ("http://schemas.microsoft.com/cdo/configuration/smtpserver") = cdoExchangeServer
objCDO.Configuration.Fields.Item ("http://schemas.microsoft.com/cdo/configuration/smtpserverport") = cdoServerPort
objCDO.Configuration.Fields.Item ("http://schemas.microsoft.com/cdo/configuration/smtpauthenticate") = cdoAnonymous 
objCDO.Configuration.Fields.Update
objCDO.Send
set objCDO = nothing
%>