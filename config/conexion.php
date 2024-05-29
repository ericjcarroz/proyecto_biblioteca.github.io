<?php 
    
    $host = 'posupapps.com';
    $user = 'posupapp_ecarroz';
    $password = '5_5TlL3(wK8j';
    $db = 'posupapp_ecarroz';

    $conection = @mysqli_connect($host,$user,$password,$db);

    if(!$conection){
        echo "Error en la conexión " . mysqli_errno($conection). '' .mysqli_error($conection); 
    }else{
        echo "Conectado correctamente";
    }
?>