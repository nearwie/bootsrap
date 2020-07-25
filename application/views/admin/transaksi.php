

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
         
            <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Tambah transaksi</h1>
    <div class="col-lg-8">
        <div class="card shadow mb-4">
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <th>Admin</th>
                        <td> : <?php echo($this->session->userdata('name')); ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal mutasi</th>
                        <td> : <?php echo date('Y-m-d h:i:s'); ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card shadow mb-4" id="card-transaksi">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form transaksi</h6>
            </div>
            <div class="card-body">
                <div class="error-form"></div>
                <form action="" method="post" class="form-barang">
                    <input type="hidden" name="data_barang" id="data_barang">
                    <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                
                    <div class="form-group">
                        <label for="barang">Barang</label>
                        <div class="input-group">
                            <select id="barang" class="form-control">
                                <option disabled selected>Pilih Barang</option>
                                <?php foreach($barang->result() as $ob) : ?>
                                <option value="<?php echo $ob->kode_brg; ?>"><?php echo $ob->kode_brg; ?> - <?php echo $ob->nama_brg; ?> - <?php echo $ob->jenis; ?></option>
                                <?php endforeach ?>
                            </select>
                            <div class="input-group-append">
                                <button class="btn btn-success add-item-barang" type="button" id="button-addon1">Tambah</button>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-success">
                            <tr class="bg-success text-white">
                                <th scope="col" width="50">
                                    <button title="hapus semua item" class="btn btn-sm btn-circle btn-danger btn-remove-item" type="button"><i class="fa fa-trash"></i></button>
                                </th>
                                <th scope="col">Kode Barang</th>
                                <th scope="col">Barang</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="7" class="item-kosong small" align="center">Belum ada item obat yang ditambahkan.</td>
                            </tr>
                        </tbody>
                        <tfoot style="display:none">
                            <tr class="bg-light">
                                <th colspan="6" class="text-center">Grand Total</th>
                                <th class="grand-total"></th>
                            </tr>
                        </tfoot>
                    </table>
                    </div>
                    <button type="submit" name="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>


          
          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- MODAL -->
<script>
    
    
   
        let arrayBarang = [];
        $('.form-barang table .btn-remove-item').on('click', function() {
            if (arrayBarang.length == 0) return alert('Belum ada item obat dipilih!');
            arrayBarang = [];
            $('.form-barang table tbody').html('');
            $('.form-barang #data_barang').val('');
            countGrandTotal();
        })
        $('.form-barang .add-item-barang').on('click', function(e) {
            let kode_brg = $('.form-barang #barang').val();
            if (! kode_brg) return alert('Kode barang tidak valid');
            if (arrayBarang.filter(item => item.kode_brg == kode_brg).length > 0) return alert('Data Barang Sudah Dipilih');
            if (arrayBarang.length == 0) $('.form-barang table tbody .item-kosong').hide();
            $.getJSON(`../barang/getAjax/${kode_brg}`, function(data, status, xhr) {
                let html = `
                <tr id="${data.kode_brg}">
                    <td><button data-kode_barang="${data.kode_brg}" type="button" class="btn-remove-barang btn btn-circle btn-danger btn-sm"><i class="fa fa-trash"></i></button></td>
                    <td>${data.kode_brg}</td>
                    <td>${data.nama_brg}</td>
                   
                    <td width="100"><input data-kode_brg="${data.kode_brg}" type="number" class="form-control jumlah" value="1" min="1" /></td>
                  
                </tr>
                `;
                arrayBarang.push({
                    kode_brg: data.kode_brg,
                    jumlah: 1,
                    total: data.jumlah
                });
                let grand_total = 0;
                arrayBarang.forEach(val => grand_total = grand_total + parseInt(val.total));
                $('.form-barang table tbody').append(html)
                $('.form-barang table tfoot').show();
                $('.form-barang .grand-total').html(`<h4>${grand_total}</h4>`)
                $('.form-barang #data_barang').val(JSON.stringify(arrayBarang));
            })
        })
        $('.form-barang table').on('click', '.btn-remove-barang', function() {
            $(this).parent().parent().remove();
            let kode_brg = $(this).data('kode_brg');
            arrayBarang = arrayBarang.filter(e => e.kode_brg != kode_brg);
            $('.form-barang #data_barang').val(JSON.stringify(arrayBarang));
            countGrandTotal();
        })
        $('.form-barang table').on('change', '.jumlah', function() {
            let kode_brg = $(this).data('kode_brg');
            let jumlah = $(this).val();
            let total = jumlah;
            $(`.form-barang #${kode_brg} td:last`).html(`${total}`)
            objIndex = arrayBarang.findIndex((obj => obj.kode_brg == kode_brg));
            arrayBarang[objIndex].jumlah = jumlah;
            arrayBarang[objIndex].total = total;
            countGrandTotal();
            $('.form-barang #data_barang').val(JSON.stringify(arrayBarang));
        })
        function countGrandTotal() {
            let grand_total = 0;
            arrayBarang.forEach(val => grand_total = grand_total + parseInt(val.total));
            if (grand_total <= 0) {
                $('.form-barang table tfoot').hide();
                $('.form-barang table tbody .item-kosong').show();
            }
            $('.form-barang .grand-total').html(`<h4>${grand_total}</h4>`)
        }
        $('.form-barang').on('submit', function(e) {
            e.preventDefault();
            $.post('store', $(this).serialize(), function(data, status, xhr) {
                if (! data.status) {
                    $('.error-form').html(data.error);
                    let cardOffset = $('#card-transaksi').offset();
                    let bodyOffset = $(document).scrollTop();
                    if (cardOffset.top <= bodyOffset) {
                        $('html, body').animate({
                            scrollTop: cardOffset.top,
                        }, 1000)
                    }
                    return;
                }
                document.location.href = '../transaksi';
            }, 'json');
        })
   

</script>