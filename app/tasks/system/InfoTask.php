<?php
// +----------------------------------------------------------------------
// | 项目信息查看脚本 [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace App\Tasks\System;

use App\Logics\System;
use limx\phalcon\Utils\File;
use Phalcon\Cli\Task;
use limx\phalcon\Cli\Color;
use Phalcon\Annotations\Adapter\Memory as MemoryAdapter;

class InfoTask extends Task
{
    /**
     * @desc   菜单
     * @author limx
     */
    public function mainAction()
    {
        echo Color::head('Help:') . PHP_EOL;
        echo Color::colorize('  项目信息脚本') . PHP_EOL . PHP_EOL;

        echo Color::head('Usage:') . PHP_EOL;
        echo Color::colorize('  php run System\\\\Info [action]', Color::FG_GREEN) . PHP_EOL . PHP_EOL;

        echo Color::head('Actions:') . PHP_EOL;
        echo Color::colorize('  version                         项目版本', Color::FG_GREEN) . PHP_EOL;
        echo Color::colorize('  annotations                     获取控制器方法注释', Color::FG_GREEN) . PHP_EOL;
    }

    public function annotationsAction()
    {
        System::getControllersAnnotations();
    }

    public function versionAction()
    {
        echo Color::head("Environment:"), PHP_EOL;
        foreach (System::getEnvironment() as $k => $v) {
            echo Color::colorize(sprintf("  %s: %s", $k, $v), Color::FG_GREEN), PHP_EOL;
        }
        echo Color::head("Versions:"), PHP_EOL;
        foreach (System::getVersions() as $k => $v) {
            echo Color::colorize(sprintf("  %s: %s", $k, $v), Color::FG_GREEN), PHP_EOL;
        }
    }
}