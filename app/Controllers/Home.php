<?php

namespace App\Controllers;
use CodeIgniter\Shield\Validation\ValidationRules;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    //*********************************** */
    //metodos para trocar a senha do usuário
    //*********************************** */
    public function change()
    {
        return view('auth/change.php');
    }

    public function change_save()
    {
        $dados = $this->request->getPost();
        //validar a senha atual
        $result = auth()->check([
            'email' => auth()->user()->email,
            'password' => $dados['password']
        ]);

        if (!$result->isOK())
        {
            return redirect()->back()->withInput()->with('error', 'Os dados de acesso não são válidos.');
        }
        else {
            //validar a senha e a confiramção 
            if ($dados['new_password'] != $dados['confirm_password']){
                return redirect()->back()->withInput()->with('error', 'A nova senha e a confirmação não coincidem.');
            }

            //carregar o provider do shield
            $users = auth()->getProvider();
            // setar a senha numa nova instancia do usuario
            $user = auth()->user()->setPassword($dados['new_password']);
            //instanciar e carregar as regras de validação de senha definidas no shield
            $validation = new ValidationRules();
            $rules = $validation->getRegistrationRules();
            //separar somente a validação da senha (as outras de e-mail e username darão erro pq esse registro tem que ser unico na base)
            $new_rules['password'] = $rules['password'];
            //ajustar os dados da nova senha para a senha, com isso conseguimos realizar a validação
            $dados['password'] = $dados['new_password'];

            //validar se senha esta ok com as regras definidas
            if (!$this->validateData($dados, $new_rules)){
                return redirect('/')->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            $users->save($user);
            return redirect('/')->with('message', 'Senha alterada com sucesso!');
        }
    }
  
}
