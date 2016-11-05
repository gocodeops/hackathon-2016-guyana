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
	
	<div class="normalheader transition animated fadeIn">
	    <div class="hpanel">
	        <div class="panel-body">
	            <a class="small-header-action" href="">
	                <div class="clip-header">
	                    <i class="fa fa-arrow-up"></i>
	                </div>
	            </a>

	            <div id="hbreadcrumb" class="pull-right m-t-lg">
	                <ol class="hbreadcrumb breadcrumb">
	                    <li><a href="index.html">Dashboard</a></li>
	                    <li>
	                        <span>Tables</span>
	                    </li>
	                    <li class="active">
	                        <span>Tables design</span>
	                    </li>
	                </ol>
	            </div>
	            <h2 class="font-light m-b-xs">
	                Tables design
	            </h2>
	            <small>Examples of various designs of tables.</small>
	        </div>
	    </div>
	</div>

    <div class="content animate-panel">
        <div class="row">
		    <div class="col-lg-12" style="">
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
	$.get('http://gocodeops.com/hackathon_guyana_app/public/index.php/read/users', function(data) {
		data = $.parseJSON(data);
		
		$.each(data, function(i, value) {
			var active = data[i].active;

			var content = '\
				<tr>\
                    <td>'+data[i].id+'</td>\
                    <td>'+data[i].firstname+'</td>\
                    <td>'+data[i].lastname+'</td>\
                    <td>'+data[i].district+'</td>\
                    <td>'+data[i].address+'</td>\
                </tr>\
			';

			$('tbody').append(content);
			
		});
	});
</script>