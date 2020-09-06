<?php
/**
 * PHP version 7
 * groupAnagrams.php
 * @info 字母异位词分组
 * @author Daisy
 * @date 2020/9/6 3:58 PM
 */
class Solution
{
    /**
     * @info #1: 每个字符串进行排序(先打散为数组，排序后再组装)
     * 排序后拼接的字符串作为key, 排序前字符串作为value
     * @param array $strs 待处理数组
     * @return array
     * @author Daisy
     * @date 2020/9/6 4:03 PM
     */
    public function groupAnagrams1($strs)
    {
        $map = [];
        foreach ($strs as $str) {
            $temp = str_split($str);
            sort($temp);
            $key = implode('', $temp);
            $map[$key][] = $str;
        }
        return array_values($map);
    }

    /**
     * @info #2: 借助26个字母与素数的一个映射集
     * 求积可得唯一key, 相当于一个无冲突的hash function
     * @param array $strs 待处理数组
     * @return array
     * @author Daisy
     * @date 2020/9/6 4:03 PM
     */
    public function groupAnagrams2($strs)
    {
        $resArr = [];
        $prime = [2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97, 101, 103];

        foreach ($strs as $str) {
            $strlen = 1;
            for ($i = 0; $i < strlen($str); ++$i) {
                $strlen *= $prime[ord($str[$i]) - 97];
            }

            $resArr[$strlen][] = $str;
        }
        return array_values($resArr);
    }
}

$object = new Solution();
$strs = ["eat", "tea", "tan", "ate", "nat", "bat"];
$res1 = $object->groupAnagrams1($strs);
print_r($res1);

$res2 = $object->groupAnagrams2($strs);
print_r($res2);
