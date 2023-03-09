<div class="container mt-3">
    <!-- alert message -->
    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <!-- button trigger modal -->
            <button type="button" class="btn btn-primary d-flex addButton" data-bs-toggle="modal" data-bs-target="#formModal">
                <span class="material-symbols-outlined">
                    add
                </span>
                Add character
            </button>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <form action="<?= BASEURL; ?>/characters/search" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search character here..." name="keyword" id="keyword">
                    <button class="btn btn-primary" type="submit" id="search-button" autocomplete="off">Search</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <h3>Character List</h3>
            <ul class="list-group">
                <?php foreach ($data["characters"] as $character) : ?>
                    <li class="list-group-item">
                        <?= $character["name"] ?>
                        <a href="<?= BASEURL ?>/characters/delete/<?= $character["id"] ?>" class="btn btn-danger float-end ms-2 d-flex" onclick="return confirm('are you sure want to delete this?')">
                            <span class="material-symbols-outlined">delete</span>
                        </a>
                        <a href="<?= BASEURL ?>/characters/edit/<?= $character["id"] ?>" class="btn btn-dark float-end ms-2 d-flex displayEditModal" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $character["id"] ?>">
                            <span class="material-symbols-outlined">edit</span>
                        </a>
                        <a href="<?= BASEURL ?>/characters/detail/<?= $character["id"] ?>" class="btn btn-info float-end d-flex">
                            <span class="material-symbols-outlined">info</span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="formModalLabel">Insert Data Character</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <!-- Form -->
                <form action="<?= BASEURL; ?>/characters/add" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="character name">
                    </div>
                    <div class="mb-3">
                        <label for="nickname" class="form-label">Nickname</label>
                        <input type="text" class="form-control" id="nickname" name="nickname" placeholder="character nickname">
                    </div>
                    <div class="mb-3">
                        <label for="anime" class="form-label">Anime</label>
                        <input type="text" class="form-control" id="anime" name="anime" placeholder="from anime">
                    </div>
                    <div class="mb-3">
                        <label for="manga" class="form-label">Manga</label>
                        <input type="text" class="form-control" id="manga" name="manga" placeholder="from manga">
                    </div>
                    <div class="mb-3">
                        <label for="seiyuu" class="form-label">Voice Actor (JP)</label>
                        <input type="text" class="form-control" id="seiyuu" name="seiyuu" placeholder="japanese voice actor">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" rows="3" name="description" placeholder="tell about the character"></textarea>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>