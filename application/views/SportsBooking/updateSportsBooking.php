<!-- CONTENT -->
<section id="content">
	<div class="page page-forms-validate">
		<!-- bradcome -->
		<div class="bg-light lter b-b wrapper-md mb-10">
			<div class="row">
				<div class="col-sm-6 col-xs-12">
					<h1 class="h3 m-0">SportsBooking Form</h1>
				</div>
			</div>
		</div>
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<section class="boxs">
					<div class="boxs-header">
						<h3 class="custom-font hb-blush">
							<strong>Add</strong> SportsBooking
						</h3>
					</div>
					<div class="boxs-body">
						<form class="form-horizontal" name="form4" action="<?php echo site_url(); ?>/SportsBookingController/cupdate/<?php echo $editData->sportsbooking_id ?>" method="post" role="form" id="form4" data-parsley-validate>
							<div class="form-group">
								<label class="col-sm-3 control-label">Sports Title</label>
								<div class="col-sm-9">
									<select class="form-control" name="sportId">
										<option>Select Sports Title</option>
										<?php foreach($sportsData as $row): ?>
											<?php if($editData->sports_id == $row->sports_id): ?>
												<option value="<?php echo $row->sports_id ?>" selected><?php echo $row->sports_title ?></option>
											<?php else: ?>
												<option value="<?php echo $row->sports_id ?>"><?php echo $row->sports_title ?></option>
											<?php endif; ?>
										<?php endforeach; ?>
									</select> 
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Customer Name</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="cusName" value="<?php echo $editData->customer_name ?>" data-parsley-trigger="change" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Customer Email</label>
								<div class="col-sm-9">
									<input type="email" class="form-control" name="cusEmail" value="<?php echo $editData->customer_email ?>" data-parsley-trigger="change" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Customer Mobile</label>
								<div class="col-sm-9">
									<input type="number" class="form-control" name="cusMobile" value="<?php echo $editData->customer_mobile ?>" data-parsley-trigger="change" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Ticket Type</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="tickType" value="<?php echo $editData->ticket_type ?>" data-parsley-trigger="change" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Ticket Quantity</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="tickQuantity" value="<?php echo $editData->ticket_quantity ?>" data-parsley-trigger="change" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Total Amount</label>
								<div class="col-sm-9">
									<input type="number" class="form-control" name="totalAm" value="<?php echo $editData->totalamount ?>" data-parsley-trigger="change" required>
								</div>
							</div>
					</div>
					<div class="boxs-footer text-right bg-tr-black lter dvd dvd-top">
						<button type="submit" class="btn btn-raised btn-default" id="form4Submit">Submit</button>
						</form>
					</div>
				</section>
			</div>
		</div>
	</div>
</section>
<!--/ CONTENT -->
</div>
<!--/ Application Content -->

<!-- Vendor JavaScripts -->
<script src="<?php echo base_url(); ?>assets/bundles/libscripts.bundle.js"></script>
<script src="<?php echo base_url(); ?>assets/bundles/vendorscripts.bundle.js"></script>

<script src="<?php echo base_url(); ?>assets/js/vendor/parsley/parsley.min.js"></script>
<!--/ vendor javascripts -->

<!-- Custom JavaScripts  -->
<script src="<?php echo base_url(); ?>assets/bundles/mainscripts.bundle.js"></script> <!-- Custom Js -->
<!--/ custom javascripts -->

<!-- Page Specific Scripts  -->
<script>
	$(window).load(function() {
		$('#form1').parsley().subscribe('parsley:field:validate', function() {
			if ($('#form1').parsley().isValid()) {
				$('#form1Submit').prop('disabled', false);
			} else {
				$('#form1Submit').prop('disabled', true);
			}
		});

		$('#form1Submit').on('click', function() {
			$('#form1').submit();
		});

		$('#form2Submit').on('click', function() {
			$('#form2').submit();
		});

		$('#form3Submit').on('click', function() {
			$('#form3').submit();
		});

		$('#form4Submit').on('click', function() {
			$('#form4').submit();
		});
	});
</script>
<!--/ Page Specific Scripts -->
</body>

<!-- Mirrored from thememakker.com/templates/falcon/html/form-validate.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 Dec 2019 06:44:26 GMT -->

</html>