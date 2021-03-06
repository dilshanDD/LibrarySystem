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
                        <h1>Borrow Books </h1>
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
                                <button id="add_new_user" class="btn btn-primary" data-toggle="modal" data-target="#modal-user"><i class="fa fa-plus"></i> &nbsp;&nbsp;New Borrowing</button>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Student ID</th>
                                            <th>Book Copy ID</th>
                                            <th>Checkout Date</th>
                                            <th>Return Date</th>
                                            <th>Status</th>
                                            <th>Update</th>
                                            <th>Pay late return</th>
                                            <th>Return</th>



                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($borrowdetails  as $book) {

                                        ?>

                                            <tr>

                                                <td> <?php echo $book['studentID'] ?> </td>
                                                <td> <?php echo $book['book_copyID'] ?> </td>
                                                <td> <?php echo $book['checkout_date'] ?> </td>
                                                <td> <?php echo $book['return_date'] ?> </td>
                                                <td> <?php echo $book['status'] ?> </td>
                                                <td> <button class="btn btn-outline-success btn-sm rounded-0  updatebtn" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button> </td>
                                                <td> <button class="btn btn-outline-warning btn-sm rounded-0  payreturnbtn" type="button" data-toggle="tooltip" data-placement="top" title="Return Book"><i class="fa fa-edit"></i></button> </td>
                                                <td> <button class="btn btn-outline-warning btn-sm rounded-0  returnbtn" type="button" data-toggle="tooltip" data-placement="top" title="Return Book"><i class="fa fa-edit"></i></button> </td>
                                            </tr>


                                        <?php
                                        }

                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Student ID</th>
                                            <th>Book Copy ID</th>
                                            <th>Checkout Date</th>
                                            <th>Return Date</th>
                                            <th>Status</th>
                                            <th>Update</th>
                                            <th>Pay late return</th>
                                            <th>Return</th>

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





    <div class="modal fade" id="update_borrow">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update Borrowing record</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <form id="form_data" method="post" action="Borrow_books/update_borrowbook">
                    <div class="modal-body">


                        <div class="form-group">
                            <li class="fa fa-key">&nbsp;&nbsp;</li>
                            <label>Student ID</label>
                            <input class="form-control input-rounded" name="studentID" id="studentID" placeholder="Student ID" type="text">
                        </div>
                        <div class="form-group">
                            <li class="fa fa-key">&nbsp;&nbsp;</li>
                            <label>Book Copy ID</label>
                            <input class="form-control input-rounded" name="book_copyID" id="book_copyID" placeholder="Book Copy ID" type="text">
                        </div>
                        <div class="form-group">
                            <li class="fa fa-envelope">&nbsp;&nbsp;</li>
                            <label>Checkout Date</label>
                            <input class="form-control input-rounded" type="text" id="checkout_date" name="checkout_date" id="datepicker3"></p>
                        </div>

                        <div class="form-group">
                            <li class="fa fa-envelope">&nbsp;&nbsp;</li>
                            <label>Return Date</label>
                            <input class="form-control input-rounded" type="text" id="return_date" name="return_date" id="datepicker4"></p>
                        </div>

                        <div class="form-group">
                            <li class="fas fa-user-shield">&nbsp;&nbsp;</li>
                            <label>Status</label>
                            <select class="form-control m-b-sm input-rounded" name="status">

                                <option value="Not_received">Not received</option>
                            </select>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <a href="javascript:;" class="btn btn-sm btn-white m-r-5 m-b-5" data-dismiss="modal">Close</a>

                        <button type="submit" class="btn btn-sm btn-primary m-r-5 m-b-5 ">
                            <i class="fa fa-user"></i>
                            Update
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
                    <h4 class="modal-title">Borrow</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <form id="form_add_bookborrow_data" method="post">
                    <div class="modal-body">


                        <div class="form-group">
                            <li class="fa fa-user">&nbsp;&nbsp;</li>
                            <label>Student ID</label>
                            <input class="form-control input-rounded" id="newstudentID" name="studentID" placeholder="Student ID" type="text">
                            <span id="newstudentID_error" class="text-danger"></span>

                        </div>


                        <div class="form-group">
                            <li class="fa fa-key">&nbsp;&nbsp;</li>
                            <label>Book Copy ID</label>
                            <input class="form-control input-rounded" id="newbook_copyID" name="book_copyID" placeholder="Book Copy ID" type="text">
                            <span id="newbook_copyID_error" class="text-danger"></span>
                        </div>

                        <div class="form-group">
                            <li class="fa fa-envelope">&nbsp;&nbsp;</li>
                            <label>Checkout Date</label>
                            <input class="form-control input-rounded" type="text" name="checkout_date" placeholder="Checkout Date" id="datepicker1"></p>
                            <span id="datepicker1_error" class="text-danger"></span>
                        </div>

                        <div class="form-group">
                            <li class="fa fa-envelope">&nbsp;&nbsp;</li>
                            <label>Return Date</label>
                            <input class="form-control input-rounded" type="text" name="return_date" placeholder="Return Date" id="datepicker2"></p>
                            <span id="datepicker2_error" class="text-danger"></span>
                        </div>

                        <div class="form-group">
                            <li class="fas fa-user-shield">&nbsp;&nbsp;</li>
                            <label>Status</label>
                            <select class="form-control m-b-sm input-rounded" name="status">
                                <option value="not_received">Not Received</option>
                            </select>
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

    <div class="modal fade" id="return_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Return</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <form id="form_data" method="post" action="Borrow_books/returnbook">
                    <div class="modal-body">




                        <div class="form-group">
                            <li class="fa fa-key">&nbsp;&nbsp;</li>
                            <label>Student ID</label>
                            <input class="form-control input-rounded" name="studentID" id="studentID1" placeholder="Student ID" type="text">
                        </div>
                        <div class="form-group">
                            <li class="fa fa-key">&nbsp;&nbsp;</li>
                            <label>Book Copy ID</label>
                            <input class="form-control input-rounded" name="book_copyID" id="book_copyID1" placeholder="Book Copy ID" type="text">
                        </div>
                        <div class="form-group">
                            <li class="fa fa-envelope">&nbsp;&nbsp;</li>
                            <label>Checkout Date</label>
                            <input class="form-control input-rounded" type="text" id="checkout_date1" name="checkout_date"></p>
                        </div>

                        <div class="form-group">
                            <li class="fa fa-envelope">&nbsp;&nbsp;</li>
                            <label>Return Date</label>
                            <input class="form-control input-rounded" type="text" id="return_date1" name="return_date"></p>
                        </div>


                        <div class="form-group">
                            <li class="fas fa-user-shield">&nbsp;&nbsp;</li>
                            <label>Status</label>
                            <select class="form-control m-b-sm input-rounded" name="status">
                                <option value="received">Received</option>

                            </select>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <a href="javascript:;" class="btn btn-sm btn-white m-r-5 m-b-5" data-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn-sm btn-primary m-r-5 m-b-5 " name="update_book">
                            <i class="fa fa-user"></i>
                            OK
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.update modal-content -->
    </div>




    <div class="modal fade" id="modal-paylate">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Pay Late return</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <form id="form_late_return_payment_data" method="post">
                    <div class="modal-body">


                        <div class="form-group">
                            <li class="fa fa-user">&nbsp;&nbsp;</li>
                            <label>Student ID</label>
                            <input class="form-control input-rounded" id="paystudentID" name="student_id" type="text">
                            <span id="paystudentID_error" class="text-danger"></span>

                        </div>


                        <div class="form-group">
                            <li class="fa fa-key">&nbsp;&nbsp;</li>
                            <label>Book Copy ID</label>
                            <input class="form-control input-rounded" id="paybook_copyID" name="book_copyID" type="text">
                            <span id="paybook_copyID_error" class="text-danger"></span>
                        </div>

                        <div class="form-group">
                            <li class="fa fa-envelope">&nbsp;&nbsp;</li>
                            <label>Date</label>
                            <input class="form-control input-rounded" type="text" name="date" placeholder="Date" id="paydatepicker"></p>
                            <span id="paydatepick_error" class="text-danger"></span>
                        </div>

                        <div class="form-group">
                            <li class="fa fa-envelope">&nbsp;&nbsp;</li>
                            <label>Fine amount</label>
                            <input class="form-control input-rounded" type="text" name="fine_amount" placeholder="Fine amount" id="payfine_amount"></p>
                            <span id="payfine_amount_error" class="text-danger"></span>
                        </div>

                        <div class="form-group">
                            <li class="fas fa-user-shield">&nbsp;&nbsp;</li>
                            <label>Description</label>
                            <input class="form-control input-rounded" type="text" name="description" placeholder="Description" id="pay_description"></p>
                            <span id="pay_description_error" class="text-danger"></span>

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

    <!-- /.modal-dialog -->
</div>


<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>




<script>
    //working
    $(document).ready(function() {

        $('#form_late_return_payment_data').submit(function(event) {
            event.preventDefault();


            $.ajax({
                type: 'POST',
                url: "<?php echo base_url() ?>Return_payments/addReturnPayment",

                data: $(this).serialize(),
                dataType: 'json',

                // beforeSend: function() {
                //     $('#sub_btn').attr('disabled', 'disabled');
                // },
                success: function(data) {

                    if (data.error) {

                        console.log(data.error);

                        if (data.paystudentID_error != '') {
                            $('#paystudentID_error').html(data.paystudentID_error);
                        } else {
                            $('#paystudentID_error').html('');
                        }

                        if (data.paybook_copyID_error != '') {
                            $('#paybook_copyID_error').html(data.paybook_copyID_error);
                        } else {
                            $('#paybook_copyID_error').html('');
                        }

                        if (data.paydatepick_error != '') {
                            $('#paydatepick_error').html(data.paydatepick_error);
                        } else {
                            $('#paydatepick_error').html('');
                        }

                        if (data.payfine_amount_error != '') {
                            $('#payfine_amount_error').html(data.payfine_amount_error);
                        } else {
                            $('#payfine_amount_error').html('');
                        }
                        if (data.pay_description_error != '') {
                            $('#pay_description_error').html(data.pay_description_error);
                        } else {
                            $('#pay_description_error').html('');
                        }



                    } else if (data.success) {
                        console.log(data.success);

                        $('#modal-paylate').modal('hide');
                        Swal.fire(
                            'Data saved successfully !',
                            '',
                            'success'
                        ).then(function() {
                            window.location = "http://localhost:8080/LibrarySystem/Borrow_books";
                        });

                    }



                }



            });


        });

    });
</script>




<script>
    //working
    $(document).ready(function() {

        $('#form_add_bookborrow_data').submit(function(event) {
            event.preventDefault();


            $.ajax({
                type: 'POST',
                url: "<?php echo base_url() ?>Borrow_books/addBorrowBook",

                data: $(this).serialize(),
                dataType: 'json',

                // beforeSend: function() {
                //     $('#sub_btn').attr('disabled', 'disabled');
                // },
                success: function(data) {

                    if (data.error) {

                        console.log(data.error);

                        if (data.newstudentID_error != '') {
                            $('#newstudentID_error').html(data.newstudentID_error);
                        } else {
                            $('#newstudentID_error').html('');
                        }

                        if (data.newbook_copyID_error != '') {
                            $('#newbook_copyID_error').html(data.newbook_copyID_error);
                        } else {
                            $('#newbook_copyID_error').html('');
                        }

                        if (data.datepicker1_error != '') {
                            $('#datepicker1_error').html(data.datepicker1_error);
                        } else {
                            $('#datepicker1_error').html('');
                        }

                        if (data.datepicker2_error != '') {
                            $('#datepicker2_error').html(data.datepicker2_error);
                        } else {
                            $('#datepicker2_error').html('');
                        }



                    } else if (data.success) {
                        console.log(data.success);

                        $('#modal-user').modal('hide');
                        Swal.fire(
                            'Data saved successfully !',
                            '',
                            'success'
                        ).then(function() {
                            window.location = "http://localhost:8080/LibrarySystem/Borrow_books";
                        });

                    }



                }



            });


        });

    });
</script>





<script>
    $(document).ready(function() {
        $('.returnbtn').on('click', function() {
            $('#return_modal').modal('show');


            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#studentID1').val(data[0]);
            $('#book_copyID1').val(data[1]);
            $('#checkout_date1').val(data[2]);
            $('#return_date1').val(data[3]);



        });
    });
</script>


<script>
    $(document).ready(function() {
        $('.updatebtn').on('click', function() {


            $('#update_borrow').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#studentID').val(data[0]);
            $('#book_copyID').val(data[1]);
            $('#checkout_date').val(data[2]);
            $('#return_date').val(data[3]);





        });
    });
</script>



<script>
    $(document).ready(function() {
        $('.payreturnbtn').on('click', function() {


            $('#modal-paylate').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#paystudentID').val(data[0]);
            $('#paybook_copyID').val(data[1]);






        });
    });
</script>





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

<script>
    $(function() {

        $('#datepicker3').datepicker({
            dateFormat: 'yy-mm-dd'
        });
    });
</script>
<script>
    $(function() {

        $('#datepicker4').datepicker({
            dateFormat: 'yy-mm-dd'
        });
    });
</script>
<script>
    $(function() {

        $('#datepicker5').datepicker({
            dateFormat: 'yy-mm-dd'
        });
    });
</script>
<script>
    $(function() {

        $('#datepicker6').datepicker({
            dateFormat: 'yy-mm-dd'
        });
    });
</script>

<script>
    $(function() {

        $('#paydatepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        });
    });
</script>


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>