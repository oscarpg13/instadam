<style>
    .card-title-link {
        color: inherit; /* Hereda el color del texto del contenedor padre */
        text-decoration: none; /* Quita el subrayado del enlace */
    }
</style>

<div class="col-md-4">
    <div class="card h-100" style="width: 85%;">
        <a href="#" data-bs-toggle="modal" data-bs-target="#postModal<?= $post['id'] ?>" class="card-title-link">
            <img src="<?= $post['image_url'] ?>" alt="post" class="post img-fluid">
            <div class="card-body" style="text-align: center">
                <h4 class="card-title card-title-link"><?= $post['title'] ?></h4>
            </div>
        </a>
        <!-- Botón de Bootstrap para guardar la foto -->
        <form method="POST" onsubmit="savePost(event,this)">
            <input type="hidden" name="id" value="<?= $post['id'] ?>">
            <?php
            $photo_id = $post['id'];
            $is_saved = isPhotoSaved($photo_id);
            ?>
            <button type="submit" class="btn <?= $buttonClass ?> w-100" name="guardarFoto" <?= $is_saved ? '' : '' ?>>
                <i class="<?= $is_saved ? 'fas fa-heart text-danger' : 'far fa-heart' ?>"></i>
            </button>
        </form>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="postModal<?= $post['id'] ?>" tabindex="-1" aria-labelledby="postModalLabel<?= $post['id'] ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="postModalLabel<?= $post['id'] ?>"><?= $post['title'] ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="<?= $post['image_url'] ?>" alt="post" class="post img-fluid">
                <p class="mt-3"><?= $post['description'] ?></p>
            </div>
        </div>
    </div>
</div>
