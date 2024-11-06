<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use CodeIgniter\CLI\GeneratorTrait;
use Config\Database;
use Config\Migrations;
use Config\Session as SessionConfig;

class Migration extends BaseCommand
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
    protected $name = 'app:migration';

    /**
     * The Command's Description
     *
     * @var string
     */
    protected $description = 'Magica para criar a migração';

    /**
     * The Command's Usage
     *
     * @var string
     */
    protected $usage = 'app:migration [arguments] [options]';

    /**
     * The Command's Arguments
     *
     * @var array
     */
    protected $arguments = [
        'name' => 'O nome da classe para a migração',
    ];

    /**
     * The Command's Options
     *
     * @var array
     */
    protected $options = [
        '--session'   => 'Generates the migration file for database sessions.',
        '--table'     => 'Table name to use for database sessions. Default: "ci_sessions".',
        '--dbgroup'   => 'Database group to use for database sessions. Default: "default".',
        '--namespace' => 'Set root namespace. Default: "APP_NAMESPACE".',
        '--suffix'    => 'Append the component title to the class name (e.g. User => UserMigration).',
    ];

    /**
     * Actually execute a command.
     *
     * @param array $params
     */
    public function run(array $params)
    {
        $this->component = 'Migration';
        $this->directory = 'Database\Migrations';
        $this->template  = 'migration.tpl.php';

        if (array_key_exists('session', $params) || CLI::getOption('session')) {
            $table     = $params['table'] ?? CLI::getOption('table') ?? 'ci_sessions';
            $params[0] = "_create_{$table}_table";
        }

        $this->classNameLang = 'CLI.generator.className.migration';
        $this->generateClass($params);
    }

    protected function prepare(string $class): string
    {
        $data            = [];
        $data['session'] = false;

        if ($this->getOption('session')) {
            $table   = $this->getOption('table');
            $DBGroup = $this->getOption('dbgroup');

            $data['session']  = true;
            $data['table']    = is_string($table) ? $table : 'ci_sessions';
            $data['DBGroup']  = is_string($DBGroup) ? $DBGroup : 'default';
            $data['DBDriver'] = config(Database::class)->{$data['DBGroup']}['DBDriver'];

            /** @var SessionConfig|null $session */
            $session = config(SessionConfig::class);

            $data['matchIP'] = $session->matchIP;
        }

        $data['table'] = plural($class);
        $data['table'] = str_replace("App\Database\Migrations\\", "", $data['table']);

        return $this->parseTemplate($class, [], [], $data);
    }

    /**
     * Change file basename before saving.
     */
    protected function basename(string $filename): string
    {
        return gmdate(config(Migrations::class)->timestampFormat) . basename($filename);
    }
}
