<!DOCTYPE html>
<html>
<head>
    <title>Web Development 1</title>
</head>
<style>
    body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
    }

    .topnav {
        overflow: hidden;
        background-color: #333;
    }

    .topnav a {
        float: left;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
    }

    .topnav a:hover {
        background-color: #ddd;
        color: black;
    }

    .topnav a.active {
        background-color: #04AA6D;
        color: white;
    }
</style>

<body>


@include('nav')

@yield('page_header')


@yield("page_content")

<footer>
    <p>Copyrights Antonine University @ 2026</p>
</footer>
</body>
</html>


