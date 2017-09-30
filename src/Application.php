<?php
/**
 * User: York <lianyupeng1988@126.com>
 * Date: 2017-09-29 13:21
 */

namespace York8\Composer\Repo;

use CLIFramework\Application as BaseApplication;

class Application extends BaseApplication
{
    const NAME = 'pcrm.php';
    const VERSION = '0.0.1';

    public $showAppSignature = false;

    public function brief()
    {
        return 'PHP Composer repo.packagist management';
    }

    /**
     * @param \GetOptionKit\OptionCollection $opts
     * {@inheritdoc}
     */
    public function options($opts)
    {
        $script = realpath($_SERVER['SCRIPT_FILENAME']);
        $dir = dirname($script);
        $opts->add('v|verbose', 'verbose message');
        $opts->add('c|config:', 'config file')
            ->defaultValue($dir . DIRECTORY_SEPARATOR . 'pcrm-config.json')
            ->isa('string');
        $opts->add('composer:', 'path to composer')
            ->defaultValue('composer')
            ->isa('string');
    }

    public function init()
    {
        if ($this->isCommandAutoloadEnabled()) {
            $this->autoloadCommands();
        }
        $this->command('list');
        $this->command('add');
        $this->command('use');
        $this->command('archive', 'CLIFramework\\Command\\ArchiveCommand');
        $this->command('help', 'CLIFramework\\Command\\HelpCommand');
    }
}