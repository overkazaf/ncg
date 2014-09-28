$(document).ready(function(){
	$(".carousel").carousel('cycle');
	initTabs();
	initEmblem();
	initImpnav();
});
function initEmblem(){
	/*
		<div class="col-xs-4">
          <div class="tile">
            <img class="tile-image big-illustration img-thumbnail" alt="" src="images/samples/emblem/2.gif">
            <h3 class="tile-title">Web Oriented</h3>
            <a class="btn btn-primary btn-large btn-block" href="#">Get Pro</a>
          </div>
        </div>
	*/
	var names = [
		'北京航空航天大学',
		'上海海事大学',
		'西安交通大学',
		'南京大学',
		'河海大学',
		'天津大学',
		'上海交通大学',
		'浙江大学',
		'中国科学院',
		'北京物资学院',
		'哈尔滨工程大学',
		'兰州大学',
		'南京航空航天大学',
		'山东大学',
		'上海电力学院',
		'武汉大学',
		'西北工业大学'
	];
	for(var i=1;i<18;i++){
		$(".img-container").append(
			$("<div class='col-xs-2'></div>").append(
				//img
				$('<img class="small-icon img-rounded" />').attr({
					src:"images/samples/emblem/"+i+".gif",
					alt:names[i-1],
					title:names[i-1]
				})
			)
		);
	}
}
function initImpnav(){
	$('#impContainer p').hide();
	$('#impContainer p').first().show();
	$("#impNav li").on('click',function(index){
		$(this).siblings().removeClass("active");
		$(this).addClass("active");
		$("#impContainer p").hide();
		$('#impContainer p:eq('+$(this).attr("index")+')').show('slow');
	});
}
function initTabs(){
	$(".nav li").on('click', function(){
		$(this).siblings().removeClass("active");
		$(this).addClass("active");
	});
}
function initPaginations(){
	$(".pagination li").on('click', function(){
		$(this).siblings().removeClass("active");
		$(this).addClass("active");
		$(this).siblings().first().addClass("previous");
		$(this).siblings().last().addClass("next");
	});
}

function ajaxJSON(url,method,params,fnSuccess,fnError){
	switch(method.toLowerCase()){
		case 'post':
			JSON.stringify(params);
			break;
		case 'get':
			break;
		default:break;
	}

	$.ajax({
		url: url,
		type: method,
		data:params,
		dataType: "json",
		success:function(data, textStatus){
            fnSuccess(data,textStatus);
         },
		error:function(data, textStatus){
            fnError(data,textStatus);
         }
	});
}

function printJSON(json){
	for(var attr in json){
		console.log(attr+"::"+json[attr]);
	}
}
function printJSONArray(jsonArray){
	for(var i=0, size = jsonArray.length; i<size; i++){
		printJSON(jsonArray[i]);
	}
}

function contactUs(){	
	/*
	$('#statusModal .modal-title').html("联系我们");
	$('#statusModal .modal-body').html("这里设计一个提交表单");
	$('#statusCancel').text("取消");
	$('#statusSubmit').text("提交").on('click',function(){
		$('.modal-body').html("<div class='alert alert-success text-center'>正在提交...</div>").fade('slow');
	});
	$('#statusModal').modal('show');*/
	showConfirm(
		{
			title:"联系我们",
			content:null,
			hasCancelBtn:false,
			hasCancelEvent:function(){
				console.log("has cancel event");
			},
			hasConfirmEvent:function(){
				console.log("has confirm event");
			}
		}
	);
}

function showConfirm(json){
	
	var title = json.title || 'default';
	var content = json.content || 'default';
	var hasCancelBtn = json.hasCancelBtn || false;
	var cancelEvent = json.cancelEvent || function(json){console.log(e);};
	var confirmEvent = json.confirmEvent || function(json){console.log(e);};

	if(json.title)$('#confirmModal .modal-title').html(title);
	if(json.content)$('#confirmModal .modal-body').html('<div class="alert alert-info">'+content+'</div>');
	if(hasCancelBtn){
		$('#confirmCancel').text(hasCancelBtn).on('click',function(){
			if(cancelEvent)setTimeout(cancelEvent(),500);
		});
	}
	$('#confirmSubmit').on('click',function(){
		if(confirmEvent)setTimeout(confirmEvent(),500);
	});
	$('#confirmModal').modal('show');
	
}

function showStatus(json){
	$("#statusModal").modal("show");
	console.log(json);
	if(json.title){
		$("#statusTitle").text(json.title);
	}

	if(!json.flag){
		$("#statusBody").removeClass("alert-danger").addClass("alert-success");
	}else{
		$("#statusBody").removeClass("alert-success").addClass("alert-danger");
	}

	if(json.body){
		$("#statusBody").text(json.body);
	}

	if(!json.hasCancelBtn){
		$("#statusCancel").hide();
	}
}