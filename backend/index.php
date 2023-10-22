<?php
/* 
TAKEN FORM: https://github.com/oscaruhp/empleados
AUTHOR: Oscar Uh

MODIFIED AND ADAPTED BY: Angelower Santana-Velásquez

*/
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET,POST,OPTIONS");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

/*  Conecta con la base de datos en el servidor local 
	usando las credenciales de usuario y contraseña */
$servidor = "localhost"; 
$usuario = "root"; 
$passwd = ""; 
$nombreBaseDatos = "maicenascript";
$conexionBD = new mysqli($servidor, $usuario, $passwd, $nombreBaseDatos);

/* Consulta UN registro de paciente de la tabla patients teniendo como criterio de búsqueda 
   la variable 'id' que viene en el $_GET["consultar"] 
   */
if (isset($_GET["consultarEpsid"])){
        $eps = mysqli_query($conexionBD,"SELECT * FROM eps WHERE id=".$_GET["consultarEpsid"]);
        if(mysqli_num_rows($eps) > 0){
            $eps = mysqli_fetch_all($eps,MYSQLI_ASSOC);
            echo json_encode($eps); 
            exit();
        } else{  echo json_encode(["success"=>0]); 
        exit();}
}

if (isset($_GET["consultarEps"])){
        $eps = mysqli_query($conexionBD,"SELECT * FROM eps");
        if(mysqli_num_rows($eps) > 0){
            $eps = mysqli_fetch_all($eps,MYSQLI_ASSOC);
            echo json_encode($eps); 
            exit();
        } else{  echo json_encode(["success"=>0]); 
        exit();}
}

/* Consulta UN registro de paciente de la tabla patients teniendo como criterio de búsqueda 
   la variable 'id' que viene en el $_GET["consultar"] 
   */
if (isset($_GET["consultar"])){
        $patients = mysqli_query($conexionBD,"SELECT * FROM patients WHERE id=".$_GET["consultar"]);
        if(mysqli_num_rows($patients) > 0){
            $patients = mysqli_fetch_all($patients,MYSQLI_ASSOC);
            echo json_encode($patients); 
            exit();
        } else{  echo json_encode(["success"=>0]); 
        exit();}
}

/* Borra un registro de paciente de la tabla patients, teniendo como criterio de búsqueda 
   la variable 'id' que viene en el $_GET["borrar"] 
   */
if (isset($_GET["borrar"])){
        $sqlActivo = mysqli_query($conexionBD,"DELETE FROM patients WHERE id=".$_GET["borrar"]);
        if($sqlActivo){
            echo json_encode(["success"=>1]);
            exit();
        }
        else{  echo json_encode(["success"=>0]); }
}
/* Inserta un registro de paciente de la tabla patients. La información es recibida en método POST */
if(isset($_GET["insertar"])){
        $json = file_get_contents("php://input");
        $data = json_decode($json);
        if (json_last_error() !== JSON_ERROR_NONE) {
            echo json_encode(["error" => json_last_error_msg()]);
            echo $data;
        }
        else {
            try{
                $doc=$data->doc;
                $name=$data->name;
                $lastname=$data->lastname;
                $age=$data->age;
                $genre=$data->genre;
                $eps=$data->eps;  
                $tp=$data->tp;
                $ptt=$data->ptt;
                $atiii=$data->atiii;
                $tt=$data->tt;
                $fibrinogeno=$data->fibrinogeno;     
                if(($doc!="")&&($name!="")&&($lastname!="")&&($age!="")&&($genre!="")&&($eps!="")){        
                    $sqlPatient = mysqli_query($conexionBD, "INSERT INTO patients(doc, name, lastname, age, genre, eps, tp, ptt, atiii, tt, fibrinogeno) VALUES('$doc', '$name', '$lastname', '$age', '$genre', '$eps', '$tp', '$ptt', '$atiii', '$tt', '$fibrinogeno')");
                    echo json_encode(["success"=>1]);
                }
            }
            catch (mysqli_sql_exception $e){
                echo json_encode(["error" => "Duplicate entry for 'doc'"]);
            }
        }
        
    exit();
}


/* Actualiza todos los campos de la tabla patients, teniendo como criterio de búsqueda 
   la variable 'id' que viene en el $_GET["actualizar"]
   */
if(isset($_GET["actualizar"])){ 
    $data = json_decode(file_get_contents("php://input"));
    $id=(isset($data->id))?$data->id:$_GET["actualizar"];
    $doc=$data->doc;
	$name=$data->name;
    $lastname=$data->lastname;
    $age=$data->age;
    $genre=$data->genre;
    $eps=$data->eps;
    $tp=$data->tp;
    $ptt=$data->ptt;
    $atiii=$data->atiii;
    $tt=$data->tt;
    $fibrinogeno=$data->fibrinogeno; 
	$sqlPatient = mysqli_query($conexionBD, "UPDATE patients SET doc='$doc', name='$name', lastname='$lastname', age='$age', genre='$genre', eps='$eps', tp='$tp', ptt='$ptt', atiii='$atiii', tt='$tt', fibrinogeno='$fibrinogeno' WHERE id='$id'");
	echo json_encode(["success"=>1 ]);
	exit();
    
}

/*
	Muestra todos los registros almacenados en la tabla patients, usando la URL raíz.
*/
$patients = mysqli_query($conexionBD,"SELECT * FROM patients ");
if(mysqli_num_rows($patients) > 0){
    $patients_ = mysqli_fetch_all($patients,MYSQLI_ASSOC);
    echo json_encode($patients_);}
    else{ echo json_encode([["success"=>0]]); }
?>