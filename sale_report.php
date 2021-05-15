<section class="content-header">
    <h1>
      Sales Report
      <small>Penjualan</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#"> Reports</a></li>
      <li class="active">Penjualans</li>
    </ol>
  </section>

<!-- Main content -->
<section class="content">
<!--disini buat dashboard home-->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Penjualan</h3>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Invoice</th>
                        <th>Tanggal</th>
                        <th>Total</th>
                        <th>Diskon</th>
                        <th>Grand Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach($row->result() as $key => $data) { ?>
                    <tr>
                        <td style="width:5%;"><?=$no++?>.</td>
                        <td><?=$data->invoice?></td>
                        <td><?=indo_date($data->date)?></td>
                        <td class="text-right"><?=indo_currency($data->total_price)?></td>
                        <td class="text-right"><?=indo_currency($data->discount)?></td>
                        <td class="text-right"><?=indo_currency($data->final_price)?></td>
                        <td class="text-center" width="200px">
                            <button id="detail" data-target="#modal-detail" data-toggle="modal" class="btn btn-default btn-xs"
                            data-invoice="<?=$data->invoice?>"
                            data-date="<?=indo_date($data->date)?>"
                            data-time="<?=substr($data->sale_created, 11, 5)?>"
                            data-total="<?=indo_currency($data->total_price)?>"
                            data-discount="<?=indo_currency($data->discount)?>"
                            data-grandtotal="<?=indo_currency($data->final_price)?>"
                            data-cash="<?=indo_currency($data->cash)?>"
                            data-remaining="<?=indo_currency($data->remaining)?>"
                            data-note="<?=$data->note?>"
                            data-cashier="<?=ucfirst($data->user_name)?>"
                            data-saleid="<?=$data->sale_id?>">Detail</button>
                            <a href="<?=site_url('sale/cetak/'.$data->sale_id)?>" target ="_blank" class="btn btn-info btn-xs">
                                <i class="fa fa-print"></i> Print
                            </a>
                            <a href="<?=site_url('sale/del/'.$data->sale_id)?>" onclick="return confirm('Apakah data akan dihapus ?')" class="btn btn-danger btn-xs">
                                <i class="fa fa-trash"></i> Delete
                            </a>
                        </td>
                    </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
        </div>
    </div>

</section>

<!-- modal detail -->
<div class="modal fade" id="modal-detail">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Sales Report Detail</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered no-margin">
                    <tbody>
                        <tr>
                            <th style="width:20%">Invoice</th>
                            <td style="width:30%"><span id="invoice"></span></td>
                        </tr>
                        <tr>
                            <th>Date Time</th>
                            <td><span id="datetime"></span></td>
                            <th>Kasir</th>
                            <td><span id="cashier"></span></td>
                        </tr>
                        <tr>
                            <th>Total</th>
                            <td><span id="total"></span></td>
                            <th>Cash</th>
                            <td><span id="cash"></span></td>
                        </tr>
                        <tr>
                            <th>Discount</th>
                            <td><span id="discount"></span></td>
                            <th>Change</th>
                            <td><span id="change"></span></td>
                        </tr>
                        <tr>
                            <th>Grand Total</th>
                            <td><span id="grandtotal"></span></td>
                            <th>Note</th>
                            <td><span id="note"></span></td>
                        </tr>
                        <tr>
                            <th>Produk</th>
                            <td colspan="3"><span id="product"></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
$(document).on('click', '#detail', function() {
    $('#invoice').text($(this).data('invoice'))
    $('#datetime').text($(this).data('date') + ' ' + $(this).data('time'))
    $('#total').text($(this).data('total'))
    $('#discount').text($(this).data('discount'))
    $('#cash').text($(this).data('cash'))
    $('#change').text($(this).data('remaining'))
    $('#grandtotal').text($(this).data('grandtotal'))
    $('#note').text($(this).data('note'))
    $('#cashier').text($(this).data('cashier'))

    var product = '<table class="table no-margin">'
    product += '<tr><th>Item</th><th>Price</th><th>Qty</th><th>Disc</th><th>Total</th></tr>'
    $.getJSON('<?=site_url('report/sale_product/')?>'+$(this).data('saleid'), function(data) {
        $.each(data, function(key, val) {
            product += '<tr><td>'+val.name+'</td><td>'+val.price+'</td><td>'+val.qty+'</td><td>'+val.discount_item+'</td><td>'+val.total+'</td></tr>'
        })
        product += '</table>'
        $('#product').html(product)
    })
})
</script>