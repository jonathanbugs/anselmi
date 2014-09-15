<?php
session_start();
$_SESSION['sessionCodigoMoIP'] = $_REQUEST['CodigoMoIP'];
$_SESSION['sessionStatusMoIP'] = $_REQUEST['Status'];

?>