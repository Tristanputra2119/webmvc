<div class="container mt-5">
    <div class="card" style="width: 18rem">
        <div class="card-body">
            <h5 class="card-title"><?= $data['mhs']['nama'] ?></h5>
            <h6 class="card-subtitle mb-2 text-muted">
                <?= $data['mhs']['jurusan']; ?>
            </h6>
            <p class="card-text">
            <?= $data['mhs']['kelas']?>
            <img src="<?=BASE_URL?>/img/upload/<?=$data['mhs']['image']?>" alt="" srcset="" class="img-fluid">
            </p>
            <a href="<?= BASE_URL; ?>/siswa" class="card-link">back</a>
        </div>
    </div>
</div>