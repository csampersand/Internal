<!DOCTYPE html>
<html>
    <head>
        <title>Internal</title>

        <link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }

            .entrance {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                width: 100%;
                height: 100%;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <a href="{{ url(action('HomeController@index')) }}" class="entrance"></a>
            <div class="content">
                <div class="title">Internal</div>
            </div>
        </div>
    </body>
</html>
