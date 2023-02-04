<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>
<a href="{{ url('/logout') }}"> logout </a><br/>


<a href="{{ route('admin.administrators.administrators') }}"> Администраторы </a>
<a href="{{ route('admin.teachers.teachers') }}"> Учителя </a>
<a href="{{ route('admin.students.students') }}"> Студенты </a>
<a href="{{ route('admin.faculties.faculties') }}"> Факультеты </a>

</body>
</html>
