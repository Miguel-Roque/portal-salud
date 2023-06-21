<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/sidedar.css">
    <link rel="stylesheet" href="css/Normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/be8767db7f.js" crossorigin="anonymous"></script>
    <link rel="icon" href="img/logo.ico">
    <title>Portal Salud</title>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar__header">
            <img src="img/logo.png" alt="logo" class="logoimg">
            <span class="logotitle">Portal Salud</span>
        </div>
        <div class="sidebar__contend">
            <ul class="sidedar__ul-contend">
                <li class="sidedar__li-contend"> <!--le-conteng-acive-->
                    <a href="index.php" class="sidedar__link">
                        <i class="fa-solid fa-house-chimney fai"></i>Inicio
                    </a>
                </li>
                <li class="sidedar__li-contend">
                    <a href="progreso.php" class="sidedar__link" onclick="submenuOpen0()">
                        <i class="fa-solid fa-trophy fai"></i>Progreso
                    </a>
                </li>
                <li class="sidedar__li-contend">
                    <a href="platillos.php" class="sidedar__link" onclick="submenuOpen0()">
                        <i class="fa-solid fa-utensils fai"></i></i>Platillos saludables
                    </a>
                </li>
                <li class="sidedar__li-contend">
                    <a href="platillos.php" class="sidedar__link" onclick="submenuOpen0()">
                        <i class="fa-solid fa-dumbbell fai"></i></i>Actividad Física
                    </a>
                </li>
                <li class="sidedar__li-contend">
                    <a href="#" class="sidedar__link">
                        <i class="fa-solid fa-pen fai"></i>Agendar cita
                    </a>
                </li>
                <li class="sidedar__li-contend">
                    <a href="#" class="sidedar__link">
                    <i class="fa-solid fa-bell fai"></i>Respuestas
                    </a>
                </li>
            </ul>
        </div>
        <div class="sidebar__footer">
            <img src="img/perfil.png" alt="perfil" class="perfilimg">
            <div>
                <span class="perfilname">Angel Roque</span>
                <span class="perfilocupation">Usuario</span>
            </div>
            <i class="fa-solid fa-gear"></i>
        </div>
    </div>
    <section class="home-section">