<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h2 mb-4 text-gray-800"></h1>
    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
    <?= form_error('role', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
    <?= $this->session->flashdata('message'); ?>

    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahModel">Tambah Data</a>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!-- <h6 class="m-0 font-weight-bold text-primary">Management User</h6> -->
            <h6 class="m-0 font-weight-bold text-primary">POSITIF</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Nik</th>
                            <th>Jenis Kelamin</th>
                            <th>Tempat, Tanggal lahir</th>
                            <th>Alamat</th>
                            <th>Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($positif as $m) : ?>
                            <tr>
                                <th scope="row"><?= $i ?></th>

                                <td><?= $m['nama']; ?></td>
                                <td><?= $m['nik']; ?></td>
                                <td><?= $m['jk']; ?></td>
                                <td><?= $m['tempat_lahir']; ?>, <?= $m['tgl_lahir']; ?></td>
                                <td><?= $m['alamat']; ?></td>
                                <td><?= $m['status']; ?></td>
                                <td>
                                    <a href="" class="badge badge-pill badge-success">edit</a>
                                    <a href="" class="badge badge-pill badge-danger">delete</a>
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
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Modal -->

<!-- tambah data -->
<div class="modal fade" id="tambahModel" tabindex="-1" role="dialog" aria-labelledby="tambahModelLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <!-- Title -->
                <h5 class="modal-title" id="tambahModelLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('datamaster/index'); ?>" method="post">

                <!-- FORM [ NAMA ] -->
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap">
                    </div>
                </div>
                <!-- FORM [ JK ] -->
                <div class="modal-body">
                    <div class="form-group">
                        <select name="jk" id="jk" class="form-control">
                            <option value="">Jenis Kelamin Anda</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>
                <!-- FORM [ NIK ] -->
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nik" name="nik" placeholder="Nomer NIK">
                    </div>
                </div>

                <div class="d-sm-flex align-items-center justify-content-between mb-0">
                    <!-- FORM [ TEMPAT LAHIR ] -->
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir">
                        </div>
                    </div>
                    <!-- FORM [ TANGGAL LAHIR ] -->
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control border-1 small" id="datepicker" name="tgl_lahir" autocomplete="off" placeholder="tanggal Lahir">
                        </div>
                    </div>

                </div>

                <!-- FORM [ ALAMAT ] -->
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Tempat Tinggal">
                    </div>
                </div>
                <!-- FORM [ STATUS ] -->
                <div class="modal-body">
                    <div class="form-group">
                        <select name="status_id" id="status_id" class="form-control">
                            <option value="">Status Kondisi</option>
                            <?php foreach ($status as $s) : ?>
                                <option value="<?= $s['id']; ?>"><?= $s['status']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>



                <!-- ACTION -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Role</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Menu</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Are you sure want to delete <?= $m['menu']; ?> menu?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('menu/deletemenu/') . $m['id']; ?>">Delete</a>
            </div>
        </div>
    </div>
</div>