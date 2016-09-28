<?php
session_start();

if(isset($_GET['action']))
{
	if($_GET['action']=="deco")
	{
		session_destroy();
		header('Location:index.php');
	}	
}
?>