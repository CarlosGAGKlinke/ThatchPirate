<?php
/**
 * Created by jonathan
 * Date: 11/06/2016
 * Time: 00:33
 */

switch($_SERVER['SERVER_NAME']){
    case 'thatchpirate.com.br':
        $fileConfig = '/config/main_config.php';
        break;
    case 'thatchpirate.dev':
        $fileConfig = '/config/dev_config.php';
        break;
    default:
        $fileConfig = null;
}

//echo $fileConfig;
// chama arquivo de configuração de acordo com o nome do servidor
require_once $fileConfig;