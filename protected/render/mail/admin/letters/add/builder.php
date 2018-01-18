<?
$nav = [];

foreach ($data['path'] as $key => $value) {
    $nav[$key ? $value : 'Письма'] = 'admin/mail/letters/' . APP::Module('Crypt')->Encode($key);
}
?>
<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Создание письма</title>

        <!-- Vendor CSS -->
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">        
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/google-material-color/dist/palette.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css" rel="stylesheet">
        
        <link href="<?= APP::Module('Routing')->root ?>public/nifty/ui/plugins/codemirror/lib/codemirror.css" rel="stylesheet">
        <link href="<?= APP::Module('Routing')->root ?>public/nifty/ui/plugins/codemirror/addon/display/fullscreen.css" rel="stylesheet">
        
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

        <link href="<?= APP::Module('Routing')->root ?>public/modules/mail/email-builder/css/colpick.css" rel="stylesheet"  type="text/css"/>
        <link href="<?= APP::Module('Routing')->root ?>public/modules/mail/email-builder/css/responsive-table.css" rel="stylesheet"/>
        <link href="<?= APP::Module('Routing')->root ?>public/modules/mail/email-builder/css/template.editor.css" rel="stylesheet"/>
        <link href="<?= APP::Module('Routing')->root ?>public/modules/mail/email-builder/css/css.css" rel="stylesheet"/>
        
        <? APP::Render('core/widgets/css') ?>
    </head>
    <body data-ma-header="teal">
        <? APP::Render('admin/widgets/header', 'include', $nav) ?>
        
        <section id="main">
            <? APP::Render('admin/widgets/sidebar') ?>

            <section id="content">
                <div class="container">
                    <div class="card">
                        <form id="add-letter" class="form-horizontal" role="form">
                            <input type="hidden" name="group_id" value="<?= APP::Module('Crypt')->Encode($data['group_sub_id']) ?>">
                            
                            <div class="card-header">
                                <h2>Создание письма</h2>
                            </div>

                            <div class="card-body card-padding">
                                <div class="form-group">
                                    <label for="sender" class="col-sm-2 control-label">Отправитель</label>
                                    <div class="col-sm-5">
                                        <div class="fg-line">
                                            <select id="sender" name="sender" class="selectpicker">
                                                <? foreach ($data['senders'] as $value) { ?><option value="<?= $value['id'] ?>"><?= $value['name'] ?> &lt;<?= $value['email'] ?>&gt;</option><? } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="subject" class="col-sm-2 control-label">Тема</label>
                                    <div class="col-sm-10">
                                        <div class="fg-line">
                                            <input type="text" class="form-control" name="subject" id="subject">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="html" class="col-sm-2 control-label">HTML-версия</label>
                                    <div class="col-sm-10">
                                        <textarea name="html_source" id="html_source" style="display: none"></textarea>
                                        

                                        
                                        
                                        
                                        
                                        
                                        <div role="tabpanel">
                                <ul class="tab-nav" role="tablist" data-tab-color="teal">
                                    <li class="active"><a href="#email-builder" class="email-editor" aria-controls="email-builder" role="tab" data-toggle="tab" data-object="builder" aria-expanded="true">Конструктор</a></li>
                                    <li class=""><a href="#email-code" class="email-editor" aria-controls="email-code" role="tab" data-toggle="tab" data-object="code" aria-expanded="false">Редактор кода</a></li>
                                </ul>

                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane " id="email-code">
                                        <textarea name="html" id="html" class="form-control"></textarea>
                                        
                                    </div>
                                    <div role="tabpanel" class="tab-pane active" id="email-builder">
                                    
                                        
                                        
                                        
                                        
                                                  
                                        
                                        
                                        
                                        
                                        
                                        
                                        <!--  wrapper / INIZIO -->
        <div id="wrapper">

            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <br>
                <ul class="sidebar-nav" id="sidebar">
                    <li><a href="javascript:void(0);" class="em_menu" data-group="main"> <i
                                class="fa fa-th-large fa-2x" aria-hidden="true"></i></a></li>
                    <li><a href="javascript:void(0);" class="em_menu" data-group="title"><i
                                style="color: #ffffff !important" class="fa fa-header fa-2x"></i></a></li>
                    <li><a href="javascript:void(0);" class="em_menu" data-group="text"><i
                                style="color: #ffffff !important" class="fa fa-font fa-2x"></i></a></li>
                    <li><a href="javascript:void(0);" class="em_menu" data-group="tools"> <i
                                class="fa fa-ellipsis-h fa-2x" aria-hidden="true"></i></a></li>
                                
                    <li><a href="javascript:void(0);" class="em_menu" data-group="image"><i
                                class="fa fa-file-image-o fa-2x"></i></a></li>
                    <li><a href="javascript:void(0);" class="em_menu"  data-group="social"><i class="fa fa-twitter fa-2x"  aria-hidden="true"></i></a></li>
                    <li><a href="javascript:void(0);" id="edittamplate"><i class="fa fa-cog fa-2x"  aria-hidden="true"></i></a></li>

                </ul>
            </div>

            <!-- sidebar with elements -->
            <div id="sidebar-opzioni" class="sidebar-nav">
              <a href="javascript:void(0);" id="closeSideBarnav"> <i class="pull-right fa fa-times" aria-hidden="true"   style="padding: 10px"></i></a> <br>

                <div id="em_elements">
                    <ul class="nav nav-list accordion-group">
                        <li class="rows" id="estRows">
                             <!-- load elements -->
                        </li>
                    </ul>
                </div>
            </div>
              <!-- sidebar with elements -->

              
            <div id="tosave" data-id="11111111111111"  data-paramone="11" data-paramtwo="22" data-paramthree="33"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="background: #eeeeee">
                   <tbody><tr>
                       <td width="100%" id="primary" class="main demo" align="center" valign="top" style="min-height: 827px; padding: 30px 15px;">
                           <!-- inizio contentuto      -->


                            <div class="column ui-sortable">

                                <!-- default element text -->
                               <?
                               $email_header = file_get_contents(ROOT . '/public/modules/mail/email-builder/elements/main/header.html');
                               $email_header = str_replace("{PATH}", APP::Module('Routing')->root, $email_header);
                               echo $email_header;
                               ?>



                            <div class="lyrow ui-draggable" style="display: block;">
    <a href="#close" class="remove label label-danger"><i class="glyphicon-remove glyphicon"></i></a>
    <span class="drag label label-default"><i class="glyphicon glyphicon-move"></i></span>
    <span class="configuration"> <a href="#" class="btn btn-default btn-xs clone"><i class="glyphicon glyphicon glyphicon-menu-hamburger"></i> </a>  </span>

    <div class="preview">
        <img src="/public/modules/mail/email-builder/elements/tools/line1.jpg" width="200">
    </div>
    <div class="view">
        <div class="row clearfix">
            <table class="main" width="640" style="border: 0px; display: table; background-color: rgb(255, 255, 255);" cellspacing="0" cellpadding="0" border="0" align="center" data-type="line" id="f57121aa-84a4-af9c-134d-58cee71427a4">
                <tbody><tr>
                    <td class="divider-simple" style="padding: 15px 50px 0px 50px;">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0" style="border-top: 1px solid #DADFE1;">
                            <tbody><tr>
                                <td width="100%" height="15px"></td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
            </tbody></table>
        </div>
    </div>
</div>
                                
                                
                                
                                
                                <div class="lyrow" style="display: block; position: relative; opacity: 1; z-index: 0; left: 0px; top: 0px;">
                                   <a href="#close" class="remove label label-danger"><i class="glyphicon-remove glyphicon"></i></a>
                                   <span class="drag label label-default"><i class="glyphicon glyphicon-move"></i></span>
                                   <div class="view">

                                        <div class="row clearfix">
                                           <table width="640" class="main" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF" align="center" data-type="text-block" style="display: table; background-color: rgb(255, 255, 255);" id="ed9a208b-39bc-62dc-c773-cb42054da695">
                                               <tbody>
                                                   <tr>
                                                       <td class="block-text" align="left" style="padding:10px 50px 10px 50px;font-family:Arial;font-size:13px;color:#000000;line-height:22px">
                                                           <p style="margin:0px 0px 10px 0px;line-height:22px">
                                                               </p><center>
                                                                   <i class="fa fa-arrow-up fa-3x"></i> <br><br>
                                                                Перетащите сюда необходимые элемены<br><br>
                                                               <i class="fa fa-arrow-down fa-3x"></i>
                                                               </center>
                                                           <p></p>

                                                        </td>
                                                   </tr>
                                               </tbody>
                                           </table>
                                       </div>
                                   </div>
                               </div>
                                
                                
                                <div class="lyrow ui-draggable" style="display: block;">
    <a href="#close" class="remove label label-danger"><i class="glyphicon-remove glyphicon"></i></a>
    <span class="drag label label-default"><i class="glyphicon glyphicon-move"></i></span>
    <span class="configuration"> <a href="#" class="btn btn-default btn-xs clone"><i class="glyphicon glyphicon glyphicon-menu-hamburger"></i> </a>  </span>

    <div class="preview">
        <img src="/public/modules/mail/email-builder/elements/tools/line1.jpg" width="200">
    </div>
    <div class="view">
        <div class="row clearfix">
            <table class="main" width="640" style="border: 0px; display: table; background-color: rgb(255, 255, 255);" cellspacing="0" cellpadding="0" border="0" align="center" data-type="line" id="aa9882dd-40dd-ca4f-e614-68467ee080ee">
                <tbody><tr>
                    <td class="divider-simple" style="padding: 15px 50px 0px 50px;">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0" style="border-top: 1px solid #DADFE1;">
                            <tbody><tr>
                                <td width="100%" height="15px"></td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
            </tbody></table>
        </div>
    </div>
</div>
                                
                                
                                <?
                               $email_footer = file_get_contents(ROOT . '/public/modules/mail/email-builder/elements/main/footer.html');
                               $email_footer = str_replace("{PATH}", APP::Module('Routing')->root, $email_footer);
                               echo $email_footer;
                               ?>

                            
                            
                            
                            </div>

                        </td>
                   </tr>
               </tbody></table></div>
            <div id="download-layout">

            </div>
        </div>
        <!--/row-->


        <!-- Modal test device-->
        <div class="modal fade" id="previewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="min-width:120px">
                    <div class="modal-header">
                        <input id="httphref" type="text" name="href" value="http://" class="form-control" />
                    </div>
                    <div class="modal-body" align="center">
                        <div class="btn-group  previewActions">
                            <a class="btn btn-default btn-sm " href="#">iphone</a>
                            <a class="btn btn-default btn-sm " href="#">smalltablet</a>
                            <a class="btn btn-default btn-sm " href="#">ipad</a>
                        </div>
                        <iframe id="previewFrame"  class="iphone"></iframe>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <textarea id="imageid" class="hide"></textarea>
        <textarea id="download" class="hide"></textarea>
        <textarea id="selector" class="hide"></textarea>
        <textarea id="path" class="hide"></textarea>

        <!-- Modal test device-->








        <!--  sidebar-editor / INIZIO -->
        <div id="sidebar-editor">
               <a href="javascript:void(0);" id="closeSideBar"> <i class="pull-right fa fa-times" aria-hidden="true"   style="padding: 10px"></i></a> <br>
                  <div class="hide" id="settings">

                      <ul class="nav nav-tabs">
                        <li><a data-toggle="tab" href="#padding">Padding</a></li>
                        <li><a data-toggle="tab" href="#style">Style</a></li>
                        <li><a data-toggle="tab" href="#contentuto">Content</a></li>
                      </ul>

                      <div class="tab-content">
                        <div id="padding" class="tab-pane active">

                          <br />
                          <form class="form-inline" id="common-settings">
                                     <center>
                                         <table>
                                             <tbody>
                                                 <tr>
                                                     <td></td>
                                                     <td><input type="text" class="form-control" placeholder="top" value="15px" id="ptop" name="ptop" style="width: 60px; margin-right: 5px"></td>
                                                     <td></td>
                                                 </tr>
                                                 <tr>
                                                     <td><input type="text" class="form-control" placeholder="left" value="15px" id="pleft" name="mtop" style="width: 60px; margin-right: 5px"></td>
                                                     <td></td>
                                                     <td><input type="text" class="form-control" placeholder="right" value="15px" id="pright" name="mbottom" style="width: 60px; margin-right: 5px"></td>
                                                 </tr>
                                                 <tr>
                                                     <td></td>
                                                     <td><input type="text" class="form-control" placeholder="bottom" value="15px" id="pbottom" name="pbottom" style="width: 60px; margin-right: 5px"></td>
                                                     <td></td>
                                                 </tr>
                                             </tbody>
                                         </table>
                                     </center>

                             </form>

                        </div>
                        <div id="style" class="tab-pane">

                          <br />
                          <form id="background"  class="form-inline">
                              <div class="form-group">
                                  <label for="bgcolor">Background</label>
                                  <div class="color-circle" id="bgcolor"></div>
                              </div>
                          </form>

                          <form class="form-inline" id="font-settings" style="margin-top:5px">
                              <div class="form-group">
                                  <label for="fontstyle">Font style</label>
                                  <div id="fontstyle" class="color-circle"><i class="fa fa-font"></i></div>
                              </div>
                          </form>

                          <div class="hide" id='font-style'>
                              <div id="mainfontproperties" >
                                  <div class="input-group" style="margin-bottom: 5px">
                                      <span class="input-group-addon" style="min-width: 60px;">Color</span>
                                      <input type="text" class="form-control picker" id="colortext" >
                                      <span class="input-group-addon"></span>
                                      <script type="text/javascript">
                                          
                                      </script>
                                  </div>
                                  <div class="input-group" style="margin-bottom: 5px">
                                      <span class="input-group-addon" style="min-width: 60px;">Font</span>
                                      <input type="text" class="form-control " id="fonttext" readonly>
                                  </div>
                                  <div class="input-group" style="margin-bottom: 5px">
                                      <span class="input-group-addon" style="min-width: 60px;">Size</span>
                                      <input type="text" class="form-control " id="sizetext" style="width: 100px">
                                      &nbsp;
                                      <a class="btn btn-default plus" href="#">+</a>
                                      <a class="btn btn-default minus" href="#">-</a>
                                  </div>

                                  <hr/>
                                  <div class="text text-right">
                                      <a class="btn btn-info" id="confirm-font-properties">OK</a>
                                  </div>
                              </div>

                              <div id="fontselector" class="hide" style="min-width: 200px">
                                  <ul class="list-group" style="overflow: auto ;display: block;max-height: 200px" >
                                      <li class="list-group-item" style="font-family: arial">Arial</li>
                                      <li class="list-group-item" style="font-family: verdana">Verdana</li>
                                      <li class="list-group-item" style="font-family: helvetica">Helvetica</li>
                                      <li class="list-group-item" style="font-family: times">Times</li>
                                      <li class="list-group-item" style="font-family: georgia">Georgia</li>
                                      <li class="list-group-item" style="font-family: tahoma">Tahoma</li>
                                      <li class="list-group-item" style="font-family: pt sans">PT Sans</li>
                                      <li class="list-group-item" style="font-family: Source Sans Pro">Source Sans Pro</li>
                                      <li class="list-group-item" style="font-family: PT Serif">PT Serif</li>
                                      <li class="list-group-item" style="font-family: Open Sans">Open Sans</li>
                                      <li class="list-group-item" style="font-family: Josefin Slab">Josefin Slab</li>
                                      <li class="list-group-item" style="font-family: Lato">Lato</li>
                                      <li class="list-group-item" style="font-family: Arvo">Arvo</li>
                                      <li class="list-group-item" style="font-family: Vollkorn">Vollkorn</li>
                                      <li class="list-group-item" style="font-family: Abril Fatface">Abril Fatface</li>
                                      <li class="list-group-item" style="font-family: Playfair Display">Playfair Display</li>
                                      <li class="list-group-item" style="font-family: Yeseva One">Yeseva One</li>
                                      <li class="list-group-item" style="font-family: Poiret One">Poiret One</li>
                                      <li class="list-group-item" style="font-family: Comfortaa">Comfortaa</li>
                                      <li class="list-group-item" style="font-family: Marck Script">Marck Script</li>
                                      <li class="list-group-item" style="font-family: Pacifico">Pacifico</li>
                                  </ul>
                              </div>
                          </div>

                        </div>
                        <div id="contentuto" class="tab-pane">

                          <!-- videopropoerties -->
                          <div id="videoproperties" style="margin-top:5px">

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-8">
                                        Youtube url: <input type="text" id="youtube-image-link-url" class="form-control" data-id="none">
                                    </div>
                                    <div class="col-xs-4">
                                      <br />
                                        <input type="button" id="generayoutube" class="form-control" value="genera">
                                    </div>
                                </div>
                            </div>

                              <div class="form-group">
                                  <div class="row">
                                      <div class="col-xs-12">
                                          Image url: <input type="text" id="youtube-image-url" class="form-control" data-id="none"/>
                                      </div>
                                  </div>
                              </div>

                              <div class="form-group">
                                  <div class="row">
                                      <div class="col-md-4">
                                          W: <input type="text" id="youtube-image-w" class="form-control" name="director" />
                                      </div>

                                      <div class="col-md-4">
                                          H: <input type="text" id="youtube-image-h"class="form-control" name="writer" />
                                      </div>

                                      <div class="col-md-4">
                                        <br />
                                        <a class="btn btn-warning" href="#" id="youtube-change-image"><i class="fa fa-edit"></i>&nbsp;Apply</a>
                                      </div>

                                  </div>
                              </div>

                          </div>
                          <!-- videopropoerties -->

                          <!-- imageproperties -->
                          <div id="imageproperties" style="margin-top:5px">

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-12">
                                        Link url: <input type="text" id="image-link-url" class="form-control" data-id="none">
                                    </div>
                                </div>
                            </div>

                              <div class="form-group">
                                  <div class="row">
                                      <div class="col-xs-9">
                                          Image url: <input type="text" id="image-url" class="form-control" data-id="none"/>
                                      </div>
                                      <div class="col-xs-3"><br />
                                          <a id="popupimg" class="btn btn-default" data-toggle="modal" data-target="#previewimg">...</a>
                                      </div>
                                  </div>
                              </div>

                              <div class="form-group">
                                  <div class="row">
                                      <div class="col-md-4">
                                          W: <input type="text" id="image-w" class="form-control" name="director" />
                                      </div>

                                      <div class="col-md-4">
                                          H: <input type="text" id="image-h"class="form-control" name="writer" />
                                      </div>

                                      <div class="col-md-4">
                                        <br />
                                          <a class="btn btn-warning" href="#" id="change-image"><i class="fa fa-edit"></i>&nbsp;Apply</a>
                                      </div>

                                  </div>
                              </div>

                          </div>
                          <!-- imageproperties -->

                          <form id="editor" style="margin-top:5px">
                            Text content:
                              <div class="panel panel-body panel-default html5editor" id="html5editor"></div>
                          </form>

                          <form id="editorlite" style="margin-top:5px">
                              <br />
                                  <input type="text" style="width:100%" class="panel panel-body panel-default html5editorlite" id="html5editorlite">
                                  Alignment: <select id="allineamento">
                                  <option value=""></option>
                                  <option value="left">left</option>
                                  <option value="right">right</option>
                                  <option value="center">center</option>
                              </select>
                          </form>

                          <div id="social-links">
                              <ul class="list-group" id="social-list">
                                  <li>
                                      <div class="input-group">
                                          <span class="input-group-addon" ><i class="fa fa-2x fa-facebook-official"></i></span>
                                          <input type="text" class="form-control social-input" name="facebook" style="height:48px"/>
                                          <span class="input-group-addon" ><input  type="checkbox" checked="checked" name="facebook" class="social-check"/></span>
                                      </div>
                                  </li>
                                  <li>
                                      <div class="input-group">
                                          <span class="input-group-addon" ><i class="fa fa-2x fa-twitter"></i></span>
                                          <input type="text" class=" form-control social-input" name="twitter" style="height:48px"/>
                                          <span class="input-group-addon" ><input type="checkbox" checked="checked" name="twitter" class="social-check"/></span>
                                      </div>
                                  </li>
                                  <li>
                                      <div class="input-group">
                                          <span class="input-group-addon" ><i class="fa fa-2x fa-linkedin"></i></span>
                                          <input type="text" class=" form-control social-input" name="linkedin" style="height:48px"/>
                                          <span class="input-group-addon" ><input type="checkbox" checked="checked" name="linkedin" class="social-check"/></span>
                                      </div>
                                  </li>
                                  <li>
                                      <div class="input-group">
                                          <span class="input-group-addon" ><i class="fa fa-2x fa-youtube"></i></span>
                                          <input type="text" class=" form-control social-input" name="youtube" style="height:48px"/>
                                          <span class="input-group-addon" ><input type="checkbox" checked="checked" name="youtube" class="social-check" /></span>
                                      </div>
                                  </li>
                              </ul>
                          </div>

                          <div id="buttons" style="max-width: 400px">
                              <div class="form-group">
                                Alignment:
                                  <select class="form-control">
                                      <option value="center">Align buttons to Center</option>
                                      <option value="left">Align buttons to Left</option>
                                      <option value="right">Align buttons to Right</option>
                                  </select>
                              </div>
                              <ul id="buttonslist" class="list-group">
                                  <li class="hide" style="padding:10px; border:1px solid #DADFE1; border-radius: 4px">

                                    <!--
                                      <span class="orderbutton"><i class="fa fa-bars"></i></span>
                                      <span class="pull-right trashbutton"><i class="fa fa-trash"></i></span>
                                    -->
                                      <div class="form-group">
                                          <input type="text" class="form-control" placeholder="Enter Button Title" name="btn_title"/>
                                      </div>
                                      <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1"><i class="fa fa-paperclip"></i></span>
                                        <input type="text" class="form-control"  placeholder="Add link to button" aria-describedby="basic-addon1" name="btn_link"/>
                                      </div>
                                      <br />
                                      <div class="input-group" style="margin-top:10px">
                                          <label for="buttonStyle">Button Style</label>
                                          <div   class="color-circle buttonStyle" data-original-title="" title="">
                                              <i class="fa fa-font"></i>
                                          </div>
                                          <div class="stylebox hide" style="width:400px">
                                              <!--
                                           <div class="input-group " style="margin-bottom: 5px">
                                               <span class="input-group-addon"><i class="fa fa-font"></i></span>
                                               <input type="text" class="form-control fontstyle" name="fontstyle" readonly style="cursor:pointer;background-color: #fff"/>
                                           </div>-->
                                              <label> Button Size</label>
                                              <div class="input-group " style="margin-bottom: 5px">
                                                  <span class="input-group-addon button"  ><i class="fa fa-plus" style="  cursor : pointer;"></i></span>
                                                  <input type="text" class="form-control text-center"  placeholder="Button Size"  name="ButtonSize"/>
                                                  <span class="input-group-addon button"  ><i class="fa fa-minus" style="  cursor : pointer;"></i></span>
                                              </div>
                                              <label> Font Size</label>
                                              <div class="input-group " style="margin-bottom: 5px">

                                                  <span class="input-group-addon font"  ><i class="fa fa-plus" style="  cursor : pointer;"></i></span>
                                                  <input type="text" class="form-control text-center"  placeholder="Font Size"  name="FontSize"/>
                                                  <span class="input-group-addon font"  ><i class="fa fa-minus" style="  cursor : pointer;"></i></span>
                                              </div>
                                              <div class="input-group background" style="margin-bottom: 5px">
                                                  <span class="input-group-addon " style="width: 50px;">Background Color</span>
                                                  <span class="input-group-addon picker" data-color="bg"></span>
                                              </div>

                                              <div class="input-group fontcolor" style="margin-bottom: 5px" >
                                                  <span class="input-group-addon" style="width: 50px;">Font Color</span>
                                                  <span class="input-group-addon picker" data-color="font"></span>
                                                  <script type="text/javascript">
                                                      
                                                  </script>

                                              </div>
                                              <div class="text text-right">
                                                  <a href="#" class="btn btn-xs btn-default confirm">Ok</a>
                                              </div>
                                          </div>
                                          <div class="fontselector" class="hide" style="min-width: 200px">
                                              <ul class="list-group" style="overflow: auto ;display: block;max-height: 200px" >
                                                  <li class="list-group-item" style="font-family: arial">Arial</li>
                                                  <li class="list-group-item" style="font-family: verdana">Verdana</li>
                                                  <li class="list-group-item" style="font-family: helvetica">Helvetica</li>
                                                  <li class="list-group-item" style="font-family: times">Times</li>
                                                  <li class="list-group-item" style="font-family: georgia">Georgia</li>
                                                  <li class="list-group-item" style="font-family: tahoma">Tahoma</li>
                                                  <li class="list-group-item" style="font-family: pt sans">PT Sans</li>
                                                  <li class="list-group-item" style="font-family: Source Sans Pro">Source Sans Pro</li>
                                                  <li class="list-group-item" style="font-family: PT Serif">PT Serif</li>
                                                  <li class="list-group-item" style="font-family: Open Sans">Open Sans</li>
                                                  <li class="list-group-item" style="font-family: Josefin Slab">Josefin Slab</li>
                                                  <li class="list-group-item" style="font-family: Lato">Lato</li>
                                                  <li class="list-group-item" style="font-family: Arvo">Arvo</li>
                                                  <li class="list-group-item" style="font-family: Vollkorn">Vollkorn</li>
                                                  <li class="list-group-item" style="font-family: Abril Fatface">Abril Fatface</li>
                                                  <li class="list-group-item" style="font-family: Playfair Display">Playfair Display</li>
                                                  <li class="list-group-item" style="font-family: Yeseva One">Yeseva One</li>
                                                  <li class="list-group-item" style="font-family: Poiret One">Poiret One</li>
                                                  <li class="list-group-item" style="font-family: Comfortaa">Comfortaa</li>
                                                  <li class="list-group-item" style="font-family: Marck Script">Marck Script</li>
                                                  <li class="list-group-item" style="font-family: Pacifico">Pacifico</li>
                                              </ul>
                                          </div>

                                      </div>


                                  </li>
                              </ul>

                          </div>
                          </div>


                        </div>

                      <br />
                      <center> <a href="#" id="saveElement" class="btn btn-info">Сохранить изменения</a> </center>

                      </div> <!-- settings -->

        </div>   <!--  sidebar-editor / FINE -->
                                        
                                        
                                        
                                        
                                    </div>
                                    
                                    
                                </div>
                            </div>
                                        
                                        
                                        
                                        
                                        
                                        
                              
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="plaintext" class="col-sm-2 control-label">Текстовая версия</label>
                                    <div class="col-sm-10">
                                        <div class="fg-line">
                                            <textarea name="plaintext" id="plaintext" class="form-control" placeholder="Write plaintext version of the letter"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="transport" class="col-sm-2 control-label">Транспорт</label>
                                    <div class="col-sm-2">
                                        <div class="fg-line">
                                            <select id="transport" name="transport" class="selectpicker">
                                                <? foreach ($data['transport'] as $value) { ?><option value="<?= $value['id'] ?>"><?= $value['module'] ?> / <?= $value['method'] ?></option><? } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="priority" class="col-sm-2 control-label">Приоритет</label>
                                    <div class="col-sm-2">
                                        <select id="priority" name="priority" class="selectpicker">
                                            <option value="1">минимальный</option>
                                            <option value="50">средний</option>
                                            <option value="100">высокий</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-5">
                                        <button type="submit" class="btn palette-Teal bg waves-effect btn-lg">Создать письмо</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>

            <? APP::Render('admin/widgets/footer') ?>
        </section>

        <? APP::Render('core/widgets/page_loader') ?>
        <? APP::Render('core/widgets/ie_warning') ?>

        <!-- Javascript Libraries -->
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/Waves/dist/waves.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.min.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>public/ui/vendors/bower_components/autosize/dist/autosize.min.js"></script>
        
        <script src="<?= APP::Module('Routing')->root ?>/public/nifty/ui/plugins/codemirror/lib/codemirror.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>/public/nifty/ui/plugins/codemirror/addon/edit/matchbrackets.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>/public/nifty/ui/plugins/codemirror/addon/display/fullscreen.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>/public/nifty/ui/plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>/public/nifty/ui/plugins/codemirror/mode/xml/xml.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>/public/nifty/ui/plugins/codemirror/mode/javascript/javascript.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>/public/nifty/ui/plugins/codemirror/mode/css/css.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>/public/nifty/ui/plugins/codemirror/mode/clike/clike.js"></script>
        <script src="<?= APP::Module('Routing')->root ?>/public/nifty/ui/plugins/codemirror/mode/php/php.js"></script>
        
        <!--[if lt IE 9]>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <![endif]-->
        <script type="text/javascript"> var path = '<?= APP::Module('Routing')->root ?>admin/mail/letters/email-builder';</script>
        <script type="text/javascript" src="http://feather.aviary.com/js/feather.js"></script>

        <script type="text/javascript" src="https://code.jquery.com/ui/1.9.2/jquery-ui.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>

        <script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.2.6/plugins/colorpicker/plugin.min.js"></script>
        <script type="text/javascript" src="<?= APP::Module('Routing')->root ?>public/modules/mail/email-builder/js/colpick.js"></script>
        <script type="text/javascript">var scrippath="<?= APP::Module('Routing')->root ?>admin/mail/letters/email-builder";</script>
        <script type="text/javascript" src="<?= APP::Module('Routing')->root ?>public/modules/mail/email-builder/js/template.editor.js"></script>

        <? APP::Render('core/widgets/js') ?>
        
        <script>
            autosize($('#html'));
            autosize($('#plaintext'));
                
            var html_version = CodeMirror.fromTextArea(document.getElementById('html'), {
                lineNumbers: true,
                mode: "application/x-httpd-php",
                extraKeys: {
                    "F11": function(cm) {
                        cm.setOption("fullScreen", !cm.getOption("fullScreen"));
                    },
                    "Esc": function(cm) {
                        if (cm.getOption("fullScreen")) cm.setOption("fullScreen", false);
                    }
                }
            });

            var text_version = CodeMirror.fromTextArea(document.getElementById('plaintext'), {
                lineNumbers: true,
                mode: "application/x-httpd-php",
                extraKeys: {
                    "F11": function(cm) {
                        cm.setOption("fullScreen", !cm.getOption("fullScreen"));
                    },
                    "Esc": function(cm) {
                        if (cm.getOption("fullScreen")) cm.setOption("fullScreen", false);
                    }
                }
            });

            html_version.setValue($('#tosave').html());

            $('.email-editor').on('shown.bs.tab', function (e) {
                switch($(e.target).data('object')) {
                    case 'builder':
                        $('#tosave').html(html_version.getValue());
                        initEmailBuilder();
                        break;
                    case 'code':
                        html_version.setValue($('#tosave').html());
                        break;
                }
            });
            
            $('#transport').val($('select[name="transport"] > option:contains("SendThis / DaemonTransport")').val());
            
            $(document).ready(function() {
                $('.picker').colpick({
                                                          layout: 'hex',
                                                          // colorScheme: 'dark',
                                                          onChange: function (hsb, hex, rgb, el, bySetColor) {
                                                              if (!bySetColor)
                                                                  $(el).css('background-color', '#' + hex);

                                                              var color = $(el).data('color');
                                                              var indexBnt = getIndex($(el).parent().parent().parent().parent().parent(), $('#buttonslist li')) - 1;
                                                              if (color === 'bg') {
                                                                  $($('#' + $('#path').val()).find('table tbody tr td:eq(' + indexBnt + ') a')).css('background-color', '#' + hex);
                                                                  $(el).parent().parent().parent().parent().find('div.color-circle').css('background-color', '#' + hex);
                                                                  //fix td in email
                                                                  $($('#' + $('#path').val()).find('table tbody tr td:eq(' + indexBnt + ')')).css('background-color', '#' + hex);
                                                              } else {
                                                                  $($('#' + $('#path').val()).find('table tbody tr td:eq(' + indexBnt + ') a')).css('color', '#' + hex);
                                                                  $(el).parent().parent().parent().parent().find('div.color-circle').css('color', '#' + hex);
                                                              }

                                                          },
                                                          onSubmit: function (hsb, hex, rgb, el) {
                                                              $(el).css('background-color', '#' + hex);
                                                              $(el).colpickHide();
                                                              var color = $(el).data('color');
                                                              var indexBnt = getIndex($(el).parent().parent().parent().parent().parent(), $('#buttonslist li')) - 1;
                                                              if (color === 'bg') {
                                                                  $($('#' + $('#path').val()).find('table tbody tr td:eq(' + indexBnt + ') a')).css('background-color', '#' + hex);
                                                              } else {
                                                                  $($('#' + $('#path').val()).find('table tbody tr td:eq(' + indexBnt + ') a')).css('color', '#' + hex);
                                                              }


                                                          }

                                                      }).keyup(function () {
                    $(this).colpickSetColor(this.value);
                });   
                $('#colortext').colpick({
                                              layout: 'hex',
                                              // colorScheme: 'dark',
                                              onChange: function (hsb, hex, rgb, el, bySetColor) {
                                                  if (!bySetColor)
                                                      $(el).val('#' + hex);
                                              },
                                              onSubmit: function (hsb, hex, rgb, el) {
                                                  $(el).next('.input-group-addon').css('background-color', '#' + hex);
                                                  $(el).colpickHide();
                                              }

                                          }).keyup(function () {
                    $(this).colpickSetColor(this.value);
                });
                
                $('#add-letter').submit(function(event) {
                    event.preventDefault();

                    var sender = $(this).find('#sender');
                    var subject = $(this).find('#subject');
                    var html_source = $(this).find('#html_source');
                    var html = $(this).find('#html');
                    var plaintext = $(this).find('#plaintext');
                    var transport = $(this).find('#transport');
                    var priority = $(this).find('#priority');
                    
                    downloadLayoutSrc();
                    html.val($('#download').val());
                    html_source.val($('#tosave').html());
 
                    sender.closest('.form-group').removeClass('has-error has-feedback').find('.form-control-feedback, .help-block').remove();
                    html.closest('.form-group').removeClass('has-error has-feedback');
                    plaintext.closest('.form-group').removeClass('has-error has-feedback');
                    subject.closest('.form-group').removeClass('has-error has-feedback').find('.form-control-feedback, .help-block').remove();
                    transport.closest('.form-group').removeClass('has-error has-feedback').find('.form-control-feedback, .help-block').remove();
                    priority.closest('.form-group').removeClass('has-error has-feedback').find('.form-control-feedback, .help-block').remove();

                    if (sender.val() === '') { sender.closest('.form-group').addClass('has-error has-feedback').find('.col-sm-5').append('<span class="zmdi zmdi-close form-control-feedback"></span><small class="help-block">Not specified</small>'); return false; }
                    if (subject.val() === '') { subject.closest('.form-group').addClass('has-error has-feedback').find('.col-sm-10').append('<span class="zmdi zmdi-close form-control-feedback"></span><small class="help-block">Not specified</small>'); return false; }
                    if (html_source.val() === '') { 
                        html.closest('.form-group').addClass('has-error has-feedback'); 
                        swal({
                            title: 'Ошибка',
                            text: 'HTML-версия письма пуста',
                            type: 'error',
                            showCancelButton: false,
                            confirmButtonText: 'OK',
                            closeOnConfirm: false
                        }); 
                        return false; 
                    }
                    if (plaintext.val() === '') { 
                        plaintext.closest('.form-group').addClass('has-error has-feedback'); 
                        swal({
                            title: 'Ошибка',
                            text: 'Текстовая версия письма пуста',
                            type: 'error',
                            showCancelButton: false,
                            confirmButtonText: 'OK',
                            closeOnConfirm: false
                        }); 
                        return false; 
                    }
                    if (transport.val() === '') { transport.closest('.form-group').addClass('has-error has-feedback').find('.col-sm-2').append('<span class="zmdi zmdi-close form-control-feedback"></span><small class="help-block">Not specified</small>'); return false; }
                    if (priority.val() === '') { priority.closest('.form-group').addClass('has-error has-feedback').find('.col-sm-2').append('<span class="zmdi zmdi-close form-control-feedback"></span><small class="help-block">Not specified</small>'); return false; }

                    $(this).find('[type="submit"]').html('Сохранение...').attr('disabled', true);

                    $.ajax({
                        type: 'post',
                        url: '<?= APP::Module('Routing')->root ?>admin/mail/api/letters/add/builder.json',
                        data: $(this).serialize(),
                        success: function(result) {
                            switch(result.status) {
                                case 'success':
                                    swal({
                                        title: 'Готово',
                                        text: 'Письмо "' + subject.val() + '" успешно создано',
                                        type: 'success',
                                        showCancelButton: false,
                                        confirmButtonText: 'Ok',
                                        closeOnConfirm: false
                                    }, function(){
                                        window.location.href = '<?= APP::Module('Routing')->root ?>admin/mail/letters/<?= APP::Module('Crypt')->Encode($data['group_sub_id']) ?>';
                                    });
                                    break;
                                case 'error': 
                                    $.each(result.errors, function(i, error) {
                                        switch(error) {}
                                    });
                                    break;
                            }

                            $('#add-letter').find('[type="submit"]').html('Создать письмо').attr('disabled', false);
                        }
                    });
                  });
            });
        </script>
    </body>
</html>