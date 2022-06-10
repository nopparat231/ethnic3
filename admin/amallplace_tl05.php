<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">สถานที่ท่องเที่ยว/พิพิธพันธุ์</h1>

<?php if (isset($_GET['add'])) { ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">เพิ่มข้อมูล สถานที่ท่องเที่ยว/พิพิธพันธุ์</h6>

        </div>

        <div class="card-body">

            <form action="?amallplace&search=tl05&add_db" method="post">

                <div class="mb-3">
                    <label for="Location_id" class="form-label">รหัสสถานที่ท่องเที่ยว/พิพิธพันธุ์</label>
                    <input type="text" class="form-control" id="Location_id" name="Location_id" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="Location_name" class="form-label">ชื่อสถานที่ท่องเที่ยว/พิพิธพันธุ์</label>
                    <input type="text" class="form-control" id="Location_name" name="Location_name" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="Location_longitude" class="form-label"> Location_longitude</label>
                    <input type="text" class="form-control" id="Location_longitude" name="Location_longitude" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="Location_latitude" class="form-label"> Location_latitude</label>
                    <input type="text" class="form-control" id="Location_latitude" name="Location_latitude" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="Location_detail" class="form-label"> Location_detail</label>
                    <textarea class="form-control" id="Location_detail" rows="3" name="Location_detail" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="Location_costmax" class="form-label">Location_costmax</label>
                    <input type="text" class="form-control" id="Location_costmax" name="Location_costmax" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="Location_costmin" class="form-label"> Location_costmin</label>
                    <input type="text" class="form-control" id="Location_costmin" name="Location_costmin" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="Province_id" class="form-label"> Province_id</label>
                    <input type="text" class="form-control" id="Province_id" name="Province_id" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="Ethnic_id" class="form-label"> Ethnic_id</label>
                    <input type="text" class="form-control" id="Ethnic_id" name="Ethnic_id" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="Typelocation_id" class="form-label"> Typelocation_id</label>
                    <input type="text" class="form-control" id="Typelocation_id" name="Typelocation_id" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="Place_open" class="form-label"> Place_open</label>
                    <input type="text" class="form-control" id="Place_open" name="Place_open" autocomplete="off" required>
                </div>

                <div class="mb-3">
                    <label for="Place_clo" class="form-label"> Place_clo</label>
                    <input type="text" class="form-control" id="Place_clo" name="Place_clo" autocomplete="off" required>
                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-danger" onclick="history.back()">Cancle</a>
            </form>

        </div>

    </div>

    <?php } elseif (isset($_GET['edit'])) {

    if (isset($_GET['Location_id'])) {

        $Location_id = $_GET['Location_id'];

        $sql1 = "SELECT * FROM place WHERE Location_id = '$Location_id' ";
        $q1 = mysqli_query($conn, $sql1);
        $row = mysqli_fetch_array($q1);

    ?>

        <div class="card shadow mb-4">
            <div class="card-header py-3">

                <h6 class="m-0 font-weight-bold text-primary">แก้ไขข้อมูล สถานที่ท่องเที่ยว/พิพิธพันธุ์</h6>

            </div>

            <div class="card-body">

                <form action="?amallplace&search=tl05&edit_db" method="post">

                    <div class="mb-3">
                        <label for="Location_id" class="form-label">รหัสสถานที่ท่องเที่ยว/พิพิธพันธุ์</label>
                        <input type="text" class="form-control" id="Location_id" name="Location_id" value="<?php echo $row['Location_id'] ?>" autocomplete="off" required readonly>
                    </div>

                    <div class="mb-3">
                        <label for="Location_name" class="form-label">ชื่อสถานที่ท่องเที่ยว/พิพิธพันธุ์</label>
                        <input type="text" class="form-control" id="Location_name" name="Location_name" value="<?php echo $row['Location_name'] ?>" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="Location_longitude" class="form-label"> Location_longitude</label>
                        <input type="text" class="form-control" id="Location_longitude" name="Location_longitude" value="<?php echo $row['Location_longitude'] ?>" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="Location_latitude" class="form-label"> Location_latitude</label>
                        <input type="text" class="form-control" id="Location_latitude" name="Location_latitude" value="<?php echo $row['Location_latitude'] ?>" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="Location_detail" class="form-label"> Location_detail</label>
                        <textarea class="form-control" id="Location_detail" rows="3" name="Location_detail" required><?php echo $row['Location_detail'] ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="Location_costmax" class="form-label">Location_costmax</label>
                        <input type="text" class="form-control" id="Location_costmax" name="Location_costmax" value="<?php echo $row['Location_costmax'] ?>" autocomplete="off" required>

                    </div>

                    <div class="mb-3">
                        <label for="Location_costmin" class="form-label"> Location_costmin</label>
                        <input type="text" class="form-control" id="Location_costmin" name="Location_costmin" value="<?php echo $row['Location_costmin'] ?>" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="Province_id" class="form-label"> Province_id</label>
                        <input type="text" class="form-control" id="Province_id" name="Province_id" value="<?php echo $row['Province_id'] ?>" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="Ethnic_id" class="form-label"> Ethnic_id</label>
                        <input type="text" class="form-control" id="Ethnic_id" name="Ethnic_id" value="<?php echo $row['Ethnic_id'] ?>" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="Typelocation_id" class="form-label"> Typelocation_id</label>
                        <input type="text" class="form-control" id="Typelocation_id" name="Typelocation_id" value="<?php echo $row['Typelocation_id'] ?>" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="Place_open" class="form-label"> Place_open</label>
                        <input type="text" class="form-control" id="Place_open" name="Place_open" value="<?php echo $row['Place_open'] ?>" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="Place_clo" class="form-label"> Place_clo</label>
                        <input type="text" class="form-control" id="Place_clo" name="Place_clo" value="<?php echo $row['Place_clo'] ?>" autocomplete="off" required>
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

    if (isset($_POST['Location_id'])) {

        $Location_id = $_POST["Location_id"];
        $Location_name = $_POST["Location_name"];
        $Location_longitude = $_POST["Location_longitude"];
        $Location_latitude = $_POST["Location_latitude"];
        $Location_detail = $_POST["Location_detail"];
        $Location_costmax = $_POST["Location_costmax"];
        $Location_costmin = $_POST["Location_costmin"];
        $Province_id = $_POST["Province_id"];
        $Ethnic_id = $_POST["Ethnic_id"];
        $Typelocation_id = $_POST["Typelocation_id"];
        $Place_open = $_POST["Place_open"];
        $Place_clo = $_POST["Place_clo"];


        $strSQL = "INSERT INTO place
        values ('" . $Location_id . "',
                '" . $Location_name . "',
                '" . $Location_longitude . "',
                '" . $Location_latitude . "',
                '" . $Location_detail . "',
                '" . $Location_costmax . "',
                '" . $Location_costmin . "',
                '" . $Province_id . "',
                '" . $Ethnic_id . "',
                '" . $Typelocation_id . "',
                '" . $Place_open . "',
                '" . $Place_clo . "')";

        if (mysqli_query($conn, $strSQL)) {

            echo "<script>
            alert('บันทึกเรียบร้อย');
            window.location.href = 'index.php?search=tl05&amallplace';
              </script>";
        } else {

            echo "<script>
            alert('Error');
            window.location.href = 'index.php?search=tl05&amallplace';
              </script>";
        }
    }

    //แก้ไข db
} elseif (isset($_GET['edit_db'])) {

    if (isset($_POST['Location_id'])) {

        $strSQL = "update place set Location_id = '" . $_POST['Location_id'] . "'
        , Location_name =  '" . $_POST['Location_name'] . "'
        , Location_longitude =  '" . $_POST['Location_longitude'] . "'
        , Location_latitude =  '" . $_POST['Location_latitude'] . "'
        , Location_detail =  '" . $_POST['Location_detail'] . "'
        , Location_costmax =  '" . $_POST['Location_costmax'] . "'
        , Location_costmin =  '" . $_POST['Location_costmin'] . "'
        , Province_id =  '" . $_POST['Province_id'] . "'
        , Ethnic_id =  '" . $_POST['Ethnic_id'] . "'
        , Typelocation_id =  '" . $_POST['Typelocation_id'] . "'
        , Place_open =  '" . $_POST['Place_open'] . "'
        , Place_clo =  '" . $_POST['Place_clo'] . "'
        where Location_id IN ('" . $_POST['Location_id'] . "')";

        if (mysqli_query($conn, $strSQL)) {

            echo "<script>
            alert('บันทึกเรียบร้อย');
            window.location.href = 'index.php?search=tl05&amallplace';
              </script>";
        } else {

            echo "<script>
            alert('Error');
            window.location.href = 'index.php?search=tl05&amallplace';
              </script>";
        }
    }

    //ลบ
} elseif (isset($_GET['del'])) {

    if (isset($_GET['Location_id'])) {

        $Location_id = $_GET['Location_id'];

        $sql = "DELETE FROM place WHERE Location_id ='$Location_id'";

        if (mysqli_query($conn, $sql) == TRUE) {

            echo "<script>
            alert('ลบสำเร็จ');
            window.location.href = 'index.php?search=tl05&amallplace';
            </script>";
        } else {

            echo "<script>
            alert('Error');
            window.location.href = 'index.php?search=tl05&amallplace';
            </script>";
        }
    }
} else {

    ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">

            <a href="?amallplace&search=tl05&add" class="btn btn-success btn-circle float-end">
                <i class="fa fa-plus" aria-hidden="true"></i>
            </a>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>รหัส</th>
                            <th>ชื่อสถานที่ท่องเที่ยว/พิพิธพันธุ์</th>
                            <th>Location_longitude</th>
                            <th>Location_latitude</th>
                            <th>Location_detail</th>
                            <th>Location_costmax</th>
                            <th>Location_costmin</th>
                            <th>Province_id</th>
                            <th>Ethnic_id</th>
                            <th>Typelocation_id</th>
                            <th>Place_open</th>
                            <th>Place_clo</th>

                            <th>แก้ไข</th>
                            <th>ลบ</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        $sql1 = "SELECT * FROM place";
                        $q1 = mysqli_query($conn, $sql1);
                        while ($row = mysqli_fetch_array($q1)) {

                            echo "<tr>";
                            echo "<td>" . $row['Location_id'] . "</td>";
                            echo "<td>" . $row['Location_name'] . "</td>";
                            echo "<td>" . $row['Location_longitude'] . "</td>";
                            echo "<td>" . $row['Location_latitude'] . "</td>";
                            echo "<td>" . $row['Location_detail'] . "</td>";
                            echo "<td>" . $row['Location_costmax'] . "</td>";
                            echo "<td>" . $row['Location_costmin'] . "</td>";
                            echo "<td>" . $row['Province_id'] . "</td>";
                            echo "<td>" . $row['Ethnic_id'] . "</td>";
                            echo "<td>" . $row['Typelocation_id'] . "</td>";
                            echo "<td>" . $row['Place_clo'] . "</td>";
                            echo "<td>" . $row['Place_clo'] . "</td>";
                            echo '<td style="text-align: center"> <a href="?amallplace&search=tl05&edit&Location_id=' . $row['Location_id'] . '" class="btn btn-warning btn-sm float-end"><i class="fas fa-pencil-alt"></i></a> </td>';
                            echo "<td style='text-align: center'> <a href='?amallplace&search=tl05&del&Location_id=" . $row['Location_id'] . "' onclick=\"return confirm('ต้องการลบรายการนี้ใช่หรือไม่?')\" class='btn btn-danger btn-sm float-end'><i class='fas fa-trash'></i></a> </td>";
                            echo "</tr>";
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php } ?>