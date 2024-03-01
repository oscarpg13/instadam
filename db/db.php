<?php
include 'config.php';

function getPosts()
{
    $conn = connectDB();
    $sql = "SELECT * FROM posts";
    $result = mysqli_query($conn, $sql);
    $posts = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $posts[] = $row;
        }
    }
    mysqli_close($conn);
    return $posts;
}

function getPostsId($id)
{
    $conn = connectDB();
    $sql = "SELECT * FROM posts WHERE id_usuario = $id";
    $result = mysqli_query($conn, $sql);
    $posts = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $posts[] = $row;
        }
    }
    mysqli_close($conn);
    return $posts;
}
function uploadPhoto($id_usuario, $titulo, $descripcion, $nombreArchivo)
{
    $conn = connectDB();

    // Escapamos los valores para prevenir inyección SQL
    $titulo = mysqli_real_escape_string($conn, $titulo);
    $descripcion = mysqli_real_escape_string($conn, $descripcion);
    $nombreArchivo = mysqli_real_escape_string($conn, $nombreArchivo);

    $sql = "INSERT INTO posts (id_usuario, title, description, image_url) VALUES ('$id_usuario', '$titulo', '$descripcion', '$nombreArchivo')";
    
    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        return true; // Éxito al subir la foto
    } else {
        mysqli_close($conn);
        return false; // Error al subir la foto
    }
}

function getIdPost($id){
    $conn = connectDB();
    $sql = "SELECT * FROM posts WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $posts = null;
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $posts = $row;
        }
    }
    mysqli_close($conn);
    return $posts;
}
function guardarFoto($foto)
{
    if (!isset($_SESSION['saved'])) {
        $_SESSION['saved'] = [];
    }

    $index = array_search($foto['id'], array_column($_SESSION['saved'], 'id'));

    if ($index !== false) {
        unset($_SESSION['saved'][$index]);
    } else {
        $_SESSION['saved'][] = $foto;
    }

    $_SESSION['saved'] = array_values($_SESSION['saved']);
}

function isPhotoSaved($photo_id) {
    if (!isset($_SESSION['saved']) || empty($_SESSION['saved'])) {
        return false; // No hay fotos guardadas
    }

    foreach ($_SESSION['saved'] as $saved_photo) {
        if ($saved_photo['id'] === $photo_id) {
            return true; // La foto está guardada
        }
    }

    return false; // La foto no está guardada
}
?>