<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Damaged Books &nbsp; &nbsp; </h3>
                            <button id="add_new_user" class="btn btn-primary" data-toggle="modal" data-target="#modal-dbook"><i class="fa fa-plus"></i> &nbsp;&nbsp; Add Damaged Book </button>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Damaged Book ID</th>
                                        <th>Book Copy ID</th>
                                        <th>Damaged Date</th>
                                        <th>Description</th>
                                        <th>Update</th>
                                        <th>Delete</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($damageddetails  as $damaged) {

                                    ?>

                                        <tr>
                                            <td> <?php echo $damaged['damagedbook_ID'] ?> </td>
                                            <td> <?php echo $damaged['book_copyID'] ?> </td>
                                            <td> <?php echo $damaged['damaged_date'] ?> </td>
                                            <td> <?php echo $damaged['description'] ?> </td>
                                            <td> <button class="btn btn-outline-success btn-sm rounded-0  editbtn" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button> </td>

                                            <td>
                                                <form action="delete_damagedbook" method="POST">
                                                    <button name="damagedbook_ID" value="<?php echo $damaged['damagedbook_ID'] ?>" class="btn btn-outline-danger btn-sm rounded-0" type="submit" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>

                                                </form>
                                            </td>


                                        </tr>


                                    <?php
                                    }

                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Damaged Book ID</th>
                                        <th>Book Copy ID</th>
                                        <th>Damaged Date</th>
                                        <th>Description</th>
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

    <!-- /.content-wrapper -->


    <div class="modal fade" id="modal-dbook">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Damaged Book</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <form id="form_data" method="post" action="add_damagedbook">
                    <div class="modal-body">


                        <div class="form-group">
                            <li class="fa fa-key">&nbsp;&nbsp;</li>
                            <label>Book Copy ID</label>
                            <input class="form-control input-rounded" name="book_copyID" placeholder="Book Copy ID" type="text">
                        </div>
                        <div class="form-group">
                            <li class="fa fa-eye">&nbsp;&nbsp;</li>
                            <label>Damaged Date</label>
                            <input class="form-control input-rounded" name="damaged_date" placeholder="Damaged Date" type="text">
                        </div>
                        <div class="form-group">
                            <li class="fa fa-eye">&nbsp;&nbsp;</li>
                            <label>Description</label>
                            <input class="form-control input-rounded" name="description" placeholder="Description" type="text">
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
                    <h4 class="modal-title">Update Damaged Book</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <form id="update_form_data" method="post" action="update_damagedbooks">
                    <div class="modal-body">


                        <div class="form-group">
                            <li class="fa fa-key">&nbsp;&nbsp;</li>
                            <label>ID</label>
                            <input class="form-control input-rounded" id="id" name="id" placeholder="ID" type="text">
                        </div>

                        <div class="form-group">
                            <li class="fa fa-key">&nbsp;&nbsp;</li>
                            <label>Staff ID</label>
                            <input class="form-control input-rounded" id="staff_id" name="staff_id" placeholder="Staff ID" type="text">
                        </div>
                        <div class="form-group">
                            <li class="fa fa-envelope">&nbsp;&nbsp;</li>
                            <label>Book ID</label>
                            <input class="form-control input-rounded" id="book_id" name="book_id" placeholder="Book ID" type="text">
                        </div>

                        <div class="form-group">
                            <li class="fa fa-eye">&nbsp;&nbsp;</li>
                            <label>Student ID</label>
                            <input class="form-control input-rounded" id="student_id" name="student_id" placeholder="Student ID" type="text">
                        </div>
                        <div class="form-group">
                            <li class="fa fa-eye">&nbsp;&nbsp;</li>
                            <label>Damaged Date</label>
                            <input class="form-control input-rounded" id="damaged_date" name="damaged_date" placeholder="Damaged Date" type="text">
                        </div>
                        <div class="form-group">
                            <li class="fa fa-eye">&nbsp;&nbsp;</li>
                            <label>Description</label>
                            <input class="form-control input-rounded" id="description" name="description" placeholder="Description" type="text">
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




    <div class="modal fade" id="modal-role">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">New Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <form id="form_data" method="post" action="">
                    <div class="modal-body">


                        <div class="form-group">
                            <li class="fa fa-user">&nbsp;&nbsp;</li>
                            <label for="input_role">Category</label>
                            <br />

                            <input class="form-control input-rounded" name="category" id="input_role" placeholder="Book Category" required="" type="text">
                            <label id="input_username-error" style="display:none; color:red;" class="error" for="input_category">Username Already Exists...!</label>
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

            $('#id').val(data[0]);
            $('#staff_id').val(data[1]);
            $('#book_id').val(data[2]);
            $('#student_id').val(data[3]);
            $('#damaged_date').val(data[4]);
            $('#description').val(data[5]);




        });
    });
</script>