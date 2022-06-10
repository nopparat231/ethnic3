<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">สถานที่</h1>

<div class="card mb-4">
    <div class="card-header">
        ประเภทสถานที่
    </div>
    <div class="card-body" style="text-align: center">

        <form action="?amallplace" method="get" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">

                <select class="form-select" aria-label="Default select example" style="width: 15rem;" name="search">
                    <option value="tl01">ร้านอาหาร</option>
                    <option value="tl02">วัฒนธรรมและประเพณี</option>
                    <option value="tl03">แหล่งที่เหลืออยู่</option>
                    <option value="tl04">ร้านเครื่องแต่งกาย</option>
                    <option value="tl05">สถานที่ท่องเที่ยว/พิพิธพันธุ์</option>
                </select>

                <input type="hidden" name="amallplace" value="amallplace">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>

    </div>
</div>

<!-- ก็คือประเภทสถานที่มันจะมี 5 อย่างค่ะ หนูเลยเอามารวมในหน้าเดียวกันแบบให้เลือก option คือ
TL01 ร้านอาหาร ก็จะแสดง(ตาราง foodplace) เพิ่มลบแก้ไขได้
TL02 สถานที่จัดประเพณี (customplace)
TL03 แหล่งที่เหลืออยู่ (ตาราง ethnic​place)​
TL04 ร้านเสื้อผ้า (ตาราง clothesplace)​
TL05 สถานที่ท่องเที่ยวและพิพิธภัณฑ์​ (ตาราง place)​
 -->

<?php

if ($_GET['search'] == "tl01") {
    include('amallplace_tl01.php');
} elseif ($_GET['search'] == "tl02") {
    include('amallplace_tl02.php');
} elseif ($_GET['search'] == "tl03") {
    include('amallplace_tl03.php');
} elseif ($_GET['search'] == "tl04") {
    include('amallplace_tl04.php');
} elseif ($_GET['search'] == "tl05") {
    include('amallplace_tl05.php');
} else {
?>

    <div class="card mb-4">
        <div class="card-header">
            เพิ่ม ลบ แก้ไข
        </div>
        <div class="card-body">
            <h2>Test : <?php echo isset($_GET['search']) ? $_GET['search'] : "" ?></h2>
        </div>
    </div>

<?php
}
?>