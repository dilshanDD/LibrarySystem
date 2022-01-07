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
                        <h1>Book Details</h1>
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
                                <button id="add_new_user" class="btn btn-primary" data-toggle="modal" data-target="#modal-user"><i class="fa fa-plus"></i> &nbsp;&nbsp; New Book</button>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Book ID</th>
                                            <th>Book Tittle</th>
                                            <th>Eddition</th>
                                            <th>Category</th>
                                            <th>Author First Name</th>
                                            <th>Author Last Name</th>
                                            <th>View Copies</th>
                                            <th>New Book copy</th>
                                            <th>Update</th>
                                            <th>Delete</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($bookdetails  as $book) {

                                        ?>

                                            <tr>

                                                <td> <?php echo $book['book_id'] ?> </td>
                                                <td> <?php echo $book['book_tittle'] ?> </td>
                                                <td> <?php echo $book['edition'] ?> </td>
                                                <td> <?php echo $book['category'] ?> </td>
                                                <td> <?php echo $book['auth_firstname'] ?> </td>
                                                <td> <?php echo $book['auth_lastname'] ?> </td>

                                                <form action="Book_copies/getbookcopyByID" method="POST">
                                                    <td><button class="btn btn-outline-primary btn-sm rounded-0" name="book_id" value="<?php echo $book['book_id'] ?>" type="submit" data-toggle="tooltip" data-placement="top" title="View Book Copies"><i class="fa fa-eye"></i></button> </td>
                                                </form>
                                                <td><button class="btn btn-outline-primary btn-sm rounded-0  newcopybtn" type="button" data-toggle="tooltip" data-placement="top" title="Add New Book Copy"><i class="fa fa-table"></i></button> </td>
                                                <td> <button class="btn btn-outline-success btn-sm rounded-0  editbtn" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button> </td>
                                                <td><button class="btn btn-outline-danger btn-sm rounded-0  deletebtn" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button></td>
                                            </tr>
                                        <?php
                                        }

                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Book ID</th>
                                            <th>Book Tittle</th>
                                            <th>Eddition</th>
                                            <th>Category</th>
                                            <th>Author First Name</th>
                                            <th>Author Last Name</th>
                                            <th>View Copies</th>
                                            <th>New Book copy</th>
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


    <div class="modal fade" id="add_newbookcopy">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add New Book Copy</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <form id="form_add_bookcopy_data" method="post" action="Book_copies/addbookcopy">
                    <div class="modal-body">


                        <div class="form-group">
                            <li class="fa fa-key">&nbsp;&nbsp;</li>
                            <label>Book ID</label>
                            <input class="form-control input-rounded" name="book_id" id="book_id" type="text">
                        </div>


                        <div class="form-group">
                            <li class="fas fa-user-shield">&nbsp;&nbsp;</li>
                            <label>Status</label>
                            <select class="form-control m-b-sm input-rounded" name="status">
                                <option value="available">Available</option>
                                <option value="unavailable">Unavailable</option>
                            </select>
                        </div>



                        <div class="form-group">
                            <li class="fa fa-envelope">&nbsp;&nbsp;</li>
                            <label>Purchase Date</label>
                            <input class="form-control input-rounded" type="text" name="purchase_date" id="datepicker"></p>
                        </div>

                        <div class="form-group">
                            <li class="fa fa-envelope">&nbsp;&nbsp;</li>
                            <label>Price</label>
                            <input class="form-control input-rounded" name="price" placeholder="Price" type="text">
                        </div>



                    </div>
                    <div class="modal-footer">
                        <a href="javascript:;" class="btn btn-sm btn-white m-r-5 m-b-5" data-dismiss="modal">Close</a>

                        <button type="submit" class="btn btn-sm btn-primary m-r-5 m-b-5 ">
                            <i class="fa fa-user"></i>
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->


    <div class="modal fade" id="modal-user">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add New Book</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <form id="form_add_book_data" method="post">
                    <div class="modal-body">


                        <div class="form-group">
                            <li class="fa fa-user">&nbsp;&nbsp;</li>
                            <label>Book Tittle</label>
                            <input class="form-control input-rounded" id="newbook_tittle" name="book_tittle" placeholder="Book Tittle" type="text">
                            <span id="newbook_tittle_error" class="text-danger"></span>
                        </div>


                        <div class="form-group">
                            <li class="fa fa-key">&nbsp;&nbsp;</li>
                            <label>Edition</label>
                            <input class="form-control input-rounded" id="newedition" name="edition" placeholder="Eddition" type="text">
                            <span id="newedition_error" class="text-danger"></span>
                        </div>

                        <div class="form-group">
                            <li class="fa fa-envelope">&nbsp;&nbsp;</li>
                            <label>Category</label>
                            <input class="form-control input-rounded" id="newcategory" name="category" placeholder="Category" type="text">
                            <span id="newcategory_error" class="text-danger"></span>
                        </div>

                        <div class="form-group">
                            <li class="fa fa-eye">&nbsp;&nbsp;</li>
                            <label>Author first name</label>
                            <input class="form-control input-rounded" id="newauth_firstname" name="auth_firstname" placeholder="Author first name" type="text">
                            <span id="newauth_firstname_error" class="text-danger"></span>
                        </div>

                        <div class="form-group">
                            <li class="fa fa-eye">&nbsp;&nbsp;</li>
                            <label>Author last name</label>
                            <input class="form-control input-rounded" id="newauth_lastname" name="auth_lastname" placeholder="Author last name" type="text">
                            <span id="newauth_lastname_error" class="text-danger"></span>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <a href="javascript:;" class="btn btn-sm btn-white m-r-5 m-b-5" data-dismiss="modal">Close</a>

                        <button type="submit" class="btn btn-sm btn-primary m-r-5 m-b-5 ">
                            <i class="fa fa-user"></i>
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->

    <div class="modal fade" id="editmodal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update Book</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <form id="form_data" method="post" action="book/updatebook">
                    <div class="modal-body">


                        <div class="form-group">
                            <li class="fa fa-user">&nbsp;&nbsp;</li>
                            <label>Book ID</label>
                            <input type="text" class="form-control input-rounded" name="book_id" id="lbook_id" placeholder="Book ID" type="text">

                        </div>

                        <div class="form-group">
                            <li class="fa fa-user">&nbsp;&nbsp;</li>
                            <label>Book Tittle</label>
                            <input class="form-control input-rounded" name="book_tittle" id="book_tittle" type="text">

                        </div>


                        <div class="form-group">
                            <li class="fa fa-key">&nbsp;&nbsp;</li>
                            <label>Edition</label>
                            <input class="form-control input-rounded" name="edition" id="edition" type="text">
                        </div>

                        <div class="form-group">
                            <li class="fa fa-envelope">&nbsp;&nbsp;</li>
                            <label>Category</label>
                            <input class="form-control input-rounded" name="category" id="category" type="text">
                        </div>

                        <div class="form-group">
                            <li class="fa fa-eye">&nbsp;&nbsp;</li>
                            <label>Author first name</label>
                            <input class="form-control input-rounded" name="auth_firstname" id="auth_firstname" type="text">
                        </div>

                        <div class="form-group">
                            <li class="fa fa-eye">&nbsp;&nbsp;</li>
                            <label>Author last name</label>
                            <input class="form-control input-rounded" name="auth_lastname" id="auth_lastname" type="text">
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

                    <form id="form_data" method="post" action="Book/deletebook">
                        <div class="modal-body">
                            <div class="form-group">
                                <input class="form-control input-rounded" name="book_id" id="Dbook_id" type="hidden">
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
    //working
    $(document).ready(function() {

        $('#form_add_book_data').submit(function(event) {
            event.preventDefault();


            $.ajax({
                type: 'POST',
                url: "<?php echo base_url() ?>Book/addbooks",

                data: $(this).serialize(),
                dataType: 'json',

                // beforeSend: function() {
                //     $('#sub_btn').attr('disabled', 'disabled');
                // },
                success: function(data) {

                    if (data.error) {

                        console.log(data.error);

                        if (data.newbook_tittle_error != '') {
                            $('#newbook_tittle_error').html(data.newbook_tittle_error);
                        } else {
                            $('#newbook_tittle_error').html('');
                        }

                        if (data.newedition_error != '') {
                            $('#newedition_error').html(data.newedition_error);
                        } else {
                            $('#newedition_error').html('');
                        }

                        if (data.newcategory_error != '') {
                            $('#newcategory_error').html(data.newcategory_error);
                        } else {
                            $('#newcategory_error').html('');
                        }

                        if (data.newauth_firstname_error != '') {
                            $('#newauth_firstname_error').html(data.newauth_firstname_error);
                        } else {
                            $('#newauth_firstname_error').html('');
                        }

                        if (data.newauth_lastname_error != '') {
                            $('#newauth_lastname_error').html(data.newauth_lastname_error);
                        } else {
                            $('#newauth_lastname_error').html('');
                        }


                    } else if (data.success) {
                        console.log(data.success);

                        $('#modal-user').modal('hide');
                        Swal.fire(
                            'Data saved successfully !',
                            '',
                            'success'
                        ).then(function() {
                            window.location = "http://localhost:8080/LibrarySystem/Book";
                        });

                    }



                }



            });


        });

    });
</script>






<script>
    $(document).ready(function() {
        $('.editbtn').on('click', function() {
            $('#editmodal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);


            $('#lbook_id').val(data[0]);
            $('#book_tittle').val(data[1]);
            $('#edition').val(data[2]);
            $('#category').val(data[3]);
            $('#auth_firstname').val(data[4]);
            $('#auth_lastname').val(data[5]);



        });
    });
</script>


<script>
    $(document).ready(function() {
        $('.viewcopytbtn').on('click', function() {

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();
            $bk_id = data[0];
            var bkID = $bk_id.trim();

            console.log(bkID);

            $('#view_bookcopy').modal('show');
            $('#BK_ID').val(data[0]);


        });
    });
</script>

<script>
    $(document).ready(function() {
        $('.newcopybtn').on('click', function() {


            $('#add_newbookcopy').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#book_id').val(data[0]);

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

            $('#Dbook_id').val(data[0]);
            console.log("This is Staff ID" + data[0]);

        });
    });
</script>









<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>