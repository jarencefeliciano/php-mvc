<h1>Edit Product</h1>

<p><a href="/products/show/<?= $product["id"]?>">Cancel</a></p>

<form method="post" action="/products/update/<?= $product["id"] ?>">

    <?php require "form.php"; ?>

</form>
