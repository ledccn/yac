<?php

namespace Ledc\Yac;

use BadMethodCallException;
use Stringable;
use StringBackedEnum;
use Yac;

/**
 * Yac缓存管理器
 * @mixin Yac
 * @method static bool add(string $keys, mixed $value, int $ttl = 0) 添加键值对（已存在时设置失败，返回false）
 * @method static bool set(string $keys, mixed $value, int $ttl = 0) 设置键值对
 * @method static mixed get(string|array $keys) 获取某个键的值或某些键的值
 * @method static bool delete(string|array $keys, int $ttl = 0) 删除某个键或某几个键
 * @method static bool flush() 清空缓存
 * @method static array info() 获取缓存使用情况等信息
 */
abstract class Manager implements Prefix
{
    /**
     * Yac实例
     * @var Yac
     */
    protected Yac $yac;

    /**
     * 构造函数
     */
    final public function __construct()
    {
        $prefix = static::prefix();
        $this->yac = Factory::getInstance(match (true) {
            $prefix instanceof StringBackedEnum => $prefix->value,
            $prefix instanceof Stringable => (string)$prefix,
            default => $prefix
        });
    }

    /**
     * 获取Yac实例
     * @return Yac
     */
    final public function getYac(): Yac
    {
        return $this->yac;
    }

    /**
     * 获取当前对象（单例模式）
     * @return static
     */
    final public static function getInstance(): static
    {
        static $instances = [];
        if (!isset($instances[static::class])) {
            $instances[static::class] = new static();
        }
        return $instances[static::class];
    }

    /**
     * 动态调用
     * - 在对象中调用一个不可访问方法时，__call() 会被调用
     * @param string $name
     * @param array $arguments
     * @return mixed
     */
    public function __call(string $name, array $arguments)
    {
        $yac = $this->getYac();
        if (is_callable([$yac, $name])) {
            return call_user_func_array([$yac, $name], $arguments);
        }
        throw new BadMethodCallException('未定义的方法：' . $name);
    }

    /**
     * 静态调用
     * - 在静态上下文中调用一个不可访问方法时，__callStatic() 会被调用
     * @param string $name
     * @param array $arguments
     * @return mixed
     */
    public static function __callStatic(string $name, array $arguments)
    {
        $instance = self::getInstance();
        if (is_callable([$instance, $name])) {
            return call_user_func_array([$instance, $name], $arguments);
        }
        throw new BadMethodCallException('未定义的方法：' . $name);
    }
}