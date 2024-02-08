<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="<?= BASE_URL; ?>">PHP MVC</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="<?= BASE_URL; ?>/admin">Home</a>
                <a class="nav-link" href="<?= BASE_URL; ?>/about">About</a>
                <a class="nav-link" href="<?= BASE_URL; ?>/siswa">Siswa</a>
                <a class="nav-link" href="<?= BASE_URL; ?>/logout" onclick="return confirm('are you sure want to logout?')">Logout</a>
                <a class="nav-link"><?= $_SESSION['email'] ?></a>
            </div>
        </div>
    </div>
</nav>