<?php

namespace Ledc\Yac;

use Stringable;
use StringBackedEnum;

/**
 * Yac缓存前缀接口
 */
interface Prefix
{
    /**
     * 定义缓存前缀
     * - 抽象方法，子类必须实现
     * @return string|Stringable|StringBackedEnum
     */
    public static function prefix(): string|Stringable|StringBackedEnum;
}
