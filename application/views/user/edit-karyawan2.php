<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('message'); ?>
    <?= form_open('user/edituser/' . $edituser['id']); ?>
    <div class="modal-body">

        <div class="form-group">
            <label for="name">Nama User</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= $edituser['name']; ?>">
            <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>

        <div class="form-group">
            <label for="role_id">Menu</label>
            <select name="role_id" id="role_id" class="form-control">
                <option value="">Select Role</option>
                <?php foreach ($role as $m) : ?>
                    <option value="<?= $m['id']; ?>"><?= $m['role']; ?></option>
                <?php endforeach; ?>
            </select>
            <?= form_error('role_id', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>


        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="<?= $edituser['is_active']; ?>" id="is_active" name="is_active"
                 <?= active_checks($edituser['is_active'], $edituser['id']); ?>>
                 
                <label class="form-check-label" for="is_active">
                    Active?
                </label>
            </div>
        </div>

    </div>
    <button type="submit" class="btn btn-primary">Edit Submenu</button>
    </form>
</div>