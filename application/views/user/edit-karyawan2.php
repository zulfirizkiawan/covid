<div class="container-fluid">

    <!-- Page Heading -->
   

    <div class="modal-body">
    <h1 class="h3 mb-4 text-gray-800">Perbarui User</h1>
    <?= $this->session->flashdata('message'); ?>
    <?= form_open('user/edituser/' . $edituser['id']); ?>

        <div class="form-group">
            <label for="name">Nama User</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= $edituser['name']; ?>">
            <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>

        <div class="form-group">
            <label for="role_id">Hak Akses</label>
            <select name="role_id" id="role_id" class="form-control">
                
                <?php foreach ($role as $m) : ?>
                    <option value="<?= $m['id']; ?>"  <?php if($edituser['role_id']): ?> Selected <?php endif; ?> ><?= $m['role']; ?></option>
                <?php endforeach; ?>
            </select>
            <?= form_error('role_id', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>

       
        <div class="form-group">
            <label for="is_active">Status</label>
            <select name="is_active" id="is_active" class="form-control">
                <option value="1"  <?php if($edituser['is_active'] == "1"): ?> Selected <?php endif; ?> >Aktif</option>
                <option value="0" <?php if($edituser['is_active'] == "0"): ?> Selected <?php endif; ?>>Tidak Aktif</option>
            </select>
            <?= form_error('is_active', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>

        <!-- <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="<?= $edituser['is_active']; ?>" id="is_active" name="is_active"
                 <?= active_checks($edituser['is_active'], $edituser['id']); ?>>
                 
                <label class="form-check-label" for="is_active">
                    Active?
                </label>
            </div>
        </div> -->

        <button type="submit" class="btn btn-primary">Perbarui User</button>
    </form>
    </div>
   
</div>