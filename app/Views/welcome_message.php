<?= $this->extend('layout/layout') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="card shadow">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div>
                    Code Igniter Mágico!
                </div>
                <div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <h1>Bem vindo!</h1>
            <p>Esté o codeigniter mágico!</p>
            <p>Montei esta automação para unir a facilidade do codeigniter com o spark, de forma a fazer tudo (ou quase tudo) da forma mais automática o possível</p>
            <p class="fw-bold">Como utilizar?</p>
            <ul>
                <li>Tudo o quê você precisa está no comando php spark app:magica [nome_classe]</li>
                <ul>
                    <li>Use o [nome_classe] preferencialmente em inglês, no singular e apenas uma palavra (vai precisar de ajustes no resultado se vc usar por ex: minhaClasse)</li>
                    <li>Ao utilizar o comando, o sistema vai criar:</li>
                    <ul>
                        <li>A migration: onde você vai precisar customizar os campos que você deseja pra sua tabela</li>
                        <li>O Model, onde você vai precisar definir os campos autorizados para a registro</li>
                        <li>O Controller, onde você vai precisar ajustar as regras de validação do seu modelo</li>
                        <li>As views com o nome de classe (onde estarão disponíveis a lista de todos os registros, funções de adicionar, editar e deletar) e uma chamada FORM (seu formulario para realizar tanto a inclusao quanto a edição dos registros)</li>
                        <li>As rotas no arquivo Routes</li>
                    </ul>
                </ul>
                <li class="fw-bold">Fácil não é? O foco é realmente automatizar ao máximo o processo de criação dos CRUDS para você focar no que é específico do negócio e design</li>
            </ul>
            <p class="fw-bold">O quê eu preciso saber para utilizar a ferramenta?</p>
            <ul>
                <li>codeigniter - Com certeza vc precisa conhecer (pelo menos um pouco) da framework</li>
                <li>HTML - Com ele que você vai modelar as suas páginas</li>
                <li>PHP - essa é a linguagem que conversa com o seu servidor</li>
                <li>CSS - ajustes nos estilos do seu super site</li>
            </ul>
            <p class="fw-bold">Configuração inicial:</p>
            <ol>
                <li>Extrair os dados do zip em alguma pasta</li>
                <li>Ajustar a configuração do banco de dados no arquivo App/Config/Database</li>
                <li>Ajustar o caminho (url) da aplicação no arquivo App/Config/App</li>
                <li>Criar o banco de dados, você pode utilizar o comando, via linha de comando na pasta raiz do projeto como "php spark db:create nome_do_banco"</li>
                <li>Executar a migração base (que vai gerar as tabelas de controle de usuários e sessões) "php spark migrate --all"</li>
                <li>Para testar seu site, você pode usar o comando "php spark serve" (ou utilizar um servidor web de sua escolha)</li>
            </ol>
            <p class="fw-bold">Quais recursos já estão plugados neste modelo base?</p>
            <ul>
                <li>Mantive tudo o quê geralmente utilizo nas minhas aplicações, mas você pode editar tudo o quê quiser editando o layout (VIEWS/Layout) e os recursos (PUBLIC):</li>
                <ul>
                    <li><a href="https://getbootstrap.com/" target="_blank">Bootstrap</a> - ahhhh o bootstrap, quem não ama ele não é mesmo?</li>
                    <li><a href="https://fontawesome.com/search?m=free&o=r" target="_blank">Font Aweasome Icons</a> - Icones e muitos icones! e de GRAÇA</li>
                    <li><a href="https://datatables.net/" target="_blank">Datatables.net</a> - Tabelas de forma prática, bonita, e rápida</li>
                    <li><a href="https://alex-d.github.io/Trumbowyg/" target="_blank">Trumbowyg</a> - Super editor WYSIWYG de text (em suma, faz um textarea virar um html completo com edição e zas e zas)</li>
                </ul>
            </ul>
            <p class="fw-bold">Dicas de ouro</p>
            <ul>
                <li>Mudar o tema do layout para escuro (dark?)</li>
                <ul>
                    <li>No arquivo head.html adicione na tag html o atributo data-bs-theme="dark"</li>
                </ul>
                <li>Customizar cores e afins</li>
                <ul>
                    <li>Isso é com você, utilize as classes do bootstrap e mande bala na sua arte.</li>
                    <li>O layout dos arquivos gerados com o App:magica estão disponíveis no caminho App/Commands/Views</li>
                </ul>
                <li>Alguns tipos de campos que podem ser usados nas migrations</li>
                <ul>
                    <li>VARCHAR</li>
                    <li>INT</li>
                    <li>TEXT</li>
                    <li>DOUBLE</li>
                    <li>FLOAT</li>
                    <li>BOOLEAN</li>
                    <li>DATETIME</li>
                    <li>DATE</li>
                    <li>TIME</li>
                </ul>
                <li>Regras de validação legais (as que mais uso)</li>
                <ul>
                    <li>required - Requerido tem que estar preenchido</li>
                    <li>alpha - somente letras</li>
                    <li>alpha_numeric - somente letras e numeros</li>
                    <li>is_unique - valida se o registro é unico nessa tabela / base</li>
                    <li>integer - somente números inteiros</li>
                    <li>max_length[xxx] - tamanho maximo do campo</li>
                    <li>min_length[xxx] - tamanho minimo do campo</li>
                </ul>
                <li>Fazer uma consulta com relacionamento entre modelos (é esse o codeigniter não é tão mãe assim não rs)</li>
                <ul>
                    <li>no seu modelo a consulta deve ser na cadência</li>
                    <li>return $this->select('user_plans.*, plans.*, payments.*')
                        ->join('plans', 'user_plans.plan_id = plans.id', 'inner')
                        ->join('payments', 'payments.id = user_plans.payment_id', 'inner')
                        ->where(['user_id' => $user_id])->findAll();</li>
                </ul>
                <li>Utilizar o Trumbowyg</li>
                <ul>
                    <li>Utilize a section scripts do modelo e inclua o seguinte fonte:</li>
                    <li>$('textarea').trumbowyg();</li>
                    <li>onde o 'textarea' pode ser o id do campo, classe ou tipo de campo</li>
                    <li>Recomendo muito a consulta da documentação do Trumbowyg, tem vários plugins e configurações legais para fazer ^^</li>
                </ul>
                <li>Upload de arquivos</li>
                <ul>
                    <li>no codeigniter esse tema é super facilitado, veja só</li>
                    <li>no view/class/form vc cria o campo que vai receber seu arquivo (user o helper form_input, não esqueça de trocar o form_open por form_open_multipart) </li>
                    <li>no controller, vc valida o arquivo (ai vai precisar escrever sua logica)</li>
                    <li>e para salvar os dados vai usar: </li>
                    <li>$arquivo = $this->request->getFile('campo_arquivo');</li>
                    <li>Faz as validações com o q vc precisa ($arquivo->getError())</li>
                    <li>if ($arquivo->getError() != 0){ echo "erro ao tratar o arquivo"; }</li>
                    <li>se passar na validação vamos salvar, testando ao mover o arquivo do servidor</li>
                    <li>$nome_arquivo = $arquivo->getRandomName();</li>
                    <li>if ($arquivo->move('caminho_destino', $nome_arquivo)){</li>
                    <li> $dados['campo_arquivo'] = 'caminho_destino/' . $nome_arquivo;}</li>
                    <li>else {</li>
                    <li> echo "falha ao salvar o arquivo";}</li>
                </ul>
                <li>Icones do font Aweasome</li>
                <ul>
                    <li>Muito fácil! adicione a tag i com a classe como no site deles (exemplo fa-regular fa-face-smile-wink) <i class="fa-regular fa-face-smile-wink"></i></li>
                </ul>
            </ul>
            <p class="fw-bold">E quem é você mesmo?</p>
            <ul>
                <li>Opa, me chamo Henrique Seifarth Lovato e sou apaixonado por tecnologias ágeis para gerar valor rapidamente me nosso dia a dia.</li>
                <li>Você pode saber mais no <a href="https://henriqueseifarth.com.br" target="_blank">Meu Site</a></li>
            </ul>
        </div>
    </div>
</div>
<?= $this->endSection() ?>