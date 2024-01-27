<!-- CONTENT -->
<section id="content">
	<div class="page page-forms-validate">
		<!-- bradcome -->
		<div class="bg-light lter b-b wrapper-md mb-10">
			<div class="row">
				<div class="col-sm-6 col-xs-12">
					<h1 class="h3 m-0">MovieTicketBooking Form</h1>
				</div>
			</div>
		</div>
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<section class="boxs">
					<div class="boxs-header">
						<h3 class="custom-font hb-blush">
							<strong>Add</strong> MovieTicketBooking
						</h3>
					</div>
					<div class="boxs-body">
						<form class="form-horizontal" name="form4" action="<?php echo site_url(); ?>/MovieTicketBookingController/cinsert/" method="post" role="form" id="form4" data-parsley-validate>
							<div class="form-group">
								<label class="col-sm-3 control-label">Movie Name</label>
								<div class="col-sm-9">
									<select class="form-control" name="moId" onchange="getMultiplex(this.value)">
										<option>Select Movie Name</option>
										<?php foreach($movieData as $row) { ?>
											<option value="<?php echo $row->movie_id ?>"><?php echo $row->movie_name ?></option>
										<?php } ?>
									</select> 
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Multiplex Name</label>
								<div class="col-sm-9">
									<select id="multi" class="form-control" name="multId">
										<option>Select Multiplex Name</option>
										<?php foreach($multiplexData as $row) { ?>
											<option value="<?php echo $row->multiplex_id ?>"><?php echo $row->multiplex_name ?></option>
										<?php } ?>
									</select> 
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">MovieTicket Time</label>
								<div class="col-sm-9">
									<select class="form-control" name="moTicId">
										<option>Select MovieTicket Time</option>
										<?php foreach($movieticketplanData as $row) { ?>
											<option value="<?php echo $row->movieticket_id ?>"><?php echo $row->movieticket_time ?></option>
										<?php } ?>
									</select> 
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">MovieSeatPlan Name</label>
								<div class="col-sm-9">
									<select class="form-control" name="seatPlanID">
										<option>Select MovieSeatPlan Name</option>
										<?php foreach($movieseatplanData as $row) { ?>
											<option value="<?php echo $row->seatplan_id ?>"><?php echo $row->seat_name ?></option>
										<?php } ?>
									</select> 
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">TicketBooking No</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="ticBookNo" placeholder="TicketBooking No" data-parsley-trigger="change" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">No of seats</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="noOfSeats" placeholder="No of seats" data-parsley-trigger="change" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Total Amount</label>
								<div class="col-sm-9">
									<input type="number" class="form-control" name="totAm" placeholder="Total Amount" data-parsley-trigger="change" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Customer Name</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="cusName" placeholder="Customer Name" data-parsley-trigger="change" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Customer Email</label>
								<div class="col-sm-9">
									<input type="email" class="form-control" name="cusEmail" placeholder="Customer Email" data-parsley-trigger="change" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Customer Mobile</label>
								<div class="col-sm-9">
									<input type="number" class="form-control" name="cusMobile" placeholder="Customer Mobile" data-parsley-trigger="change" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Payment Gateway</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="pay" placeholder="Payment Gateway" data-parsley-trigger="change" required>
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
<script>
	function getMultiplex(movieId){
		console.log("Selected Movie ID:", movieId);
		$.ajax({
			url:"<?php echo site_url(); ?>/MovieTicketBookingController/getMovie/"+movieId,
			method:"post",
			success:function(res){
				console.log("Response from getMovie:", res);
				$("#multi").html("<option>Select Multiplexx</option>")
				$("#multi").append(res)
			}
		})
	}
</script>

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