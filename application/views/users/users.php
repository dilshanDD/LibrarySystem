<style>
    table {
        margin-left: auto;
        margin-right: auto;
        font-size: 13px;
        height: 100%;
        table-layout: fixed;
    }
</style>
<script>
    function LoadFunction() {

        <?php
        if ($this->session->flashdata('msg') == 'save') {

        ?>
            Swal.fire(
                'Data',
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
                        <h1>Manage Users</h1>
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
                                <h3 class="card-title">Manage Users &nbsp; &nbsp; </h3>
                                <button id="add_new_user" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i> &nbsp;&nbsp; New User</button>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped ">
                                    <thead>
                                        <tr>

                                            <th>Staff ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>NIC</th>
                                            <th>Phone</th>
                                            <th>Username</th>
                                            <th>password</th>
                                            <th>Edit</th>
                                            <th>Delete</th>

                                        </tr>

                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($userdetails  as $user) { ?>
                                            <tr>
                                                <td> <?php echo $user['staff_ID'] ?> </td>
                                                <td> <?php echo $user['name'] ?> </td>
                                                <td> <?php echo $user['email'] ?> </td>
                                                <td> <?php echo $user['NIC'] ?> </td>
                                                <td> <?php echo $user['phone'] ?> </td>
                                                <td> <?php echo $user['username'] ?> </td>
                                                <td> <?php echo $user['password'] ?> </td>
                                                <td> <button class="btn btn-outline-success btn-sm rounded-0  editbtn" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button> </td>
                                                <td> <button class="btn btn-outline-danger btn-sm rounded-0 deletebtn" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button> </td>




                                            </tr>
                                        <?php }  ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Staff ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>NIC</th>
                                            <th>Phone</th>
                                            <th>Username</th>
                                            <th>password</th>
                                            <th>Edit</th>
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


    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add New User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                </div>

                <form id="form_newUser" method="post">
                    <!-- action="Staff/register_users" -->

                    <div class="modal-body">

                        <div class="form-group">
                            <li class="far fa-user-circle">&nbsp;&nbsp;</li>
                            <label>Name</label>
                            <br />

                            <input class="form-control input-rounded" name="name" id="staff_name" placeholder="Name" type="text">
                            <span id="name_error" class="text-danger"></span>
                        </div>



                        <div class="form-group">
                            <li class="fa fa-envelope">&nbsp;&nbsp;</li>
                            <label>Email</label>
                            <input class="form-control input-rounded" name="email" id="email" placeholder="Email" type="email">
                            <span id="email_error" class="text-danger"></span>
                        </div>

                        <div class="form-group">
                            <li class="fas fa-id-card">&nbsp;&nbsp;</li>
                            <label>NIC</label>
                            <input class="form-control input-rounded" name="NIC" id="NIC" placeholder="NIC" type="text">
                            <span id="NIC_error" class="text-danger"></span>
                        </div>

                        <div class="form-group">
                            <li class="fas fa-phone">&nbsp;&nbsp;</li>
                            <label>Phone</label>
                            <input class="form-control input-rounded" name="phone" id="phone" placeholder="Phone" type="text">
                            <span id="phone_error" class="text-danger"></span>
                        </div>


                        <div class="form-group">
                            <li class="fa fa-user">&nbsp;&nbsp;</li>
                            <label>User Name</label>
                            <br />
                            <input class="form-control input-rounded" name="username" id="username" placeholder="User Name" type="text">
                            <span id="username_error" class="text-danger"></span>

                        </div>


                        <div class="form-group">
                            <li class="fa fa-key">&nbsp;&nbsp;</li>
                            <label>Password</label>
                            <input class="form-control input-rounded" name="password" id="password" placeholder="Password" type="text">
                            <span id="password_error" class="text-danger"></span>
                        </div>

                        <div class="form-group">
                            <li class="fa fa-key">&nbsp;&nbsp;</li>
                            <label>Password Again</label>
                            <input class="form-control input-rounded" name="confirm_password" id="confirm_password" placeholder="Password Again" type="text">
                            <span id="confirm_password_error" class="text-danger"></span>
                        </div>


                    </div>


                    <div class="modal-footer">
                        <a href="javascript:;" class="btn btn-sm btn-white m-r-5 m-b-5" data-dismiss="modal">Close</a>
                        <button id="sub_btn" type="submit" class="btn btn-sm btn-primary m-r-5 m-b-5 ">
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

    <script src="bootstrap-validate.js"></script>



    <div class="modal fade" id="editmodal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <form id="form_data" method="post" action="Staff/updateuser">

                    <div class="modal-body">

                        <div class="form-group">
                            <li class="far fa-user-circle">&nbsp;&nbsp;</li>
                            <label>Staff ID</label>

                            <input class="form-control input-rounded" name="staff_ID" id="Astaff_ID" placeholder="Staff ID" type="text">
                        </div>

                        <div class="form-group">
                            <li class="far fa-user-circle">&nbsp;&nbsp;</li>
                            <label>Name</label>

                            <input class="form-control input-rounded" name="name" id="Aname" placeholder="Name" type="text">
                        </div>
                        <div class="form-group">
                            <li class="fa fa-envelope">&nbsp;&nbsp;</li>
                            <label>Email</label>
                            <input class="form-control input-rounded" name="email" id="Aemail" placeholder="Email" type="email">
                        </div>

                        <div class="form-group">
                            <li class="fas fa-id-card">&nbsp;&nbsp;</li>
                            <label>NIC</label>
                            <input class="form-control input-rounded" name="NIC" id="ANIC" placeholder="NIC" type="text">
                        </div>



                        <div class="form-group">
                            <li class="fas fa-phone">&nbsp;&nbsp;</li>
                            <label>Phone</label>
                            <input class="form-control input-rounded" name="phone" id="Aphone" placeholder="phone" type="text">
                        </div>

                        <div class="form-group">
                            <li class="fa fa-user">&nbsp;&nbsp;</li>
                            <label>User Name</label>
                            <br />
                            <input class="form-control input-rounded" name="username" id="Ausername" placeholder="User Name" type="text">

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

                    <form method="post" action="Staff/deleteuser">
                        <div class="modal-body">
                            <div class="form-group">
                                <input class="form-control input-rounded" name="staff_ID" id="Dstaff_ID" type="hidden">
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

            $('#Astaff_ID').val(data[0]);
            $('#Aname').val(data[1]);
            $('#Aemail').val(data[2]);
            $('#ANIC').val(data[3]);
            $('#Aphone').val(data[4]);
            $('#Ausername').val(data[5]);

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

            $('#Dstaff_ID').val(data[0]);
            console.log("This is Staff ID" + data[0]);

        });
    });
</script>




<script>
    //working
    $(document).ready(function() {

        $('#form_newUser').submit(function(event) {
            event.preventDefault();


            $.ajax({
                type: 'POST',
                url: "<?php echo base_url() ?>Staff/register_users",

                data: $(this).serialize(),
                dataType: 'json',

                // beforeSend: function() {
                //     $('#sub_btn').attr('disabled', 'disabled');
                // },
                success: function(data) {

                    if (data.error) {

                        console.log(data.error);

                        if (data.name_error != '') {
                            $('#name_error').html(data.name_error);
                        } else {
                            $('#name_error').html('');
                        }

                        if (data.email_error != '') {
                            $('#email_error').html(data.email_error);
                        } else {
                            $('#email_error').html('');
                        }

                        if (data.NIC_error != '') {
                            $('#NIC_error').html(data.NIC_error);
                        } else {
                            $('#NIC_error').html('');
                        }

                        if (data.phone_error != '') {
                            $('#phone_error').html(data.phone_error);
                        } else {
                            $('#phone_error').html('');
                        }

                        if (data.username_error != '') {
                            $('#username_error').html(data.username_error);
                        } else {
                            $('#username_error').html('');
                        }

                        if (data.password_error != '') {
                            $('#password_error').html(data.password_error);
                        } else {
                            $('#password_error').html('');
                        }

                        if (data.confirm_password_error != '') {
                            $('#confirm_password_error').html(data.confirm_password_error);
                        } else {
                            $('#confirm_password_error').html('');
                        }




                    } else if (data.success) {
                        console.log(data.success);

                        $('#modal-default').modal('hide');
                        Swal.fire(
                            'Data saved successfully !',
                            '',
                            'success'
                        ).then(function() {
                            window.location = "http://localhost:8080/LibrarySystem/Staff";
                        });

                    }



                }



            });


        });

    });
</script>
