/**
 * Подсчет стоимости купленного товара
 * 
 * @param integer itemId ID подукта
 */
function conversionPrice(itemId){
	var newCnt = $("#itemCnt_" + itemId).val();
	var itemPrice = $("#itemPrice_" + itemId).attr("value");
	var itemRealPrice = newCnt * itemPrice;
	
	$("#itemRealPrice_" + itemId).html(itemRealPrice);
}

/**
 * Функция добавления товара в корзину
 * 
 * @param integer itemId ID продукта
 * @return в случае успеха обновяться данные корзины на стр
 */
function addToCart(itemId) {
	console.log(itemId);
	$.ajax({
		url: "/cart/addtocart/" + itemId + "/",
		dataType: "json",
		success: function(data){
			if(data["success"]){
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
 * @param integer itemId ID продукта
 * @return в случае успеха обновяться данные корзины на стр
 */
function removeFromCart(itemId) {
	console.log(itemId);
	$.ajax({
		url: "/cart/removefromcart/" + itemId + "/",
		dataType: "json",
		success: function(data){
			if(data["success"]){
				$("#cartCntItems").html(data["cntItems"]);
				
				$("#addCart_" + itemId).show();
				$("#removeCart_" + itemId).hide();
			}
		}
	});
}