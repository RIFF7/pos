<section class="content-header">
    <h1>
      Items
      <small>Data Barang</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Item</li>
    </ol>
  </section>

<!-- Main content -->
<section class="content">
    <?php $this->view('messages') ?>
<!--disini buat dashboard home-->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?=ucfirst($page)?> Items</h3>
            <div class="pull-right">
                <a href="<?=site_url('item')?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Back
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <?php echo form_open_multipart('item/process') ?>
                        <div class="form-group">
                            <label>Barcode *</label>
                            <input type="hidden" name="id" value="<?=$row->item_id?>">
                            <input type="text" name="barcode" value="<?=$row->barcode?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Produk *</label>
                            <input type="text" name="product_name" value="<?=$row->name?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Kategori *</label>
                            <?php echo form_dropdown('category', $category, $selectedcate,
                            ['class' => 'form-control', 'required' => 'required']) ?>
                        </div>
                        <div class="form-group">
                            <label>Unit *</label>
                            <?php echo form_dropdown('unit', $unit, $selectedunit,
                            ['class' => 'form-control', 'required' => 'required']) ?>
                        </div>
                        <div class="form-group">
                            <label>Harga *</label>
                            <input type="number" name="price" value="<?=$row->price?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Gambar</label>
                            <?php if($page == 'edit') {
                                if($row->image != null) { ?>
                                    <div style="margin-bottom:5px">
                                        <img src="<?=base_url('uploads/product/'.$row->image)?>" style="width:80%">
                                    </div>
                                <?php
                                }
                            } ?>
                            <input type="file" name="image" class="form-control">
                            <small>(Kosongkan jika tidak <?=$page == 'edit' ? 'diganti' : 'ada'?>)</small>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="<?=$page?>" class="btn btn-success btn-flat">
                                <i class="fa fa-paper-plane"></i> Save
                            </botton>
                            <button type="reset" class="btn btn-flat">Reset</botton>
                        </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->