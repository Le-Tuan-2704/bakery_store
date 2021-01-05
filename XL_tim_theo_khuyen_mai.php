<?php
include("models/m_san_pham.php");
$gtChiet_khau=$_POST["gtChiet_khau"];
$m_khuyen_mai=new M_san_pham();
$khuyen_mais=$m_khuyen_mai->Tim_san_pham_theo_khuyen_mai($gtChiet_khau);
echo $gtChiet_khau;
?>
      <?php
      foreach($khuyen_mais as $row)
	  {
	  ?>
      <div class="product-grid"> <a href="chitiet_sp.php?ma_san_pham=<?php echo $row->ma_san_pham;?>">
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
          <div class="product-info-cust prt_name"> <span class="item_price" style="width:150px;height:30px"><?php echo $row->ten_san_pham; ?></span> <span class="item_price" style="color: #f00"><?php echo number_format($row->don_gia-($row->don_gia *$row->chiet_khau/100)); ?>&nbsp;đồng</span>
            <div class="ofr">
              <?php
			  if($row->chiet_khau!=0)
			  {
			  ?>
              <p class="pric1"><del><?php echo number_format($row->don_gia); ?>&nbsp;đồng</del></p>
              <p class="disc">[<?php echo $row->chiet_khau; ?>% Off]</p>
              <?php
						 		}
								else
								{
						 	?>
              <p  class="pric1">&nbsp;</p>
              <p class="disc">&nbsp;</p>
              <?php
								}
								?>
            </div>
            <input type="text" class="item_quantity" value="1" />
            <input type="button" class="item_add items" value="Thêm">
            <div class="clearfix"> </div>
          </div>
        </div>
      </div>
      <?php
			}
		 ?>
     