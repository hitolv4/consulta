<?php

$tipo = $_POST['tipo'];
$ci = $_POST['ci'];
$arr = array();
$arr2=array();

$con = " (DESCRIPTION =
    (ADDRESS_LIST =
      (ADDRESS = (PROTOCOL = TCP)(HOST = shdb )(PORT = 1521))
    )
    (CONNECT_DATA =
      (SID = DESA10)
    )
  )";

    $conn = oci_connect("RAVVICTO_SQL", "sh6524#PROG", $con);
	if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	}

	$stid = oci_parse($conn, "SELECT nomter,apeter FROM tercero where numid='$ci' and tipoid ='$tipo'");
oci_execute($stid);

while (($row = oci_fetch_all ($stid,$res)) != false) { // Ignore NULLs
  $json1 =  json_encode($res);
    
}

$sql= oci_parse($conn, "SELECT ase.stsaseg, pol.codpol, pol.numpol, pol.fecinivig, pol.fecfinvig, pol.idepol FROM acsel.asegurado ase
INNER JOIN acsel.poliza pol
    ON pol.idepol = ase.idepol    
where ase.codcli =(SELECT codcli FROM acsel.cliente where numid ='$ci' and tipoid ='$tipo') and codramocert in ('0424','0425') and stsaseg <> 'ANU' 
order by  pol.fecfinvig DESC" );
    oci_execute($sql);
    while (($line = oci_fetch_all($sql, $res1)) != false) {
    
    $json2 = json_encode($res1);
     }

$arr[] = json_decode($json1,true);
$arr[] = json_decode($json2,true);
$json_merge = json_encode($arr);

echo $json_merge;
?>

   
