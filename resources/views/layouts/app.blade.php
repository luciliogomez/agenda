<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/css/app.css" rel="stylesheet">
    <title>Agenda - @yield('title')</title>
</head>
<body>
    <div class="container  flex justify-between ">
        <div class="sidebar">
            
        </div>
        <div class="main ">
            <div>
                @yield('content')
            </div>
        </div>
    </div>
    
</body>
</html>