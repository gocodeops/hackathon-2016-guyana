<?php include 'head.php'; ?>

<?php include 'navbar.php'; ?>
<?php include 'sidebar.php'; ?>

<!-- Main Wrapper -->
<div id="wrapper">
	
	<div class="row">
        <div class="col-lg-12 text-center m-t-md">
            <h2>
                Admins overview
            </h2>
        </div>
    </div>

    <div class="content animate-panel">
        <div class="row">
		    <div class="col-lg-12" style="">

		    <a href="admins.php" class="btn btn-primary">Admin overview</a>
					<br><br>

		        <div class="hpanel">
		            <div class="panel-body">
		                <div class="table-responsive">
			                <table class="table table-bordered table-striped" cellspacing="1" cellpadding="1">
			                    <thead>
			                    <tr>
			                        <th>ID</th>
			                        <th>Firstname</th>
			                        <th>Lastname</th>
			                        <th>District</th>
			                        <th>Street Address</th>
			                        <th>Control access</th>
			                    </tr>
			                    </thead>
			                    <tbody>

			                    	<!-- Admins  -->

			                    </tbody>
			                </table>
						</div>

		            </div>
		        </div> <!-- hpanel -->
		    </div>
		</div> <!-- Row -->
    </div> <!-- content animate-panel -->
</div> <!-- Wrapper -->

<?php include 'footer.php'; ?>

<script type="text/javascript">
	//Get data
	$.get('http://gocodeops.com/hackathon_guyana_app/public/index.php/read/users', function(data) {
		data = $.parseJSON(data);
		
		$.each(data, function(i, value) {
			var user_type = data[i].user_type;;
			var id = data[i].id;
			var access = '';

			if(user_type == 'user') {
				access = '<button onclick="setAdmin(\''+id+'\')" class="btn btn-xs btn-success">Set as Admin</button>';
			} else if(user_type == 'admin') {
				access = '<button onclick="setUser(\''+id+'\')" class="btn btn-xs btn-warning">Set as User</button>';
			}

			var content = '\
				<tr>\
                    <td>'+data[i].id+'</td>\
                    <td>'+data[i].firstname+'</td>\
                    <td>'+data[i].lastname+'</td>\
                    <td>'+data[i].district+'</td>\
                    <td>'+data[i].address+'</td>\
                    <td>'+access+'</td>\
                </tr>\
			';

			$('tbody').append(content);
			
		});
	});

	//Grant/Modify permissions
	function setAdmin(id) {
		//Set as Admin
		swal({
            title: "Confirmation",
            text: "Are you sure you want to enable user?",
            type: "info",
            showCancelButton: true,
            confirmButtonColor: "#b3ff99",
            confirmButtonText: "Confirm",
            html: false
        }, function (isConfirm) {
            if (!isConfirm) {
                //Cancel confirmation
            } else {
            	$.post('http://gocodeops.com/hackathon_guyana_app/public/index.php/setAdmin',
					{
						id: id
					}, function(data) {
					window.location = window.location.href;
				});
            }
        });		
	}

	function setUser(id) {
		//Set as User
		swal({
            title: "Confirmation",
            text: "Are you sure you want to disable user?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#b3ff99",
            confirmButtonText: "Confirm",
            html: false
        }, function (isConfirm) {
            if (!isConfirm) {
                //Cancel confirmation
            } else {
            	$.post('http://gocodeops.com/hackathon_guyana_app/public/index.php/setUser',
					{
						id: id
					}, function(data) {
					window.location = window.location.href;
				});
            }
        });		
	}
</script>