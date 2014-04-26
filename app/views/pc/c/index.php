<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>掌中管店</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
	
		<!-- Le styles -->
		<link href="<?php echo GD_PC_CSS;?>/bootstrap.css" type="text/css" rel="stylesheet">
		<link href="<?php echo GD_PC_CSS;?>/font-awesome.css" type="text/css" rel="stylesheet">
		<link href="<?php echo GD_PC_CSS;?>/style.css" type="text/css" rel="stylesheet">
		<link href="<?php echo GD_PC_CSS;?>/prettify.css" rel="stylesheet" type="text/css" >
		<link href="<?php echo GD_PC_CSS;?>/bootstrap-wysihtml5.css" type="text/css" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo GD_PC_CSS;?>/doc.css">
	
		<style type="text/css">
			body {
				padding-top: 60px;
				/*padding-bottom: 40px;*/
				background-image: url("<?php echo GD_PC_IMG;?>/bg.png");
			}
	
			.sidebar-nav {
				padding: 9px 0;
			}
		</style>
	
		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="../bootstrap/js/html5.js"></script>
		<![endif]-->
	
		<!-- Le fav and touch icons -->
		<!--<link rel="shortcut icon" href="../bootstrap/ico/favicon.ico">
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="../bootstrap/ico/bootstrap-apple-114x114.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="../bootstrap/ico/bootstrap-apple-114x114.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../bootstrap/ico/bootstrap-apple-72x72.png">
		<link rel="apple-touch-icon-precomposed" href="../bootstrap/ico/bootstrap-apple-57x57.png">-->
	
		<script type="text/javascript" src="<?php echo GD_PC_JS;?>/jquery.js"></script>
		<script type="text/javascript" src="<?php echo GD_PC_JS;?>/bootstrap.js"></script>
		<script type="text/javascript" src="<?php echo GD_PC_JS;?>/ui.js"></script>
	
	   
	
	</head>

	<body>
	<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="index.html"><img src="<?php echo GD_PC_IMG;?>/store-2.png" alt="掌中管店" width="50" />掌中管店</a>

            <div class="nav-collapse">
                <ul class="nav" style="margin-top:15px">
                    <li><a href="zdcc.html"><span class="label label-info" style="padding:6px 10px;">店铺助手</span></a>
                    </li>
                    <li><a href="dptj.html"><span class="label label-info" style="padding:6px 10px;">店铺统计</span></a>
                    </li>

                </ul>

                <ul class="nav pull-right">
                    <li>
                        <ul class="nav" style="margin-top:15px">
                            <li class="dropdown">
                                <a href="#"
                                   class="dropdown-toggle"
                                   data-toggle="dropdown">掌柜：yq830222
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">

                                    <li>
                                        <div style="width: 314px">
                                            <div class="modal-header">

                                                <h3>掌柜：yq830222</h3>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row-fluid">
                                                    <div class="span3">
                                                        <img src="<?php echo GD_PC_IMG;?>/defaultPhoto.png" alt="" class="thumbnail span12">
                                                    </div>
                                                    <div class="span9">
                                                        <a href="#">当前版本：初级版</a>
                                                        <a href="#">到期时间：2013-12-21</a>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">

                                                <button href="#" class="btn btn-danger">升级/续费</button>
                                                <button href="#" class="btn btn-primary">安全退出</button>
                                            </div>
                                        </div>

                                    </li>

                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>

		<div class="container-fluid" style="margin-top:30px;">
			<!--<div class="row-fluid">
				<p>这里显示公告内容</p>
			</div>-->
			<div class="row-fluid">
				<div class="span2">
				
					<div class="well sidebar-nav">
				
						<ul class="nav nav-list">
							<li class="nav-header">自动功能</li>
							<li>
								<div class="accordion" id="accordian2">
									<div class="accordion-group">
										<div class="accordion-heading">
											<a style="text-decoration: none;text-align: left" class="accordion-toggle btn" href="<?php echo APP_WEB_INDEX_ROOT;?>/autoer/zs_zdcc?auth=<?php echo $auth;?>&rand=<?php echo DateUtil::microtime_float(); ?>">
												<span>自动橱窗</span>
											</a>
										</div>
				
									</div>
									<div class="accordion-group">
										<div class="accordion-heading">
											<a style="text-decoration: none;text-align: left" class="accordion-toggle btn" href="zdpj.html">
												<span>自动评价</span>
											</a>
										</div>
				
									</div>
                                 </div>
							</li>
							<li class="nav-header">批量功能</li>
							<li>
								<div class="accordion" id="accordian2">
									<div class="accordion-group">
										<div class="accordion-heading">
											<a style="text-decoration: none;text-align: left" class="accordion-toggle btn" href="plxgbbmc.html">
											   <span>修改宝贝名称</span>
											</a>
										</div>
				
									</div>
				
									<div class="accordion-group">
										<div class="accordion-heading">
											<a style="text-decoration: none;text-align: left" class="accordion-toggle btn" href="plxgbbkc.html">
												<span>修改宝贝库存</span>
											</a>
										</div>
				
									</div>	
                                 </div>								
							</li><!--订单关怀-->
							<li class="nav-header">店铺统计</li>
							<li>
								<div class="accordion" id="accordian2">
									<div class="accordion-group">
										<div class="accordion-heading">
											<a style="text-decoration: none;text-align: left" class="accordion-toggle btn" href="dptj.html">
												<span>店铺统计概况</span>
											</a>
										</div>
				
									</div>
									<div class="accordion-group">
										<div class="accordion-heading">
											<a style="text-decoration: none;text-align: left" class="accordion-toggle btn" href="jrssfk.html">
												<span>今日实时访客</span>
											</a>
										</div>
									</div>
									<div class="accordion-group">
										<div class="accordion-heading">
											<a style="text-decoration: none;text-align: left" class="accordion-toggle btn" href="fklyfb.html">
												<span>访客来源分布</span>
											</a>
										</div>
									</div>
									<div class="accordion-group">
										<div class="accordion-heading">
											<a style="text-decoration: none;text-align: left" class="accordion-toggle btn" href="fkdyfb.html">
												<span>访客地域分布</span>
											</a>
										</div>
									</div>
									<div class="accordion-group">
										<div class="accordion-heading">
											<a style="text-decoration: none;text-align: left" class="accordion-toggle btn" href="ztcgjc.html">
												<span>直通车关键词</span>
											</a>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div><!--/.well sidebar-nav-->
				</div><!--/span2-->
				<div class="span10">
					<div class="row-fluid">
							<div class="span8">
                            <div class="accordion" id="accordionQuickV">
								<div class="accordion-group">
									<div class="accordion-heading">
										<a style="text-align: left;text-decoration: none" class="accordion-toggle btn btn-warning"
										   data-toggle="collapse" data-parent="#accordion1" href="#collapseTable1">今日数据</a>
									</div>
									<div id="collapseTable1" class="accordion-body collapse in">
										<div class="accordion-inner" style="background-color: #ffffff;">
											<div id="chart"></div>
										</div><!--/accordion-inner-->
									</div><!--/collapseTable1-->
								</div><!--/accordion-group-->
							</div><!--/accordion-->
							<div class="accordion" id="accordionQuickV">
								<div class="accordion-group">
									 <div class="accordion-heading">
										<a style="text-align: left;text-decoration: none" class="accordion-toggle btn btn-warning"
										   data-toggle="collapse" data-parent="#accordion2" href="#collapseTable2">版本比较</a>
									</div>
									<div id="collapseTable2" class="accordion-body collapse in">
										<div class="accordion-inner" style="background-color: #ffffff;">
                                          <br>
                                          <table class="table table-bordered table-striped">
                                            <tbody>
                                              <tr>
                                                <th width="12%">版本</th>
                                                <th width="24%">一年</th>
                                                <th width="22%">半年</th>
                                                <th width="21%">一季</th>
                                                <th width="21%">一月</th>
                                              </tr>
                                              <tr>
                                                <td>初级版</td>
                                                <td>永久免费</td>
                                                <td>永久免费</td>
                                                <td>永久免费</td>
                                                <td>永久免费</td>
                                              </tr>
                                              <tr>
                                                <td>中级版</td>
                                                <td>98/年(省82)<br>
                                                  <input type="button" value="订购" class="btn" /></td>
                                                <td>55/半年(省35)<br>
                                                  <input type="button" value="订购" class="btn" /></td>
                                                <td>29/季(省16)<br>
                                                  <input type="button" value="订购" class="btn" /></td>
                                                <td>15/月<br>
                                                  <input type="button" value="订购" class="btn" /></td>
                                              </tr>
                                              <tr>
                                                <td>高级版</td>
                                                <td>118元/年(省122) <br>
                                                  <input type="button" value="订购" class="btn" /></td>
                                                <td>75/半年(省45)<br>
                                                  <input type="button" value="订购" class="btn" /></td>
                                                <td>39/季(省21)<br>
                                                  <input type="button" value="订购" class="btn" /></td>
                                                <td>20/月<br>
                                                  <input type="button" value="订购" class="btn" /></td>
                                              </tr>
                                            </tbody>
                                          </table>
                                          <table class="table table-bordered table-striped">
      <tr>
        <th width="25%">功能</th>
        <th width="25%">初级版</th>
        <th width="25%">中级版</th>
        <th width="25%">高级版</th>
      </tr>
      <!--<tr>
        <td><span style="color:#f00;">新功能</span></td>
        <td>后期的新增功能</td>
        <td><span style="font-weight:900; color:#ccc">×</span></td>
        <td><span style="font-weight:900; color:#ccc">×</span></td>
        <td><span style="font-weight:900; color:#0C0">√</span></td>
      </tr>-->
      <tr>
        <td>店铺统计</td>
        <td><span style="font-weight:900; color:#ccc">×</span></td>
        <td><span style="font-weight:900; color:#ccc">×</span></td>
        <td><span style="font-weight:900; color:#0C0">√</span></td>
      </tr>
      <tr>
        <td>自动评价</td>
        <td><span style="font-weight:900; color:#ccc">×</span></td>
        <td><span style="font-weight:900; color:#ccc">×</span></td>
        <td><span style="font-weight:900; color:#0C0">√</span></td>
      </tr>
      <tr>
        <td>自动橱窗</td>
        <td><span style="font-weight:900; color:#ccc">×</span></td>
        <td><span style="font-weight:900; color:#ccc">×</span></td>
        <td><span style="font-weight:900; color:#0C0">√</span></td>
      </tr>
      <tr>
        <td>批量修改</td>
        <td><span style="font-weight:900; color:#ccc">×</span></td>
        <td><span style="font-weight:900; color:#ccc">×</span></td>
        <td><span style="font-weight:900; color:#0C0">√</span></td>
      </tr>
    </table>
</div><!--/accordion-inner-->
									</div><!--/collapseTable1-->
								</div><!--/accordion-group-->
							</div><!--/accordion-->
                            </div>
                            
                            
                            <div class="span4">
                            
                            <div class="accordion" id="accordionQuickV">
								<div class="accordion-group">
									<div class="accordion-heading">
										<a style="text-align: left;text-decoration: none" class="accordion-toggle btn btn-warning" data-toggle="collapse" data-parent="#accordion5" href="#collapseTable5">客户服务</a>
									</div>
									<div id="collapseTable5" class="accordion-body collapse in">
										<div class="accordion-inner" style="background-color: #ffffff;">
											<p>服务：9:00-18:00</p> 
											<p>电话：400-6042-789</p>
											<p>客服：</p>
										</div><!--/accordion-inner-->
									</div><!--/collapseTable1-->
								</div><!--/accordion-group-->
							</div><!--/accordion-->
                            
                            
                            <div class="accordion" id="accordionQuickV">
								<div class="accordion-group">
									<div class="accordion-heading">
										<a style="text-align: left;text-decoration: none" class="accordion-toggle btn btn-warning" data-toggle="collapse" data-parent="#accordion6" href="#collapseTable6">最新订购</a>
									</div>
									<div id="collapseTable6" class="accordion-body collapse in">
										<div class="accordion-inner" style="background-color: #ffffff;">
											<p>10:44 xi**</p>
											<p>订购 高级版 6个月</p>
											<p>10:44 忆恒**</p>
											<p>订购 高级版 6个月</p>
											<p>10:44 本源**</p>
											<p>订购 高级版 12个月</p>
										</div><!--/accordion-inner-->
									</div><!--/collapseTable1-->
								</div><!--/accordion-group-->
							</div><!--/accordion-->
                            
                            </div>
                            
                            
					</div><!--/row-fluid-->
				</div><!--/span10-->
			</div><!--row-fluid-->
		</div><!--container-fluid-->
<footer class="footer">
    <div class="container">
      <p style="text-align:center;">淘宝卖家市场官方推荐应用</p>
      <p style="text-align:center;">客服热线：021-60895144 客服时间：09:00-18:00（周一至周五）copyright ©2012-2013 掌中管店</p>
    </div>
</footer>
<!--foot end-->

		<script type="text/javascript" src="<?php echo GD_PC_JS;?>/chart.js"></script>
		<script type="text/javascript" src="<?php echo GD_PC_JS;?>/highcharts.js"></script>
	</body>
</html>
