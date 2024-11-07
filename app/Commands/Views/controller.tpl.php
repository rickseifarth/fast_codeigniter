<@php

namespace {namespace};

use {useStatement};
use CodeIgniter\HTTP\ResponseInterface;

class {class} extends {extends}
{
    /**
        * Super controlador feito com mágica!
    */
   
    public function index()
    {
        $model = model('{class}Model');
        

        return view('{class}/{class}', ['{class}' => $model->findAll()]);
    }

    public function add()
    {
        return view('{class}/form');
    }

    public function edit($id)
    {
        $model = model('{class}Model');

        return view('{class}/form', ['{class}' => $model->find($id)]);
    }

    public function delete($id)
    {
        $model = model('{class}Model');
        $model->delete($id);
        return redirect('{class}')->with('message', '{class} deletado com sucesso!');
    }

    public function save()
    {
        $model = model('{class}Model');

        $dados = $this->request->getPost();

        //Ajuste as regras de validação do seu modelo aqui!

        $rules = [
            'name' => ['label' => 'Name', 'rules' => 'required|max_length[100]|min_length[3]']
            ];

        if (!$this->validateData($dados, $rules)){
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        $model->save($dados);

        return redirect('{class}')->with('message', '{class} salvo com sucesso!');
    }
}
