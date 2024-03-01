<!DOCTYPE html>
<html>

<head>
    <title>Instadam</title>
    <?php include 'components/head.php'; ?>

    <!-- https://picsum.photos/v2/list -->
</head>

<body>
    <?php include 'components/navbar.php'; ?>
    <?php include 'db/db.php'; ?>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['imagen'])) { 
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];
            $imagen_url = $_POST['imagen']; 
            $id_usuario = 1; 
    
            if (uploadPhoto($id_usuario, $titulo, $descripcion, $imagen_url)) {
                echo "La foto se ha subido correctamente.";
            } else {
                echo "Error al subir la foto.";
            }
        } else {
            echo "Error: No se proporcionó ninguna URL de imagen.";
        }
    }
    ?>

    <div class="row">
        <div class="col-md-12">
            <section class="vh-80" style="background-color: #f4f5f7;">
                <div class="container py-5 h-80">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col col-lg-8 mb-8 mb-lg-0">
                            <div class="card mb-3" style="border-radius: .5rem;">
                                <div class="row g-0">
                                    <div class="col-md-4 gradient-custom text-center text-white"
                                        style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                        <img src="assets/img/toro3.png" alt="Avatar" class="img-fluid my-5"
                                            style="width: 200px;" />
                                        <h5 style="color: black">Oscar Prieto</h5>
                                        <p style="color: black">Web Designer</p>
                                        <!-- Botón de Subir Foto -->
                                        <button class="btn btn-primary mb-4" data-bs-toggle="modal"
                                            data-bs-target="#subirFotoModal">Subir Foto</button>


                                        <!-- Modal para subir foto -->
                                        <div class="modal fade" id="subirFotoModal" tabindex="-1"
                                            aria-labelledby="subirFotoModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="subirFotoModalLabel">Subir Foto</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Formulario para subir foto -->
                                                        <form style="color: black"
                                                            action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST"
                                                            enctype="multipart/form-data">
                                                            <div class="mb-3">
                                                                <label for="titulo" class="form-label">Título</label>
                                                                <input type="text" class="form-control" id="titulo"
                                                                    name="titulo">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="descripcion"
                                                                    class="form-label">Descripción</label>
                                                                <textarea class="form-control" id="descripcion"
                                                                    name="descripcion"></textarea>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="imagen" class="form-label">Imagen</label>
                                                                <input type="text" class="form-control" id="imagen"
                                                                    name="imagen">
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Subir</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="card-body p-4">
                                            <h6>Information</h6>
                                            <hr class="mt-0 mb-4">
                                            <div class="row pt-1">
                                                <div class="col-6 mb-3">
                                                    <h6>Email</h6>
                                                    <p class="text-muted">opg1394@gmail.com</p>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <h6>Phone</h6>
                                                    <p class="text-muted">123 456 789</p>
                                                </div>
                                            </div>
                                            <h6>Projects</h6>
                                            <hr class="mt-0 mb-4">
                                            <div class="row pt-1">
                                                <div class="col-6 mb-3">
                                                    <h6>Recent</h6>
                                                    <p class="text-muted">Lorem ipsum</p>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <h6>Most Viewed</h6>
                                                    <p class="text-muted">Dolor sit amet</p>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <a href="#!"><i class="fab fa-facebook-f fa-lg me-3"></i></a>
                                                <a href="#!"><i class="fab fa-twitter fa-lg me-3"></i></a>
                                                <a href="#!"><i class="fab fa-instagram fa-lg"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col col-lg-4 mb-4 mb-lg-0">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim sit repudiandae neque
                                accusamus libero a quaerat tenetur, quod, facere voluptatum laborum quo! Dolores omnis
                                velit nemo reiciendis temporibus non ullam.</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Profile</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane"
                type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Favoritas</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active mt-3" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
            tabindex="0">
            <div class="container">
                <div class="row g-3">
                    <?php
                    $posts = getPostsId(1);
                    foreach ($posts as $post) {
                        ?>
                        <?php include 'components/card.php'; ?>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="tab-pane fade mt-3" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
            tabindex="0">
            <div class="container mt-3" style="margin-top: 30px;">
                <div class="row g-3">
                    <?php
                    if (empty($_SESSION['saved'])) {
                        ?>
                        <div>
                            <p>No tienes fotos guardadas</p>
                        </div>
                        <?php
                    } else {
                        foreach (($_SESSION['saved']) as $post) {

                            ?>
                            <?php include 'components/card.php'; ?>
                        <?php }
                    } ?>
                </div>
            </div>
        </div>
    </div>
    <?php include 'components/scripts.php'; ?>
    <?php include 'components/footer.php'; ?>
</body>

</html>