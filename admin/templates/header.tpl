<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    
    <title>SPR - Administrador E-commerce</title>
    <meta name="author" content="SuggeElson" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="application-name" content="Supr admin template" />

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Le styles -->

    <!-- Use new way for google web fonts 
    http://www.smashingmagazine.com/2012/07/11/avoiding-faux-weights-styles-google-web-fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css' /> <!-- Headings -->
    <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css' /> <!-- Text -->
    <!--[if lt IE 9]>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:700" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Droid+Sans:400" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Droid+Sans:700" rel="stylesheet" type="text/css" />
    <![endif]-->

    <link href="css/bootstrap/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="css/bootstrap/bootstrap-responsive.css" rel="stylesheet" type="text/css" />
    <link href="css/supr-theme/jquery.ui.supr.css" rel="stylesheet" type="text/css" />
    <link href="css/icons.css" rel="stylesheet" type="text/css" />
    <!-- Plugin stylesheets -->
    <link href="plugins/qtip/jquery.qtip.css" rel="stylesheet" type="text/css" />
    <link href="plugins/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
    <link href="plugins/jpages/jPages.css" rel="stylesheet" type="text/css" />
    <link href="plugins/prettify/prettify.css" type="text/css" rel="stylesheet" />
    <link href="plugins/inputlimiter/jquery.inputlimiter.css" type="text/css" rel="stylesheet" />
    <link href="plugins/ibutton/jquery.ibutton.css" type="text/css" rel="stylesheet" />
    <link href="plugins/uniform/uniform.default.css" type="text/css" rel="stylesheet" />
    <link href="plugins/color-picker/color-picker.css" type="text/css" rel="stylesheet" />
    <link href="plugins/select/select2.css" type="text/css" rel="stylesheet" />

    <link href="plugins/validate/validate.css" type="text/css" rel="stylesheet" />
    <link href="plugins/pnotify/jquery.pnotify.default.css" type="text/css" rel="stylesheet" />
    <link href="plugins/pretty-photo/prettyPhoto.css" type="text/css" rel="stylesheet" />
    <link href="plugins/smartWizzard/smart_wizard.css" type="text/css" rel="stylesheet" />
    <link href="plugins/dataTables/jquery.dataTables.css" type="text/css" rel="stylesheet" />
    <link href="plugins/elfinder/elfinder.css" type="text/css" rel="stylesheet" />
    <link href="plugins/plupload/jquery.ui.plupload/css/jquery.ui.plupload.css" type="text/css" rel="stylesheet" />
    <link href="plugins/search/tipuesearch.css" type="text/css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="plugins/chosen/chosen.css"> -->

    <!-- Main stylesheets -->
    <link href="css/main.css" rel="stylesheet" type="text/css" /> 

    {foreach $css_files as $css_uri}
        <link href="{$css_uri}" rel="stylesheet" type="text/css" />
    {/foreach}

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!--[if lt IE 9]>
        <link type="text/css" href="css/ie.css" rel="stylesheet" />
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="images/favicon.ico" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/apple-touch-icon-144-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/apple-touch-icon-114-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-72-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon-57-precomposed.png" />

    <script type="text/javascript">
        //adding load class to body and hide page
        //********************************************************************************************************************************************habilitar load
        document.documentElement.className += 'loadstate';
        //********************************************************************************************************************************************
    </script>
    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
    <!-- loading animation -->
    <div id="qLoverlay"></div>
    <div id="qLbar"></div>

    <div id="header">

        <div class="navbar">
            <div class="navbar-inner">
              <div class="container-fluid">
                <a class="brand" href="/admin"><img src="images/patterns/logo.png"></a>
                <div class="nav-no-collapse">
                     <ul class="nav span6">
                        <li class="span6">
                            <form action="" method="post" id="formBuscaTopo">
                                <select class="nostyle left" name="tipoBuscaTopo" id="tipoBuscaTopo">
                                    <option value="pedido-lista" {if $tipoBuscaTopo eq 'pedido-lista'}selected="selected"{/if} />Pedido
                                    <option value="produto-lista" {if $tipoBuscaTopo eq 'produto-lista'}selected="selected"{/if} />Produto
                                    <option value="pessoa-lista" {if $tipoBuscaTopo eq 'pessoa-lista'}selected="selected"{/if} />Pessoa
                                </select>
                                <input name="buscaGeralTopo" type="text" id="buscaGeralTopo" class="searchField left" placeholder="busca ..." value="{$buscaGeralTopo}" />
                            </form>
                        </li>
                        <!-- <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="icon16 icomoon-icon-cog"></span> Settings
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="menu">
                                    <ul>
                                        <li>                                                    
                                            <a href="#"><span class="icon16 iconic-icon-new-window"></span>Site config</a>
                                        </li>
                                        <li>                                                    
                                            <a href="#"><span class="icon16 icomoon-icon-wrench"></span>Plugins</a>
                                        </li>
                                        <li>
                                            <a href="#"><span class="icon16 icomoon-icon-picture-2"></span>Themes</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="icon16 icomoon-icon-mail"></span>Messages <span class="notification">8</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="menu">
                                    <ul class="messages">    
                                        <li class="header"><strong>Messages</strong> (10) emails and (2) PM</li>
                                        <li>
                                           <span class="icon"><span class="icon16 icomoon-icon-user-2"></span></span>
                                            <span class="name"><a data-toggle="modal" href="#myModal1"><strong>Sammy Morerira</strong></a><span class="time">35 min ago</span></span>
                                            <span class="msg">I have question about new function ...</span>
                                        </li>
                                        <li>
                                           <span class="icon avatar"><img src="images/avatar.jpg" alt="" /></span>
                                            <span class="name"><a data-toggle="modal" href="#myModal1"><strong>George Michael</strong></a><span class="time">1 hour ago</span></span>
                                            <span class="msg">I need to meet you urgent please call me ...</span>
                                        </li>
                                        <li>
                                            <span class="icon"><span class="icon16 icomoon-icon-mail"></span></span>
                                            <span class="name"><a data-toggle="modal" href="#myModal1"><strong>Ivanovich</strong></a><span class="time">1 day ago</span></span>
                                            <span class="msg">I send you my suggestion, please look and ...</span>
                                        </li>
                                        <li class="view-all"><a href="#">View all messages <span class="icon16  icomoon-icon-arrow-right-7"></span></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li> -->
                    </ul>
                  
                    <ul class="nav pull-right usernav">
                        <!-- <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="icon16 icomoon-icon-bell"></span><span class="notification">3</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="menu">
                                    <ul class="notif">
                                        <li class="header"><strong>Notifications</strong> (3) items</li>
                                        <li>
                                            <a href="#">
                                                <span class="icon"><span class="icon16 icomoon-icon-user-2"></span></span>
                                                <span class="event">1 User is registred</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="icon"><span class="icon16 icomoon-icon-comments-4"></span></span>
                                                <span class="event">Jony add 1 comment</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="icon"><span class="icon16 icomoon-icon-new"></span></span>
                                                <span class="event">admin Julia added post</span>
                                            </a>
                                        </li>
                                        <li class="view-all"><a href="#">View all notifications <span class="icon16  icomoon-icon-arrow-right-7"></span></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>-->
                        <!-- <li class="dropdown">
                            <a href="#" class="dropdown-toggle avatar" data-toggle="dropdown">
                                <img src="images/avatar.jpg" alt="" class="image" /> 
                                <span class="txt">admin@supr.com</span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="menu">
                                    <ul>
                                        <li>
                                            <a href="#"><span class="icon16 icomoon-icon-user-3"></span>Edit profile</a>
                                        </li>
                                        <li>
                                            <a href="#"><span class="icon16 icomoon-icon-comments-2"></span>Approve comments</a>
                                        </li>
                                        <li>
                                            <a href="#"><span class="icon16 entypo-icon-contact"></span>Add user</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>-->
                        <li>
                            <!-- <input class="span8" id="appendedInputButton" size="16" type="text" /><button class="btn" type="button">Buscar</button> -->
                            <!-- <div class="left marginT5">
                                <select>
                                    <option />Who
                                    <option selected="selected" />What
                                    <option />When
                                    <option />Where
                                    <option />How
                                </select>
                            </div> -->
                        </li>
                        <li><a href="javascript:geraProdutoSite(0);"><span class="icon16 icomoon-icon-database"></span> Gera Produto Site Total</a></li>
                        <li><a href="login/sair.php"><span class="icon16 icomoon-icon-exit"></span> Logout</a></li>
                    </ul>
                </div><!-- /.nav-collapse -->
              </div>
            </div><!-- /navbar-inner -->
          </div><!-- /navbar --> 

    </div><!-- End #header -->