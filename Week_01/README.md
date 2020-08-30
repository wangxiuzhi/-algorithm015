第1周学习笔记
数组 Array
prepend O(1)
append O(1)
look up O(1)
insert O(n)
delete O(n)


链表 Linked List
prepend O(1)
append O(1)
look up O(n)
insert O(1)
delete O(1)


跳表 Skip List
添加删除O(1)
添加N级索引的二分查找


栈
先进后出
添加删除O(1)

队列
先进先出
添加删除O(1)

优先队列
按照优先级出
插入操作O(1)
插入操作O(1)


双端队列
两端可进出的Queue
两端可进出的Queue

思想：
1.升维
2.空间换时间


分析PHP中 Queue 和 Priority Queue 的源码
1.Queue
队列（Queue），先进先出线性表(FIFO)，其只能在前端进行删除操作（一般称为出队），在后端进行插入操作（一般称为入队）。进行删除操作的端称为队头，进行插入操作的端称为队尾。队列是按照先进先出或后进后出的原则组织数据。当队列中没有元素时，称为空队列。
Ds\Queue implements Ds\Collection {
/* Constants */
const int MIN_CAPACITY = 8 ;
/* Methods */
public allocate ( int $capacity ) : void
public capacity ( void ) : int
public clear ( void ) : void
public copy ( void ) : Ds\Queue
public isEmpty ( void ) : bool
public peek ( void ) : mixed
public pop ( void ) : mixed
public push ([ mixed $...values ] ) : void
public toArray ( void ) : array
}


/**
* 入队操作。
* 
* @param mixed $data 入队数据。
* @return object 返回对象本身。
*/
public function enqueue( $data ) {
 $this ->queue[$this ->size++] =  $data ;

 return $this ;
}

/**
* 出队操作。
* 
* @return mixed 空队列时返回FALSE，否则返回队头元素。
*/
public function dequeue() {
 if (!$this ->isEmpty()) {
   --$this ->size;
   $front = array_splice($this ->queue, 0, 1);

   return $fronts[0];
 }

 return FALSE;
}

分析public peek ( void ) : mixed//抛出队头元素   
/**
* 获取队头元素。
* 
* @return mixed 空队列时返回FALSE，否则返回队头元素。
*/
public function getFront() {
 if (! $this ->isEmpty()) {
   return $this ->queue[0];
 }

 return FALSE;
}



2.Priority Queue

PHP的SPL库内置了splPriorityQueue优先级队列，并且是以Heap数据结构实现的，默认为MaxHeap模式，即priority越大越优先出队，同时可以通过重写compare方法使用MinHeap（priority越低越优先出队，这种场景比较少）



