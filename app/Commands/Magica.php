<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use CodeIgniter\CLI\GeneratorTrait;

class Magica extends BaseCommand
{

    use GeneratorTrait;
    /**
     * The Command's Group
     *
     * @var string
     */
    protected $group = 'App';

    /**
     * The Command's Name
     *
     * @var string
     */
    protected $name = 'app:magica';

    /**
     * The Command's Description
     *
     * @var string
     */
    protected $description = 'Mágica para fazer o MVC completo e funcional s2';

    /**
     * The Command's Usage
     *
     * @var string
     */
    protected $usage = 'app:magica [arguments] [options]';

    /**
     * The Command's Arguments
     *
     * @var array
     */
    protected $arguments = [];

    /**
     * The Command's Options
     *
     * @var array
     */
    protected $options = [
        'name' => 'nome da classe no singular'
    ];

    // caminho da aplicação

    protected $distPath = APPPATH;

    /**
     * Actually execute a command.
     *
     * @param array $params
     */
    public function run(array $params)
    {
        $this->params = $params;

        $options = [];

        if ($this->getOption('namespace')) {
            $options['namespace'] = $this->getOption('namespace');
        }

        if ($this->getOption('suffix')) {
            $options['suffix'] = null;
        }

        if ($this->getOption('force')) {
            $options['force'] = null;
        }

        $controllerOpts = [];

        if ($this->getOption('bare')) {
            $controllerOpts['bare'] = null;
        } elseif ($this->getOption('restful')) {
            $controllerOpts['restful'] = $this->getOption('restful');
        }

        $modelOpts = [
            'table'   => $this->getOption('table'),
            'dbgroup' => $this->getOption('dbgroup'),
            'return'  => $this->getOption('return'),
        ];

        $class = $params[0] ?? CLI::getSegment(2);

        // Call those commands!
        $this->call('app:controller', array_merge([$class], $controllerOpts, $options));
        $this->call('app:model', array_merge([$class], $modelOpts, $options));
        $this->call('app:form', array_merge([$class], $options));
        $this->call('app:view', array_merge([$class], $options));
        $this->call('app:migration', array_merge([$class], $options));

        $uClass = ucfirst($class);
        //escrever as rotas

        $file = 'Config/Routes.php';
        $code = "\n\n//rota da classe $class gerada com magica\n";
        $code .= '$routes->get(\'' . $class . '\', \'' . $uClass . '::index\');' . "\n";
        $code .= '$routes->get(\'' . $class . '/add\', \'' . $uClass . '::add\');' . "\n";
        $code .= '$routes->get(\'' . $class . '/edit/(:num)\', \'' . $uClass . '::edit/$1\');' . "\n";
        $code .= '$routes->post(\'' . $class . '/save\', \'' . $uClass . '::save\');' . "\n";
        $code .= '$routes->post(\'' . $class . '/save/(:num)\', \'' . $uClass . '::save/$1\');' . "\n";
        $code .= '$routes->get(\'' . $class . '/delete/(:num)\', \'' . $uClass . '::delete/$1\');' . "\n";

        $this->add($file, $code);

         //ajustar os @ dos arquivos
         $file = $this->distPath . "Views/$class/$uClass.php";;
         file_put_contents($file,str_replace('@','',file_get_contents($file)));
 
         $file     = $this->distPath . "Views/$class/Form.php";
         file_put_contents($file,str_replace('@','',file_get_contents($file)));

        // Escrever as rotas pra facilitar
        CLI::write("Não se esqueça, se estiver com o shield ['filter' => 'group:admin'] filtra por grupo ou ['filter' => 'session'] exige que esteja logado", "white", "green");
        CLI::write("Sequencia de uso da rotina:", "white", "blue");
        CLI::write("1 - Ajustar a migration gerada, colocando os campos da tabela", "white", "blue");
        CLI::write("2 - executar a migration", "white", "blue");
        CLI::write("3 - ajustar o model, definindo a permissão dos campos que podem ser editados", "white", "blue");
        CLI::write("4 - ajustar o controller, incluindo as regras de validação", "white", "blue");
        CLI::write("5 - ajustar as duas views para ajustar os títulos e incluir os campos necessários", "white", "blue");
        CLI::write("SER FELIZ", "green", "light_gray");
    }

    //função que adiciona dados no arquivo
    protected function add(string $file, string $code): void
    {
        $path      = $this->distPath . $file;
        $cleanPath = clean_path($path);

        $content = file_get_contents($path);
        $output = $content . $code;

        write_file($path, $output);
    }
}
