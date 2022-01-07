<div class="wrapper">
    <!-- Navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Late return Payment Details</h1>
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
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Late return ID</th>
                                            <th>Student ID</th>
                                            <th>Book copy ID</th>
                                            <th>Fine amount</th>
                                            <th>Description</th>
                                            <th>Date</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($late_return_details  as $pay) {

                                        ?>

                                            <tr>

                                                <td> <?php echo $pay['late_returnID'] ?> </td>
                                                <td> <?php echo $pay['student_id'] ?> </td>
                                                <td> <?php echo $pay['book_copyID'] ?> </td>
                                                <td> <?php echo $pay['fine_amount'] ?> </td>
                                                <td> <?php echo $pay['description'] ?> </td>
                                                <td> <?php echo $pay['date'] ?> </td>
                                            </tr>
                                        <?php
                                        }

                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Late return ID</th>
                                            <th>Student ID</th>
                                            <th>Book copy ID</th>
                                            <th>Fine amount</th>
                                            <th>Description</th>
                                            <th>Date</th>

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

</div>