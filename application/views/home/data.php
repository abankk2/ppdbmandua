<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
<div class="container py-2">
    <div class="row justify-content-center">
        <h1 class="text-center">DATA PENDAFTAR</h1>
        <h4 class="text-center mb-3">PPDB MAN 2 KOTA CIREBON TAHUN 2024/2025</h4>

        <div class="col-md-10">
            <div class="shadow p-3 card">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                        <thead class="bg-success text-white">
                            <tr>
                                <th scope="col" class="text-center">No</th>
                                <th scope="col">No Daftar</th>
                                <th scope="col">Nama</th>
                                <th scope="col">NISN</th>
                                <th scope="col">Sekolah Asal</th>
                                <th scope="col" class="text-center">Jalur Masuk</th>
                                <th scope="col" class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1; ?>
                            <?php foreach ($siswa as $sis) : ?>
                                <tr>
                                    <th scope="row" class="text-center"><?= $i; ?></th>
                                    <td><?= $sis['no_daftar']; ?></td>
                                    <td><?= $sis['nama_siswa']; ?></td>
                                    <td><?= $sis['nisn']; ?></td>
                                    <td><?= $sis['asal_sekolah']; ?></td>
                                    <td class="text-center"><?php if ($sis['jalur'] == 1) { ?>
                                            Prestasi
                                        <?php } else if ($sis['jalur'] == 2) { ?>
                                            Reguler
                                        <?php } ?>
                                    </td>
                                    <td class="text-center"><?php if ($sis['kunci'] == 1) { ?>
                                            <i class="fa-solid fa-user-lock text-success"></i>
                                        <?php } else if ($sis['kunci'] == 0) { ?>
                                            <i class="fa-solid fa-user-clock text-danger"></i>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>



<script>
    $('#example').DataTable({
        buttons: [
            'copy', 'excel', 'pdf'
        ]
    });
</script>