<?php

  // Chamando a Class de Validação
  require_once('validation.class.php');
  $validate = new Validation;

  // Aplicando os campos para validação
  // Campo, regra e retorno da mensagem

  

  $resultValidation = $validate->rulesValidate(
      array(
          array($_POST['name']                    , 'notnull'         , 'O campo Razão Social é obrigatório.'),
          array($_POST['celular']                 , 'isnumber'         , 'O campo Celular é obrigatório.'),
          array($_POST['email']                   , 'ismail'          , 'O campo E-mail é obrigatório.'),
      )
  );  

  if($resultValidation == 'success'){
    $retorno = array (
        'result' => 'success',
        'msg' => 'Cadastrado com Sucesso!'
    );
  }else{
      $retorno = array (
          'result' => 'error',
          'msg' => $resultValidation
      );
  }

  echo json_encode($retorno);
