<section class="content-header">
    <h1>
      Supplier
      <small>Pemasok Produk</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Supplier</li>
    </ol>
  </section>

<!-- Main content -->
<section class="content">
<!--disini buat dashboard home-->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?=ucfirst($page)?> Supplier</h3>
            <div class="pull-right">
                <a href="<?=site_url('supplier')?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Back
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <?php //echo validation_errors(); ?>
                    <form action="<?=site_url('supplier/process')?>" method="post">
                        <div class="form-group">
                            <label>Nama Supplier *</label>
                            <input type="hidden" name="id" value="<?=$row->supplier_id?>">
                            <input type="text" name="supplier_name" value="<?=$row->name?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Nomor Telefon *</label>
                            <input type="number" name="phone" value="<?=$row->phone?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Alamat *</label>
                            <textarea name="address" class="form-control" required><?=$row->address?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="desc" class="form-control"><?=$row->description?></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="<?=$page?>" class="btn btn-success btn-flat">
                                <i class="fa fa-paper-plane"></i> Save
                            </botton>
                            <button type="reset" class="btn btn-flat">Reset</botton>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->