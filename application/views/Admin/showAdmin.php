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
								<form action="<?php echo site_url()?>/admincontroller/checked" method="post">
								<table id="searchTextResults" data-filter="#filter" data-page-size="5" class="footable table table-custom">
									<thead>
										<tr>
											<th></th>
											<th># </th>
											<th>Admin name</th>
											<th data-hide="phone">Admin address</th>
											<th data-hide='phone, tablet'>Admin profileimg</th>
											<th data-hide='phone, tablet'>Admin email</th>
											<th>Admin password</th>
											<th>Admin profileimg</th>
											<th>Admin mobile</th>
											<th>Admin status</th>
											<th>Admin Dateregister</th>
											<th colspan="2">Action</th>
										</tr>
									</thead>
									<tbody>
									<?php $count=1; foreach($data as $row) { ?>	
										<tr>
											<td>
												<?php 
													if( $this->uri->segment(2)=="check") { ?>
														<input type="checkbox" name="delete_id[]" value="<?php echo $row->admin_id?>" checked>
												<?php } else { ?>
														<input type="checkbox" name="delete_id[]" value="<?php echo $row->admin_id?>">
												<?php } ?>
											</td>
											<td><?php echo $count; ?></td>
											<td><?php echo $row->admin_name;?></td>
											<td><?php echo $row->admin_address;?></td>
											<td><?php echo $row->admin_profileimg;?></td>
											<td><?php echo $row->admin_email;?></td>
											<td><?php echo $row->admin_password;?></td>
											<td><?php echo $row->admin_profileimg;?></td>
											<td><?php echo $row->admin_mobile;?></td>
											<td><a href="<?php echo site_url(); ?>/AdminController/status/<?php echo $row->admin_id; ?>" class="btn btn-raised <?php echo ($row->admin_status == 'Blocked') ? 'btn-danger' : 'btn-success'; ?>"><?php echo $row->admin_status; ?></a></td>
											<td><?php echo $row->admin_Dateregister;?></td>
											<td><a href="<?php echo site_url(); ?>/AdminController/delete/<?php echo $row->admin_id ?>" class="btn btn-raised btn-danger">Delete</a></td>
											<td><a href="<?php echo site_url(); ?>/AdminController/cedit/<?php echo $row->admin_id ?>" class="btn btn-raised btn-danger">Edit</a></td>
										</tr>
									<?php $count++; } ?>
									</tbody>

									<tfoot class="hide-if-no-paging">
										<tr>
											<td colspan="3">
												<?php
													if( $this->uri->segment(2)=="check")
													{
														$check="index";
													}
													else
													{
														$check="check";
													}
												?>
												<a href="<?php echo site_url()?>/admincontroller/<?php echo $check?>">Check all</a>
											</td>
											<td>
												<input class="btn btn-raised btn-danger" type="submit" value="Delete">
											</td>
											<td colspan="5" class="text-right">
												<ul class="pagination">
												</ul>
											</td>
										</tr>
									</tfoot>
								</table>
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