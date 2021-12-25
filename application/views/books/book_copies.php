<div class="wrapper">
    <!-- Navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Book Copies</h1>
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

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Book copy ID</th>
                                            <th>Book ID</th>
                                            <th>Status</th>
                                            <th>Purchase Date</th>
                                            <th>Price</th>
                                            <th>Update</th>
                                            <th>Delete</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($bookcopydetails  as $bookcopy) {

                                        ?>

                                            <tr>

                                                <td> <?php echo $bookcopy['book_copyID'] ?> </td>
                                                <td> <?php echo $bookcopy['book_id'] ?> </td>
                                                <td> <?php echo $bookcopy['status'] ?> </td>
                                                <td> <?php echo $bookcopy['purchase_date'] ?> </td>
                                                <td> <?php echo $bookcopy['price'] ?> </td>
                                                <td> <button class="btn btn-outline-success btn-sm rounded-0  editbtn" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button> </td>

                                                <td>
                                                    <form action="deletebookcopy" method="POST">
                                                        <button name="book_copyID" value="<?php echo $bookcopy['book_copyID'] ?>" class="btn btn-outline-danger btn-sm rounded-0" type="submit" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>

                                                    </form>
                                                </td>
                                            </tr>


                                        <?php
                                        }

                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Book copy ID</th>
                                            <th>Book ID</th>
                                            <th>Status</th>
                                            <th>Purchase Date</th>
                                            <th>Price</th>
                                            <th>Update</th>
                                            <th>Delete</th>
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


    <div class="modal fade" id="editmodal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <form id="form_data" method="post" action="updatebookcopy">
                    <div class="modal-body">


                        <div class="form-group">
                            <li class="fa fa-user">&nbsp;&nbsp;</li>
                            <label>Book Copy ID</label>
                            <input type="text" class="form-control input-rounded" name="book_copyID" id="book_copyID" placeholder="Book copy ID" type="text">

                        </div>
                        <div class="form-group">
                            <li class="fa fa-user">&nbsp;&nbsp;</li>
                            <label>Book ID</label>
                            <input type="text" class="form-control input-rounded" name="book_id" id="book_id" placeholder="Book ID" type="text">

                        </div>

                        <div class="form-group">
                            <li class="fa fa-user">&nbsp;&nbsp;</li>
                            <label>Status</label>
                            <input class="form-control input-rounded" name="status" id="status" placeholder="Status" type="text">

                        </div>
                        <div class="form-group">
                            <li class="fa fa-user">&nbsp;&nbsp;</li>
                            <label>Purchase Date</label>
                            <input class="form-control input-rounded" name="purchase_date" id="purchase_date" placeholder="Purchase Date" type="text">

                        </div>


                        <div class="form-group">
                            <li class="fa fa-key">&nbsp;&nbsp;</li>
                            <label>Price</label>
                            <input class="form-control input-rounded" name="price" id="price" placeholder="Price" type="text">
                        </div>


                    </div>
                    <div class="modal-footer">
                        <a href="javascript:;" class="btn btn-sm btn-white m-r-5 m-b-5" data-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn-sm btn-primary m-r-5 m-b-5 " name="update_book">
                            <i class="fa fa-user"></i>
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.update modal-content -->
    </div>

    <!-- /.modal-dialog -->
</div>


<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        $('.editbtn').on('click', function() {
            $('#editmodal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#book_copyID').val(data[0]);
            $('#book_id').val(data[1]);
            $('#status').val(data[2]);
            $('#purchase_date').val(data[3]);
            $('#price').val(data[4]);


        });
    });
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>