<?php
/**
 * PHP version 7
 * @info 有效的字母异位词
 * @author Daisy
 * @date 2020/9/6 12:37 PM
 */
class Solution
{
    /**
     * @var bool 返回状态
     */
    private $state = false;
    
    /**
     * @info #1: 暴力求解
     * @param string $s 待比较字符串
     * @param string $t 待比较字符串
     * @return boolean
     * @date 2020/9/6 12:44 PM
     */
    public function isAnagram1($s, $t)
    {
        //将字符串分割成数组
        $sArray = str_split($s);
        $tArray = str_split($t);

        //按照字母顺序排序
        sort($sArray);
        sort($tArray);

        return $sArray == $tArray;
    }

    /**
     * @info #2: 哈希表
     * @param string $s 待比较字符串
     * @param string $t 待比较字符串
     * @return boolean
     * @date 2020/9/6 1:39 PM
     */
    public function isAnagram2($s, $t)
    {
        $length = strlen($s);
        if ($length != strlen($t)) {
            return $this->state;
        }

        $hash = [];
        for ($i = 0; $i < $length; ++$i) {
            if (!isset($hash[$s[$i]])) {
                $hash[$s[$i]] = 1;
            } else {
                $hash[$s[$i]]++;
            }

            if (!isset($hash[$t[$i]])) {
                $hash[$t[$i]] = -1;
            } else {
                $hash[$t[$i]]--;
            }
        }

        foreach ($hash as $val) {
            if ($val != 0) {
                return $this->state;
            }
        }

        $this->state = true;

        return $this->state;
    }


    /**
     * @info #3：PHP内置函数返回ASCII码值为键名，出现次数大于1为键值的数组
     * @param string $s 待比较字符串
     * @param string $t 待比较字符串
     * @return bool
     * @author Daisy
     * @date 2020/9/6 2:30 PM
     */
    public function isAnagram3($s, $t)
    {
        //效率最高
        return count_chars($s, 1) == count_chars($t, 1);
    }

    /**
     * @info #4：PHP内置函数统计数组中所有值出现次数
     * @param string $s 待比较字符串
     * @param string $t 待比较字符串
     * @return bool
     * @author Daisy
     * @date 2020/9/6 2:30 PM
     */
    public function isAnagram4($s, $t)
    {
        // array_count_values — Counts all the values of an array
        return array_count_values(str_split($s, 1)) == array_count_values(str_split($t, 1));
    }

    /**
     * @info #5：同内置函数思路
     * @param string $s 待比较字符串
     * @param string $t 待比较字符串
     * @return bool
     * @author Daisy
     * @date 2020/9/6 2:30 PM
     */
    public function isAnagram5($s, $t)
    {
        $length = strlen($s);
        if ($length != strlen($t)) {
            return $this->state;
        }

        $sArr = $tArr = [];
        for ($i = 0; $i < $length; ++$i) {
            $sArr[$s[$i]][] = $s[$i];
            $tArr[$t[$i]][] = $t[$i];
        }
        return $sArr == $tArr;
    }
}

$s = 'anagram';
$t = 'nagaram';
$object = new Solution();

//输出判断结果
$result1 = $object->isAnagram1($s, $t);
var_dump($result1);

//输出判断结果
$result2 = $object->isAnagram2($s, $t);
var_dump($result2);

//输出判断结果
$result3 = $object->isAnagram3($s, $t);
var_dump($result3);

//输出判断结果
$result4 = $object->isAnagram4($s, $t);
var_dump($result4);

//输出判断结果
$result5 = $object->isAnagram5($s, $t);
var_dump($result5);