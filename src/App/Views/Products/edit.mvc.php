{% extends "base.mvc.php" %}

{% block title %}Edit Product{% endblock %}

{% block body %}

<h1>Edit Product</h1>

<p><a href="/products/show/{{ product["id"] }}">Cancel</a></p>

<form method="post" action="/products/update/{{ product["id"] }}">

    {% include "/Products/form.mvc.php" %}

</form>

{% endblock %}
