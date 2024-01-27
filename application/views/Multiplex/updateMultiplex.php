<!-- CONTENT -->
<section id="content">
	<div class="page page-forms-validate">
		<!-- bradcome -->
		<div class="bg-light lter b-b wrapper-md mb-10">
			<div class="row">
				<div class="col-sm-6 col-xs-12">
					<h1 class="h3 m-0">Multiplex Form</h1>
				</div>
			</div>
		</div>
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<section class="boxs">
					<div class="boxs-header">
						<h3 class="custom-font hb-blush">
							<strong>Update</strong> Multiplex
						</h3>
					</div>
					<div class="boxs-body">
						<form class="form-horizontal" name="form4" action="<?php echo site_url(); ?>/MultiplexController/cupdate/<?php echo $editData->multiplex_id ?>" method="post" role="form" id="form4" data-parsley-validate>
							<div class="form-group">
								<label class="col-sm-3 control-label">State Name</label>
								<div class="col-sm-9">
									<select class="form-control" name="stateId" onchange="getCity(this.value)">
										<option>Select State Name</option>
										<?php foreach($stateData as $row): ?>
											<?php if($editData->state_id == $row->state_id): ?>
												<option value="<?php echo $row->state_id ?>" selected><?php echo $row->state_name ?></option>
											<?php else: ?>
												<option value="<?php echo $row->state_id ?>"><?php echo $row->state_name ?></option>
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
												<option value="<?php echo $row->city_id ?>" selected><?php echo $row->city_name ?></option>
											<?php else: ?>
												<option value="<?php echo $row->city_id ?>"><?php echo $row->city_name ?></option>
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
												<option value="<?php echo $row->area_id ?>" selected><?php echo $row->area_name ?></option>
											<?php else: ?>
												<option value="<?php echo $row->area_id ?>"><?php echo $row->area_name ?></option>
											<?php endif; ?>
										<?php endforeach; ?>
									</select> 
								</div>
							</div>	

							<div class="form-group">
								<label class="col-sm-3 control-label">Multiplex Name</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="multName" value="<?php echo $editData->multiplex_name ?>" data-parsley-trigger="change" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">No of screen</label>
								<div class="col-sm-9">
									<input type="number" class="form-control" name="noOfScreen" value="<?php echo $editData->no_of_screen ?>" data-parsley-trigger="change" required>
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
	function getCity(stateId){
		$.ajax({
			url:"<?php echo site_url(); ?>/MultiplexController/getState/"+stateId,
			method:"post",
			success:function(res){
				$('#city').html("<option>Select City</option>")
				$('#city').append(res)
			}
		})
	}

	function getArea(cityId){
		$.ajax({
			url:"<?php echo site_url(); ?>/EventController/getCity/"+cityId,
			method:"post",
			success:function(res){
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