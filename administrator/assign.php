<?php include 'head.php'; ?>

<?php include 'navbar.php'; ?>
<?php include 'sidebar.php'; ?>

<!-- Main Wrapper -->
<div id="wrapper">

    <div class="content animate-panel">
        <div class="row">
            <div class="col-lg-12 text-center m-t-md">
                <h2>
                    Assign user password
                </h2>
            </div>
        </div>

        	<br>

		<div class="row">
		    <div class="col-lg-6" style="">
		        <div class="hpanel">
		            <div class="panel-body">
		                <div class="table-responsive">
			                <table class="table">
			                    <thead>

			                    </thead>
			                    <tbody>
				                    <tr>
				                        <td style="width: 111px"><b>ID</b></td>
				                        <td>:</td>
				                        <td id="id"></td>
				                    </tr>

				                    <tr>
				                        <td style="width: 111px"><b>Firstname</b></td>
				                        <td>:</td>
				                        <td id="firstname"></td>
				                    </tr>

				                    <tr>
				                        <td style="width: 111px"><b>Lastname</b></td>
				                        <td>:</td>
				                        <td id="lastname"></td>
				                    </tr>

				                    <tr>
				                        <td style="width: 111px"><b>District</b></td>
				                        <td>:</td>
				                        <td id="district"></td>
				                    </tr>
				                    <tr>
				                        <td style="width: 111px"><b>Street Address</b></td>
				                        <td>:</td>
				                        <td id="address"></td>
				                    </tr>

			                    </tbody>
			                </table>
						</div>

		            </div>
		        </div> <!-- hpanel -->
		        <button class="btn btn-primary" id="post">Assign password</button>
		    </div>

			<!-- Second table -->
		    <div class="form-horizontal">
		    	<div class="col-lg-6" style="">
			    	<label class="col-sm-2 control-label">Password:</label>
			    	<div class="col-sm-12"><input class="form-control" id="password1" type="password"></div>      
			    </div>

			    <div class="col-lg-6" style="">
			    	<label class="col-sm-2 control-label">Re-type password:</label>
			    	<div class="col-sm-12"><input class="form-control" id="password2" type="password"></div>      
			    </div>
		    </div>
		</div> <!-- Row -->

    </div> <!-- Content -->
</div> <!-- Wrapper -->
<?php include 'footer.php'; ?>

<script type="text/javascript">

	function getUriParam(name){
          if(name=(new RegExp('[?&]'+encodeURIComponent(name)+'=([^&]*)')).exec(location.search))
            return decodeURIComponent(name[1]);
      }
    var id = getUriParam('id');

    //Assign password function
    $('#post').click(function() {
		var password1 = $('#password1').val();
		var password2 = $('#password2').val();

		if(password1 != password2) {
			alert("No match");
		} else if(password1 == password2) {
			$.post('http://gocodeops.com/hackathon_guyana_app/public/index.php/assign', 
				{
					id: id, 
					password: password1
				}, function(data) {
				window.location = 'unassigned_users.php';
			});
		}
	});

	$.get('http://gocodeops.com/hackathon_guyana_app/public/index.php/read/users/'+id, function(data) {
		data = $.parseJSON(data);
		
		$('#id').html(data.id);
		$('#firstname').html(data.firstname);
		$('#lastname').html(data.lastname);
		$('#district').html(data.district);
		$('#address').html(data.address);
	});
</script>