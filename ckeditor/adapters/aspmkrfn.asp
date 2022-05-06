<% 
'-------------------------------------------------------------------------------
' Functions for default date format
' ANamedFormat = 0-7, where 0-4 same as VBScript
' 4 = "yyyymmdd"    *Cuando el valor viene en formato dd/mm/yyyy
' 5 = "yyyy/mm/dd"
' 6 = "mm/dd/yyyy"
' 7 = "dd/mm/yyyy"
' 8 = "dd/mm/yyyy"  *Cuando el valor viene en formato aaaammdd
' 9 = "hh:mm:ss"    *Cuando el valor viene en formato hhmmss
' 10 = "aaaammdd"    *Cuando el valor viene en formato dd/mm/yyyy
' 11 = "dd/mm/yyyy"    *Cuando el valor viene en formato d/m/yyyy

Const EW_DATE_SEPARATOR = "/"
Const EW_TIME_SEPARATOR = ":"

Function EW_FormatDateTime(ADate, ANamedFormat)
  If IsDate(ADate) Then
		If ANamedFormat >= 0 And ANamedFormat <= 3 Then
			EW_FormatDateTime = FormatDateTime(ADate, ANameFormat)
		ElseIf ANamedFormat = 4 Then
			EW_FormatDateTime = Year(ADate) & Month(ADate) & Day(ADate)
		ElseIf ANamedFormat = 5 Then
			EW_FormatDateTime = Year(ADate) & EW_DATE_SEPARATOR & Month(ADate) & EW_DATE_SEPARATOR & Day(ADate)
		ElseIf ANamedFormat = 6 Then
			EW_FormatDateTime = Month(ADate) & EW_DATE_SEPARATOR & Day(ADate) & EW_DATE_SEPARATOR & Year(ADate)
		ElseIf ANamedFormat = 7 Then
			EW_FormatDateTime = Day(ADate) & EW_DATE_SEPARATOR & Month(ADate) & EW_DATE_SEPARATOR & Year(ADate)
		ElseIf ANamedFormat = 10 Then
			EW_FormatDateTime = right(adate,4) & mid(adate,4,2) & left(adate,2)
		ElseIf ANamedFormat = 11 Then
			x_day = day(ADate)
			if len(x_day) = 1 then x_day = "0" & x_day
			x_month = month(ADate)
			if len(x_month) = 1 then x_month = "0" & x_month
			x_year = year(ADate)
			EW_FormatDateTime = x_day & EW_DATE_SEPARATOR & x_month & EW_DATE_SEPARATOR & x_year
		Else
			EW_FormatDateTime = ADate
		End If
	Else
		If ANamedFormat = 8 Then
			EW_FormatDateTime = right(adate,2) & EW_DATE_SEPARATOR & mid(adate,5,2) & EW_DATE_SEPARATOR & left(adate,4)
		ElseIf ANamedFormat = 9 Then
			EW_FormatDateTime = left(adate,2) & EW_TIME_SEPARATOR & mid(adate,3,2) & EW_TIME_SEPARATOR & right(adate,2)
		Else
			EW_FormatDateTime = ADate
		End If
  End If
End Function

Function EW_UnFormatDateTime(ADate, ANamedFormat)
	Dim arDateTime, arDate, AYear, AMonth, ADay
	ADate = Trim(ADate)
	While Instr(ADate, "  ") > 0
		ADate = Replace(ADate, "  ", " ")
	Wend
	arDateTime = Split(ADate, " ")
	If UBound(arDateTime) < 0 Then
		EW_UnFormatDateTime = ADate
		Exit Function
	End If
	arDate = Split(arDateTime(0), EW_DATE_SEPARATOR)
	If UBound(arDate) = 2 Then
		If ANamedFormat = 6 Then
			EW_UnFormatDateTime = arDate(2) & EW_DATE_SEPARATOR & arDate(0) & EW_DATE_SEPARATOR & arDate(1)
		ElseIf ANamedFormat = 7 Then
			EW_UnFormatDateTime = arDate(2) & EW_DATE_SEPARATOR & arDate(1) & EW_DATE_SEPARATOR & arDate(0)
		Else ' ANamedFormat = 5 or other
			EW_UnFormatDateTime = arDateTime(0)
		End If
		If UBound(arDateTime) > 0 Then
			If IsDate(arDateTime(1)) Then ' Is time
				EW_UnFormatDateTime = EW_UnFormatDateTime & " " & arDateTime(1)
			End If
		End If
	Else
		EW_UnFormatDateTime = ADate
	End If
End Function

'-------------------------------------------------------------------------------
' Function for debug
Sub Trace(aMsg)
	On Error Resume Next
	Dim fso, ts
	Set fso = Server.Createobject("Scripting.FileSystemObject")
	Set ts = fso.OpenTextFile(Server.MapPath("debug.txt"), 8, True)
	ts.writeline(aMsg)
	ts.Close
	Set ts = Nothing
	Set fso = Nothing
End Sub
%>
<%
'-------------------------------------------------------------------------------
' Functions for file upload

Function stringToByte(toConv)

	 For i = 1 to Len(toConv)
	 	tempChar = Mid(toConv, i, 1)
		stringToByte = stringToByte & chrB(AscB(tempChar))
	 Next
	 
End Function

Function byteToString(toConv)
	For i = 1 to LenB(toConv)
		byteord = AscB(MidB(toConv, i, 1))
		If byteord < &H80 Then ' Ascii
			byteToString = byteToString & Chr(byteord)
		Else ' Double-byte characters?
			If i < LenB(toConv) Then
				nextbyteord = AscB(MidB(toConv, i+1, 1))
				On Error Resume Next
				' Note: This line does NOT work on all systems due to limitation of the
				' Chr() function
	      byteToString = byteToString & Chr(CInt(byteord) * &H100 + CInt(nextbyteord))
				If Err.Number <> 0 Then
					On Error GoTo 0
					byteToString = byteToString & Chr(byteord) & Chr(nextbyteord)
				End If
				i = i + 1
			ElseIf i = LenB(toConv) Then
				byteToString = byteToString & Chr(byteord)
			End If
		End If
	Next
End Function

Function getValue(name)
	If dict.Exists(name) Then
		gv = CStr(dict(name).Item("Value"))	
		gv = Left(gv,Len(gv)-2)
		getValue = gv
	Else
		getValue = ""
	End If
End Function

Function getFileData(name)
	If dict.Exists(name) Then
		getFileData = dict(name).Item("Value")
		If LenB(getFileData) Mod 2 = 1 Then
			getFileData = getfileData & ChrB(0)
		End If
	Else
		getFileData = ""
	End If
End Function

Function getFileName(name)
	If dict.Exists(name) Then
		temp = dict(name).Item("FileName")
		tempPos = 1 + InStrRev(temp, "\")
		getFileName = Mid(temp, tempPos)
	Else
		getFileName = ""
	End If
End Function

Function getFileSize(name)
	If dict.Exists(name) Then
		getFileSize = LenB(dict(name).Item("Value"))
	Else
		getFileSize = 0
	End If
End Function

Function getFileContentType(name)
	If dict.Exists(name) Then
		getFileContentType = dict(name).Item("ContentType")
	Else
		getFileContentType = ""
	End If
End Function

'-------------------------------------------------------------------------------
' Note: This function does NOT work on non English servers due to limitation of
'       the Chr() function
Function saveToFile(name, path)
	If dict.Exists(name) Then
		Dim temp
			temp = dict(name).Item("Value")
		Dim fso
			Set fso = Server.CreateObject("Scripting.FileSystemObject")
		Dim file
			Set file = fso.CreateTextFile(path)
				For tPoint = 1 to LenB(temp)
				    file.Write Chr(AscB(MidB(temp,tPoint,1)))
				Next
				file.Close
			saveToFile = True
	Else
			saveToFile = False
	End If
End Function


'Valida de la dirección de correo
function valida_email(email)
	if instr(x_chh_correo_paciente,"@") > 0 and len(x_chh_correo_paciente) > 5 then
		valida_email = 1
	else
		valida_email = 0
	end if
	if instr(x_chh_correo_paciente,".@") > 0 or instr(x_chh_correo_paciente,",") > 0 then
		valida_email = 0
	end if
end function
%>
