﻿<b>Zhixin StudentUnion OA System #Codename"SUsage" </b>

<b>执信中学学生会信息化在线办公系统 开源项目 #代号"SUsage" </b>

<b>目前总体开发进度：约65%，前端系统基本完成，后端系统开发启动约56%。</b>

<b>项目总阶段：0.6-milestone8 #Project SUsage pre-α（开发代号Young），全站php化中</b>

<s>wiki又得改了。</s>

<p>TaskSYS V0.6-milestone8</p>
<p>VegeChat V0.6-milestone5</p>
<p>UCenter V1.1-alpha2</p>
<p>AdminSYS V1.1-alpha2</p>
<p>FileTour V0.4-milestone6【未来project】</p>
<p><b>Latest update：2016.5.29 9:00</b></p>
<b>©2016 @Zhxsupc</b>
<p>  </p>
<b>Created By @yyl99311 | @df7c5117 | @GhostShdowTan | @橡胶人AS </b>
<b>            | @SUPC Web Group</b>
<p>  </p>
<b>特别鸣谢：@JerryLoveZhixin</b>
<p>  </p>
<b>Contact:zhxsuwebgroup@live.com</b>
<p>  </p>
<b>Every one can modified it except for the already existing codes </b>
<p>  </p>
<br></br>
<h4>本Repo迁移自原zhxsuwebgroup/SUsage<br>在登陆后界面按某个组合键有彩蛋哦~<s>才不会告诉你是alt+shift+g呢</s></h4>
<br></br>
<h3>这是个啥w</h3>
  <p>嗯，执信学生会的网上办公平台。</p>
  <p>一个神秘的系统，完全由37th SUPC自主研制开发。</p><a href="https://github.com/zhxsu/SUsage/wiki/Susage-%7C-%E6%A6%82%E8%BF%B0" target="_blank">详情请戳这里</a>
  
<a href="http://zhxsu.github.io/SUsage/" target="_blank">美美哒介绍页面</a>

<h3>为啥叫这个名字w</h3>
  <p>StudentUnion简写“SU”和Message的组合自造词。<s>让人酥酥的公告系统</s></p>
  <p><s>雅号香肠</s></p>
<h3>好处都有啥w</h3>
  <s>有了SUsage，不流失不蒸发</s>
  <p>可以发布公告、通知、站内信，布置任务省时省力。</p>
  <p>界面美观又漂亮,【咦有语病</p><p><s>这真的是Material Design吗w</s></p>
  <b>!!!!!!!!任务没接好可是会被打脸的哟!!!!!!!!</b>
<h3>配置</h3>
  <p>本地可以使用<b>XAMPP1.8.2+</b>调试，服务器端建议最低配置PHP5.6.21+, Apache 2.4.17+, phpMyAdmin 4.5.1+</p>
  <p>请将此文件包<b>放在SUsage文件夹内</b>，然后<b>将SUsage文件夹放在网站根目录</b></p>
  <p>环境配置完成后，请在phpmyadmin中直接导入susage_oa.sql文件，无需手动新建数据库。（当然一定几率出现失败后还是需要新建susage_oa并导入数据库）</p>
  <p>并在<b>functions/to_sql.php、Admin/Includes/to_pdo.php</b>中按照提示填写您的数据库登录账户和密码</p>
  <p>测试账户1：Enatsu 密码：123456（角色：超管+组长）</p> 
  <p>测试账户2：Super 密码：supersu（角色：超级管理员）</p>
  <p><b>若忘记密码可打开/SUsage/md5.php按照提示输入密码</b></p>
  <p><b>点击确认后将Salt和inDB复制，粘帖进数据库中“salt”和“pw”即可。</b></p>
<h3>近期的事情<s>好久没更新了</s></h3>
<p><b>----2016.6.79----</b></p>
  <p>新增UCenter，负责用户信息、密码、头像更改</p>
  <p>添加首页任务卡片新功能</p>
  <p>bug修复</p>
  <p>各种CSS优化</p>
<p><b>----2016.5.29----</b></p>
  <p>新增SUsage系统后台，目前已完工，待测试。</p>
  <p>在发布任务页新增zTree以选择接受任务的小组</p>
  <p>各种CSS优化</p>

<h3>亟待修复</h3>
  <p>聊天系统的实时接收功能</p>
  <p>尚未与数据库接口</p>
  <p>螺旋升天的输入框为空判定以及刷新提示。（今后再改）</p>
  <p>前后台的个人中心（重置密码之类的……）</p>
<h3>注意事项</h3>
  <p>按照<s>基本法</s>wiki里的提示写就好啦</p>
  <a href="https://github.com/zhxsu/SU_OA/wiki" target="_blank">修改时，欢迎参看我们的wiki</a>
<hr></hr>
<h3>开源声明及感谢</h3>
  <p>本项目目前基于以下几个开源项目开发：</p>
* <a href="https://jquery.org/" target="_blank">John Resig</a>的`jQuery`，遵循`MIT`协议
* <a href="https://github.com/nt1m/material-framework/" target="_blank">nt1m</a>的`material-framework`，遵循`Apache`协议版本`2.0`
* <a href="http://wangeditor.github.io/">wangfupeng1988</a>的`WangEditor`，遵循`MIT`协议，新版本采用了SU精简化版本，体积更小，效率更高
* <a href="https://github.com/fengyuanchen/cropper">fengyuanchen</a>的`cropper.js`，遵循`MIT`协议
* <a href="https://github.com/zTree/zTree_v3">zTree</a>的`zTree`树形菜单插件，遵循`MIT`协议
* Github提供的免费代码仓库


**`GNU General Public Licence `版本`3.0`**
