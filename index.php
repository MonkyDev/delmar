<?php
session_start();

include("pahts/pathsPHP.php");

if( !isset($_SESSION['usuario']) )
	header("Location: ".BEGIN_START);

else
	header("Location: ".VI_LOGIN);

