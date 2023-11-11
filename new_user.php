<?php
?>
<div class="col-lg-12">
	<div class="card">
		<div class="card-body">
			<form action="" id="manage_user">
				<input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
				<div class="row">
					<div class="col-md-6 border-right">
						<div class="form-group">
							<label for="" class="control-label">Schoold ID</label>
							<input type="text" name="uniqID" class="form-control form-control-sm" required
								value="<?php echo isset($uniqID) ? $uniqID : '' ?>">
						</div>
						<div class="form-group">
							<label for="" class="control-label">First Name</label>
							<input type="text" name="firstname" class="form-control form-control-sm" required
								value="<?php echo isset($firstname) ? $firstname : '' ?>">
						</div>
						<div class="form-group">
							<label for="" class="control-label">Last Name</label>
							<input type="text" name="lastname" class="form-control form-control-sm" required
								value="<?php echo isset($lastname) ? $lastname : '' ?>">
						</div>
						<?php if ($_SESSION['login_type'] == 1): ?>
							<div class="form-group">
								<label for="" class="control-label">User Role</label>
								<select name="type" id="type" class="custom-select custom-select-sm">
									<option value="3" <?php echo isset($type) && $type == 3 ? 'selected' : '' ?>>Select
									</option>
									<option value="3" <?php echo isset($type) && $type == 3 ? 'selected' : '' ?>>Lab Assistant
									</option>
									<option value="2" <?php echo isset($type) && $type == 2 ? 'selected' : '' ?>>
										Instructor</option>
									<option value="1" <?php echo isset($type) && $type == 1 ? 'selected' : '' ?>>Admin
									</option>
								</select>
							</div>
						<?php else: ?>
							<input type="hidden" name="type" value="3">
						<?php endif; ?>
						<div class="form-group">
							<label for="" class="control-label">Avatar</label>
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="customFile" name="img"
									onchange="displayImg(this,$(this))">
								<label class="custom-file-label" for="customFile">Choose file</label>
							</div>
						</div>
						<div class="form-group d-flex justify-content-center align-items-center">
							<img src="<?php echo isset($avatar) ? 'assets/uploads/' . $avatar : '' ?>" alt="Avatar"
								id="cimg" class="img-fluid img-thumbnail ">
						</div>
					</div>
					<div class="col-md-6">

						<div class="form-group">
							<label class="control-label">Email</label>
							<input type="email" class="form-control form-control-sm" name="email" required
								value="<?php echo isset($email) ? $email : '' ?>">
							<small id="#msg"></small>
						</div>
						<div class="form-group">
							<label class="control-label">Password</label>
							<input type="password" class="form-control form-control-sm" name="password" <?php echo !isset($id) ? "required" : '' ?>>
							<small><i>
									<?php echo isset($id) ? "Leave this blank if you dont want to change you password" : '' ?>
								</i></small>
						</div>
						<div class="form-group">
							<label class="label control-label">Confirm Password</label>
							<input type="password" class="form-control form-control-sm" name="cpass" <?php echo !isset($id) ? 'required' : '' ?>>
							<small id="pass_match" data-status=''></small>
						</div>
						<div class="form-group user-role">
							<label for="" class="control-label ">User Role</label>
							<select name="typeval" id="typeval" class="custom-select custom-select-sm">
								<option value="">select
								</option>
								<option value="ojt">On the Job Training
								</option>
								<option value="wst">working student</option>
							</select>
						</div>
						<div class="form-group wstview">
							<label for="" class="control-label">Day</label>
							<select class="form-control form-control-sm">
								<option value="monday">Monday</option>
								<option value="tuesday">Tuesday</option>
								<option value="wednesday">Wednesday</option>
								<option value="thursday">Thursday</option>
								<option value="friday">Friday</option>
								<!-- Add options for other days of the week -->
							</select>
							<label for="" class="control-label">Time</label>
							<input class="form-control form-control-sm" type="time">
						</div>

						<div class="form-group ojtview">
							<label for="" class="control-label">Start Date</label>
							<label for="" class="control-label">Time</label>
							<input class="form-control form-control-sm startdate" type="date">
							<label for="" class="control-label ">End Date</label>
							<label for="" class="control-label">Time</label>
							<input class="form-control form-control-sm enddate" type="date">

							<label for="" class="control-label">Number of Hours</label>
							<input class="form-control form-control-sm hrsvalid" type="text">
						</div>
					</div>
				</div>

		</div>
		<hr>
		<div class="col-lg-12 text-right justify-content-center d-flex">
			<button class="btn btn-primary mr-2">Save</button>
			<button class="btn btn-secondary" type="button"
				onclick="location.href = 'index.php?page=user_list'">Cancel</button>
		</div>
		</form>
	</div>
</div>
</div>
<style>
	img#cimg {
		height: 15vh;
		width: 15vh;
		object-fit: cover;
		border-radius: 100% 100%;
	}
</style>
<script>
	$(document).ready(function () {
		// Generate a random 5-character ID
		//   function generateUniqueID() {
		//   var chars = '0123456789';
		//   var id = '';

		//   for (var i = 1; i < 6; i++) {
		//     var randomIndex = Math.floor(Math.random() * chars.length);
		//     id += chars[randomIndex];
		//   }

		//   return id;
		// }

		// var input = $('[name="uniqID"]');
		// if (input.val() === '') {
		//   var newID = generateUniqueID();
		//   input.val(newID);
		//   input.prop('disabled', true); // Disable the input field
		// }type
		$(".wstview").hide();
		$(".user-role").hide();
$(".ojtview").hide();

		$("#type").on('change', function () {

			var type = $("#type").val();
			console.log(type)
			if (type === "3") {
				$(".user-role").show();
			} else {
				$(".user-role").hide();
			}
		});

		$("#type").trigger("change");



		$("#typeval").on('change', function () {

			var roletype = $("#typeval").val();
			console.log(roletype);
			if (roletype === "ojt") {
				$(".wstview").hide();
				$(".ojtview").show();
			}
			if (roletype === "wst") {
				$(".ojtview").hide();
				$(".wstview").show();
			}
		});
		$("#typeval").trigger("change");

		$('[name="password"],[name="cpass"]').keyup(function () {
			var pass = $('[name="password"]').val();
			var cpass = $('[name="cpass"]').val();
			if (cpass == '' || pass == '') {
				$('#pass_match').attr('data-status', '');
			} else {
				if (cpass == pass) {
					$('#pass_match').attr('data-status', '1').html('<i class="text-success">Password Matched.</i>');
				} else {
					$('#pass_match').attr('data-status', '2').html('<i class="text-danger">Password does not match.</i>');
				}
			}
		});

		$('#manage_user').submit(function (e) {
			e.preventDefault();
			$('input').removeClass("border-danger");
			start_load();
			$('#msg').html('');

			// Create a new FormData object to store the form data
			var formData = new FormData($(this)[0]);


			if ($('[name="password"]').val() != '' && $('[name="cpass"]').val() != '') {
				if ($('#pass_match').attr('data-status') != 1) {
					$('[name="password"],[name="cpass"]').addClass("border-danger");
					end_load();
					return false;
				}
			}

			$.ajax({
				url: 'ajax.php?action=save_user',
				data: formData,
				cache: false,
				contentType: false,
				processData: false,
				method: 'POST',
				type: 'POST',
				success: function (resp) {
					if (resp == 1) {
						alert_toast('Data successfully saved.', "success");
						setTimeout(function () {
							location.replace('index.php?page=user_list');
						}, 750);
					} else if (resp == 2) {
						$('#msg').html("<div class='alert alert-danger'>Email already exists.</div>");
						$('[name="email"]').addClass("border-danger");
						end_load();
					}
				}
			});
		});
	});


</script>