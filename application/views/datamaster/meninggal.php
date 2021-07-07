<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h2 mb-4 text-gray-800"></h1>
    <!-- <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal"> Create Data Karyawan</a> -->
    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newRoleModal">Tambah Data</a>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!-- <h6 class="m-0 font-weight-bold text-primary">Management User</h6> -->
            <h6 class="m-0 font-weight-bold text-primary">Meninggal</h6>
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
                    <?php foreach ($meninggal as $m) : ?>
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu Name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Menu</button>
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