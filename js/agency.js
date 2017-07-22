var cookieList = function(cookieName) {
	var cookie = $.cookie(cookieName);
	var items = cookie ? cookie.split(/,/) : new Array();
	return {
    "add": function(val) {
		var duplicated = false;
        if(items.length > 0){
		items.forEach(function(item){
			if(item && item.id >=0){
				if(item.id == val){
					items[item.id].count +=1;
					$.cookie(cookieName, items.join(','));
					duplicated = true;					
				}
			}
		});
		}
		if(!duplicated){
			items.push({'id':val,'count':itemsCount[val],'name':itemsName[val],'price':itemsUnitPrice[val]});
			$.cookie(cookieName, items);
		}
    },
    "remove": function (val) { 
		items.forEach(function(item){
			if(item && item.id >=0){
				if(item.id == val){
					indx = items.indexOf(item); 		
					if(indx!=-1) items.splice(indx, 1); 
					$.cookie(cookieName, items);		
				}
			}
		});
	},
    "clear": function() {
        items = null;
        $.cookie(cookieName, null);
    },
    "items": function() {
        return items;
    }
  }
};

var items = new cookieList("MyItems");
var itemsName = ["نامه و ایمیل های آماده","منشی همراه","منو یادت باشه"];
var itemsCount = ["0","0","0"];
var itemsUnitPrice = [20000,20000,20000];

// jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});

function prepareItems(){
	var content= "";
	var total = 0;
	
	items.items().forEach(function(item){
		if(item.id >= 0){	
			total += item.price * item.count;
			content+=
			'<tr>'+
			'<td class="warning"><button  type="button" onclick="deleteItem('+item.id+')" class="btn btn-danger">حذف</button></td>'+
			'<td class="success">'+item.count+'</td>'+
			'<td class="info">ریال'+item.price * item.count +'</td>'+
			'<td  class="info center">'+item.name+'</td>'+
			'</tr>';
		}
	});	
	if (content.length ==0){
		$('#shopping_end').prop('disabled',true);
		content='<tr><td  class="info center"></td><td class="info center"></td><td class="info center">سبد محصول خالی است</td><td class="info center"></td></tr>';
		$(".shopping-number-class").css('display','none');					
	}else{
		$('#shopping_end').prop('disabled',false);
		content +='<tr class="info center"><td>ریال'+total+'</td><td><=قیمت نهایی</td></tr>';
	}
	if(items.items().length >0){
		$(".shopping-number-class").css('display','block');
		$(".shopping-number-class").text(items.items().length);	
	}
	var itemsString=
	'<table class="table table-hover">'+
	'<tr>'+
	'<th class="active">عملیات</th>'+
	'<th class="active">تعداد</th>'+
	'<th class="active">قیمت</th>'+
	'<th class="active">نام کالا</th>'+
	'</tr>'+
	content+
	'</table>';
	$("#items").html(itemsString);	
}

 $(document).ready(function(){
	prepareItems();	
  });

function deleteItem(id){
	items.remove(id);
	prepareItems();
}	
  
function buyItem(id){
	alert('به سبد خرید اضافه گردید');
	$(".shopping-number-class").css('display','block');
	itemsCount[id]++;
	items.add(id);	
	prepareItems();		
}

// Highlight the top nav as scrolling occurs
$('body').scrollspy({
    target: '.navbar-fixed-top'
});

// Closes the Responsive Menu on Menu Item Click
$('.navbar-collapse ul li a').click(function() {
    $('.navbar-toggle:visible').click();
});

