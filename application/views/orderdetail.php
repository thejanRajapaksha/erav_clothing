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

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Create Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-3">
                        <form id="createorderform" autocomplete="off" enctype="multipart/form-data">
                            <div class="form-row mb-1">
                                <div class="col">
                                    <label class="small font-weight-bold text-dark">Cloth type*</label>
                                    <select class="form-control form-control-sm" name="clothtype" id="clothtype" required>
                                        <option value="">Select</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label class="small font-weight-bold text-dark">Material type*</label>
                                    <select class="form-control form-control-sm" name="materialtype" id="materialtype" required>
                                        <option value="">Select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row mb-1">
                                <div class="col">
                                    <label class="small font-weight-bold text-dark">Size type*</label>
                                    <select class="form-control form-control-sm" name="sizetype" id="sizetype" required>
                                        <option value="">Select</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label class="small font-weight-bold text-dark">Quantity*</label>
                                    <input type="number" class="form-control form-control-sm" placeholder="" name="qty" id="qty" required>
                                </div>
                            </div>
                            <hr class="border-dark">
                            <div class="form-group mt-3 text-right">
                                <button type="button" id="formsubmit" class="btn btn-primary btn-sm px-4" <?php if ($addcheck == 0) { echo 'disabled'; } ?>><i class="fas fa-plus"></i>&nbsp;Add to list</button>
                                <input name="submitBtn" type="submit" value="Save" id="submitBtn" class="d-none">
                                <input type="hidden" id="recordOption" value="1">
                                <input type="hidden" id="inquiryid" value="">
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-8 col-xl-9">
                        <div class="scrollbar pb-3" id="style-2">
                            <table class="table table-striped table-bordered table-sm small" id="tableorder">
                                <thead>
                                    <tr>
                                        <th>Cloth</th>
                                        <th>Material</th>
                                        <th>Size</th>
                                        <th>Qty</th>
                                        <!-- <th>Unitprice</th> -->
                                        <th class="d-none">Order details ID</th>
                                        <th class="text-right">Total</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                        <div class="form-group">
                            <label class="small font-weight-bold text-dark">Remark</label>
                            <textarea name="remark" id="remark" class="form-control form-control-sm"></textarea>
                        </div>
                        <div class="row">
                            <div class="col text-right">
                                <!-- <h1 class="font-weight-600" id="divtotal">Rs. 0.00</h1> -->
                            </div>
                            <input type="hidden" id="hidetotalorder" value="0">
                            <input type="hidden" id="sumdis" value="0">
                        </div>
                        <hr>
                        
                        <div class="form-group mt-2">
                            <button type="button" id="btncreateorder" class="btn btn-outline-primary btn-sm fa-pull-right"><i class="fas fa-save"></i>&nbsp;Create Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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

<!-- Detail Modal -->
<div class="modal fade" id="orderdet" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="orderdetLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderdetLabel">Order Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="commonFields"></div>
                <div class="row my-4"></div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                        <div class="scrollbar pb-3" id="style-2">
                            <table class="table table-striped table-bordered table-sm small" id="orderdetailtable">
                                <thead>
                                    <tr>
                                        <th>Cloth</th>
                                        <th>Material</th>
                                        <th>Size</th>
                                        <th>Qty</th>
                                        <th>Cutting Qty</th>
                                        <th>Balance</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                        <hr>
                        <button id="saveCuttingDetails" class="btn btn-primary">Save Cutting Details</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



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
                        button += '<button class="btn btn-dark btn-sm btnpayment mr-1" data-toggle="modal" data-target="#Paymentmodal" data-qid="' + full['idtbl_quotation'] + '" data-id="' + full['tbl_inquiry_idtbl_inquiry'] + '" data-customer="' + full['idtbl_customer'] + '" title="Payment details"><i class="fas fa-credit-card"></i></button>';
                        // button += '<button class="btn btn-white btn-sm btncutting mr-1" data-toggle="modal" data-target="#Cuttingmodal" data-qid="' + full['idtbl_quotation'] + '" data-id="' + full['tbl_inquiry_idtbl_inquiry'] + '" data-customer="' + full['idtbl_customer'] + '" title="Cutting details"><i class="fa fa-scissors"></i></button>';
                        return button;
                    }
                }
            ],
            drawCallback: function(settings) {
                $('[data-toggle="tooltip"]').tooltip();
            }
        });

        $('#dataTableAccepted').on('click', '.btnquotation', function() {
            var qid = $(this).data('qid');
            var id = $(this).data('id');
            $('#inquiryid').val(id);

            $('#staticBackdrop').modal('show');
        });

        $('#dataTableAccepted').on('click', '.btnpayment', function() {
            var qid = $(this).data('qid');
            var id = $(this).data('id');
            $('#inquiryid').val(id);
        });

        $('#btnquotation').click(function() {
            $('#staticBackdrop').modal('show');
        });

        $('#dataTableAccepted').on('click', '.btnview', function() {
            var id = $(this).data('id');
            $('#inquiryid').val(id);

            $.ajax({
                url: "<?php echo base_url() ?>Orderdetail/Getorderdetails",
                type: 'POST',
                data: { inquiryid: id },
                dataType: 'json',
                success: function(data) {
                    var tableBody = $('#orderdetailtable tbody');
                    tableBody.empty();
                    $('#commonFields').remove();

                    if (data.length > 0) {
                        var commonFields = '<div id="commonFields">' +
                                        '<div><strong>Payment Type:</strong> ' + data[0].payment_type + '</div>' +
                                        '<div><strong>Advance &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</strong> ' + data[0].advance + '</div>';
                        if (data[0].bname) {
                            commonFields += '<div><strong>Bank Name &nbsp&nbsp&nbsp&nbsp:</strong>&nbsp;  ' + data[0].bname + '</div>';
                        }

                        commonFields += '</div>';
                        $('#orderdet .modal-body').prepend(commonFields);
                        data.forEach(function(orderDetail) {
                            var balance = orderDetail.cutting_qty - orderDetail.quantity;
                            var row = '<tr>' +
                                    '<td>' + orderDetail.cloth_type + '</td>' +
                                    '<td>' + orderDetail.material_type + '</td>' +
                                    '<td>' + orderDetail.size + '</td>' +
                                    '<td>' + orderDetail.quantity + '</td>' +
                                    '<td><input type="number" class="form-control form-control-sm cutting-qty" data-id="' + orderDetail.idtbl_order_detail + '" value="' + orderDetail.cutting_qty + '" /></td>' +
                                    '<td class="balance">' + (balance >= 0 ? '+' : '') + balance + '</td>' + 
                                    '</tr>';
                            tableBody.append(row);
                        });

                        $('#orderdet').modal('show');
                    } else {
                        alert('No order details found for this inquiry.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                    alert('Failed to load order details. Please try again later.');
                }
            });
        });

        $(document).on('input', '.cutting-qty', function() {
            var $row = $(this).closest('tr');
            var quantity = parseInt($row.find('td').eq(3).text());
            var cuttingQty = parseInt($(this).val());
            var balance = cuttingQty - quantity;
            $row.find('.balance').text((balance >= 0 ? '+' : '') + balance);
        });

        $('#saveCuttingDetails').on('click', function() {
            var updatedData = [];

            // Collect updated data from the table
            $('#orderdetailtable tbody tr').each(function() {
                var row = $(this);
                var cuttingQty = row.find('.cutting-qty').val();
                var id = row.find('.cutting-qty').data('id');

                updatedData.push({
                    id: id,
                    cuttingQty: cuttingQty
                });
            });

            // Send updated data to the server
            $.ajax({
                url: "<?php echo base_url() ?>Orderdetail/SaveCuttingDetails",
                type: 'POST',
                data: {
                    updatedData: JSON.stringify(updatedData)
                },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        alert('Cutting details saved successfully!');
                        $('#orderdet').modal('hide');
                    } else {
                        alert('Failed to save cutting details. Please try again.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                    alert('An error occurred. Please try again later.');
                }
            });
        });       

        $("#clothtype").select2({
            dropdownParent: $('#staticBackdrop'),
            ajax: {
                url: "<?php echo base_url() ?>Orderdetail/Getclothtype",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        inquiryid: $('#inquiryid').val(),
                        searchTerm: params.term // search term
                    };
                },
                processResults: function(response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        });

        $("#sizetype").select2({  
            dropdownParent: $('#staticBackdrop'),
            ajax: {
                url: "<?php echo base_url() ?>Orderdetail/Getsizetype",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        searchTerm: params.term // search term
                    };
                },
                processResults: function(response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        });

        $("#bank").select2({  
            dropdownParent: $('#Paymentmodal'),
            ajax: {
                url: "<?php echo base_url() ?>Orderdetail/Getbankname",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        searchTerm: params.term // search term
                    };
                },
                processResults: function(response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        });

        $('#payformsubmit').click(function() {
            var formData = {
                bank: $('#bank').val(),
                paymenttype: $('#paymenttype').val(),
                advance: $('#advance').val(),
                pdate: $('#pdate').val(),
                inquiryid: $('#inquiryid').val(),
                recordOption: $('#recordOption').val()
            };

            $.ajax({
                type: 'POST',
                url: "<?php echo base_url() ?>Orderdetail/PaymentDetailInsertUpdate",
                data: formData,
                dataType: 'json',
                encode: true,
                success: function(data) {
                    // console.log(data);
                    window.location.reload();
                }
            });
        });

        $("#materialtype").select2({
            dropdownParent: $('#staticBackdrop'),
            placeholder: "Select material type",
            allowClear: true
        });

        $("#clothtype").on('change', function() {
            var clothtypeId = $(this).val();
            if (clothtypeId) {
                $("#materialtype").prop("disabled", false);
                $("#materialtype").select2({
                    dropdownParent: $('#staticBackdrop'),
                    ajax: {
                        url: "<?php echo base_url() ?>Orderdetail/Getmaterialtype",
                        type: "post",
                        dataType: 'json',
                        delay: 250,
                        data: function(params) {
                            return {
                                inquiryid: $('#inquiryid').val(),
                                clothtypeId: clothtypeId,
                                searchTerm: params.term // search term
                            };
                        },
                        processResults: function(response) {
                            return {
                                results: response
                            };
                        },
                        cache: true
                    }
                });

                $.ajax({
                    url: "<?php echo base_url() ?>Orderdetail/GetQuantity",
                    type: "post",
                    data: {
                        inquiryid: $('#inquiryid').val(),
                        clothtypeId: clothtypeId
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response && response.quantity) {
                            $('#quantity').val(response.quantity);
                        } else {
                            $('#quantity').val('');
                            alert('Failed to fetch quantity');
                        }
                    },
                    error: function(xhr, status, error) {
                        $('#quantity').val('');
                        alert('Error in fetching quantity');
                    }
                });
            } else {
                $("#materialtype").prop("disabled", true);
                $("#materialtype").val(null).trigger('change');
            }
        });

    });

    $("#formsubmit").click(function() {
        if (!$("#createorderform")[0].checkValidity()) {
            // If the form is invalid, submit it. The form won't actually submit;
            // this will just cause the browser to display the native HTML5 error messages.
            $("#submitBtn").click();
        } else {
            var clothTypeID = $('#clothtype').val();
            var materialTypeID = $('#materialtype').val();
            var sizeTypeID = $('#sizetype').val();
            var clothType = $("#clothtype option:selected").text();
            var materialType = $("#materialtype option:selected").text();
            var sizeType = $("#sizetype option:selected").text();
            var qty = parseFloat($('#qty').val());
            var description = $('#remark').val(); // Use 'remark' instead of 'comment'

            $('.selecter2').select2();

            $('#tableorder > tbody:last').append(
                '<tr class="pointer">' +
                '<td class="d-none">' + clothTypeID + '</td>' +
                '<td>' + clothType + '</td>' +
                '<td class="d-none">' + materialTypeID + '</td>' +
                '<td>' + materialType + '</td>' +
                '<td class="d-none">' + sizeTypeID + '</td>' +
                '<td>' + sizeType + '</td>' +
                '<td>' + qty + '</td>' +
                '<td class="d-none total">' + qty + '</td>' + // Use 'qty' instead of 'unitprice'
                '</tr>'
            );

            $('#clothtype').val('').trigger('change');
            $('#materialtype').val('').trigger('change');
            $('#sizetype').val('').trigger('change');
            $('#qty').val('');
            $('#remark').val(''); // Clear the remark field

            var sum = 0;
            $(".total").each(function() {
                sum += parseFloat($(this).text());
            });
        }
    });

    $('#btncreateorder').click(function() {
        $('#btncreateorder').prop('disabled', true).html('<i class="fas fa-circle-notch fa-spin mr-2"></i> Creating Order');

        var tbody = $("#tableorder tbody");
        var formData = new FormData();

        if (tbody.children().length > 0) {
            var jsonObj = [];
            $("#tableorder tbody tr").each(function() {
                item = {}
				$(this).find('td').each(function(col_idx) {
					item["col_" + (col_idx + 1)] = $(this).text();
				});
				jsonObj.push(item);
            });

            console.log(jsonObj);

            var clothTypeID = $('#clothtype').val();
            var materialTypeID = $('#materialtype').val();
            var sizeTypeID = $('#sizetype').val();
            var qty = parseFloat($('#qty').val());
            var inquiryid = $('#inquiryid').val();
            var quotationid = $('#quotationid').val();

            formData.append('tableData', JSON.stringify(jsonObj)); 
            formData.append('clothTypeID', clothTypeID);
            formData.append('materialTypeID', materialTypeID);
            formData.append('sizeTypeID', sizeTypeID);
            formData.append('qty', qty);
            formData.append('inquiryid', inquiryid);
            formData.append('quotationid', quotationid);

            $.ajax({
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                url: '<?php echo base_url() ?>Orderdetail/Orderdetailinsertupdate',
                success: function(result) {
                    var obj = result;//JSON.parse(result);
                    $('#staticBackdrop').modal('hide');
                    if (obj.status == 1) {
                        setTimeout(function() {
                            window.location.reload();
                        }, 3000);
                    }
                    action(obj);
                },
                error: function(xhr, status, error) {
                    console.error('Error: ' + error);
                    $('#btncreateorder').prop('disabled', false).html('Create Order');
                }
            });
        }
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

    function action(data) { //alert(data);
		var obj = JSON.parse(data);
		$.notify({
			// options
			icon: obj.icon,
			title: obj.title,
			message: obj.message,
			url: obj.url,
			target: obj.target
		}, {
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
<?php include "include/footer.php"; ?>
