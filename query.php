<?
	header("content-type:text/html;charset=utf-8");
?>
<!doctype html>
<html>
	<meta http-equiv="content-type" content="text/html;charset=utf-8">

<head>
<title>南通滨海园区科教城官方网站</title>
	<?php include('./css_import.php'); ?>
	<?php include('./js_import.php'); ?>
	<script type="text/javascript">
	$(document).ready(function(){
		var url = "public/global/queryArticles.php";
		var params = {};
			ajaxJSON(
			url,
			"get",
			params,
			function(res){
				if(res.isSuccess){
					console.log(res.responseText);
					$('#tbodyContainer').empty();
					$(".cnt").text(res.responseText.length);
					for(var i=0,len=res.responseText.length;i<len;i++){
						var line = res.responseText[i];
						$("<tr></tr>")
						.append($("<td></td>").text(line['title']))
							.append($("<td></td>").text(line['author']))
							.append($("<td></td>").text(line['date']))
							.append($("<td></td>").append($('<a href="'+line["url"]+'">查看</a>')))
							.appendTo($("#tbodyContainer"));
					}
					$("#resultTable").DataTable();
				}
			},
			function(res){
				console.log(res);
			}
		);
	});
	</script>
</head>
<body>
	<?php
	include('./header.php');
?>
	<div class="jumbotron">
		<div class="row">
			<div class="col-xs-3">
			<h3>Query Result</h3>
			<p>
				Here are some discriptions
			</p>
			<button class="btn btn-lg btn-info">继续</button>
		</div>
		<div class="col-xs-9">
			<img src="images/samples/intro/head.png">
		</div>
		</div>
	</div>
	<div class="container">
		<div class="col-xs-12">
		<div class="row">
			<div class="col-xs-12">
				<div class="alert alert-info"><i><?php echo $_GET['kw'];?></i>查询结果:  一共找到<span class="label label-primary cnt"></span>条匹配记录</div>
				<div class="container">
					<table id="resultTable" class="table table-striped">
						<thead>
							<th>标题</th>
							<th>作者</th>
							<th>发布时间</th>
							<th>文章链接</th>
						</thead>
						<tbody id="tbodyContainer">
							<tr>
								<td>标题1</td>
								<td>作者1</td>
								<td>2014-09-20</td>
								<td>305</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	</div>
	<?php include('./footer.php');?></body>
</html>