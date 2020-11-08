<?php
/**
 * PHP version 7
 * lruCache.php
 * @info
 * @author Daisy
 * @date 2020/11/9 12:08 AM
 */
class LRUCache
{
    protected $capacity;
    protected $hash;
    protected $used;
    /**
     * @param Integer $capacity
     */
    public function __construct($capacity)
    {
        $this->capacity = $capacity;
        $this->hash = [];
        $this->used = [];
    }

    /**
     * @param Integer $key
     * @return Integer
     */
    public function get($key)
    {
        if (isset($this->hash[$key])) {
            $index = array_search($key, $this->used);
            unset($this->used[$index]);
            $this->used[] = $key;
            return $this->hash[$key];
        }
        return -1;
    }

    /**
     * @param Integer $key
     * @param Integer $value
     * @return NULL
     */
    public function put($key, $value)
    {
        if (isset($this->hash[$key])) {
            $index = array_search($key, $this->used);
            unset($this->used[$index]);
            $this->hash[$key] = $value;
            $this->used[] = $key;
        } else {
            if (count($this->hash) == $this->capacity) {
                $k = reset($this->used);
                array_shift($this->used);
                unset($this->hash[$k]);
            }

            $this->used[] = $key;
            $this->hash[$key] = $value;
        }
    }
}

$lRUCache = new LRUCache(2);
$lRUCache->put(1, 1); // »º´æÊÇ {1=1}
$lRUCache->put(2, 2); // »º´æÊÇ {1=1, 2=2}
echo $lRUCache->get(1);    // ·µ»Ø 1

