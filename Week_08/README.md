## 学习笔记
### AVL树
#### 平衡二叉搜索树
#### 每个结点存balancefactor={-1,0,1} 3. 四种旋转操作
#### 不足:结点需要存储额外信息、且调整次数频繁


### Red-black Tree
#### 红黑树是一种近似平衡的二叉搜索树(Binary Search Tree)，它能够确保任何一 个结点的左右子树的高度差小于两倍。具体来说，红黑树是满足如下条件的二叉 搜索树:
#### 每个结点要么是红色，要么是黑色
#### 根结点是黑色
#### 每个叶结点(NIL结点，空结点)是黑色的。
#### 不能有相邻接的两个红色结点
#### 从任一结点到其每个叶子的所有路径都包含相同数目的黑色结点。