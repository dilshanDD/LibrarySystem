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
                                            <td><button class="btn btn-outline-danger btn-sm rounded-0 deletebtn" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button></td>
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
                <form id="form_add_damagedbook_data" method="post">
                    <div class="modal-body">


                        <div class="form-group">
                            <li class="fa fa-key">&nbsp;&nbsp;</li>
                            <label>Book Copy ID</label>
                            <input class="form-control input-rounded" id="newbook_copyID" name="book_copyID" placeholder="Book Copy ID" type="text">
                            <span id="newbook_copyID_error" class="text-danger"></span>
                        </div>


                        <div class="form-group">
                            <li class="fa fa-envelope">&nbsp;&nbsp;</li>
                            <label>Damaged Date</label>
                            <input class="form-control input-rounded" type="text" name="damaged_date" placeholder="Damaged Date" id="datepicker1"></p>
                            <span id="datepicker1_error" class="text-danger"></span>
                        </div>

                        <div class="form-group">
                            <li class="fa fa-eye">&nbsp;&nbsp;</li>
                            <label>Description</label>
                            <input class="form-control input-rounded" id="newDescription" name="description" placeholder="Description" type="text">
                            <span id="newDescription_error" class="text-danger"></span>
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
                            <label>Damaged Book ID</label>
                            <input class="form-control input-rounded" id="damagedbook_ID" name="damagedbook_ID" type="text">
                        </div>

                        <div class="form-group">
                            <li class="fa fa-key">&nbsp;&nbsp;</li>
                            <label>Book Copy ID</label>
                            <input class="form-control input-rounded" id="book_copyID" name="book_copyID" type="text">
                        </div>

                        <div class="form-group">
                            <li class="fa fa-eye">&nbsp;&nbsp;</li>
                            <label>Damaged Date</label>
                            <input class="form-control input-rounded" id="damaged_date" name="damaged_date" type="text">
                        </div>
                        <div class="form-group">
                            <li class="fa fa-eye">&nbsp;&nbsp;</li>
                            <label>Description</label>
                            <input class="form-control input-rounded" id="description" name="description" type="text">
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

                    <form id="form_data" method="post" action="delete_damagedbook">
                        <div class="modal-body">
                            <div class="form-group">
                                <input class="form-control input-rounded" name="damagedbook_ID" id="Ddamagedbook_ID" type="hidden">
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

        $('#form_add_damagedbook_data').submit(function(event) {
            event.preventDefault();


            $.ajax({
                type: 'POST',
                url: "<?php echo base_url() ?>Book/add_damagedbook",

                data: $(this).serialize(),
                dataType: 'json',

                // beforeSend: function() {
                //     $('#sub_btn').attr('disabled', 'disabled');
                // },
                success: function(data) {

                    if (data.error) {

                        console.log(data.error);

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

                        if (data.newDescription_error != '') {
                            $('#newDescription_error').html(data.newDescription_error);
                        } else {
                            $('#newDescription_error').html('');
                        }



                    } else if (data.success) {
                        console.log(data.success);

                        $('#modal-user').modal('hide');
                        Swal.fire(
                            'Data saved successfully !',
                            '',
                            'success'
                        ).then(function() {
                            window.location = "http://localhost:8080/LibrarySystem/Book/damagedbooks";
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

            $('#damagedbook_ID').val(data[0]);
            $('#book_copyID').val(data[1]);
            $('#damaged_date').val(data[2]);
            $('#description').val(data[3]);

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

            $('#Ddamagedbook_ID').val(data[0]);
            console.log("This is damaged BOOK" + data[0]);

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