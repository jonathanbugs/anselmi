<?php /* Smarty version Smarty-3.1.10, created on 2014-08-08 15:49:01
         compiled from "templates/dashboard.tpl" */ ?>
<?php /*%%SmartyHeaderCode:136250150753e4d54daeeb10-00531966%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1e27f2c4a7e1cf18177b42281d1171ff2c8485b2' => 
    array (
      0 => 'templates/dashboard.tpl',
      1 => 1407244887,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '136250150753e4d54daeeb10-00531966',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'countPedidoPessoa' => 0,
    'valorCountPedidoPessoa' => 0,
    'xDias' => 0,
    'JSONpedidos' => 0,
    'JSONpedidosDetalhe' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_53e4d54db437b8_87222741',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53e4d54db437b8_87222741')) {function content_53e4d54db437b8_87222741($_smarty_tpl) {?>    <div id="wrapper">

        <?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


        <!--Body content-->
        <div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->

                <?php echo $_smarty_tpl->getSubTemplate ("heading.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


                <?php  $_smarty_tpl->tpl_vars['valorCountPedidoPessoa'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valorCountPedidoPessoa']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['countPedidoPessoa']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valorCountPedidoPessoa']->key => $_smarty_tpl->tpl_vars['valorCountPedidoPessoa']->value){
$_smarty_tpl->tpl_vars['valorCountPedidoPessoa']->_loop = true;
?><?php } ?>

                <!-- Build page from here: -->
                <div class="row-fluid">

                    <div class="span2">
                        <div class="centerContent">

                            <ul class="bigBtnIcon">
                                <li>
                                    <a href="pessoa-lista" class="tipB">
                                        <span class="icon entypo-icon-users"></span>
                                        <span class="txt">Novos Clientes</span>
                                        <?php if ($_smarty_tpl->tpl_vars['valorCountPedidoPessoa']->value['PESSOAS']>0){?>
                                        	<span class="notification"><?php echo $_smarty_tpl->tpl_vars['valorCountPedidoPessoa']->value['PESSOAS'];?>
</span>
                                        <?php }?>
                                    </a>
                                </li>
                                <!--  <li>
                                    <a href="#">
                                        <span class="icon icomoon-icon-support"></span>
                                        <span class="txt">Support tickets</span>
                                        <span class="notification blue">12</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="I`m with pattern" class="pattern tipB">
                                        <span class="icon icomoon-icon-comments-2"></span>
                                        <span class="txt">New Comments</span>
                                        <span class="notification green">23</span>
                                    </a>
                                </li>-->
                                <li>
                                    <a href="pedido-lista">
                                        <span class="icon icomoon-icon-basket"></span>
                                        <span class="txt">Novos Pedidos</span>
                                        <?php if ($_smarty_tpl->tpl_vars['valorCountPedidoPessoa']->value['PEDIDOS']>0){?>
                                        	<span class="notification"><?php echo $_smarty_tpl->tpl_vars['valorCountPedidoPessoa']->value['PEDIDOS'];?>
</span>
                                        <?php }?>
                                    </a>
                                </li>
                                <!-- <li>
                                    <a href="lista-casamento-lista">
                                        <span class="icon icomoon-icon-heart"></span>
                                        <span class="txt" style="font-size:10px;">Listas Casamento Finalizadas</span>
                                        <?php if ($_smarty_tpl->tpl_vars['valorCountPedidoPessoa']->value['LISTA_CASAMENTO']>0){?>
                                            <span class="notification"><?php echo $_smarty_tpl->tpl_vars['valorCountPedidoPessoa']->value['LISTA_CASAMENTO'];?>
</span>
                                        <?php }?>
                                    </a>
                                </li> -->
                                <!--<li>
                                    <a href="#">
                                        <span class="icon icomoon-icon-history"></span>
                                        <span class="txt">Backups</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="icon icomoon-icon-meter-fast"></span>
                                        <span class="txt">Site Usage</span>
                                    </a>
                                </li>-->
                            </ul>
                        </div>
                    </div><!-- End .span8 -->

                    <!-- <div class="span4">
                        <div class="centerContent">
                            <div class="circle-stats">

                                <div class="circular-item tipB" title="Site overload">
                                    <span class="icon icomoon-icon-fire"></span>
                                    <input type="text" value="62" class="redCircle" />
                                </div>

                                <div class="circular-item tipB" title="Site average load time">
                                    <span class="icon icomoon-icon-busy"></span>
                                    <input type="text" value="12" class="blueCircle" />
                                </div>

                                <div class="circular-item tipB" title="Target complete">
                                    <span class="icon iconic-icon-target"></span>
                                    <input type="text" value="94" class="greenCircle" />
                                </div>

                            </div>
                        </div>

                    </div>--><!-- End .span4 -->



                    <div class="span10">

                        <div class="box chart gradient">

                            <div class="title">

                                <h4>
                                    <span class="icon16 icomoon-icon-bars"></span>
                                    <span>Pedidos nos &Uacute;ltimos <?php echo $_smarty_tpl->tpl_vars['xDias']->value;?>
 Dias</span>
                                    <!-- <a class="btn btn-mini btn-toggle box-form right" href="javascript:;" id="btn-detalhes" data-toggle="grafico-pedidos-chart">
                                        <span class="icon16 icomoon-icon-bars"></span>
                                        Ver detalhes
                                    </a>
                                    <a class="btn btn-mini btn-toggle box-form right" href="javascript:;" id="btn-geral" data-toggle="grafico-pedidos-donut">
                                        <span class="icon16 icomoon-icon-pie"></span>
                                        Ver geral
                                    </a> -->
                                </h4>
                                <a href="#" class="minimize">Minimize</a>
                            </div>
                            <div class="content" style="padding-bottom:0;">
                               <div id="grafico-pedidos-donut" class="grafico-pedidos-donut" style="height: 500px; width: 500px; margin: 15px auto;"></div>
                               <!-- <div id="grafico-pedidos-chart" class="grafico-pedidos-chart" style="height: 500px; width: 90%; margin: 15px auto;"></div> -->
                            </div>
                            

                        </div><!-- End .box -->

                    </div><!-- End .span8 -->
<!--
                    <div class="span4">

                        <div class="sparkStats">
                            <h4>389 people visited this site <a href="#" class="icon tip" title="Configure"><span class="icon16 iconic-icon-cog"></span></a></h4>
                            <ul class="unstyled">
                                <li><span class="sparkLine1 "></span> Visits: <span class="number">509</span></li>
                                <li>
                                    <span class="sparkLine2"></span>
                                    Unique Visitors:
                                    <span class="number">389</span>
                                </li>
                                <li><span class="sparkLine3"></span>
                                    Pageviews:
                                    <span class="number">731</span>
                                </li>
                                <li><span class="sparkLine4"></span>
                                    Pages / Visit:
                                    <span class="number">1.44</span>
                                </li>
                                <li><span class="sparkLine5"></span>
                                    Avg. Visit Duration:
                                    <span class="number">00:01:21</span>
                                </li>
                                <li><span class="sparkLine6"></span>
                                    Bounce Rate: <span class="number">68.37%</span>
                                </li>
                                <li><span class="sparkLine7"></span>
                                    % New Visits:
                                    <span class="number">76.23%</span>
                                </li>

                            </ul>
                            <div class="right" style="padding: 15px 0">
                                <a href="charts.html" class="btn btn-info">View full statistic <span class="icon16 icomoon-icon-arrow-right white"></span></a>
                            </div>
                        </div>End .sparkStats


                    </div>--><!-- End .span4 -->

                </div><!-- End .row-fluid -->
<!--
                <div class="row-fluid">

                    <div class="span4">

                        <div class="box gradient">

                            <div class="title">

                                <h4>
                                    <span class="icon16 icomoon-icon-pie"></span>
                                    <span>Visitors overview</span>
                                </h4>
                                <a href="#" class="minimize">Minimize</a>
                            </div>
                            <div class="content">
                               <div class="pieStats" style="height: 240px; width:100%;">

                                </div>
                            </div>

                        </div>


                    </div>

                    <div class="span4">
                        <div class="box gradient">

                            <div class="title">

                                <h4>
                                    <span class="icon16 entypo-icon-thumbs-up"></span>
                                    <span>Vital Stats  <span class="label label-success"><span class="icomoon-icon-arrow-up white"></span>1268</span></span>
                                </h4>
                                <a href="#" class="minimize">Minimize</a>
                            </div>
                            <div class="content">

                                <div class="vital-stats" style="padding-bottom:23px">
                                    <ul class="unstyled">
                                        <li>
                                            <span class="icomoon-icon-arrow-up green"></span> 81% Clicks
                                            <span class="pull-right strong">567</span>
                                            <div class="progress progress-striped ">
                                                <div class="bar" style="width: 81%;"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="icomoon-icon-arrow-up green"></span> 72% Uniquie Clicks
                                            <span class="pull-right strong">507</span>
                                            <div class="progress progress-success progress-striped ">
                                                <div class="bar" style="width: 72%;"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="icomoon-icon-arrow-down red"></span> 53% Impressions
                                            <span class="pull-right strong">457</span>
                                            <div class="progress progress-warning progress-striped ">
                                                <div class="bar" style="width: 53%;"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="icomoon-icon-arrow-up green"></span> 3% Online Users
                                            <span class="pull-right strong">8</span>
                                            <div class="progress progress-danger progress-striped ">
                                                <div class="bar" style="width: 3%;"></div>
                                            </div>
                                        </li>

                                    </ul>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="span4">

                        <div class="reminder">
                            <h4>Things you need to do
                                <a href="#" class="icon tip" title="Configure"><span class="icon16 iconic-icon-cog"></span></a>
                            </h4>
                            <ul>
                                <li class="clearfix">
                                    <div class="icon">
                                        <span class="icon32 icomoon-icon-basket gray"></span>
                                    </div>
                                    <span class="number">7</span>
                                    <span class="txt">Pending Orders</span>
                                    <a class="btn btn-warning">go</a>
                                </li>
                                <li class="clearfix">
                                    <div class="icon">
                                        <span class="icon32 icomoon-icon-support red"></span>
                                    </div>
                                    <span class="number">3</span>
                                    <span class="txt">Support Tickets </span>
                                    <a class="btn btn-warning">go</a>
                                </li>
                                <li class="clearfix">
                                    <div class="icon">
                                        <span class="icon32 icomoon-icon-new green"></span>
                                    </div>
                                    <span class="number">5</span>
                                    <span class="txt">New Invoices </span>
                                    <a class="btn btn-warning">go</a>
                                </li>
                                <li class="clearfix">
                                    <div class="icon">
                                        <span class="icon32 icomoon-icon-comments-4 blue"></span>
                                    </div>
                                    <span class="number">13</span>
                                    <span class="txt">Review Comments</span>
                                    <a class="btn btn-warning">go</a>
                                </li>
                                <li class="clearfix">
                                    <div class="icon">
                                        <span class="icon32 icomoon-icon-cog dark"></span>
                                    </div>
                                    <span class="number">2</span>
                                    <span class="txt">Settings to Change </span>
                                    <a class="btn btn-warning">go</a>
                                </li>
                            </ul>
                        </div>

                    </div>

                </div>

                <div class="row-fluid">

                    <div class="span8">
                        <div class="box calendar gradient">

                            <div class="title">

                                <h4>
                                    <i class="icon16 brocco-icon-calendar"></i>
                                    <span>Calendar</span>
                                </h4>

                            </div>
                            <div class="content noPad">
                                <div id="calendar">
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="span4">

                        <div class="todo">
                            <h4>To Do List <a href="#" class="icon tip" title="Add task"><span class="icon16 icomoon-icon-plus-2"></span></a></h4>
                            <ul>
                                <li class="clearfix">
                                    <div class="txt">
                                        Fix some bugs
                                        <span class="by label">Admin</span>
                                        <span class="date badge badge-important">Today</span>
                                    </div>
                                    <div class="controls">
                                        <a href="#" title="Edit task" class="tip"><span class="icon12 icomoon-icon-pencil"></span></a>
                                        <a href="#" title="Remove task" class="tip"><span class="icon12 icomoon-icon-remove"></span></a>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <div class="txt">
                                        Add post about birds
                                        <span class="by label">Julia</span>
                                        <span class="date badge badge-success">Tomorrow</span>
                                    </div>
                                    <div class="controls">
                                        <a href="#" title="Edit task" class="tip"><span class="icon12 icomoon-icon-pencil"></span></a>
                                        <a href="#" title="Remove task" class="tip"><span class="icon12 icomoon-icon-remove"></span></a>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <div class="txt">
                                        Remove some items
                                        <span class="by label">Admin</span>
                                        <span class="date badge badge-success">Tomorrow</span>
                                    </div>
                                    <div class="controls">
                                        <a href="#" title="Edit task" class="tip"><span class="icon12 icomoon-icon-pencil"></span></a>
                                        <a href="#" title="Remove task" class="tip"><span class="icon12 icomoon-icon-remove"></span></a>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <div class="txt">
                                        Staff party (don`t miss)
                                        <span class="by label">Admin</span>
                                        <span class="date badge badge-info">08.08.2012</span>
                                    </div>
                                    <div class="controls">
                                        <a href="#" title="Edit task" class="tip"><span class="icon12 icomoon-icon-pencil"></span></a>
                                        <a href="#" title="Remove task" class="tip"><span class="icon12 icomoon-icon-remove"></span></a>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <div class="txt">
                                        Shedule backup
                                        <span class="by label">Steve</span>
                                        <span class="date badge badge-info">08.08.2012</span>
                                    </div>
                                    <div class="controls">
                                        <a href="#" title="Edit task" class="tip"><span class="icon12 icomoon-icon-pencil"></span></a>
                                        <a href="#" title="Remove task" class="tip"><span class="icon12 icomoon-icon-remove"></span></a>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>

                    <div class="span4">

                        <div class="box gradient">
                            <div class="title">
                                <h4>
                                    <span class="icon16 silk-icon-chat"></span>
                                    <span>Messages layout</span>
                                </h4>
                            </div>
                            <div class="content noPad">

                                <ul class="messages">
                                    <li class="user clearfix">
                                        <a href="#" class="avatar">
                                            <img src="images/avatar2.jpeg" alt="" />
                                        </a>
                                        <div class="message">
                                            <div class="head clearfix">
                                                <span class="name"><strong>Lazar</strong> says:</span>
                                                <span class="time">25 seconds ago</span>
                                            </div>
                                            <p>
                                                Time to go i call you tomorrow.
                                            </p>
                                        </div>
                                    </li>
                                    <li class="admin clearfix">
                                        <a href="#" class="avatar">
                                            <img src="images/avatar3.jpeg" alt="" />
                                        </a>
                                        <div class="message">
                                            <div class="head clearfix">
                                                <span class="name"><strong>Sugge</strong> says:</span>
                                                <span class="time">just now</span>
                                            </div>
                                            <p>
                                                OK, have a nice day.
                                            </p>
                                        </div>
                                    </li>

                                    <li class="sendMsg">
                                        <form class="form-horizontal" action="#" />
                                            <textarea class="elastic" id="textarea" rows="1" placeholder="Enter your message ..." style="width:98%;"></textarea>
                                            <button type="submit" class="btn btn-info marginT10">Send message</button>
                                        </form>
                                    </li>

                                </ul>

                            </div>

                        </div>


                    </div>

                </div>

                <div class="modal fade hide" id="myModal1">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span class="icon12 minia-icon-close"></span></button>
                        <h3>Chat layout</h3>
                    </div>
                    <div class="modal-body">
                        <ul class="messages">
                            <li class="user clearfix">
                                <a href="#" class="avatar">
                                    <img src="images/avatar2.jpeg" alt="" />
                                </a>
                                <div class="message">
                                    <div class="head clearfix">
                                        <span class="name"><strong>Lazar</strong> says:</span>
                                        <span class="time">25 seconds ago</span>
                                    </div>
                                    <p>
                                        Time to go i call you tomorrow.
                                    </p>
                                </div>
                            </li>
                            <li class="admin clearfix">
                                <a href="#" class="avatar">
                                    <img src="images/avatar3.jpeg" alt="" />
                                </a>
                                <div class="message">
                                    <div class="head clearfix">
                                        <span class="name"><strong>Sugge</strong> says:</span>
                                        <span class="time">just now</span>
                                    </div>
                                    <p>
                                        OK, have a nice day.
                                    </p>
                                </div>
                            </li>

                            <li class="sendMsg">
                                <form class="form-horizontal" action="#" />
                                    <textarea class="elastic" id="textarea1" rows="1" placeholder="Enter your message ..." style="width:98%;"></textarea>
                                    <button type="submit" class="btn btn-info marginT10">Send message</button>
                                </form>
                            </li>

                        </ul>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn" data-dismiss="modal">Close</a>
                    </div>
                </div>

            </div>End contentwrapper -->
        </div><!-- End #content -->

    </div><!-- End #wrapper -->
    <script>
        var pedidosDonut = <?php echo $_smarty_tpl->tpl_vars['JSONpedidos']->value;?>
;
        var pedidosChart = <?php echo $_smarty_tpl->tpl_vars['JSONpedidosDetalhe']->value;?>
;
    </script>

<?php }} ?>