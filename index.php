<?php 
include 'config/database.php';

session_start(); 
if(!isset($_SESSION['Login']))
{
    $_SESSION['Login'] = "Đăng nhập";
    $_SESSION['Register'] = "Đăng ký";
}
else 
    $_SESSION['Register'] = "Đăng xuất";
?>
<?php include 'inc/header.php'; ?>
<form action="" method="post" name="main-form">
<div id="menu_top">
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class=" navbar-collapse">
      <ul class="navbar-nav ">
        <li class="nav-item active ">
          <a class="nav-link active navbar-brand" href="index.html">Home</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="login.php"><span><?php echo $_SESSION['Login']?></span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" tabindex="-1" aria-disabled="true"
            <?php
            $link;
            if($_SESSION['Register']=="Đăng ký"){ 
                $link="register.php";
            }else
                $link="Login.php";
            ?>
            href="<?php echo $link ?>";
          >
          <span><?php echo $_SESSION['Register']?></span>
          </a>
        </li>
      </ul>
    </div>
  </nav>
</div>
<div class="container">
  <div class="panner">
    <div class="background-input">
      <p> Tìm kiếm công việc</p>
      <div class="input-group">
   <input type="text" name="timkiemtheotext" id="username" value=""
            placeholder="Nhập tên công ty,tên công việc, kỹ năng . . . ." />
        <select name="object">
          <option value="which" selected="selected">Tìm việc</option>
          <option value="who">Tìm ứng viên</option>
        </select>
        <select name="location">
          <option value="bac" selected="selected">Miền Bắc</option>
          <option value="trung">Miền Trung</option>
          <option value="nam">Miền Nam</option>
          <option value="whole">Toàn bộ</option>
        </select>
      <button type="submit" class="btn btn-primary"
            value="search" name="timkiem">Search</button>
      </div>
    </div>
    <button type="button" class="btn btn-primary" style="margin-left: 300px ">Tạo CV</button>
    <button type="button" class="btn btn-primary btn-second" style="background-color: #d22d65">Đăng tin tuyển dụng</button>
  </div>
  <h1> Việc làm tuyển gấp</h1>
  
<br> <br>
    <section>
             <?php
             
             if (@$_POST['timkiemtheotext'] == "") {
                 $query = mysqli_query($conn, "select COUNT(*) FROM `congviec` ");
                 if ($row = mysqli_fetch_assoc($query)) {
                     echo $row['COUNT(*)'] . " " . "việc làm";
                 }
             ?>
      <article id="slvl">
<!--<table style="width:100%; height:250px; color:white; font-size:15px;color:black;     ">
<tr style=" background:#65bc7b;border-bottom:1px solid black">
<th class="md">Yêu cầu công việc</th>
    <th class="ch"> Tên công ty</th>
    <th>Lương</th>
    <th>Vùng miền</th>
    <th>Địa chỉ</th>
    <th>Ngày đăng</th>
    <th>Chế độ đãi ngộ</th>
            <th>Mô tả công việc</th>
    
    </tr>
    
   <table style="width:100%; height:250px; color:white; font-size:15px;color:black;   >   ">
    <tr style=" background:#65bc7b;border-bottom:1px solid black">
    
    <th class="md">Họ và tên</th>
    <th class="ch"> Hình thức làm việc</th>
    <th>Ngành nghề</th>
    <th>Địa chỉ</th>
    <th>Số năm kinh nghiệm</th>
    <th>Bằng cấp</th>
    <th>Tin học</th>
            <th>Ngoại ngữ</th>
    
    </tr>-->






        <?php

                 $mien = "none";
                 $nguoi = 0;
                 $viec = 0;

                 if (@$_POST['timkiem'] == "search" && @$_POST['location'] == "bac" && @$_POST['object'] == "which" && @$_POST['timkiemtheotext']== "") {
                     $mien = "Miền Bắc";
                     $viec = 1;
                 } elseif (@$_POST['timkiem'] == "search" && @$_POST['location'] == "trung" && @$_POST['object'] == "which" && @$_POST['timkiemtheotext']== "") {
                     $mien = "Miền Trung";
                     $viec = 1;
                 } elseif (@$_POST['timkiem'] == "search" && @$_POST['location'] == "nam" && @$_POST['object'] == "which"&& @$_POST['timkiemtheotext']== "") {
                     $mien = "Miền Nam";
                     $viec = 1;
                 } 
                 elseif (@$_POST['timkiem'] == "search" && @$_POST['location'] == "bac" && @$_POST['object'] == "who"&& @$_POST['timkiemtheotext']== "") {
                     $mien = "Miền Bắc";
                     $nguoi = 1;
                 } elseif (@$_POST['timkiem'] == "search" && @$_POST['location'] == "trung" && @$_POST['object'] == "who"&& @$_POST['timkiemtheotext']== "") {
                     $mien = "Miền Trung";
                     $nguoi = 1;
                 } elseif (@$_POST['timkiem'] == "search" && @$_POST['location'] == "nam" && @$_POST['object'] == "who"&& @$_POST['timkiemtheotext']== "") {
                     $mien = "Miền Nam";
                     $nguoi = 1;
                 }        
                 // Tìm kiếm theo người Ứng tuyển

                 elseif (@$_POST['timkiem'] == "search" && @$_POST['location'] == "whole" && @$_POST['object'] == "who") {
                     $query = mysqli_query($conn, "select * FROM `hosocanhan`");
                     echo '
  
   <table style="width:100%; height:250px; color:white; font-size:15px;color:black;text-align:center; ">
    <tr style=" background:#65bc7b;border-bottom:1px solid black">
    
    <th class="md">Họ và tên</th>
    <th class="ch"> Hình thức làm việc</th>
    <th>Ngành nghề</th>
    <th>Địa chỉ</th>
    <th>Điểm mạnh công việc</th>
    <th>Số năm kinh nghiệm</th>
    <th>Bằng cấp</th>
    <th>Tin học</th>
<th>Ngoại ngữ1</th>
            <th>Năng khiếu</th>
    
    </tr>';
                     while ($row = mysqli_fetch_assoc($query)) {
                         echo '
<tr style=";border-bottom:1px solid black">
<th class="yeucaucongviec">' . $row['HOVATEN'] . '</th>
    <th class="tencongty"> ' . $row['HINHTHUCLAMVIEC'] . '</th>
        <th class="luong">' . $row['NGANHNGHE'] . '</th>
    <th class="vungmien"> ' . $row['DIACHI'] . '</th>
    <th class="vungmien"> ' . $row['DIEMMANHCONGVIEC'] . '</th>
        <th class="diachi"> ' . $row['SONAMKINHNGIEM'] . '</th>
    
        <th class="ngaydang">' . $row['BANGCAP'] . '</th>
    <th class="chedodaingo">' . $row['TINHOC'] . '</th>
    <th class="motacongviec">' . $row['TIENGANH'] . ',' . $row['TIENGNHAT'] . '' . $row['TIENGKHAC'] . '</th>
    <th class="chedodaingo">' . $row['NANGKHIEU'] . '</th>
    </tr>
            
            
    
';
                     }
                 }        // End tìm người ứng tuyển

                 elseif (@$_POST['timkiem'] == "search" && @$_POST['location'] == "whole" && @$_POST['object'] == "which" || @$_POST['location'] == "") {
                     $query = mysqli_query($conn, "select * FROM `congviec`");
                     echo '
<table style="width:100%; height:250px; color:white; font-size:15px;color:black;text-align:center;">
    <tr style=" background:#65bc7b;border-bottom:1px solid black">
    
    <th class="md">Yêu cầu công việc</th>
    <th class="ch"> Tên công ty</th>
    <th>Lương</th>
    <th>Vùng miền</th>
    <th>Địa chỉ</th>
    <th>Ngày đăng</th>
    <th>Chế độ đãi ngộ</th>
            <th>Mô tả công việc</th>
    
    </tr>';
                     while ($row = mysqli_fetch_assoc($query)) {
                         echo '
<tr style="border-bottom:1px solid black">
        <th class="yeucaucongviec">' . $row['YEUCAUCONGVIEC'] . '</th>
    <th class="tencongty">' . $row['TENCONGTY'] . '</th>  
        <th class="luong"> ' . $row['LUONG'] . '</th>
    <th class="vungmien">' . $row['VUNGMIEN'] . '</th>
        <th class="diachi">' . $row['DIACHI'] . '</th>
        <th class="ngaydang">' . $row['NGAYDANG'] . '</th>
    <th class="chedodaingo">' . $row['CHEDODAINGO'] . '</th>
    <th class="motacongviec">' . $row['MOTACONGVIEC'] . '</th>
</tr>
  
';
                     }
                 }

                 if ($viec == 1) {
                     $query = mysqli_query($conn, 'SELECT * FROM `congviec` WHERE `VUNGMIEN`="' . $mien . '"');
                     echo '
<table style="width:100%; height:150px; color:white; font-size:15px;color:black;   >   ">
    <tr style=" background:#65bc7b;border-bottom:1px solid black">
    
    <th class="md">Yêu cầu công việc</th>
    <th class="ch"> Tên công ty</th>
    <th>Lương</th>
    <th>Vùng miền</th>
    <th>Địa chỉ</th>
    <th>Ngày đăng</th>
    <th>Chế độ đãi ngộ</th>
            <th>Mô tả công việc</th>
    
    </tr>';
while ($row = mysqli_fetch_assoc($query)) {
                         echo '
<tr style=" border-bottom:1px solid black">
        <th class="yeucaucongviec">' . $row['YEUCAUCONGVIEC'] . '</th>
<th class="tencongty">' . $row['TENCONGTY'] . '</th>
<th class="luong"> ' . $row['LUONG'] . '</th>
    <th class="vungmien">' . $row['VUNGMIEN'] . '</a></th>
        <th class="diachi">' . $row['DIACHI'] . '</th>
        <th class="ngaydang">' . $row['NGAYDANG'] . '</th>
    <th class="chedodaingo">' . $row['CHEDODAINGO'] . '</th>
    <th class="motacongviec">' . $row['MOTACONGVIEC'] . '</th>
</tr>
    
';
                     }
                 }

                 if ($nguoi == 1) {
                     $query = mysqli_query($conn, 'SELECT * FROM `hosocanhan` WHERE `DIACHI`="' . $mien . '"');
                     echo '
                  
  
                     <table style="width:100%; height:250px; color:white; font-size:15px;color:black;text-align:center; ">
                     <tr style=" background:#65bc7b;border-bottom:1px solid black">
                     
                     <th class="md">Họ và tên</th>
                     <th class="ch"> Hình thức làm việc</th>
                     <th>Ngành nghề</th>
                     <th>Địa chỉ</th>
                     <th>Điểm mạnh công việc</th>
                     <th>Số năm kinh nghiệm</th>
                     <th>Bằng cấp</th>
                     <th>Tin học</th>
                 
                             <th>Ngoại ngữ1</th>
                             <th>Năng khiếu</th>
                     
                     </tr>';
                     while ($row = mysqli_fetch_assoc($query)) {
                         echo '
                   
                                 
                 <tr style=";border-bottom:1px solid black">
                         <th class="yeucaucongviec">' . $row['HOVATEN'] . '</th>
                     <th class="tencongty"> ' . $row['HINHTHUCLAMVIEC'] . '</th>
                         <th class="luong">' . $row['NGANHNGHE'] . '</th>
                     <th class="vungmien"> ' . $row['DIACHI'] . '</th>
                     <th class="vungmien"> ' . $row['DIEMMANHCONGVIEC'] . '</th>
                         <th class="diachi"> ' . $row['SONAMKINHNGIEM'] . '</th>
                     
                         <th class="ngaydang">' . $row['BANGCAP'] . '</th>
                     <th class="chedodaingo">' . $row['TINHOC'] . '</th>
                     <th class="motacongviec">' . $row['TIENGANH'] . ',' . $row['TIENGNHAT'] . '' . $row['TIENGKHAC'] . '</th>
                     <th class="chedodaingo">' . $row['NANGKHIEU'] . '</th>
                     </tr>
                             
                             
                     
                 ';
                     }
                 }
             }
             
             // TÌM KIẾM CÔNG VIỆC NHẬP VÀO
if (@$_POST['timkiemtheotext'] != ""  && @$_POST['object'] == "whom" ) {
                 $sl = 0;
$query = mysqli_query($conn, 'SELECT *, COUNT(*) FROM `congviec` WHERE `TENCONGTY` LIKE "%' . @$_POST['timkiemtheotext'] . '%" OR `YEUCAUCONGVIEC` LIKE "%' . @$_POST['timkiemtheotext'] . '%"OR `DIACHI` LIKE "%' . @$_POST['timkiemtheotext'] . '%"OR `VUNGMIEN` LIKE "%' . @$_POST['timkiemtheotext'] . '%"OR `MOTACONGVIEC` LIKE "%' . @$_POST['timkiemtheotext'] . '%"OR `NGAYDANG` LIKE "%' . @$_POST['timkiemtheotext'] . '%"OR `CHEDODAINGO` LIKE "%' . @$_POST['timkiemtheotext'] . '%"');
                 while ($row = mysqli_fetch_assoc($query)) {
                     
                     $sl = @$row['COUNT(*)'];
                 }
                 if(@$sl == 0) {
                     echo '<script language="javascript">';
                     echo 'alert("Không tìm thấy")';
                     echo '</script>';
                      header('Refresh: 1; url=index.php');
                 }
            
                 if ($sl > 0) {
                     $query = mysqli_query($conn, 'SELECT *, COUNT(*) FROM `congviec` WHERE `TENCONGTY` LIKE "%' . @$_POST['timkiemtheotext'] . '%" OR `YEUCAUCONGVIEC` LIKE "%' . @$_POST['timkiemtheotext'] . '%"OR `DIACHI` LIKE "%' . @$_POST['timkiemtheotext'] . '%"OR `VUNGMIEN` LIKE "%' . @$_POST['timkiemtheotext'] . '%"OR `MOTACONGVIEC` LIKE "%' . @$_POST['timkiemtheotext'] . '%"OR `NGAYDANG` LIKE "%' . @$_POST['timkiemtheotext'] . '%"OR `CHEDODAINGO` LIKE "%' . @$_POST['timkiemtheotext'] . '%"');
                     echo '
  <table style="width:100%; height:150px; color:white; font-size:15px;color:black;   >   ">
    <tr style=" background:#65bc7b;border-bottom:1px solid black">
    
    <th class="md">Yêu cầu công việc</th>
    <th class="ch"> Tên công ty</th>
    <th>Lương</th>
    <th>Vùng miền</th>
    <th>Địa chỉ</th>
    <th>Ngày đăng</th>
    <th>Chế độ đãi ngộ</th>
            <th>Mô tả công việc</th>
    
    </tr>';
                     while ($row = mysqli_fetch_assoc($query)) {
                         echo '
<tr style=" border-bottom:1px solid black">
        <th class="yeucaucongviec">' . $row['YEUCAUCONGVIEC'] . '</th>
    <th class="tencongty">' . $row['TENCONGTY'] . '</th>
<th class="luong"> ' . $row['LUONG'] . '</th>
    <th class="vungmien">' . $row['VUNGMIEN'] . '</a></th>
        <th class="diachi">' . $row['DIACHI'] . '</th>
        <th class="ngaydang">' . $row['NGAYDANG'] . '</th>
    <th class="chedodaingo">' . $row['CHEDODAINGO'] . '</th>
    <th class="motacongviec">' . $row['MOTACONGVIEC'] . '</th>
</tr>
    
';
                     }
                 }
             }
             
             




             // TÌM KIẾM NGƯỜI NỘP ĐƠN
             
             if (@$_POST['timkiemtheotext'] != "" && @$_POST['object'] == "who" ) {
                 $sl = 0;
$query1 = mysqli_query($conn, 'SELECT *, COUNT(*) FROM `hosocanhan` WHERE `HOVATEN` LIKE "%' . @$_POST['timkiemtheotext'] . '%" OR `DIACHI` LIKE "%' . @$_POST['timkiemtheotext'] . '%" OR`NGAYSINH` LIKE "%' . @$_POST['timkiemtheotext'] . '%" OR`NGANHNGHE` LIKE "%' . @$_POST['timkiemtheotext'] . '%" OR`DIEMMANHCONGVIEC` LIKE "%' . @$_POST['timkiemtheotext'] . '%" OR`HINHTHUCLAMVIEC` LIKE "%' . @$_POST['timkiemtheotext'] . '%" OR`SONAMKINHNGIEM` LIKE "%' . @$_POST['timkiemtheotext'] . '%" OR`BANGCAP` LIKE "%' . @$_POST['timkiemtheotext'] . '%" OR`TINHOC` LIKE "%' . @$_POST['timkiemtheotext'] . '%" OR`TIENGANH` LIKE "%' . @$_POST['timkiemtheotext'] . '%" OR`TIENGNHAT` LIKE "%' . @$_POST['timkiemtheotext'] . '%" OR`TIENGKHAC` LIKE "%' . @$_POST['timkiemtheotext'] . '%" OR `NANGKHIEU` LIKE "%' . @$_POST['timkiemtheotext'] . '%"');
                 while ($row = mysqli_fetch_assoc($query1)) {
                     
                     $sl = @$row['COUNT(*)'];
                 }
                 if(@$sl == 0) {
                     echo '<script language="javascript">';
                     echo 'alert("Không tìm thấy")';
                     echo '</script>';
                     header('Refresh: 1; url=index.php');
                 }
                 
                 if ($sl > 0) {
                $query1 = mysqli_query($conn, 'SELECT *, COUNT(*) FROM `hosocanhan` WHERE `HOVATEN` LIKE "%' . @$_POST['timkiemtheotext'] . '%" OR `DIACHI` LIKE "%' . @$_POST['timkiemtheotext'] . '%" OR`NGAYSINH` LIKE "%' . @$_POST['timkiemtheotext'] . '%" OR`NGANHNGHE` LIKE "%' . @$_POST['timkiemtheotext'] . '%" OR`DIEMMANHCONGVIEC` LIKE "%' . @$_POST['timkiemtheotext'] . '%" OR`HINHTHUCLAMVIEC` LIKE "%' . @$_POST['timkiemtheotext'] . '%" OR`SONAMKINHNGIEM` LIKE "%' . @$_POST['timkiemtheotext'] . '%" OR`BANGCAP` LIKE "%' . @$_POST['timkiemtheotext'] . '%" OR`TINHOC` LIKE "%' . @$_POST['timkiemtheotext'] . '%" OR`TIENGANH` LIKE "%' . @$_POST['timkiemtheotext'] . '%" OR`TIENGNHAT` LIKE "%' . @$_POST['timkiemtheotext'] . '%" OR`TIENGKHAC` LIKE "%' . @$_POST['timkiemtheotext'] . '%" OR `NANGKHIEU` LIKE "%' . @$_POST['timkiemtheotext'] . '%"');
                     echo '
              <table style="width:100%; height:250px; color:white; font-size:15px;color:black;text-align:center; ">
                     <tr style=" background:#65bc7b;border-bottom:1px solid black">
                     
                     <th class="md">Họ và tên</th>
                     <th class="ch"> Hình thức làm việc</th>
                     <th>Ngành nghề</th>
                     <th>Địa chỉ</th>
                     <th>Điểm mạnh công việc</th>
                     <th>Số năm kinh nghiệm</th>
                     <th>Bằng cấp</th>
                     <th>Tin học</th>
                 
                             <th>Ngoại ngữ1</th>
                             <th>Năng khiếu</th>
                     
                     </tr>';
while ($row = mysqli_fetch_assoc($query1)) {
echo '
                   
                                 
                 <tr style=";border-bottom:1px solid black">
                         <th class="yeucaucongviec">' . $row['HOVATEN'] . '</th>
                     <th class="tencongty"> ' . $row['HINHTHUCLAMVIEC'] . '</th>
                         <th class="luong">' . $row['NGANHNGHE'] . '</th>
                     <th class="vungmien"> ' . $row['DIACHI'] . '</th>
                     <th class="vungmien"> ' . $row['DIEMMANHCONGVIEC'] . '</th>
                         <th class="diachi"> ' . $row['SONAMKINHNGIEM'] . '</th>
                     
                         <th class="ngaydang">' . $row['BANGCAP'] . '</th>
                     <th class="chedodaingo">' . $row['TINHOC'] . '</th>
                     <th class="motacongviec">' . $row['TIENGANH'] . ',' . $row['TIENGNHAT'] . '' . $row['TIENGKHAC'] . '</th>
                     <th class="chedodaingo">' . $row['NANGKHIEU'] . '</th>
                     </tr>
                             
                             
                     
                 ';
                     }
                 }
             }
             
        ?>
          </table>
     </article>

  <?php include 'inc/footer.php'; ?>
</form>