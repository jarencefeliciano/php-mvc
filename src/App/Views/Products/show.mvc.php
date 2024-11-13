{% extends "base.mvc.php" %}

{% block title %}Product{% endblock %}

{% block body %}

<h1>{{ product["name"] }}</h1>

<p>{{ product["description"] }}</p>

<p><a href="/products/edit/{{ product["id"] }}">Edit</a></p>

<p><a href="/products/delete/{{ product["id"] }}">Delete</a></p>

{% endblock %}
