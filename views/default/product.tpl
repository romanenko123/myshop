{* стр продукта *}
<h3>{$resultProduct['name']}</h3>

<img width="575" src="/images/products/{$resultProduct['image']}">
Стоимость: {$resultProduct['price']}

<a id="addCart_{$resultProduct['id']}" href="#" onclick="addToCart({$resultProduct['id']}); return false;">Добавить в корзину</a>
<p>Описание <br>{$resultProduct['description']}</p>