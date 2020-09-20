<?php

/**
 * PHP version 7
 * Class Solution
 * @info 从前序与中序遍历构造二叉树
 *       思路：根据先序和中序遍历特点 把整个序列进行左右划分，分别构造左右子树即可
 * @author Daisy
 * @date 2020/9/20 7:44 PM
 */
class Solution {

    /**
     * @info 创建树
     * @param array $preorder 先序
     * @param array $inorder 中序
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

        //用于构造左子树的中序遍历序列
        $leftInOrder = array_slice($inorder, 0, $inRootIndex);

        //用于构造右子树的中序遍历序列
        $rightInOrder = array_slice($inorder, $inRootIndex + 1);

        //用于构造左子树的先序遍历序列
        $leftPreOrder = array_slice($preorder, 1, $inRootIndex);

        //用于构造右子树的先序遍历序列
        $rightPreOrder = array_slice($preorder, $inRootIndex + 1);

        //构造左子树
        $root->left = $this->buildTree($leftPreOrder, $leftInOrder);

        //构造右子树
        $root->right = $this->buildTree($rightPreOrder, $rightInOrder);

        return $root;
    }
}

$obj = new Solution();
$res = $obj->buildTree([3,9,20,15,7], [9,3,15,20,7]);
var_dump($res);