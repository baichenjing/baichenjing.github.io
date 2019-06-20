###

###multiprocessing 比multithreading更节省时间


###
``
import multiprocessing as mp
import threading as td

//不能有return这个值
def job(q,a,b):
    res=0
    for i in range(1000):
        res+=i+i**2+i**3
    q.put(res) //queue
    print('aaa')

def multicore():
    q=mp.Queue()
    t1=td.Thread(target=job,args=(a,b))
    p1=mp.Process(target=job,args=(q,1,2))
    p2=mp.Process(target=job,args=(q,1,2))
    t1.start()
    p1.start()
    p2.start()
    t1.join()
    p1.join()
    p2.join()
    res1=q.get()
    res2=q.get()
    print(res1+res2)

def normal():
    res=0
    for i in range(1000):
        res+=i+i**2+i**3
    print(''normal:',res)

def multithread():
    q=np.Queue()
    t1=t
if __name__=='__main__':
    q=mp.Queue()
    t1=td.Thread(target=job,args=(a,b))
    p1=mp.Process(target=job,args=(q,1,2))
    p2=mp.Process(target=job,args=(q,1,2))
    t1.start()
    p1.start()
    p2.start()
    t1.join()
    p1.join()
    p2.join()
    res1=q.get()
    res2=q.get()
    print(res1+res2)
``

###进程池  import multiprocessing as mp
``
 def jon(x):
    return x*x
 
 def multicore():
    pool=mp.Pool()
    res=pool.map(job,range(10)) #会分给不同的进程
    print(res)
    res=pool.apply_async(job,(2,2,3,4))#只会分给一个进程
    print(res.get())
    multi_res=[pool.apply_async(job,(i,)) for i in range(10)]
    print([res.get() for res in multi_res])
 
 if __name__=='__main__':
    multicore('d',1)
    
 ``
 #####共享内存 shared memory
 ``
 import multiprocessing as mp
 
 value=mp.Value('d,1) //不可以用全局变量
 array=mp.Array('i,[1,3,4])
 
 ``
 #####lock 锁
 
 def job(v,num,l):
    l.acquire()
    for _ in range(10):
        time.sleep(0.1)
        v.value+=num
        print(v.value)
 
 def multicore():
     l=mp.Lock() //不传入锁 就会有同步问题
     v=mp.Value('i,0) 
     p1=mp.Process(target=job,args=(v,l,1))
     p2=mp.Process(target=job,args=(v,3,1))
     p1.start()
     p2.start()
     p1.join()
     p2.join()