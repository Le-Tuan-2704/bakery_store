<?php
include_once("models/database.php");
$sql = "SELECT *,chiet_khau from bk_san_pham sp inner join bk_khuyen_mai km on sp.ma_khuyen_mai=km.ma_khuyen_mai ";
$db = new database();

$san_pham = $db->pdo_query($sql, []);
$tongsl = 0;
$tongDg = 0;
if (isset($_SESSION["giohang"])) {
  // $tongsl = count($_SESSION["giohang"]);
  foreach ($_SESSION["giohang"] as $k => $sl) {

    foreach ($san_pham as $sp) {
      if ($k == $sp->ma_san_pham) {
        $tongDg += $sl * ($sp->don_gia - ($sp->don_gia * $sp->chiet_khau / 100));
        $tongsl += $sl;
      }
    }
  }
}
?>
<div class="product-model">
  <div class="container">
    <ol class="breadcrumb">
      <li><a href="index.php">Trang chủ</a></li>
      <li class="active">Sản phẩm</li>
    </ol>

    <p align="right">Giỏ hàng của bạn:(<?php echo "$tongsl sản phẩm - Tổng thành tiền: " . number_format($tongDg) . " đồng" ?> )
      <?php
      if (isset($_SESSION["giohang"])) {
      ?>
        | <a href="gio_hang.php">Xem Giỏ Hàng</a> | <a href="xoa_gio_hang.php">Xóa Giỏ Hàng</a></p>
  <?php
      }
  ?>

  <div class="col-md-9 product-model-sec" id="hienthi">
    <h2>Tất cả sản phẩm</h2>
    <?php
    foreach ($san_phams as $row) {
    ?>
      <div class="product-grid">
        <a href="chitiet_sp.php?ma_san_pham=<?php echo $row->ma_san_pham; ?>">
          <div class="more-product"><span> </span></div>
          <div class="product-img b-link-stripe b-animate-go"> <img src="public/images/<?php echo $row->hinh_anh; ?>" class="img-responsive" alt="">
            <div class="b-wrapper">
              <h4 class="b-animate b-from-left  b-delay03">
                <button><span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>Xem thêm</button>
              </h4>
            </div>
          </div>
        </a>
        <div class="product-info simpleCart_shelfItem">
          <div class="product-info-cust prt_name">
            <span class="item_price" style="width:150px;height:30px"><?php echo $row->ten_san_pham; ?></span>
            <span class="item_price" style="color: #f00"><?php echo number_format($row->don_gia - ($row->don_gia * $row->chiet_khau / 100)); ?>&nbsp;đồng</span>
            <div class="ofr">
              <?php
              if ($row->chiet_khau != 0) {
              ?>
                <p class="pric1"><del><?php echo number_format($row->don_gia); ?>&nbsp;đồng</del></p>
                <p class="disc">[<?php echo $row->chiet_khau; ?>% Off]</p>
              <?php
              } else {
              ?>
                <p class="pric1">&nbsp;</p>
                <p class="disc">&nbsp;</p>
              <?php
              }
              ?>
            </div>
            <input type="text" class="item_quantity" value="1" name="sl_<?php echo $row->ma_san_pham ?>" id="sl_<?php echo $row->ma_san_pham ?>" />
            <a href="javascript:void(0)"><input type="button" class="item_add items" value="Thêm" onclick="chonmua(<?php echo $row->ma_san_pham ?>)"></a>
            <div class="clearfix"> </div>
          </div>
        </div>
      </div>
    <?php
    }
    ?>
    <!-- danh sach -->
    <div style="clear:both; text-align:center"><?php echo $lst ?></div>
  </div>

  <div class="rsidebar span_1_of_left">

    <section class="sky-form">
      <div class="product_right">
        <h4><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>Danh mục sản phẩm</h4>
        <div>
          <?php
          foreach ($chu_de as $row) {
          ?>
            <label class="radio">
              <input type="radio" name="chu_de" value="<?php echo $row->ma_chu_de ?>" onclick="Tim_san_pham_theo_chu_de()"><?php echo $row->ten_chu_de ?></label>
          <?php
          }
          ?>
        </div>
      </div>
    </section>

    <section class="sky-form">
      <div class="product_right">
        <h4><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>Giảm giá</h4>
        <div>
          <?php
          foreach ($khuyen_mai as $row) {
          ?>
            <label class="radio">
              <input type="radio" name="chiet_khau" value="<?php echo $row->chiet_khau ?>" onclick="Tim_san_pham_theo_khuyen_mai()">
              <?php echo $row->chiet_khau ?></label>
          <?php
          }
          ?>
        </div>
      </div>
    </section>

    <section class="sky-form">
      <div class="product_right">
        <h4><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>Hương vị</h4>
        <div>
          <?php
          foreach ($huong_vi as $row) {
          ?>
            <label class="radio">
              <input type="radio" name="huong_vi" onclick="Tim_san_pham_theo_huong_vi()" value="<?php echo $row->ten_huong_vi ?>">
              <?php echo $row->ten_huong_vi; ?></label>
          <?php
          }
          ?>
        </div>
      </div>
    </section>
    
  </div>
  </div>
</div>