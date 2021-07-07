<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <?= form_open_multipart('user/edit') ?>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    

        <button type="submit" class="btn btn-success btn-md btn-icon-split">
            <span class="text text-white">Simpan Perubahan</span>
            <span class="icon text-white-50">
                <i class="fas fa-save"></i>
            </span>
        </button>

    </div>

    <div class="d-sm-flex  justify-content-between mb-0">
        <div class="col-lg-8 mb-4">
            <!-- form -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Pengguna</h6>
                </div>
                <div class="card-body">
                    <div class="col-lg-12">

                        <!-- Nama Lengkap -->
                        <div class="form-group"><label>Nama User</label>
                            <input class="form-control" name="name" id="name" type="text" value="<?= $user['name']; ?>">
                            <?= form_error(
                                'name',
                                '<small class="text-danger pl-3">',
                                '</small>'
                            ); ?>
                        </div>

                        <!-- Email -->
                        <div class="form-group"><label>Email</label>
                            <input class="form-control"  name="email" id="email" type="email" value="<?= $user['email']; ?>" readonly>
                        </div>

                        <!-- Password -->
                        <div class="form-group"><label>Password</label>
                            <input class="form-control"  name="password" id="password" type="password" value="">
                        </div>

                        <!-- Level -->
                        <div class="form-group"><label>Role</label>
                            <select name="level" class="form-control">
                                <option value="Admin">Administrasi</option>
                                <option value="Member">Petugas</option>

                            </select>
                        </div>

                        <!-- Status -->
                        <div class="form-group"><label>Status</label>
                            <select name="status" class="form-control">
                                <option value="Aktif">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
                            </select>
                        </div>

                    </div>


                    <br>
                </div>
            </div>

        </div>

        <div class="col-lg-4 mb-4">
            <!-- file -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Foto</h6>
                </div>
                <div class="card-body">
                    <div class="card bg-warning text-white shadow">
                        <div class="card-body">
                            Format
                            <div class="text-white-45 small">.png .jpeg .jpg .tiff .gif .tif</div>
                        </div>
                    </div>
                    <br>
                    <center>
                        <div>
                            <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" id="outputImg" width="200" maxheight="300">
                        </div>
                    </center>
                    <br>
                    <span class="text-danger">*kosongkan jika tidak ingin merubah</span>
                    <!-- foto -->
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="hidden" name="image" id="image" value="<?= $user['image'] ?>">
                            <input class="custom-file-input" type="file" id="GetFile" name="photo" onchange="VerifyFileNameAndFileSize()" accept=".png,.gif,.jpeg,.tiff,.jpg">
                            <label class="custom-file-label" for="image">Pilih File</label>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>



    </form>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->