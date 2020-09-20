<?php

/**
 * PHP version 7
 * Class Solution
 * @info ������������n��k, ����1...n�����п��ܵ�k��������� �����ظ�
 *       ˼·�������㷨
 * @author Daisy
 * @date 2020/9/20 7:22 PM
 */
class Solution {
    protected $result = [];
    function combine($n, $k)
    {
        if ($n <0 || $k <= 0 || $k > $n) {
            return [];
        }
        $this->helper($n, $k, [], 1);
        return $this->result;
    }

    private function helper($n, $k, $list, $start)
    {
        if (count($list) == $k) {
            $this->result[] = $list;
            return;
        }

        //��ʱʣ���ѡ���ָ��� $n-$i+1
        //�������ָ��� $k - count($list)
        for ($i = $start; $n - $i + 1 >= $k - count($list); ++$i) {
            $list[] = $i;
            $this->helper($n, $k, $list, $i + 1);
            array_pop($list);
        }
    }
}

$obj = new Solution();
$res = $obj->combine(4, 2);
echo "<pre>";print_r($res);die;
