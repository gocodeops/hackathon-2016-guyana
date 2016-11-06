<?php include 'head.php'; ?>

<?php include 'navbar.php'; ?>
<?php include 'sidebar.php'; ?>

<!-- Main Wrapper -->
<div id="wrapper">

    <div class="row">
        <div class="col-lg-12 text-center m-t-md">
            <h2>
                Invoices overview
            </h2>
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
                                    <th>Amount</th>
                                    <th>Sender ID Number</th>
                                    <th>Receiver Code</th>
                                    <th>Date of the payment</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>

                                    <!-- Payments  -->

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
    $.get('http://gocodeops.com/hackathon_guyana_app/public/index.php/read/invoices', function(data) {
        data = $.parseJSON(data);

        $.each(data, function(i, value) {

            var content = '\
                <tr>\
                    <td>'+data[i].amount+'</td>\
                    <td>'+data[i].sender_id+'</td>\
                    <td>'+data[i].receiver_id+'</td>\
                    <td>'+data[i].date+'</td>\
                    <td>'+data[i].status+'</td>\
                </tr>\
            ';

            $('tbody').append(content);

        });
    });
</script>