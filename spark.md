- Action特点:
1。 对RDD数据集上运行计算后,将结果传给驱动程序或写入存储系统
触发job
常见actions有:
  reduce(func)
  collect()
  count()
  first()
  take(n) //取rdd的前几个元素
  takeSample(withReplacement,fraction,seed)

- spark 编程模型
 - 缓存特点
  可以使用persist 和cache方法将任意RDD缓存到内存或磁盘 tachyon文件系统中
  缓存是容错的,如果一个RDD分片丢失，可以通过构建它的transformation自动重构
  被缓存的RDD被使用的时，存取速度会加速10X
 storageLevel
 cache是persist的特例
 executor中60%做cache 40%做task
 -广播变量:
  广播变量缓存到各个节点的内存中，而不是每个task
  广播变量被创建后，能在集群中运行的任何函数调用
  广播变量是只读的，不能在被广播后修改
  对于大数据集的广播，spark尝试使用搞笑的广播算法来降低通信成本
  使用方法:
    val broadcastVar=sc.broadcast(Array(1,2,3))
    broadcastVar value
  -累加器
    累加器只支持加法操作
    累加器可以高效的并行，用于实现计数器和变量求和
    spark原生支持数值类型和标准可变集合的计数器，但用户可以添加新的leixing
    只有驱动程序才能获取累加器的值
    使用方法:
    val accum=sc.accumulator(0)
    sc.parallelize(Array(1,2,3,4)).foreach(x=>accum+=x)
    accum.value


