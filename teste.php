<?php
//Ademir
//alan
//Rafael
//GUilherme passou por aqui
//Roginer
//Zenilton
interface DiretorioInterface
{
    public function recuperarListaArquivos();
    public function excluirArquivo($nome_arquivo);
    public function cadastrarArquivo($imgDestino, $tipoImagem);
}


$arquivos = scandir("../uploads/");


class Diretorio implements DiretorioInterface
{
    public function recuperarListaArquivos()
    {
        $pasta="../uploads/";
        $arquivos=scandir("$pasta");
        return $arquivos;
    }
    
    public function excluirArquivo($nome_arquivo)
    {
        if(unlink($nome_arquivo)){
            echo "EXCLUÍDO com SUCESSO";
            return true;
        }else{
            echo "Erro ao excluir";
            return false;
        }  
        //return true;  
    }

    public function cadastrarArquivo($imgDestino, $tipoImagem)
    {
		$uploadOk = 1;


	    // Verifica se a imagem em questão já existe no diretório
	    if (file_exists($imgDestino)) {
	        echo "<script>window.location='index.php'; alert('Já existe uma imagem com este nome.');</script>";
	        $uploadOk = 0;
	    }

	    // Verificação da extenção do arquivo
	    if($tipoImagem != "jpg" && $tipoImagem != "png" && $tipoImagem != "jpeg") {
	        echo "<script>window.location='index.php'; alert('São aceitas apenas imagens com extenção jpg e png.');</script>";
	        $uploadOk = 0;
	    }


	    // Verifica se houve algum problema nas verificações anteriores antes de realizar o upload
	    if ($uploadOk == 0) {
	      echo "<script>window.location='index.php'; alert('A imagem não foi carregada.');</script>";
	    // Se tudo estiver correto, realiza o upload da imagem
	    } else {
	        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $imgDestino)) {    
	            echo "<script>window.location='index.php'; alert('O arquivo " . basename( $_FILES["fileToUpload"]["name"]) . " foi enviado com sucesso!');</script>";
	        } else {
	            echo "<script>window.location='index.php'; alert('Não foi possível carregar a imagem.');</script>";
	        }
	    }

    }

}

?>
