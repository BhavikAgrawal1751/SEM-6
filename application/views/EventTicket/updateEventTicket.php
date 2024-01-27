<!-- CONTENT -->
<section id="content">
	<div class="page page-forms-validate">
		<!-- bradcome -->
		<div class="bg-light lter b-b wrapper-md mb-10">
			<div class="row">
				<div class="col-sm-6 col-xs-12">
					<h1 class="h3 m-0">EventTicket Form</h1>
				</div>
			</div>
		</div>
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<section class="boxs">
					<div class="boxs-header">
						<h3 class="custom-font hb-blush">
							<strong>Update</strong> EventTicket
						</h3>
					</div>
					<div class="boxs-body">
						<form class="form-horizontal" name="form4" action="<?php echo site_url(); ?>/EventTicketController/cupdate/<?php echo $editData->eventticket__id; ?>" method="post" role="form" id="form4" data-parsley-validate>
							<div class="form-group">
								<label class="col-sm-3 control-label">EventCategory Title</label>
								<div class="col-sm-9">
									<select class="form-control" name="evCatId" onchange="getSpeaker(this.value)">
										<option>Select EventCategory Title</option>
										<?php foreach($eventcategoryData as $row): ?>
											<?php if($editData->eventcategory_id == $row->eventcategory_id): ?>
												<option value="<?php echo $row->eventcategory_id ?>" selected><?php echo $row->eventcategory_title ?></option>
											<?php else: ?>
												<option value="<?php echo $row->eventcategory_id ?>"><?php echo $row->eventcategory_title ?></option>
											<?php endif; ?>
										<?php endforeach; ?>
									</select> 
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">EventSpeaker Name</label>
								<div class="col-sm-9">
									<select id="speaker" class="form-control" name="evSpeakId" onchange="getEvent(this.value)">
										<option>Select EventSpeaker Name</option>
										<?php foreach($eventspeakerData as $row): ?>
											<?php if($editData->eventspeaker_id == $row->eventspeaker_id): ?>
												<option value="<?php echo $row->eventspeaker_id ?>" selected><?php echo $row->eventspeaker_name ?></option>
											<?php else: ?>
												<option value="<?php echo $row->eventspeaker_id ?>"><?php echo $row->eventspeaker_name ?></option>
											<?php endif; ?>
										<?php endforeach; ?>
									</select> 
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Event Title</label>	
								<div class="col-sm-9">
									<select id="event" class="form-control" name="eventId">
										<option>Select Event Title</option>
										<?php foreach($eventData as $row): ?>
											<?php if($editData->event_id == $row->event_id): ?>
												<option value="<?php echo $row->event_id ?>" selected><?php echo $row->event_title ?></option>
											<?php else: ?>
												<option value="<?php echo $row->event_id ?>"><?php echo $row->event_title ?></option>
											<?php endif; ?>
										<?php endforeach; ?>
									</select> 
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">EventTicket Type</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="type" value="<?php echo $editData->eventticket_type; ?>" data-parsley-trigger="change" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Total Amount</label>
								<div class="col-sm-9">
									<input type="number" class="form-control" name="totalAm" value="<?php echo $editData->totalamount; ?>" data-parsley-trigger="change" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Customer Name</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="custName" value="<?php echo $editData->customer_name; ?>" data-parsley-trigger="change" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Customer Email</label>
								<div class="col-sm-9">
									<input type="email" class="form-control" name="custEm" value="<?php echo $editData->customer_email; ?>" data-parsley-trigger="change" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Customer Mobile</label>
								<div class="col-sm-9">
									<input type="number" class="form-control" name="custMob" value="<?php echo $editData->customer_mob; ?>" data-parsley-trigger="change" required>
								</div>
							</div>
					</div>
					<div class="boxs-footer text-right bg-tr-black lter dvd dvd-top">
						<button type="submit" class="btn btn-raised btn-success" id="form4Submit">Update</button>
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
	function getSpeaker(catId){
		$.ajax({
			url:"<?php echo site_url(); ?>/EventTicketController/getCategory/"+catId,
			method:"post",
			success:function(res){
				$('#speaker').html("<option>Select EventSpeaker</option>")
				$('#speaker').append(res)
			}
		})
	}	

	function getEvent(speakerId){
		$.ajax({
			url:"<?php echo site_url(); ?>/EventTicketController/getSpeaker/"+speakerId,
			method:"post",
			success:function(res){
				$('#event').html("<option>Select Event</option>")
				$('#event').append(res)
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