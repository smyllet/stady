<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/entete.css">
    <link rel="stylesheet" type="text/css" href="css/global.css">
	<title><?php echo $title?></title>
<body>
    <nav id="mainnav"> 
        <label id="logo"><img src="image/logo1.png"></label>
        <ul>
        	<li><a href="?action=dashboard">Accueil</a></li>
        	<li><a href="?action=carnetEleve">Carnet d'élèves</a></li>
            <li><a href="?action=stages">Stages</a></li>
        	<li><a href="#">Agenda</a></li>
            <li><a href="?action=admin_pannel">Pannel Admin</a></li>
			<a href="#"><img src="image/iconuser.svg" id="user"></a>        
        </ul>

    </nav>