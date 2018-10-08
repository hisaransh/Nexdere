$(document).ready(function(){
	
	$(".menu-bar").click(function(){
		$(".nav-item").toggleClass("resp");
	})
	$(".nav-link,.dropdown-link,.sub-dropdown-link").click(function(){
		navHandler($(this));
	})


	
});


function navHandler(ele){
//////////////////////////////	
	if(ele.hasClass("dropdown-toggle")){
		if(ele.data("status")=='active'){
			ele.data("status",'inactive');
			ele.siblings().addClass("none");
			ele.removeClass("active");


		}
		else{
			$(".dropdown-menu").addClass("none");
			$(".dropdown-toggle").data("status",'inactive');
			ele.siblings().removeClass("none");
			ele.data("status",'active');
			ele.addClass("active");
			
		}
	}

	else if(ele.hasClass("sub-dropdown-toggle")){
		if(ele.data("status")=='active'){
			ele.data("status",'inactive');
			ele.siblings().addClass("none");
			ele.removeClass("active");

		}
		else{
			$(".sub-dropdown-menu").addClass("none");
			$(".sub-dropdown-toggle").data("status",'inactive');
			ele.siblings().removeClass("none");
			ele.data("status",'active');
			ele.addClass("active");
		}
	}

	else{

		var dataToggle = ele.parent().data('page');
		$(".nav-item .active").removeClass("active");
		ele.addClass("active");
		$(".page").addClass("none");
		$("#"+dataToggle+"").removeClass("none");
		if(ele.hasClass("sub-dropdown-link")){
			
			$(".dropdown-toggle").each(function(){
				if($(this).data("status")=='active'){
					
					$(this).addClass('active');
				}
			});

		}
		$(".dropdown-menu,.sub-dropdown-menu").addClass("none");
		$(".sub-dropdown-toggle,.dropdown-toggle").data("status",'inactive');
	}
};



	

/////////////////////every click
// $(".dropdown-toggle").data("status",'inactive');

//////////////////////////
 //  $(".navHolder li a").click(function(){
	// 	var dataToggle=$(this).parent().data("page");
	// 	$('.page').addClass("none");
	// 	$("#"+dataToggle+"").removeClass("none");
	// 	$(this).closest(".navbar-nav").find("ul").addClass("none");
	// 	$(this).siblings().removeClass("none");
	// 	console.log("click");
	// 	navHandler($(this));
	// })