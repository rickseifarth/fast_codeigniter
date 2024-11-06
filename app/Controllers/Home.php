<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    public function save()
    {
        $arquivo = $this->request->getFile('nome');

        if ($arquivo->getError() != 0)
        {
            echo "erro ao tratar o arquivo";
        }

        $nome_arquivo = $arquivo->getRandomName();
        if ($arquivo->move('caminho_destino', $nome_arquivo))
        {
            $dados['campo_arquivo'] = 'caminho_destino/' . $nome_arquivo;
        } else {
            echo "falha ao salvar o arquivo";
        }
    }
}
