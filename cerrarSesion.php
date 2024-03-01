<?php
// Inicia la sesión.
session_start();

// Destruye todas las variables de sesión.
session_destroy();

// Redirige al usuario al inicio de sesión o a la página principal.
header('Location: index.php');
exit();
?>