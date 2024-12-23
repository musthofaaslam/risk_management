
<div class="row">
    <div class="col-lg-6">
        <?php Flasher::flash(); ?>
    </div>
</div>

<div class="container-fluid mt-5">
    <!-- Flex container untuk judul dan tombol -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Daftar Mitigasi</h2>
        <a href="<?= BASEURL; ?>/mitigasi/buat" class="btn btn-success">Tambah Mitigasi</a>
    </div>

    <?php if (!empty($data['mitigasi'])): ?>
        <div class="table-responsive">
            <table class="table table-hover table-striped shadow">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Departemen</th>
                        <th>Rencana</th>
                        <th>Pembuatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no = 1; // Inisialisasi penghitung baris ?>
                    <?php foreach ($data['mitigasi'] as $mitigasi) : ?>
                        <tr>
                            <td><?= $no++; ?></td> <!-- Menampilkan nomor urut -->
                            <td><?= htmlspecialchars($mitigasi['pemilik_resiko']); ?></td>
                            <td><?= htmlspecialchars($mitigasi['rencana_mitigasi']); ?></td>
                            <td><?= htmlspecialchars($mitigasi['pembuatan']); ?></td>
                            <td>
                                <a href="<?= BASEURL; ?>/mitigasi/detail/<?= $mitigasi['id']; ?>" class="btn btn-info btn-sm" title="Detail">
                                    <i class="fas fa-eye"></i> Detail
                                </a>
                                <a href="<?= BASEURL; ?>/mitigasi/ubah/<?= $mitigasi['id']; ?>" class="btn btn-warning btn-sm tampilUbah" title="Ubah">
                                    <i class="fas fa-edit"></i> Ubah
                                </a>
                                <a href="<?= BASEURL; ?>/mitigasi/hapus/<?= $mitigasi['id']; ?>" class="btn btn-danger btn-sm" title="Hapus" onclick="return confirm('Yakin ingin menghapus data ini?');">
                                    <i class="fas fa-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="alert alert-info" role="alert">
            Tidak ada data risiko yang tersedia.
        </div>
    <?php endif; ?>
</div>

<!-- Link CSS Bootstrap dan FontAwesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<style>
    body {
        background-color: #f8f9fa;
    }

    .table {
        margin-top: 20px;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    }

    .table th {
        text-align: center;
        vertical-align: middle;
        font-size: 16px;
        font-weight: 600;
    }

    .table td {
        text-align: center;
        vertical-align: middle;
        font-size: 14px;
        padding: 15px;
    }

    .table td.text-right {
        text-align: right; /* Menempatkan tombol di kanan */
    }

    .btn-sm {
        padding: 5px 10px;
        font-size: 12px;
        border-radius: 5px;
    }

    .btn-info, .btn-warning, .btn-danger {
        border: none;
    }

    /* Flexbox untuk tombol agar berada di kanan */
    .table .btn-group {
        display: flex;
        justify-content: flex-end;
        gap: 5px;
    }
</style>
