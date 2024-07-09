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
							<div class="page-header-icon"><i class="fas fa-quote-right"></i></div>
							<span>Order Form</span>
						</h1>
					</div>
				</div>
			</div>
			<div class="container-fluid mt-2 p-0 p-2">
				<div class="card">
					<div class="card-body p-0 p-2">
						<div class="row">
							<div class="col-12 text-right">
								<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#staticBackdrop" 
								<?php if ($addcheck == 0) {
										echo 'disabled';
									} ?>><i class="fas fa-plus mr-2"></i>Create Order</button>
								<hr>
							</div>
						</div>
						<div class="row">
							<div class="col-12">

								<table class="table table-bordered table-striped table-sm nowrap" id="dataTable">
									<thead>
										<tr>
											<th>#</th>
											<th>Order Date</th>
											<th>Customer Name</th>
											<th class="d-none">Inquiry ID</th>
											<th class="d-none">Customer ID</th>
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
					<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
						<form id="createorderform" autocomplete="off" enctype="multipart/form-data">
							<div class="form-row mb-1">
								<div class="col">
									<label class="small font-weight-bold text-dark">Order Date*</label>
									<input type="date" class="form-control form-control-sm" placeholder="" name="order_date" id="order_date" value="<?php echo date('Y-m-d') ?>" required>
								</div>
								<div class="col">
									<label class="small font-weight-bold text-dark">Due Date*</label>
									<input type="date" class="form-control form-control-sm" placeholder="" name="duedate" id="duedate" value="<?php echo date('Y-m-d') ?>" required>
								</div>
							</div>
							<div class="form-group mb-1">
								<label class="small font-weight-bold">Customer Name*</label>
								<select class="form-control form-control-sm" name="customername"
									id="customername" required>
									<option value="">Select</option>
									<?php foreach($Customername->result() as $rowCustomername){ ?>
									<option value="<?php echo $rowCustomername->idtbl_customer ?>">
										<?php echo $rowCustomername->name ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group mb-1">
								<label class="small font-weight-bold">Cloth type*</label>
								<select class="form-control form-control-sm" name="clothtype"
									id="clothtype" required>
									<option value="">Select</option>
									<?php foreach($Clothtype->result() as $rowClothtype){ ?>
									<option value="<?php echo $rowClothtype->idtbl_cloth ?>">
										<?php echo $rowClothtype->type ?></option>
									<?php } ?>
								</select>
							</div>

							<div class="form-group mb-1">
								<label class="small font-weight-bold">Material type*</label>
								<select class="form-control form-control-sm" name="materialtype"
									id="materialtype" required>
									<option value="">Select</option>
									<?php foreach($Materialtype->result() as $rowMaterialtype){ ?>
									<option value="<?php echo $rowMaterialtype->idtbl_material ?>">
										<?php echo $rowMaterialtype->type ?></option>
									<?php } ?>
								</select>
							</div>
							
							<div class="form-row mb-1">
								<div class="col">
									<label class="small font-weight-bold text-dark">Qty*</label>
									<input type="number" class="form-control form-control-sm" placeholder="" name="qty" id="qty" required>
								</div>
								<div class="col">
									<label class="small font-weight-bold text-dark">Price*</label>
									<input type="number" class="form-control form-control-sm" placeholder="" name="unitprice" id="unitprice" required>
								</div>
							</div>
							<div class="form-group mb-1">
								<label class="small font-weight-bold text-dark">Description</label>
								<textarea name="comment" id="comment" class="form-control form-control-sm" 
								<?php if ($editcheck == 0) {
										echo 'readonly';} ?>>
								</textarea>
							</div>
							<hr class="border-dark">
							<div class="form-group mt-3 text-right">
								<button type="button" id="formsubmit" class="btn btn-primary btn-sm px-4" 
								<?php if ($addcheck == 0) {
										echo 'disabled';
									} ?>><i class="fas fa-plus"></i>&nbsp;Add to list</button>
								<input name="submitBtn" type="submit" value="Save" id="submitBtn" class="d-none">
								<input type="hidden" id="recordOption" value="1">
							</div>
							<!-- <input type="hidden" name="refillprice" id="refillprice" value=""> -->
						</form>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
						<div class="scrollbar pb-3" id="style-3">
							<table class="table table-striped table-bordered table-sm small" id="tableorder">
								<thead>
									<tr>
										<th>Cloth</th>
										<th>Meterial</th>
										<th>Description</th>
										<th>Qty</th>
										<th>Unitprice</th>
										<th class="d-none">Order details ID</th>
										<th class="text-right">Total</th>
									</tr>
								</thead>
								<tbody></tbody>
							</table>
						</div>
						<div class="row">
							<div class="col text-right">
								<h1 class="font-weight-600" id="divtotal">Rs. 0.00</h1>
							</div>
							<input type="hidden" id="hidetotalorder" value="0">
							<input type="hidden" id="sumdis" value="0">
						</div>
						<hr>
						<div class="form-group">
							<label class="small font-weight-bold text-dark">Remark</label>
							<textarea name="remark" id="remark" class="form-control form-control-sm"></textarea>
							<input type="hidden" id="getid" value="<?php echo $getid; ?>">
						</div>
						<div class="form-group mt-2">
							<button type="button" id="btncreateorder" class="btn btn-outline-primary btn-sm fa-pull-right"><i class="fas fa-save"></i>&nbsp;Create
							Order</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal order details -->
<div class="modal fade" id="ordermodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="page-header-title font-weight-bold">
					<div class="page-header-icon"><i class="fas fa-address-book"></i> <span>Order Details</span></div>
				</h1>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeCD">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div>
					</div>
					<div class="col-12">
						<div class="scrollbar pb-3" id="style-2">
							<table class="table table-bordered table-striped table-sm nowrap">
								<thead>
									<tr>
										<th>#</th>
										<th class="d-none"></th>
										<th>Due Date</th>
										<th>Description</th>
										<th>Quantity</th>
										<th>Price</th>
										<th class="text-right">Total</th>
									</tr>
								</thead>
								<tbody id="getorderdataform">

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="inquiryCancelModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalCenterTitle">Cancel this Order</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form>
				<div class="modal-body">
					<div class="form-group">
						<label for="exampleFormControlInput1">Reason</label>
						<textarea class="form-control form-control-sm" id="cancelMsg" rows="5"></textarea>
					</div>
					<input type="hidden" id="modalInquiryCancelID">
					<input type="hidden" id="agentMobileNum">
				</div>
				<div class="modal-footer">
					<button type="button" id="btnDeleteAgentMsg" class="btn btn-outline-danger btn-sm"
					 <?php if ($deletecheck == 0) {
							echo 'disabled';
						} ?>><i class="fas fa-trash-alt"></i>&nbsp;Cancel Order</button>
				</div>
			</form>
		</div>
	</div>
</div>


<?php include "include/footerscripts.php"; ?>
<script>
	$(document).ready(function() {
		var addcheck = '<?php echo $addcheck; ?>';
		var editcheck = '<?php echo $editcheck; ?>';
		var statuscheck = '<?php echo $statuscheck; ?>';
		var deletecheck = '<?php echo $deletecheck; ?>';

		var getid = $('#getid').val();

		//alert(getid);

		$('#staticBackdrop').on('shown.bs.modal', function() {
			$('.selecter2').select2({
				width: '100%',
				dropdownParent: $('#staticBackdrop')
			});

			var getid = $('#getid').val();
			$.ajax({
				type: "POST",
				data: {
					getid: getid,

				},
				url: '<?php echo base_url() ?>Orderform/Orderformgetcustomer',
				success: function(result) { //alert(result);
					//console.log(result);
					// $('#ordermodal').modal('show');
					// $('#getorderdataform').html(result);

				}
			});
		});

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
			"buttons": [{
					extend: 'csv',
					className: 'btn btn-success btn-sm',
					title: 'Order Information',
					text: '<i class="fas fa-file-csv mr-2"></i> CSV',
				},
				{
					extend: 'pdf',
					className: 'btn btn-danger btn-sm',
					title: 'Order Information',
					text: '<i class="fas fa-file-pdf mr-2"></i> PDF',
				},
				{
					extend: 'print',
					title: 'Order Information',
					className: 'btn btn-primary btn-sm',
					text: '<i class="fas fa-print mr-2"></i> Print',
					customize: function(win) {
						$(win.document.body).find('table')
							.addClass('compact')
							.css('font-size', 'inherit');
					},
				},
				// 'copy', 'csv', 'excel', 'pdf', 'print'
			],
			ajax: {
				url: "<?php echo base_url() ?>scripts/orderformlist.php",
				type: "POST", // you can use GET
				data: function(d) {
					d.userID = '<?php echo $_SESSION['userid']; ?>';
					d.getid = getid;
				}
			},
			"order": [
				[0, "desc"]
			],
			"columns": [{
					"data": function(data, type, full) {
						return "QT-" + data.idtbl_order;
					}
				},
				{
					"data": "order_date"
				},
				{
					"data": "name"
					// "render": function(data, type, full) {
					//         return "UN/GRN-0000" + data;
					// }
				},
				{
					"className": 'd-none',
					"data": "idtbl_inquiry"
				},
				{
					"className": 'd-none',
					"data": "idtbl_customer"
				},
				{
					"targets": -1,
					"className": 'text-right',
					"data": null,
					"render": function(data, type, full) {
						var button = '';
						if (full['approvestatus'] == 1) {
							button += '<button  id="' + full['idtbl_order'] + '" target="_self" class="btn btn-dark btn-sm mr-1 approvebtn" value ="2"  data-toggle="tooltip" data-placement="bottom" title="Disapprove Order"';
							if (statuscheck != 1) {
								button += 'd-none';
							}
							button += '"><i class="fas fa-check"></i></a>';
						} else {
							button += '<button id="' + full['idtbl_order'] + '"  target="_self" class="btn btn-light btn-sm mr-1 approvebtnelse" value ="1" data-toggle="tooltip" data-placement="bottom" title="Approve Order"';
							if (statuscheck != 1) {
								button += 'd-none';
							}
							button += '"><i class="fas fa-times"></i></a>';

						}
						button += '<button class="btn btn-info btn-sm btninfo mr-1" id="' + full['idtbl_order'] + '" data-toggle="tooltip" data-placement="bottom" title="Order Details"><i class="fa fa-info-circle" aria-hidden="true"></i></button>';

						if (full['approvestatus'] == 0) {
							button += '<button disabled target="_blank" class="btn btn-danger btn-sm btnPdf mr-1" id="' + full['idtbl_order'] + '" data-toggle="tooltip" data-placement="bottom" title="Order PDF"><i class="fas fa-file-pdf"></i></button>';
						} else {
							button += '<a href="<?php echo base_url() ?>Orderform/Orderformpdf/' + full['idtbl_order'] + '" target="_blank" class="btn btn-danger btn-sm btnPdf mr-1" data-toggle="tooltip" data-placement="bottom" title="Order PDF"><i class="fas fa-file-pdf"></i></a>';

						}

						if (full['status'] == 1) {
							button += '<button id="' + full['idtbl_order'] + '"  target="_self" class="btn btn-success btn-sm mr-1 btnstatus" value ="2" data-toggle="tooltip" data-placement="bottom" title="Deactive"';
							if (statuscheck != 1) {
								button += 'd-none';
							}
							button += '"><i class="fas fa-check"></i></a>';
						} else {
							button += '<button id="' + full['idtbl_order'] + '"  target="_self" class="btn btn-warning btn-sm mr-1 btnstatuselse" value ="1" data-toggle="tooltip" data-placement="bottom" title="Active"';
							if (statuscheck != 1) {
								button += 'd-none';
							}
							button += '"><i class="fas fa-times"></i></a>';
						}
						button += '<button id="' + full['idtbl_order'] + '" target="_self" class="btn btn-danger btn-sm btndlt" value ="3" data-toggle="tooltip" data-placement="bottom" title="Cancel Order"';
						if (deletecheck != 1) {
							button += 'd-none';
						}
						button += '"><i class="fas fa-trash-alt"></i></a>';

						return button;
					}
				}
			],
			drawCallback: function(settings) {
				$('[data-toggle="tooltip"]').tooltip();
			}
		});

		

		
	});

	$('#meterial').on('change', function() {
		var productid = $('#meterial').val();
		var getid = $('#getid').val();
		var customer = $('#customer').val();

		$.ajax({
			type: "POST",
			data: {
				productid: productid,
				getid: getid,
				customer: customer
			},
			url: '<?php echo base_url() ?>Orderform/Orderformunitprice',
			success: function(result) {
				var obj = JSON.parse(result);
				if (obj.error) {

				} else {
					$('#qty').val(obj.quantity);
					//$('#qty').val(obj.value);
					console.log(obj);
				}
			}
		});
	});
	$('#product').on('change', function() {
		var productid = $('#product').val();
		var getid = $('#getid').val();

		//alert(productid);
		//alert(getid);
		$.ajax({
			type: "POST",
			data: {
				productid: productid,
				getid: getid
			},
			url: '<?php echo base_url() ?>Orderform/Orderformmeterial',
			success: function(result) {
				var objfirst = JSON.parse(result);
				console.log(objfirst);
				var html = '';
				html += '<option value="">Select</option>';
				$.each(objfirst, function(i, item) {
					//alert(objfirst[i].id);
					html += '<option value="' + objfirst[i].idtbl_material + '">';
					html += objfirst[i].type; //+' - '+objfirst[i].subids
					html += '</option>';
				});

				$('#meterial').empty().append(html);

				// if (value != '') {
				//     $('#productcategory').val(value);
				// }
			}
		});
	});

	function rejectreason(recordID, type) {
		$('#inquiryCancelModal').on('click', '#btnDeleteAgentMsg', function() {
			var cancelMsg = $('#cancelMsg').val();

			$.ajax({
				type: "POST",
				data: {
					recordID: recordID,
					type: type,
					cancelMsg: cancelMsg

				},
				url: '<?php echo base_url() ?>Orderform/Orderformstatus',
				success: function(result) { //alert(result);
					var obj = JSON.parse(result);
					if (obj.status == 0) {

						setTimeout(function() {
							window.location.reload();

						}, 400);
					}
					action(obj.action);
				}
			});
		});
	}
	// function Getorder(orderId) {

	// 	$('#orderdatatable').DataTable({
	// 		"destroy": true,
	// 		"processing": true,
	// 		"serverSide": true,
	// 		dom: "<'row'<'col-sm-5'B><'col-sm-7'f><'col-sm-2'l>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-5'i><'col-sm-7'p>>",
	// 		responsive: true,
	// 		lengthMenu: [
	// 			[10, 25, 50, -1],
	// 			[10, 25, 50, 'All'],
	// 		],
	// 		"buttons": [{
	// 				extend: 'csv',
	// 				className: 'btn btn-success btn-sm',
	// 				title: 'Order Information',
	// 				text: '<i class="fas fa-file-csv mr-2"></i> CSV',
	// 			},
	// 			{
	// 				extend: 'pdf',
	// 				className: 'btn btn-danger btn-sm',
	// 				title: 'Order Information',
	// 				text: '<i class="fas fa-file-pdf mr-2"></i> PDF',
	// 			},
	// 			{
	// 				extend: 'print',
	// 				title: 'Order Information',
	// 				className: 'btn btn-primary btn-sm',
	// 				text: '<i class="fas fa-print mr-2"></i> Print',
	// 				customize: function(win) {
	// 					$(win.document.body).find('table')
	// 						.addClass('compact')
	// 						.css('font-size', 'inherit');
	// 				},
	// 			},
	// 			// 'copy', 'csv', 'excel', 'pdf', 'print'
	// 		],
	// 		ajax: {
	// 			url: "<?php echo base_url() ?>scripts/orderinfolist.php",
	// 			type: "POST",
	// 			data: function(d) {
	// 				d.userID = '<?php echo $_SESSION['userid']; ?>';
	// 				d.orderId = orderId;
	// 			}
	// 		},
	// 		"order": [
	// 			[0, "desc"]
	// 		],
	// 		"columns": [{
	// 				"data": "order_date"
	// 			},
	// 			{
	// 				"data": "duedate"
	// 			},
	// 			{
	// 				"data": "remarks"
	// 			},
	// 			{
	// 				"data": "comment"
	// 			},
	// 			{
	// 				"data": "qty"
	// 			},
	// 			{
	// 				"data": "unitprice"
	// 			},
	// 			{
	// 				"data": "delivery_charge"
	// 			},
	// 			{
	// 				"data": "discount"
	// 			},
	// 			{
	// 				"data": "total"
	// 			},

	// 		],
	// 		drawCallback: function(settings) {
	// 			$('[data-toggle="tooltip"]').tooltip();
	// 		}
	// 	});
	// }


	$("#formsubmit").click(function() {
		if (!$("#createorderform")[0].checkValidity()) {
			// If the form is invalid, submit it. The form won't actually submit;
			// this will just cause the browser to display the native HTML5 error messages.
			$("#submitBtn").click();
		} else {
			var productID = $('#product').val();
			var meterialID = $('#meterial').val();
			var meterial = $("#meterial option:selected").text();
			var product = $("#product option:selected").text();
			var unitprice = parseFloat($('#unitprice').val());
			var qty = parseFloat($('#qty').val());
			//var quotdate = $('#order_date').val();
			var description = $('#comment').val();
			//var duedate = $('#duedate').val();
			//var deliverycharge = $('#delivery_charge').val();
			var customer = $('#customer').val();


			$('.selecter2').select2();


			var total = unitprice * qty;

			var showtotal = addCommas(parseFloat(total).toFixed(2));

			$('#tableorder > tbody:last').append('<tr class="pointer"><td class="d-none">' + productID +
				'</td><td>' + product + '</td><td class="d-none">' + meterialID +
				'</td><td>' + meterial + '</td><td>' + description + '</td><td>' + qty +
				'</td><td class="d-none">' + unitprice + '</td><td>' + addCommas(unitprice.toFixed(2)) + '</td><td>' + showtotal + '</td><td class="d-none total">' + total + '</td></tr>');

			$('#product').val('');
			$('#unitprice').val('');
			$('#qty').val('');
			$('#comment').val('');
			$('#meterial').val('');


			var sum = 0;
			$(".total").each(function() {
				sum += parseFloat($(this).text());
			});

			var showsum = addCommas(parseFloat(sum).toFixed(2));

			$('#divtotal').html('Rs. ' + showsum);
			$('#hidetotalorder').val(sum);
			$('#product').focus();

			var dis = 0;
			$(".totaldis").each(function() {
				dis += parseFloat($(this).text());
			});
			var showdis = addCommas(parseFloat(dis).toFixed(2));

			$('#sumdis').val(dis);

		}
	});
	$('#tableorder').on('click', 'tr', function() {
		var r = confirm("Are you sure, You want to remove this product ? ");
		if (r == true) {
			$(this).closest('tr').remove();

			var sum = 0;
			$(".total").each(function() {
				sum += parseFloat($(this).text());
			});

			var showsum = addCommas(parseFloat(sum).toFixed(2));

			$('#divtotal').html('Rs. ' + showsum);
			$('#hidetotalorder').val(sum);
			$('#product').focus();
		}
	});

	$('#btncreateorder').click(function() {
		$('#btncreateorder').prop('disabled', true).html('<i class="fas fa-circle-notch fa-spin mr-2"></i> Create Good Receive Note');
		var tbody = $("#tableorder tbody");
		var formData = new FormData();

		if (tbody.children().length > 0) {
			jsonObj = [];
			$("#tableorder tbody tr").each(function() {
				item = {}
				$(this).find('td').each(function(col_idx) {
					item["col_" + (col_idx + 1)] = $(this).text();
				});
				jsonObj.push(item);
			});
			console.log(jsonObj);

			var remarks = $('#remark').val();
			var getid = $('#getid').val();
			var showsum = $('#divtotal').html();
			var trimmedValue = $('#hidetotalorder').val();
			var sumdis = $('#sumdis').val();
			var recordOption = $('#recordOption').val();
			var quotdate = $('#order_date').val();
			var duedate = $('#duedate').val();
			var customer = $('#customer').val();

			formData.append('tableData', JSON.stringify(jsonObj)); // Properly encode JSON
			formData.append('getid', getid);
			formData.append('recordOption', recordOption);
			formData.append('trimmedValue', trimmedValue);
			formData.append('sumdis', sumdis);
			formData.append('quotdate', quotdate);
			formData.append('duedate', duedate);
			formData.append('customer', customer);
			formData.append('remarks', remarks);

			$.ajax({
				type: "POST",
				data: formData,
				processData: false,
				contentType: false,
				url: '<?php echo base_url() ?>Orderform/Orderforminsertupdate',
				success: function(result) {
					var obj = JSON.parse(result);
					$('#staticBackdrop').modal('hide');
					if (obj.status == 1) {
						setTimeout(function() {
							window.location.reload();
						}, 3000);
					}
					action(obj.action);
				}
			});
		}
	});


	// $('#product').change(function() {
	// 	var productID = $(this).val();

	// 	$.ajax({
	// 		type: "POST",
	// 		data: {
	// 			recordID: productID
	// 		},
	// 		url: 'Orderform/Getproduct',
	// 		success: function(result) { //alert(result);
	// 			var obj = JSON.parse(result);
	// 			$('#product').val(obj.product);
	// 			// $('#unitprice').val(obj.unitprice);
	// 			// $('#comment').val(obj.comment);
	// 		}
	// 	});
	// });
	// $('#quater').change(function () {
	// 	var quaterID = $(this).val();
	// 	var mfdate = $('#mfdate').val();

	// 	$.ajax({
	// 		type: "POST",
	// 		data: {
	// 			recordID: quaterID,
	// 			mfdate: mfdate
	// 		},
	// 		url: 'Goodreceive/Getexpdateaccoquater',
	// 		success: function (result) { //alert(result);
	// 			$('#expdate').val(result);
	// 		}
	// 	});
	// });
	

	function addCommas(nStr) {
		nStr += '';
		x = nStr.split('.');
		x1 = x[0];
		x2 = x.length > 1 ? '.' + x[1] : '';
		var rgx = /(\d+)(\d{3})/;
		while (rgx.test(x1)) {
			x1 = x1.replace(rgx, '$1' + ',' + '$2');
		}
		return x1 + x2;
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