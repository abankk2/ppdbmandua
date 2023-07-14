<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Detail Siswa PPDB 2023</title>
    <meta content="" name="description">
    <meta content="Author" name="MJ Maraz">
    <link href="<?= base_url('assets/table/assets/'); ?>images/favicon.png" rel="icon">
    <link href="<?= base_url('assets/table/assets/'); ?>images/favicon.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <!-- ========================================================= -->


    <link rel="stylesheet" href="<?= base_url('assets/table/assets/'); ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/table/assets/'); ?>css/datatables.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/table/assets/'); ?>css/style.css">

    <script src='https://kit.fontawesome.com/76a945766d.js' crossorigin='anonymous'></script>

</head>
<!-- =============== Design & Develop By = MJ MARAZ   ====================== -->

<body>

    <!-- =======  Data-Table  = Start  ========================== -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="data_table">
                    <table id="example" class="table table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col" class="text-center">No</th>
                                <th scope="col" class="text-center">No PPDB</th>
                                <th scope="col">NISN</th>
                                <th scope="col">Nik</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Tempat Lahir</th>
                                <th scope="col">Tgl. Lahir</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Anak Ke</th>
                                <th scope="col">Saudara</th>
                                <th scope="col">Agama</th>
                                <th scope="col">Cita - Cita</th>
                                <th scope="col">No Whatsapp</th>
                                <th scope="col">Email</th>
                                <th scope="col">Hobi</th>
                                <th scope="col">Status Tinggal</th>
                                <th scope="col">Provinsi</th>
                                <th scope="col">Kab/Kota</th>
                                <th scope="col">Kec</th>
                                <th scope="col">Kel/Des</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Kordinat</th>
                                <th scope="col">Kodepos</th>
                                <th scope="col">Jarak</th>
                                <th scope="col">Waktu</th>
                                <th scope="col">Biaya Sekolah</th>
                                <th scope="col">Keb. Khusus</th>
                                <th scope="col">Keb. Desabilitas</th>
                                <th scope="col">TK</th>
                                <th scope="col">PAUD</th>
                                <th scope="col">Hepatitis</th>
                                <th scope="col">Polio</th>
                                <th scope="col">BCG</th>
                                <th scope="col">Campak</th>
                                <th scope="col">DPT</th>
                                <th scope="col">COVID</th>
                                <th scope="col">No KIP</th>
                                <th scope="col">No KKS</th>
                                <th scope="col">No PKH</th>
                                <th scope="col">No KK</th>
                                <th scope="col">Kep. Keluarga</th>
                                <th scope="col">Nama Ayah</th>
                                <th scope="col">Status Ayah</th>
                                <th scope="col">NIK Ayah</th>
                                <th scope="col">Tempat Lahir Ayah</th>
                                <th scope="col">Tgl. Lahir Ayah</th>
                                <th scope="col">Pendidikan Ayah</th>
                                <th scope="col">Pekerjaan Ayah</th>
                                <th scope="col">Pnghasilan Ayah</th>
                                <th scope="col">No Whatsapp Ayah</th>
                                <th scope="col">Status Tempat Tinggal Ayah</th>
                                <th scope="col">Provinsi Ayah</th>
                                <th scope="col">Kab/Kota Ayah</th>
                                <th scope="col">Kec Ayah</th>
                                <th scope="col">Kel/Des Ayah</th>
                                <th scope="col">ALamat Ayah</th>
                                <th scope="col">Nama Ibu</th>
                                <th scope="col">Status Ibu</th>
                                <th scope="col">NIK Ibu</th>
                                <th scope="col">Tempat Lahir Ibu</th>
                                <th scope="col">Tgl. Lahir Ibu</th>
                                <th scope="col">Pendidikan Ibu</th>
                                <th scope="col">Pekerjaan Ibu</th>
                                <th scope="col">Pnghasilan Ibu</th>
                                <th scope="col">No Whatsapp Ibu</th>
                                <th scope="col">Status Tempat Tinggal Ibu</th>
                                <th scope="col">Provinsi Ibu</th>
                                <th scope="col">Kab/Kota Ibu</th>
                                <th scope="col">Kec Ibu</th>
                                <th scope="col">Kel/Des Ibu</th>
                                <th scope="col">ALamat Ibu</th>
                                <th scope="col">Nama Wali</th>
                                <th scope="col">Status Wali</th>
                                <th scope="col">NIK Wali</th>
                                <th scope="col">Tempat Lahir Wali</th>
                                <th scope="col">Tgl. Lahir Wali</th>
                                <th scope="col">Pendidikan Wali</th>
                                <th scope="col">Pekerjaan Wali</th>
                                <th scope="col">Pnghasilan Wali</th>
                                <th scope="col">No Whatsapp Wali</th>
                                <th scope="col">Status Tempat Tinggal Wali</th>
                                <th scope="col">Provinsi Wali</th>
                                <th scope="col">Kab/Kota Wali</th>
                                <th scope="col">Kec Wali</th>
                                <th scope="col">Kel/Des Wali</th>
                                <th scope="col">ALamat Wali</th>
                                <th scope="col">Prov. Sekolah</th>
                                <th scope="col">Kab/Kota. Sekolah</th>
                                <th scope="col">Kec. Sekolah</th>
                                <th scope="col">Asal Sekolah</th>
                                <th scope="col">NPSN Sekolah</th>
                                <th scope="col">Tahun Lulus Sekolah</th>
                                <th scope="col">SKHUN</th>
                                <th scope="col">Ijazah</th>
                                <th scope="col">Gol. Darah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1; ?>
                            <?php foreach ($siswa as $sis) : ?>
                                <tr>
                                    <th scope="row" class="text-center"><?= $i; ?></th>
                                    <td> <?= $sis['no_daftar']; ?></td>
                                    <td> <?= $sis['nisn']; ?></td>
                                    <td> <?= $sis['nik']; ?></td>
                                    <td> <?= $sis['nama_siswa']; ?></td>
                                    <td> <?= $sis['tempat_lahir']; ?></td>
                                    <td> <?= $sis['tgl_lahir']; ?></td>
                                    <td> <?= $sis['jk']; ?></td>
                                    <td> <?= $sis['anak_ke']; ?></td>
                                    <td> <?= $sis['saudara']; ?></td>
                                    <td> <?= $sis['agama']; ?></td>
                                    <td> <?= $sis['cita']; ?></td>
                                    <td> <?= $sis['no_hp']; ?></td>
                                    <td> <?= $sis['emails']; ?></td>
                                    <td> <?= $sis['hobi']; ?></td>
                                    <td> <?= $sis['status_tinggal_siswa']; ?></td>
                                    <td> <?= $sis['prov']; ?></td>
                                    <td> <?= $sis['kab']; ?></td>
                                    <td> <?= $sis['kec']; ?></td>
                                    <td> <?= $sis['desa']; ?></td>
                                    <td> <?= $sis['alamat_siswa']; ?></td>
                                    <td> <?= $sis['kordinat']; ?></td>
                                    <td> <?= $sis['kodepos_siswa']; ?></td>
                                    <td> <?= $sis['jarak']; ?></td>
                                    <td> <?= $sis['waktu']; ?></td>
                                    <td> <?= $sis['biaya_sekolah']; ?></td>
                                    <td> <?= $sis['keb_khusus']; ?></td>
                                    <td> <?= $sis['keb_disabilitas']; ?></td>
                                    <td> <?= $sis['tk']; ?></td>
                                    <td> <?= $sis['paud']; ?></td>
                                    <td> <?= $sis['hepatitis']; ?></td>
                                    <td> <?= $sis['polio']; ?></td>
                                    <td> <?= $sis['bcg']; ?></td>
                                    <td> <?= $sis['campak']; ?></td>
                                    <td> <?= $sis['dpt']; ?></td>
                                    <td> <?= $sis['covid']; ?></td>
                                    <td> <?= $sis['no_kip']; ?></td>
                                    <td> <?= $sis['no_kks']; ?></td>
                                    <td> <?= $sis['no_pkh']; ?></td>
                                    <td> <?= $sis['no_kk']; ?></td>
                                    <td> <?= $sis['kepala_keluarga']; ?></td>
                                    <td> <?= $sis['nama_ayah']; ?></td>
                                    <td> <?= $sis['status_ayah']; ?></td>
                                    <td> <?= $sis['nik_ayah']; ?></td>
                                    <td> <?= $sis['tempat_lahir_ayah']; ?></td>
                                    <td> <?= $sis['tgl_lahir_ayah']; ?></td>
                                    <td> <?= $sis['pendidikan_ayah']; ?></td>
                                    <td> <?= $sis['pekerjaan_ayah']; ?></td>
                                    <td> <?= $sis['penghasilan_ayah']; ?></td>
                                    <td> <?= $sis['no_hp_ayah']; ?></td>
                                    <td> <?= $sis['status_tmp_tinggal_ayah']; ?></td>
                                    <td> <?= $sis['prov_ayah']; ?></td>
                                    <td> <?= $sis['kab_ayah']; ?></td>
                                    <td> <?= $sis['kec_ayah']; ?></td>
                                    <td> <?= $sis['desa_ayah']; ?></td>
                                    <td> <?= $sis['alamat_ayah']; ?></td>
                                    <td> <?= $sis['nama_ibu']; ?></td>
                                    <td> <?= $sis['status_ibu']; ?></td>
                                    <td> <?= $sis['nik_ibu']; ?></td>
                                    <td> <?= $sis['tempat_lahir_ibu']; ?></td>
                                    <td> <?= $sis['tgl_lahir_ibu']; ?></td>
                                    <td> <?= $sis['pendidikan_ibu']; ?></td>
                                    <td> <?= $sis['pekerjaan_ibu']; ?></td>
                                    <td> <?= $sis['penghasilan_ibu']; ?></td>
                                    <td> <?= $sis['no_hp_ibu']; ?></td>
                                    <td> <?= $sis['status_tmp_tinggal_ibu']; ?></td>
                                    <td> <?= $sis['prov_ibu']; ?></td>
                                    <td> <?= $sis['kab_ibu']; ?></td>
                                    <td> <?= $sis['kec_ibu']; ?></td>
                                    <td> <?= $sis['desa_ibu']; ?></td>
                                    <td> <?= $sis['alamat_ibu']; ?></td>
                                    <td> <?= $sis['status_wali']; ?></td>
                                    <td> <?= $sis['nama_wali']; ?></td>
                                    <td> <?= $sis['nik_wali']; ?></td>
                                    <td> <?= $sis['tempat_lahir_wali']; ?></td>
                                    <td> <?= $sis['tgl_lahir_wali']; ?></td>
                                    <td> <?= $sis['pendidikan_wali']; ?></td>
                                    <td> <?= $sis['pekerjaan_wali']; ?></td>
                                    <td> <?= $sis['penghasilan_wali']; ?></td>
                                    <td> <?= $sis['no_hp_wali']; ?></td>
                                    <td> <?= $sis['status_tmp_tinggal_wali']; ?></td>
                                    <td> <?= $sis['prov_wali']; ?></td>
                                    <td> <?= $sis['kab_wali']; ?></td>
                                    <td> <?= $sis['kec_wali']; ?></td>
                                    <td> <?= $sis['desa_wali']; ?></td>
                                    <td> <?= $sis['alamat_wali']; ?></td>
                                    <td> <?= $sis['prov_sekolah']; ?></td>
                                    <td> <?= $sis['kab_sekolah']; ?></td>
                                    <td> <?= $sis['kec_sekolah']; ?></td>
                                    <td> <?= $sis['asal_sekolah']; ?></td>
                                    <td> <?= $sis['npsn_sekolah']; ?></td>
                                    <td> <?= $sis['tahun_lulus']; ?></td>
                                    <td> <?= $sis['no_skhun']; ?></td>
                                    <td> <?= $sis['seri_ijazah']; ?></td>
                                    <td> <?= $sis['golongandarah']; ?></td>


                                </tr>

                                <?php $i++; ?>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- =======  Data-Table  = End  ===================== -->
    <!-- ============ Java Script Files  ================== -->


    <script src="<?= base_url('assets/table/assets/'); ?>js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/table/assets/'); ?>js/jquery-3.6.0.min.js"></script>
    <script src="<?= base_url('assets/table/assets/'); ?>js/datatables.min.js"></script>
    <script src="<?= base_url('assets/table/assets/'); ?>js/pdfmake.min.js"></script>
    <script src="<?= base_url('assets/table/assets/'); ?>js/vfs_fonts.js"></script>
    <script src="<?= base_url('assets/table/assets/'); ?>js/custom.js"></script>




</body>

</html>