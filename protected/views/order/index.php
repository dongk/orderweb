<?php
/* @var $this OrderController */
/* @var $dataProvider CActiveDataProvider */

?>
<style type="text/css">


table
{
	border-collapse: collapse;
	margin-bottom: 3em;
	font-size: 1em;
	line-height: 1.5;
}

tr:hover, td.start:hover, td.end:hover
{
	background: #FF9;
}

th, td
{
	padding: .3em .5em;
}

th
{
	font-weight: normal;
	text-align: left;
	background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/tabletree-arrow.gif) no-repeat 2px 50%;
	padding-left: 15px;
}

th.name { width: 12em; }
th.location { width: 12em; }
th.color { width: 10em; }

thead th
{
	background: #c6ceda;
	border-color: #fff #fff #888 #fff;
	border-style: solid;
	border-width: 1px 1px 2px 1px;
	padding-left: .5em;
}

tbody th.start
{
	background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/tabletree-dots.gif) 18px 54% no-repeat;
	padding-left: 26px;
}

tbody th.end
{
	background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/tabletree-dots2.gif) 18px 54% no-repeat;
	padding-left: 26px;
}
</style>
<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=product/admin" target="_blank" class="linka">管理商品</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=category/admin" target="_blank" class="linka">管理分类</a> 
<br/><br/>


<table id="ordercontent" border="1" width="100%">
	<thead id="head">
		<th width="20%">订单编号</th>
		<th width="20%">商品数量</th>
		<th width="20%">提交时间</th>
		<th width="40%"></th>
	</thead>

</table>


<script type="text/javascript">
var lastData = [];
$(document).ready(function () {
	getOrder();
	window.setInterval(function(){ 
		getOrder();
	}, 3000); 
});



var getOrder = function(lastQueryTime){
	jQuery.ajax({
        url: "<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=order/ajaxOrder",
        type: "POST",
        data: {'isfinish': '0'},  
        error: function(xhr,tStatus,e){
            if(!xhr){
                alert(" We have an error ");
                alert(tStatus+"   "+e.message);
            }else{
                alert("else: "+e.message); 
            }
            },
        success: function(resp){
            buildOrder(resp);
            }
        });
};
var buildOrder = function(data){
	
	for(var item in data){
		var _outText = "";
		if(jQuery.inArray(item,lastData)==-1){
			_outText +=("<tr class='"+item+"'>");
				_outText +=("<th>"+data[item].orderseq+"</th>");
				_outText +=("<td></td>");
				_outText +=("<td>"+data[item].createtime+"</td>");
				_outText +=("<td>");
					_outText +=("<input type=\"button\" value=\"完成\" onClick=\"setFinish('"+data[item].orderid+"')\"></input>");
				_outText +=("</td>");
			_outText +=("</tr>");
			var style = "";
			for(var p in data[item].products){		
				if(p == (data[item].products.length-1)){
					style = "background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/tabletree-dots2.gif) 18px 54% no-repeat;padding-left: 26px;";
				}else{
					style = "background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/tabletree-dots.gif) 18px 54% no-repeat;padding-left: 26px;";
				}
				console.debug(data[item].products[p]);
				_outText +=("<tr class='"+item+"'>");
					_outText +=("<th width=\"20%\" style=\""+style+"\" >");
						_outText +=(data[item].products[p].productname);
					_outText +=("</th>");
					_outText +=("<td width=\"20%\">");
						_outText +=(data[item].products[p].productamount);
					_outText +=("</td>");
					_outText +=("<td width=\"20%\"></td>");
					_outText +=("<td width=\"40%\"></td>");
				_outText +=("</tr>");
				
			}
			$("#head").after(_outText);
			lastData.push(item);
		}
	}
	
}

var setFinish = function(orderid){
	jQuery.ajax({
        url: "<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=order/finish",
        type: "POST",
        data: {'orderid': orderid},  
        error: function(xhr,tStatus,e){
        	alert(e);
            },
        success: function(resp){
            $('.'+orderid).remove();
            }
        });
}

</script>




