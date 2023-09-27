<div class="container">
    <h3 class="mb-3">Daftar Peminjaman</h3>

    <div class="d-flex justify-content-between">
        <div>
            <a href="<?= BASE_URL; ?>/pinjam/tambah" class="btn btn-primary float-right">Tambah Peminjaman</a>
        </div>
        <div class="d-flex">
            <form action="<?= BASE_URL; ?>/pinjam/cari" method="post" class="d-flex">
                <input type="text" class="form-control" name="search">
                <button type="submit" class="btn btn-outline-secondary">Cari</button>
            </form>
            <a href="<?= BASE_URL; ?>/pinjam/index" class="btn btn-outline-danger">reset</a>
        </div>
    </div>


    <br><br>
    <table class="table table-success table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Peminjam</th>
                <th scope="col">Jenis Barang</th>
                <th scope="col">Nomor Barang</th>
                <th scope="col">Tanggal Pinjam</th>
                <th scope="col">Tanggal Kembali</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data['pinjam'] as $row) : ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $row['nama_peminjam']; ?></td>
                    <td><?= $row['jenis_barang']; ?></td>
                    <td><?= $row['no_barang']; ?></td>
                    <td><?= $row['tgl_pinjam']; ?></td>
                    <td><?= $row['tgl_kembali']; ?></td>
                    <td>
                        <?php if (date('Y-m-d', strtotime($row["tgl_kembali"])) == date('Y-m-d', strtotime($row['tgl_pinjam']))) : ?>
                            <div class="btn btn-success text-white">Sudah Kembali</div>
                        <?php else : ?>
                            <div class="btn btn-danger text-white">Belum Kembali</div>
                        <?php endif ?>
                    </td>
                    <td>
                        <?php if (date('Y-m-d', strtotime($row["tgl_kembali"])) != date('Y-m-d', strtotime($row['tgl_pinjam']))) : ?>
                            <a href="<?= BASE_URL ?>/pinjam/edit/<?= $row['id'] ?>" class="btn btn-primary">Edit</a>
                        <?php endif ?>
                        <a href="<?= BASE_URL ?>/pinjam/hapus/<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Hapus data?');">Hapus</a>
                    </td>
                </tr>

            <?php $no++;
            endforeach; ?>
        </tbody>
    </table>
</div>