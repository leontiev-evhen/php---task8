<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>%TITLE%</title>

        <!-- Bootstrap -->
        <link href="%PATH%templates/css/bootstrap.min.css" rel="stylesheet">

        <!-- My style -->
        <link href="%PATH%templates/css/style.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container mt-50">
            <div class="row">
                <div class="col-md-12">
                     <h1>My search engine</h1>
                 </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <form action="index.php" method="post">
                        <div class="form-group">
                                <input type="text" name="search" class="custom-file-input" value="%POST_SEARCH%">
                                 <input type="submit" class="btn btn-info" value="Search">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    %BODY%
                </div>
            </div>

   
        </div>
         <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
         <!-- Include all compiled plugins (below), or include individual files as needed -->
         <script src="%PATH%templates/js/bootstrap.min.js"></script>

    </body>
</html>

