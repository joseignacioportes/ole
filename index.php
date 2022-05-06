<?php
session_start();
unset($_SESSION["usr_id"]); 
unset($_SESSION["usr_usuario"]); 
unset($_SESSION["usr_nombre_completo"]);
unset($_SESSION["usr_puesto"]); 
unset($_SESSION["usr_id_perfil"]);
unset($_SESSION["perfil_nombre"]);
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>OLÉ-MatchMakers</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  <!-- FavIcon -->
  <link rel="shortcut icon" href="dist/img/ole.ico">
</head>

<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="login-box-body">
    
		<div class="login-logo">
		<img src="logo_login.png" class="img-thumbnail">
    </div>
		<div class="fluid-container">
      <h3>LOGIN</h3>
    </div>
		<div id="frm_login" name="frm_login">
      <div id="Acceder">
				<div class="form-group has-feedback">
					<input type="text" class="form-control" placeholder="Usuario" id="txtUsuario" >
				</div>
				<div class="form-group has-feedback">
					<input type="password"  class="form-control"  placeholder="Contraseña" id="txtPassword" >
				</div>
				<div class="form-group has-feedback">
					<a href="#olvide_contrasena" onclick="olvide_mi_contrasenia()">Olvidé mi contraseña</a>
				</div>
      </div>
			
			<div id="Olvide_Contrasenia" style="display:none">
				<div class="form-group has-feedback">
					<a href="#olvide_contrasena" onclick="Regresar_Olvide_Contrasenia()">
						<<<< Regresar
					</a>
					<br><br>
					<label>
						Ingresa el correo electrónico asociado a la cuenta
					</label>
				</div>
				<div class="form-group has-feedback">
					<input type="text" class="form-control" placeholder="Email" id="txtemail" name="txtemail">
				</div>
			</div>
     
      <div class="row" id="div_btn_acceder">
				<!-- /.col -->
        <div class="col-md-4 col-md-offset-4">
					<input type="button" id="btnIngresar" name="btnIngresar" class="btn btn-primary btn-block chs"  value="ENTRAR">
					
				</div>
        <!-- /.col -->
      </div>
			
			<div class="row" id="div_btn_recuperar" style="display:none">
				<!-- /.col -->
        <div class="col-md-4 col-md-offset-4">
					<input type="button" id="btnRecuperar" name="btnRecuperar" class="btn btn-primary btn-block chs"  value="Recuperar" onclick="recuperar_contrasenia()">
				</div>
        <!-- /.col -->
      </div>
    </div>



  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<div class="footer">
  <p><a href="http://www.olemx.com" target="_blank">OLÉ</a>&nbsp;&nbsp;&nbsp;&nbsp;&copy;Todos los derechos reservados</p>
</div>

</body>

<!--[if !IE]> -->
		<script src="assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
<script>
 function olvide_mi_contrasenia(){
	 $("#Acceder").hide();
	 $("#Olvide_Contrasenia").show();
	 $("#div_btn_acceder").hide();
	 $("#div_btn_recuperar").show();
 }
 
 function Regresar_Olvide_Contrasenia(){
	 $("#Acceder").show();
	 $("#Olvide_Contrasenia").hide();
	 $("#div_btn_acceder").show();
	 $("#div_btn_recuperar").hide();
 }
 
 function recuperar_contrasenia(){
		if($.trim($("#txtemail").val())==""){
			alert("Agrega el Email");
		}else{
			$.post("consultas/consultas_login.php", {
					usr_email: $.trim($("#txtemail").val()),
					accion: "envio_mail"
			},
      function (result) {
          if (result !== "") {
              var jsonResult = eval("(" + result + ")");
              if (jsonResult.estatus === "ok") {
									alert("Se ha enviado el Email");
                  Regresar_Olvide_Contrasenia();
							} else {
                  alert("El Email es invalido");
              }
          }
      });
		}
 }


$(function () {
				$('#txtUsuario').focus();
				$("#txtUsuario").keypress(function (e) {
						if (e.which === 13) {
								if ($("#txtUsuario").val() !== "")
								{
										$("#txtPassword").focus();                            
								}
						}
				});

				$("#txtPassword").keypress(function (e) {
						if (e.which === 13) {
								$('#btnIngresar').focus();
								valida();
						}
				});
				valida=function(){
						var txtUsuario = $.trim($('#txtUsuario').val());
						var txtPassword = $.trim($('#txtPassword').val());
						if ((txtUsuario !== "" && txtPassword !== "")) {
								$("#cargando").show();
								$("#btnIngresar").hide();
								login();
						} else {
								alert("Por favor ingrese el usuario y/o contraseña.");
								
								$('#txtUsuario').focus();   
						}
				};
				$('#btnIngresar').on('click', function () {
						valida();
				});
		});
    login = function () {
        
		
			$.post("consultas/consultas_login.php", {
			usr_usuario: $.trim($('#txtUsuario').val()), 
			usr_contrasena: $.trim($('#txtPassword').val()),
					accion: "login"
			},
        function (result) {
             $("#cargando").hide();
             $("#btnIngresar").show();
            if (result !== "") {
                var jsonResult = eval("(" + result + ")");
                if (jsonResult.estatus === "ok") {
                    $(location).attr('href', jsonResult.location);
                } else {
                    if($("#txtUsuario").val()!="")
                    {
                        alert("El usuario y/o contraseña es incorrecta");
                      
                        $('#txtUsuario').focus();
                    }else
                    {
                        alert("Usuario o contraseña incorrecta");
                   
                        $('#txtUsuario').focus();
                    }
                }
            }
        });
    };

</script>
</html>