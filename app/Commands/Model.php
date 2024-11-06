<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use CodeIgniter\CLI\GeneratorTrait;

class Model extends BaseCommand
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
    protected $name = 'app:model';

    /**
     * The Command's Description
     *
     * @var string
     */
    protected $description = 'Magica para criar o model';

    /**
     * The Command's Usage
     *
     * @var string
     */
    protected $usage = 'app:model [arguments] [options]';

    /**
     * The Command's Arguments
     *
     * @var array
     */
    protected $arguments = [
        'name' => 'nome da classe',
    ];

    /**
     * The Command's Options
     *
     * @var array
     */
    protected $options = [
        '--table'     => 'Supply a table name. Default: "the lowercased plural of the class name".',
        '--dbgroup'   => 'Database group to use. Default: "default".',
        '--return'    => 'Return type, Options: [array, object, entity]. Default: "array".',
        '--namespace' => 'Set root namespace. Default: "APP_NAMESPACE".',
        '--suffix'    => 'Append the component title to the class name (e.g. User => UserModel).',
        '--force'     => 'Force overwrite existing file.',
    ];

    /**
     * Actually execute a command.
     *
     * @param array $params
     */
    public function run(array $params)
    {
        $this->component = 'Model';
        $this->directory = 'Models';
        $this->template  = 'model.tpl.php';

        $this->classNameLang = 'CLI.generator.className.model';

        $params[0] = $params[0] . "Model";
        $this->generateClass($params);
    }

    protected function prepare(string $class): string
    {
        $table   = $this->getOption('table');
        $dbGroup = $this->getOption('dbgroup');
        $return  = $this->getOption('return');

        $baseClass = class_basename($class);

        if (preg_match('/^(\S+)Model$/i', $baseClass, $match) === 1) {
            $baseClass = $match[1];
        }

        $table  = is_string($table) ? $table : plural(strtolower($baseClass));
        $return = is_string($return) ? $return : 'array';

        if (! in_array($return, ['array', 'object', 'entity'], true)) {
            // @codeCoverageIgnoreStart
            $return = CLI::prompt(lang('CLI.generator.returnType'), ['array', 'object', 'entity'], 'required');
            CLI::newLine();
            // @codeCoverageIgnoreEnd
        }

        if ($return === 'entity') {
            $return = str_replace('Models', 'Entities', $class);

            if (preg_match('/^(\S+)Model$/i', $return, $match) === 1) {
                $return = $match[1];

                if ($this->getOption('suffix')) {
                    $return .= 'Entity';
                }
            }

            $return = '\\' . trim($return, '\\') . '::class';
            $this->call('make:entity', array_merge([$baseClass], $this->params));
        } else {
            $return = "'{$return}'";
        }

        return $this->parseTemplate($class, ['{dbGroup}', '{table}', '{return}'], [$dbGroup, $table, $return], compact('dbGroup'));
    }
}
