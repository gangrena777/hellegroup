
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


    <title>Helle2</title>
  </head>
  <body>


<div  class="container">
  
   <h1>search filew</h1>
    <div>
        <form  class="create_form  row"  enctype="multipart/form-data"  id="filesearch" >
            <div class="col-9">
              
              <input type="text" name="search" class="form-control" id="inputsearch" placeholder="Введите искомое имя файла...">
            </div>
            <div class="col-auto">
             <button type="submit" class="btn btn-primary">Найти</button>
            </div>
        </form>
        <div class="search_result"></div>
        <div class="container  datas"></div>
  </div>      
</div>        
    
  </body>

  <script>

$("#filesearch").on("submit", function(e){

  $(".datas").empty();
  $(".search_result").empty();

 

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
                       console.log(obj);

                        if( obj['avaible'] ){
                          delete obj['avaible'];

                           var block = "<ul class='list-group list-group-flush '>";

                            for(let i in obj ){
                              var n = parseInt(i)+1;
                               block+="<li class='list-group-item  d-flex justify-content-between'><span>"+n+".</span><span>"+obj[i].date_create+"</span><p>"+obj[i].name+"<p><a  download href='"+ obj[i].file+"'  title='текст всплывающей подсказки' class='link-opacity-100 ms-auto p-2'>download</a></li>";

                            }
                            block+="</div";  

                            $(".search_result").html("По вашему запросу найдено следующее...."); 
                            $(".datas").append(block);
                        }else{
                          var no_query = "<p class='alert alert-danger'>"+obj.message+"</p>";
                          $(".datas").append(no_query);

                        }
                    }    
                });
          

});





  </script>
</html>