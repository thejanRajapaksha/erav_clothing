<!--<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>-->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<!-- <script src="<?php echo base_url() ?>assets/demo/chart-area-demo.js"></script> -->
<!--<script src="<?php echo base_url() ?>assets/demo/chart-bar-demo.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<!-- <script src="https://cdn.datatables.net/fixedcolumns/3.3.3/js/dataTables.fixedColumns.min.js"></script> -->
<!--<script src="<?php echo base_url() ?>assets/demo/datatables-demo.js"></script>-->
<script src="<?php echo base_url() ?>assets/js/script.js"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap-notify.js"></script>
<script src="<?php echo base_url() ?>assets/js/select2.full.js"></script>
<script src="<?php echo base_url() ?>assets/js/jquery.serializejson.js"></script>
<script src="<?php echo base_url() ?>assets/slick/slick.js"></script>
<script src="<?php echo base_url() ?>assets/js/print.js"></script>
<script src="<?php echo base_url() ?>assets/js/jquery.hotkeys.js"></script>
<script src="<?php echo base_url() ?>assets/js/table2csv.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js"></script>
<script>   
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
        setTimeout(tablerowhighlight, 1000);
    });
    <?php if($this->router->fetch_class()=='Cashier' && $this->router->fetch_method()=='Dashboard'){}else{ ?>
    function tablerowhighlight(){
        $('table tbody').on('click', 'tr', function(){
            $('table tbody>tr').removeClass('table-warning text-dark');
            $(this).addClass('table-warning text-dark');
        });
    }
    <?php } ?>

    actionText=[];
    var actionText=$('#actiontext').val();
    if(actionText!=''){
        var obj=JSON.parse(actionText);
        $.notify({
            // options
            icon: obj.icon,
            title: obj.title,
            message: obj.message,
            url: obj.url,
            target: obj.target
        },{
            // settings
            element: 'body',
            position: null,
            type: obj.type,
            allow_dismiss: true,
            newest_on_top: false,
            showProgressbar: false,
            placement: {
                from: "top",
                align: "center"
            },
            offset: 100,
            spacing: 10,
            z_index: 1031,
            delay: 5000,
            timer: 1000,
            url_target: '_blank',
            mouse_over: null,
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            },
            onShow: null,
            onShown: null,
            onClose: null,
            onClosed: null,
            icon_type: 'class',
            template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                '<span data-notify="icon"></span> ' +
                '<span data-notify="title">{1}</span> ' +
                '<span data-notify="message">{2}</span>' +
                '<div class="progress" data-notify="progressbar">' +
                    '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                '</div>' +
                '<a href="{3}" target="{4}" data-notify="url"></a>' +
            '</div>' 
        });
    }
</script>
