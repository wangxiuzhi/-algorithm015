第1周 学习笔记
一、分析PHP中 Queue 和 Priority Queue 的源码
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


二、学习总结
本周学完了数组、链表、跳表、栈、队列、优先队列、双端队列，数组、链表、跳表、栈、队列还比较好懂，关于链表、优先队列和双端队列的理解起来比较晦涩。感觉自己只看视频只能对概念有一个基本的了解，拿到相关知识点的题还是很懵，没有思路。

这一周觉得好慌，发现有不会的东西占了几乎80%，不知从哪下手。虽然工作了5年多，但这5年自己贪图安逸，下班后就不再去钻研技术方面的知识，导致现在基本的能力都丧失了，今年互联网行业形势不好，自己就处于非常焦虑的一个状态，本周的学习超哥的视频课程让我有了一个学习思路，这次决定报算法课程，也是希望能通过一个途径让自己变得强大起来，重拾信心，加油，坚持✊。






