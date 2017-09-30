<?php
/**
 * User: York <lianyupeng1988@126.com>
 * Date: 2017-09-29 16:35
 */

namespace York8\Composer\Repo\Command;

use York8\Composer\Repo\Application;
use York8\Composer\Repo\Management;

trait RepoTrait
{
    private $management;

    /**
     * @return Management
     */
    public function getManagement()
    {
        if (!$this->management) {
            /** @var Application $app */
            $app = $this->getApplication();
            $opts = $app->getOptions();
            $f = $opts->config;
            $c = $opts->composer;
            $this->management = new Management($f, $c);
        }
        return $this->management;
    }
}