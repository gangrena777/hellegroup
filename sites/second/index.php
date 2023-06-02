
<!DOCTYPE html>
<html lang="ru">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script
             src="https://code.jquery.com/jquery-3.7.0.min.js"
              integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g="
                 crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


    <title>Helle</title>
  </head>
  <body>


<div  class="container">
  
   <h1>create file</h1>
    <div>
      <div  onclick="window.location.reload()"><p id="message"></p></div>

        <form  class="create_form"  enctype="multipart/form-data"  id="fileLoad">
            <div class="form-group">
              <label for="exampleInput">Name of file</label>
              <input type="text" class="form-control" id="exampleInput" name="name" required="">
             
            </div>
            <div class="form-group">
              <label for="exampleFormControlFile1">Example file input</label>
              <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file" required="">
            </div>
                    
            <button type="submit" class="btn btn-primary" name="save">Submit</button>
        </form>
  </div>      
</div>        
    
  </body>

  <script>

$("#fileLoad").on("submit", function(e){

 

       e.preventDefault(); // prevent from default action

                var formData = new FormData(this);

                $.ajax({
                    url: 'action.php',
                    type: 'post',
                    cache: false,
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {

                       var obj = JSON.parse(data);

                       if(obj.status == 'success'){
                        $("#message").addClass('alert alert-success');
                       }else{
                        $("#message").addClass('alert alert-danger');
                       }

                        $("#message").html(obj.message);
                    }
                });
          

});





  </script>
</html>