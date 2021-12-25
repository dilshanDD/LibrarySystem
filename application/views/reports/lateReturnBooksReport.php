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


                            <form id="form_data" method="post" action="generate_latereturn_Books_pdf">
                                <div class="modal-body">
                                    <!-- Date range -->
                                    <label>Select Upto Date to generate Report</label>

                                    <div class="form-group">
                                        <li class="fa fa-envelope">&nbsp;&nbsp;</li>
                                        <label>Upto : </label>
                                        <input class="form-control input-rounded" type="text" name="upto_date" id="datepicker1"></p>
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
                                            <th>Phone</th>
                                            <th>Book Copy ID</th>
                                            <th>Book Tittle</th>
                                            <th>Checkout Date</th>
                                            <th>Return Date</th>
                                            <th>Status</th>



                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($late_return  as $rt) { ?>
                                            <tr>
                                                <td> <?php echo $rt['studentID'] ?> </td>
                                                <td> <?php echo $rt['first_name'] ?> </td>
                                                <td> <?php echo $rt['last_name'] ?> </td>
                                                <td> <?php echo $rt['phone'] ?> </td>
                                                <td> <?php echo $rt['book_copyID'] ?> </td>
                                                <td> <?php echo $rt['book_tittle'] ?> </td>
                                                <td> <?php echo $rt['checkout_date'] ?> </td>
                                                <td> <?php echo $rt['return_date'] ?> </td>
                                                <td> <?php echo $rt['status'] ?> </td>


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
                                            <th>Phone</th>
                                            <th>Book Copy ID</th>
                                            <th>Book Tittle</th>
                                            <th>Checkout Date</th>
                                            <th>Return Date</th>
                                            <th>Status</th>
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