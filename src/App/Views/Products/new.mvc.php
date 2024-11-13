{% extends "base.mvc.php" %}

{% block title %}New Product{% endblock %}

{% block body %}

<h1>New Product</h1>

<form method="post" action="/products/create">

    <?php require __DIR__ . "/../App/Views/Products/form.php"; ?>

</form>

{% endblock %}
