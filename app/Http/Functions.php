<?php

//namespace App\Http\Controllers;

class Functions {  // Inicio class Functions
    // Metodo #1
    const SESS_CIPHER = 'aes-128-cbc';  // AES-128-CBC   -   AES-128-GCM   -   AES-256-CBC
    /**
     * Encrypts the session ID and returns it as a base 64 encoded string.
     *
     * @param $session_id
     * @return string
     */
    public function encrypt($session_id) {
        // Get the MD5 hash salt as a key.
        $key = $this->_getSalt();
        // For an easy iv, MD5 the salt again.
        $iv = $this->_getIv();
        // Metodo #1
        // Encrypt the session ID.
        $ciphertext = openssl_encrypt($session_id, self::SESS_CIPHER, $key, $options=OPENSSL_RAW_DATA, $iv);
        // Base 64 encode the encrypted session ID.
        $encryptedSessionId = base64_encode($ciphertext);      
        // Metodo #2
        //$encrypt = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $session_id, MCRYPT_MODE_CBC, $iv);
        // Base 64 encode the encrypted session ID.
        //$encryptedSessionId = base64_encode($encrypt);
        // Return it.
        return $encryptedSessionId;
    }
    /**
     * Decrypts a base 64 encoded encrypted session ID back to its original form.
     *
     * @param $encryptedSessionId
     * @return string
     */
    public function decrypt($encryptedSessionId) {
        // Get the MD5 hash salt as a key.
        $key = $this->_getSalt();
        // For an easy iv, MD5 the salt again.
        $iv = $this->_getIv();
        // Metodo #1
        // Decode the encrypted session ID from base 64.
        $decoded = base64_decode($encryptedSessionId, TRUE);
        // Decrypt the string.
        $decryptedSessionId = openssl_decrypt($decoded, self::SESS_CIPHER, $key, $options=OPENSSL_RAW_DATA, $iv);
        // Metodo #2
        // Decode the encrypted session ID from base 64.
        //$decoded = base64_decode($encryptedSessionId);
        // Decrypt the string.
        //$decryptedSessionId = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, $decoded, MCRYPT_MODE_CBC, $iv);
        // Trim the whitespace from the end.
        $session_id = rtrim($decryptedSessionId, "\0");
        // Return it.
        return $session_id;
    }
    public function _getSalt() {
        // Metodo #1
        return $this->drupal->drupalGetHashSalt();
        // Metodo #2
        //return md5($this->drupal->drupalGetHashSalt());
      }
    public function _getIv() {
        //Metodo #1
        $ivlen = openssl_cipher_iv_length(self::SESS_CIPHER);
        return substr(md5($this->_getSalt()), 0, $ivlen);
        //Metodo #2
        //return md5($this->_getSalt());
    }

    function encryptIt($q) { 
		$cypherMethod = 'AES-128-CBC';
		$key = 'qJB0rGtIn5UB1xG03efyCp';
		//$iv = "1234567812345678";
		//$qEncoded = openssl_encrypt($q, $cypherMethod, $key, true, $iv);
		$qEncoded = openssl_encrypt($q, $cypherMethod, $key);
	
		return($qEncoded); 
	}
    function decryptIt($q) { 
		$cypherMethod = 'AES-128-CBC';
		$key = 'qJB0rGtIn5UB1xG03efyCp';
		//$iv = "1234567812345678";
		//$qDecoded = openssl_decrypt($q, $cypherMethod, $key, true, $iv);
		$qDecoded = openssl_decrypt($q, $cypherMethod, $key);
		return($qDecoded); 
	}    
} // Fin class Functions



/**
 * Obtener Hora actual - Formato 12 o 24.
 *
 * @param $formato
 * @return horaActual
 */
function obtener_hora_actual($formato) {
    date_default_timezone_set('America/Caracas');
    if($formato==12):
        $horaActual = date("h:i:s a");
    else:
        $horaActual = date("H:i:s");
    endif;
    
    return $horaActual;
}

/**
 * Obtener Día - Mes - Año.
 *
 * @param $dia_mes_anio
 * @return dma
 */
function obtener_dia_mes_anio($dia_mes_anio) {
    date_default_timezone_set('America/Caracas');
    $fecha_actual = new DateTime();
	$dia = $fecha_actual->format("d");
	$mes = $fecha_actual->format("m");	
	$anio = $fecha_actual->format("Y");

    $dma = '';
    if($dia_mes_anio == 'dia'):
        $dma = $dia;
    elseif($dia_mes_anio == 'mes'):
        $dma = $mes;
    elseif($dia_mes_anio == 'anio'):
        $dma = $anio;
    endif;
    
    return $dma;
}

/**
 * Obtener Nombre Mes.
 *
 * @param $mes
 * @return m
 */
function obtener_nombre_mes($mes) {
    date_default_timezone_set('America/Caracas');
    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    /*$m = $ma[date('n')-1];*/

    $hr = 0; $mi = 0; $ss = 0; // hora

    $d = 01; $m = $mes; $a = 2021; // fecha
    $ma = gmdate("n", mktime($hr, $mi, $ss, $m, $d, $a)); // mes del año

    $m = $meses[$ma-1];

    return $m;
}

/**
 * Obtener Cantidad de días mesuales dado 28 a 31.
 *
 * @param $
 * @return cdm
 */
function obtener_dias_mensual() {
    date_default_timezone_set('America/Caracas');
    $cdm = date('t');
    return $cdm;
}

/**
 * Obtener Primera quincena.
 *
 * @param $mes, $anio
 * @return 
 */
function obtener_primera_quincena($mes, $anio) {
    date_default_timezone_set('America/Caracas');
    /*$d = date('d');
    $m = $mes;
    $a = $anio;
    $fi = date('01/'.$m.'/'.$a);
    $ff = date('15/'.$m.'/'.$a);*/

    $hr = -4; $mi = 0; $ss = 0; // hora actual
    $d = 01; $m = $mes; $a = $anio; // fecha inicial
    $fi = gmdate("Y-m-d H:i:s", mktime($hr, $mi, $ss, $m, $d, $a)); // fecha inicial

    $hr = 19; $mi = 0; $ss = 0; // hora actual
    $d = 15; $m = $mes; $a = $anio; // fecha final
    $ff = gmdate("Y-m-d H:i:s", mktime($hr, $mi, $ss, $m, $d, $a)); // fecha final

    $tiempo = strtotime($ff) - strtotime($fi);
    $dds = round($tiempo / 86400); //floor($tiempo / 86400); round($tiempo / 86400);
	$hhs = round(($tiempo - ($dds * 86400)) / 3600)+1;
	$mms = round(($tiempo - ($dds * 86400) - ($hhs * 3600)) / 60)+60;
	$sss = $tiempo % 60;

    return '<br> ( '. $fi . ' - ' . $ff . ' ) <br> dd|hh|mm|ss = ' . $dds.'|'.$hhs.'|'.$mms.'|'.$sss.'<br>';
}

/**
 * Obtener Segunda quincena.
 *
 * @param $mes, $anio
 * @return 
 */
function obtener_segunda_quincena($mes, $anio) {
    date_default_timezone_set('America/Caracas');
    /*$d = date('d');
    $m = date('m');
    $a = date('Y');
    $cdm = date('t');
    $fi = date('16/'.$m.'/'.$a);
    $ff = date($cdm.'/'.$m.'/'.$a);*/

    $hr = -4; $mi = 0; $ss = 0; // hora actual
    $d = 16; $m = $mes; $a = $anio; // fecha inicial
    $fi = gmdate("Y-m-d H:i:s", mktime($hr, $mi, $ss, $m, $d, $a)); // fecha inicial

    $cdm = gmdate("t", mktime($hr, $mi, $ss, $m, $d, $a));
    $hr = 19; $mi = 0; $ss = 0; // hora actual
    $d = $cdm; $m = $mes; $a = $anio; // fecha final
    $ff = gmdate("Y-m-d H:i:s", mktime($hr, $mi, $ss, $m, $d, $a)); // fecha final

    return '<br> ( '.$fi . ' - ' . $ff.' )';
}

/**
 * Obtener Nombre del Día de la semana.
 *
 * @param $
 * @return 
 */
function obtener_nombre_dia() {
    date_default_timezone_set('America/Caracas');
    $ds = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
    $d = $ds[date('w')];
    return $d;
}

/**
 * Obtener Semanas mensual.
 *
 * @param $
 * @return 
 */
function obtener_semanas_mensual() {
    date_default_timezone_set('America/Caracas');
    //$csm = intval(date('t') / 7);

    $hr = -4; $mi = 0; $ss = 0; // hora actual del primer dia del mes
    $d = 1; $m = 3; $a = 2021; // fecha actual del primer dia del mes
 
    $ds = gmdate("w", mktime($hr, $mi, $ss, $m, $d, $a)); // dia de la semana ds = (0=dom 1=lun 2=mar 3=mie 4=jue 5=vie 6=sab)

    if($ds == 0): // Domingo
        $fi_d = gmdate("d", mktime($hr, $mi, $ss, $m, $d-6, $a)); // Día del primer lunes del mes
        $fi_m = gmdate("m", mktime($hr, $mi, $ss, $m, $d-6, $a)); // Mes del primer lunes del mes
        $fi_a = gmdate("Y", mktime($hr, $mi, $ss, $m, $d-6, $a)); // Año del primer lunes del mes
    endif;
    if($ds == 1): // Lunes
        $fi_d = gmdate("d", mktime($hr, $mi, $ss, $m, $d, $a)); // Día del primer lunes del mes
        $fi_m = gmdate("m", mktime($hr, $mi, $ss, $m, $d, $a)); // Mes del primer lunes del mes
        $fi_a = gmdate("Y", mktime($hr, $mi, $ss, $m, $d, $a)); // Año del primer lunes del mes
    endif;
    if($ds == 2): // Martes
        $fi_d = gmdate("d", mktime($hr, $mi, $ss, $m, $d-1, $a)); // Día del primer lunes del mes
        $fi_m = gmdate("m", mktime($hr, $mi, $ss, $m, $d-1, $a)); // Mes del primer lunes del mes
        $fi_a = gmdate("Y", mktime($hr, $mi, $ss, $m, $d-1, $a)); // Año del primer lunes del mes
    endif;
    if($ds == 3): // Miercoles
        $fi_d = gmdate("d", mktime($hr, $mi, $ss, $m, $d-2, $a)); // Día del primer lunes del mes
        $fi_m = gmdate("m", mktime($hr, $mi, $ss, $m, $d-2, $a)); // Mes del primer lunes del mes
        $fi_a = gmdate("Y", mktime($hr, $mi, $ss, $m, $d-2, $a)); // Año del primer lunes del mes
    endif;
    if($ds == 4): // Jueves
        $fi_d = gmdate("d", mktime($hr, $mi, $ss, $m, $d-3, $a)); // Día del primer lunes del mes
        $fi_m = gmdate("m", mktime($hr, $mi, $ss, $m, $d-3, $a)); // Mes del primer lunes del mes
        $fi_a = gmdate("Y", mktime($hr, $mi, $ss, $m, $d-3, $a)); // Año del primer lunes del mes
    endif;
    if($ds == 5): // Viernes
        $fi_d = gmdate("d", mktime($hr, $mi, $ss, $m, $d-4, $a)); // Día del primer lunes del mes
        $fi_m = gmdate("m", mktime($hr, $mi, $ss, $m, $d-4, $a)); // Mes del primer lunes del mes
        $fi_a = gmdate("Y", mktime($hr, $mi, $ss, $m, $d-4, $a)); // Año del primer lunes del mes
    endif;
    if($ds == 6): // Sabado
        $fi_d = gmdate("d", mktime($hr, $mi, $ss, $m, $d-5, $a)); // Día del primer lunes del mes
        $fi_m = gmdate("m", mktime($hr, $mi, $ss, $m, $d-5, $a)); // Mes del primer lunes del mes
        $fi_a = gmdate("Y", mktime($hr, $mi, $ss, $m, $d-5, $a)); // Año del primer lunes del mes
    endif;

    // Periodos semanales
    $fi_l1 = gmdate("Y-m-d H:i:s", mktime($hr, $mi, $ss, $fi_m, $fi_d, $fi_a)); // Fecha inicial de la Primera semana
    $fi_l2 = gmdate("Y-m-d H:i:s", mktime($hr, $mi, $ss, $fi_m, $fi_d+7, $fi_a)); // Fecha inicial de la Segunda semana
    $fi_l3 = gmdate("Y-m-d H:i:s", mktime($hr, $mi, $ss, $fi_m, $fi_d+14, $fi_a)); // Fecha inicial de la Tercera semana
    $fi_l4 = gmdate("Y-m-d H:i:s", mktime($hr, $mi, $ss, $fi_m, $fi_d+21, $fi_a)); // Fecha inicial de la Cuarta semana
    $fi_l5 = gmdate("Y-m-d H:i:s", mktime($hr, $mi, $ss, $fi_m, $fi_d+28, $fi_a)); // Fecha inicial de la Quinta semana
    $fi_l6 = gmdate("Y-m-d H:i:s", mktime($hr, $mi, $ss, $fi_m, $fi_d+35, $fi_a)); // Fecha inicial de la Sexta semana

    $hr = 19; $mi = 0; $ss = 0; // hora final de la Primera semana
    $ff_l1 = gmdate("Y-m-d H:i:s", mktime($hr, $mi, $ss, $fi_m, $fi_d+6, $fi_a)); // Fecha final de la Primera semana
    $ff_l2 = gmdate("Y-m-d H:i:s", mktime($hr, $mi, $ss, $fi_m, $fi_d+7+6, $fi_a)); // Fecha final de la Segunda semana
    $ff_l3 = gmdate("Y-m-d H:i:s", mktime($hr, $mi, $ss, $fi_m, $fi_d+14+6, $fi_a)); // Fecha final de la Tercera semana
    $ff_l4 = gmdate("Y-m-d H:i:s", mktime($hr, $mi, $ss, $fi_m, $fi_d+21+6, $fi_a)); // Fecha final de la Cuarta semana
    $ff_l5 = gmdate("Y-m-d H:i:s", mktime($hr, $mi, $ss, $fi_m, $fi_d+28+6, $fi_a)); // Fecha final de la Quinta semana
    $ff_l6 = gmdate("Y-m-d H:i:s", mktime($hr, $mi, $ss, $fi_m, $fi_d+35+6, $fi_a)); // Fecha final de la Sexta semana

    // Cantidad de semanas
    $csm = 4;
    $ps =   '<br> ( '.$fi_l1.' - '.$ff_l1.' ) <br> ( '.
            $fi_l2.' - '.$ff_l2.' ) <br> ( '.
            $fi_l3.' - '.$ff_l3.' ) <br> ( '.
            $fi_l4.' - '.$ff_l4.' ) <br> csm = '.$csm;
    if(gmdate("m", mktime($hr, $mi, $ss, $fi_m, $fi_d+28, $fi_a)) == $m):
        $csm = 5;
        $ps =   '<br> ( '.$fi_l1.' - '.$ff_l1.' ) <br> ( '.
                $fi_l2.' - '.$ff_l2.' ) <br> ( '.
                $fi_l3.' - '.$ff_l3.' ) <br> ( '.
                $fi_l4.' - '.$ff_l4.' ) <br> ( '.
                $fi_l5.' - '.$ff_l5.' )  <br> csm = '.$csm;
    endif;
    if(gmdate("m", mktime($hr, $mi, $ss, $fi_m, $fi_d+35, $fi_a)) == $m):
        $csm = 6;
        $ps =   '<br> ( '.$fi_l1.' - '.$ff_l1.' ) <br> ( '.
                $fi_l2.' - '.$ff_l2.' ) <br> ( '.
                $fi_l3.' - '.$ff_l3.' ) <br> ( '.
                $fi_l4.' - '.$ff_l4.' ) <br> ( '.
                $fi_l5.' - '.$ff_l5.' ) <br> ( '.
                $fi_l6.' - '.$ff_l6.' ) <br> csm = '.$csm;
    endif;

    return $ps;
}

/**
 * Obtener antigüedad.
 *
 * @param $
 * @return 
 */
function obtener_antiguedad() {
    date_default_timezone_set('America/Caracas');

    $hr = -4; $mi = 0; $ss = 0; // hora actual
    $d = 01; $m = 02; $a = 1978; // fecha inicial
    $fi = gmdate("Y-m-d H:i:s", mktime($hr, $mi, $ss, $m, $d, $a)); // fecha inicial

    $hr = 19; $mi = 0; $ss = 0; // hora actual
    $d = date('d'); $m = date('m'); $a = date('Y'); // fecha final
    $ff = gmdate("Y-m-d H:i:s", mktime($hr, $mi, $ss, $m, $d, $a)); // fecha final

    $d = 31; $m = 12; $a = date('Y'); // Cantidad de Dias del año
    $cda = gmdate("z", mktime($hr, $mi, $ss, $m, $d, $a))+1; // Cantidad de Dias del año

    $d = date('d'); $m = date('m'); $a = date('Y'); // Cantidad de Dias del mes
    $cdm = gmdate("t", mktime($hr, $mi, $ss, $m, $d, $a)); // Cantidad de Dias del mes

    // un_anio	31536000    8600*365
    $un_anio = 86400 * $cda;
    // un_mes	2678400     8600*31
    $un_mes = 86400 * $cdm;
    // 1d	86400       3600*24
    // 1h	3600        60*60
    // 1m	60          1*60
    // 1s	1	
    $tiempo = strtotime($ff) - strtotime($fi);
    $aas = floor( $tiempo / $un_anio );
    $mms = floor( (((($tiempo / $un_anio) - $aas ) * 10000000) / $un_mes) )+1;
    $dds = floor( (((($tiempo / $un_anio) - $mms ) * 10000) / 86400) );
	$hhs = floor( (((($tiempo / $un_anio) - $dds ) * 100) / 3600) );
	$iis = floor( (((($tiempo / $un_anio) - $hhs ) * 100) / 60) );
	$sss = $tiempo % 60;

    return   '<br> (' .$fi . ' - ' . $ff . ' ) ' .
             '<br> aa|mm|dd|hh|ii|ss = ' . $aas.' | '.$mms.' | '.$dds.' | '.$hhs.' | '.$iis.' | '.$sss;
}

/**
 * Permisologia de usuarios casi automáticos.
 * 
 * // Probar colocarlo en config!!!! Config::get('user_permissions');
 *
 * @param $
 * @return p
 */
function user_permissions() {
  $p = [
      'dashboard' => [
          'icon' => '<i class="fas fa-home"></i>',
          'title' => 'Módulo Dashboard',
          'keys' => [
              'dashboard' => 'Puede ver el dashboard.',
              'dashboard_small_stats' => 'Permitir ver Estadísticas rápidas.',
              'dashboard_sell_today' => 'Permitir ver lo facturado hoy.',
          ]
      ],
      'categories' => [
          'icon' => '<i class="far fa-folder-open"></i>',
          'title' => 'Módulo Categorías',
          'keys' => [
              'categories' => 'Puede ver categorías.',
              'category_add' => 'Permitir agregar categoría.',
              'category_edit' => 'Permitir editar categoría.',
              'category_delete' => 'Permitir eliminar categoría.',
          ]
      ],
      'products' => [
          'icon' => '<i class="fas fa-boxes"></i>',
          'title' => 'Módulo Productos',
          'keys' => [
              'products' => 'Puede ver productos.',
              'product_add' => 'Permitir agregar producto.',
              'product_search' => 'Permitir buscar producto.',
              'product_edit' => 'Permitir editar producto.',
              'product_delete' => 'Permitir eliminar producto.',
              'product_gallery_add' => 'Permitir agregar imágenes a la galería.',
              'product_gallery_delete' => 'Permitir eliminar imágenes de la galería.',
          ]
      ],
      'orders' => [
          'icon' => '<i class="fas fa-clipboard-list"></i>',
          'title' => 'Módulo Ordenes',
          'keys' => [
              'orders_list' => 'Puede ver listado de ordenes.',
          ]
      ],
      'users' => [
          'icon' => '<i class="fas fa-user-friends"></i>',
          'title' => 'Módulo Usuarios',
          'keys' => [
              'user_list' => 'Puede ver usuarios.',
              'user_edit' => 'Permitir editar usuario.',
              'user_banned' => 'Permitir supender usuario.',
              'user_permissions' => 'Permitir otorgar permisos de usuario.',
          ]
      ],
      'settings' => [
          'icon' => '<i class="fas fa-cogs"></i>',
          'title' => 'Módulo Configuraciones',
          'keys' => [
              'settings' => 'Puede realizar configuraciones.',
          ]
      ],
  ];

  return $p;
}

/**
 * Key Value From Json - kvfj.
 *
 * @param $json, $key
 * @return json
 */
function kvfj($json, $key) {
  if($json == null):
      return null;
  else:
      $json = $json;
      $json = json_decode($json, true);
      if(array_key_exists($key, $json)):
          return $json[$key];
      else:
          return null;
      endif;
  endif;
}

?>
