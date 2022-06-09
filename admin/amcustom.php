<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">ประเพณี</h1>

<?php if (isset($_GET['add'])) { ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">เพิ่มข้อมูล ประเพณี</h6>

        </div>

        <div class="card-body">

            <form action="?amcustom&add_db" method="post">

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">รหัสประเพณี</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="Custom_id" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput5" class="form-label">รหัสชาติพันธุ์</label>
                    <input type="text" class="form-control" id="exampleFormControlInput5" name="Ethnic_id" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput2" class="form-label"> ชื่อประเพณีภาษาไทย</label>
                    <input type="text" class="form-control" id="exampleFormControlInput2" name="Custom_name" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput4" class="form-label">ช่วงเวลา</label>
                    <input type="text" class="form-control" id="exampleFormControlInput4" name="Custom_date" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">ข้อมูลทั่วไป</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="Custom_detail" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-danger" onclick="history.back()">Cancle</a>
            </form>

        </div>

    </div>

    <?php } elseif (isset($_GET['edit'])) {

    if (isset($_GET['Custom_id'])) {

        $Custom_id = $_GET['Custom_id'];

        $sql1 = "SELECT * FROM custom WHERE Custom_id = '$Custom_id' ";
        $q1 = mysqli_query($conn, $sql1);
        $row = mysqli_fetch_array($q1);

    ?>

        <div class="card shadow mb-4">
            <div class="card-header py-3">

                <h6 class="m-0 font-weight-bold text-primary">แก้ไขข้อมูล ประเพณี</h6>

            </div>

            <div class="card-body">

                <form action="?amcustom&edit_db" method="post">

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">รหัสประเพณี</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="Custom_id" value="<?php echo $row['Custom_id'] ?>" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput5" class="form-label">รหัสชาติพันธุ์</label>
                        <input type="text" class="form-control" id="exampleFormControlInput5" name="Ethnic_id" value="<?php echo $row['Ethnic_id'] ?>" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput2" class="form-label"> ชื่อประเพณีภาษาไทย</label>
                        <input type="text" class="form-control" id="exampleFormControlInput2" name="Custom_name" value="<?php echo $row['Custom_name'] ?>" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput4" class="form-label">ช่วงเวลา</label>
                        <input type="text" class="form-control" id="exampleFormControlInput4" name="Custom_date" value="<?php echo $row['Custom_date'] ?>" autocomplete="off" required>
                    </div>


                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">ข้อมูลทั่วไป</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="Custom_detail" required><?php echo $row['Custom_detail'] ?></textarea>
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

    if (isset($_POST['Custom_id'])) {

        $Custom_id = $_POST["Custom_id"];
        $Custom_name = $_POST["Custom_name"];
        $Custom_detail = $_POST["Custom_detail"];
        $Custom_date = $_POST["Custom_date"];
        $Ethnic_id = $_POST["Ethnic_id"];

        $strSQL = "INSERT INTO custom
        values ('" . $Custom_id . "','" . $Custom_name . "','" . $Custom_detail . "',
                '" . $Custom_date . "','" . $Ethnic_id . "')";

        if (mysqli_query($conn, $strSQL)) {

            echo "<script>
            alert('บันทึกเรียบร้อย');
            window.location.href = 'index.php?amcustom';
              </script>";
        } else {

            echo "<script>
            alert('Error');
            window.location.href = 'index.php?amcustom';
              </script>";
        }
    }

    //แก้ไข db
} elseif (isset($_GET['edit_db'])) {

    if (isset($_POST['Custom_id'])) {

        $strSQL = "update custom set Custom_id = '" . $_POST['Custom_id'] . "'
        , Custom_name =  '" . $_POST['Custom_name'] . "'
        , Custom_detail =  '" . $_POST['Custom_detail'] . "'
        , Custom_date =  '" . $_POST['Custom_date'] . "'
        , Ethnic_id =  '" . $_POST['Ethnic_id'] . "'
        where Custom_id IN ('" . $_POST['Custom_id'] . "')";

        if (mysqli_query($conn, $strSQL)) {

            echo "<script>
            alert('บันทึกเรียบร้อย');
            window.location.href = 'index.php?amcustom';
              </script>";
        } else {

            echo "<script>
            alert('Error');
            window.location.href = 'index.php?amcustom';
              </script>";
        }
    }

    //ลบ
} elseif (isset($_GET['del'])) {

    if (isset($_GET['Custom_id'])) {

        $Custom_id = $_GET['Custom_id'];

        $sql = "DELETE FROM custom WHERE Custom_id ='$Custom_id'";

        if (mysqli_query($conn, $sql) == TRUE) {

            echo "<script>
            alert('ลบสำเร็จ');
            window.location.href = 'index.php?amcustom';
            </script>";
        } else {

            echo "<script>
            alert('Error');
            window.location.href = 'index.php?amcustom';
            </script>";
        }
    }
} else {

    ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">

            <a href="?amcustom&add" class="btn btn-success btn-circle float-end">
                <i class="fa fa-plus" aria-hidden="true"></i>
            </a>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Custom_id</th>
                            <th>ชื่อประเพณี</th>
                            <th>รายละเอียด</th>
                            <th>ช่วงเวลา</th>
                            <th>Ethnic_id</th>
                            <th>แก้ไข</th>
                            <th>ลบ</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        $sql1 = "SELECT * FROM custom";
                        $q1 = mysqli_query($conn, $sql1);
                        while ($row = mysqli_fetch_array($q1)) {
                            echo "<tr>";
                            echo "<td>" . $row['Custom_id'] . "</td>";
                            echo "<td>" . $row['Custom_name'] . "</td>";
                            echo "<td>" . $row['Custom_detail'] . "</td>";
                            echo "<td>" . $row['Custom_date'] . "</td>";
                            echo "<td>" . $row['Ethnic_id'] . "</td>";
                            echo '<td style="text-align: center"> <a href="?amcustom&edit&Custom_id=' . $row['Custom_id'] . '" class="btn btn-warning btn-sm float-end"><i class="fas fa-pencil-alt"></i></a> </td>';
                            echo "<td style='text-align: center'> <a href='?amcustom&del&Custom_id=" . $row['Custom_id'] . "' onclick=\"return confirm('ต้องการลบรายการนี้ใช่หรือไม่?')\" class='btn btn-danger btn-sm float-end'><i class='fas fa-trash'></i></a> </td>";
                            echo "</tr>";
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php } ?>