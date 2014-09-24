<!doctype html>
<html>
	<meta http-equiv="content-type" content="text/html;charset=utf-8">
<head>
	<?php include('./css_import.php'); ?>
	<?php include('./js_import.php'); ?></head>
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
			<img src="img/samples/intro/head.png">
		</div>
		</div>
	</div>
	<div class="container">
		<div class="col-xs-12">
		<div class="row">
			<div class="col-xs-3">
				<ul class="list-group">
					<li class="list-group-item">Item1</li>
					<li class="list-group-item">Item2</li>
					<li class="list-group-item">Item3</li>
					<li class="list-group-item">Item4</li>
				</ul>
			</div>
			<div class="col-xs-9">
				<div class="alert alert-success"><i><?php echo $_GET['kw'];?></i>查询结果:  一共找到<?php echo '7';?>条匹配记录</div>
				<div class="container">
					<div class="col-xs-8">
						<div class="panel panel-default">
							<div class="panel-heading">测试检索结果
							</div>
							<div class="panel-body">
								<ul class="list-group">
									<li class="list-group-item">
										<a href="#">集团开展ERP系统人力资源专项培训</a><i class="pull-right">2014-09-19</i>
									</li>
									<li class="list-group-item">
										<a href="#">集团开展税收法规及筹划技巧培训</a><i class="pull-right">2014-09-19</i>
									</li>
									<li class="list-group-item">
										<a href="#">通州湾科教产业公司召开一届一次董事会</a><i class="pull-right">2014-09-19</i>
									</li>
									<li class="list-group-item">
										<a href="#">市国资委调研园区空港产业</a><i class="pull-right">2014-09-19</i>
									</li>
									<li class="list-group-item">
										<a href="#">兰州大学艺术院校老师来通调研</a><i class="pull-right">2014-09-19</i>
									</li>
									<li class="list-group-item">
										<a href="#">商贸公司入驻创业社区</a><i class="pull-right">2014-09-19</i>
									</li>
									<li class="list-group-item">
										<a href="#">西安交大苏州研究院吴院长一行参观科教城</a><i class="pull-right">2014-09-19</i>
									</li>
								</ul>
								<ul class="pager pull-right">
								  <li><a href="#">上一页</a></li>
								  <li><a href="#">下一页</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	<?php include('./footer.php');?></body>
</html>