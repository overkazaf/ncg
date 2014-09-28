<?php
	header("Content-type:text/html;charset=utf-8");
	include_once('css_import.php');
	include_once('js_import.php');
	include_once('status_box.php');
?>
<link rel="stylesheet" href="public/editor/themes/default/css/umeditor.css" />
<script type="text/javascript" charset="utf-8" src="public/editor/umeditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="public/editor/umeditor.min.js"> </script>
<script type="text/javascript">
	$(document).ready(function(){
		var um = UM.getEditor('editor');
		$(".dropdown-menu li").on('click',function(){
			$(this).siblings().removeClass("active");
			$(this).addClass("active");
			$("#typeMenu").html($(this).text()+'<span class="caret"></span>');
			$("#pid").val($(this).find("a").attr("value"));
		});
		$("#datetimepicker").datetimepicker({
			minView: 2,
			maxView: 3,
			todayHighlight:true,
			format: "yyyy-mm-dd",
			showMeridian: true,
			autoclose: true,
			todayBtn: true
		});
		console.log(new Date());
		$('#datetimepicker').datetimepicker('setStartDate', new Date());

		$('#postBtn').on('click',function(){
			var params = {};
				params.t = $('#wForm input[name="t"]').val();
				params.parent_id = $('#wForm input[name="parent_id"]').val();
				params.title = $('#wForm input[name="title"]').val().trim();
				params.author = $('#wForm input[name="author"]').val().trim();
				params.content = um.getContent();
			//clean ue.getContent();

			var url = "temp.php";
			ajaxJSON(
				url,
				'post',
				params,
				function(result){
					if(result.isSuccess){
						showStatus({
							title :'Update status',
							body :result.directUrl,
							flag :false,
							hasCancelBtn :false
						});
					}else{
						showStatus({
							title :'Update status',
							body :"Write file failed:"+result.errorMess,
							flag :true,
							hasCancelBtn :false
						});
					}
					
				},
				function(result){
					showStatus({
						title :'Update status',
						body :eval("("+result+")"),
						flag :false,
						hasCancelBtn :false
					});
				});
		});
	});
</script>
<hr>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-default">
				<div class="panel panel-header">
					<div class="alert alert-info">
						<h3 class="text-center">Article poster</h3>
					</div>
				</div>
				<div class="panel panel-body">
					<form id="wForm" action="post">
						<input type="hidden" name="postTime" value="<?php echo mktime();?>
						">
						<div class="col-xs-4">
							<ul class="list-group">
								<li class="list-group-item">
									<div class="dropdown">
										<button type="button" class="btn btn-primary dropdown-toggle form-control" id="typeMenu" 
									      data-toggle="dropdown">
											文章所属子类
											<span class="caret"></span>
										</button>
										<input id="pid" name="parent_id" type="hidden" value="-1">
										<ul class="dropdown-menu pull-right" role="menu" aria-labelledby="typeMenu">
											<li role="presentation">
												<a role="menuitem" tabindex="-1" value="1">类别1</a>
											</li>
											<li role="presentation">
												<a role="menuitem" tabindex="-1" value="2">类别2</a>
											</li>
											<li role="presentation">
												<a role="menuitem" tabindex="-1" value="3">类别3</a>
											</li>
											<li role="presentation" class="divider"></li>
											<li role="presentation">
												<a role="menuitem" tabindex="-1" value="-1">未分类</a>
											</li>
										</ul>
									</div>
									<!-- Datetime picker-->

								</li>
								<li class="list-group-item">
									<div class="input-append date form_datetime">
										<input placeholder="选择待发布日期" id="datetimepicker" name="t" size="16" class="form-control" type="text" readonly />
									</div>
								</li>
								<li class="list-group-item">
									<input placeholder="标题" type="text" class="form-control" name="title"></li>
								<li class="list-group-item">
									<input placeholder="作者" type="text" class="form-control" name="author"></li>

							</ul>
						</div>
						<div class="col-xs-8">
							<ul class="list-group">
								<li class="list-group-item" style="height:auto;">
									<script id="editor" type="text/plain" style="min-width:560px;width:100%;min-height:200px;"></script>
								</li>
								<button type="button" id="postBtn" class="btn btn-primary pull-right">发布</button>
							</ul>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>