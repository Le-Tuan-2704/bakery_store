<?php
include("models/m_san_pham.php");
$gtChiet_khau=$_POST["gtChiet_khau"];
$m_khuyen_mai=new M_san_pham();
$khuyen_mais=$m_khuyen_mai->Tim_san_pham_theo_khuyen_mai($gtChiet_khau);
?>
<div class="row">
      <?php
        foreach($khuyen_mais as $row)
        {
      ?>
      <div class="col-md-4 mb-4">
            <div class="card">
                <a href="chitiet_sp.php?ma_san_pham=<?php echo $row->ma_san_pham; ?>">
                    <img class="card-img-top" src="public/images/<?php echo $row->hinh_anh; ?>" alt="<?php echo $row->ten_san_pham; ?>">
                </a>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row->ten_san_pham; ?></h5>
                    <span class="item_price"><?php echo number_format($row->don_gia - ($row->don_gia * $row->chiet_khau / 100)); ?>&nbsp;đồng</span>
                    <div class="ofr">
                        <?php if ($row->chiet_khau != 0) : ?>
                            <p class="pric1"><del><?php echo number_format($row->don_gia); ?>&nbsp;đồng</del></p>
                            <p class="disc">[<?php echo $row->chiet_khau; ?>% Off]</p>
                        <?php else : ?>
                            <p class="pric1">&nbsp;</p>
                            <p class="disc">&nbsp;</p>
                        <?php endif; ?>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="form-group mb-0">
                            <input type="number" class="form-control item_quantity" value="1" name="sl_<?php echo $row->ma_san_pham ?>" id="sl_<?php echo $row->ma_san_pham ?>" />
                        </div>
                        <a href="javascript:void(0)" class="btn btn-primary item_add items" onclick="chonmua(<?php echo $row->ma_san_pham ?>)"><i class="fas fa-shopping-cart"></i></a>
                    </div>
                </div>
            </div>
        </div>
      <?php
			}
		 ?>
     </div>
     