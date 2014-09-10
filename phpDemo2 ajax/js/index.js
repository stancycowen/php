$(function(){
	//alert("a");
	
	$("#btnAdd").click(function(){
		var name = $(".t1").val();
		var title = $(".t2").val();
		var content = $(".t3").val();
		$(this).parent().find("input").val("");
		$.ajax({
			url:"ws/chatservice.php",
			type:"POST",
			data:{flag:'test',name:name,title:title,content:content},
			success:function(res){
				if (res == "true") {
					alert("添加成功！");

				}
				else{
					alert("添加失败！");
				}	
			}
				
		});	
	});

});