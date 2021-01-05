function Tim_san_pham_theo_chu_de()
{
	
	var r=document.getElementsByName("chu_de");
	var g=document.getElementsByName("chiet_khau");
	var e=document.getElementsByName("huong_vi");
	gtChu_de="";
	for(i=0;i <g.length;i++)
	{
		if(g.item(i).checked)
		{
			g.item(i).checked=false;
			break;	
		}	
	}
	for(i=0;i <e.length;i++)
	{
		if(e.item(i).checked)
		{
			e.item(i).checked=false;
			break;	
		}	
	}
	for(i=0;i <r.length;i++)
	{
		if(r.item(i).checked)
		{
			gtChu_de=r.item(i).value;
			break;	
		}	
	}
	var xmlhttp=null;
	if (window.XMLHttpRequest)
	{
		xmlhttp=new XMLHttpRequest();
		
	}
	else
	{
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  
	}
	xmlhttp.open("POST","XL_tim_san_pham.php",true);
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("hienthi").innerHTML=xmlhttp.responseText;
		}
	}

	var data = new FormData();
	data.append('gtChu_de',gtChu_de);
	xmlhttp.send(data);
}

function Tim_san_pham_theo_khuyen_mai()
{
	
	var r=document.getElementsByName("chiet_khau");
	var g=document.getElementsByName("chu_de");
	var e=document.getElementsByName("huong_vi");
	gtChiet_khau="";
	for(i=0;i <g.length;i++)
	{
		if(g.item(i).checked)
		{
			g.item(i).checked=false;
			break;	
		}	
	}
	for(i=0;i <e.length;i++)
	{
		if(e.item(i).checked)
		{
			e.item(i).checked=false;
			break;	
		}	
	}
	for(i=0;i <r.length;i++)
	{
		if(r.item(i).checked)
		{
			gtChiet_khau=r.item(i).value;
			break;	
		}	
	}
	var xmlhttp=null;
	if (window.XMLHttpRequest)
	{
		xmlhttp=new XMLHttpRequest();
		
	}
	else
	{
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  
	}
	xmlhttp.open("POST","XL_tim_theo_khuyen_mai.php",true);
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("hienthi").innerHTML=xmlhttp.responseText;
		}
	}

	var data = new FormData();
	data.append('gtChiet_khau',gtChiet_khau);
	xmlhttp.send(data);
}

function Tim_san_pham_theo_huong_vi()
{
	
	var r=document.getElementsByName("huong_vi");
	var g=document.getElementsByName("chu_de");
	var e=document.getElementsByName("chiet_khau");
	gtHuong_vi="";
	for(i=0;i <g.length;i++)
	{
		if(g.item(i).checked)
		{
			g.item(i).checked=false;
			break;	
		}	
	}
	for(i=0;i <e.length;i++)
	{
		if(e.item(i).checked)
		{
			e.item(i).checked=false;
			break;	
		}	
	}
	for(i=0;i <r.length;i++)
	{
		if(r.item(i).checked)
		{
			gtHuong_vi=r.item(i).value;
			break;	
		}	
	}
	var xmlhttp=null;
	if (window.XMLHttpRequest)
	{
		xmlhttp=new XMLHttpRequest();
		
	}
	else
	{
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  
	}
	xmlhttp.open("POST","XL_tim_theo_huong_vi.php",true);
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("hienthi").innerHTML=xmlhttp.responseText;
		}
	}

	var data = new FormData();
	data.append('gtHuong_vi',gtHuong_vi);
	xmlhttp.send(data);
}


function Doc_tin_tuc(ma_tin_tuc)
{
	var xmlhttp=null;
	
	if (window.XMLHttpRequest)
	{
		xmlhttp=new XMLHttpRequest();
		
	}
	else
	{
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  
	}
	xmlhttp.open("POST","XL_Tin_tuc.php",true);
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("hienthi").innerHTML=xmlhttp.responseText;
		}
	}

	var data = new FormData();
	data.append('ma_tin', ma_tin_tuc);
	xmlhttp.send(data);

}

function chonmua(id)
{
	if(kiemtra(id))
	{
		var sl=document.getElementById("sl_" + id).value;
		// Chuyển trang lưu session
		window.location="chon_mua.php?id=" + id + "&sl=" + sl;
	}
	
	
}

function kiemtra(id)
{
	var sl="sl_"+ id;
	var soluong=document.getElementById(sl);
	if(soluong.value=="" || parseInt(soluong.value)<=0 || isNaN(soluong.value) || parseInt(soluong.value)!=Number(soluong.value) )
	{
		alert("Nhập số lượng >0");
		// soluong.focus();
		// soluong.select();
		return false;	
	} 
	return true;
}
function hoixoa(id)
{
	if(confirm('Bạn xóa sản phẩm' + id ))
	{
		window.location="xoa_gio_hang.php?id=" + id;	
	}	
}