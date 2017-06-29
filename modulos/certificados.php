<?php

$poliza = $_POST['poliza'];
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

	$stid = oci_parse($conn, "select cert.stscert, cert.numcert, cert.codclifact, cert.desccert, cert.fecing,cert.fecexc, ramo.stscertramo, ramo.codramocert, lval.descrip,ramo.fecexc, ramo.codplan, ramo.revplan, pla.descplanprod
  from cert_ramo ramo
INNER JOIN certificado cert
    ON cert.idepol =ramo.idepol
INNER JOIN acsel.plan_prod pla
     ON pla.codplan = ramo.codplan
    AND pla.revplan = ramo.revplan
INNER JOIN acsel.lval
    ON lval.codlval = ramo.codramocert
    and lval.tipolval = 'RAMOPROG'
  where ramo.idepol ='$poliza'and ramo.codramocert in ('0424','0425')");
oci_execute($stid);

while (($row = oci_fetch_all ($stid,$res)) != false) { // Ignore NULLs
  $json1 =  json_encode($res);
}


$sql= oci_parse($conn, "select ase.stsaseg, cli.tipoid, ter.numid, ter.dvid, ter.apeter, ter.nomter, cli.fecnac, ase.fecing, lval.descrip, ase.ideaseg from acsel.asegurado ase
INNER JOIN  acsel.cliente cli
    ON cli.codcli = ase.codcli
INNER JOIN acsel.tercero ter
    ON ter.numid = cli.numid
INNER JOIN acsel.lval
    ON lval.codlval =ase.codparent
   AND lval.tipolval='PARENT'
WHERE ase.codramocert in ('0424','0425') and ase.idepol ='$poliza'
order by descrip ASC" );
    oci_execute($sql);
    while (($line = oci_fetch_all($sql, $res1)) != false) {
    
    $json2 = json_encode($res1);
     }

$arr2[] = json_decode($json1,true);
$arr2[] = json_decode($json2,true);
$json_merge = json_encode($arr2);

echo $json_merge;

?>


