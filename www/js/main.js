/**
 * обновление данных пользователя
 */
function updateUserData() {
	var postData = getData("#updateUserData");
	console.log(postData);
	$.ajax({
		type : "POST",
		url : "/user/update/",
		data : postData,
		dataType : "json",
		success : function(data){
			if (data['success']) {
				$("#userLink").html(data['name']);
				alert(data['message']);
			} else {
				alert(data['message']);
			}
		}
	});
}

function showRegisterBox() {
	if ($("#registerBoxHidden").css("display") != "block") {
		$("#registerBoxHidden").show();
		$("#loginBox").hide();
	} else {
		$("#registerBoxHidden").hide();
		$("#loginBox").show();
	}
}

/**
 * получение данных с форм
 */
function getData(obj_form) {
	var hData = {};
	$("input, textarea, select", obj_form).each(function(){
		if (this.name && this.name != "") {
			hData[this.name] = this.value;
		}
	});
	return hData;
}

function login() {
	var postData = getData("#loginBox");
	
	$.ajax({
		type : "POST",
		url : "/user/login/",
		data : postData,
		dataType : "json",
		success : function(data){
			if (data['success']) {
				console.log(data);
				$('#registerBox').hide();
				$('#loginBox').hide();
				
				$("#userLink").attr("href", "/user/");
				$("#userLink").html(data['name']);
				$("#userBox").show();
			} else {
				alert(data['message']);
			}
		}
	});
	
}

/**
 * регистрация нового пользователя
 */
function registerNewUser() {
	var postData = getData("#registerBox");

	$.ajax({
		type : "POST",
		url : "/user/register/",
		data : postData,
		dataType : "json",
		success : function(data) {
			console.log(data);
			if (data['success']) {
				alert(data['message']);

				// > блок в левом столбце
				$('#registerBox').hide();

				$("#userLink").attr("href", "/user/");
				$("#userLink").html(data['name']);
				$("#userBox").show();
//				// <
//				// > стр заказа
//				$("#loginBox").hide();
//				$("#btnSaveOrder").show();
//				// <
			} else {
				alert(data['message']);
			}
		}
	});
}

/**
 * Подсчет стоимости купленного товара
 * 
 * @param integer
 *            itemId ID подукта
 */
function conversionPrice(itemId) {
	var newCnt = $("#itemCnt_" + itemId).val();
	var itemPrice = $("#itemPrice_" + itemId).attr("value");
	var itemRealPrice = newCnt * itemPrice;

	$("#itemRealPrice_" + itemId).html(itemRealPrice);
}

/**
 * Функция добавления товара в корзину
 * 
 * @param integer
 *            itemId ID продукта
 * @return в случае успеха обновяться данные корзины на стр
 */
function addToCart(itemId) {
	console.log(itemId);
	$.ajax({
		url : "/cart/addtocart/" + itemId + "/",
		dataType : "json",
		success : function(data) {
			if (data["success"]) {
				$("#cartCntItems").html(data["cntItems"]);

				$("#addCart_" + itemId).hide();
				$("#removeCart_" + itemId).show();
			}
		}
	});
}

/**
 * Удаление товара в корзину
 * 
 * @param integer
 *            itemId ID продукта
 * @return в случае успеха обновяться данные корзины на стр
 */
function removeFromCart(itemId) {
	console.log(itemId);
	$.ajax({
		url : "/cart/removefromcart/" + itemId + "/",
		dataType : "json",
		success : function(data) {
			if (data["success"]) {
				$("#cartCntItems").html(data["cntItems"]);

				$("#addCart_" + itemId).show();
				$("#removeCart_" + itemId).hide();
			}
		}
	});
}