# blog
调试环境基于php7+mysql+Apache
使用前在本机的host文件中添加127.0.0.1    www.tp5.com ，然后使用www.tp5.com/index访问前台展示页面，
使用http://www.tp5.com/admin/login/login.html  访问后台管理页面。
本实例与某课程类似，不过自己添加了auth权限等小功能，逻辑代码都是使用自己风格编写的，其实视频看了一半知道了大概的架构后，我就全部自己写了。所以跟原版差别很大。适合初步学tp5框架的同学。没有过于严格使用MVC设计模式。代码或有些许粗糙，要优化还是有着很大的空间的。
后台功能包括管理员管理，链接管理，文章管理等，登录退出，该有的应该都有了。喜欢的话给个star吧。代码写的也不容易。
图片展示如下：
![](https://github.com/lujinzhong/blog/blob/master/image/后台登录界面.jpg)
![](https://github.com/lujinzhong/blog/blob/master/image/统一成功跳转页面.jpg)
![](https://github.com/lujinzhong/blog/blob/master/image/统一错误跳转界面.jpg)
![](https://github.com/lujinzhong/blog/blob/master/image/后台首页.jpg)
![](https://github.com/lujinzhong/blog/blob/master/image/文章管理界面.jpg)
![](https://github.com/lujinzhong/blog/blob/master/image/文章添加界面.jpg)
基本上能看到的功能都已经实现。
因为所有数据基于数据库，所以请先把数据库创建好，导入我的默认数据。
前台首页具有文章展示，文章第三方分享，搜索框搜索，侧边栏等功能。
![](https://github.com/lujinzhong/blog/blob/master/image/前台博客首页.jpg)
![](https://github.com/lujinzhong/blog/blob/master/image/侧边栏功能图片.jpg)
![](https://github.com/lujinzhong/blog/blob/master/image/文章内容详情1.jpg)
![](https://github.com/lujinzhong/blog/blob/master/image/文章内容详情2.jpg)
![](https://github.com/lujinzhong/blog/blob/master/image/搜索文章获取界面.jpg)

基于thinkphp5实现的个人博客后台以及前台展示。使用auth作为权限管理，功能基本完善。

this is a test
