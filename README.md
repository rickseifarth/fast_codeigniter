# Bem vindo!
## Esté o codeigniter mágico!

Montei esta automação para unir a facilidade do codeigniter com o spark, de forma a fazer tudo (ou quase tudo) da forma mais automática o possível

## Como utilizar?

* Tudo o quê você precisa está no comando php spark app:magica [nome_classe]
* Use o [nome_classe] preferencialmente em inglês, no singular e apenas uma palavra (vai precisar de ajustes no resultado se vc usar por ex: minhaClasse)
* Ao utilizar o comando, o sistema vai criar:
	* A migration: onde você vai precisar customizar os campos que você deseja pra sua tabela
	* O Model, onde você vai precisar definir os campos autorizados para a registro
	* O Controller, onde você vai precisar ajustar as regras de validação do seu modelo
	* As views com o nome de classe (onde estarão disponíveis a lista de todos os registros, funções de adicionar, editar e deletar) e uma chamada FORM (seu formulario 	para realizar tanto a inclusao quanto a edição dos registros)
	* As rotas no arquivo Routes
* Fácil não é? O foco é realmente automatizar ao máximo o processo de criação dos CRUDS para você focar no que é específico do negócio e design

## O quê eu preciso saber para utilizar a ferramenta?

* codeigniter - Com certeza vc precisa conhecer (pelo menos um pouco) da framework
* HTML - Com ele que você vai modelar as suas páginas
* PHP - essa é a linguagem que conversa com o seu servidor
* CSS - ajustes nos estilos do seu super site

## Configuração inicial:

* Extrair os dados do zip em alguma pasta
* Ajustar a configuração do banco de dados no arquivo App/Config/Database
* Ajustar o caminho (url) da aplicação no arquivo App/Config/App
* Criar o banco de dados, você pode utilizar o comando, via linha de comando na pasta raiz do projeto como "php spark db:create nome_do_banco"
* Executar a migração base (que vai gerar as tabelas de controle de usuários e sessões) "php spark migrate --all"
* Para testar seu site, você pode usar o comando "php spark serve" (ou utilizar um servidor web de sua escolha)

## Quais recursos já estão plugados neste modelo base?

* Mantive tudo o quê geralmente utilizo nas minhas aplicações, mas você pode editar tudo o quê quiser editando o layout (VIEWS/Layout) e os recursos (PUBLIC):
	* [Bootstrap](https://getbootstrap.com/) - ahhhh o bootstrap, quem não ama ele não é mesmo?
	* [Font Aweasome Icons](https://fontawesome.com/search?o=r&m=free) - Icones e muitos icones! e de GRAÇA
	* [Datatables.net](https://datatables.net/) - Tabelas de forma prática, bonita, e rápida
	* [Trumbowyg](https://alex-d.github.io/Trumbowyg/) - Super editor WYSIWYG de text (em suma, faz um textarea virar um html completo com edição e zas e zas)

## Dicas de ouro

* Mudar o tema do layout para escuro (dark?)

	* No arquivo head.html adicione na tag html o atributo data-bs-theme="dark"
	* Customizar cores e afins
	* Isso é com você, utilize as classes do bootstrap e mande bala na sua arte.
	* O layout dos arquivos gerados com o App:magica estão disponíveis no caminho App/Commands/Views

* Alguns tipos de campos que podem ser usados nas migrations
	* VARCHAR
	* INT
	* TEXT
	* DOUBLE
	* FLOAT
	* BOOLEAN
	* DATETIME
	* DATE
	* TIME

* Regras de validação legais (as que mais uso)
	* required - Requerido tem que estar preenchido
	* alpha - somente letras
	* alpha_numeric - somente letras e numeros
	* is_unique - valida se o registro é unico nessa tabela / base
	* integer - somente números inteiros
	* max_length[xxx] - tamanho maximo do campo
	* min_length[xxx] - tamanho minimo do campo

* Fazer uma consulta com relacionamento entre modelos (é esse o codeigniter não é tão mãe assim não rs)
	* no seu modelo a consulta deve ser na cadência
	```
	return $this->select('user_plans.*, plans.*, payments.*')->join('plans', 'user_plans.plan_id = plans.id', 'inner')
		->join('payments', 'payments.id = user_plans.payment_id', 'inner') ->where(['user_id' => $user_id])->findAll();
	```

* Utilizar o Trumbowyg
	* Utilize a section scripts do modelo e inclua o seguinte fonte:
	```
	$('textarea').trumbowyg(
		lang: 'pt_br',
		btns: [
			['viewHTML'],
			['undo', 'redo'], // Only supported in Blink browsers
			['formatting'],
			['strong', 'em', 'del'],
			['foreColor', 'backColor'],
			['superscript', 'subscript'],
			['link'],
			['emoji'],
			['insertImage'],
			['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
			['unorderedList', 'orderedList'],
			['horizontalRule'],
			['removeformat'],
			['fullscreen']
		]
	);
	```
	* 
	* onde o 'textarea' pode ser o id do campo, classe ou tipo de campo
	* Recomendo muito a consulta da documentação do Trumbowyg, tem vários plugins e configurações legais para fazer ^^
	* Outra coisa importante! Quando um formulário recarrega com um erro de validação do codeiginiter, você pode ter problemas com a função old na formatação desse campo. Para resolver não esqueça do seguimte parametro:
	```
	old('seu_campo', 'valor_padrao', 'raw') //o raw que é importante, pois ajusta a formatação dos campos
	```

* Upload de arquivos
	* no codeigniter esse tema é super facilitado, veja só
	* no view/class/form vc cria o campo que vai receber seu arquivo (user o helper form_input, não esqueça de trocar o form_open por form_open_multipart)
	* no controller, vc valida o arquivo (ai vai precisar escrever sua logica)
	* e para salvar os dados vai usar:
	```
	$arquivo = $this->request->getFile('campo_arquivo');
	```
	* Faz as validações com o q vc precisa ($arquivo->getError())
	```
	if ($arquivo->getError() != 0){ echo "erro ao tratar o arquivo"; }
	```
	* se passar na validação vamos salvar, testando ao mover o arquivo do servidor
	```
	$nome_arquivo = $arquivo->getRandomName();
	if ($arquivo->move('caminho_destino', $nome_arquivo)){
		$dados['campo_arquivo'] = 'caminho_destino/' . $nome_arquivo;}
	else {
		echo "falha ao salvar o arquivo";
	}
	```

* Icones do font Aweasome
	* Muito fácil! adicione a tag i com a classe como no site deles (exemplo fa-regular fa-face-smile-wink) 

## E quem é você mesmo?
* Opa, me chamo Henrique Seifarth Lovato e sou apaixonado por tecnologias ágeis para gerar valor rapidamente me nosso dia a dia.
* Você pode saber mais no [Meu Site](https://henriqueseifarth.com.br)
