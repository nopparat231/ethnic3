<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">ชาติพันธุ์</h1>


<?php if (isset($_GET['add'])) { ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">เพิ่มข้อมูล ชาติพันธุ์</h6>

        </div>

        <div class="card-body">

            <form action="?ethnic&add_db" method="post">

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">รหัสชาติพันธุ์</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="Ethnic_id" autocomplete="off" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput2" class="form-label">ชื่อชาติพันธุ์ภาษาไทย</label>
                    <input type="text" class="form-control" id="exampleFormControlInput2" name="Ethnic_nameth" autocomplete="off" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput3" class="form-label"> ชื่อชาติพันธุ์ภาษาอังกฤษ</label>
                    <input type="text" class="form-control" id="exampleFormControlInput3" name="Ethnic_nameen" autocomplete="off" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput4" class="form-label">ประชากร (คน)</label>
                    <input type="text" class="form-control" id="exampleFormControlInput4" name="Ethnic_population" autocomplete="off" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput5" class="form-label">ภาษา </label>
                    <input type="text" class="form-control" id="exampleFormControlInput5" name="Ethnic_language" autocomplete="off" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput6" class="form-label">ชื่อรูปภาพ</label>
                    <input type="text" class="form-control" id="exampleFormControlInput6" name="img" autocomplete="off" required>
                </div>


                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">ข้อมูลทั่วไป</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="7" name="Ethnic_history"></textarea>
                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-danger" onclick="history.back()">Cancle</a>
            </form>

        </div>

    </div>

    <?php } elseif (isset($_GET['edit'])) {

    if (isset($_GET['Ethnic_id'])) {

        $Ethnic_id = $_GET['Ethnic_id'];

        $sql1 = "SELECT * FROM ethnicdata WHERE Ethnic_id = '$Ethnic_id' ";
        $q1 = mysqli_query($conn, $sql1);
        $row = mysqli_fetch_array($q1);

    ?>

        <div class="card shadow mb-4">
            <div class="card-header py-3">

                <h6 class="m-0 font-weight-bold text-primary">แก้ไขข้อมูล ชาติพันธุ์</h6>

            </div>

            <div class="card-body">

                <form action="?ethnic&edit_db" method="post">

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">รหัสชาติพันธุ์</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="Ethnic_id" value="<?php echo $row['Ethnic_id'] ?>" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput2" class="form-label">ชื่อชาติพันธุ์ภาษาไทย</label>
                        <input type="text" class="form-control" id="exampleFormControlInput2" name="Ethnic_nameth" value="<?php echo $row['Ethnic_nameth'] ?>" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput3" class="form-label"> ชื่อชาติพันธุ์ภาษาอังกฤษ</label>
                        <input type="text" class="form-control" id="exampleFormControlInput3" name="Ethnic_nameen" value="<?php echo $row['Ethnic_nameen'] ?>" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput4" class="form-label">ประชากร (คน)</label>
                        <input type="text" class="form-control" id="exampleFormControlInput4" name="Ethnic_population" value="<?php echo $row['Ethnic_population'] ?>" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput5" class="form-label">ภาษา </label>
                        <input type="text" class="form-control" id="exampleFormControlInput5" name="Ethnic_language" value="<?php echo $row['Ethnic_language'] ?>" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput6" class="form-label">ชื่อรูปภาพ</label>
                        <input type="text" class="form-control" id="exampleFormControlInput6" name="img" value="<?php echo $row['img'] ?>" autocomplete="off" required>
                    </div>


                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">ข้อมูลทั่วไป</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="7" name="Ethnic_history" required><?php echo $row['Ethnic_history'] ?></textarea>
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

    if (isset($_POST['Ethnic_id'])) {

        $Ethnic_id = $_POST["Ethnic_id"];
        $Ethnic_nameth = $_POST["Ethnic_nameth"];
        $Ethnic_nameen = $_POST["Ethnic_nameen"];
        $Ethnic_history = $_POST["Ethnic_history"];
        $Ethnic_language = $_POST["Ethnic_language"];
        $Ethnic_population = $_POST["Ethnic_population"];
        $img = $_POST["img"];

        $strSQL = "INSERT INTO ethnicdata 
                   values ('" . $Ethnic_id . "','" . $Ethnic_nameth . "','" . $Ethnic_nameen . "',
                           '" . $Ethnic_history . "','" . $Ethnic_language . "','" . $Ethnic_population . "','" . $img . "')";

        if (mysqli_query($conn, $strSQL)) {
  
            echo "<script>
            alert('บันทึกเรียบร้อย');
            window.location.href = 'index.php?ethnic';
              </script>";
        } else {

            echo "<script>
            alert('Error');
            window.location.href = 'index.php?ethnic';
              </script>";
        }
    }

    //แก้ไข db
} elseif (isset($_GET['edit_db'])) {

    if (isset($_POST['Ethnic_id'])) {

        $Ethnic_id = $_POST["Ethnic_id"];
        $Ethnic_nameth = $_POST["Ethnic_nameth"];
        $Ethnic_nameen = $_POST["Ethnic_nameen"];
        $Ethnic_history = $_POST["Ethnic_history"];
        $Ethnic_language = $_POST["Ethnic_language"];
        $Ethnic_population = $_POST["Ethnic_population"];
        $img = $_POST["img"];

        $strSQL = "update ethnicdata set Ethnic_id = '" . $_POST['Ethnic_id'] . "'
           , Ethnic_nameth =  '" . $_POST['Ethnic_nameth'] . "'
		   , Ethnic_nameen =  '" . $_POST['Ethnic_nameen'] . "'
		   , Ethnic_history =  '" . $_POST['Ethnic_history'] . "'
		   , Ethnic_language =  '" . $_POST['Ethnic_language'] . "'
		   , Ethnic_population =  '" . $_POST['Ethnic_population'] . "'
           , img =  '" . $_POST['img'] . "'
		   where Ethnic_id IN ('" . $_POST['Ethnic_id'] . "')";

        if (mysqli_query($conn, $strSQL)) {

            echo "<script>
            alert('บันทึกเรียบร้อย');
            window.location.href = 'index.php?ethnic';
              </script>";
        } else {

            echo "<script>
            alert('Error');
            window.location.href = 'index.php?ethnic';
              </script>";
        }
    }

    //ลบ
} elseif (isset($_GET['del'])) {

    if (isset($_GET['Ethnic_id'])) {

        $Ethnic_id = $_GET['Ethnic_id'];

        $sql = "DELETE FROM ethnicdata WHERE Ethnic_id ='$Ethnic_id'";

        if (mysqli_query($conn, $sql) == TRUE) {

            echo "<script>
        alert('ลบสำเร็จ');
        window.location.href = 'index.php?ethnic';
          </script>";
        } else {

            echo "<script>
        alert('Error');
        window.location.href = 'index.php?ethnic';
          </script>";
        }
    }
} else {

    ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">

            <a href="?ethnic&add" class="btn btn-success btn-circle float-end">
                <i class="fa fa-plus" aria-hidden="true"></i>
            </a>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Ethnic_id</th>
                            <th>ชื่อภาษาไทย </th>
                            <th>ชื่อภาษาอังกฤษ </th>
                            <th>ข้อมูลทั่วไป</th>
                            <th>ภาษาที่ใช้ </th>
                            <th>ประชากร (คน)</th>
                            <th>รูปภาพ</th>
                            <th>แก้ไข</th>
                            <th>ลบ</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        $sql1 = "SELECT * FROM ethnicdata ";
                        $q1 = mysqli_query($conn, $sql1);

                        while ($row = mysqli_fetch_array($q1)) {

                            echo "<tr>";
                            echo "<td>" . $row['Ethnic_id'] . "</td>";
                            echo "<td>" . $row['Ethnic_nameth'] . "</td>";
                            echo "<td>" . $row['Ethnic_nameen'] . "</td>";
                            echo "<td>" . $row['Ethnic_history'] . "</td>";
                            echo "<td>" . $row['Ethnic_language'] . "</td>";
                            echo "<td>" . $row['Ethnic_population'] . "</td>";
                            echo "<td>" . $row['img'] . "</td>";
                            echo '<td style="text-align: center"> <a href="?ethnic&edit&Ethnic_id=' . $row['Ethnic_id'] . '" class="btn btn-warning btn-sm float-end"><i class="fas fa-pencil-alt"></i></a> </td>';
                            echo "<td style='text-align: center'> <a href='?ethnic&del&Ethnic_id=" . $row['Ethnic_id'] . "' onclick=\"return confirm('ต้องการลบรายการนี้ใช่หรือไม่?')\" class='btn btn-danger btn-sm float-end'><i class='fas fa-trash'></i></a> </td>";
                            echo "</tr>";
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php } ?>