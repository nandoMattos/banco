<?php
// Essa é a PSR 4 (PHP Standard Recommendation)
spl_autoload_register(function (string $nomeCompletoDaClasse){
    // Quero transformar Alura\Banco\Modelo\Endereco em
    // src/Modelo/Endereco.php
    $caminhoArquivo =  str_replace('Alura\\Banco', 'src', $nomeCompletoDaClasse);
    $caminhoArquivo = str_replace('\\', DIRECTORY_SEPARATOR, $caminhoArquivo);
    $caminhoArquivo .= '.php';

    if (file_exists($caminhoArquivo)){
        require_once $caminhoArquivo;
    }
});