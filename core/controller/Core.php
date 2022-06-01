<?php


// 14 de Abril del 2014
// Core.php
// @brief obtiene las configuraciones, muestra y carga los contenidos necesarios.
// actualizado [11-Aug-2016]
class Core {
	public static $user = null;
	public static $debug_sql = false;
	public static $email_user ="";
	public static $email_password ="";
	public static $secure = false;

	public static $pdf_footer = "Generado por el sistema";
	public static $email_footer = "Correo generado Automaticamente por el Sistema de logistica";

	public static $pdf_table_fillcolor = "[100, 100, 100]";
	public static $pdf_table_column_fillcolor = "255";
	public static $send_alert_emails = true; // enviar correos de alerta (ventas,abastecimientos, etc) -> MailData->send()

	public static function includeCSS(){
		$path = "./content/css/";
		$handle=opendir($path);
		if($handle){
			while (false !== ($entry = readdir($handle)))  {
				if($entry!="." && $entry!=".."){
					$fullpath = $path.$entry;
				if(!is_dir($fullpath)){
						echo "<link rel='stylesheet' type='text/css' href='".$fullpath."' />";

					}
				}
			}
		closedir($handle);
		}

	}

	public static function alert($estado, $texto, $url){
		switch ($estado) {
			case 'Correcto':
				$estado = 'success';
				$titulo = '¡Buen trabajo!';
			break;
			case 'Error':
				$estado = 'error';
				$titulo = '¡ha ocurrido un error!';
			break;
			case 'Advertencia':
				$estado = 'warning';
				$titulo = '¡Advertencia!';
			break;
			case 'Info':
				$estado = 'info';
				$titulo = '¡Aviso Informativo!';
			break;
			case 'Pregunta':
				$estado = 'question';
				$titulo = '¡Atención!';
			break;
			default:
				$estado = 'info';
				$titulo = '¡Aviso Informativo!';
			break;
		}
		echo "<script language = javascript> swal.fire({ title:'".$titulo."', text:'".$texto."', type:'".$estado."', }).then(function(){window.location='".$url."';});</script>";
	}
	public static function redir($url){
		echo "<script>window.location='".$url."';</script>";
	}
	public static function includeJS(){
		$path = "./content/js/";
		$handle=opendir($path);
		if($handle){
			while (false !== ($entry = readdir($handle)))  {
				if($entry!="." && $entry!=".."){
					$fullpath = $path.$entry;
				if(!is_dir($fullpath)){
						echo "<script type='text/javascript' src='".$fullpath."'></script>";

					}
				}
			}
		closedir($handle);
		}

	}
	public static function sec_session_start() {
		$session_name = 'sec_session_id';   // Set a custom session name
		$secure = false;

		// This stops JavaScript being able to access the session id.
		$httponly = true;

		// Forces sessions to only use cookies.
		if (ini_set('session.use_only_cookies', 1) === FALSE) {
				View::Error("<b>Could not initiate a safe session (ini_set) </b>");
				exit();
		}

		// Gets current cookies params.
		$cookieParams = session_get_cookie_params();
		session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly);

		// Sets the session name to the one set above.
		session_name($session_name);

		session_start();            // Start the PHP session
		session_regenerate_id();    // regenerated the session, delete the old one.
	}
	function login_check() {
    // Check if all session variables are set
    if (isset($_SESSION['idUsuario'], $_SESSION['nick'], $_SESSION['login_string'])) {
        $idUsuario = $_SESSION['idUsuario'];
        $login_string = $_SESSION['login_string'];
        $nick = $_SESSION['nick'];

        // Get the user-agent string of the user.
        $user_browser = $_SERVER['HTTP_USER_AGENT'];

				$usuario = UsuarioData::getById($idUsuario);
				if ($usuario != null) {
					$login_check = hash('sha512', $usuario['password'] . $user_browser);
					return ($login_check == $login_string) ? true : false ;
				} else {
					return false;
				}

		}
	}
	public static function escUrl($url) {

    if ('' == $url) {
        return $url;
    }

    $url = preg_replace('|[^a-z0-9-~+_.?#=!&;,/:%@$\|*\'()\\x80-\\xff]|i', '', $url);

    $strip = array('%0d', '%0a', '%0D', '%0A');
    $url = (string) $url;

    $count = 1;
    while ($count) {
        $url = str_replace($strip, '', $url, $count);
    }

    $url = str_replace(';//', '://', $url);

    $url = htmlentities($url);

    $url = str_replace('&amp;', '&#038;', $url);
    $url = str_replace("'", '&#039;', $url);

    if ($url[0] !== '/') {
        // We're only interested in relative links from $_SERVER['PHP_SELF']
        return '';
    } else {
        return $url;
    }
	}

}



?>
