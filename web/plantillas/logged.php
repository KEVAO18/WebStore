<?php

use App\Core\SessionManager;
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $_ENV['APP_NAME'] ?></title>
    <link href="<?= $_ENV['APP_BASE_URL'] ?>vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= $_ENV['CSS_FOLDER'] ?>principal.css">
    <link rel="stylesheet" href="<?= $_ENV['CSS_FOLDER'] ?>color.css">
    <link rel="icon" type="image/x-icon" href="<?= $_ENV['APP_ICON'] ?>">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-text-ligth border-bottom">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= $_ENV['APP_BASE_URL'] ?>">
                <?= $_ENV['APP_NAME'] ?>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navItems" aria-controls="navItems" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navItems">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?= $_ENV['APP_BASE_URL'] ?>">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Productos
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?= $_ENV['APP_BASE_URL'] ?>Productos">Todos</a></li>
                            <li><a class="dropdown-item" href="<?= $_ENV['APP_BASE_URL'] ?>Productos/filtro/nuevos">Nuevos</a></li>
                            <li><a class="dropdown-item" href="<?= $_ENV['APP_BASE_URL'] ?>Productos/filtro/top-ventas">Mas Vendidos</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?=(new SessionManager())->get('user_name')?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?= $_ENV['APP_BASE_URL'] ?>perfil">Perfil</a></li>
                            <li><a class="dropdown-item" href="<?= $_ENV['APP_BASE_URL'] ?>facturas">Mis Facturas</a></li>
                            <li><a class="dropdown-item" href="<?= $_ENV['APP_BASE_URL'] ?>cerrar">Cerrar sesión</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer class="container border-top mt-4" id="footer">
        <div class="row text-footer py-3 text-center">
            <div class="col-md-4 col-sm-12">
                <a class="text-decoration-none color-seco" href="">Sobre Nosotros</a>
            </div>
            <div class="col-md-4 col-sm-12">
                <a class="text-decoration-none color-seco" href="">Politica de privacidad</a>
            </div>
            <div class="col-md-4 col-sm-12">
                <a class="text-decoration-none color-seco" href="">Terminos y condiciones</a>
            </div>
        </div>
        <div class="row text-footer py-3 text-center">
            <div class="col-12">
                <a class="text-decoration-none color-seco px-2" href="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                    </svg>
                </a>
                <a class="text-decoration-none color-seco px-2" href="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                    </svg>
                </a>
                <a class="text-decoration-none color-seco px-2" href="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-square" viewBox="0 0 16 16">
                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
                    </svg>
                </a>
            </div>
        </div>
        <div class="text-center color-seco py-4">
            <span class="">&copy; 2025 <?= $_ENV['APP_NAME'] ?></span>
        </div>
    </footer>
    <script src="<?= $_ENV['APP_BASE_URL'] ?>vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>