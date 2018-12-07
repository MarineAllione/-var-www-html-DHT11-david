<?php
//premier code 
/*$filename_temperature = "data.txt" ;

if (isset($_POST["temperature"])) {
    $temperature = $_POST["temperature"] ;
    $op = file_put_contents($filename_temperature, $temperature) ;
    if (! $op) {
        echo "store error" ;
    }
} else {
    echo "data error" ;
}*/

//deuxieme code 
//parametre
$filename = "data.txt" ;

//recuperation des donneés json
$data_json = file_get_contents("php://input");

//verification de json
$data = json_decode($data_json);
if(! $data){
	http_response_code(415);
	exit();
} 
elseif (! $data->temperature || ! $data->humidite) {
	http_response_code(400);
	exit();
}

//ecriture des données
$op = file_put_contents($filename,$data_json);

//verification de l'ecriture des données
   if (! $op) {
   	http_response_code(500);
   	exit();
      /*echo "store error" ;*/
    }
?>
