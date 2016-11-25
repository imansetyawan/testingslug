<!DOCTYPE html>
<html>
    <head>
        <title>Page Not Found.</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
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

            .title h2{
                font-size: 100px;
                margin-bottom: 40px;
                color: #ff0000;
                margin-top: 0px;
            }
            h2{
                color: #000;
            }
            .btn {
                display: inline-block;
                padding: 6px 12px;
                margin-bottom: 0;
                font-size: 14px;
                font-weight: 400;
                line-height: 1.42857143;
                text-align: center;
                white-space: nowrap;
                vertical-align: middle;
                cursor: pointer;
                -moz-user-select: none;
                border: 1px solid transparent;
                color: #fff;
                background: #00BFFF;
                border-radius: 30px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title"><h2>Error 404</h2></div>
                <h2>The page you are looking for does not exist. Please enter a valid URL or return home</h2>
                <a href="{{ route('get_blog') }}"><button type="submit" name="submit" class="btn">GO HOME</button></a>
            </div>
        </div>
    </body>
</html>
