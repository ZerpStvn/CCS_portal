<?php include('header.php') ?>
<div class="col-lg-12">
	<div class="card-body">
		<div class="card card-outline card-success">
			<div class="card-body">
				<b>Inventory List</b>
				<button class="btn btn-flat btn-sm bg-gradient-success btn-success float-right" id="print"><i
						class="fa fa-print"></i> Print</button>
			</div>
			<div class="card-body p-0">
				<div class="table-responsive" id="printable">
					<table class="table m-0 table-bordered">
						<thead>
							<tr>
								<th class="text-center">#</th>
								<th>school ID</th>
								<th>Full name</th>
								<th>Lender</th>
								<th>Remarks</th>
								<th>Serial number</th>
								<th>Date borrowed</th>
								<th>Date Returned</th>
								<th>Reason</th>

								<?php if ($_SESSION['login_type'] == 1): ?>
									<th>Action</th>
								<?php endif ?>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 1;
							$type = array('', "Admin", "Project Manager", "Employee");
							$qry = $conn->query("SELECT * FROM borrower WHERE returndate IS NOT NULL");
							while ($row = $qry->fetch_assoc()):
								$id = $row['id'];
								?>
								<tr>
									<th class="text-center">
										<?php echo $i++ ?>
									</th>
									<td><b>
											<?php echo $row['scholid'] ?>
										</b></td>
									<td><b>
											<?php echo $row['firstname'] ?>
										</b></td>
									<td><b>
											<?php echo $row['lastname'] ?>
										</b></td>
									<td><b>
											<?php echo $row['remark'] ?>
										</b></td>
									<td><b>
											<?php echo $row['itemname'] ?>
										</b></td>
									<td><b>
											<?php echo $row['dateborrower'] ?>
										</b></td>
									<td>
										<b>
											<?php echo $row['returndate'] ?>
										</b>
									</td>
									<td>
										<b>
											<?php echo $row['reason'] ?>
										</b>
									</td>
									<?php if ($_SESSION['login_type'] == 1): ?>
										<td>
											<style>
												.btn-primary {
													width: 100%;
													max-width: 300px;
													transition: all 0.3s ease;/
												}

												.btn-primary:hover {
													transform: scale(1.3);
													box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
												}
											</style>
											<a href="index.php?page=inventoryview&id=<?php echo $id ?>"
												class="btn btn-primary mr-2">View</a>
										</td>
									<?php endif ?>
								</tr>
							<?php endwhile; ?>
						</tbody>
					</table>
				</div>
			</div>
			<script>
				$('#print').click(function () {
					start_load()
					var _h = $('head').clone()
					var _p = $('#printable').clone()
					var _d = "<p class='text-center'><b>Project Progress Report as of (<?php echo date("F d, Y") ?>)</b></p>"
					_p.prepend(_d)
					_p.prepend(_h)
					var nw = window.open("", "", "width=900,height=600")
					nw.document.write(_p.html())
					nw.document.close()
					nw.print()
					setTimeout(function () {
						nw.close()
						end_load()
					}, 750)
				})
			</script>