<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read DataBase</title>
    <link rel="stylesheet" type="text/css" href="style.css">   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container" style="margin-top: 20px;">
        <h1 class="page-header text-center"> INFORMATION</h1>
        <div class="row">
            <div class="col-12">
                
                <table class="table table-bordered " >
                <thead class="bg-dark text-light">  
                <tr>  
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Message</th>
                    <th>City</th>
                    <th>File</th>
                    <th>Action</th>
                </tr>
                </thead>  
                    <tbody>
                        <?php
                        require 'functions.php';
                        $table_data = new Person();
                        $table_data->read_data();
                        
                        ?>

                        
                    </tbody>


                </table>
            </div>
        </div>

    </div>
    

</body>
</html>