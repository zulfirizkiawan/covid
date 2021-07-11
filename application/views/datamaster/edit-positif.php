<div class="container-fluid">

    <!-- Page Heading -->
  
    <?= $this->session->flashdata('message'); ?>
    <?= form_open('datamaster/editdata/' . $positif['id']); ?>

    <!-- nama -->
    <div class="modal-body">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
        <div class="form-group">
            <label for="title">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= $positif['nama']; ?>">
            <?= form_error('title', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>

        <div class="form-group">
            <label for="nik">NIK</label>
            <input type="text" class="form-control" id="nik" name="nik" value="<?= $positif['nik']; ?>">
            <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>

        <div class="form-group">
            <label for="jk">Jenis Kelamin</label>
            <select name="jk" class="form-control" required>
                <?php
                if ($positif['jk'] == "Laki-laki") { ?>
                    <option value="Laki-laki" selected> Laki-laki </option>
                    <option value="Perempuan"> Perempuan </option>
                <?php } else { ?>
                    <option value="Laki-laki"> Laki-laki </option>
                    <option value="Perempuan" selected> Perempuan </option>
                <?php }
                ?>

            </select>
            <?= form_error('jk', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>

        <div class="form-group">
            <label for="tempat_lahir">Tempat Lahir</label>
            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $positif['tempat_lahir']; ?>">
            <?= form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>

        <div class="form-group">
            <label for="tgl_lahir">Tanggal Lahir</label>
            <input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $positif['tgl_lahir']; ?>">
            <?= form_error('tgl_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $positif['alamat']; ?>">
            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>

        <div class="form-group">
            <label for="status_id">Status</label>
            <select name="status_id" id="status_id" class="form-control">
                <option value="">Status Kondisi</option>
                <?php foreach ($status as $s) : ?>
                    <option value="<?= $s['id']; ?>"><?= $s['status']; ?></option>
                <?php endforeach; ?>
            </select>

            <!-- <input type="text" class="form-control" id="status_id" name="status_id" value="<?= $positif['status_id']; ?>"> -->
            <?= form_error('status_id', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>

        <button type="submit" class="btn btn-primary">Perbarui</button>
        </form>
    </div>

    <br>
</div>