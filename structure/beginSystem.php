<?php 
session_start();

include("../pahts/pathsPHP.php");

if ( !isset($_SESSION['userLog'])) {

	include(rootBegin.HEADERS);
	include(rootBegin.VI_PRIMARY);
	include(rootBegin.FOOTERS);

}else {
	header("Location: ".root.VI_LOGIN);

}