<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
            <title>
                NoteBook App
            </title>
            <link href="dist/css/main.css" rel="stylesheet">
                <link href="dist/css/bootstrap.css" rel="stylesheet">
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
                        NoteBook App
                    </a>
                </div>
            </nav>
            <!-- /navbar -->
            <!-- Main component for call to action -->
            <div class="container text-center">
                <!-- heading -->
                <h1 class="pull-xs-left">
                    Your Notebooks
                </h1>
                <div class="pull-xs-right">
                    <a class="btn btn-primary" href="#" role="button">
                        New NoteBook +
                    </a>
                </div>
                <div class="clearfix">
                </div>
                <br>
                    <!-- ================ Notebooks==================== -->
                    <!-- notebook1 -->

                    @foreach($notebooks as $notebook)

                    <div class="col-sm-6 col-md-3">
                        <div class="card">
                            <div class="card-block">
                                <a href="#">
                                    <h4 class="card-title">
                                        {{$notebook->name}}
                                    </h4>
                                </a>
                            </div>
                            <a href="#">
                                <img alt="Responsive image" class="img-fluid" src="dist/img/notebook.jpg"/>
                            </a>
                            <div class="card-block">
                                <a class="card-link" href="#">
                                    Edit Notebook
                                </a>
                                <form action="#" class="pull-xs-right5 card-link" method="POST" style="display:inline">
                                    <input class="btn btn-sm btn-danger" type="submit" value="Delete">
                                    </input>
                                </form>
                            </div>
                        </div>
                    </div>

                    @endforeach
                   
                </br>
            </div>
            <!-- /container -->
            <script src="dist/js/jquery3.min.js">
            </script>
            <script src="dist/js/bootstrap.js">
            </script>
        </div>
    </body>
</html>
