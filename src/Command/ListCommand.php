<?php
/**
 * User: York <lianyupeng1988@126.com>
 * Date: 2017-09-29 16:12
 */

namespace York8\Composer\Repo\Command;

use CLIFramework\Command;

class ListCommand extends Command
{
    use RepoTrait;

    public function brief()
    {
        return 'list all repo urls';
    }

    public function aliases()
    {
        return 'ls';
    }

    public function execute()
    {
        $m = $this->getManagement();
        $ls = $m->getRepos();
        $cur = $m->curRepo();
        foreach ($ls as $n => $v) {
            $selected = '';
            if ($v === $cur) {
                $selected = '*';
            }
            printf("%3s %-10s\t%s\n", $selected, $n, $v);
        }
    }
}