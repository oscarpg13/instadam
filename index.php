<!DOCTYPE html>
<html>

<head>
    <title>Instadam</title>
    <?php include 'components/head.php'; ?>
    <!-- https://picsum.photos/v2/list -->
</head>

<body>

    <?php include 'db/db.php'; ?>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['guardarFoto'])) {
        $id_post = $_POST['id'];
        $foto = getIdPost($id_post);
        guardarFoto($foto);
        echo '<div class="alert alert-success" role="alert">Foto añadida a guardados</div>';
    }
    ?>
    <?php include 'components/navbar.php'; ?>
    <div class="container mt-5">
        <div class="row g-3">
            <?php
            $posts = getPosts();
            foreach ($posts as $post) {
                ?>
                <?php include 'components/card.php'; ?>
            <?php } ?>
        </div>
    </div>
    <?php include 'components/scripts.php'; ?>
    <?php include 'components/footer.php'; ?>
</body>
</html>