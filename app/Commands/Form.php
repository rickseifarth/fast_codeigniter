<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use CodeIgniter\CLI\GeneratorTrait;

class Form extends BaseCommand
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
    protected $name = 'app:form';

    /**
     * The Command's Description
     *
     * @var string
     */
    protected $description = 'Magica para criar o form';

    /**
     * The Command's Usage
     *
     * @var string
     */
    protected $usage = 'app:form [arguments] [options]';

    /**
     * The Command's Arguments
     *
     * @var array
     */
    protected $arguments = [
        'name' => 'nome da classe que teremos a magica'
    ];

    /**
     * The Command's Options
     *
     * @var array
     */
    protected $options = [];

    /**
     * Actually execute a command.
     *
     * @param array $params
     */
    public function run(array $params)
    {
         // logica para gerar a view 
       
        $this->component = 'View';
        $this->directory = 'Views/' . $params[0];
        $this->template  = 'form.tpl.php';

        $params[1] = $params[0];
        $params[0] = 'form';
   

        $this->classNameLang = 'CLI.generator.className.form';
        $this->generateClass($params);
    }

    protected function prepare(string $class): string
    {
        $name = $class;
        $name = str_replace("App\Views/", "", $name);
        $name = str_replace("\Form", "", $name);

        $name2 = strtolower($name);

        $name3 = ucfirst($name);

        return $this->parseTemplate(
            $class,
            ['{teste}', '{teste2}', '{teste3}'],
            [$name, $name2, $name3],
            []
        );
    }
}
