# PCRM

一个 PHP Composer 仓库地址的管理工具，用于快速添加和切换 Composer 镜像

### Authors

- [York](https://github.com/york8)

### Usage

##### 添加镜像
```bash
php bin/pcrm.php add cn1 https://packagist.phpcomposer.com
php bin/pcrm.php add cn2 https://packagist.composer-proxy.org
```

##### 列出所有添加的镜像
```bash
php bin/pcrm.php ls
```
输出：
```text
  * cn1         https://packagist.phpcomposer.com
    cn2         https://packagist.composer-proxy.org
```

##### 切换 Composer 镜像
```bash
php bin/pcrm.php use cn1
```