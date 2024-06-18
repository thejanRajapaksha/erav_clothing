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
                        <h1 class="page-header-title font-weight-light">
                            <div class="page-header-icon"><i class="fas fa-shopping-basket"></i></div>
                            <span>Quotation details </span>
                        </h1>
                    </div>
                </div>
            </div>
            <div class="container-fluid mt-2 p-0 p-2">
                <div class="card">
                    <div class="card-body p-0 p-2">
                        <div class="row">
                        	<div class="col-3">
                        		<form action="<?php echo base_url() ?>Quotation/Quotationinsertupdate"
                        			method="post" autocomplete="off">

                        			<div class="form-group mb-1">
                                        <label class="small font-weight-bold">Date*</label>
                                        <input type="date" class="form-control form-control-sm" name="date" id="date" required>
                                    </div>
                                     
                        			<div class="form-group mb-1">
                        				<label class="small font-weight-bold">Inquiry ID*</label>
                        				<select class="form-control form-control-sm" name="tbl_inquiry_idtbl_inquiry"
                        					id="tbl_inquiry_idtbl_inquiry" required>
                        					<option value="">Select</option>
                        					<?php foreach($Inquiryid->result() as $rowInquiryid){ ?>
                        					<option
                        						value="<?php echo $rowInquiryid->idtbl_inquiry ?>">
                        						<?php echo $rowInquiryid->idtbl_inquiry ?></option>
                        					<?php } ?>
                        				</select>
                        			</div>

                                    <div class="form-group mb-1">
                                        <label class="small font-weight-bold">Total*</label>
                                        <input type="text" class="form-control form-control-sm" name="total" id="total" required>
                                    </div>
                        	 
                        	<div class="form-group mt-2 text-right">
                        		<button type="submit" id="submitBtn" class="btn btn-primary btn-sm px-4"
                        			<?php if($addcheck==0){echo 'disabled';} ?>><i
                        				class="far fa-save"></i>&nbsp;Add</button>
                        	</div>
                        	<input type="hidden" name="recordOption" id="recordOption" value="1">
                        	<input type="hidden" name="recordID" id="recordID" value="">
                        	</form>
                        </div>
                        
                        <div class="col-9">
                        	<table class="table table-bordered table-striped table-sm nowrap" id="dataTable">
                        		<thead>
                        			<tr>
                        				<th>#</th>
                        				<th>Date</th>
                                        <th>Inquiry ID</th>
                        				<th>Total</th>
                        				<th class="text-right">Actions</th>
                        			</tr>
                        		</thead>
                        	</table>
                        </div>
                        </div>
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
        var addcheck='<?php echo $addcheck; ?>';
        var editcheck='<?php echo $editcheck; ?>';
        var statuscheck='<?php echo $statuscheck; ?>';
        var deletecheck='<?php echo $deletecheck; ?>';

        $('#dataTable').DataTable({
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
                { extend: 'csv', className: 'btn btn-success btn-sm', title: 'Quotation  Information', text: '<i class="fas fa-file-csv mr-2"></i> CSV', },
                { extend: 'pdf', className: 'btn btn-danger btn-sm', title: 'Quotation  Information', text: '<i class="fas fa-file-pdf mr-2"></i> PDF', },
                { 
                    extend: 'print', 
                    title: 'Quotation  Information',
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
                url: "<?php echo base_url() ?>scripts/quotationlist.php",
                type: "POST", // you can use GET
                // data: function(d) {}
            },
            "order": [[ 0, "desc" ]],
            "columns": [
                {
                    "data": "idtbl_quotation"
                },
                {
                    "data": "date"
                },
                {
                    "data": "tbl_inquiry_idtbl_inquiry"
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
                        button+='<button class="btn btn-primary btn-sm btnEdit mr-1 ';if(editcheck!=1){button+='d-none';}button+='" id="'+full['idtbl_quotation']+'"><i class="fas fa-pen"></i></button>';
                        if(full['status']==1){
                            button+='<a href="<?php echo base_url() ?>Quotation/Quotationstatus/'+full['idtbl_quotation']+'/2" onclick="return deactive_confirm()" target="_self" class="btn btn-success btn-sm mr-1 ';if(statuscheck!=1){button+='d-none';}button+='"><i class="fas fa-check"></i></a>';
                        }else{
                            button+='<a href="<?php echo base_url() ?>Quotation/Quotationstatus/'+full['idtbl_quotation']+'/1" onclick="return active_confirm()" target="_self" class="btn btn-warning btn-sm mr-1 ';if(statuscheck!=1){button+='d-none';}button+='"><i class="fas fa-times"></i></a>';
                        }
                        button+='<a href="<?php echo base_url() ?>Quotation/Quotationstatus/'+full['idtbl_quotation']+'/3" onclick="return delete_confirm()" target="_self" class="btn btn-danger btn-sm ';if(deletecheck!=1){button+='d-none';}button+='"><i class="fas fa-trash-alt"></i></a>';
                        
                        return button;
                    }
                }
            ],
            drawCallback: function(settings) {
                $('[data-toggle="tooltip"]').tooltip();
            }
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
                    url: '<?php echo base_url() ?>Quotation/Quotationedit',
                    success: function(result) { //alert(result);
                        var obj = JSON.parse(result);
                        $('#recordID').val(obj.id);
                        $('#date').val(obj.date); 
                        $('#tbl_inquiry_idtbl_inquiry').val(obj.tbl_inquiry_idtbl_inquiry);                       
                        $('#total').val(obj.total);               

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
