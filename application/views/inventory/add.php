<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Add Item Form
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('inventory') ?>" class="btn btn-sm btn-secondary btn-icon-split">
                            <span class="icon">
                                <i class="fa fa-arrow-left"></i>
                            </span>
                            <span class="text">
                                Back
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <?= $this->session->flashdata('pesan'); ?>
               <?php echo form_open_multipart('Inventory/add');?>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="id_inventory">ID Inventory</label>
                    <div class="col-md-9">
                        <input readonly value="<?= set_value('id_inventory', $id_inventory); ?>" name="id_inventory" id="id_inventory" type="text" class="form-control" placeholder="ID Inventory...">
                        <?= form_error('id_inventory', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
				<div class="row form-group">
                    <label class="col-md-3 text-md-right" for="kode_barang">Kode Barang</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('kode_barang'); ?>" name="kode_barang" id="kode_barang" type="text" class="form-control" placeholder="Kode Barang...">
                        <?= form_error('kode_barang', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
				<div class="row form-group">
                    <label class="col-md-3 text-md-right" for="serial_number">Serial Number</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('serial_number'); ?>" name="serial_number" id="serial_number" type="text" class="form-control" placeholder="Serial Number...">
                        <?= form_error('serial_number', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
				<div class="row form-group">
                    <label class="col-md-3 text-md-right" for="no_invoice">No Invoice</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('no_invoice'); ?>" name="no_invoice" id="no_invoice" type="text" class="form-control" placeholder="No Invoice...">
                        <?= form_error('no_invoice', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="nama_barang">Nama Barang</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('nama_barang'); ?>" name="nama_barang" id="nama_barang" type="text" class="form-control" placeholder="Nama Barang...">
                        <?= form_error('nama_barang', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
				<div class="row form-group">
                    <label class="col-md-3 text-md-right" for="jumlah">Jumlah</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('jumlah'); ?>" name="jumlah" id="jumlah" type="text" class="form-control" placeholder="Jumlah...">
                        <?= form_error('jumlah', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
				<div class="row form-group">
                    <label class="col-md-3 text-md-right" for="kondisi_id">Kondisi</label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <select name="kondisi_id" id="kondisi_id" class="custom-select">
                                <option value="" selected disabled>Pilih Kondisi</option>
                                <?php foreach ($kondisi as $j) : ?>
                                    <option <?= set_select('kondisi_id', $j['id_kondisi']) ?> value="<?= $j['id_kondisi'] ?>"><?= $j['nama_kondisi'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="input-group-append">
                                <a class="btn btn-primary" href="<?= base_url('kondisi/add'); ?>"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                        <?= form_error('kondisi_id', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
				<div class="row form-group">
                    <label class="col-md-3 text-md-right" for="status_id">Status</label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <select name="status_id" id="status_id" class="custom-select">
                                <option value="" selected disabled>Pilih Status</option>
                                <?php foreach ($status as $t) : ?>
                                    <option <?= set_select('status_id', $t['id_status']) ?> value="<?= $t['id_status'] ?>"><?= $t['nama_status'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="input-group-append">
                                <a class="btn btn-primary" href="<?= base_url('status/add'); ?>"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                        <?= form_error('status_id', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="satuan_id">Satuan Barang</label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <select name="satuan_id" id="satuan_id" class="custom-select">
                                <option value="" selected disabled>Pilih Satuan Barang</option>
                                <?php foreach ($satuan as $s) : ?>
                                    <option <?= set_select('satuan_id', $s['id_satuan']) ?> value="<?= $s['id_satuan'] ?>"><?= $s['nama_satuan'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="input-group-append">
                                <a class="btn btn-primary" href="<?= base_url('satuan/add'); ?>"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                        <?= form_error('satuan_id', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                 <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="gudang_id">Gudang</label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <select name="gudang_id" id="gudang_id" class="custom-select">
                                <option value="" selected disabled>Pilih Gudang</option>
                                <?php foreach ($gudang as $g) : ?>
                                    <option <?= set_select('gudang_id', $g['id_gudang']) ?> value="<?= $g['id_gudang'] ?>"><?= $g['nama_gudang'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="input-group-append">
                                <a class="btn btn-primary" href="<?= base_url('gudang/add'); ?>"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                        <?= form_error('gudang_id', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
				<div class="row form-group">
                    <label class="col-md-3 text-md-right" for="pemeriksa">Pemeriksa</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('pemeriksa'); ?>" name="pemeriksa" id="pemeriksa" type="text" class="form-control" placeholder="Pemeriksa...">
                        <?= form_error('pemeriksa', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
				<div class="row form-group">
                    <label class="col-md-3 text-md-right" for="tanggal_pemeriksaan">Tanggal Pemeriksaan</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('tanggal_pemeriksaan', date('Y-m-d')); ?>" name="tanggal_pemeriksaan" id="tanggal_pemeriksaan" type="text" class="form-control date" placeholder="Tanggal Pemeriksaan...">
                        <?= form_error('tanggal_pemeriksaan', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                
                <div class="row form-group">
                    <div class="col-md-9 offset-md-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="reset" class="btn btn-secondary">Reset</bu>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>
