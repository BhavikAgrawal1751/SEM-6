<!--  CONTENT  -->
<section id="content">
			<div class="page page-tables-footable">
				<!-- bradcome -->
				<div class="b-b mb-10">
					<div class="row">
						<div class="col-sm-6 col-xs-12">
							<h1 class="h3 m-0">Event Table</h1>
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
									<strong>Event</strong> Table</h3>

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
											<th>Eventcategory Title </th>
											<th data-hide="phone">Eventspeaker Name </th>
											<th data-hide='phone, tablet'>Event Title</th>
											<th data-hide='phone, tablet'>Event Trailer</th>
											<th>Event Price </th>
											<th>Event Images </th>
											<th>Event Description </th>
											<th>Event Type </th>
											<th>Event Address </th>
											<th>Event Date </th>
											<th>State Name </th>
											<th>City Name </th>
											<th>Area Name </th>
											<th>Event Status </th>
											<th>Event Dateregister </th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
									<?php
										foreach($data as $row)
										{
									?>	
										<tr>
											<td><?php echo $row->event_id;?></td>
											<td><?php echo $row->eventcategory_title ;?></td>
											<td><?php echo $row->eventspeaker_name ;?></td>
											<td><?php echo $row->event_title;?></td>
											<td><?php echo $row->event_trailer;?></td>
											<td><?php echo $row->event_price;?></td>
											<td><?php echo $row->event_images;?></td>
											<td><?php echo $row->event_description;?></td>
											<td><?php echo $row->event_type;?></td>
											<td><?php echo $row->event_address;?></td>
											<td><?php echo $row->event_date;?></td>
											<td><?php echo $row->state_name;?></td>
											<td><?php echo $row->city_name ?></td>
											<td><?php echo $row->area_name;?></td>
											<td><a href="<?php echo site_url(); ?>/EventController/status/<?php echo $row->event_id ?>" class="btn btn-raised <?php echo ($row->event_status == 'Blocked') ? 'btn-danger' : 'btn-success'; ?>"><?php echo $row->event_status;?></a></td>
											<td><?php echo $row->event_Dateregister;?></td>
											<td><a href="<?php echo site_url(); ?>/EventController/delete/<?php echo $row->event_id ?>" class="btn btn-raised btn-danger">Delete</a></td>
											<td><a href="<?php echo site_url(); ?>/EventController/cedit/<?php echo $row->event_id ?>" class="btn btn-raised btn-danger">Edit</a></td>
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