<?php include 'head.php'; ?>

<?php include 'navbar.php'; ?>
<?php include 'sidebar.php'; ?>

<!-- Main Wrapper -->
<div id="wrapper">
    <div class="content animate-panel">
        <div class="row">
            <div class="col-lg-12 text-center m-t-md">
                <h2>
                    View Transactions
                </h2>
            </div>
        </div>
    </div>

        <div class="content animate-panel">
        <div class="row">
            <div class="col-lg-12" style="">
                <div class="hpanel">
                    <div class="panel-body">
                        <a class="btn btn-primary" data-toggle="modal" href='#modal-id'>New transaction</a>
                        <div class="modal fade" id="modal-id">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="color-line"></div>
                                    <div class="modal-header">
                                        <h4 class="modal-title">Make a new transaction</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="http://gocodeops.com/hackathon_guyana_app/public/create/transactions" method="POST" role="form" id="new">

                                            <div class="form-group">
                                                <label for="">Place receiver ID here: </label>
                                                <!-- <input type="text" class="form-control" name="receiver_id" placeholder="Input field"> -->
                                                <select class="form-control m-b" id="receiver_id">
                                                    <!-- <option value=""></option> -->
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Amount: </label>
                                                <input type="text" class="form-control" name="amount" placeholder="Input field">
                                            </div>

                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" cellspacing="1" cellpadding="1">
                                <thead>
                                <tr>
                                    <th>Receiver ID</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody id="toAppend">
                                    <!-- appended data here -->
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div> <!-- hpanel -->
            </div>
        </div> <!-- Row -->
    </div> <!-- content animate-panel -->
</div>
<?php include 'footer.php'; ?>

<script type="text/javascript">
    $.get('http://gocodeops.com/hackathon_guyana_app/public/index.php/read/transactions', function(data){
        data = $.parseJSON(data);
        console.log(data);
        $.each(data, function(i,value){
            $("#toAppend").append('<tr><td>'+value.receiver_id+'</td><td>'+value.amount+'</td><td>'+value.date+'</td></tr>');

        });
    });

    $.get('http://gocodeops.com/hackathon_guyana_app/public/index.php/read/users', function(data){
        data = $.parseJSON(data);
        console.log(data);
        $.each(data, function(i,value){

            $("#receiver_id").append('<option value="'+value.id+'">'+value.firstname+' '+value.lastname+'</option>');

        });
    });

formName = $("#new");
formName.submit(function (ev) {
    $.ajax({
        method: formName.attr('method'),
        url: formName.attr('action'),
        data: formName.serialize(),
        success: function() {
            swal({
                title: "Created",
                text: "A new transactions has been made!",
                type: "success"
            });
            location.reload();
        }
    });
    ev.preventDefault();
});
</script>