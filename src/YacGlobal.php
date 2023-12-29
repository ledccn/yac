<?php

namespace Ledc\Yac;

use Stringable;
use StringBackedEnum;

/**
 * 全局Yac对象，无缓存前缀
 */
class YacGlobal extends Manager
{
    /**
     * @return string|Stringable|StringBackedEnum
     */
    public static function prefix(): string|Stringable|StringBackedEnum
    {
        return '';
    }
}
