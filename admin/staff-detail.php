<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php include 'includes/navbar.php'; ?>
        <?php include 'includes/menubar.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Staff Detail</h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Staff Detail</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">

                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <a href="new-staff-registration.php" class="btn btn-primary btn-sm btn-flat"><i
                                        class="fa fa-plus"></i>&nbsp;Add New Staff</a>
                            </div>
                            <div class="box-body">
                                <div style="overflow-x:auto;">
                                    <table id="example1" class="table table-bordered" style="width:100%;">
                                        <thead style="background-color: #80CBC4;">
                                            <th>ID</th>
                                            <th>Staff ID</th>
                                            <th>Staff Name</th>
                                            <th>Pic</th>
                                            <th>Ph. No.</th>
                                            <th>Address</th>
                                            <th>City</th>
                                            <th>State</th>
                                            <th>Pin Code</th>
                                            <th>Area</th>
                                            <th>Designation</th>
                                            <th>Manager</th>
                                            <th>LOC</th>
                                            <th>E-Mail</th>
                                            <th>Tools</th>
                                        </thead>
                                        <tbody>

                                            <?php //
        $sql = "SELECT * FROM tbl_staff_master order by id desc";
        $query = $conn->query($sql);
          while($row = $query->fetch_assoc()){
                    $sid = $row['id'];              
                    $simg = $row['emp_img'];              
            echo "
            <tr>
              <td valign='center'>".$row['id']."</td>
              <td>".$row['staffid']."</td>
              <td>".$row['staff_name']."</td>
              <td>
              <a type='button' class='btn btn-info btn-xs' data-toggle='modal' data-target='#myModal$sid'>Profile Img</a>

                                            <!-- Modal -->
                                            <div class='modal fade' id='myModal$sid' role='dialog'>
                                                <div class='modal-dialog modal-sm'>
                                                    <div class='modal-content'>
                                                        <div class='modal-header'>
                                                            <button type='button' class='close'
                                                                data-dismiss='modal'>&times; </button>
                                                            <img src='../new-reg/upload/$simg'
                                                                style='width:100%'>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                </div>
                                <!--modal-->


                                </td>
                                <td>".$row['phno']."</td>
                                <td>".$row['address']."</td>
                                <td>".$row['city']."</td>
                                <td>".$row['state1']."</td>
                                <td>".$row['pincode']."</td>
                                <td>".$row['area']."</td>
                                <td>".$row['designation']."</td>
                                <td>".$row['manager']."</td>
                                <td>".$row['loc']."</td>
                                <td>".$row['email']."</td>

                                <td>
                                    <a href='edit-staff.php?id=$sid' class='btn btn-info btn-sm btn-flat'><i
                                            class='fa fa-edit'></i> Edit</a>
                                    <button class='btn btn-danger btn-sm delete btn-flat' data-id='$sid'><i
                                            class='fa fa-trash'></i> Delete</button>

                                </td>
                                </tr>";
                                }
                                ?>
                                            <!--button class='btn btn-success btn-sm edit btn-flat' data-id='".$row['id']."'><i class='fa fa-edit'></i> Edit</button-->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <?php include 'includes/footer.php'; ?>
        <?php include 'includes/del_staff_model.php'; ?>
    </div>
    <?php include 'includes/scripts.php'; ?>
    <script>
    $(function() {
        $(document).on('click', '.delete', function(e) {
            e.preventDefault();
            $('#delete').modal('show');
            var id = $(this).data('id');
            getRow(id);
        });
    });

    function getRow(id) {
        $.ajax({
            type: 'POST',
            url: 'staff_row.php',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(response) {
                $('.catid').val(response.id);
                $('#del_cat').val(response.id);

            }
        });
    }
    </script>


</body>

</html>