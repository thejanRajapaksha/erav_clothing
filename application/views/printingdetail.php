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
                            <span>Printing Details</span>
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

<!-- Payment Modal -->
<div class="modal fade" id="Paymentmodal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="PaymentmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="PaymentmodalLabel">Payment Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <form id="paymentform" autocomplete="off" enctype="multipart/form-data">
                            <div class="form-row mb-3">
                                <div class="col-md-6">
                                    <label for="bank" class="small font-weight-bold text-dark">Bank Name*</label>
                                    <select class="form-control form-control-sm" name="bank" id="bank" required>
                                        <option value="">Select</option>
                                        <!-- Add bank options here -->
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="paymenttype" class="small font-weight-bold text-dark">Payment type*</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="" name="paymenttype" id="paymenttype" required>
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col-md-6">
                                    <label for="advance" class="small font-weight-bold text-dark">Advance Rs.*</label>
                                    <input type="number" class="form-control form-control-sm" placeholder="" name="advance" id="advance" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="pdate" class="small font-weight-bold text-dark">Date*</label>
                                    <input type="date" class="form-control form-control-sm" name="pdate" id="pdate" required>
                                </div>
                            </div>
                            <hr class="border-dark">
                            <div class="form-group text-right">
                                <button type="button" id="payformsubmit" class="btn btn-primary btn-sm px-4" <?php if ($addcheck == 0) { echo 'disabled'; } ?>><i class="fas fa-plus"></i>&nbsp;Save details</button>
                                <input type="hidden" id="recordOption" value="1">
                                <input type="hidden" id="inquiryid" value="">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var addcheck='<?php echo $addcheck; ?>';
        var editcheck='<?php echo $editcheck; ?>';
        var statuscheck='<?php echo $statuscheck; ?>';
        var deletecheck='<?php echo $deletecheck; ?>';

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
                    customize: function (win) {
                        $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                    }, 
                },
            ],
            ajax: {
                url: "<?php echo base_url() ?>scripts/qutationAccList.php",
                type: "POST",
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
                        var button = '';
                        button += '<button class="btn btn-primary btn-sm btnview mr-1" data-toggle="modal" data-target="#orderdet" data-qid="' + full['idtbl_quotation'] + '" data-id="' + full['tbl_inquiry_idtbl_inquiry'] + '" data-customer="' + full['idtbl_customer'] + '" title="Payment details view"><i class="fas fa-eye"></i></button>';
                        button += '<button class="btn btn-success btn-sm btnquotation mr-1" data-toggle="modal" data-target="#staticBackdrop" data-qid="' + full['idtbl_quotation'] + '" data-id="' + full['tbl_inquiry_idtbl_inquiry'] + '" data-customer="' + full['idtbl_customer'] + '" title="Create Order"><i class="fas fa-list"></i></button>';
                        button += '<button class="btn btn-dark btn-sm btnpayment mr-1" data-toggle="modal" data-target="#Paymentmodal" data-qid="' + full['idtbl_quotation'] + '" data-id="' + full['tbl_inquiry_idtbl_inquiry'] + '" data-customer="' + full['idtbl_customer'] + '" title="Payment details"><i class="fas fa-credit-camera"></i></button>';
                        return button;
                    }
                }
            ],
            drawCallback: function(settings) {
                $('[data-toggle="tooltip"]').tooltip();
            }
        });

        $('#dataTableAccepted').on('click', '.btnpayment', function() {
            var qid = $(this).data('qid');
            var id = $(this).data('id');
            $('#inquiryid').val(id);
        });
        
        $('#dataTable tbody').on('click', '.btnEdit', function() {
            var r = confirm("Are you sure, You want to Edit this ? ");
            if (r == true) {
                var id = $(this).attr('id');
                $.ajax({
                    type: "POST",
                    data: {
                        recordID: id
                    },
                    url: '<?php echo base_url() ?>Cuttingdetail/Cuttingdetailedit',
                    success: function(result) { //alert(result);
                        var obj = JSON.parse(result);
                        $('#recordID').val(obj.id);
                        $('#name').val(obj.materialname); 
                        $('#materialcategory').val(obj.materialcategory);                       
                        $('#code').val(obj.materialinfocode);  
                        $('#comment').val(obj.comment);                     

                        $('#recordOption').val('2');
                        $('#submitBtn').html('<i class="far fa-save"></i>&nbsp;Update');
                    }
                });
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
