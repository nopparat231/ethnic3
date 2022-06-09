<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">ผู้ใช้งาน</h1>

<?php if (isset($_GET['add'])) { ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">เพิ่มข้อมูล ผู้ใช้งาน</h6>

        </div>

        <div class="card-body">

            <form action="?users&add_db" method="post">

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">รหัสผู้ใช้งาน</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="Email" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput5" class="form-label">ชื่อ</label>
                    <input type="text" class="form-control" id="exampleFormControlInput5" name="Firstname" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput2" class="form-label"> นามสกุล</label>
                    <input type="text" class="form-control" id="exampleFormControlInput2" name="Lastname" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="select1" class="form-label"> Status</label>
                    <select class="form-select form-control" aria-label="Default select example" id="select1" name="Status" required>
                        <option value="Admin">Admin</option>
                        <option value="User">User</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-danger" onclick="history.back()">Cancle</a>
            </form>

        </div>

    </div>

    <?php } elseif (isset($_GET['edit'])) {

    if (isset($_GET['Email'])) {

        $Email = $_GET['Email'];

        $sql1 = "SELECT * FROM users WHERE Email = '$Email' ";
        $q1 = mysqli_query($conn, $sql1);
        $row = mysqli_fetch_array($q1);

    ?>

        <div class="card shadow mb-4">
            <div class="card-header py-3">

                <h6 class="m-0 font-weight-bold text-primary">แก้ไขข้อมูล ผู้ใช้งาน</h6>

            </div>

            <div class="card-body">

                <form action="?users&edit_db" method="post">

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">รหัสผู้ใช้งาน</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="Email" value="<?php echo $row['Email'] ?>" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput5" class="form-label">ชื่อ</label>
                        <input type="text" class="form-control" id="exampleFormControlInput5" name="Firstname" value="<?php echo $row['Firstname'] ?>" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput2" class="form-label"> นามสกุล</label>
                        <input type="text" class="form-control" id="exampleFormControlInput2" name="Lastname" value="<?php echo $row['Lastname'] ?>" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="select1" class="form-label"> Status</label>
                        <select class="form-select form-control" aria-label="Default select example" id="select1" name="Status" required>
                            <option selected value="<?php echo $row['Status'] ?>"><?php echo $row['Status'] ?></option>
                            <option value="Admin">Admin</option>
                            <option value="User">User</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a class="btn btn-danger" onclick="history.back()">Cancle</a>
                </form>

            </div>

        </div>


    <?php
    }
    //เพิ่ม db
} elseif (isset($_GET['add_db'])) {

    if (isset($_POST['Email'])) {

        $Email = $_POST["Email"];
        $Firstname = $_POST["Firstname"];
        $Lastname = $_POST["Lastname"];
        $Status = $_POST["Status"];

        $strSQL = "INSERT INTO users
        values ('" . $Email . "','" . $Firstname . "','" . $Lastname . "',
                '" . $Status . "')";

        if (mysqli_query($conn, $strSQL)) {

            echo "<script>
            alert('บันทึกเรียบร้อย');
            window.location.href = 'index.php?users';
              </script>";
        } else {

            echo "<script>
            alert('Error');
            window.location.href = 'index.php?users';
              </script>";
        }
    }

    //แก้ไข db
} elseif (isset($_GET['edit_db'])) {

    if (isset($_POST['Email'])) {

        $strSQL = "update users set Email = '" . $_POST['Email'] . "'
        , Firstname =  '" . $_POST['Firstname'] . "'
        , Lastname =  '" . $_POST['Lastname'] . "'
        , Status =  '" . $_POST['Status'] . "'
        where Email IN ('" . $_POST['Email'] . "')";

        if (mysqli_query($conn, $strSQL)) {

            echo "<script>
            alert('บันทึกเรียบร้อย');
            window.location.href = 'index.php?users';
              </script>";
        } else {

            echo "<script>
            alert('Error');
            window.location.href = 'index.php?users';
              </script>";
        }
    }

    //ลบ
} elseif (isset($_GET['del'])) {

    if (isset($_GET['Email'])) {

        $Email = $_GET['Email'];

        $sql = "DELETE FROM users WHERE Email ='$Email'";

        if (mysqli_query($conn, $sql) == TRUE) {

            echo "<script>
            alert('ลบสำเร็จ');
            window.location.href = 'index.php?users';
            </script>";
        } else {

            echo "<script>
            alert('Error');
            window.location.href = 'index.php?users';
            </script>";
        }
    }
} else {

    ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">

            <a href="?users&add" class="btn btn-success btn-circle float-end">
                <i class="fa fa-plus" aria-hidden="true"></i>
            </a>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>ชื่อผู้ใช้งาน</th>
                            <th>นามสกุล</th>
                            <th>Status</th>
                            <th>แก้ไข</th>
                            <th>ลบ</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        $sql1 = "SELECT * FROM users";
                        $q1 = mysqli_query($conn, $sql1);
                        while ($row = mysqli_fetch_array($q1)) {

                            echo "<tr>";
                            echo "<td>" . $row['Email'] . "</td>";
                            echo "<td>" . $row['Firstname'] . "</td>";
                            echo "<td>" . $row['Lastname'] . "</td>";
                            echo "<td>" . $row['Status'] . "</td>";
                            echo '<td style="text-align: center"> <a href="?users&edit&Email=' . $row['Email'] . '" class="btn btn-warning btn-sm float-end"><i class="fas fa-pencil-alt"></i></a> </td>';
                            echo "<td style='text-align: center'> <a href='?users&del&Email=" . $row['Email'] . "' onclick=\"return confirm('ต้องการลบรายการนี้ใช่หรือไม่?')\" class='btn btn-danger btn-sm float-end'><i class='fas fa-trash'></i></a> </td>";
                            echo "</tr>";
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php } ?>