<?php
/**
 * User: York <lianyupeng1988@126.com>
 * Date: 2017-09-30 10:28
 */

namespace York8\Composer\Repo\Command;

use CLIFramework\Command;

class UseCommand extends Command
{
    use RepoTrait;

    public function brief()
    {
        return 'use the repo for composer';
    }

    public function execute($name)
    {
        $m = $this->getManagement();
        $m->useRepo($name);
    }
}