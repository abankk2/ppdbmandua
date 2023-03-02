<style>
    .accordion-item {
        border: 0;
    }
</style>
<div class="row">
    <div class="col-lg-4">
        <?= form_open_multipart('user/edit'); ?>
        <input type="text" class="form-control d-none" id="email" name="email" value="<?= $user['email']; ?>" readonly>
        <input type="text" class="form-control d-none" id="email" name="name" value="<?= $user['name']; ?>" readonly>

        <div class="row">
            <div class="col-sm-10 mb-3">
                <img src="<?= base_url('assets/img/profiles/') . $user['image']; ?>" class="img-thumbnail">
            </div>
            <div class="col-sm-10 mb-3">
                <div class="custom-file">
                    <input type="file" class="form-control" id="image" name="image">
                </div>
            </div>
            <div class="col-sm-10">
                <div class="d-grid gap-2">
                    <button class="btn btn-primary btn-user" type="submit">Update Poto</button>
                </div>
            </div>
        </div>

        </form>


    </div>

    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button bg-success text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Biodata
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <form>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Tempat Lahir</label>
                                                <input type="text" class="form-control" name="tempat_lahir" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Tgl Lahir</label>
                                                <input type="date" class="form-control" name="tgl_lahir" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                                                <select class="form-select" name="jk" aria-label="Default select example">
                                                    <option selected disabled></option>
                                                    <option value="1">Laki - Laki</option>
                                                    <option value="2">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Nik</label>
                                                <input type="number" class="form-control" name="nik" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Anak ke</label>
                                                <input type="number" class="form-control" name="anak_ke" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Jml. Saudara</label>
                                                <input type="number" class="form-control" name="saudara" required>
                                            </div>
                                        </div>

                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Status Tinggal -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed bg-primary text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Status Tinggal
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                        </div>
                    </div>
                    <!-- Data Keluarga -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Accordion Item #3
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>