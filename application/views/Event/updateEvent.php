<!-- CONTENT -->
<section id="content">
	<div class="page page-forms-validate">
		<!-- bradcome -->
		<div class="bg-light lter b-b wrapper-md mb-10">
			<div class="row">
				<div class="col-sm-6 col-xs-12">
					<h1 class="h3 m-0">Event Form</h1>
				</div>
			</div>
		</div>
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<section class="boxs">
					<div class="boxs-header">
						<h3 class="custom-font hb-blush">
							<strong>Add</strong> Event
						</h3>
					</div>
					<div class="boxs-body">
						<form class="form-horizontal" name="form4" action="<?php echo site_url(); ?>/EventController/cupdate/<?php echo $editData->event_id ?>" method="post" role="form" id="form4" data-parsley-validate>
							<div class="form-group">
								<label class="col-sm-3 control-label">EventCategory Title</label>
								<div class="col-sm-9">
									<select class="form-control" name="evCatId" onchange="getEvSpekName(this.value)">
										<option>Select EventCategory Title</option>
										<?php foreach($eventcategoryData as $row) { 

											if($editData->eventcategory_id == $row->eventcategory_id)
											{
											?>
												<option value="<?php echo $row->eventcategory_id ?>" selected><?php echo $row->eventcategory_title ?></option>
											<?php
											}
											else
											{
											?>
												<option value="<?php echo $row->eventcategory_id ?>"><?php echo $row->eventcategory_title ?></option>

											<?php
											}

										 } ?>
									</select> 
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">EventSpeaker Name</label>
								<div class="col-sm-9">
									<select id="eventspeaker" class="form-control" name="evSpeakId">
										<option>Select EventSpeaker Name</option>
										<?php foreach($eventspeakerData as $row): ?>
											<?php if($editData->eventspeaker_id == $row->eventspeaker_id): ?>
												<option value="<?php echo $row->eventspeaker_id ?>" selected> <?php echo $row->eventspeaker_name ?> </option>
											<?php else: ?>
												<option value="<?php echo $row->eventspeaker_id ?>"> <?php echo $row->eventspeaker_name ?> </option>
											<?php endif; ?>
										<?php endforeach; ?>
									</select> 
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">State Name</label>
								<div class="col-sm-9">
									<select class="form-control" name="stateId" onchange="getCity(this.value)">
										<option>Select State Name</option>
										<?php foreach($stateData as $row): ?>
											<?php if($editData->state_id == $row->state_id): ?>
												<option value="<?php echo $row->state_id ?>" selected> <?php echo $row->state_name ?> </option>
											<?php else: ?>
												<option value="<?php echo $row->state_id ?>"> <?php echo $row->state_name ?> </option>
											<?php endif; ?>
										<?php endforeach; ?>
									</select> 
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">City Name</label>
								<div class="col-sm-9">
									<select id="city" class="form-control" name="cityId" onchange="getArea(this.value)">
										<option>Select City Name</option>
										<?php foreach($cityData as $row): ?>
											<?php if($editData->city_id == $row->city_id): ?>
												<option value="<?php echo $row->city_id ?>" selected> <?php echo $row->city_name ?> </option>
											<?php else: ?>
												<option value="<?php echo $row->city_id ?>"> <?php echo $row->city_name ?> </option>
											<?php endif; ?>
										<?php endforeach; ?>
									</select> 
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Area Name</label>
								<div class="col-sm-9">
									<select id="area" class="form-control" name="areaId">
										<option>Select Area Name</option>
										<?php foreach($areaData as $row): ?>
											<?php if($editData->area_id == $row->area_id): ?>
												<option value="<?php echo $row->area_id ?>" selected> <?php echo $row->area_name ?> </option>
											<?php else: ?>
												<option value="<?php echo $row->area_id ?>"> <?php echo $row->area_name ?> </option>
											<?php endif; ?>
										<?php endforeach; ?>
									</select> 
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Event Title</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="eventTitle" value="<?php echo $editData->event_title ?>" data-parsley-trigger="change" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Event Trailer</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="eventTrailer" value="<?php echo $editData->event_trailer ?>" data-parsley-trigger="change" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Event Price</label>
								<div class="col-sm-9">
									<input type="number" class="form-control" name="eventPrice" value="<?php echo $editData->event_price ?>" data-parsley-trigger="change" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Event Image</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="eventImage" value="<?php echo $editData->event_images ?>" data-parsley-trigger="change" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Event Description</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="eventDescription" value="<?php echo $editData->event_description ?>" data-parsley-trigger="change" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Event Type</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="eventType" value="<?php echo $editData->event_type ?>" data-parsley-trigger="change" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Event Address</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="eventAddress" value="<?php echo $editData->event_address ?>" data-parsley-trigger="change" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Event Date</label>
								<div class="col-sm-9">
									<input type="date" class="form-control" name="eventDate" value="<?php echo $editData->event_date ?>" data-parsley-trigger="change" required>
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
	function getEvSpekName(catId){
		$.ajax({
			url:"<?php echo site_url(); ?>/EventController/getCategory/"+catId,
			method:"post",
			success:function(res){
				$('#eventspeaker').html("<option>Select EventSpeaker</option>")
				$('#eventspeaker').append(res)
			}
		})
	}

	function getCity(stateId){
		console.log("stateid:", stateId);
		$.ajax({
			url:"<?php echo site_url(); ?>/EventController/getState/"+stateId,
			method:"post",
			success:function(res){
				console.log("Response from getState:", res);
				$('#city').html("<option>Select city</option>")
				$('#city').append(res)
			}
		})
	}

	function getArea(cityId){
		console.log("cityId:", cityId);
		$.ajax({
			url:"<?php echo site_url(); ?>/EventController/getCity/"+cityId,
			method:"post",
			success:function(res){
				console.log("Response from getCity:", res);
				$('#area').html("<option>Select Area</option>")
				$('#area').append(res)
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