<?php require_once (REALPATH.'/include/Class/util/DateUtil.php');?>
<!DOCTYPE html>
<!-- Website template form http://www.mycodes.net/ -->
<html>
<head>
	<meta charset="UTF-8">
	<title>校园快递</title>
	<link rel="stylesheet" href="<?php echo SOURCE_ROOT;?>/courier/css/style.css" type="text/css">
</head>
<body>
<div class="header">
		<div><br><img src="<?php echo SOURCE_ROOT;?>/courier/images/标题.jpg" width="380" height="70">
		  <div>
				<a href="donate.html">donate</a>
				<ul>
					<li class="selected">
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
					<li>
						<a href="<?php echo APP_WEB_INDEX_ROOT;?>/courier/contact">联系我们</a>
					</li>

				</ul>
		  </div>
  </div>
</div>
	<div class="body">
		<div class="home">
			<div class="featured">
				<div>
					<p>
    天天快递 <br>      汇通快递 <br>         顺丰快递
					</p>
				  <h2>送货上门 <br>
				    <br>
    上门取件<br>
					  <br>
					<span>腾飞工作室</span></h2>
				</div>
			</div>
			<div class="section">
				<div>
				  <div>
						<h3>&nbsp;</h3>
						<ul>
							<li>
							  <img src="<?php echo SOURCE_ROOT;?>/courier/images/top-program1.jpg" alt="">
								<h4><a href="gallery.html">快递单号查询</a></h4>
								<p>
									<a href="gallery.html">寄件单号
							    </a></p>
						  </li>
							<li>
								<a href="programs.html"><img src="<?php echo SOURCE_ROOT;?>/courier/images/top-program2.jpg" alt="" border="0"></a>
								<h4>寄送价格</h4>
								<p>
									<a href="jiagebiao.html">价格表</a></p>
						  </li>
						</ul>
				  </div>
				</div>
				<div>
				  <div>
						<h3>公告栏</h3>
						<ul>
							<li>
							  <img src="<?php echo SOURCE_ROOT;?>/courier/images/blog-post1.jpg" alt="" border="0">
								<div>

									<p>
    取件时间：<br>
    周一至周五：课余时间<br>
										周末：请提前联系 <a href="blog.html" class="more"></a>									</p>
								</div>
						  </li>
							<li>
							  <img src="<?php echo SOURCE_ROOT;?>/courier/images/blog-post2.jpg" alt="" border="0">
								<div>
									<p><h4>疑难件</h4><br><br>
    XXX由于电话停机，请联系XXX收取<br>
										XXX由于提示空号，请联系XXX收取 <a href="blog.html" class="more"></a>									</p>
								</div>
						  </li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer">
		<div>
			<div>
				<h4>联系方式</h4>
				<ul>
					<li class="phone-num">刘越 QQ：80768631 <br><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=80768631&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:80768631:51" alt="联系我们" title="联系我们"/></a><br>18273634227（64227）</li>
				    <li class="address">肖志军 QQ：727256909 <br><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=727256909&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:727256909:51" alt="联系我们" title="联系我们"/></a><br>15674250742
				    </li>
				</ul>
			</div>
			<div>
				<h4>工作室地址</h4>
				<ul>
					<li>
						<p>
    西校区办公楼29栋404（腾飞工作室）
						</p>

					</li>
					<li>
						<p>
    如果方便请直接到男生宿舍42栋504（刘越）
						</p>

					</li>
				</ul>
			</div>
			<div class="connect">
				<h4>联系我们</h4>
			  <a href="https://www.baidu.com" id="facebook">百度</a> <a href="https://www.baidu.com" id="twitter">谷歌</a>
			  <form action="about.html">
					<h4>关于我们</h4>
					<input type="text" value="Enter email address" onBlur="this.value=!this.value?'Enter email address':this.value;" onFocus="this.select()" onClick="this.value='';">
					<input type="submit" id="submit" value="">
			  </form>
			</div>
		</div>
		<div>
			<ul>
				<li>
					<a href="index.html">友情链接</a>				</li>
				<li>
					<a href="about.html"> 友情链接</a>				</li>
				<li>
					<a href="programs.html"> 友情链接</a>				</li>
				<li>
					<a href="gallery.html">友情链接</a>				</li>
				<li>
					<a href="contact.html">友情链接</a>				</li>
				<li>
					<a href="blog.html">友情链接</a>				</li>
			</ul>
			<p>
				&#169; 2023 版权所有刘越
			</p>
	  </div>
	</div>
</body>
</html>