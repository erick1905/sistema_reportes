<?php
session_start();
session_destroy();
header('Location: /sistema_reportes/Login/Login.html');
