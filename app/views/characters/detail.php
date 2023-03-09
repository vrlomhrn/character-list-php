<div class="container mt-5">
    <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
        <div class="card-body">
            <h5 class="card-title"><?= $data["characters"]["name"] ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?= $data["characters"]["nickname"] ?></h6>
            <p class="card-text">Anime: <?= $data["characters"]["anime"] ?></p>
            <p class="card-text">Manga: <?= $data["characters"]["manga"] ?></p>
            <p class="card-text">Seiyuu: <?= $data["characters"]["seiyuu"] ?></p>
            <p class="card-text">Description: <?= $data["characters"]["description"] ?></p>
            <a href="<?= BASEURL; ?>/characters" class="card-link btn btn-primary">Back</a>
        </div>
    </div>
</div>