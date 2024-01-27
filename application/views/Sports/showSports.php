<!--  CONTENT  -->
<section id="content">
			<div class="page page-tables-footable">
				<!-- bradcome -->
				<div class="b-b mb-10">
					<div class="row">
						<div class="col-sm-6 col-xs-12">
							<h1 class="h3 m-0">Sports Table</h1>
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
									<strong>Sports</strong> Table</h3>

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
											<th>State name</th>
											<th data-hide="phone">City name</th>
											<th data-hide='phone, tablet'>Area name</th>
											<th data-hide='phone, tablet'>Sports title</th>
											<th>Sports address </th>
											<th>Sports trailer </th>
											<th>Sports category </th>
											<th>Sports details </th>
											<th>Sports icket_price </th>
											<th>Sports images</th>
											<th>Sports date</th>
											<th>Sports status</th>
											<th>Sports Dateregister </th>
											<th colspan="2" class="text-center">Action</th>
										</tr>
									</thead>
									<tbody>
									<?php
										foreach($data as $row)
										{
									?>	
										<tr>
											<td><?php echo $row->sports_id;?></td>
											<td><?php echo $row->state_name;?></td>
											<td><?php echo $row->city_name;?></td>
											<td><?php echo $row->area_name;?></td>
											<td><?php echo $row->sports_title;?></td>
											<td><?php echo $row->sports_address;?></td>
											<td><?php echo $row->sports_trailer;?></td>
											<td><?php echo $row->sports_category;?></td>
											<td><?php echo $row->sports_details;?></td>
											<td><?php echo $row->sportsticket_price;?></td>
											<td><?php echo $row->sports_images;?></td>
											<td><?php echo $row->sports_date;?></td>
											<td><a href="<?php echo site_url(); ?>/SportsController/status/<?php echo $row->sports_id ?>" class="btn btn-raised <?php echo ($row->sports_status == 'Blocked') ? 'btn-danger' : 'btn-success'; ?>"><?php echo $row->sports_status;?></a></td>
											<td><?php echo $row->sports_Dateregister;?></td>
											<td><a href="<?php echo site_url(); ?>/SportsController/delete/<?php echo $row->sports_id ?>" class="btn btn-raised btn-danger">Delete</a></td>
											<td><a href="<?php echo site_url(); ?>/SportsController/cedit/<?php echo $row->sports_id ?>" class="btn btn-raised btn-danger">Edit</a></td>
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