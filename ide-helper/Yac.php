<?php

/** @noinspection PhpDefineCanBeReplacedWithConstInspection */
/**
 * Yac自动补全类(基于2.3.1)
 * @author david(https://www.iyuu.cn)
 * @modified 2023年12月28日11:42:45
 */
//Yac的限制:
//1. key的长度最大不能超过48个字符. (我想这个应该是能满足大家的需求的, 如果你非要用长Key, 可以MD5以后再存)
//2. Value的最大长度不能超过64M, 压缩后的长度不能超过1M.
//3. 当内存不够的时候, Yac会有比较明显的踢出率, 所以如果要使用Yac, 那么尽量多给点内存吧.
/**
 * php.ini配置选项:
 * yac缓存压缩开关： yac.compress_threshold=-1
 * 是否启用yac： yac.enable=1
 * 是否启用yac的cli： yac.enable_cli=0
 * yac的键所占用的总的内存大小： yac.keys_memory_size=4M
 * yac的键值所占用的总的内存大小： yac.values_memory_size=64M
 * 是否开启yac的debug模式： yac.debug=0
 */
/**
 * yac 版本
 */
define('YAC_VERSION', '2.3.1');
/**
 * yac 键的最大长度
 */
define('YAC_MAX_KEY_LEN', 48);
/**
 * yac 键值的最大长度
 */
define('YAC_MAX_VALUE_RAW_LEN', 67108863);
/**
 * yac 原始数据的最大压缩长度
 */
define('YAC_MAX_RAW_COMPRESSED_LEN', 1048576);
/**
 * yac使用的序列化方法
 */
define('YAC_SERIALIZER', 'PHP');

/**
 * Yac是一个用于PHP的共享和无锁存储器；用户数据缓存.它可以用于替换APC或本地memcached。
 */
class Yac
{
    /**
     * 缓存键前缀
     * @var string $_prefix
     */
    protected string $_prefix = '';

    /**
     * @param string $prefix 缓存键前缀
     */
    public function __construct(string $prefix)
    {
    }

    /**
     * 添加键值对
     * @param string $keys 键名
     * @param mixed $value 键值
     * @param int $ttl 有效期
     * @return bool
     */
    public function add(string $keys, mixed $value, int $ttl = 0): bool
    {
    }

    /**
     * 设置键值
     * @param array|string $keys 键名或键值对
     * @param mixed $value 键值
     * @param int $ttl 有效期
     * @return bool
     * @example
     */
    public function set(array|string $keys, mixed $value, int $ttl = 0): bool
    {
    }

    /**
     * 设置键值的魔术方法
     * @example $yac->goods = 'apple';//相当于$yac->set('goods', 'apple');
     * @param string $key 键
     * @param mixed $value 值
     * @return bool
     */
    public function __set(string $key, mixed $value)
    {
    }

    /**
     * 获取某个键的值或某些键的值
     * @param string|array $key 键名
     * @return mixed 成功时mixed，失败时false
     * @example $yac->get('goods');
     * $yac->get(array('goods', 'test'));
     */
    public function get(string|array $key): mixed
    {
    }

    /**
     * 获取某个键值的魔术方法
     * @example return $yac->goods;//相当于$yac->get('goods')
     * @param string $keys 键名
     * @return mixed 成功时mixed，失败时false
     */
    public function __get(string $keys)
    {
    }

    /**
     * 删除某个键或某几个键
     * @param mixed $keys 要删除的键
     * @param int $ttl 延迟删除时间
     * @return bool
     * @example $yac->delete('goods');
     * $yac->delete(array('goods', 'test'));
     */
    public function delete(string|array $keys, int $ttl = 0): bool
    {
    }

    /**
     * 刷新缓存，即清空缓存
     * @return bool
     * @example
     */
    public function flush(): bool
    {
    }

    /**
     * 获取缓存使用情况等信息
     * @return array
     * @example var_dump($yac->info());
     * array(11) {
     *     ["memory_size"]=> int(541065216)
     *     ["slots_memory_size"]=> int(4194304)
     *     ["values_memory_size"]=> int(536870912)
     *     ["segment_size"]=> int(4194304)
     *     ["segment_num"]=> int(128)
     *     ["miss"]=> int(0)
     *     ["hits"]=> int(955)
     *     ["fails"]=> int(0)
     *     ["kicks"]=> int(0)
     *     ["slots_size"]=> int(32768)
     *     ["slots_used"]=> int(955)
     * }
     */
    public function info(): array
    {
    }

    /**
     * 导出缓存
     * @param int $num
     * @return mixed
     * @example
     */
    public function dump(int $num): mixed
    {
    }
}
