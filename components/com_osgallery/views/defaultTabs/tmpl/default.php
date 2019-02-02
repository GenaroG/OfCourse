<?php
/**
* @package OS Gallery
* @copyright 2016 OrdaSoft
* @author 2016 Andrey Kvasnevskiy(akbet@mail.ru),Roman Akoev (akoevroman@gmail.com)
* @license GNU General Public License version 2 or later;
* @description Ordasoft Image Gallery
*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

if(count($images)){
 


?>
    <div class="os-gallery-tabs-main-<?php echo $galId?>">

        <div id="os_progres_img-<?php echo $galId; ?>" class="img-block1"></div> 

        <ul class="osgalery-cat-tabs">
            <?php
            foreach($images as $catId => $catImages){
                $currentCatParams = new JRegistry;
                $currentCatParams = $currentCatParams->loadString(urldecode($catParamsArray[$catId]->params));
                if($currentCatParams->get("categoryUnpublish",false))continue;
                if($currentCatParams->get("categoryAlias",'')){
                    $catName = $currentCatParams->get("categoryAlias",'');
                }else if(isset($catImages[0])){
                    $catName = $catImages[0]->cat_name;
                }else{
                    $catName = 'no name';
                }
            ?>

            <li <?php echo (!$currentCatParams->get("categoryShowTitle",true))?'style="display:none;"':''?>>
                <a href="#cat-<?php echo $catId?>" id="catalog-<?php echo $catId?>" class="tab-click-loadMore" data-cat-id="<?php echo $catId?>" data-end="<?php echo $numberImages?>"><?php echo $catName?></a>
            </li>

            <?php } ?>
        </ul>

        <div class="os-cat-tab-images">
            
            <?php
            foreach($images as $catId => $catImages){
                $currentCatParams = new JRegistry;
                $currentCatParams = $currentCatParams->loadString(urldecode($catParamsArray[$catId]->params));
                if($currentCatParams->get("categoryUnpublish",false))continue;
                if($currentCatParams->get("categoryAlias",'')){
                    $catName = $currentCatParams->get("categoryAlias",'');
                }else if(isset($catImages[0])){
                    $catName = $catImages[0]->cat_name;
                }else{
                    $catName = 'no name';
                }
                $styleImg = 'style="margin:'.$imageMargin.'px;"';
                $styleCat = 'style="padding:'.$imageMargin.'px;display:none!important;"';
                ?>
                <!-- Simple category mode-->
                <div id="cat-<?php echo $catId?>" data-cat-id="<?php echo $catId?>" <?php echo $styleCat?> >
                    <?php
                    if($catImages){
                        foreach($catImages as $image){
                            $currentImgParams = new JRegistry;
                            $currentImgParams = $currentImgParams->loadString(urldecode($imgParamsArray[$image->id]->params));
                            $imgAlt = ($currentImgParams->get("imgAlt",''))? $currentImgParams->get("imgAlt",'') : $image->file_name;
                            $imgTitle = $currentImgParams->get("imgTitle",'');
                            $imgShortDesc = $currentImgParams->get("imgShortDescription",'');
                            $imgHtml = $currentImgParams->get("imgHtml", '');
                            $imgHtmlShow = $currentImgParams->get("imgHtmlShow", 'yes');
                            $htmlWidthAsImage = ($imgHtmlShow == 'yes' && $currentImgParams->get("htmlWidthAsImg", "yes") == "yes");
                            $htmlPosition = ($imgHtmlShow == 'yes') ? $currentImgParams->get("htmlPosition", "bottom") : 'bottom';
                            $imgVideoLink = $currentImgParams->get("videoLink", '');

                            if($params->get("watermark_enable",false)){
                                $imgLink = JURI::root().'images/com_osgallery/gal-'.$image->galId.'/original/watermark/'.$image->file_name;
                            }else{
                                $imgLink = JURI::root().'images/com_osgallery/gal-'.$image->galId.'/original/'.$image->file_name;
                            }

                            $imgOpen = '';
                            if($currentImgParams->get("imgLink",'')){
                                $imgLink = $currentImgParams->get("imgLink",'');
                                $imgOpen = $currentImgParams->get("imgLinkOpen",'_blank');
                            }


                    ?>
                    
                    <div class="img-block <?php echo $imageHover ?>-effect <?php echo $numberImagesEffect; ?> animated" <?php echo $styleImg ?> >
                        <!-- a -->
                        <a  
                            <?php 
                            $is_tmp_chk = $currentImgParams->get('imgLink','');
                            if( empty( $is_tmp_chk ) ) { ?>
                            class="os_fancybox-<?php echo $catId?>"
                            data-os_fancybox="os_fancybox-<?php echo $catId; ?>"
                            <?php } ?>
                            id="os_image_id-<?php echo $image->id; ?>" 
                            rel="group" 
                            target="<?php echo $imgOpen; ?>" 
                            <?php 
                            $is_tmp_chk = $currentImgParams->get("imgLink",'') ;
                            $imgVideoLink = trim($imgVideoLink) ;
                            if(isset($imgHtml->html) && !empty($imgHtml->html) && empty( $is_tmp_chk) ) { ?>
                               data-options='{"src": "#data-html-<?php echo $image->id; ?>", "smallBtn" : false}'
                            <?php }elseif(!empty( $imgVideoLink ) ) { ?>
                               href="<?php echo $imgVideoLink; ?>"
                            <?php }else{ ?>
                               href="<?php echo $imgLink; ?>"
                            <?php } ?>
                            data-caption="<?php echo $showImgTitle ? $imgTitle : ''?><?php echo $showImgDescription ? $imgShortDesc : ''?>" 
                            >
                            <!-- titles for gallery -->
                            <div class="os-gallery-caption">
                                <?php
                                    if($imgTitle) {
                                        echo "<h3 class='os-gallery-img-title'>".strip_tags($imgTitle)."</h3>";
                                    }
                                    if($catName && $currentCatParams->get("categoryShowTitleCaption",1)) {
                                        echo "<p class='os-gallery-img-category'>$catName</p>";
                                    }
                                    if($imgShortDesc) {
                                        echo "<p class='os-gallery-img-desc'>".strip_tags($imgShortDesc)."</p>";
                                    }
                                ?>
                            </div>
                            <!-- img for gallery -->
                            <img src="<?php echo JURI::root()?>images/com_osgallery/gal-<?php echo $image->galId?>/thumbnail/<?php echo $image->file_name?>" alt="<?php echo $imgAlt?>">

                            <span class='andrea-zoom-in'></span>
                        </a>

                        <?php if(isset($imgHtml->html) && !empty($imgHtml->html)) { ?>

                            <?php 
                                // class for block width as image
                                $htmlWidthAsImageClass = ($htmlWidthAsImage) ? 'htmlWidthAsImage' : ''; 
                                // class for position html
                                $htmlPositionClass = ($htmlPosition) ? 'position_'.$htmlPosition : '';
                            ?>   

                            <div style="display: none;" class="data-html-wrap <?php echo $htmlWidthAsImageClass; ?> <?php echo $htmlPositionClass; ?>" id="data-html-<?php echo $image->id; ?>">
                                <?php if($imgHtmlShow == 'yes'){?>
                                    <div class="imgInHtml">    
                                        <img src="<?php echo $imgLink; ?>">
                                    </div>
                                <?php } ?>
                                <div class="contentInHtml">
                                   <?php echo $imgHtml->html ; ?>
                                </div>
                            </div>
                        <?php } ?>
                        </div>
                        <?php
                        }
                    }?>
                </div>
                <!-- END simple mod-->
            <?php
            } ?>
            
        </div>
        
        <div class="scrollPoint_<?php echo $galId; ?>"></div>

        <?php if ($showLoadMore) { ?>
        <div class="osGallery-button-box">
            <button id="load-more-<?php echo $galId?>" class="load-more-button" style="<?php echo ($showLoadMore != 'button') ? 'display:none;':''; ?> background:<?php echo $load_more_background; ?>"> 
                    <?php echo $loadMoreButtonText; ?>                
            </button>
        </div>
        <?php } ?>

        <script>
            (function () {
                var osGallery<?php echo $galId?> = function (container, params) {
                    if (!(this instanceof osGallery<?php echo $galId?>)) return new osGallery<?php echo $galId?>(container, params);

                    var defaults = {
                        minImgEnable : 1,
                        spaceBetween: 2.5,
                        minImgSize: 200,
                        numColumns: 3,
                        fancSettings:{
                            wrapCSS: 'os-os_fancybox-window',
                            animationEffect: false,
                            animationDuration: '500',
                            transitionEffect: false,
                            transitionDuration: '800',
                            loop: false,
                            arrows: true,
                            clickContent: 'zoom',
                            wheel : false,
                            slideShow : {
                                autoStart : false,
                                speed     : 4000
                            },
                            clickSlide : 'close',
                            thumbs : {
                                autoStart : true,
                                axis : 'y'
                            },
                            buttons : [
                            'slideShow',
                            'fullScreen',
                            'thumbs',
                            'share',
                            'download',
                            'zoom',
                            'arrowLeft',
                            'arrowRight',
                            'close'
                            ],
                            share : {
                                tpl : ''
                            },
                            infobar : true,
                            baseClass : 'thumb_right'
                        }
                    };

                    for (var param in defaults) {
                      if (!params[param] && params[param] != 0){
                        params[param] = defaults[param];
                      }
                    }
                    // gallery settings
                    var osg = this;
                    // Params
                    osg.params = params || defaults;

                    osg.getImgBlockWidth = function (numColumns){
                        if(typeof(numColumns) == 'undefined')numColumns = osg.params.numColumns;
                        spaceBetween = osg.params.spaceBetween*2;
                        mainBlockW = jQuerGall(container).width();

                        imgBlockW = Math.floor( Math.floor( (((mainBlockW-(spaceBetween*numColumns))/numColumns) )*100)/mainBlockW )
                        
                   
                        if(osg.params.minImgEnable){
                            if(((imgBlockW*mainBlockW)/100) < osg.params.minImgSize){
                                numColumns--;
                                osg.getImgBlockWidth(numColumns);
                            }
                        }

                        var sizeAwesome = ((imgBlockW*mainBlockW)/100)/11+"px";
                        jQuerGall(container +" .andrea-effect .andrea-zoom-in").css({'width': sizeAwesome, 'height': sizeAwesome });

                        var fontSizetext = ((imgBlockW*mainBlockW)/100)/15+"px";
                        jQuerGall(container +" .img-block").css({'font-size': fontSizetext, 'line-height': fontSizetext });

                        return imgBlockW;
                    }

                    //function reinit for load more functions
                    osg.reinit = function(catId, limEnd){

                            if(limEnd != 0) jQuerGall(container+" .osgalery-cat-tabs a.active").attr('data-end', limEnd);
                            
                            if(catId){

                                jQuerGall(container+" .os-cat-tab-images div[id^='cat-']").find(".os_fancybox-"+catId ).os_fancybox({
                                    beforeShow: function(){
                                        // resize html block to image width
                                        var id = this.opts.$orig.attr('id');
                                        id = id.split('-')[1];//get scalar id
                                        var naturalWidth = jQuerGall('.htmlWidthAsImage#data-html-'+id+' .imgInHtml img').prop('naturalWidth');
                                        if(naturalWidth){  
                                            jQuerGall('.htmlWidthAsImage#data-html-'+id).css({'padding' : 0, 'width' : naturalWidth});
                                            jQuerGall('.htmlWidthAsImage#data-html-'+id+' .contentInHtml').css({'padding' : 15});
                                        }
                                    },
                                    beforeClose: function(){
                                        var href = window.location.href;

                                        if (href.indexOf('&os_image_id') > -1){
                                            history.pushState (href, null, href.substring(0, href.indexOf('&os_image_id')));
                                        }else{
                                            history.pushState (href, null, href.substring(0, href.indexOf('?os_image_id')));
                                        } 
                                    },
                                    beforeLoad: function() {
                                        //set background color
                                        jQuerGall('.os_fancybox-bg').css('backgroundColor','<?php echo $os_fancybox_background;?>');

                                        var id = this.opts.$orig.attr('id');
                                        var href = window.location.href;

                                        if (href.indexOf('&os_image_id') > -1) 
                                            history.pushState (null, null, href.substring(0, href.indexOf('&os_image_id') )+ "&" + id);
                                        else if (href.indexOf('?os_image_id') > -1) 
                                            history.pushState (href, null, href.substring(0, href.indexOf('?os_image_id')) + "?" + id);
                                        else if (href.indexOf('?') > -1 && href.indexOf('&') > -1 && href.indexOf('&os_image_id') == -1)
                                            history.pushState(null, null, href + '&' + id);
                                        else if ( href.indexOf('&') == -1 && href.indexOf('?os_image_id') == -1)
                                            history.pushState(null, null, href + '?' + id);
                                    },
                                    afterShow: function() {
                         
                                    },
                                    wrapCSS    : osg.params.fancSettings.wrapCSS,

                                    animationEffect : osg.params.fancSettings.animationEffect,
                                    animationDuration : osg.params.fancSettings.animationDuration,
                                    transitionEffect : osg.params.fancSettings.transitionEffect,
                                    transitionDuration : osg.params.fancSettings.transitionDuration,
                                    loop: osg.params.fancSettings.loop,
                                    arrows: osg.params.fancSettings.arrows,
                                    clickContent : function( current, event ) {
                                        return current.type === 'image' ? osg.params.fancSettings.clickContent : false;
                                    },
                                    wheel : osg.params.fancSettings.wheel,
                                    slideShow : {
                                        autoStart : osg.params.fancSettings.slideShow.autoStart,
                                        speed     : osg.params.fancSettings.slideShow.speed
                                    },

                                    clickSlide : osg.params.fancSettings.clickSlide,
                                    thumbs : {
                                        autoStart : osg.params.fancSettings.thumbs.autoStart,
                                        axis      : osg.params.fancSettings.thumbs.axis
                                    },
                                    buttons : [
                                        osg.params.fancSettings.buttons.slideShow,
                                        osg.params.fancSettings.buttons.fullScreen,
                                        osg.params.fancSettings.buttons.thumbs,
                                        osg.params.fancSettings.buttons.share,
                                        osg.params.fancSettings.buttons.download,
                                        osg.params.fancSettings.buttons.zoom,
                                        osg.params.fancSettings.buttons.arrowLeft,
                                        osg.params.fancSettings.buttons.arrowRight,
                                        osg.params.fancSettings.buttons.close,
                                    ],
                                    share : {
                                        tpl : osg.params.fancSettings.share.tpl
                                    },
                                    infobar: osg.params.fancSettings.infobar, //counter on/off
                                    baseClass : osg.params.fancSettings.baseClass, //add appropriate class to set thumbnails position {thumb_bottom},{thumb_right}

                                });
                            }
                    }


                    //initialize function
                    osg.init = function(limEnd = 0){
                        
                        if(limEnd != 0) jQuerGall(container+" .osgalery-cat-tabs a.active").attr('data-end', limEnd);
                        
                        imgBlockW = osg.getImgBlockWidth();
                        jQuerGall(container+" .img-block").css("width",imgBlockW+"%");

                        jQuerGall(container+" .os-cat-tab-images div[id^='cat-']").each(function(index, el) {
                            catId = jQuerGall(this).data("cat-id");
                            if(catId){

                                jQuerGall(this).find(".os_fancybox-"+catId ).os_fancybox({
                                    beforeShow: function(){
                                        // resize html block to image width
                                        var id = this.opts.$orig.attr('id');
                                        id = id.split('-')[1];//get scalar id
                                        var naturalWidth = jQuerGall('.htmlWidthAsImage#data-html-'+id+' .imgInHtml img').prop('naturalWidth');
                                        if(naturalWidth){  
                                            jQuerGall('.htmlWidthAsImage#data-html-'+id).css({'padding' : 0, 'width' : naturalWidth});
                                            jQuerGall('.htmlWidthAsImage#data-html-'+id+' .contentInHtml').css({'padding' : 15});
                                        }
                                    },
                                    beforeClose: function(){
                                        var href = window.location.href;

                                        if (href.indexOf('&os_image_id') > -1){
                                            history.pushState (href, null, href.substring(0, href.indexOf('&os_image_id')));
                                        }else{
                                            history.pushState (href, null, href.substring(0, href.indexOf('?os_image_id')));
                                        } 
                                    },
                                    beforeLoad: function() {
                                        //set background color
                                        jQuerGall('.os_fancybox-bg').css('backgroundColor','<?php echo $os_fancybox_background;?>');

                                        var id = this.opts.$orig.attr('id');
                                        var href = window.location.href;

                                        if (href.indexOf('&os_image_id') > -1) 
                                            history.pushState (null, null, href.substring(0, href.indexOf('&os_image_id') )+ "&" + id);
                                        else if (href.indexOf('?os_image_id') > -1) 
                                            history.pushState (href, null, href.substring(0, href.indexOf('?os_image_id')) + "?" + id);
                                        else if (href.indexOf('?') > -1 && href.indexOf('&') > -1 && href.indexOf('&os_image_id') == -1)
                                            history.pushState(null, null, href + '&' + id);
                                        else if ( href.indexOf('&') == -1 && href.indexOf('?os_image_id') == -1)
                                            history.pushState(null, null, href + '?' + id);
                                    },
                                    afterShow: function() {
                         
                                    },
                                    wrapCSS    : osg.params.fancSettings.wrapCSS,

                                    animationEffect : osg.params.fancSettings.animationEffect,
                                    animationDuration : osg.params.fancSettings.animationDuration,
                                    transitionEffect : osg.params.fancSettings.transitionEffect,
                                    transitionDuration : osg.params.fancSettings.transitionDuration,
                                    loop: osg.params.fancSettings.loop,
                                    arrows: osg.params.fancSettings.arrows,
                                    clickContent : function( current, event ) {
                                        return current.type === 'image' ? osg.params.fancSettings.clickContent : false;
                                    },
                                    wheel : osg.params.fancSettings.wheel,
                                    slideShow : {
                                        autoStart : osg.params.fancSettings.slideShow.autoStart,
                                        speed     : osg.params.fancSettings.slideShow.speed
                                    },

                                    clickSlide : osg.params.fancSettings.clickSlide,
                                    thumbs : {
                                        autoStart : osg.params.fancSettings.thumbs.autoStart,
                                        axis      : osg.params.fancSettings.thumbs.axis
                                    },
                                    buttons : [
                                        osg.params.fancSettings.buttons.slideShow,
                                        osg.params.fancSettings.buttons.fullScreen,
                                        osg.params.fancSettings.buttons.thumbs,
                                        osg.params.fancSettings.buttons.share,
                                        osg.params.fancSettings.buttons.download,
                                        osg.params.fancSettings.buttons.zoom,
                                        osg.params.fancSettings.buttons.arrowLeft,
                                        osg.params.fancSettings.buttons.arrowRight,
                                        osg.params.fancSettings.buttons.close,
                                    ],
                                    share : {
                                        tpl : osg.params.fancSettings.share.tpl
                                    },
                                    infobar: osg.params.fancSettings.infobar, //counter on/off
                                    baseClass : osg.params.fancSettings.baseClass, //add appropriate class to set thumbnails position {thumb_bottom},{thumb_right}

                                });
                            }
                        });

                        jQuerGall(container+" .os-cat-tab-images div:first-child").show();
                        jQuerGall(container+" .osgalery-cat-tabs li:first-child a").addClass("active");
                        var curCatId = jQuerGall(container+" .osgalery-cat-tabs a.active").attr('data-cat-id');
                        var curEnd = jQuerGall(container+" .osgalery-cat-tabs a.active").attr('data-end');
                        jQuerGall("#load-more-<?php echo $galId?>").attr('data-cat-id', curCatId);
                        jQuerGall("#load-more-<?php echo $galId?>").attr('data-end', curEnd);

                        jQuerGall(container+" .osgalery-cat-tabs a").click(function(e) {
                            e.preventDefault();
                            jQuerGall('li a').removeClass("active");
                            jQuerGall(container+" .os-cat-tab-images>div").hide();
                            jQuerGall(this).addClass("active");
                            curCatId = jQuerGall(container+" .osgalery-cat-tabs a.active").attr('data-cat-id');
                            var href = window.location.href;
                            if (href.indexOf('#cat-') > -1) {
                                
                                history.pushState (null, null, href.substring(0, href.indexOf('#cat-') ) + '#cat-' + curCatId);}
                            else {

                                history.pushState(null, null, href + '#cat-' + curCatId);}
                            jQuerGall("#load-more-<?php echo $galId?>").attr('data-cat-id', curCatId);
                            curEnd = jQuerGall(container+" .osgalery-cat-tabs a.active").attr('data-end');
                            if(curEnd != -1)
                                jQuerGall("#load-more-<?php echo $galId?>").removeAttr("disabled");
                            jQuerGall("#load-more-<?php echo $galId?>").attr('data-end', curEnd);
                            jQuerGall(jQuerGall(this).attr("href")).fadeTo(500, 1);

                        });

                        osg.resizeGallery = function (){
                            imgBlockW = osg.getImgBlockWidth();
                            jQuerGall(container+" .img-block").css("width",imgBlockW+"%");
                        }

                        jQuerGall(window).resize(function(event) {
                            osg.resizeGallery();
                        });

                    }
                    osg.init();

                    osg.loadMore = function(loadMoreType){

                        limEnd = <?php echo $numberImages?>;
                        inProgress = false;

                        if(loadMoreType == '0'){
                            return;
                        }

                        if(loadMoreType == 'button'){
                            osg.loadMoreButton();
                        }

                        if(loadMoreType == 'scroll'){
                            osg.loadMoreScroll(false);
                            jQuerGall(window).scroll(osg.loadMoreScroll)
                        }

                        if(loadMoreType == 'auto'){
                            osg.loadMoreAuto();
                        }
                    }

                    // var limEnd = <?php echo $numberImages?>;
                    // var inProgress = false;
                    // add load more script
                    osg.loadMoreButton = function(){
                        jQuerGall("#load-more-<?php echo $galId?>").unbind('click');
                        jQuerGall("#load-more-<?php echo $galId?>").on("click", function() {
                            jQuerGall("#load-more-<?php echo $galId?>").attr('disabled','disabled');
                            jQuerGall.ajax({
                                dataType: "json",
                                type: 'POST',
                                url: 'index.php?option=com_osgallery&format=raw',
                                data: {
                                    task: "loadMoreButton",
                                    Itemid: '<?php echo $itemId ?>',
                                    end: jQuerGall("#load-more-<?php echo $galId?>").attr('data-end'),
                                    catId: jQuerGall("#load-more-<?php echo $galId?>").attr('data-cat-id'),
                                    galId: <?php echo $galId?>
                                },
                                success: function(data){

                                    if(data.success){
                                        //append hidden data
                                        jQuerGall("#cat-"+data.catId).append(data.html);
                                        var lm = 0;
                                        jQuerGall("#cat-"+ data.catId+ " .load-more-hidden img").load(function(event){
                                            lm++;
                                            var count = jQuerGall("#cat-"+ data.catId+ " .load-more-hidden img").length;
                                            
                                            //show when all of images are loaded    
                                            if(lm == count){
                                                jQuerGall("#cat-"+ data.catId+ " .load-more-hidden").removeClass("load-more-hidden");
                                                jQuerGall("#cat-"+ data.catId+ ", #load-more-<?php echo $galId?>").attr('data-end', data.limEnd);
                                                if(data.limEnd == -1)
                                                    jQuerGall("#load-more-<?php echo $galId?>").attr("disabled","disabled");
                                                limEnd = data.limEnd;
                                                osg.resizeGallery();
                                                osg.reinit(data.catId, limEnd);
                                                jQuerGall("#load-more-<?php echo $galId?>").removeAttr('disabled');
                                            }
                                        });
                                    }
                                },
                                error:function(){

                                }
                            })
                        });
                    }

                    //load more by scroll
                    osg.loadMoreScroll = function(){

                        var scrollPoint = jQuerGall('.scrollPoint_'+<?php echo $galId; ?>).offset();

                        if(limEnd != -1 && !inProgress && (jQuerGall(window).scrollTop() + jQuerGall(window).height()) > (scrollPoint.top)){

                            inProgress = true;
                            jQuerGall.ajax({
                                dataType: "json",
                                type: 'POST',
                                url: 'index.php?option=com_osgallery&format=raw',
                                data: {
                                    task: "loadMoreScroll",
                                    Itemid: '<?php echo $itemId ?>',
                                    end: jQuerGall("#load-more-<?php echo $galId?>").attr('data-end'),
                                    catId: jQuerGall("#load-more-<?php echo $galId?>").attr('data-cat-id'),
                                    galId: <?php echo $galId?>
                                },
                                beforeSend: function() {
                                    inProgress = true;
                                },
                                success: function(data){
                                    if(data.success){
                                            //append hidden data
                                            jQuerGall("#cat-"+data.catId).append(data.html);

                                            var lm = 0;
                                            jQuerGall("#cat-"+ data.catId+ " .load-more-hidden img").load(function(event){
                                                lm++;
                                                var count = jQuerGall("#cat-"+ data.catId+ " .load-more-hidden img").length;
                                                
                                                //show when all of images are loaded    
                                                if(lm == count){
                                                    jQuerGall("#cat-"+ data.catId+ " .load-more-hidden").removeClass("load-more-hidden");
                                                    jQuerGall("#cat-"+ data.catId+ ", #load-more-<?php echo $galId?>").attr('data-end', data.limEnd);
                                                    if(data.limEnd == -1)
                                                        jQuerGall("#load-more-<?php echo $galId?>").attr("disabled","disabled");
                                                    limEnd = data.limEnd;
                                                    osg.resizeGallery();
                                                    osg.reinit(data.catId, limEnd);
                                                    inProgress = false;
                                                    osg.loadMoreScroll();
                                                }
                                            });
                                    }
                                },
                                error:function(){
                                    inProgress = false;
                                    // osg.loadMoreScroll();
                                }
                            })
                        }
                    };

                    //load more by auto
                    osg.loadMoreAuto = function(){

                        if(limEnd != -1 && !inProgress){
                            inProgress = true;
                            jQuerGall.ajax({
                                dataType: "json",
                                type: 'POST',
                                url: 'index.php?option=com_osgallery&format=raw',
                                data: {
                                    task: "loadMoreAuto",
                                    Itemid: '<?php echo $itemId ?>',
                                    end: jQuerGall("#load-more-<?php echo $galId?>").attr('data-end'),
                                    catId: jQuerGall("#load-more-<?php echo $galId?>").attr('data-cat-id'),
                                    galId: <?php echo $galId?>
                                },
                                beforeSend: function() {
                                    inProgress = true;
                                },
                                success: function(data){
                                    if(data.success){
                                            //append hidden data
                                            jQuerGall("#cat-"+data.catId).append(data.html);

                                            var lm = 0;
                                            jQuerGall("#cat-"+ data.catId+ " .load-more-hidden img").load(function(event){
                                                lm++;
                                                var count = jQuerGall("#cat-"+ data.catId+ " .load-more-hidden img").length;
                                                
                                                //show when all of images are loaded    
                                                if(lm == count){
                                                    jQuerGall("#cat-"+ data.catId+ " .load-more-hidden").removeClass("load-more-hidden");
                                                    jQuerGall("#cat-"+ data.catId+ ", #load-more-<?php echo $galId?>").attr('data-end', data.limEnd);
                                                    if(data.limEnd == -1)
                                                        jQuerGall("#load-more-<?php echo $galId?>").attr("disabled","disabled");
                                                    limEnd = data.limEnd;
                                                    osg.resizeGallery();
                                                    osg.reinit(data.catId, limEnd);
                                                    inProgress = false;
                                                    osg.loadMoreAuto();
                                                }
                                            });
                                    }
                                },
                                error:function(){
                                    inProgress = false;
                                    // osg.loadMoreAuto();
                                }
                            })  
                        }
                    }

                }
                window.osGallery<?php echo $galId?> = osGallery<?php echo $galId?>;
            })();

            jQuerGall(window).on('load',function($) {

                jQuerGall('#os_progres_img-<?php echo $galId; ?>' ).attr('class', ""); 

                var gallery = new osGallery<?php echo $galId?>(".os-gallery-tabs-main-<?php echo $galId?>",{
                    minImgEnable : <?php echo $minImgEnable?>,
                    spaceBetween: <?php echo $imageMargin?>,
                    minImgSize: <?php echo $minImgSize?>,
                    numColumns: <?php echo $numColumns?>,
                    fancSettings:{
                        wrapCSS: 'os-os_fancybox-window',
                        animationEffect : "<?php echo $open_close_effect?>",
                        animationDuration : "<?php echo $open_close_speed?>",
                        transitionEffect : "<?php echo $prev_next_effect?>",
                        transitionDuration : "<?php echo $prev_next_speed?>",
                        loop: <?php echo $loop?>,
                        arrows: <?php echo $os_fancybox_arrows?>,
                        clickContent: "<?php echo $next_click?>",
                        wheel: <?php echo $mouse_wheel?>,
                        slideShow : {
                            autoStart : <?php echo $os_fancybox_autoplay?>,
                            speed     : <?php echo $autoplay_speed?>
                        },
                        clickSlide : <?php echo $click_close?>,
                        thumbs : {
                            autoStart : <?php echo $thumbnail_autostart?>,
                            axis : '<?php echo $os_fancybox_thumbnail_axis?>'
                        },
                        buttons : {
                            'slideShow': '<?php echo $start_slideshow_button?>',
                            'fullScreen': '<?php echo $full_screen_button?>',
                            'thumbs': '<?php echo $thumbnails_button?>',
                            'share': '<?php echo $share_button?>',
                            'download': '<?php echo $download_button?>',
                            'zoom': '<?php echo $zoom_button?>', 
                            'arrowLeft': '<?php echo $left_arrow?>', 
                            'arrowRight': '<?php echo $right_arrow?>', 
                            'close': '<?php echo $close_button?>'
                        },
                        share : {
                            tpl : '<?php echo $share_tpl?>'
                        },
                        infobar : <?php echo $infobar?>,
                        baseClass : '<?php echo $os_fancybox_thumbnail_position?>'
                    }
                });

                // add social sharing script
                var href = window.location.href;
                var img_el_id = '';
                var pos = href.indexOf('os_image_id'); 
                if (pos > -1) 
                    img_el_id = href.substring(pos);

                if(img_el_id && img_el_id.indexOf('os_image_id') > -1)  {
                     if(document.getElementById(img_el_id) !== null){
                         jQuerGall('#' + img_el_id).trigger('click');
                     }
                }
                var position_gallery = href.indexOf('cat');
                var gallery_cat_id = '';
                var gallery_cat_id = href.substring(position_gallery);
                var gallery_cat_id = gallery_cat_id.substring(gallery_cat_id.lastIndexOf('-'))
                
                if(gallery_cat_id && position_gallery > -1){
                    jQuerGall('#catalog' + gallery_cat_id).trigger('click');
                }
                // end sharing script       

                
                jQuerGall(".tab-click-loadMore").click(function(){
                    gallery.loadMore("<?php echo $showLoadMore;?>");
                })


                gallery.loadMore("<?php echo $showLoadMore;?>");

            });
        </script>
        
        <noscript>Javascript is required to use OS Responsive Image Gallery<a href="http://ordasoft.com/os-responsive-image-gallery" title="OS Responsive Image Gallery">OS Responsive Image Gallery</a> with awesome layouts and nice hover effects, Drag&Drop, Watermark and stunning Fancybox features. 
        Tags: <a
         href="http://ordasoft.com/os-responsive-image-gallery">responsive image gallery</a>, joomla gallery, joomla responsive gallery, best joomla  gallery, image joomla gallery, joomla gallery extension, image gallery module for joomla 3, gallery component for joomla
        </noscript>
        <div class="copyright-block">
          <a href="http://ordasoft.com/" class="copyright-link">&copy;2018 OrdaSoft.com All rights reserved. </a>
        </div>
    </div>
<?php
}
