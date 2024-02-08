<div class="container mt-3">
    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>


    <div class="row mb-3">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary tombolTambahData" data-bs-toggle="modal" data-bs-target="#formModal">
                Tambah data siswa
            </button>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <form action="<?= BASE_URL; ?>/siswa/cari" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="cari siswa..." name="keyword" id="keyword" autocomplete="off">
                    <button class="btn btn-primary" type="submit" id="tombol-cari">Search</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <h3>Daftar siswa</h3>
            <ul class="list-group">
                <?php foreach ($data['mhs'] as $mhs) : ?>
                    <li class="list-group-item">
                        <?= $mhs['nama'] ?>
                        <a href="<?= BASE_URL ?>/siswa/hapus/<?= $mhs['id'] ?>" id="btn" class="badge bg-danger float-end ms-2" onclick="return confirm('yakin?')">delete</a>
                        <a href="<?= BASE_URL; ?>/siswa/detail/<?= $mhs['id'] ?>" id="btn" class="badge bg-primary float-end ms-2">detail</a>
                        <a href="<?= BASE_URL; ?>/siswa/update/<?= $mhs['id'] ?>" id="btn" class="badge bg-success float-end ms-2 tampilModalUbah" data-bs-target="#formModal" data-id="<?= $mhs['id']; ?>" data-bs-toggle="modal">edit</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<!-- Insert data -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Tambah data siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASE_URL; ?>/siswa/tambah" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group my-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="form-group my-3">
                        <label for="kelas" class="form-label">Kelas</label>
                        <input type="text" class="form-control" id="kelas" name="kelas" required>
                    </div>
                    <div class="form-group my-3">
                        <label for="kelas" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                        <img id="preview" class="img-fluid">
                    </div>
                    <div class="form-group my-3">
                        <label for="jurusan" class="form-label">Jurusan</label>
                        <select class="form-select" id="jurusan" name="jurusan" required>
                            <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                            <option value="Teknik Komputer Jaringan">Teknik Komputer Jaringan</option>
                            <option value="Multimedia">Multimedia</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan data</button>
                </form>
            </div>
        </div>
    </div>
</div>