<form method="post" action="<?= base_url('user/AksiTes'); ?>">
    <div class="row">
        <?= $this->session->flashdata('message'); ?>
        <div class="col-md-4">
            <div class="mb-3">
                <label class="form-label">Kecamatan</label>
                <select id="status_ayah" class="form-select form-select" name="status" onchange="toggleNamaAyah()" required>
                    <option disabled selected></option>
                    <option value="hidup">Hidup</option>
                    <option value="meninggal">Meninggal</option>
                    <option value="tidak_diketahui">Tidak diketahui</option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label class="form-label">Satu</label>
                <input type="text" id="satu" name="satu" class="form-control">
            </div>
        </div>

        <button type="submit" class="btn btn-block btn-primary">Simpan</button>
    </div>

</form>

<script>
    function toggleNamaAyah() {
        var statusAyah = document.getElementById("status_ayah");
        var satu = document.getElementById("satu");
        if (statusAyah.value == "hidup") {
            satu.required = true;
            satu.disabled = false;

        } else {
            satu.required = false;
            satu.disabled = true;
            satu.value = "";

        }
    }
</script>

<br><br><br><br><br><br><br><br><br><br>

Tidak Bekerja
Pensiunan
PNS
TNI/Polisi
Guru/Dosen
Pegawai Swasta
Wiraswasta
Pengacara/Jaksa/Hakim/Notaris
Seniman/Pelukis/Artis/Sejenis
Dokter/Bidan/Perawat
Pilot/Pramugara
Pedagang
Petani/Peternak
Nelayan
Buruh (Tani/Pabrik/Bangunan)
Sopir/Masinis/Kondektur
Politikus
Lainnya

SMP/Sederajat
SMA/Sederajat
D1
D2
D3
D4/S1
S2
S3
Tidak Bersekolah


Kurang dari 500.000
500.000 - 1.000.000
1.000.001 - 2.000.000
2.000.001 - 3.000.000
3.000.001 - 5.000.000
Lebih dari 5.000.000
Tidak ada

Milik Sendiri
Rumah Orang Tua
Rumah Saudara/kerabat
Rumah Dinas
Sewa/kontrak
Lainnya

Kendala Ekonomi
Kendala akademik
Ikut pindah orang tua
Pelanggaran disiplin
Pengaruh teman / lingkungan
Lainnya