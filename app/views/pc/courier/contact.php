<?php require_once (REALPATH.'/include/Class/util/DateUtil.php');?>
<!DOCTYPE html>
<!-- Website template form http://www.mycodes.net/ -->
<html>
<head>
    <meta charset="UTF-8">
    <title>Contact - World Tree Preservation Website Template</title>
    <link rel="stylesheet" href="<?php echo SOURCE_ROOT;?>/courier/css/style.css" type="text/css">
</head>
<body>
<div class="header">
    <div><br><img src="<?php echo SOURCE_ROOT;?>/courier/images/标题.jpg" width="380" height="70">
        <div>
            <a href="<?php echo APP_WEB_INDEX_ROOT;?>/courier/donate">donate</a>
            <ul>
                <li>
                    <a href="<?php echo APP_WEB_INDEX_ROOT;?>/courier/index">首页</a>
                </li>
                <li>
                    <a href="<?php echo APP_WEB_INDEX_ROOT;?>/courier/about">关于</a>
                </li>
                <li>
                    <a href="<?php echo APP_WEB_INDEX_ROOT;?>/courier/programs">我们的服务</a>
                </li>
                <li>
                    <a href="<?php echo APP_WEB_INDEX_ROOT;?>/courier/query">快递查询</a>
                </li>
                <li class="selected">
                    <a href="<?php echo APP_WEB_INDEX_ROOT;?>/courier/contact">联系我们</a>
                </li>

            </ul>
        </div>
    </div>
</div>
</div>
<div class="body">
    <div class="contact">
        <div>
            <h2>联系方式</h2>
            <div>
                <h4>详细介绍</h4>
                <p>
                    如果你有快递需要寄送的，可以提前联系我们，讲以最快的时间上门取件。</p>
                <ul>
                    <li class="phone-num">
                        18273634227（刘越）<br>
                        15674230742 （肖志军）						</li>
                    <li class="email">
                        <a href="#">80768631@qq.com</a><br> <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=80768631&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:80768631:51" alt="联系我们" title="联系我们"/></a>
                        <a href="#"></a>						</li>
                    <li class="address">同德学院新校区29栋404（腾飞工作室）<br>男生宿舍42栋504  刘越</li>
                </ul>
            </div>
        </div>
        <div>
            <h2>联系方式说明</h2>
            <p>
                &nbsp;&nbsp;&nbsp;	我们代理的是天天快递、汇通快递及顺丰快递，<span class="email">天天免费转申通快递</span>（偏远地区除外），加QQ请注明快递。<br>
                如果需要寄送快递请提前联系，我们将尽快上门取件，寄送出去，给你节约时间。<br>上门取件时间：<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;周一至周五（下课时间）<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 周末及节假日（请提前联系）</p>
            <form action="index.html">
                <label for="fname">姓名
                    <input type="text" id="fname">
                </label>
                <label for="lname"></label>
                <label for="email">电话
                    <input type="text" id="email">
                </label>
                <label for="email2"></label>
                <label for="subject">取件地点
                    <input type="text" id="subject">
                </label>
                <label for="message" class="message">留言（寄件物品的说明）</label>
                <textarea name="message" id="message" cols="30" rows="10"></textarea>
                <input type="submit" value="">
            </form>
        </div>
    </div>
</div>
<div class="footer"></div>
</body>
</html>