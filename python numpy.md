- numpy 是python种一个运算速度非常快的数学库,允许在python中进行向量和矩阵计算,并且许多底层函数是用c编写的,可以进行矢量 矩阵 线性代数等数学运算。
````
a=np.array([0,1,2])

b=np.array((0,1,2))
````

- array函数接收任何序列，列表类型.

````

a=np.array([[11,12,13],[1,2,3]])

type(a)

a.dtype

a.size

a.shape()

a.itemsize

a.ndim

a.nbytes

a=np.arange(25).reshape((5,5))

np.array([1,2,3,4]).reshape((5,5))

a=np.arange(10)

a.sum() a.min() a.max() a.cumsum()

广播机制

x=np.array([[1,2,3],[4,5,6]])

v=np.array([1,0,1])

y=x+v

print(y)
````

- scipy是对numpy的封装,可以进行图像操作,matlab的文件的读取和写入

- matplotlib中最重要的功能是plot，它允许你绘制2D数据的图像,

````
import numpy as np

import matplotlib.pylot as plt

x=np.arrange(0,3*np.pi,0.1)

y=np.sin(x)

plt.plot(x,y)

plt.show()
````

创建numpy数组有三种不同方法:

1. 使用numpy内部功能函数

2. 使用列表等其他python结构进行转换

3. 使用特殊的库函数

````
import numpy as np

array=np.arange(20)

array=np.arange(20).reshape(4,5)

array=np.arange(27).reshape(3,3,3)

np.zeros((2,4))

np.ones((3,4))

np.empty((2,3))

array=np.array([4,5,6])
````
- ndarray 表示矩阵和向量

````

A=np.array([[1,2,3],[4,5,6]])

v=np.transpose(np.array([[2,1,3]]))
````

- 用numpy可以求解方程组和多元线性回归