<?php
/* @var $this ProductController */
/* @var $categoryData CActiveDataProvider */

?>
<table width="100%">
	<tr>
		<td></td>
		<td width="90%" height="48px" 
			style="vertical-align:top;background:url(<?php echo Yii::app()->request->baseUrl; ?>/images/menu_bg.png) repeat-x;color: #FFF;font-size:1.3em;">
			<table height="21px">
				<tr>
					<td id="cateall" height="38px" width="87px" style="text-align:center;">
						<a href="javascript:void(getProduct('all'))" >全部</a> 
					</td>
					<td width="10px"></td>
			<?php 
				$categorys = $categoryData->getData();
				foreach( $categorys as $cate){
					echo "<td id=\"cate".$cate->id."\" style=\"text-align:center;\" height=\"38px\" width=\"87px\" ><a href=\"javascript:void(getProduct(".$cate->id."))\" >".$cate->name."</a></td><td width=\"10px\"></td>";
				}
			?>
				</tr>
			</table>
		</td>
		<td></td>
	</tr>
</table>
<table width="100%" height="500px">
	<tr>
		<td width="19px" height="19px" style="background:url(<?php echo Yii::app()->request->baseUrl; ?>/images/content_lt.png) no-repeat;"></td>
		<td width="890px" style="background:url(<?php echo Yii::app()->request->baseUrl; ?>/images/content_t.png) repeat-x;"></td>
		<td width="19px" style="background:url(<?php echo Yii::app()->request->baseUrl; ?>/images/content_rt.png) no-repeat;"></td>
	</tr>
	<tr>
		<td width="19px" height="462px" style="background:url(<?php echo Yii::app()->request->baseUrl; ?>/images/content_left.png) repeat-y;"></td>
		<td width="890px" valign="top">
			<table width="890px"> 
				<tr>
					<td id="productContent" style="vertical-align:top;width:690px;height:462px;"></td>
					<td style="vertical-align:top;width:200px;height:462px;">
						<table widht="200px" height="462px">
							<tr>
								<td style="width:200px;height:32px;background:url(<?php echo Yii::app()->request->baseUrl; ?>/images/order_title.png) repeat-x;color:#FFB;font-size:1.5em;text-align:center;">已选商品</td>
							</tr>
							<tr>
								<td id="orderContent" style="vertical-align:top;color:#FFF;width:200px;height:410px;background:url(<?php echo Yii::app()->request->baseUrl; ?>/images/order_content.png) repeat;">
								</td>
							</tr>
							<tr>
								<td style="text-align:center;width:200px;height:20px;background:url(<?php echo Yii::app()->request->baseUrl; ?>/images/order_content.png) repeat;">
									<input type="button" value="结  账" onClick="bill()" style="cursor:pointer;width:84px;height:31px;border:0;font-size:1em;color:#FFF;background:url(<?php echo Yii::app()->request->baseUrl; ?>/images/button_green.png);"></input>
									<input type="button" value="清  空" onClick="qingkong()" style="cursor:pointer;width:84px;height:31px;border:0;font-size:1em;color:#FFF;background:url(<?php echo Yii::app()->request->baseUrl; ?>/images/button_red.png);"></input>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
		<td width="19px" style="background:url(<?php echo Yii::app()->request->baseUrl; ?>/images/content_right.png) repeat-y;"></td>
	</tr>
		<tr>
		<td width="19px" height="19px" style="background:url(<?php echo Yii::app()->request->baseUrl; ?>/images/content_lb.png) no-repeat;"></td>
		<td width="890px" style="background:url(<?php echo Yii::app()->request->baseUrl; ?>/images/content_bottom.png) repeat-x;"></td>
		<td width="19px" style="background:url(<?php echo Yii::app()->request->baseUrl; ?>/images/content_rb.png) no-repeat;"></td>
	</tr>
</table>

<script type="text/javascript">
$(document).ready(function () {
  getProduct('all');
});

var currentCategory = 'all';
var order = [];

var getProduct = function(cate){
	document.getElementById("cate"+currentCategory).style.background='none';
	document.getElementById("cate"+cate).style.background='url(<?php echo Yii::app()->request->baseUrl; ?>/images/button_selected.png) no-repeat center center';
	currentCategory = cate;
	jQuery.ajax({
        url: "<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=product/productAjax",
        type: "POST",
        data: {'category': cate},  
        error: function(xhr,tStatus,e){
            if(!xhr){
                alert(" We have an error ");
                alert(tStatus+"   "+e.message);
            }else{
                alert("else: "+e.message); 
            }
            },
        success: function(resp){
            buildProduct(resp);
            }
        });
};
var buildProduct = function(data){
	var domText = "<table width=\"690px\">";
	var imgUrl = "<?php echo Yii::app()->request->baseUrl; ?>/images/";
	var productImgUrl = "<?php echo Yii::app()->request->baseUrl; ?>/pic/";

	for(var index in data){
		var item = data[index];
		if(index%2 == 0){
			domText += "<tr>";
		}
		domText += ("<td width=\"345px\" align=\"center\">"+

			"<table width=\"340px\">"+
				"<tr>"+
					"<td width=\"140px\" height=\"140px\">"+
						"<img width=\"140px\" height=\"140px\" src=\""+productImgUrl+item.pic+"\"></img>"+
					"</td>"+

					"<td width=\"100px\">"+
						"<table width=\"100px\" height=\"140px\">"+
							"<tr>"+
								"<td style=\"text-align:center;vertical-align:top;height:40px;font-size:1.5em;color:#965617;\"><b>"+item.name+"</b></td>"+
							"</tr>"+
							"<tr>"+
								"<td style=\"height:70px;color:#965617;\">"+item.name+"</td>"+
							"</tr>"+
							"<tr>"+
								"<td style=\"vertical-align:bottom;text-align:center;height:30px;font-size:1em;color:#965617;\">数量：<input type=\"text\" id=\"count"+item.id+"\" size=\"2\" maxlength=\"2\" value=\"1\"></input></td>"+
							"</tr>"+
						"</table>"+
					"</td>"+

					"<td>"+
						"<table>"+
							"<tr>"+
								"<td style=\"text-align:center;height:90px;font-size:5em;color:#965617;\">"+item.price+"</td>"+
							"</tr>"+
							"<tr>"+
								"<td style=\"text-align:right;height:20px;font-size:1.2em;color:#965617;\">元</td>"+
							"</tr>"+
							"<tr>"+
								"<td style=\"text-align:center;height:30px;\"><input type=\"button\" onClick=\"buy('"+item.id+"','"+item.name+"')\" value=\"购  买\" onClick=\"\" style=\"cursor:pointer;width:84px;height:31px;border:0;font-size:1em;color:#FFF;background:url(<?php echo Yii::app()->request->baseUrl; ?>/images/button_green.png);\"></input></td>"+
							"</tr>"+
						"</table>"+
					"</td>"+
				"</tr>"+
			"</table>"+
		"</td>");
		if(index%2 == 1){
			domText += "</tr><tr><td colspan=\"2\" style=\"width:100%;height:20px;background:url(<?php echo Yii::app()->request->baseUrl; ?>/images/split_line.png) repeat-x center center;\"></td></tr>";

		}
	}
	domText += "</table>";
	document.getElementById("productContent").innerHTML = domText;
}
var buy = function(pid,pname){
	var c = document.getElementById("count"+pid).value;
	var outText = "";
	outText+=("<p>"+pname+"&nbsp;&nbsp;"+c+"份");
	document.getElementById("orderContent").innerHTML+=(outText);
	order.push({id:pid,name:pname,count:c});
}

var qingkong = function(){
	document.getElementById("orderContent").innerHTML = "";
	order = [];
}

var bill = function(){
	if(order == null || order.length ==0){
		alert("请先选择商品");
		return;
	}
	jQuery.ajax({
        url: "<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=product/createOrder",
        type: "POST",
        data: {'order': order},  
        error: function(xhr,tStatus,e){
        	console.log(e);
            alert("失败了，请再试试，不行就找店主");
            },
        success: function(resp){
            alert(resp+"号订单已经提交，请到座位等待。");
			qingkong();
            }
        });
}

</script>




