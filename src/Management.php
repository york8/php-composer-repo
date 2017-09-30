<?php
/**
 * User: York <lianyupeng1988@126.com>
 * Date: 2017-09-29 14:23
 */

namespace York8\Composer\Repo;

class Management
{
    private $jsonFile;
    private $options = [
        'list' => [
            'cn1' => 'https://packagist.phpcomposer.com',
            'cn2' => 'https://packagist.composer-proxy.org',
        ]
    ];
    private $composer;

    public function __construct($jsonFile, $composer = 'composer')
    {
        $this->jsonFile = $jsonFile;
        $this->composer = $composer;
        if (!file_exists($jsonFile)) {
            $dir = dirname($jsonFile);
            if (!file_exists($dir)) {
                mkdir($dir, null, true);
            }
            $this->save();
        } else {
            $str = file_get_contents($jsonFile);
            if (strlen($str) > 0) {
                $this->options = json_decode($str, true);
            } else {
                $this->save();
            }
        }
    }

    public function getRepos()
    {
        return $this->options['list'];
    }

    public function getRepo($name)
    {
        return $this->options['list'][$name];
    }

    public function setRepo($name, $url)
    {
        $this->options['list'][$name] = $url;
        $this->save();
    }

    public function useRepo($name, $global = true)
    {
        $global = $global ? '-g' : '';
        $url = $this->getRepo($name);
        if ($url) {
            exec("{$this->composer} config {$global} repo.packagist composer $url");
        }
    }

    public function curRepo($global = true)
    {
        $global = $global ? '-g' : '';
        exec("{$this->composer} config {$global} repo.packagist", $output);
        if (count($output) > 0) {
            $o = json_decode($output[0], true);
            return $o['url'];
        }
        return null;
    }

    private function save()
    {
        file_put_contents(
            $this->jsonFile,
            json_encode(
                $this->options,
                JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
            )
        );
    }
}