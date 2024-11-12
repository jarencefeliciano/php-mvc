<h1>Delete Product</h1>

<p><a href="/products/show/<?= $product["id"]?>">Cancel</a></p>

<form method="post" action="/products/delete/<?= $product["id"] ?>">

<p>Delete this product?</p>

<button>Yes</button>

</form>
