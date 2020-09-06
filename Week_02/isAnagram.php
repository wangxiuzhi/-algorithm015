<?php
/**
 * PHP version 7
 * @info ��Ч����ĸ��λ��
 * @author Daisy
 * @date 2020/9/6 12:37 PM
 */
class Solution
{
    /**
     * @var bool ����״̬
     */
    private $state = false;
    
    /**
     * @info #1: �������
     * @param string $s ���Ƚ��ַ���
     * @param string $t ���Ƚ��ַ���
     * @return boolean
     * @date 2020/9/6 12:44 PM
     */
    public function isAnagram1($s, $t)
    {
        //���ַ����ָ������
        $sArray = str_split($s);
        $tArray = str_split($t);

        //������ĸ˳������
        sort($sArray);
        sort($tArray);

        return $sArray == $tArray;
    }

    /**
     * @info #2: ��ϣ��
     * @param string $s ���Ƚ��ַ���
     * @param string $t ���Ƚ��ַ���
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
     * @info #3��PHP���ú�������ASCII��ֵΪ���������ִ�������1Ϊ��ֵ������
     * @param string $s ���Ƚ��ַ���
     * @param string $t ���Ƚ��ַ���
     * @return bool
     * @author Daisy
     * @date 2020/9/6 2:30 PM
     */
    public function isAnagram3($s, $t)
    {
        //Ч�����
        return count_chars($s, 1) == count_chars($t, 1);
    }

    /**
     * @info #4��PHP���ú���ͳ������������ֵ���ִ���
     * @param string $s ���Ƚ��ַ���
     * @param string $t ���Ƚ��ַ���
     * @return bool
     * @author Daisy
     * @date 2020/9/6 2:30 PM
     */
    public function isAnagram4($s, $t)
    {
        // array_count_values �� Counts all the values of an array
        return array_count_values(str_split($s, 1)) == array_count_values(str_split($t, 1));
    }

    /**
     * @info #5��ͬ���ú���˼·
     * @param string $s ���Ƚ��ַ���
     * @param string $t ���Ƚ��ַ���
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

//����жϽ��
$result1 = $object->isAnagram1($s, $t);
var_dump($result1);

//����жϽ��
$result2 = $object->isAnagram2($s, $t);
var_dump($result2);

//����жϽ��
$result3 = $object->isAnagram3($s, $t);
var_dump($result3);

//����жϽ��
$result4 = $object->isAnagram4($s, $t);
var_dump($result4);

//����жϽ��
$result5 = $object->isAnagram5($s, $t);
var_dump($result5);