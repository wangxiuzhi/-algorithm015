<?php
/**
 * PHP version 7
 * groupAnagrams.php
 * @info ��ĸ��λ�ʷ���
 * @author Daisy
 * @date 2020/9/6 3:58 PM
 */
class Solution
{
    /**
     * @info #1: ÿ���ַ�����������(�ȴ�ɢΪ���飬���������װ)
     * �����ƴ�ӵ��ַ�����Ϊkey, ����ǰ�ַ�����Ϊvalue
     * @param array $strs ����������
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
     * @info #2: ����26����ĸ��������һ��ӳ�伯
     * ����ɵ�Ψһkey, �൱��һ���޳�ͻ��hash function
     * @param array $strs ����������
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
