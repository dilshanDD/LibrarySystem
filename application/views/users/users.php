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
                <form id="form_data" method="post" action="Staff/register_users">

                    <div class="modal-body">

                        <div class="form-group">
                            <li class="far fa-user-circle">&nbsp;&nbsp;</li>
                            <label>Name</label>
                            <br />

                            <input class="form-control input-rounded" name="name" placeholder="Name" type="text">
                        </div>



                        <div class="form-group">
                            <li class="fa fa-envelope">&nbsp;&nbsp;</li>
                            <label>Email</label>
                            <input class="form-control input-rounded" name="email" placeholder="Email" type="email">
                        </div>

                        <div class="form-group">
                            <li class="fas fa-id-card">&nbsp;&nbsp;</li>
                            <label>NIC</label>
                            <input class="form-control input-rounded" name="NIC" placeholder="NIC" type="text">
                        </div>

                        <div class="form-group">
                            <li class="fas fa-phone">&nbsp;&nbsp;</li>
                            <label>Phone</label>
                            <input class="form-control input-rounded" name="phone" placeholder="Phone" type="text">
                        </div>


                        <div class="form-group">
                            <li class="fa fa-user">&nbsp;&nbsp;</li>
                            <label>User Name</label>
                            <br />
                            <input class="form-control input-rounded" name="username" placeholder="User Name" type="text">

                        </div>


                        <div class="form-group">
                            <li class="fa fa-key">&nbsp;&nbsp;</li>
                            <label>Password</label>
                            <input class="form-control input-rounded" name="password" placeholder="Password" type="password">
                        </div>

                        <div class="form-group">
                            <li class="fa fa-key">&nbsp;&nbsp;</li>
                            <label>Password Again</label>
                            <input class="form-control input-rounded" name="password_again" placeholder="Password Again" type="password">
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
                    <h4 class="modal-title">Update User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <form id="form_data" method="post" action="Staff/updateuser">

                    <div class="modal-body">

                        <div class="form-group">
                            <li class="far fa-user-circle">&nbsp;&nbsp;</li>
                            <label>Staff ID</label>

                            <input class="form-control input-rounded" name="staff_ID" id="staff_ID" placeholder="Staff ID" type="text">
                        </div>

                        <div class="form-group">
                            <li class="far fa-user-circle">&nbsp;&nbsp;</li>
                            <label>Name</label>

                            <input class="form-control input-rounded" name="name" id="name" placeholder="Name" type="text">
                        </div>
                        <div class="form-group">
                            <li class="fa fa-envelope">&nbsp;&nbsp;</li>
                            <label>Email</label>
                            <input class="form-control input-rounded" name="email" id="email" placeholder="Email" type="email">
                        </div>

                        <div class="form-group">
                            <li class="fas fa-id-card">&nbsp;&nbsp;</li>
                            <label>NIC</label>
                            <input class="form-control input-rounded" name="NIC" id="NIC" placeholder="NIC" type="text">
                        </div>



                        <div class="form-group">
                            <li class="fas fa-phone">&nbsp;&nbsp;</li>
                            <label>Phone</label>
                            <input class="form-control input-rounded" name="phone" id="phone" placeholder="phone" type="text">
                        </div>

                        <div class="form-group">
                            <li class="fa fa-user">&nbsp;&nbsp;</li>
                            <label>User Name</label>
                            <br />
                            <input class="form-control input-rounded" name="username" id="username" placeholder="User Name" type="text">

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

                    <form id="form_data" method="post" action="Staff/deleteuser">
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

            $('#staff_ID').val(data[0]);
            $('#name').val(data[1]);
            $('#email').val(data[2]);
            $('#NIC').val(data[3]);
            $('#phone').val(data[4]);
            $('#username').val(data[5]);

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





<!-- 
<script type='text/javascript' language='javascript'>
    $(document).ready(function() {
        $('.remove').on('click', function() {

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();


            var staffID = data[0];
            var name = 'Dilshan';
            console.log(staffID);

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this! " + staffID,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {

                if (result.isConfirmed) {

                    console.log("Yes clicked");
                    $.ajax({
                        url: "<?php echo base_url(); ?>index.php/Staff/deleteuser",
                        method: "POST",
                        dataType: 'json',
                        data: {

                            staff_ID: staffID,
                            name: name
                        },

                        success: function(response) {
                            if (response) {
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )
                            }

                        },
                        error: function(e) {
                            console.log(e);
                            Swal.fire(
                                'success' + e.responseText,
                                'Your file has not been deleted.',
                                'success'
                            )
                        }
                    });

                }
            })

        });
    });
</script> -->



<!-- 

<script type="text/javascript">
    $(".remove").click(function() {
        var staff_ID = $(this).parents("tr").attr("staff_ID");

        Swal.fire({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file! @" + $staffID,
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel plx!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            // function(isConfirm) {
            //     if (isConfirm) {
            //         $.ajax({
            //             url: 'Allstaff' + staff_ID,
            //             type: 'delete',
            //             error: function() {
            //                 alert('Sorry dear Something is wrong');
            //             },
            //             success: function(data) {
            //                 $("#" + staff_ID).remove();
            //                 swal("Deleted!", "Your imaginary file has been deleted.", "success");
            //             }
            //         });
            //     } else {
            //         swal("Cancelled", "Your imaginary file is safe :)", "error");
            //     }
            // }

        );

    });
</script> -->



<!-- <script type="text/javascript">
    function deletefun() {
        try {
            event.preventDefault();
        } catch (e) {
            Swal.fire(
                'Something went wrong',
                '',
                'success'
            )
        }

       // var form = event.target.form;
        //e.prevent default is not working so i used .stopImmediatePropagation()

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(function(result) {
            if (result.value) {
                try {
                    form.submit();
                } catch (e) {}

            }

        })
    }
</script> -->