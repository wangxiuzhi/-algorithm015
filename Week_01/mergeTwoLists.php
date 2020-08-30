<?php
//�ϲ�������������
class Solution {
    //1.����
    public function meregeTwoLists1($l1, $l2) {
        $dummyHead = new ListNode(null);
        $cur = $dummyHead;
        while ($l1 !== null && $l2 !== null) {
            if ($l1->val <= $l2->val) {
                $cur->next = $l1;
                $l1 = $l1->next;
            } else {
                $cur->next = $l2;
                $l2 = $l2->next;
            }
            $cur = $cur->next;
        }
        if ($l1 !== null) {
            $cur->next = $l1;
        } elseif ($l2 !== null) {
            $cur->next = $l2;
        }
        return $dummyHead->next;
    }

    //2.�ݹ�
    public function meregeTwoLists2($l1, $l2) {
        //�ݹ麯�������ص�ǰ����ϲ�֮���ͷ�ڵ�(ÿһ�㶼��������õ�����ͷ)
        if ($l1 === null) {
            return $l1;
        }
        if ($l2 == null) {
            return $l2;
        }
        if ($l1->val < $l2->val) {
            $l1->next = $this->meregeTwoLists2($l1->next, $l2);
            return $l1;
        } else {
            $l2->next = $this->meregeTwoLists2($l1, $l2->next);
            return $l2;
        }

    }
}

$test = new Solution();
$l1 = "1->3->4";
$l2 = "1->3->4";
print_r($test->meregeTwoLists1($l1, $l2));
print_r($test->meregeTwoLists2($l1, $l2));
