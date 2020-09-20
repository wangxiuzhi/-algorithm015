<?php

/**
 * PHP version 7
 * Class Solution
 * @info ��ǰ��������������������
 *       ˼·�������������������ص� ���������н������һ��֣��ֱ���������������
 * @author Daisy
 * @date 2020/9/20 7:44 PM
 */
class Solution {

    /**
     * @info ������
     * @param array $preorder ����
     * @param array $inorder ����
     * @return null
     * @author Daisy
     * @date 2020/9/20 7:53 PM
     */
    function buildTree($preorder, $inorder)
    {
        if (empty($preorder)) {
            return null;
        }
        $preRootValue = $preorder[0];
        $root = new TreeNode($preRootValue);
        $inRootIndex = array_search($preRootValue, $inorder);

        //���ڹ����������������������
        $leftInOrder = array_slice($inorder, 0, $inRootIndex);

        //���ڹ����������������������
        $rightInOrder = array_slice($inorder, $inRootIndex + 1);

        //���ڹ����������������������
        $leftPreOrder = array_slice($preorder, 1, $inRootIndex);

        //���ڹ����������������������
        $rightPreOrder = array_slice($preorder, $inRootIndex + 1);

        //����������
        $root->left = $this->buildTree($leftPreOrder, $leftInOrder);

        //����������
        $root->right = $this->buildTree($rightPreOrder, $rightInOrder);

        return $root;
    }
}

$obj = new Solution();
$res = $obj->buildTree([3,9,20,15,7], [9,3,15,20,7]);
var_dump($res);