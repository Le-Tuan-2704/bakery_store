// JavaScript Document
function isEmail(email) 
{   
          var isValid = false;   
           var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;   
            if(regex.test(email)) {   
                isValid = true;   
           }   
            return isValid;   
}
function kiemtralienhe()
{
	if(document.getElementById("th_hoten").value=='')
	{
		alert('Nhập họ tên của bạn');
		document.getElementById("th_hoten").focus();
		return false;	
	}
	if(document.getElementById("th_email").value=='')
	{
		alert('Nhập Email của bạn');
		document.getElementById("th_email").focus();
		return false;	
	}
	var email = document.getElementById("th_email").value;   
	 if(!isEmail(email)) 
	 {   
			alert(email + ' là một địa chỉ email sai');       
			document.getElementById("th_email").focus();
			return false;
	 } 
	
	if(document.getElementById("th_chude").value=='')
	{
		alert('Nhập Tiêu đề');
		document.getElementById("th_chude").focus();
		return false;	
	}
	if(document.getElementById("th_noidung").value=='')
	{
		alert('Nhập nội dung');
		document.getElementById("th_noidung").focus();
		return false;	
	}
	if(document.getElementById('security_code').value=='')
	{
		alert('Nhập mã bảo vệ');
		document.getElementById('security_code').focus();
		return false;	
	}

	return true;	
}