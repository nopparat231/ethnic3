<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">ร้านอาหาร</h1>

<?php if (isset($_GET['add'])) { ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">เพิ่มข้อมูล ร้านอาหาร</h6>

        </div>

        <div class="card-body">

            <form action="?amallplace&search=tl01&add_db" method="post">

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">รหัสร้านอาหาร</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="Foodplace_id" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput5" class="form-label">ชื่อร้านอาหาร</label>
                    <input type="text" class="form-control" id="exampleFormControlInput5" name="Foodplace_name" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput2" class="form-label"> Foodplace_longitude</label>
                    <input type="text" class="form-control" id="exampleFormControlInput2" name="Foodplace_longitude" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput4" class="form-label"> Foodplace_latitude</label>
                    <input type="text" class="form-control" id="exampleFormControlInput4" name="Foodplace_latitude" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput4" class="form-label"> Foodplace_detail</label>
                    <input type="text" class="form-control" id="exampleFormControlInput4" name="Foodplace_detail" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput4" class="form-label"> Foodtype_id</label>
                    <input type="text" class="form-control" id="exampleFormControlInput4" name="Foodtype_id" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput4" class="form-label"> Typelocation_id</label>
                    <input type="text" class="form-control" id="exampleFormControlInput4" name="Typelocation_id" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput4" class="form-label"> Province_id</label>
                    <input type="text" class="form-control" id="exampleFormControlInput4" name="Province_id" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput4" class="form-label"> Ethnic_id</label>
                    <input type="text" class="form-control" id="exampleFormControlInput4" name="Ethnic_id" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput4" class="form-label"> Foodplace_costmin</label>
                    <input type="text" class="form-control" id="exampleFormControlInput4" name="Foodplace_costmin" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput4" class="form-label"> Foodplace_costmax</label>
                    <input type="text" class="form-control" id="exampleFormControlInput4" name="Foodplace_costmax" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput4" class="form-label"> Foodplace_open</label>
                    <input type="text" class="form-control" id="exampleFormControlInput4" name="Foodplace_open" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput4" class="form-label"> Foodplace_clo</label>
                    <input type="text" class="form-control" id="exampleFormControlInput4" name="Foodplace_clo" autocomplete="off" required>
                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-danger" onclick="history.back()">Cancle</a>
            </form>

        </div>

    </div>

    <?php } elseif (isset($_GET['edit'])) {

    if (isset($_GET['Foodplace_id'])) {

        $Foodplace_id = $_GET['Foodplace_id'];

        $sql1 = "SELECT * FROM foodplace WHERE Foodplace_id = '$Foodplace_id' ";
        $q1 = mysqli_query($conn, $sql1);
        $row = mysqli_fetch_array($q1);

    ?>

        <div class="card shadow mb-4">
            <div class="card-header py-3">

                <h6 class="m-0 font-weight-bold text-primary">แก้ไขข้อมูล ร้านอาหาร</h6>

            </div>

            <div class="card-body">

                <form action="?amallplace&search=tl01&edit_db" method="post">

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">รหัสร้านอาหาร</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="Foodplace_id" value="<?php echo $row['Foodplace_id'] ?>" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput5" class="form-label">ชื่อร้านอาหาร</label>
                        <input type="text" class="form-control" id="exampleFormControlInput5" name="Foodplace_name" value="<?php echo $row['Foodplace_name'] ?>" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput2" class="form-label"> Foodplace_longitude</label>
                        <input type="text" class="form-control" id="exampleFormControlInput2" name="Foodplace_longitude" value="<?php echo $row['Foodplace_longitude'] ?>" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput4" class="form-label"> Foodplace_latitude</label>
                        <input type="text" class="form-control" id="exampleFormControlInput4" name="Foodplace_latitude" value="<?php echo $row['Foodplace_latitude'] ?>" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput4" class="form-label"> Foodplace_detail</label>
                        <input type="text" class="form-control" id="exampleFormControlInput4" name="Foodplace_detail" value="<?php echo $row['Foodplace_detail'] ?>" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput4" class="form-label"> Foodtype_id</label>
                        <input type="text" class="form-control" id="exampleFormControlInput4" name="Foodtype_id" value="<?php echo $row['Foodtype_id'] ?>" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput4" class="form-label"> Typelocation_id</label>
                        <input type="text" class="form-control" id="exampleFormControlInput4" name="Typelocation_id" value="<?php echo $row['Typelocation_id'] ?>" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput4" class="form-label"> Province_id</label>
                        <input type="text" class="form-control" id="exampleFormControlInput4" name="Province_id" value="<?php echo $row['Province_id'] ?>" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput4" class="form-label"> Ethnic_id</label>
                        <input type="text" class="form-control" id="exampleFormControlInput4" name="Ethnic_id" value="<?php echo $row['Ethnic_id'] ?>" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput4" class="form-label"> Foodplace_costmin</label>
                        <input type="text" class="form-control" id="exampleFormControlInput4" name="Foodplace_costmin" value="<?php echo $row['Foodplace_costmin'] ?>" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput4" class="form-label"> Foodplace_costmax</label>
                        <input type="text" class="form-control" id="exampleFormControlInput4" name="Foodplace_costmax" value="<?php echo $row['Foodplace_costmax'] ?>" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput4" class="form-label"> Foodplace_open</label>
                        <input type="text" class="form-control" id="exampleFormControlInput4" name="Foodplace_open" value="<?php echo $row['Foodplace_open'] ?>" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput4" class="form-label"> Foodplace_clo</label>
                        <input type="text" class="form-control" id="exampleFormControlInput4" name="Foodplace_clo" value="<?php echo $row['Foodplace_clo'] ?>" autocomplete="off" required>
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

    if (isset($_POST['Foodplace_id'])) {

        $Foodplace_id = $_POST["Foodplace_id"];
        $Foodplace_name = $_POST["Foodplace_name"];
        $Foodplace_longitude = $_POST["Foodplace_longitude"];
        $Foodplace_latitude = $_POST["Foodplace_latitude"];
        $Foodplace_detail = $_POST["Foodplace_detail"];
        $Foodtype_id = $_POST["Foodtype_id"];
        $Typelocation_id = $_POST["Typelocation_id"];
        $Province_id = $_POST["Province_id"];
        $Ethnic_id = $_POST["Ethnic_id"];
        $Foodplace_costmin = $_POST["Foodplace_costmin"];
        $Foodplace_costmax = $_POST["Foodplace_costmax"];
        $Foodplace_open = $_POST["Foodplace_open"];
        $Foodplace_clo = $_POST["Foodplace_clo"];

        $strSQL = "INSERT INTO foodplace
        values ('" . $Foodplace_id . "',
                '" . $Foodplace_name . "',
                '" . $Foodplace_longitude . "',
                '" . $Foodplace_latitude . "',
                '" . $Foodplace_detail . "',
                '" . $Foodtype_id . "',
                '" . $Typelocation_id . "',
                '" . $Province_id . "',
                '" . $Ethnic_id . "',
                '" . $Foodplace_costmin . "',
                '" . $Foodplace_costmax . "',
                '" . $Foodplace_open . "',
                '" . $Foodplace_clo . "')";

        if (mysqli_query($conn, $strSQL)) {

            echo "<script>
            alert('บันทึกเรียบร้อย');
            window.location.href = 'index.php?search=tl01&amallplace';
              </script>";
        } else {

            echo "<script>
            alert('Error');
            window.location.href = 'index.php?search=tl01&amallplace';
              </script>";
        }
    }

    //แก้ไข db
} elseif (isset($_GET['edit_db'])) {

    if (isset($_POST['Foodplace_id'])) {

        $strSQL = "update foodplace set Foodplace_id = '" . $_POST['Foodplace_id'] . "'
        , Foodplace_name =  '" . $_POST['Foodplace_name'] . "'
        , Foodplace_longitude =  '" . $_POST['Foodplace_longitude'] . "'
        , Foodplace_latitude =  '" . $_POST['Foodplace_latitude'] . "'
        , Foodplace_detail =  '" . $_POST['Foodplace_detail'] . "'
        , Foodtype_id =  '" . $_POST['Foodtype_id'] . "'
        , Typelocation_id =  '" . $_POST['Typelocation_id'] . "'
        , Province_id =  '" . $_POST['Province_id'] . "'
        , Ethnic_id =  '" . $_POST['Ethnic_id'] . "'
        , Foodplace_costmin =  '" . $_POST['Foodplace_costmin'] . "'
        , Foodplace_costmax =  '" . $_POST['Foodplace_costmax'] . "'
        , Foodplace_open =  '" . $_POST['Foodplace_open'] . "'
        , Foodplace_clo =  '" . $_POST['Foodplace_clo'] . "'
        where Foodplace_id IN ('" . $_POST['Foodplace_id'] . "')";

        if (mysqli_query($conn, $strSQL)) {

            echo "<script>
            alert('บันทึกเรียบร้อย');
            window.location.href = 'index.php?search=tl01&amallplace';
              </script>";
        } else {

            echo "<script>
            alert('Error');
            window.location.href = 'index.php?search=tl01&amallplace';
              </script>";
        }
    }

    //ลบ
} elseif (isset($_GET['del'])) {

    if (isset($_GET['Foodplace_id'])) {

        $Foodplace_id = $_GET['Foodplace_id'];

        $sql = "DELETE FROM foodplace WHERE Foodplace_id ='$Foodplace_id'";

        if (mysqli_query($conn, $sql) == TRUE) {

            echo "<script>
            alert('ลบสำเร็จ');
            window.location.href = 'index.php?search=tl01&amallplace';
            </script>";
        } else {

            echo "<script>
            alert('Error');
            window.location.href = 'index.php?search=tl01&amallplace';
            </script>";
        }
    }
} else {

    ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">

            <a href="?amallplace&search=tl01&add" class="btn btn-success btn-circle float-end">
                <i class="fa fa-plus" aria-hidden="true"></i>
            </a>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>รหัสร้านอาหาร</th>
                            <th>ชื่อร้านอาหาร</th>
                            <th>Foodplace_longitude</th>
                            <th>Foodplace_latitude</th>
                            <th>Foodplace_detail</th>
                            <th>Foodtype_id</th>
                            <th>Typelocation_id</th>
                            <th>Province_id</th>
                            <th>Ethnic_id</th>
                            <th>Foodplace_costmin</th>
                            <th>Foodplace_costmax</th>
                            <th>Foodplace_open</th>
                            <th>Foodplace_clo</th>

                            <th>แก้ไข</th>
                            <th>ลบ</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        $sql1 = "SELECT * FROM foodplace";
                        $q1 = mysqli_query($conn, $sql1);
                        while ($row = mysqli_fetch_array($q1)) {

                            echo "<tr>";
                            echo "<td>" . $row['Foodplace_id'] . "</td>";
                            echo "<td>" . $row['Foodplace_name'] . "</td>";
                            echo "<td>" . $row['Foodplace_longitude'] . "</td>";
                            echo "<td>" . $row['Foodplace_latitude'] . "</td>";
                            echo "<td>" . $row['Foodplace_detail'] . "</td>";
                            echo "<td>" . $row['Foodtype_id'] . "</td>";
                            echo "<td>" . $row['Typelocation_id'] . "</td>";
                            echo "<td>" . $row['Province_id'] . "</td>";
                            echo "<td>" . $row['Ethnic_id'] . "</td>";
                            echo "<td>" . $row['Foodplace_costmax'] . "</td>";
                            echo "<td>" . $row['Foodplace_costmax'] . "</td>";
                            echo "<td>" . $row['Foodplace_open'] . "</td>";
                            echo "<td>" . $row['Foodplace_clo'] . "</td>";
                            echo '<td style="text-align: center"> <a href="?amallplace&search=tl01&edit&Foodplace_id=' . $row['Foodplace_id'] . '" class="btn btn-warning btn-sm float-end"><i class="fas fa-pencil-alt"></i></a> </td>';
                            echo "<td style='text-align: center'> <a href='?amallplace&search=tl01&del&Foodplace_id=" . $row['Foodplace_id'] . "' onclick=\"return confirm('ต้องการลบรายการนี้ใช่หรือไม่?')\" class='btn btn-danger btn-sm float-end'><i class='fas fa-trash'></i></a> </td>";
                            echo "</tr>";
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php } ?>