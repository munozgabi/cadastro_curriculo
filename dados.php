<?php
    //pega os valores do checkbox
    $checkbox = $_POST["experiencia"];

    foreach($checkbox as $c){
        $c;
            
    }

    //transforma array para string
     $selecionados = implode(", ", $checkbox);

     //faz o upload do arquivo
     $nome_arquivo = $_FILES['curriculo']['name'];
     $dir_arquivo= "arquivos/".$nome_arquivo;
         if(move_uploaded_file($_FILES['curriculo']['tmp_name'], $dir_arquivo)){
              //adiciona os dados para o banco.csv   
                $arquivo = "banco.csv";
                $dados = file_get_contents($arquivo);
                $dados .= $_POST["nome"]. ", ".$_POST["endereco"]. ", ".$_POST["email"]. ", ".$_POST["sexo"].
                    ", ".$_POST["formacao"]. ", ".$selecionados. ", ".$dir_arquivo ."\n";
                file_put_contents($arquivo, $dados);

                echo "Cadastro realizado com sucesso!";
         }
         else{
             echo "Erro ao carregar o arquivo";
         }
    
?>