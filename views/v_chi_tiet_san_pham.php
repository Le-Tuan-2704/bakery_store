<div class="product">
	 <div class="container">				
		 <div class="product-price1">
			 <div class="top-sing">
				  <div class="col-md-7 single-top">	
					 <div>
							  <ul class="slides">
								<li style="list-style-type:none">
									<div class="thumb-image"> <img src="public/images/<?php echo $chi_tiet->hinh_anh; ?>" data-imagezoom="true" class="img-responsive" alt=""/> </div>
								</li>
							  </ul>
						</div>					 					 
					 <script src="public/js/imagezoom.js"></script>
						<script>
						$(window).load(function() {
						  $('.flexslider').flexslider({
							animation: "slide",
							controlNav: "thumbnails"
						  });
						});
						</script>

				 </div>	
			     <div class="col-md-5 single-top-in simpleCart_shelfItem">
					  <div class="single-para ">
						 <h4><?php echo $chi_tiet->ten_san_pham; ?></h4>							
							<h5 class="item_price" ><del style="color: #DEDEDE"><?php echo number_format($chi_tiet->don_gia); ?>&nbsp;đồng</del>&nbsp;<?php echo number_format($chi_tiet->don_gia-($chi_tiet->don_gia*$chi_tiet->chiet_khau/100)); ?>&nbsp;đồng</h5>							
							<p class="para"><?php echo $chi_tiet->noi_dung_chi_tiet; ?></p>
							<div class="prdt-info-grid">
								 <ul>
									 <li>- Loại Sản phẩm : <?php echo $chi_tiet->ten_chu_de; ?></li>
									 <li>- Hương vị : <?php echo $chi_tiet->ten_huong_vi; ?></li>
									 <li>- Chiết khấu :  <?php echo $chi_tiet->chiet_khau; ?>%</li>
								 </ul>
							</div>
                                        <input type="text" class="item_quantity" value="1" name="sl_<?php echo $chi_tiet->ma_san_pham ?>" id="sl_<?php echo $chi_tiet->ma_san_pham ?>" style="width:80px"/>
							<a href="javascript:void(0)"><input type="button" class="item_add items" value="Thêm vào giỏ hàng" onclick="chonmua(<?php echo $chi_tiet->ma_san_pham ?>)" ></a>							
					 </div>
				 </div>
				 <div class="clearfix"> </div>
			 </div>
	     </div>
	 </div>
</div>