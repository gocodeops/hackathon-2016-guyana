<?php include 'head.php'; ?>

<?php include 'navbar.php'; ?>
<?php include 'sidebar.php'; ?>

<!-- Main Wrapper -->
<div id="wrapper">
	
	<div class="row">
        <div class="col-lg-12 text-center m-t-md">
            <h2>
                Unassigned users
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
	                    <li><a href="index.html">Unassigned users</a></li>
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
			                        <th>Name</th>
			                        <th>Phone</th>
			                        <th>Street Address</th>
			                        <th>City</th>
			                        <th>Active</th>
			                    </tr>
			                    </thead>
			                    <tbody>
				                    <tr>
				                        <td>Abraham</td>
				                        <td>076 9477 4896</td>
				                        <td>294-318 Duis Ave</td>
				                        <td>Vosselaar</td>
				                        <td><a href="assign"><button class="btn btn-success btn-xs">Activate</button></a></td>
				                    </tr>

				                    <tr>
				                        <td>Abraham</td>
				                        <td>076 9477 4896</td>
				                        <td>294-318 Duis Ave</td>
				                        <td>Vosselaar</td>
				                        <td><a href="assign"><button class="btn btn-success btn-xs">Activate</button></a></td>

			                    </tbody>
			                </table>
						</div>

		            </div>
		            <div class="panel-footer">
		                1 out of 1 active users
		            </div>
		        </div> <!-- hpanel -->
		    </div>
		</div> <!-- Row -->
    </div> <!-- content animate-panel -->
</div> <!-- Wrapper -->
<?php include 'footer.php'; ?>