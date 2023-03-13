<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script>
    $(document).ready(function() {
        $("#provinsi").change(function() {
            var url = "<?php echo site_url('auth/add_ajax_kab'); ?>/" + $(this).val();
            $('#kabupaten').load(url);
            return false;
        })

        $("#kabupaten").change(function() {
            var url = "<?php echo site_url('auth/add_ajax_kec'); ?>/" + $(this).val();
            $('#kecamatan').load(url);
            return false;
        })

        $("#kecamatan").change(function() {
            var url = "<?php echo site_url('auth/add_ajax_des'); ?>/" + $(this).val();
            $('#desa').load(url);
            return false;
        })

    });
</script>

<div class="row">
    <?= $this->session->flashdata('message'); ?>
    <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
            <div class="card-body">
                <div class="dash-widget-header">
                    <span class="dash-widget-icon bg-1">
                        <i class="fa-solid fa-school"></i>
                    </span>
                    <div class="dash-count">
                        <div class="dash-title">Jumlah Sekolah</div>
                        <div class="dash-counts">
                            <p><?= number_format($jm_sekolah, 0, '', '.'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12">
        <div class="card" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <div class="card-body">
                <div class="dash-widget-header">
                    <span class="dash-widget-icon bg-2">
                        <i class="fa-solid fa-school-circle-check"></i>
                    </span>
                    <div class="dash-count">
                        <div class="dash-title">Tambah Sekolah</div>
                        <div class="dash-counts">
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-8">
    </div>
    <div class="col-md-4 mb-3">
        <div class="form-inline my-2 my-lg-0">
            <?= form_open('admin/cari_sekolah'); ?>
            <div class="input-group">
                <input class="form-control mr-sm-2" name="keyword" type="number" placeholder="NPNS/NSM" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                    <a href="<?= base_url('admin/sekolah'); ?>" class="btn btn-outline-warning">Reset</a>
                </div>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
    <div class="col-md-12">
        <div class="shadow p-3 card">
            <div class="table-responsive">
                <table class="table">
                    <thead class="bg-success text-white">
                        <tr>
                            <th scope="col" class="text-center">No</th>
                            <th scope="col">NPSN/NSM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kecamatan</th>
                            <th scope="col">Kabupaten</th>
                            <th scope="col">Provinsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1; ?>
                        <?php foreach ($sekolah as $sek) : ?>
                            <tr>
                                <th scope="row" class="text-center"><?= $i; ?></th>
                                <td><?= $sek['id_skolah']; ?></td>
                                <td><?= $sek['nama_sekolah']; ?></td>
                                <td><?= $sek['kecamatan']; ?></td>
                                <td><?= $sek['kabupaten']; ?></td>
                                <td><?= $sek['provinsi']; ?></td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Sekolah</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url('admin/aksi_sekolah'); ?>">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <select name="provinsi" class="form-select form-select" id="provinsi">
                                <option>- Pilih Provinsi -</option>
                                <?php
                                foreach ($provinsi as $prov) {
                                    echo '<option value="' . $prov->id . '">' . $prov->provinsi . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="kabupaten" class="form-select form-select" id="kabupaten" required>
                                    <option>Pilih Kabupaten</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="kecamatan" class="form-select form-select" id="kecamatan">
                                    <option selected disabled>Pilih Kecamatan</option>
                                </select>
                            </div>
                        </div>

                        <small class="text-primary mb-3"><i class="fa-solid fa-triangle-exclamation"></i> Pastikan Nomor NPSN/NSM Sudah Sesuai</small>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="nama_sekolah" placeholder="Nama Sekolah" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="number" class="form-control form-control-user" name="id_skolah" placeholder="NPSN/NSM" required>
                                <?= form_error('id_skolah', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>

                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Tambah Data Sekolah</button>
            </div>
            </form>
        </div>
    </div>
</div>