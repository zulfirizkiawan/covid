<div class="container-fluid">

    <!-- Page Heading -->
   

    <div class="modal-body">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
        <?= $this->session->flashdata('message'); ?>
        <?= form_open('menu/editsub/' . $submenu['id']); ?>
        <div class="form-group">
            <label for="title">Sub Menu Title</label>
            <input type="text" class="form-control" id="title" name="title" value="<?= $submenu['title']; ?>">
            <?= form_error('title', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>

        <div class="form-group">
            <label for="menu_id">Menu</label>
            <select name="menu_id" id="menu_id" class="form-control">
                <option value="">Pilih Menu</option>
                <?php foreach ($menu as $m) : ?>
                    <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                <?php endforeach; ?>
            </select>
            <?= form_error('menu_id', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>

        <div class="form-group">
            <label for="url">URL</label>
            <input type="text" class="form-control" id="url" name="url" value="<?= $submenu['url']; ?>">
            <?= form_error('url', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>


        <div class="form-group">
            <label for="icon">Icon</label>
            <input type="text" class="form-control" id="icon" name="icon" value="<?= $submenu['icon']; ?>">
            <?= form_error('icon', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>


        <div class="form-group">
            <label for="is_active">Status</label>
            <select name="is_active" id="is_active" class="form-control">
                <option value="1" <?php if ($submenu['is_active'] == "1") : ?> Selected <?php endif; ?>>Aktif</option>
                <option value="0" <?php if ($submenu['is_active'] == "0") : ?> Selected <?php endif; ?>>Tidak Aktif</option>
            </select>
            <?= form_error('is_active', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
 
        <!-- <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" 
                value="<?= $submenu['is_active']; ?>" id="is_active"
                 name="is_active" <?= active_check($submenu['is_active'], $submenu['id']); ?>>
                <label class="form-check-label" for="is_active">
                    Active?
                </label>
            </div>
        </div> -->
        <button type="submit" class="btn btn-primary">Perbarui Submenu</button>
        </form>
    </div>

</div>