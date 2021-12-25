<div class="wrapper">
    <!-- Navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Student Report</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">DataTables</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> &nbsp; &nbsp; </h3>

                            </div>


                            <form id="form_data" method="post" action="generate_student_pdf">
                                <div class="modal-body">
                                    <!-- Date range -->
                                    <label>Select Date Range to generate Report</label>

                                    <div class="form-group">
                                        <li class="fa fa-envelope">&nbsp;&nbsp;</li>
                                        <label>Start Date</label>
                                        <input class="form-control input-rounded" type="text" name="start_date" id="datepicker1"></p>
                                    </div>

                                    <div class="form-group">
                                        <li class="fa fa-envelope">&nbsp;&nbsp;</li>
                                        <label>End Date</label>
                                        <input class="form-control input-rounded" type="text" name="end_date" id="datepicker2"></p>
                                    </div>



                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-sm btn-primary m-r-5 m-b-5 " name="search">
                                        <i class="fa fa-user"></i>
                                        Generate Report
                                    </button>


                                </div>
                            </form>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Student ID</th>
                                            <th>Student First Name</th>
                                            <th>Student Last Name</th>
                                            <th>Membership ID</th>
                                            <th>Expire Date</th>
                                            <th>Renew Date</th>
                                            <th>Renew Fee</th>



                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($membership  as $st) { ?>
                                            <tr>
                                                <td> <?php echo $st['student_id'] ?> </td>
                                                <td> <?php echo $st['first_name'] ?> </td>
                                                <td> <?php echo $st['last_name'] ?> </td>
                                                <td> <?php echo $st['membership_ID'] ?> </td>
                                                <td> <?php echo $st['expire_date'] ?> </td>
                                                <td> <?php echo $st['renew_date'] ?> </td>
                                                <td> <?php echo $st['renew_fee'] ?> </td>

                                            </tr>


                                        <?php
                                        }

                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Student ID</th>
                                            <th>Student First Name</th>
                                            <th>Student Last Name</th>
                                            <th>Membership ID</th>
                                            <th>Expire Date</th>
                                            <th>Renew Date</th>
                                            <th>Renew Fee</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->





    <!-- /.modal-dialog -->
</div>

<script>
    $(function() {

        $('#datepicker1').datepicker({
            dateFormat: 'yy-mm-dd'
        });
    });
</script>
<script>
    $(function() {

        $('#datepicker2').datepicker({
            dateFormat: 'yy-mm-dd'
        });
    });
</script>