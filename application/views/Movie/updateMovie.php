<!-- CONTENT -->
<section id="content">
	<div class="page page-forms-validate">
		<!-- bradcome -->
		<div class="bg-light lter b-b wrapper-md mb-10">
			<div class="row">
				<div class="col-sm-6 col-xs-12">
					<h1 class="h3 m-0">Movie Form</h1>
				</div>
			</div>
		</div>
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<section class="boxs">
					<div class="boxs-header">
						<h3 class="custom-font hb-blush">
							<strong>Update</strong> Movie
						</h3>
					</div>
					<div class="boxs-body">
						<form class="form-horizontal" name="form4" action="<?php echo site_url(); ?>/MovieController/cupdate/<?php echo $editData->movie_id ?>" method="post" role="form" id="form4" data-parsley-validate>
							<div class="form-group">
								<label class="col-sm-3 control-label">MovieIndustry Name</label>
								<div class="col-sm-9">
									<select class="form-control" name="indId" onchange="getMovCategory(this.value)">
										<option>Select MovieIndustry Name</option>
										<?php foreach($movieindustryData as $row): ?>
											<?php if($editData->industry_id == $row->industry_id): ?>
												<option value="<?php echo $row->industry_id ?>" selected><?php echo $row->industry_name ?></option>
											<?php else: ?>
												<option value="<?php echo $row->industry_id ?>"><?php echo $row->industry_name ?></option>
											<?php endif; ?>
										<?php endforeach; ?>
									</select> 
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Movie Category Name</label>
								<div class="col-sm-9">
									<select id="movCategory" class="form-control" name="catId">
										<option>Select Movie Category Name</option>
										<?php foreach($moviecategoryData as $row): ?>
											<?php if($editData->category_id == $row->category_id): ?>
												<option value="<?php echo $row->category_id ?>" selected><?php echo $row->category_name ?></option>
											<?php else: ?>
												<option value="<?php echo $row->category_id ?>"><?php echo $row->category_name ?></option>
											<?php endif; ?>
										<?php endforeach; ?>
									</select> 
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Multiplex Name</label>
								<div class="col-sm-9">
									<select class="form-control" name="multId">
										<option>Select Multiplex Name</option>
										<?php foreach($multiplexData as $row): ?>
											<?php if($editData->multiplex_id == $row->multiplex_id): ?>
												<option value="<?php echo $row->multiplex_id ?>" selected><?php echo $row->multiplex_name ?></option>
											<?php else: ?>
												<option value="<?php echo $row->multiplex_id ?>"><?php echo $row->multiplex_name ?></option>
											<?php endif; ?>
										<?php endforeach; ?>
									</select> 
								</div>
							</div>
						
							<div class="form-group">
								<label class="col-sm-3 control-label">Movie Name</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="moName" value="<?php echo $editData->movie_name ?>" data-parsley-trigger="change" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Movie Cast</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="moCast" value="<?php echo $editData->movie_cast ?>" data-parsley-trigger="change" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Movie Price</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="moPrice" value="<?php echo $editData->movie_price ?>" data-parsley-trigger="change" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Movie Rating</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="moRating" value="<?php echo $editData->movie_rating ?>" data-parsley-trigger="change" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Movie Experience</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="moExp" value="<?php echo $editData->movie_experience ?>" data-parsley-trigger="change" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Status</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="stat" value="<?php echo $editData->status ?>" data-parsley-trigger="change" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Movie Description</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="moDesc" value="<?php echo $editData->movie_description ?>" data-parsley-trigger="change" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Movie Poster</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="moPost" value="<?php echo $editData->movie_poster ?>" data-parsley-trigger="change" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Movie Images</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="moImg" value="<?php echo $editData->movie_images ?>" data-parsley-trigger="change" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Movie Review</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="moRevi" value="<?php echo $editData->movie_review ?>" data-parsley-trigger="change" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Movie Trailer</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="moTrailer" value="<?php echo $editData->movie_trailer ?>" data-parsley-trigger="change" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Movie Language</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="moLang" value="<?php echo $editData->movie_language ?>" data-parsley-trigger="change" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Screen</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="scr" value="<?php echo $editData->screen ?>" data-parsley-trigger="change" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Movie Duration</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="moDura" value="<?php echo $editData->movie_duration ?>" data-parsley-trigger="change" required>
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
	function getMovCategory(movIndustryId){
		$.ajax({
			url:"<?php echo site_url(); ?>/MovieController/getMovIndustry/"+movIndustryId,
			method:"post",
			success:function(res){
				$('#movCategory').html("<option>Select Movie Category</option>")
				$('#movCategory').append(res)
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