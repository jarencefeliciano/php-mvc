{% extends "base.mvc.php" %}

{% block title %}Delete Product{% endblock %}

{% block body %}

<h1>Delete Product</h1>

<p><a href="/products/show/{{ product["id"] }}">Cancel</a></p>

<form method="post" action="/products/destroy/{{ product["id"] }}">

<p>Delete this product?</p>

<button>Yes</button>

</form>

{% endblock %}
