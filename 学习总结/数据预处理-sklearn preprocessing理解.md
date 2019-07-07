数据预处理--sklearn preprocessing理解

一、标准化
 api函数: scaler()或者standardScaler()
 原因:1.对于同一特征，最大最小值之差过大，将数据放在合适的范围
      2.有些机器学习算法中目标函数基础为假设特征均值为0,方差在同一介数的情况,sklearn官网说这类算法比如svm的rbf内核或线性模型的l1和l2正则化,
      如果某些特征的方差比其他几个特征方差大几个数量级别,A方差是1，B特征方差是1000，那么会导致B特征对这类方法占主导地位，导致学习器不是你期望的结果
      标准化公式:(X-X_mean)/X_std 计算对每个属性/每列分别进行
 api函数一:sklearn.preprocessing.scale(X,axis=0,with_mean=True,with_std=True)
 X:{array-like,sparse matrix}
 axis:默认值为0，为0表示分别标准化每个特征，为1表示对每个样本进行标准化
 with_mean和with_std:分别表示数据均值规范为0，方差规范为1
 ````
from sklearn import preprocessing
import numpy as np

X_train = np.array([[ 1., -1.,  100.],
                    [ 10.,  0.,  0.],
                    [ 0.,  1., -1.]])

X_scaler = preprocessing.scale(X_train)

#X_scaler输出结果
array([[-0.59299945, -1.22474487,  1.41416106],
       [ 1.4083737 ,  0.        , -0.69652709],
       [-0.81537425,  1.22474487, -0.71763397]])
 ````
 从上述结果可见，标准化后,数据之间差值没那么离谱
 
 api函数二 sklearn.preprocessing.StandardScaler(copy=True,with_mean=True,with_std=True)
 standardscaler函数平时工作基本用这个，提供了fit和transform方法，fit可用于训练数据集,transform可用于测试数据集,使用方便
 ````
scaler = preprocessing.StandardScaler().fit(X_train)
X_test = X_train
scaler_result = scaler.transform(X_test)      
#scaler_result 结果
array([[-0.59299945, -1.22474487,  1.41416106],
       [ 1.4083737 ,  0.        , -0.69652709],
       [-0.81537425,  1.22474487, -0.71763397]]
 ````
 1.1缩放到一定的范围
 
   一种标准化是将特征缩放到给定的最小值和最大值之间,可以使用MinMaxScaler()和MaxAbsScaler()
   或者minmax_scaler maxabs_scaler 通常在0和1之间
   使用这种方法好处:
   1.对于方差非常小的属性可以增强其稳定性
   2.维持洗漱矩阵中为0的条目
 
 先介绍第一个函数:
 sklearn.preprocessing.MinMaxScaler(feature_range=(0,1),copy=True)
 
 计算公式:
 X_std=(X-X.min(axis=0))/(X.max(axis=0)-X.min(axis=0))
 X_scaled=X_std*(max-min)+min
 
 另一种函数形式:sklearn.preprocessing.minmax_scale(X,feature_range=(0,1),axis=0,copy=True)
 ````
 from sklearn import preprocessing
import numpy as np

X_train = np.array([[ 1., -1.,  100.],
                    [ 0.9,  0.,  0.],
                    [ 0.9,  1., -1.]])
minMaxScaler = preprocessing.MinMaxScaler()
minMax = minMaxScaler.fit(X_train)
minMax.transform(X_train)
#输出结果
array([[ 1.        ,  0.        ,  1.        ],
       [ 0.        ,  0.5       ,  0.00990099],
       [ 0.        ,  1.        ,  0.        ]])
 ````
   上述X_train中的数据使用minMaxScaler方法进行处理后,在原有数值差异比较大的列，数据差异依然存在
   
API函数二、MaxAbsScaler()只不过是用特征的值除以该特征的最大值而已，其取值范围是[-1,1]。
````
from sklearn import preprocessing
import numpy as np

X_train = np.array([[ 1., -1.,  2.],
                    [ 2.,  0.,  0.],
                    [ 0.,  1., -1.]])

max_abs_scaler = preprocessing.MaxAbsScaler()
X_train_maxabs = max_abs_scaler.fit(X_train)
X_train_maxabs.transform(X_train)
#输出结果
array([[ 0.5, -1. ,  1. ],
       [ 1. ,  0. ,  0. ],
       [ 0. ,  1. , -0.5]])
````   
1.2 稀疏数据的缩放
MaxAbsScaler以及maxabs_scaler是专为缩放数据而设计的 并且是缩放数据的推荐方法,
但是scale和standardScaler也能够接受scipy.sparse作为输入，只要参数with_mean=False
被准确传入它的构造器。否则会出现ValueError的错误,因为默认的中心化会破坏稀疏性，
并且经常会因为分配过多的内存而使执行崩溃
1.3 缩放离群值的数据
如果你的数据包含许多异常值,使用均值和方差缩放可能并不是一个很好的选择，可以使用
RobustScaler或robust_scaler 但是特征工程有异常值存在时，一般要探测性的分析去发掘异常值

二、归一化或者正则化

归一化是缩放单个样本以具有单位范数的过程,如果使用二次形式(如点积或者其他核函数)量化任何样本间的相似度
API函数:sklearn.preprocessing.Normalizer(norm='12',copy=True)
或者skearn.preprocessing.normalize(X,norm='12',axis=1,copy=True,return_norm=False)

参数(norm设置采用何种方式进行归一化,默认l2)

三、二值化
四、分类特征编码
五、缺失值填补

对于归一化，归一化（Normalization）处理数据针对的是行样本，在数据样本向量进行点乘运算或其它核函数计算相似性时，拥有统一的标准（权重）时使用；