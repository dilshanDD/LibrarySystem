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

<style>
    table {
        margin-left: auto;
        margin-right: auto;
        font-size: 12px;
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
                        <h1>Manage Students</h1>
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
                                <button id="add_new_user" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i> &nbsp;&nbsp; New Student</button>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped ">
                                    <thead>
                                        <tr>

                                            <th>Student ID</th>
                                            <th>Staff ID</th>
                                            <th>NIC</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Registered Date</th>
                                            <th>Edit</th>
                                            <th>Membership</th>
                                            <th>Delete</th>


                                        </tr>

                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($studentdetails  as $student) { ?>
                                            <tr>
                                                <td> <?php echo $student['student_ID'] ?> </td>
                                                <td> <?php echo $student['staff_id'] ?> </td>
                                                <td> <?php echo $student['NIC'] ?> </td>
                                                <td> <?php echo $student['email'] ?> </td>
                                                <td> <?php echo $student['phone'] ?> </td>
                                                <td> <?php echo $student['address'] ?> </td>
                                                <td> <?php echo $student['first_name'] ?> </td>
                                                <td> <?php echo $student['last_name'] ?> </td>
                                                <td> <?php echo $student['registered_date'] ?> </td>
                                                <td> <button class="btn btn-outline-success btn-sm rounded-0  editbtn" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button> </td>
                                                <td> <button class="btn btn-outline-warning btn-sm rounded-0  updatememberbtn" type="button" data-toggle="tooltip" data-placement="top" title="Update Membership"><i class="fa fa-edit"></i></button> </td>
                                                <td> <button class="btn btn-outline-danger btn-sm rounded-0 deletememBtn" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button> </td>




                                            </tr>
                                        <?php }  ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Student ID</th>
                                            <th>Staff ID</th>
                                            <th>NIC</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Registered Date</th>
                                            <th>Edit</th>
                                            <th>Membership</th>
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
                    <h4 class="modal-title">Add New Student</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <form id="form_data" method="post" action="Student/Add_student">

                    <div class="modal-body">



                        <div class="form-group">
                            <li class="far fa-user-circle">&nbsp;&nbsp;</li>
                            <label>Staff ID</label>

                            <input class="form-control input-rounded" value="<?php echo $this->session->userdata('id'); ?>" name="staff_id" placeholder="Staff ID" type="text">
                        </div>

                        <div class="form-group">
                            <li class="far fa-user-circle">&nbsp;&nbsp;</li>
                            <label>NIC</label>

                            <input class="form-control input-rounded" name="NIC" placeholder="NIC" type="text">
                        </div>
                        <div class="form-group">
                            <li class="fa fa-envelope">&nbsp;&nbsp;</li>
                            <label>Email</label>
                            <input class="form-control input-rounded" name="email" placeholder="Email" type="email">
                        </div>

                        <div class="form-group">
                            <li class="fas fa-phone">&nbsp;&nbsp;</li>
                            <label>Phone</label>
                            <input class="form-control input-rounded" name="phone" placeholder="phone" type="text">
                        </div>

                        <div class="form-group">
                            <li class="fa fa-user">&nbsp;&nbsp;</li>
                            <label>Address</label>
                            <br />
                            <input class="form-control input-rounded" name="address" placeholder="Address" type="text">

                        </div>
                        <div class="form-group">
                            <li class="fa fa-user">&nbsp;&nbsp;</li>
                            <label>First Name</label>
                            <br />
                            <input class="form-control input-rounded" name="first_name" placeholder="First Name" type="text">

                        </div>
                        <div class="form-group">
                            <li class="fa fa-user">&nbsp;&nbsp;</li>
                            <label>Last Name</label>
                            <br />
                            <input class="form-control input-rounded" name="last_name" placeholder="Last Name" type="text">

                        </div>
                        <div class="form-group">
                            <li class="fa fa-envelope">&nbsp;&nbsp;</li>
                            <label>Registered Date</label>
                            <input class="form-control input-rounded" name="registered_date" id="datepicker" type="text"></p>
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
                    <h4 class="modal-title">Update Student</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <form id="form_data" method="post" action="Student/updateStudent">

                    <div class="modal-body">


                        <div class="form-group">
                            <li class="far fa-user-circle">&nbsp;&nbsp;</li>
                            <label>Student ID</label>

                            <input class="form-control input-rounded" name="student_ID" id="Astudent_ID" type="text">
                        </div>

                        <div class="form-group">
                            <li class="far fa-user-circle">&nbsp;&nbsp;</li>
                            <label>Staff ID</label>

                            <input class="form-control input-rounded" name="staff_id" id="Astaff_id" type="text">
                        </div>

                        <div class="form-group">
                            <li class="far fa-user-circle">&nbsp;&nbsp;</li>
                            <label>NIC</label>

                            <input class="form-control input-rounded" name="NIC" id="ANIC" type="text">
                        </div>
                        <div class="form-group">
                            <li class="fa fa-envelope">&nbsp;&nbsp;</li>
                            <label>Email</label>
                            <input class="form-control input-rounded" name="email" id="Aemail" type="email">
                        </div>

                        <div class="form-group">
                            <li class="fas fa-phone">&nbsp;&nbsp;</li>
                            <label>Phone</label>
                            <input class="form-control input-rounded" name="phone" id="Aphone" type="text">
                        </div>

                        <div class="form-group">
                            <li class="fa fa-user">&nbsp;&nbsp;</li>
                            <label>Address</label>
                            <br />
                            <input class="form-control input-rounded" name="address" id="Aaddress" type="text">

                        </div>
                        <div class="form-group">
                            <li class="fa fa-user">&nbsp;&nbsp;</li>
                            <label>First Name</label>
                            <br />
                            <input class="form-control input-rounded" name="first_name" id="Afirst_name" type="text">

                        </div>
                        <div class="form-group">
                            <li class="fa fa-user">&nbsp;&nbsp;</li>
                            <label>Last Name</label>
                            <br />
                            <input class="form-control input-rounded" name="last_name" id="Alast_name" type="text">

                        </div>


                        <div class="form-group">
                            <li class="fa fa-user">&nbsp;&nbsp;</li>
                            <label>Registered Date</label>
                            <br />
                            <input class="form-control input-rounded" name="registered_date" id="Aregistered_date" type="text">

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


    <div class="modal fade" id="membershipmodal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update Membership</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <form id="form_data" method="post" action="Membership/addMembership">

                    <div class="modal-body">

                        <div class="form-group">
                            <li class="far fa-user-circle">&nbsp;&nbsp;</li>
                            <label>Student ID</label>
                            <input class="form-control input-rounded" name="student_id" id="Bstudent_id" type="text">
                        </div>
                        <div class="form-group">
                            <li class="fa fa-envelope">&nbsp;&nbsp;</li>
                            <label>Renew Date</label>
                            <input class="form-control input-rounded" name="renew_date" value="<?php echo @date('Y-m-d'); ?>" type="text"></p>
                        </div>

                        <div class="form-group">
                            <li class="fa fa-envelope">&nbsp;&nbsp;</li>
                            <label>Expire Date</label>
                            <input class="form-control input-rounded" name="expire_date" placeholder="Expire Date" id="ex_datepicker" type="text"></p>
                        </div>


                        <div class="form-group">
                            <li class="fa fa-user">&nbsp;&nbsp;</li>
                            <label>Renew Fee</label>
                            <br />
                            <input class="form-control input-rounded" name="renew_fee" placeholder="Renew Fee" type="text">

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

                    <form id="form_data" method="post" action="Student/deleteStudent">
                        <div class="modal-body">
                            <div class="form-group">
                                <input class="form-control input-rounded" name="student_ID" id="DelStudentID" type="hidden">
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
    $(function() {

        $('#datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        });
    });
</script>

<script>
    $(function() {

        $('#ex_datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        });
    });
</script>
<script>
    $(function() {

        $('#renew_datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
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

            $('#Astudent_ID').val(data[0]);
            $('#Astaff_id').val(data[1]);
            $('#ANIC').val(data[2]);
            $('#Aemail').val(data[3]);
            $('#Aphone').val(data[4]);
            $('#Aaddress').val(data[5]);
            $('#Afirst_name').val(data[6]);
            $('#Alast_name').val(data[7]);
            $('#Aregistered_date').val(data[8]);

        });
    });
</script>

<script>
    $(document).ready(function() {
        $('.updatememberbtn').on('click', function() {
            $('#membershipmodal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#Bstudent_id').val(data[0]);


        });
    });
</script>

<script>
    $(document).ready(function() {
        $('.deletememBtn').on('click', function() {
            $('#deletemodal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            $('#DelStudentID').val(data[0]);


        });
    });
</script>