<!--  CONTENT  -->
<section id="content">
			<div class="page page-tables-footable">
				<!-- bradcome -->
				<div class="b-b mb-10">
					<div class="row">
						<div class="col-sm-6 col-xs-12">
							<h1 class="h3 m-0">Movie Table</h1>
							<small class="text-muted">Welcome to Falcon application</small>
						</div>
					</div>
				</div>

				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<section class="boxs ">
							<div class="boxs-header">
								<h3 class="custom-font hb-cyan">
									<strong>Movie</strong> Table</h3>

							</div>
							<div class="boxs-body">
								<div class="form-group">
									<label for="filter" style="padding-top: 5px">Search:</label>
									<input id="filter" type="text" class="form-control rounded w-md mb-10 inline-block" />
								</div>
								<table id="searchTextResults" data-filter="#filter" data-page-size="5" class="footable table table-custom">
									<thead>
										<tr>
											<th># </th>
											<th>Industry Name</th>
											<th data-hide="phone">Category Name</th>
											<th data-hide='phone, tablet'>Multiplex Name</th>
											<th data-hide='phone, tablet'>Movie Name</th>
											<th>Movie cast </th>
											<th>Movie price </th>
											<th>Movie rating </th>
											<th>Movie experience </th>
											<th>status </th>
											<th>Movie description </th>
											<th>Movie poster </th>
											<th>Movie images </th>
											<th>Movie trailer </th>
											<th>Movie language </th>
											<th>Screen </th>
											<th>Movie duration</th>
											<th>Movie status</th>
											<th>Movie Dateregister</th>
											<th colspan="2" class="text-center">Action</th>
										</tr>
									</thead>
									<tbody>
									<?php
										foreach($data as $row)
										{
									?>	
										<tr>
											<td><?php echo $row->movie_id;?></td>
											<td><?php echo $row->industry_name;?></td>
											<td><?php echo $row->category_name;?></td>
											<td><?php echo $row->multiplex_name;?></td>
											<td><?php echo $row->movie_name;?></td>
											<td><?php echo $row->movie_cast;?></td>
											<td><?php echo $row->movie_price;?></td>
											<td><?php echo $row->movie_rating;?></td>
											<td><?php echo $row->movie_experience;?></td>
											<td><?php echo $row->status;?></td>
											<td><?php echo $row->movie_description;?></td>
											<td><?php echo $row->movie_poster;?></td>
											<td><?php echo $row->movie_images;?></td>
											<td><?php echo $row->movie_trailer;?></td>
											<td><?php echo $row->movie_language;?></td>
											<td><?php echo $row->screen;?></td>
											<td><?php echo $row->movie_duration;?></td>
											<td><a href="<?php echo site_url(); ?>/MovieController/status/<?php echo $row->movie_id ?>" class="btn btn-raised <?php echo ($row->movie_status == 'Blocked') ? 'btn-danger' : 'btn-success'; ?>"><?php echo $row->movie_status;?></a></td>
											<td><?php echo $row->movie_Dateregister;?></td>
											<td><a href="<?php echo site_url(); ?>/MovieController/delete/<?php echo $row->movie_id ?>" class="btn btn-raised btn-danger">Delete</a></td>
											<td><a href="<?php echo site_url(); ?>/MovieController/cedit/<?php echo $row->movie_id ?>" class="btn btn-raised btn-danger">Edit</a></td>
										</tr>
									<?php
										}
									?>
											</tbody>
									<tfoot class="hide-if-no-paging">
										<tr>
											<td colspan="5" class="text-right">
												<ul class="pagination">
												</ul>
											</td>
										</tr>
									</tfoot>
								</table>
							</div>
						</section>
					</div>
				</div>
			</div>
		</section>
		<!--/ CONTENT -->

	</div>
	<!--/ Application Content -->

	<!--  Vendor JavaScripts  -->
	<script src="<?php echo base_url(); ?>assets/bundles/libscripts.bundle.js"></script>
	<script src="<?php echo base_url(); ?>assets/bundles/vendorscripts.bundle.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/vendor/footable/footable.all.min.js"></script>
	<!--/ vendor javascripts -->

	<!--  Custom JavaScripts  -->
	<script src="<?php echo base_url(); ?>assets/bundles/mainscripts.bundle.js"></script>	<!-- Custom Js -->

	<!--  Page Specific Scripts  -->
	<script >
		$(window).load(function () {
			$('.footable').footable();
		});
	</script>
</body>

<!-- Mirrored from thememakker.com/templates/falcon/html/tables-footable.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 Dec 2019 06:44:54 GMT -->
</html>