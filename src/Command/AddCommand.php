<?php
/**
 * User: York <lianyupeng1988@126.com>
 * Date: 2017-09-30 10:17
 */

namespace York8\Composer\Repo\Command;


use CLIFramework\Command;

class AddCommand extends Command
{
    use RepoTrait;

    public function brief()
    {
        return 'add or set a repo url';
    }

    public function execute($name, $value)
    {
        $m = $this->getManagement();
        $m->setRepo($name, $value);
    }
}