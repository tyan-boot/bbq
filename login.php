<?php
if (isset($_POST["user"]))
{
	if (isset($_POST["passwd"]))
	{
		if ($_POST["user"]=="boot" && $_POST["passwd"]=="******")
		{
			setcookie("login","yes",time()+1800);
			Header("Location: admin.php");
		}
		else Header("Location: admin.php");
	}
}
