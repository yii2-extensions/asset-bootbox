<p align="center">
    <a href="https://github.com/terabytesoftw/asset-bootbox" target="_blank">
            <img src="https://lh3.googleusercontent.com/D9TFw1F6ddPuheDc_tpNptTdvTg-FNNpjLSBN14X6Sc-3JDiOxfE67rEh4OZfygonx1tKei2b2DEOHDLjF6T3xl8e-rkEEPZeGqLTWcS_v2cBRlyo0vcZLDHG5ivSDGIWCsenbol=w2400" height="50px;">
    </a>
    <h1 align="center">Asset BootBox</h1>
</p>
<p align="center">
    <a href="https://packagist.org/packages/terabytesoftw/asset-bootbox" target="_blank">
        <img src="https://poser.pugx.org/terabytesoftw/asset-bootbox/v/unstable" alt="Unstable Version">
    </a>
    <a href="https://travis-ci.org/terabytesoftw/asset-bootbox" target="_blank">
        <img src="https://travis-ci.org/terabytesoftw/asset-bootbox.svg?branch=master" alt="Build Status">
    </a>
    <a href="https://scrutinizer-ci.com/g/terabytesoftw/asset-bootbox/" target="_blank">
        <img src="https://scrutinizer-ci.com/g/terabytesoftw/asset-bootbox/badges/build.png?b=master" alt="Build Status">
    </a>
    <a href="https://scrutinizer-ci.com/g/terabytesoftw/asset-bootbox/?branch=master" target="_blank">
         <img src="https://scrutinizer-ci.com/g/terabytesoftw/asset-bootbox/badges/quality-score.png?b=master" alt="Code Quality">
    </a>
    <a href="https://scrutinizer-ci.com/code-intelligence" target="_blank">
         <img src="https://scrutinizer-ci.com/g/terabytesoftw/asset-bootbox/badges/code-intelligence.svg?b=master" alt="Code Intelligence Status">
    </a>
    <a href="https://codeclimate.com/github/terabytesoftw/asset-bootbox/maintainability" target="_blank">
        <img src="https://api.codeclimate.com/v1/badges/1da0f2c92423f3603ee2/maintainability" alt="Maintainability">
    </a>
    <a href="https://github.styleci.io/repos/187356337">
        <img src="https://github.styleci.io/repos/187356337/shield?branch=master" alt="StyleCI">
    </a>		
</p>

</br>

<p align="center">
    <img src="https://lh3.googleusercontent.com/2I6_c5DTJHO0Lbd2OastgBiyS9flFoVWtY4VKra947xTOKL0-eqqyBCpS6ffCNuetokAoIjjiHqiTbUfesXKxHJQRz67j56a7PDZKksUjhgav7HMbUVojJJ4j6Gtf2UbkWAbFrW7=w2400" height="100px;">
</p>

### **DIRECTORY STRUCTURE:**

```
src/
  assets/           contains assets extension
    js/             contains js custom extension
tests/              contains tests codeception for extension
vendor/             contains dependent 3rd-party packages
```

### **REQUIREMENTS:**

- The minimum requirement by this project template that your Web server supports:
    - PHP 7.2 or higher.
    - [Composer Config Plugin](https://github.com/hiqdev/composer-config-plugin).    

### **INSTALLATION:**

<p align="justify">
If you do not have <a href="http://getcomposer.org/" title="Composer" target="_blank">Composer</a>, you may install it by following the instructions at <a href="http://getcomposer.org/doc/00-intro.md#installation-nix" title="getcomposer.org" target="_blank">getcomposer.org</a>.
</p>

You can then install this extension using the following command composer:

~~~
composer require terabytesoftw/asset-bootbox '^1.0@dev'
~~~

or add composer.json:

~~~
"terabytesoftw/asset-bootbox":"^1.0@dev"
~~~

### **USAGE:**

~~~
<?php

\terabytesoft\assets\BootBoxAsset::register($this);

echo yii\helpers\Html::a(
    'Delete',
    '#',
    [
        'class' => 'btn btn-danger',
        'data' => [
            'confirm' => 'Are you sure you want to delete this item?',
            'method' => 'post',
        ],
    ]
);
~~~

### **RUN TESTS CODECEPTION:**

~~~
$ cd vendor/terabytesoftw/asset-bootbox
$ composer update --prefer-dist -vvv
$ vendor/bin/codecept run
~~~

### **WEB SERVER SUPPORT:**

- Apache.
- Nginx.
- OpenLiteSpeed.

### **DOCUMENTATION STYLE GUIDE:**

[Style CI Documentation PSR2.](https://docs.styleci.io/presets#psr2)

### **LICENCE:**
[![License](https://poser.pugx.org/terabytesoftw/asset-bootbox/license)](LICENSE.md)
[![YiiFramework](https://img.shields.io/badge/Powered_by-Yii_Framework-green.svg?style=flat)](https://www.yiiframework.com/)
[![Total Downloads](https://poser.pugx.org/terabytesoftw/asset-bootbox/downloads)](https://packagist.org/packages/terabytesoftw/asset-bootbox)
[![StyleCI](https://github.styleci.io/repos/193722479/shield?branch=master)](https://github.styleci.io/repos/193722479)
