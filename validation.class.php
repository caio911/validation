<?php


class Validation
{
  	public static function rulesValidate($rules){


  		$errors = 0;
  		$msgs = array();

  		foreach ($rules as $key => $rule) {

  			if(strstr($rule[1], "|")){
  				$validations = explode("|", $rule[1]);
  				$errorMessage = $rule[2];
  			}else{
  				$validations = array($rule[1]);
  				$errorMessage = $rule[2];
  			}

  			foreach ($validations as $key => $validation) {

					if(!Self::validate($rule[0], $validation)){
						$errors++;
            array_push($msgs, $errorMessage);
					}

  			}

  		}

  		if($errors==0) return 'success';

  		return $msgs;
  		
  	}



      /**/
      /* Faz a validação dos campos
      /* notnull : Verifica se o campo é vazio ou nullo
      /* maxlength : Numero limitado de caracteres
      /* minlength : Numero minimo de caracteres
      /* isnumber : Verifica se é numerico
      /* isequal : Verifica se dois campos são iguais
      /* ismail : Verifica se é uma email
      /* isdate : Verifica se é uma data valida BR
      /* iscpf : Verifica se é um cpf valido
      /**/
      public function validate($value, $type, $param = null){

          if($type=="url"){
            if(filter_var($value, FILTER_VALIDATE_URL) === FALSE) {
            return false;
          } else {
            return true;
          }
          }
          
          if($type=='notnull'){
            if($value!='' and $value!=null) {
              return true;
            }else{
              return false;
            }
          }

          if($type=='maxlength'){
            if(strlen($value) <= $param) {
              return true;
            }else{
              return false;
            }
          }

          if($type=='minlength'){
            if(strlen($value) >= $param) {
              return true;
            }else{
              return false;
            }
          }

          if($type=='isnumber'){
            if(is_numeric($value)) {
              return true;
            }else{
              return false;
            }
          }

          if($type=='isequal'){
            if($value === $param) {
              return true;
            }else{
              return false;
            }
          }

          if($type=='ismail'){
            if(!filter_var($value, FILTER_VALIDATE_EMAIL) === FALSE) {
              return true;
            }else{
              return false;
            }
          }


          if($type=='isdate'){
            if(preg_match('/^\d{4}\-\d{2}\-\d{2}$/',$value)) {
              return true;
            }else{
              return false;
            }
          }


          if($type=='iscnpj'){
            
              //$param formato dia/mes/ano  01/01/2015
              $value = preg_replace('/[^0-9]/', '', (string) $value);
            // Valida tamanho
            if (strlen($value) != 14)
              return false;
            // Valida primeiro dígito verificador
            for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++)
            {
              $soma += $value{$i} * $j;
              $j = ($j == 2) ? 9 : $j - 1;
            }
            $resto = $soma % 11;
            if ($value{12} != ($resto < 2 ? 0 : 11 - $resto))
              return false;
            // Valida segundo dígito verificador
            for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++)
            {
              $soma += $value{$i} * $j;
              $j = ($j == 2) ? 9 : $j - 1;
            }
            $resto = $soma % 11;

            return $value{13} == ($resto < 2 ? 0 : 11 - $resto);

          }
          


          if($type=='iscpf'){  

            $value = str_replace('.', '', $value);
            $value = str_replace('-', '', $value);
            $value = str_replace(' ', '', $value);

            if(!is_numeric($value)){
              return false;
            }
 
            if (strlen($value) != 11) {
                return false;
            }

            else if ($value == '00000000000' || 
                $value == '11111111111' || 
                $value == '22222222222' || 
                $value == '33333333333' || 
                $value == '44444444444' || 
                $value == '55555555555' || 
                $value == '66666666666' || 
                $value == '77777777777' || 
                $value == '88888888888' || 
                $value == '99999999999') {
                return false;

             } else {   
                 
                for ($t = 9; $t < 11; $t++) {
                     
                    for ($d = 0, $c = 0; $c < $t; $c++) {
                        $d += $value{$c} * (($t + 1) - $c);
                    }
                    $d = ((10 * $d) % 11) % 10;
                    if ($value{$c} != $d) {
                        return false;
                    }
                }
         
                return true;
            }
          }


      }


}


  $validate = new Validation;
  $validate->rulesValidate(
      array(
          array($_POST['razaosocial']             , 'notnull'         , 'O campo Razão Social é obrigatório.'),
          array($_POST['celular']                 , 'isnumber'         , 'O campo Celular é obrigatório.'),
          array($_POST['email']                   , 'ismail'          , 'O campo E-mail é obrigatório.'),
          array($_POST['mensagem']                , 'notnull'          , 'O campo Mensagem é obrigatório.')
      )
  );  

  if($validate == 'success'){
    return true;
  }else{
      $retorno = array (
          'result' => 'error',
          'msg' => $validate
      );
  }

  echo json_encode($retorno);

