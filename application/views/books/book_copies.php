<script>
    function LoadFunction() {

        <?php
        if ($this->session->flashdata('msg') == 'success') {

        ?>
            Swal.fire(
                'Data Saved Successfully !',
                '',
                'success'
            )
        <?php
        } elseif ($this->session->flashdata('msg') == 'update_success') {
        ?>
            Swal.fire(
                'Data Updated Successfully !',
                '',
                'success'
            )
        <?php
        } elseif ($this->session->flashdata('msg') == 'deleted') {

        ?>
            Swal.fire(
                'Data Deleted Successfully !',
                '',
                'success'
            )
        <?php
        }
        ?>
    }
</script>



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
                                                <td><button class="btn btn-outline-danger btn-sm rounded-0 deletebtn" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button></td>
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
                <form id="form_data" method="post" action="book_copies/updatebookcopy">
                    <div class="modal-body">


                        <div class="form-group">
                            <li class="fa fa-user">&nbsp;&nbsp;</li>
                            <label>Book Copy ID</label>
                            <input type="text" class="form-control input-rounded" name="book_copyID" id="book_copyID" type="text">

                        </div>
                        <div class="form-group">
                            <li class="fa fa-user">&nbsp;&nbsp;</li>
                            <label>Book ID</label>
                            <input type="text" class="form-control input-rounded" name="book_id" id="book_id" type="text">

                        </div>

                        <div class="form-group">
                            <li class="fas fa-user-shield">&nbsp;&nbsp;</li>
                            <label>Status</label>
                            <select class="form-control m-b-sm input-rounded" name="status">
                                <option value="available">Available</option>
                                <option value="un_available">Unavailable</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <li class="fa fa-user">&nbsp;&nbsp;</li>
                            <label>Purchase Date</label>
                            <input class="form-control input-rounded" name="purchase_date" id="purchase_date" type="text">

                        </div>


                        <div class="form-group">
                            <li class="fa fa-key">&nbsp;&nbsp;</li>
                            <label>Price</label>
                            <input class="form-control input-rounded" name="price" id="price" type="text">
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

    <!-- Modal HTML -->
    <div id="deletemodal" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header flex-column">
                    <div class="icon-box">
                        <i class="material-icons">&#xE5CD;</i>
                    </div>
                    <h4 class="modal-title w-100">Are you sure?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Do you really want to delete these records? This process cannot be undone.</p>
                </div>
                <div class="modal-footer justify-content-center">

                    <form id="form_data" method="post" action="book_copies/deletebookcopy">
                        <div class="modal-body">
                            <div class="form-group">
                                <input class="form-control input-rounded" name="book_copyID" id="DBook_copyID" type="hidden">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

                            <button type="submit" class="btn btn-danger ">
                                Delete
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

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


<script>
    $(document).ready(function() {
        $('.deletebtn').on('click', function() {
            $('#deletemodal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#DBook_copyID').val(data[0]);


        });
    });
</script>




<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>