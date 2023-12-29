<?php

namespace Ledc\Yac;

use Yac;

/**
 * 创建Yac对象的工厂类
 */
class Factory
{
    /**
     * Yac实例
     * @var array<string, Yac>
     */
    private static array $instances = [];

    /**
     * 获取Yac实例（单例模式）
     * @param string $prefix 缓存前缀
     * @return Yac
     */
    public static function getInstance(string $prefix): Yac
    {
        if (!isset(self::$instances[$prefix])) {
            self::$instances[$prefix] = new Yac($prefix);
        }
        return self::$instances[$prefix];
    }
}
