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
                            <span>Rejected inquiry</span>
                        </h1>
                    </div>
                </div>
            </div>
            <div class="container-fluid mt-2 p-0 p-2">
                <div class="card">
                    <div class="card-body p-0 p-2">
                        <div class="row">
                        	<div class="col-3">
                        		<form action="<?php echo base_url() ?>Rejectedinquiry/Rejectedinquiryinsertupdate"
                        			method="post" autocomplete="off">
 

                        			<div class="form-group mb-1">
                        				<label class="small font-weight-bold">Reason*</label>
                        				<select class="form-control form-control-sm" name="tbl_reason_idtbl_reason"
                        					id="tbl_reason_idtbl_reason" required>
                        					<option value="">Select</option>
                        					<?php foreach($reasontype->result() as $rowreasontype){ ?>
                        					<option
                        						value="<?php echo $rowreasontype->idtbl_reason ?>">
                        						<?php echo $rowreasontype->type ?></option>
                        					<?php } ?>
                        				</select>
                        			</div>

                        			<div class="form-group mb-1">
                        				<label class="small font-weight-bold">Qutation ID*</label>
                        				<select class="form-control form-control-sm" name="tbl_quotation_idtbl_quotation"
                        					id="tbl_quotation_idtbl_quotation" required>
                        					<option value="">Select</option>
                        					<?php foreach($quotationid->result() as $rowquotationid){ ?>
                        					<option
                        						value="<?php echo $rowquotationid->idtbl_quotation ?>">
                        						<?php echo $rowquotationid->idtbl_quotation ?></option>
                        					<?php } ?>
                        				</select>
                        			</div>
                        	<div class="form-group">
                        		<label class="small font-weight-bold">Remarks*</label>
                        		<textarea class="form-control form-control-sm" name="remarks" id="remarks"></textarea>
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
                        				<th>Reason</th>
                                        <th>Qutation ID</th>
                        				<th>Remarks</th>
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
                url: "<?php echo base_url() ?>scripts/rejectedinquirylist.php",
                type: "POST", // you can use GET
                // data: function(d) {}
            },
            "order": [[ 0, "desc" ]],
            "columns": [
                {
                    "data": "idtbl_quotation_reject"
                },
                {
                    "data": "tbl_reason_idtbl_reason"
                },
                {
                    "data": "tbl_quotation_idtbl_quotation"
                },
                {
                    "data": "remarks"
                },
                {
                    "targets": -1,
                    "className": 'text-right',
                    "data": null,
                    "render": function(data, type, full) {
                        var button='';
                        button+='<button class="btn btn-primary btn-sm btnEdit mr-1 ';if(editcheck!=1){button+='d-none';}button+='" id="'+full['idtbl_quotation_reject']+'"><i class="fas fa-pen"></i></button>';
                        if(full['status']==1){
                            button+='<a href="<?php echo base_url() ?>Rejectedinquiry/Rejectedinquirystatus/'+full['idtbl_quotation_reject']+'/2" onclick="return deactive_confirm()" target="_self" class="btn btn-success btn-sm mr-1 ';if(statuscheck!=1){button+='d-none';}button+='"><i class="fas fa-check"></i></a>';
                        }else{
                            button+='<a href="<?php echo base_url() ?>Rejectedinquiry/Rejectedinquirystatus/'+full['idtbl_quotation_reject']+'/1" onclick="return active_confirm()" target="_self" class="btn btn-warning btn-sm mr-1 ';if(statuscheck!=1){button+='d-none';}button+='"><i class="fas fa-times"></i></a>';
                        }
                        button+='<a href="<?php echo base_url() ?>Rejectedinquiry/Rejectedinquirystatus/'+full['idtbl_quotation_reject']+'/3" onclick="return delete_confirm()" target="_self" class="btn btn-danger btn-sm ';if(deletecheck!=1){button+='d-none';}button+='"><i class="fas fa-trash-alt"></i></a>';
                        
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
                    url: '<?php echo base_url() ?>Rejectedinquiry/Rejectedinquiryedit',
                    success: function(result) { //alert(result);
                        var obj = JSON.parse(result);
                        $('#recordID').val(obj.id);
                        $('#tbl_reason_idtbl_reason').val(obj.tbl_reason_idtbl_reason); 
                        $('#tbl_quotation_idtbl_quotation').val(obj.tbl_quotation_idtbl_quotation);                       
                        $('#remarks').val(obj.remarks);                      

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
