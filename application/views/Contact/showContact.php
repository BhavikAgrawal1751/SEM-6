<!--  CONTENT  -->
<section id="content">
			<div class="page page-tables-footable">
				<!-- bradcome -->
				<div class="b-b mb-10">
					<div class="row">
						<div class="col-sm-6 col-xs-12">
							<h1 class="h3 m-0">Admin Table</h1>
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
									<strong>Admin</strong> Table</h3>

							</div>
							<div class="boxs-body">
								<div class="form-group">
									<label for="filter" style="padding-top: 5px">Search:</label>
									<input id="filter" type="text" class="form-control rounded w-md mb-10 inline-block" />
								</div>
								<table id="searchTextResults" data-filter="#filter" data-page-size="5" class="footable table table-custom">
									<thead>
										<tr>
											<th>contact_id </th>
											<th>contact_name</th>
											<th data-hide="phone">contact_email</th>
											<th data-hide='phone, tablet'>contact_subject</th>
											<th data-hide='phone, tablet'>contact_message</th>
											<th>contact_status </th>
											<th>contact_Dateregister</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
									<?php
										foreach($data as $row)
										{
									?>	
										<tr>
											<td><?php echo $row->contact_id;?></td>
											<td><?php echo $row->contact_name;?></td>
											<td><?php echo $row->contact_email;?></td>
											<td><?php echo $row->contact_subject;?></td>
											<td><?php echo $row->contact_message;?></td>
											<td><a href="<?php echo site_url(); ?>/ContactController/status/<?php echo $row->contact_id ?>"><?php echo $row->contact_status;?></a></td>
											<td><?php echo $row->contact_Dateregister;?></td>
											<td><a href="<?php echo site_url(); ?>/ContactController/delete/<?php echo $row->contact_id ?>">Delete</a></td>
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