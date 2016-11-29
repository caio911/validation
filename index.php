<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br"> 
  <head> 
    <title>Validação</title>

      <link rel="shortcut icon" href="" type="image/x-icon" />

      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

     

      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  </head>
  <body>


    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <form id="cadastro" class="cadastro" action="#" method="post" data-actioninsert="cadastro.php">
              <div class="form-group">
                <label for="name">Nome:</label> 
                <input type="text" class="form-control" id="name" name="name">
              </div>
              <div class="form-group">
                <label for="celular">Celular:</label>
                <input type="text" class="form-control" id="celular" name="celular">
              </div>
              <div class="form-group">
                <label for="email">E-mail:</label> 
                <input type="text" class="form-control" id="email" name="email">
              </div>
              <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <br>
            <div id="reponse-msg"></div>
          </div>
        </div>
      </div>
    </section>

      <!-- JQUERY -->
      <script src="//code.jquery.com/jquery-3.1.0.min.js"></script>
      <!-- Latest compiled and minified JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
      <!-- JS PRINCIPAL -->
      <script src="main.js"></script>
  

  </body>
</html>