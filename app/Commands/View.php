<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use CodeIgniter\CLI\GeneratorTrait;

class View extends BaseCommand
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
    protected $name = 'app:view';

    /**
     * The Command's Description
     *
     * @var string
     */
    protected $description = 'Magica para criar a view';

    /**
     * The Command's Usage
     *
     * @var string
     */
    protected $usage = 'app:view [arguments] [options]';

    /**
     * The Command's Arguments
     *
     * @var array
     */
    protected $arguments = [
        'name' => 'Nome da classe que a magica vai atuar'
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
         $this->template      = 'view.tpl.php';
         $this->classNameLang = 'CLI.generator.className.view';

        $className = $this->qualifyClassName();
        $viewName  = decamelize(class_basename($className));
        $viewName  = preg_replace(
            '/([a-z][a-z0-9_\/\\\\]+)(_cell)$/i',
            '$1',
            $viewName
        ) ?? $viewName;
        $namespace = substr($className, 0, strrpos($className, '\\') + 1);
        $viewName = ucfirst($viewName);

        $this->generateView($namespace . $viewName, $params);
    }
}
