<script src='https://kit.fontawesome.com/76a945766d.js' crossorigin='anonymous'></script>
<link rel="stylesheet" href="<?= base_url('assets/'); ?>css/jquery-ui.css">


<?= $this->session->flashdata('message'); ?>
<div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                Daftar Akun Admin
            </button>
        </h2>
        <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <form class="user" method="post" action="<?= base_url('admin/registration2'); ?>">
                                    <p>Username</p>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="name" required name="name" placeholder="Nama Lengkap" value="<?= set_value('name'); ?>">
                                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="email" required name="email" placeholder="Email" value="<?= set_value('email'); ?>">
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-select" required>
                                            <option selected disabled></option>
                                            <option value="1">Operator</option>
                                            <option value="4">Panitia Waka/BK</option>
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                                            <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-success btn-user" type="submit">Buat Akun Panitia</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Registrasi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1; ?>
                                            <?php foreach ($admin as $adm) : ?>
                                                <tr>
                                                    <th scope="row"><?= $i; ?></th>
                                                    <td><?= $adm['name']; ?></td>
                                                    <td><?= $adm['email']; ?></td>
                                                    <td><?= date('d M Y', $adm['date_created']); ?></td>
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
            </div>
        </div>
    </div>
</div>





<script src="<?= base_url('assets/'); ?>js/jquery-3.3.1.js" type="text/javascript"></script>
<script src="<?= base_url('assets/'); ?>js/jquery-ui.js" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function() {

        $('#title').autocomplete({
            source: "<?= site_url('daftar/get_autocomplete'); ?>",

            select: function(event, ui) {
                $('[name="title"]').val(ui.item.label);
                $('[name="description"]').val(ui.item.description);
                $('[name="status"]').val(ui.item.status);
                $('[name="nsm"]').val(ui.item.nsm);
            }
        });

    });
</script>