<div class="wrapper">
    <!-- Navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Damaged Books Report</h1>
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


                            <form id="form_data" method="post" action="generate_dbook_pdf">
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
                                            <th>Book Tittle</th>
                                            <th>Damaged Book ID</th>
                                            <th>Book Copy ID</th>
                                            <th>Purchase Date</th>
                                            <th>Damaged Date</th>
                                            <th>Price</th>



                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($damagedBooks  as $book) {

                                        ?>

                                            <tr>

                                                <td> <?php echo $book['book_tittle'] ?> </td>
                                                <td> <?php echo $book['damagedbook_ID'] ?> </td>
                                                <td> <?php echo $book['book_copyID'] ?> </td>
                                                <td> <?php echo $book['purchase_date'] ?> </td>
                                                <td> <?php echo $book['damaged_date'] ?> </td>
                                                <td> <?php echo $book['price'] ?> </td>

                                            </tr>


                                        <?php
                                        }

                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Book Tittle</th>
                                            <th>Damaged Book ID</th>
                                            <th>Book Copy ID</th>
                                            <th>Purchase Date</th>
                                            <th>Damaged Date</th>
                                            <th>Price</th>
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