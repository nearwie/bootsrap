<!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; E-Gudang Book <?= date ('Y'); ?></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin keluar dari aplikasi ini?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Silahkan klik tombol "Logout" untuk keluar dari aplikasi ini.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-success" href="<?= base_url('auth/logout'); ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
  <!-- Page level plugins -->
  <script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>


<!-- Datepicker -->
    <script src="<?= base_url(); ?>assets/vendor/daterangepicker/moment.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/daterangepicker/daterangepicker.min.js"></script>
    
    <script src="<?= base_url('assets/bootstrap/popper/') . 'popper.js'; ?>"></script>
    <script src="<?= base_url('assets/bootstrap/js/') . 'bootstrap.js'; ?>"></script>
    <script src="<?= base_url('assets/dropify/js/') . 'dropify.js'; ?>"></script>

  <!-- Page level custom scripts -->
  <script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>
  
  <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <script >
    function goBack() {

        window.history.back();

    }
  


    $('.custom-file-input').on('change', function() {
    let fileName = $(this).val().split('\\').pop();
    $(this).siblings('.custom-file-label').addClass('selected').html(fileName);
    });
  
    $('.form-check-input').on ('click', function() {
      const menuId = $(this).data('menu');
      const roleId = $(this).data('role');

      $.ajax({

        url: "<?= base_url('admin/changeaccess'); ?>",
        type: 'post',
        data: {
            menuId: menuId,
            roleId: roleId
        },
        success: function() {
            document.location.href = "<?= base_url('admin/roleaccess/') ?>" + roleId;
        }

      });


    });


      </script>
       <script>

              $(function(){
            $("#tanggal").datepicker({
                dateFormat: 'yyyy-mm-dd',
                autoclose: true
            });
        });

    </script>


    <script>
    $(document).ready(function(){
        $('#tggl').datepicker({
          
                  dateFormat: 'dd/mm/yyyy',
                autoclose: true
        
        });
    });
    </script>



    <script type="text/javascript">
        let hal = '<?= $this->uri->segment(1); ?>';

        let satuan = $('#satuan');
        let jenis = $('#jenis');
        let stok = $('#stok');
        let total = $('#total_stok');
        let jumlah = hal == 'barangmasuk' ? $('#jumlah_masuk') : $('#jumlah_keluar');

        $(document).on('change', '#barang_id', function() {
            let url = '<?= base_url('barang/getstok/'); ?>' + this.value;
            $.getJSON(url, function(data) {
                satuan.html(data.nama_satuan);
                jenis.val(data.nama_jenis);
                stok.val(data.stok);
                total.val(data.stok);
                jumlah.focus();
            });
        });

        $(document).on('keyup', '#jumlah_masuk', function() {
            let totalStok = parseInt(stok.val()) + parseInt(this.value);
            total.val(Number(totalStok));
        });


        $(document).on('keyup', '#jumlah_keluar', function() {
            let totalStok = parseInt(stok.val()) - parseInt(this.value);
            total.val(Number(totalStok));
        });
    </script>

    <?php if ($this->uri->segment(1) == 'user') : ?>
        <!-- Chart -->
        <script src="<?= base_url(); ?>assets/vendor/chart.js/Chart.min.js"></script>

        <script type="text/javascript">
            // Set new default font family and font color to mimic Bootstrap's default styling
            Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
            Chart.defaults.global.defaultFontColor = '#858796';

            function number_format(number, decimals, dec_point, thousands_sep) {
                // *     example: number_format(1234.56, 2, ',', ' ');
                // *     return: '1 234,56'
                number = (number + '').replace(',', '').replace(' ', '');
                var n = !isFinite(+number) ? 0 : +number,
                    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                    s = '',
                    toFixedFix = function(n, prec) {
                        var k = Math.pow(10, prec);
                        return '' + Math.round(n * k) / k;
                    };
                // Fix for IE parseFloat(0.55).toFixed(0) = 0;
                s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
                if (s[0].length > 3) {
                    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
                }
                if ((s[1] || '').length < prec) {
                    s[1] = s[1] || '';
                    s[1] += new Array(prec - s[1].length + 1).join('0');
                }
                return s.join(dec);
            }

            // Area Chart Example
            var ctx = document.getElementById("myAreaChart");
            var myLineChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
                    datasets: [{
                            label: "Total Barang Masuk",
                            lineTension: 0.3,
                            backgroundColor: "rgba(78, 115, 223, 0.05)",
                            borderColor: "rgba(78, 115, 223, 1)",
                            pointRadius: 3,
                            pointBackgroundColor: "rgba(78, 115, 223, 1)",
                            pointBorderColor: "rgba(78, 115, 223, 1)",
                            pointHoverRadius: 3,
                            pointHoverBackgroundColor: "#5a5c69",
                            pointHoverBorderColor: "#5a5c69",
                            pointHitRadius: 10,
                            pointBorderWidth: 2,
                            data: <?= json_encode($cbm); ?>,
                        },
                        {
                            label: "Total Barang Keluar",
                            lineTension: 0.3,
                            backgroundColor: "rgba(231, 74, 59, 0.05)",
                            borderColor: "#e74a3b",
                            pointRadius: 3,
                            pointBackgroundColor: "#e74a3b",
                            pointBorderColor: "#e74a3b",
                            pointHoverRadius: 3,
                            pointHoverBackgroundColor: "#5a5c69",
                            pointHoverBorderColor: "#5a5c69",
                            pointHitRadius: 10,
                            pointBorderWidth: 2,
                            data: <?= json_encode($cbk); ?>,
                        }
                    ],
                },
                options: {
                    maintainAspectRatio: false,
                    layout: {
                        padding: 5
                    },
                    scales: {
                        xAxes: [{
                            time: {
                                unit: 'date'
                            },
                            gridLines: {
                                display: false,
                                drawBorder: false
                            },
                            ticks: {
                                maxTicksLimit: 7
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                maxTicksLimit: 5,
                                padding: 10,
                                // Include a dollar sign in the ticks
                                callback: function(value, index, values) {
                                    return number_format(value);
                                }
                            },
                            gridLines: {
                                color: "rgb(234, 236, 244)",
                                zeroLineColor: "rgb(234, 236, 244)",
                                drawBorder: false,
                                borderDash: [2],
                                zeroLineBorderDash: [2]
                            }
                        }],
                    },
                    legend: {
                        display: false
                    },
                    tooltips: {
                        backgroundColor: "rgb(255,255,255)",
                        bodyFontColor: "#858796",
                        titleMarginBottom: 10,
                        titleFontColor: '#6e707e',
                        titleFontSize: 14,
                        borderColor: '#dddfeb',
                        borderWidth: 1,
                        xPadding: 15,
                        yPadding: 15,
                        displayColors: false,
                        intersect: false,
                        mode: 'index',
                        caretPadding: 10,
                        callbacks: {
                            label: function(tooltipItem, chart) {
                                var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                                return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
                            }
                        }
                    }
                }
            });

            // Pie Chart Example
            var ctx = document.getElementById("myPieChart");
            var myPieChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ["Barang Masuk", "Barang Keluar"],
                    datasets: [{
                        data: [<?= $barang_masuk; ?>, <?= $barang_keluar; ?>],
                        backgroundColor: ['#4e73df', '#e74a3b'],
                        hoverBackgroundColor: ['#5a5c69', '#5a5c69'],
                        hoverBorderColor: "rgba(234, 236, 244, 1)",
                    }],
                },
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                        backgroundColor: "rgb(255,255,255)",
                        bodyFontColor: "#858796",
                        borderColor: '#dddfeb',
                        borderWidth: 1,
                        xPadding: 15,
                        yPadding: 15,
                        displayColors: false,
                        caretPadding: 10,
                    },
                    legend: {
                        display: false
                    },
                    cutoutPercentage: 80,
                },
            });
        </script>
    <?php endif; ?>

     <script>
    $(document).ready(function(){
        $('.dropify').dropify({
            messages: {
                default: 'Drag atau drop untuk memilih gambar',
                replace: 'Ganti',
                remove:  'Hapus',
                error:   'error'
            }
        });
    });
    </script>


    






</body>

</html>
