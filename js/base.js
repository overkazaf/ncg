$(document).ready(function(){
	$(".carousel").carousel('cycle');
	initTabs();
	initPaginations();

	/*
	var url = "./public/global/dispatcher.php",
		params = {};
		params.id = 12;
	ajaxJSON(
			url,
			'post',
			params,
			function(e){
				printJSONArray(e);
			},
			function(e){
				console.log(e);
			}
		);
	*/
});
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