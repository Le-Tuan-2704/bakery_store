<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Tạo mới đơn hàng</title>
        <!-- Bootstrap core CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <!-- Bootstrap JS, Popper.js, and jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $('input[type=radio][name=optradio]').change( function() {
                    if (this.value == 'cashOption') {
                        $('#paymentDetails').hide();
                        $('#thanh_toan').show();
                    }
                    else if (this.value == 'vnPayOption') {
                        $('#paymentDetails').show();
                        $('#thanh_toan').hide();
                    }

                });
            });
        </script>

        <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .hidden {
            display: none;
        }
    </style>
    </head>

    <body>
        <?php 
        
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        /*
        * To change this license header, choose License Headers in Project Properties.
        * To change this template file, choose Tools | Templates
        * and open the template in the editor.
        */
        
        $vnp_TmnCode = "IUS8WS2E"; //Mã định danh merchant kết nối (Terminal Id)
        $vnp_HashSecret = "KYFYXKHYWQCEYKRRLUMCPWJAGNNZUPMD"; //Secret key
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost/bakery_store/vnpay_return.php";
        $vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
        $apiUrl = "https://sandbox.vnpayment.vn/merchant_webapi/api/transaction";
        //Config input format
        //Expire
        $startTime = date("YmdHis");
        $expire = date('YmdHis',strtotime('+15 minutes',strtotime($startTime)));

        ?>             
        <div class="container">
        <div>
            <h2>Phương thức thanh toán</h2>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="optradio" id="cashOption" value="cashOption" checked>Thanh toán khi nhận hàng
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="optradio" id="vnPayOption" value="vnPayOption">Thanh toán qua VN Pay
                </label>
            </div>
            <form action="don_hang" method="post">
                <input type="hidden" name="action" value="thanh_toan">
                <button type="submit" class="btn btn-primary btn-block" id="thanh_toan">Thanh toán</button>
            </form>
        </div>
        <div id="paymentDetails" class="hidden">
            <h3 class="text-center">Thanh toán qua VN pay</h3>

            <div class="table-responsive">
                <form action="/bakery_store/vnpay_create_payment.php" id="frmCreateOrder" method="post">
                    <input class="form-control" id="amount" name="amount" type="hidden" value="<?php if(isset($_GET['amount'])){echo $_GET['amount'];} ?>" />
                    <input class="form-control" id="order_id" name="order_id" type="hidden" value="<?php if(isset($_GET['order_id'])){echo str_pad($_GET['order_id'], 8, 'Q', STR_PAD_LEFT);} ?>"/>
                    <input class="form-control" id="order_desc" name="order_desc" type="hidden" value="<?php if(isset($_GET['order_desc'])){echo $_GET['order_desc'];} ?>"/>
                    <div class="form-group">
                        <label for="amount">Số tiền</label>
                        <input class="form-control"type="number" value="<?php if(isset($_GET['amount'])){echo $_GET['amount'];} ?>" disabled/>
                    </div>
                    <div class="form-group">
                        <label for="order_id">Mã đơn hàng</label>
                        <input class="form-control" type="text" value="<?php if(isset($_GET['order_id'])){echo str_pad($_GET['order_id'], 8, 'Q', STR_PAD_LEFT);} ?>" disabled/>
                    </div>
                    <div class="form-group">
                        <label for="order_desc">Nội dung thanh toán</label>
                        <input class="form-control" type="text" value="<?php if(isset($_GET['order_desc'])){echo $_GET['order_desc'];} ?>" disabled/>
                    </div>

                    <h4>Chọn phương thức thanh toán</h4>
                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="vnpayQR" name="bankCode" value="">
                            <label class="custom-control-label" for="vnpayQR">Cổng thanh toán VNPAYQR</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="vnpayApp" name="bankCode" value="VNPAYQR">
                            <label class="custom-control-label" for="vnpayApp">Thanh toán bằng ứng dụng hỗ trợ VNPAYQR</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="vnBank" name="bankCode" value="VNBANK">
                            <label class="custom-control-label" for="vnBank">Thanh toán qua thẻ ATM/Tài khoản nội địa</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="intCard" name="bankCode" value="INTCARD">
                            <label class="custom-control-label" for="intCard">Thanh toán qua thẻ quốc tế</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <h5>Chọn ngôn ngữ giao diện thanh toán:</h5>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="vnLang" name="language" value="vn" checked>
                            <label class="custom-control-label" for="vnLang">Tiếng Việt</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="enLang" name="language" value="en">
                            <label class="custom-control-label" for="enLang">Tiếng Anh</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Thanh toán</button>
                </form>
            </div>
        </div>
    </div>
    </body>

    
</html>
