<?php 
$conn = oci_connect('RAVVICTO_SQL', 'sh6524#PROG', '172.24.102.9');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}
 ?>