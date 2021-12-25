<style>
    table {
        margin-left: auto;
        margin-right: auto;
        font-size: 13px;
        height: 100%;
        table-layout: fixed;
    }
</style>

<div class="wrapper">
    <!-- Navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Membership Updated Log</h1>
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
                                <h3 class="card-title">&nbsp; &nbsp; </h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped ">
                                    <thead>
                                        <tr>

                                            <th>Membership ID</th>
                                            <th>Student ID</th>
                                            <th>Expire Date</th>
                                            <th>Renew Date</th>
                                            <th>Renew Fee</th>

                                        </tr>

                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($membershipdetails  as $membership) { ?>
                                            <tr>
                                                <td> <?php echo $membership['membership_ID'] ?> </td>
                                                <td> <?php echo $membership['student_id'] ?> </td>
                                                <td> <?php echo $membership['expire_date'] ?> </td>
                                                <td> <?php echo $membership['renew_date'] ?> </td>
                                                <td> <?php echo $membership['renew_fee'] ?> </td>

                                            </tr>
                                        <?php }  ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Membership ID</th>
                                            <th>Student ID</th>
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

</div>