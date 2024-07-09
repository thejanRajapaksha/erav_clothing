<?php
include "include/header.php";
include "include/topnavbar.php";
?>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <?php include "include/menubar.php"; ?>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="page-header page-header-light bg-white shadow">
                <div class="container-fluid">
                    <div class="page-header-content py-3">
                        <h1 class="page-header-title font-weight-bold text-dark">
                            <div class="page-header-icon"><i class="fas fa-quote-left"></i></div>
                            <span>Accepted Quotations</span>
                        </h1>
                    </div>
                </div>
            </div>
            <div class="container-fluid mt-2 p-0 p-2">
                <div class="card">
                    <div class="card-body p-0 p-2">
                        <table class="table table-bordered table-striped table-sm nowrap" id="dataTableAccepted" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Customer</th>
                                    <th>Quotation Date</th>
                                    <th>Due Date</th>
                                    <th>Total</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        <?php include "include/footerbar.php"; ?>
    </div>
</div>
<?php include "include/footerscripts.php"; ?>


<script>
    $(document).ready(function() {
        var addcheck = '<?php echo $addcheck; ?>';
        var editcheck = '<?php echo $editcheck; ?>';
        var statuscheck = '<?php echo $statuscheck; ?>';
        var deletecheck = '<?php echo $deletecheck; ?>';

        $('#dataTableAccepted').DataTable({
            "destroy": true,
            "processing": true,
            "serverSide": true,
            dom: "<'row'<'col-sm-5'B><'col-sm-2'l><'col-sm-5'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            responsive: true,
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All'],
            ],
            "buttons": [
                { extend: 'csv', className: 'btn btn-success btn-sm', title: 'Supplier detail Information', text: '<i class="fas fa-file-csv mr-2"></i> CSV', },
                { extend: 'pdf', className: 'btn btn-danger btn-sm', title: 'Supplier detail Information', text: '<i class="fas fa-file-pdf mr-2"></i> PDF', },
                { 
                    extend: 'print', 
                    title: 'Supplier detail Information',
                    className: 'btn btn-primary btn-sm', 
                    text: '<i class="fas fa-print mr-2"></i> Print',
                    customize: function ( win ) {
                        $(win.document.body).find( 'table' )
                            .addClass( 'compact' )
                            .css( 'font-size', 'inherit' );
                    }, 
                },
                // 'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            ajax: {
                url: "<?php echo base_url() ?>scripts/qutationAccList.php",
                type: "POST", // you can use GET
                // data: function(d) {}
            },
            "order": [[ 0, "desc" ]],
            "columns": [
                {
                    "data": "tbl_inquiry_idtbl_inquiry"
                },
                {
                    "data": "name"
                },
                {
                    "data": "quot_date"
                },
                {
                    "data": "duedate"
                },
                {
                    "data": "total"
                },
                {
                    "targets": -1,
                    "className": 'text-right',
                    "data": null,
                    "render": function(data, type, full) {
                        var button='';
                        button += '<a href="<?php echo base_url() ?>Quotationform/Getquotation/' + full['idtbl_inquiry'] + '/' + full['idtbl_customer'] + '" class="btn btn-success btn-sm btnquotation mr-1" data-toggle="tooltip" data-placement="bottom" title="Create Order"><i class="fas fa-list"></i></a>';
                        
                        return button;
                    }
                }
            ],
            drawCallback: function(settings) {
                $('[data-toggle="tooltip"]').tooltip();
            }
        });

        

    });




    function deactive_confirm() {
        return confirm("Are you sure you want to deactive this?");
    }

    function active_confirm() {
        return confirm("Are you sure you want to active this?");
    }

    function delete_confirm() {
        return confirm("Are you sure you want to remove this?");
    }
</script>
<?php include "include/footer.php"; ?>