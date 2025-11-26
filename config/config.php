<?php
    #Se define una constante con la URL BASE, para poder acceder a los recursos
    #Se indica este fichero en el index.php
    if (getenv('BASE_URL')) {
        define("BASE_URL", getenv('BASE_URL'));
    } else {
       
        $datos = parse_ini_file('config.ini', true);
        if (isset($datos['BASE_URL']['base_url'])) {
            define("BASE_URL", $datos['BASE_URL']['base_url']);
        }
    }
?>