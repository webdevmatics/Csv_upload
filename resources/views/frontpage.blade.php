<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
            <title>
                NoteBook App
            </title>
            <link href="{{asset('dist/css/main.css')}}" rel="stylesheet">
                <link href="{{asset('/dist/css/bootstrap.css')}}" rel="stylesheet">
                </link>
            </link>
        </meta>
    </head>
    <body>
        <div class="container-fluid">
            <nav class="navbar navbar-dark bg-primary">
                <button aria-controls="navbar-header" class="navbar-toggler hidden-sm-up" data-target="#navbar-header" data-toggle="collapse" type="button">
                    ☰
                </button>
                <div class="collapse navbar-toggleable-xs" id="navbar-header">
                    <a class="navbar-brand" href="#">
                        NoteBook App1
                    </a>
                </div>
            </nav>
            <!-- /navbar -->
            <!-- Main component for call to action -->
            <div class="jumbotron">
                <h1>
                    Notebook
                </h1>
                <p>
                    Store and organise your thoughts in notebook and NoteBook web app makes this easier than ever
                </p>
                <p>
                    <a class="btn btn-lg btn-primary" href="notebooks.html" role="button">
                        Your NoteBooks
                    </a>
                </p>
            </div>
        </div>
        <!-- /container -->
        <script src="{{asset('dist/js/jquery3.min.js')}}">
        </script>
        <script src="{{asset('dist/js/bootstrap.js')}}">
        </script>
    </body>
</html>
