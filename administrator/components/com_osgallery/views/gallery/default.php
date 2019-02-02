<?php
/**
* @package OS Gallery
* @copyright 2016 OrdaSoft
* @author 2016 Andrey Kvasnevskiy(akbet@mail.ru),Roman Akoev (akoevroman@gmail.com)
* @license GNU General Public License version 2 or later;
* @description Ordasoft Image Gallery
*/

// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>

<form action="index.php" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">
    <ul class="main-gallery-header nav nav-tabs main-nav-tabs" style="display:none;">
        <li><a href="#gallery-main-tab"><?php echo JText::_("COM_OSGALLERY_BUTTON_MAIN")?></a></li>
        <li><a href="#gallery-settings-tab"><?php echo JText::_("COM_OSGALLERY_SETTINGS_BUTTON_MAIN")?></a></li>
    </ul>
    <div class="gallery-main-content-tab tab-content">
        <div id="gallery-main-tab" class="tab-pane fade">
            <div class="span12 os-gallery-wrapp">
            

            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#file-area" aria-controls="file-area" role="tab" data-toggle="tab">File</a></li>
                <li role="presentation"><a href="#folder-area" aria-controls="folder-area" role="tab" data-toggle="tab" class="osg-pro-avaible">Upload from Folder</a></li>
                <li role="presentation"><a href="#zip-area" aria-controls="zip-area" role="tab" data-toggle="tab" class="osg-pro-avaible">Upload from Zip</a></li>
            </ul>


            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="file-area">
                    <div class="upload-loader" style="display: none"></div>
                    <div class="upload-file-wrap">
                    <noscript>
                        <p>JavaScript disabled :(</p>
                    </noscript>
                    <script type="text/template" id="qq-template">
                        <div class="qq-uploader-selector qq-uploader" qq-drop-area-text="Drop files here">
                            <div class="qq-total-progress-bar-container-selector qq-total-progress-bar-container">
                                <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-total-progress-bar-selector qq-progress-bar qq-total-progress-bar"></div>
                            </div>
                            <div class="qq-upload-drop-area-selector qq-upload-drop-area" qq-hide-dropzone>
                                <span class="qq-upload-drop-area-text-selector"></span>
                            </div>
                            <div class="qq-upload-button-selector qq-upload-button">
                                <div>Upload a file</div>
                            </div>
                                <span class="qq-drop-processing-selector qq-drop-processing">
                                    <span>Processing dropped files...</span>
                                    <span class="qq-drop-processing-spinner-selector qq-drop-processing-spinner"></span>
                                </span>
                            <ul class="qq-upload-list-selector qq-upload-list" aria-live="polite" aria-relevant="additions removals">
                                <li>
                                    <div class="qq-progress-bar-container-selector">
                                        <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-progress-bar-selector qq-progress-bar"></div>
                                    </div>
                                    <span class="qq-upload-spinner-selector qq-upload-spinner"></span>
                                    <span class="qq-upload-file-selector qq-upload-file"></span>
                                    <span class="qq-edit-filename-icon-selector qq-edit-filename-icon" aria-label="Edit filename"></span>
                                    <input class="qq-edit-filename-selector qq-edit-filename" tabindex="0" type="text">
                                    <span class="qq-upload-size-selector qq-upload-size"></span>
                                    <button type="button" class="qq-btn qq-upload-cancel-selector qq-upload-cancel">Cancel</button>
                                    <button type="button" class="qq-btn qq-upload-retry-selector qq-upload-retry">Retry</button>
                                    <button type="button" class="qq-btn qq-upload-delete-selector qq-upload-delete">Delete</button>
                                    <span role="status" class="qq-upload-status-text-selector qq-upload-status-text"></span>
                                </li>
                            </ul>

                            <dialog class="qq-alert-dialog-selector">
                                <div class="qq-dialog-message-selector"></div>
                                <div class="qq-dialog-buttons">
                                    <button type="button" class="qq-cancel-button-selector">Close</button>
                                </div>
                            </dialog>

                            <dialog class="qq-confirm-dialog-selector">
                                <div class="qq-dialog-message-selector"></div>
                                <div class="qq-dialog-buttons">
                                    <button type="button" class="qq-cancel-button-selector">No</button>
                                    <button type="button" class="qq-ok-button-selector">Yes</button>
                                </div>
                            </dialog>

                            <dialog class="qq-prompt-dialog-selector">
                                <div class="qq-dialog-message-selector"></div>
                                <input type="text">
                                <div class="qq-dialog-buttons">
                                    <button type="button" class="qq-cancel-button-selector">Cancel</button>
                                    <button type="button" class="qq-ok-button-selector">Ok</button>
                                </div>
                            </dialog>
                        </div>
                    </script>
                    <div id="fine-uploader"></div>
                    </div>
                </div>

                <div role="tabpanel" class="tab-pane" id="folder-area">
                    <div class="upload-loader" style="display: none"></div>
                    <div class="form-group upload-folder-wrap">
                        <label for="UploadFile">Upload from Folder</label>
                        <input type="text" name="uploadFolder" id="upload-folder" value="<?php echo $app->get('tmp_path');?>" placeholder="" disabled>
                        <button class="btn btn-default upload-folder-btn osg-pro-avaible"disabled>Upload</button>
                    </div>
                </div>
    
                <div role="tabpanel" class="tab-pane" id="zip-area">
                    <div class="upload-loader" style="display: none"></div>
                    <div class="form-group upload-zip-wrap">
                        <label for="UploadFile">Upload from Zip</label>
                        <input type="file" name="uploadZip" id="upload-zip" value="" placeholder="" disabled="disabled">
                        <button class="btn btn-default upload-zip-btn osg-pro-avaible" disabled>Upload</button>
                    </div>
                </div>

            </div>

                <ul id="osgalery-cat-tabs" class="nav cat-nav-tabs nav-tabs">
                    <?php
                    foreach($categories as $cat){ ?>
                        <li id="order-id-<?php echo $cat->id?>">
                            <a href="#cat-<?php echo $cat->id?>" data-cat-id="<?php echo $cat->id?>"><?php echo $cat->name?></a>
                            <input type="hidden" name="category_names[]" value="<?php echo $cat->id?>|+|<?php echo $cat->name?>" placeholder="">
                            <span class="edit-category-name"><i class="material-icons">mode_edit</i>edit</span>
                            <span class="delete-category"><i class="material-icons">delete</i></span>
                        </li>
                    <?php
                    } ?>
                    <span class="add-new-cat"><i class="material-icons">note_add</i> New Category</span>
                </ul>

                <div id="os-cat-tab-images" class="tab-content">
                    <?php
                    foreach($categories as $cat){
                        ?>
                        <div id="cat-<?php echo $cat->id?>" class="tab-pane fade">
                            <?php
                            if(isset($images[$cat->id])){
                                foreach($images[$cat->id] as $image){
                                    echo '<div id="img-'.$image->id.'" class="img-block" data-image-id="'.$image->id.'">'.
                                            '<span class="delete-image"><i class="material-icons">close</i></span>'.
                                            '<img src="'.JURI::root().'images/com_osgallery/gal-'.$galId.'/thumbnail/'.$image->file_name.'" alt="'.$image->file_name.'">'.
                                            '<input id="img-settings-'.$image->id.'" type="hidden" name="imgSettings['.$image->id.']" value="'.htmlspecialchars($imgParamsArray[$image->id]->params).'">'. // $imgParamsArray[$image->id]->params.
                                            '<div class="img_block_bg">
                                            <div class="block_bg_setting"></div>
                                            </div>' .
                                        '</div>';

                                }
                            }?>

                            <input class="cat-img-ordering" type="hidden" name="imageOrdering[<?php echo $cat->id?>]" value="">
                            <input id="cat-settings-<?php echo $cat->id;?>" type="hidden" name="catSettings[<?php echo $cat->id; ?>]" value="<?php echo $catParamsArray[$cat->id]->params;?>">
                        </div>
                    <?php
                    } ?>
                </div>
            </div>
            <!-- Options for category and each image -->
            <div class="span4">

            </div>

            <!-- Модаль -->  
            <div class="modal fade" id="modalImageSettings" tabindex="-1" role="dialog" aria-labelledby="modalImageSettingsLabel" style="display: none">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modalImageSettingsLabel">Modal title</h4>
                  </div>
                  <div class="modal-body">
                    <!-- category-options-block body -->
                    <div class="category-options-block">
                        <ul class="options-header nav nav-tabs main-nav-tabs">
                            <li><a href="#img-options-block"><?php echo JText::_("COM_OSGALLERY_IMAGE_OPTION_TAB")?></a></li>
                            <li><a href="#cat-options-block"><?php echo JText::_("COM_OSGALLERY_CATEGORY_OPTION_TAB")?></a></li>
                        </ul>
                        <!-- IMAGE SETTINGS BLOCK -->
                        <div class="category-options-content tab-content">
                            <div id="img-options-block" class="tab-pane fade">
                                <div>
                                    <span class="cat-col-1"><?php echo JText::_("COM_OSGALLERY_IMAGE_OPTION_TITLE_LABEL")?></span>
                                    <span class="cat-col-2">
                                        <input id="img-title" type="text" name="imgTitle" value="">
                                    </span>
                                </div>

                                <div>
                                    <span class="cat-col-1"><?php echo JText::_("COM_OSGALLERY_IMAGE_OPTION_SHORT_DESCRIPTION_LABEL")?></span>
                                    <span class="cat-col-2">
                                        <input id="img-short-description" type="text" name="imgShortDescription" value="">
                                    </span>
                                </div>

                                <div>
                                    <span class="cat-col-1"><?php echo JText::_("COM_OSGALLERY_IMAGE_OPTION_ALT_LABEL")?></span>
                                    <span class="cat-col-2">
                                        <input id="img-alt" type="text" name="imgAlt" value="">
                                    </span>
                                </div>

                                <div>
                                    <span class="cat-col-1"><?php echo JText::_("COM_OSGALLERY_IMAGE_OPTION_LINK_LABEL")?></span>
                                    <span class="cat-col-2">
                                        <input id="img-link" type="text" name="imgLink" value="">
                                    </span>
                                </div>

                                <div>
                                    <span class="cat-col-1"><?php echo JText::_("COM_OSGALLERY_IMAGE_OPTION_LINK_TARGET_LABEL")?></span>
                                    <span class="cat-col-2">
                                        <select id="img-link-open" name="linkOpen">
                                            <option value="_blank"><?php echo JText::_("COM_OSGALLERY_IMAGE_OPTION_LINK_TARGET_SELECT1")?></option>
                                            <option value="_self"><?php echo JText::_("COM_OSGALLERY_IMAGE_OPTION_LINK_TARGET_SELECT2")?></option>
                                        </select>
                                    </span>
                                </div>

                                <h4>-- <?php echo JText::_("COM_OSGALLERY_SETTINGS_GENERAL_HTML_SETTINGS");?> --</h4>

                                <div class="type_html_code osg-pro-avaible-string">
                                    <span class="cat-col-1"><?php echo JText::_("COM_OSGALLERY_IMAGE_OPTION_HTML_LABEL")?></span>
                                    <span class="cat-col-2">
                                        <textarea id="img-html" name="imgHtml" type="text" value="" rows="3" cols="10"></textarea>
                                    </span>
                                </div>

                                <div class="img-html-show osg-pro-avaible-string">
                                    <span class="cat-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_GENERAL_SHOW_IMAGE_HTML")?></span>
                                    <span class="cat-col-2">
                                        <div id="general-img-html" class="osgallery-checkboxes-block">
                                            <input id="general-img-html-yes" type="radio" name="showImgHtml" value="1" />
                                            <input id="general-img-html-no" type="radio" name="showImgHtml" value="0" checked/>
                                            <label for="general-img-html-yes" data-value="Yes">Yes</label>
                                            <label for="general-img-html-no" data-value="No">No</label>
                                        </div>
                                    </span>
                                </div>
                                <span class="clearfix" ></span>
                                <div class="html-position">
                                    <span class="cat-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_GENERAL_HTML_POSITION")?></span>
                                    <span class="cat-col-2">
                                        <select id="html-position-img" name="htmlPosition">
                                            <option value="top" class="disabled" disabled><?php echo JText::_("Top")?></option>
                                            <option value="bottom" class="disabled" disabled><?php echo JText::_("Bottom")?></option>
                                        </select>
                                    </span>
                                </div>
                                <span class="clearfix" ></span>
                                <div class="img-html-width osg-pro-avaible-string">
                                    <span class="cat-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_GENERAL_HTML_WIDTH_AS_IMAGE")?></span>
                                    <span class="cat-col-2">
                                        <div id="html-width-as-img" class="osgallery-checkboxes-block">
                                            <input id="html-width-as-img-yes" type="radio" name="htmlWidthAsImg" value="1" checked/>
                                            <input id="html-width-as-img-no" type="radio" name="htmlWidthAsImg" value="0" />
                                            <label for="html-width-as-img-yes" data-value="Yes">Yes</label>
                                            <label for="html-width-as-img-no" data-value="No">No</label>
                                        </div>
                                    </span>
                                </div>
                                <span class="clearfix" ></span>

                                <!-- <span class="clearfix" ></span> -->
                                <h4>-- <?php echo JText::_("COM_OSGALLERY_SETTINGS_GENERAL_VIDEO_SETTINGS");?> --</h4>

                                <div>
                                    <span class="cat-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_GENERAL_VIDEO_LINK")?></span>
                                    <span class="cat-col-2">
                                        <input id="video-link" type="text" name="videoLink" value="">
                                    </span>
                                </div>


                            </div>
                            <!-- CATEGORY SETTINGS BLOCK -->
                            <div id="cat-options-block" class="tab-pane fade">
                                <div>
                                    <span class="cat-col-1"><?php echo JText::_("COM_OSGALLERY_CATEGORY_OPTION_ALIAS_LABEL")?></span>
                                    <span class="cat-col-2">
                                        <input id="cat-alias" type="text" name="categoryAlias" value="">
                                    </span>
                                </div>
                            
                                <div class="cat-show-title-block" <?php echo ($gallerylayout == "allInOne" || $gallerylayout == "albumMode")?'style="display:none;"':'';?>>
                                    <span class="cat-col-1"><?php echo JText::_("COM_OSGALLERY_CATEGORY_OPTION_SHOW_TITLE_LABEL")?></span>
                                    <span class="cat-col-2">
                                        <div class="os-check-box">
                                          <input type="checkbox" value="None" id="cat-show-title" name="check" checked="checked" />
                                          <label for="cat-show-title"></label>
                                        </div>
                                    </span>
                                </div>

                                <div>
                                    <span class="cat-col-1"><?php echo JText::_("COM_OSGALLERY_CATEGORY_OPTION_SHOW_TITLE_CAPTION_LABEL")?></span>
                                    <span class="cat-col-2">
                                        <div class="os-check-box">
                                          <input type="checkbox" value="None" id="cat-show-cat-title-caption" name="check" checked="checked" />
                                          <label for="cat-show-cat-title-caption"></label>
                                        </div>
                                    </span>
                                </div>

                                <div>
                                    <span class="cat-col-1"><?php echo JText::_("COM_OSGALLERY_CATEGORY_OPTION_PUBLISH_LABEL")?></span>
                                    <span class="cat-col-2">
                                        <div class="os-check-box">
                                          <input type="checkbox" value="None" id="cat-unpublish" name="check" checked="checked"/>
                                          <label for="cat-unpublish"></label>
                                        </div>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /category-options-block body -->
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>

        </div>

        <!-- gallery settings tab -->
        <div id="gallery-settings-tab" class="tab-pane fade">
            <ul id="osgalery-settings-tabs" class="nav settings-nav-tabs nav-tabs">
                <li>
                    <a href="#general-settings"><?php echo JText::_("COM_OSGALLERY_SETTINGS_GENERAL_TAB_LABEL")?></a>
                </li>
                <li class="osg-pro-avaible">
                    <a href="#os_fancybox-settings"><?php echo JText::_("COM_OSGALLERY_SETTINGS_OS_FANCYBOX_TAB_LABEL")?></a>
                </li>
                <li class="osg-pro-avaible">
                    <a href="#watermark-settings"><?php echo JText::_("COM_OSGALLERY_SETTINGS_WATEMARK_TAB_LABEL")?></a>
                </li>                
                <li class="osg-pro-avaible">
                    <a href="#social-settings"><?php echo "Social Buttons"?></a>
                </li>
            </ul>
            <div id="os-tab-settings" class="tab-content">
                <!-- GENERAL settings -->
                <div id="general-settings" class="tab-pane fade">
                    <div>
                        <span class="cat-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_GENERALLAYOUT_LABEL")?></span>
                        <span class="cat-col-2">
                            <select class="gallery-layout" name="galleryLayout">
                                <option <?php echo ($gallerylayout == "defaultTabs")?'selected="selected"':''?> value="defaultTabs">Default</option>
                                <option class="disabled" disabled <?php echo ($gallerylayout == "allInOne")?'selected="selected"':''?> value="allInOne">All in one</option>
                                <option class="disabled" disabled <?php echo ($gallerylayout == "albumMode")?'selected="selected"':''?> value="albumMode">Album</option>
                                <option class="disabled" disabled <?php echo ($gallerylayout == "masonry")?'selected="selected"':''?> value="masonry">Masonry</option>
                                <option class="disabled" disabled <?php echo ($gallerylayout == "fit_rows")?'selected="selected"':''?> value="fit_rows">fitRows</option>
                            </select>
                        </span>
                    </div>

                    <div id="masonryLayout" <?php echo ($gallerylayout != "masonry")?'style="display:none;"':'';?>>
                        <span class="cat-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_GENERALLAYOUT_MASONRY_LABEL")?></span>
                        <span class="cat-col-2">
                            <select name="masonryLayout">
                                <option <?php echo ($masonryLayout == "default")?'selected="selected"':''?> value="default">default</option>
                                <option <?php echo ($masonryLayout == "horizontal")?'selected="selected"':''?> value="horizontal">horizontal</option>
                                <option <?php echo ($masonryLayout == "vertical")?'selected="selected"':''?> value="vertical">vertical</option>
                            </select>
                        </span>
                    </div>

                    <div class="back-button-text-block" <?php echo ($gallerylayout != "albumMode")?'style="display:none;"':'';?>>
                        <span class="cat-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_GENERAL_BACK_BUTTON_LABEL")?></span>
                        <span class="cat-col-2">
                            <input type="text" name="backButtonText" value="<?php echo $backButtonText?>">
                        </span>
                    </div>

                    <div>
                        <span class="cat-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_GENERAL_IMAGE_MARGIN_LABEL")?></span>
                        <span class="cat-col-2">
                            <input type="number" min="0" name="image_margin" value="<?php echo $imageMargin?>">
                        </span>
                    </div>

                    <div>
                        <span class="cat-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_GENERAL_IMAGE_NUM_COLUMNS_LABEL")?></span>
                        <span class="cat-col-2">
                            <input type="number" min="1" name="num_column" value="<?php echo $numColumn?>">
                        </span>
                    </div>
                    
                    <div id="osgallery-checkboxes-block-general" >
                        <span class="cat-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_GENERAL_IMAGE_DECREASE_COLUMN")?></span>
                        <span class="cat-col-2">
                            <div class="osgallery-checkboxes-block">
                                <input id="general-min-enable-yes" type="radio" name="minImgEnable" value="1" <?php echo $minImgEnable?'checked':''?>/>
                                <input id="general-min-enable-no" type="radio" name="minImgEnable" value="0" <?php echo $minImgEnable?'':'checked'?>/>
                                <label for="general-min-enable-yes" data-value="Yes">Yes</label>
                                <label for="general-min-enable-no" data-value="No">No</label>
                            </div>
                        </span>
                    </div>
                    <div id="minImgSize">
                        <span class="cat-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_GENERAL_IMAGE_DECREASE_COLUMN_SIZE")?></span>
                        <span class="cat-col-2">
                            <input type="number" min="1" name="minImgSize" value="<?php echo $minImgSize?>">
                        </span>
                    </div>

                    <div id="imgWidth" <?php echo ($gallerylayout == "masonry" || $gallerylayout == "fit_rows")?'style="display:none;"':'';?>>
                        <span class="cat-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_GENERAL_CROP_IMAGE_WIDTH")?></span>
                        <span class="cat-col-2">
                            <input type="number" min="1" name="imgWidth" value="<?php echo $imgWidth?>">
                        </span>
                    </div>

                    <div id="imgHeight" <?php echo ($gallerylayout == "masonry" || $gallerylayout == "fit_rows")?'style="display:none;"':'';?>>
                        <span class="cat-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_GENERAL_CROP_IMAGE_HEIGHT")?></span>
                        <span class="cat-col-2">
                            <input type="number" min="1" name="imgHeight" value="<?php echo $imgHeight?>">
                        </span>
                    </div>

                    <div>
                        <span class="cat-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_GENERAL_IMAGEHOVER_LABEL")?></span>
                        <span class="cat-col-2">
                            <select name="imageHover">
                                <option <?php echo ($imagehover == "none")?'selected="selected"':''?> value="none">None</option>
                                <option <?php echo ($imagehover == "dimas")?'selected="selected"':''?> value="dimas">Dimas</option>
                                <option <?php echo ($imagehover == "anet")?'selected="selected"':''?> value="anet">Anet</option>
                                <option class="disabled" disabled <?php echo ($imagehover == "sergio")?'selected="selected"':''?> value="sergio">Sergio</option>
                                <option class="disabled" disabled <?php echo ($imagehover == "ariana")?'selected="selected"':''?> value="ariana">Ariana</option>
                                <option class="disabled" disabled <?php echo ($imagehover == "taras")?'selected="selected"':''?> value="taras">Taras</option>
                                <option class="disabled" disabled <?php echo ($imagehover == "andrea")?'selected="selected"':''?> value="andrea">Andrea</option>
                                <option class="disabled" disabled <?php echo ($imagehover == "zema")?'selected="selected"':''?> value="zema">Zema</option>
                                <option class="disabled" disabled <?php echo ($imagehover == "pytiton")?'selected="selected"':''?> value="pytiton">Pytiton</option>
                                
                            </select>
                        </span>
                    </div>

                    <div>
                    <span class="cat-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_GENERAL_NUMBER_DISPLAY_IMAGES_EFFECT")?></span>
                    <span class="cat-col-2">
                        <select name="number_images_effect">
                            <option <?php echo ($numberImagesEffect == "none") ? 'selected="selected"' : ''?> value="none">&ensp;&ensp;None</option>
                            <optgroup label="-- Attention Seekers --">
                              <option  <?php echo ($numberImagesEffect == "bounce") ? 'selected="selected"' : ''?>  value="bounce">bounce</option>
                              <option  <?php echo ($numberImagesEffect == "flash") ? 'selected="selected"' : ''?>  value="flash">flash</option>
                              <option class="disabled" disabled <?php echo ($numberImagesEffect == "pulse") ? 'selected="selected"' : ''?>  value="pulse">pulse</option>
                              <option class="disabled" disabled <?php echo ($numberImagesEffect == "rubberBand") ? 'selected="selected"' : ''?>  value="rubberBand">rubberBand</option>
                              <option class="disabled" disabled <?php echo ($numberImagesEffect == "shake") ? 'selected="selected"' : ''?>  value="shake">shake</option>
                              <option class="disabled" disabled <?php echo ($numberImagesEffect == "swing") ? 'selected="selected"' : ''?>  value="swing">swing</option>
                              <option class="disabled" disabled <?php echo ($numberImagesEffect == "tada") ? 'selected="selected"' : ''?>  value="tada">tada</option>
                              <option class="disabled" disabled <?php echo ($numberImagesEffect == "wobble") ? 'selected="selected"' : ''?>  value="wobble">wobble</option>
                              <option class="disabled" disabled <?php echo ($numberImagesEffect == "jello") ? 'selected="selected"' : ''?>  value="jello">jello</option>
                            </optgroup>
                            <optgroup label="-- Bouncing Entrances --">
                              <option class="disabled" disabled <?php echo ($numberImagesEffect == "bounceIn") ? 'selected="selected"' : ''?> value="bounceIn">bounceIn</option>
                            </optgroup>
                            <optgroup label="-- Fading Entrances --">
                              <option class="disabled" disabled <?php echo ($numberImagesEffect == "fadeIn") ? 'selected="selected"' : ''?> value="fadeIn">fadeIn</option>
                            </optgroup>
                            <optgroup label="-- Flippers --">
                              <option class="disabled" disabled <?php echo ($numberImagesEffect == "flip") ? 'selected="selected"' : ''?> value="flip">flip</option>
                            </optgroup>
                            <optgroup  label="-- Lightspeed --">
                              <option class="disabled" disabled <?php echo ($numberImagesEffect == "lightSpeedIn") ? 'selected="selected"' : ''?> value="lightSpeedIn">lightSpeedIn</option>
                            </optgroup>
                            <optgroup label="-- Rotating Entrances --">
                              <option class="disabled" disabled <?php echo ($numberImagesEffect == "rotateIn") ? 'selected="selected"' : ''?> value="rotateIn">rotateIn</option>
                            </optgroup>
                            <optgroup label="-- Sliding Entrances --">
                              <option class="disabled" disabled <?php echo ($numberImagesEffect == "slideInUp") ? 'selected="selected"' : ''?> value="slideInUp">slideInUp</option>
                            </optgroup>
                            <optgroup label="-- Zoom Entrances --">
                              <option class="disabled" disabled <?php echo ($numberImagesEffect == "zoomIn") ? 'selected="selected"' : ''?> value="zoomIn">zoomIn</option>
                            </optgroup>
                            <optgroup label="-- Specials --">
                              <option class="disabled" disabled <?php echo ($numberImagesEffect == "hinge") ? 'selected="selected"' : ''?> value="hinge">hinge</option>
                              <option class="disabled" disabled <?php echo ($numberImagesEffect == "jackInTheBox") ? 'selected="selected"' : ''?> value="jackInTheBox">jackInTheBox</option>
                              <option class="disabled" disabled <?php echo ($numberImagesEffect == "rollIn") ? 'selected="selected"' : ''?> value="rollIn">rollIn</option>
                              <option class="disabled" disabled <?php echo ($numberImagesEffect == "rollOut") ? 'selected="selected"' : ''?> value="rollOut">rollOut</option>
                            </optgroup>
                        </select>
                    </span>
                </div>


                 <div id="osgallery-rotate-checkbox" >
                    <span class="cat-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_GENERAL_ROTATE_IMAGE")?></span>
                    <span class="cat-col-2">
                        <div class="osgallery-checkboxes-block">
                            <input id="general-rotate-enable-yes" type="radio" name="rotateImage" value="1" <?php echo $rotateImage?'checked':''?>/>
                            <input id="general-rotate-enable-no" type="radio" name="rotateImage" value="0" <?php echo $rotateImage?'':'checked'?>/>
                            <label for="general-rotate-enable-yes" data-value="Yes">Yes</label>
                            <label for="general-rotate-enable-no" data-value="No">No</label>
                        </div>
                    </span>
                </div>
                <span class="clearfix"></span>

                    <h4 <?php echo ($gallerylayout == "allInOne")?'style="display:none;"':'';?> class="load_more_title"><?php echo JText::_("COM_OSGALLERY_SETTINGS_GENERAL_LOAD_MORE_BLOCK");?></h4>

                <div class="main-load-more-block" <?php echo ($gallerylayout == "allInOne")?'style="display:none;"':'';?> >
                    <div>
                        <span class="cat-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_SHOW_LOAD_MORE_TYPE")?></span>
                        <span class="cat-col-2">
                            <select name="showLoadMore" <?php if($gallerylayout == "allInOne") echo 'disabled="disabled"';?>>
                                <option <?php echo ($showLoadMore == "0" || $gallerylayout == "allInOne") ? 'selected="selected"' : ''?> value="0">None</option>
                                <option class="disabled" disabled <?php echo ($showLoadMore == "button") ? 'selected="selected"' : ''?> value="button">Load More by Button</option>
                                <option class="disabled" disabled <?php echo ($showLoadMore == "scroll") ? 'selected="selected"' : ''?> value="scroll">Load more by Scroll</option>
   
                                <option class="disabled" disabled <?php echo ($showLoadMore == "auto") ? 'selected="selected"' : ''?> 
                                        <?php // if($gallerylayout == "albumMode") echo 'disabled=""'; ?> value="auto">Auto Load all pictures</option>

                            </select>
                        </span>
                    </div>
                        
                    <div id="load-more-button-block" <?php echo ($showLoadMore != "button" || $showLoadMore == "0")?'style="display:none;"':'';?> >
                        <div class="load-more-button-text" >
                            <span class="cat-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_GENERAL_LOADMORE_BUTTON_LABEL")?></span>
                            <span class="cat-col-2">
                                <input type="text" name="loadMoreButtonText" value="<?php echo $loadMoreButtonText?>">
                            </span>
                        </div>

                        <div class="load_more_background">
                            <span class="cat-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_GENERAL_LOADMORE_BUTTON_BACKGROUND")?></span>
                            <span class="cat-col-2">
                                <input  type="text" data-opacity="1.00" value="<?php echo $load_more_background?>" name="load_more_background" size="25">
                            </span>
                        </div>
                    </div>
    
                    <div id="load-more-block" <?php echo ($showLoadMore == "0")?'style="display:none;"':'';?> >    
                        <!-- count  -->
                        <div>
                            <span class="cat-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_GENERAL_NUMBER_DISPLAY_IMAGES")?></span>
                            <span class="cat-col-2">
                                <input type="number" min="0" name="number_images" value="<?php echo $numberImages;?>">
                            </span>
                        </div>
                        <!-- effect  -->
                        

                        <span class="clearfix"></span>
                        <!-- count  -->
                        <div>
                            <span class="cat-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_GENERAL_NUMBER_DISPLAY_IMAGES_AT_ONCE")?></span>
                            <span class="cat-col-2">
                                <input type="number" min="0" name="number_images_at_once" value="<?php echo $numberImagesAtOnce;?>">
                            </span>
                        </div>
                        <!-- effect  -->
                        <div>
                            <span class="cat-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_GENERAL_NUMBER_DISPLAY_IMAGES_AT_ONCE_EFFECT")?></span>
                            <?php if($gallerylayout == "masonry") $numberImagesAtOnceEffect = "none"; ?>
                            <span class="cat-col-2">
                                <select name="number_images_at_once_effect" >
                                    <option <?php echo ($numberImagesAtOnceEffect == "none" ) ? 'selected="selected"' : ''?> value="none">&ensp;&ensp;None</option>
                                    <optgroup label="-- Attention Seekers --">
                                      <option <?php echo ($numberImagesAtOnceEffect == "bounce") ? 'selected="selected"' : ''?>  value="bounce">bounce</option>
                                      <option <?php echo ($numberImagesAtOnceEffect == "flash") ? 'selected="selected"' : ''?>  value="flash">flash</option>
                                      <option <?php echo ($numberImagesAtOnceEffect == "pulse") ? 'selected="selected"' : ''?>  value="pulse">pulse</option>
                                      <option <?php echo ($numberImagesAtOnceEffect == "rubberBand") ? 'selected="selected"' : ''?>  value="rubberBand">rubberBand</option>
                                      <option <?php echo ($numberImagesAtOnceEffect == "shake") ? 'selected="selected"' : ''?>  value="shake">shake</option>
                                      <option <?php echo ($numberImagesAtOnceEffect == "swing") ? 'selected="selected"' : ''?>  value="swing">swing</option>
                                      <option <?php echo ($numberImagesAtOnceEffect == "tada") ? 'selected="selected"' : ''?>  value="tada">tada</option>
                                      <option <?php echo ($numberImagesAtOnceEffect == "wobble") ? 'selected="selected"' : ''?>  value="wobble">wobble</option>
                                      <option <?php echo ($numberImagesAtOnceEffect == "jello") ? 'selected="selected"' : ''?>  value="jello">jello</option>
                                    </optgroup>
                                    <optgroup label="-- Bouncing Entrances --">
                                      <option <?php echo ($numberImagesAtOnceEffect == "bounceIn") ? 'selected="selected"' : ''?> value="bounceIn">bounceIn</option>
                                    </optgroup>
                                    <optgroup label="-- Fading Entrances --">
                                      <option <?php echo ($numberImagesAtOnceEffect == "fadeIn") ? 'selected="selected"' : ''?> value="fadeIn">fadeIn</option>
                                    </optgroup>
                                    <optgroup label="-- Flippers --">
                                      <option <?php echo ($numberImagesAtOnceEffect == "flip") ? 'selected="selected"' : ''?> value="flip">flip</option>
                                    </optgroup>
                                    <optgroup label="-- Lightspeed --">
                                      <option <?php echo ($numberImagesAtOnceEffect == "lightSpeedIn") ? 'selected="selected"' : ''?> value="lightSpeedIn">lightSpeedIn</option>
                                    </optgroup>
                                    <optgroup label="-- Rotating Entrances --">
                                      <option <?php echo ($numberImagesAtOnceEffect == "rotateIn") ? 'selected="selected"' : ''?> value="rotateIn">rotateIn</option>
                                    </optgroup>
                                    <optgroup label="-- Sliding Entrances --">
                                      <option <?php echo ($numberImagesAtOnceEffect == "slideInUp") ? 'selected="selected"' : ''?> value="slideInUp">slideInUp</option>
                                    </optgroup>
                                    <optgroup label="-- Zoom Entrances --">
                                      <option <?php echo ($numberImagesAtOnceEffect == "zoomIn") ? 'selected="selected"' : ''?> value="zoomIn">zoomIn</option>
                                    </optgroup>
                                    <optgroup label="-- Specials --">
                                      <option <?php echo ($numberImagesAtOnceEffect == "hinge") ? 'selected="selected"' : ''?> value="hinge">hinge</option>
                                      <option <?php echo ($numberImagesAtOnceEffect == "jackInTheBox") ? 'selected="selected"' : ''?> value="jackInTheBox">jackInTheBox</option>
                                      <option <?php echo ($numberImagesAtOnceEffect == "rollIn") ? 'selected="selected"' : ''?> value="rollIn">rollIn</option>
                                      <option <?php echo ($numberImagesAtOnceEffect == "rollOut") ? 'selected="selected"' : ''?> value="rollOut">rollOut</option>
                                    </optgroup>
                                </select>
                            </span>
                        </div>

                    </div>
                </div>
                   <!-- end load more option -->
                </div>

                <div id="os_fancybox-settings" class="tab-pane fade osg-pro-avaible">
                    <div>
                        <span class="sett-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_OS_FANCYBOX_BACKGROUND_COLOR_SELECT_LABEL")?></span>
                        <span class="sett-col-2">
                            <select name="fancy_box_background">
                                <option selected="" value="gray"><?php echo JText::_("COM_OSGALLERY_SETTINGS_OS_FANCYBOX_BACKGROUND_COLOR_SELECT_OPTION1")?></option>
                                <option  value="white"><?php echo JText::_("COM_OSGALLERY_SETTINGS_OS_FANCYBOX_BACKGROUND_COLOR_SELECT_OPTION2")?></option>
                                <option  value="transparent"><?php echo JText::_("COM_OSGALLERY_SETTINGS_OS_FANCYBOX_BACKGROUND_COLOR_SELECT_OPTION3")?></option>
                            </select>
                        </span>
                    </div>

                    <div>
                        <span class="sett-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_OS_FANCYBOX_CLOSE_CLICK_LABEL")?></span>
                        <span class="sett-col-2">
                            <div class="osgallery-checkboxes-block">
                                <input id="os_fancybox-close-yes" type="radio" name="click_close" value="1" checked/>
                                <input id="os_fancybox-close-no" type="radio" name="click_close" value="0" />
                                <label for="os_fancybox-close-yes" data-value="Yes">Yes</label>
                                <label for="os_fancybox-close-no" data-value="No">No</label>
                            </div>
                        </span>
                    </div>

                    <div>
                        <span class="sett-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_OS_FANCYBOX_OPEN_CLOSE_LABEL")?></span>
                        <span class="sett-col-2">
                            <select name="open_close_effect">
                                <option value="elastic">Elastic</option>
                                <option   value="fade">Fade</option>
                                <option selected="" value="none">None</option>>
                            </select>
                        </span>
                    </div>

                    <div class="os-fancybox-open-close-speed-block" <?php if($open_close_effect == 'none'){echo "style='display:none'";}?> >
                        <span class="sett-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_OS_FANCYBOX_OPEN_CLOSE_SPEED_LABEL")?></span>
                        <span class="sett-col-2">
                            <input type="text" name="open_close_speed" value="<?php echo $open_close_speed?>"/>
                        </span>
                    </div>

                    <div>
                        <span class="sett-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_OS_FANCYBOX_PREV_NEXT_EFFECT_LABEL")?></span>
                        <span class="sett-col-2">
                            <select name="prev_next_effect">
                                <option <?php echo $prev_next_effect=="circular"?'selected':''?> value="circular">Circular</option>
                                <option <?php echo $prev_next_effect=="fade"?'selected':''?> value="fade">Fade</option>
                                <option <?php echo $prev_next_effect=="rotate"?'selected':''?> value="elastic">Rotate</option>
                                <option <?php echo $prev_next_effect=="slide"?'selected':''?> value="slide">Slide</option>
                                <option <?php echo $prev_next_effect=="tube"?'selected':''?> value="tube">Tube</option>
                                <option <?php echo $prev_next_effect=="zoom-in-out"?'selected':''?> value="zoom-in-out">Zoom in out</option>
                                <option <?php echo $prev_next_effect=="none"?'selected':''?> value="none">None</option>
                            </select>
                        </span>
                    </div>
           
                    <div class="os-fancybox-prev-next-speed-block" <?php if($prev_next_effect == 'none'){echo "style='display:none'";}?> >
                        <span class="sett-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_OS_FANCYBOX_PREV_NEXT_SPEED_LABEL")?></span>
                        <span class="sett-col-2">
                            <input type="text" name="prev_next_speed" value="<?php echo $prev_next_speed?>"/>
                        </span>
                    </div>
            
                    <div class="img-title-show">
                    <span class="cat-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_GENERAL_ENABLE_IMAGE_TITLE")?></span>
                        <span class="cat-col-2">
                            <div class="osgallery-checkboxes-block">
                                <input id="general-min-imgtitle-yes" type="radio" name="showImgTitle" value="1" <?php echo $showImgTitle?'checked':''?>/>
                                <input id="general-min-imgtitle-no" type="radio" name="showImgTitle" value="0" <?php echo $showImgTitle?'':'checked'?>/>
                                <label for="general-min-imgtitle-yes" data-value="Yes">Yes</label>
                                <label for="general-min-imgtitle-no" data-value="No">No</label>
                            </div>
                        </span>
                    </div>

                    <div class="img-description-show">
                    <span class="cat-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_GENERAL_ENABLE_IMAGE_DESCRIPTION")?></span>
                        <span class="cat-col-2">
                            <div class="osgallery-checkboxes-block">
                                <input id="general-min-imgdescription-yes" type="radio" name="showImgDescription" value="1" <?php echo $showImgDescription?'checked':''?>/>
                                <input id="general-min-imgdescription-no" type="radio" name="showImgDescription" value="0" <?php echo $showImgDescription?'':'checked'?>/>
                                <label for="general-min-imgdescription-yes" data-value="Yes">Yes</label>
                                <label for="general-min-imgdescription-no" data-value="No">No</label>
                            </div>
                        </span>
                    </div>
            <!--         <div>
                        <span class="sett-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_OS_FANCYBOX_IMAGE_TITLE_LABEL")?></span>
                        <span class="sett-col-2">
                            <select name="img_title">
                                <option  value="float">Float</option>
                                <option  selected=""  value="inside">Inside</option>
                                <option  value="outside">Outside</option>
                                <option  value="over">Over</option>
                                <option  value="none">None</option>
                            </select>
                        </span>
                    </div> -->
                    <div>
                        <span class="sett-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_OS_FANCYBOX_LOOP_LABEL")?></span>
                        <span class="sett-col-2">
                            <div class="osgallery-checkboxes-block">
                                <input id="os_fancybox-loop-yes" type="radio" name="loop" value="1" />
                                <input id="os_fancybox-loop-no" type="radio" name="loop" value="0" checked/>
                                <label for="os_fancybox-loop-yes" data-value="Yes">Yes</label>
                                <label for="os_fancybox-loop-no" data-value="No">No</label>
                            </div>
                        </span>
                    </div>

                    <div>
                        <span class="sett-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_OS_FANCYBOX_PREV_NEXT_ARROWS_LABEL")?></span>
                        <span class="sett-col-2">
                            <div class="osgallery-checkboxes-block">
                                <input id="os_fancybox-arrows-yes" type="radio" name="os_fancybox_arrows" value="1" <?php echo $os_fancybox_arrows?'checked':''?>/>
                                <input id="os_fancybox-arrows-no" type="radio" name="os_fancybox_arrows" value="0" <?php echo $os_fancybox_arrows?'':'checked'?>/>
                                <label for="os_fancybox-arrows-yes" data-value="Yes">Yes</label>
                                <label for="os_fancybox-arrows-no" data-value="No">No</label>
                            </div>
                        </span>
                    </div>

                    <div>
                        <span class="sett-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_OS_FANCYBOX_NEXT_CLICK_LABEL")?></span>
                        <span class="sett-col-2">
                            <div class="osgallery-checkboxes-block">
                                <input id="os_fancybox-next-yes" type="radio" name="next_click" value="1" <?php echo $next_click?'checked':''?>/>
                                <input id="os_fancybox-next-no" type="radio" name="next_click" value="0" <?php echo $next_click?'':'checked'?>/>
                                <label for="os_fancybox-next-yes" data-value="Yes">Yes</label>
                                <label for="os_fancybox-next-no" data-value="No">No</label>
                            </div>
                        </span>
                    </div>

                    <div>
                        <span class="sett-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_OS_FANCYBOX_MOUSE_WHEEL_LABEL")?></span>
                        <span class="sett-col-2">
                            <div class="osgallery-checkboxes-block">
                                <input id="os_fancybox-mouse-yes" type="radio" name="mouse_wheel" value="1" />
                                <input id="os_fancybox-mouse-no" type="radio" name="mouse_wheel" value="0" checked/>
                                <label for="os_fancybox-mouse-yes" data-value="Yes">Yes</label>
                                <label for="os_fancybox-mouse-no" data-value="No">No</label>
                            </div>
                        </span>
                    </div>
                    <!-- infobar (counter) -->
                    <div>
                        <span class="sett-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_OS_FANCYBOX_INFOBAR_LABEL")?></span>
                        <span class="sett-col-2">
                            <div class="osgallery-checkboxes-block">
                                <input id="os_fancybox-infobar-yes" type="radio" name="infobar" value="1" <?php echo $infobar?'checked':''?>/>
                                <input id="os_fancybox-infobar-no" type="radio" name="infobar" value="0" <?php echo $infobar?'':'checked'?>/>
                                <label for="os_fancybox-infobar-yes" data-value="Yes">Yes</label>
                                <label for="os_fancybox-infobar-no" data-value="No">No</label>
                            </div>
                        </span>
                    </div>

                    <!-- Buttons block -->

                    <div><h4>Buttons in panel</h4></div>
                    <!-- start_slideshow_button -->
                    <div>
                        <span class="sett-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_OS_FANCYBOX_START_SLIDESHOW_BUTTON_LABEL")?></span>
                        <span class="sett-col-2">
                            <div class="osgallery-checkboxes-block">
                                <input id="os_fancybox-start_slideshow_button-yes" type="radio" name="start_slideshow_button" value="1" <?php echo $start_slideshow_button?'checked':''?>/>
                                <input id="os_fancybox-start_slideshow_button-no" type="radio" name="start_slideshow_button" value="0" <?php echo $start_slideshow_button?'':'checked'?>/>
                                <label for="os_fancybox-start_slideshow_button-yes" data-value="Yes">Yes</label>
                                <label for="os_fancybox-start_slideshow_button-no" data-value="No">No</label>
                            </div>
                        </span>
                    </div>
                   <!-- slideshow_autoplay_speed -->
                    <div class="autoplay-helper-block" <?php if($os_fancybox_autoplay == '0'){echo "style='display:none'";}?> >
                        <span class="sett-col-1"><?php echo '- '.JText::_("COM_OSGALLERY_SETTINGS_OS_FANCYBOX_AUTOPLAY_SPEED_LABEL")?></span>
                        <span class="sett-col-2">
                            <input type="text" name="autoplay_speed" value="<?php echo $autoplay_speed?>"/>
                        </span>
                    </div>
                    <!-- slideshow_autoplay -->
                    <div>
                        <span class="sett-col-1"><?php echo '- '.JText::_("COM_OSGALLERY_SETTINGS_OS_FANCYBOX_AUTOPLAY_LABEL")?></span>
                        <span class="sett-col-2">
                            <div class="osgallery-checkboxes-block">
                                <input id="os_fancybox-autoplay-yes" type="radio" name="os_fancybox_autoplay" value="1" <?php echo $os_fancybox_autoplay?'checked':''?>/>
                                <input id="os_fancybox-autoplay-no" type="radio" name="os_fancybox_autoplay" value="0" <?php echo $os_fancybox_autoplay?'':'checked'?>/>
                                <label for="os_fancybox-autoplay-yes" data-value="Yes">Yes</label>
                                <label for="os_fancybox-autoplay-no" data-value="No">No</label>
                            </div>
                        </span>
                    </div>
                    <!-- full_screen_button -->
                    <div>
                        <span class="sett-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_OS_FANCYBOX_FULL_SCREEN_BUTTON_LABEL")?></span>
                        <span class="sett-col-2">
                            <div class="osgallery-checkboxes-block">
                                <input id="os_fancybox-full_screen_button-yes" type="radio" name="full_screen_button" value="1" <?php echo $full_screen_button?'checked':''?>/>
                                <input id="os_fancybox-full_screen_button-no" type="radio" name="full_screen_button" value="0" <?php echo $full_screen_button?'':'checked'?>/>
                                <label for="os_fancybox-full_screen_button-yes" data-value="Yes">Yes</label>
                                <label for="os_fancybox-full_screen_button-no" data-value="No">No</label>
                            </div>
                        </span>
                    </div>
                    <!-- thumbnails_button -->
                    <div>
                        <span class="sett-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_OS_FANCYBOX_THUMBNAILS_BUTTON_LABEL")?></span>
                        <span class="sett-col-2">
                            <div class="osgallery-checkboxes-block">
                                <input id="os_fancybox-thumbnails_button-yes" type="radio" name="thumbnails_button" value="1" />
                                <input id="os_fancybox-thumbnails_button-no" type="radio" name="thumbnails_button" value="0" checked/>
                                <label for="os_fancybox-thumbnails_button-yes" data-value="Yes">Yes</label>
                                <label for="os_fancybox-thumbnails_button-no" data-value="No">No</label>
                            </div>
                        </span>
                    </div>
                    <!-- thumbnail_autostart -->
                    <div>
                        <span class="sett-col-1"><?php echo '- '.JText::_("COM_OSGALLERY_SETTINGS_OS_FANCYBOX_HELPERS_THUMBNAIL_LABEL")?></span>
                        <span class="sett-col-2">
                            <div class="osgallery-checkboxes-block">
                                <input id="os_fancybox-thumbnail-yes" type="radio" name="helper_thumbnail" value="1" <?php echo $helper_thumbnail?'checked':''?>/>
                                <input id="os_fancybox-thumbnail-no" type="radio" name="helper_thumbnail" value="0" <?php echo $helper_thumbnail?'':'checked'?>/>
                                <label for="os_fancybox-thumbnail-yes" data-value="Yes">Yes</label>
                                <label for="os_fancybox-thumbnail-no" data-value="No">No</label>
                            </div>
                        </span>
                    </div>
                    <!-- thumbnail position -->
                    <div>
                        <span class="sett-col-1"><?php echo '- '.JText::_("COM_OSGALLERY_SETTINGS_OS_FANCYBOX_THUMBNAIL_POSITION_LABEL")?></span>
                        <span class="sett-col-2">
                            <select name="os_fancybox_thumbnail_position">
                                <option <?php echo $os_fancybox_thumbnail_position=="thumb_right"?'selected':''?> value="thumb_right">Right</option>
                                <option <?php echo $os_fancybox_thumbnail_position=="thumb_bottom"?'selected':''?> value="thumb_bottom">Bottom</option>
                            </select>
                        </span>
                    </div>
                    <!-- share_button -->
                    <div>
                        <span class="sett-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_OS_FANCYBOX_SHARE_BUTTON_LABEL")?></span>
                        <span class="sett-col-2">
                            <div class="osgallery-checkboxes-block">
                                <input id="os_fancybox-share_button-yes" type="radio" name="share_button" value="1" <?php echo $share_button?'checked':''?>/>
                                <input id="os_fancybox-share_button-no" type="radio" name="share_button" value="0" <?php echo $share_button?'':'checked'?>/>
                                <label for="os_fancybox-share_button-yes" data-value="Yes">Yes</label>
                                <label for="os_fancybox-share_button-no" data-value="No">No</label>
                            </div>
                        </span>
                    </div>
                    <!-- download_button -->
                    <div>
                        <span class="sett-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_OS_FANCYBOX_DOWNLOAD_BUTTON_LABEL")?></span>
                        <span class="sett-col-2">
                            <div class="osgallery-checkboxes-block">
                                <input id="os_fancybox-download_button-yes" type="radio" name="download_button" value="1" <?php echo $download_button?'checked':''?>/>
                                <input id="os_fancybox-download_button-no" type="radio" name="download_button" value="0" <?php echo $download_button?'':'checked'?>/>
                                <label for="os_fancybox-download_button-yes" data-value="Yes">Yes</label>
                                <label for="os_fancybox-download_button-no" data-value="No">No</label>
                            </div>
                        </span>
                    </div>
                    <!-- zoom_button -->
                    <div>
                        <span class="sett-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_OS_FANCYBOX_ZOOM_BUTTON_LABEL")?></span>
                        <span class="sett-col-2">
                            <div class="osgallery-checkboxes-block">
                                <input id="os_fancybox-zoom_button-yes" type="radio" name="zoom_button" value="1" <?php echo $zoom_button?'checked':''?>/>
                                <input id="os_fancybox-zoom_button-no" type="radio" name="zoom_button" value="0" <?php echo $zoom_button?'':'checked'?>/>
                                <label for="os_fancybox-zoom_button-yes" data-value="Yes">Yes</label>
                                <label for="os_fancybox-zoom_button-no" data-value="No">No</label>
                            </div>
                        </span>
                    </div>
                    <!-- left_arrow -->
                    <div>
                        <span class="sett-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_OS_LEFT_ARROW_LABEL")?></span>
                        <span class="sett-col-2">
                            <div class="osgallery-checkboxes-block">
                                <input id="os_fancybox-left_arrow-yes" type="radio" name="left_arrow" value="1" <?php echo $left_arrow?'checked':''?>/>
                                <input id="os_fancybox-left_arrow-no" type="radio" name="left_arrow" value="0" <?php echo $left_arrow?'':'checked'?>/>
                                <label for="os_fancybox-left_arrow-yes" data-value="Yes">Yes</label>
                                <label for="os_fancybox-left_arrow-no" data-value="No">No</label>
                            </div>
                        </span>
                    </div>
                    <!-- right_arrow -->
                    <div>
                        <span class="sett-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_OS_RIGHT_ARROW_LABEL")?></span>
                        <span class="sett-col-2">
                            <div class="osgallery-checkboxes-block">
                                <input id="os_fancybox-right_arrow-yes" type="radio" name="right_arrow" value="1" <?php echo $right_arrow?'checked':''?>/>
                                <input id="os_fancybox-right_arrow-no" type="radio" name="right_arrow" value="0" <?php echo $right_arrow?'':'checked'?>/>
                                <label for="os_fancybox-right_arrow-yes" data-value="Yes">Yes</label>
                                <label for="os_fancybox-right_arrow-no" data-value="No">No</label>
                            </div>
                        </span>
                    </div>
                    <!-- close_button -->
                    <div>
                        <span class="sett-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_OS_CLOSE_BUTTON_LABEL")?></span>
                        <span class="sett-col-2">
                            <div class="osgallery-checkboxes-block">
                                <input id="os_fancybox-close_button-yes" type="radio" name="close_button" value="1" <?php echo $close_button?'checked':''?>/>
                                <input id="os_fancybox-close_button-no" type="radio" name="close_button" value="0" <?php echo $close_button?'':'checked'?>/>
                                <label for="os_fancybox-close_button-yes" data-value="Yes">Yes</label>
                                <label for="os_fancybox-close_button-no" data-value="No">No</label>
                            </div>
                        </span>
                    </div>
                    <!-- Buttons block -->
                </div>
                <!-- WATERMARK -->
                <div id="watermark-settings" class="tab-pane fade osg-pro-avaible">
                    <div>
                        <span class="sett-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_WATERMARK_ENABLE_LABEL")?></span>
                        <span class="sett-col-2">
                            <div class="osgallery-checkboxes-block">
                                <input id="os_fancybox-watermark-yes" type="radio" name="watermark_enable" value="1" <?php echo $watermark_enable?'checked':''?>/>
                                <input id="os_fancybox-watermark-no" type="radio" name="watermark_enable" value="0" <?php echo $watermark_enable?'':'checked'?>/>
                                <label for="os_fancybox-watermark-yes" data-value="Yes">Yes</label>
                                <label for="os_fancybox-watermark-no" data-value="No">No</label>
                            </div>
                        </span>
                    </div>

                    <div>
                        <span class="sett-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_WATERMARK_TYPE_LABEL")?></span>
                        <span class="sett-col-2">
                            <div class="osgallery-checkboxes-block">
                                <input id="os_fancybox-watermark-image" type="radio" name="watermark_type" value="1" checked/>
                                <input id="os_fancybox-watermark-text" type="radio" name="watermark_type" value="0" />
                                <label for="os_fancybox-watermark-image" data-value="Image">Image</label>
                                <label for="os_fancybox-watermark-text" data-value="Text">Text</label>
                            </div>
                        </span>
                    </div>

                    <div id="watermark-image-block" <?php echo ($watermark_type == 0)?'style="display:none;"' : ""?> >
                        <div>
                            <span class="sett-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_WATERMARK_SELECT_LABEL")?></span>
                            <span class="sett-col-2">
                                <div class="file-upload">
                                    <button class="file-upload-button" type="button">Select</button>
                                    <div class="none-upload"><?php echo $watermark_file?$watermark_file:'No file chosen.'?></div>
                                    <input id="watermark-input" type="file" name="watermark_file" value="">
                                    <input type="hidden" name="exist_watermark_file" value="<?php echo $watermark_file?>">
                                </div>
                            </span>
                        </div>

                        <div>
                            <span class="sett-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_WATERMARK_SIZE_LABEL")?></span>
                            <span class="sett-col-2">
                                <input type="number" min="5" max="100" name="watermark_size" value="<?php echo $watermark_size?>">
                            </span>
                        </div>
                    </div>
                    <div id="watermark-text-block" <?php echo ($watermark_type == 1)?'style="display:none;"' : ""?> >
                        <div>
                            <span class="sett-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_WATERMARK_TEXT_LABEL")?></span>
                            <span class="sett-col-2">
                                <input type="text" name="watermark_text" value="<?php echo $watermark_text?>" maxlength="50">
                                <input type="hidden" name="exist_watermark_text" value="<?php echo $exist_watermark_text?>">
                            </span>
                        </div>

                        <div>
                            <span class="sett-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_WATERMARK_SIZE_LABEL")?></span>
                            <span class="sett-col-2">
                                <input type="number" min="5" max="50" name="watermark_text_size" value="<?php echo $watermark_text_size?>">
                            </span>
                        </div>
                        <div>
                            <span class="sett-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_WATERMARK_FONT")?></span>
                            <span class="sett-col-2">
                                <select name="watermark_font">
                                    <option <?php echo $watermark_font=="default"?'selected':''?> value="default">Default</option>
                                    <option <?php echo $watermark_font=="lobster"?'selected':''?> value="lobster">Lobster</option>
                                </select>
                                <input type="hidden" name="watermark_font_selected" value="<?php echo $watermark_font?>">
                            </span>
                        </div>

                        <div>
                            <span class="sett-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_WATERMARK_FONT_COLOR_LABEL")?></span>
                            <span class="sett-col-2">
                                <input type="text" name="watermark_text_color" value="<?php echo $watermark_text_color?>">
                            </span>
                        </div>

                        <div>
                            <span class="sett-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_WATERMARK_ANGLE_LABEL")?></span>
                            <span class="sett-col-2">
                                <div class="osgallery-checkboxes-block">
                                <input id="watermark-angle-0" type="radio" name="watermark_text_angle" <?php echo(($watermark_text_angle == 0)?'checked="checked"':'')?> value="0">
                                <input id="watermark-angle-45" type="radio" name="watermark_text_angle" <?php echo(($watermark_text_angle == 45)?'checked="checked"':'')?> value="45">
                                <input id="watermark-angle-90" type="radio" name="watermark_text_angle" <?php echo(($watermark_text_angle == 90)?'checked="checked"':'')?> value="90">
                                <label for="watermark-angle-0" data-value="0">0</label>
                                <label for="watermark-angle-45" data-value="45">45</label>
                                <label for="watermark-angle-90" data-value="90">90</label>
                            </div>
                            </span>
                        </div>
                    </div>
                    <div>
                        <span class="sett-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_WATERMARK_POSITION_LABEL")?></span>
                        <span class="sett-col-2">
                            <select name="watermark_position">
                                <option <?php echo $watermark_position=="top_right"?'selected':''?> value="top_right">Top right</option>
                                <option <?php echo $watermark_position=="top_left"?'selected':''?> value="top_left">Top left</option>
                                <option <?php echo $watermark_position=="center"?'selected':''?> value="center">Center</option>
                                <option <?php echo $watermark_position=="bottom_right"?'selected':''?> value="bottom_right">Bottom right</option>
                                <option <?php echo $watermark_position=="bottom_left"?'selected':''?> value="bottom_left">Bottom left</option>
                            </select>
                            <input type="hidden" name="watermark_position_selected" value="<?php echo $watermark_position?>">
                        </span>
                    </div>

                    <div>
                        <span class="sett-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_WATERMARK_OPACITY_LABEL")?></span>
                        <span class="sett-col-2">
                            <input type="number" min="0" max="100" name="watermark_opacity" value="<?php echo $watermark_opacity?>">
                        </span>
                    </div>
                </div>
                <!-- Social Buttons Settings -->
                <div id="social-settings" class="tab-pane fade osg-pro-avaible">

                    <div> 
                        <span class="sett-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_FACEBOOK_ENABLE_LABEL")?></span>
                        <span class="sett-col-2">
                            <div class="osgallery-checkboxes-block">
                                <input id="social-facebook-yes" type="radio" name="facebook_enable" value="1" />
                                <input id="social-facebook-no" type="radio" name="facebook_enable" value="0" checked/>
                                <label for="social-facebook-yes" data-value="Yes">Yes</label>
                                <label for="social-facebook-no" data-value="No">No</label>
                            </div>
                        </span>
                    </div> 

                    <div>
                        <span class="sett-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_GOOGLEPLUS_ENABLE_LABEL")?></span>
                        <span class="sett-col-2">
                            <div class="osgallery-checkboxes-block">
                                <input id="social-googleplus-yes" type="radio" name="googleplus_enable" value="1" />
                                <input id="social-googleplus-no" type="radio" name="googleplus_enable" value="0" checked/>
                                <label for="social-googleplus-yes" data-value="Yes">Yes</label>
                                <label for="social-googleplus-no" data-value="No">No</label>
                            </div>
                        </span>
                    </div>

                    <div>
                        <span class="sett-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_VKONTACTE_ENABLE_LABEL")?></span>
                        <span class="sett-col-2">
                            <div class="osgallery-checkboxes-block">
                                <input id="social-vkontacte-yes" type="radio" name="vkontacte_enable" value="1" />
                                <input id="social-vkontacte-no" type="radio" name="vkontacte_enable" value="0" checked/>
                                <label for="social-vkontacte-yes" data-value="Yes">Yes</label>
                                <label for="social-vkontacte-no" data-value="No">No</label>
                            </div>
                        </span>
                    </div>

                    <div>
                        <span class="sett-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_ODNOKLASSNIKI_ENABLE_LABEL")?></span>
                        <span class="sett-col-2">
                            <div class="osgallery-checkboxes-block">
                                <input id="social-odnoklassniki-yes" type="radio" name="odnoklassniki_enable" value="1" />
                                <input id="social-odnoklassniki-no" type="radio" name="odnoklassniki_enable" value="0" checked/>
                                <label for="social-odnoklassniki-yes" data-value="Yes">Yes</label>
                                <label for="social-odnoklassniki-no" data-value="No">No</label>
                            </div>
                        </span>
                    </div>

                    <div>
                        <span class="sett-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_TWITTER_ENABLE_LABEL")?></span>
                        <span class="sett-col-2">
                            <div class="osgallery-checkboxes-block">
                                <input id="social-twitter-yes" type="radio" name="twitter_enable" value="1" />
                                <input id="social-twitter-no" type="radio" name="twitter_enable" value="0" checked/>
                                <label for="social-twitter-yes" data-value="Yes">Yes</label>
                                <label for="social-twitter-no" data-value="No">No</label>
                            </div>
                        </span>
                    </div>

                    <div>
                        <span class="sett-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_PINTEREST_ENABLE_LABEL")?></span>
                        <span class="sett-col-2">
                            <div class="osgallery-checkboxes-block">
                                <input id="social-pinterest-yes" type="radio" name="pinterest_enable" value="1" />
                                <input id="social-pinterest-no" type="radio" name="pinterest_enable" value="0" checked/>
                                <label for="social-pinterest-yes" data-value="Yes">Yes</label>
                                <label for="social-pinterest-no" data-value="No">No</label>
                            </div>
                        </span>
                    </div>                    

                    <div>
                        <span class="sett-col-1"><?php echo JText::_("COM_OSGALLERY_SETTINGS_LINKEDIN_ENABLE_LABEL")?></span>
                        <span class="sett-col-2">
                            <div class="osgallery-checkboxes-block">
                                <input id="social-linkedin-yes" type="radio" name="linkedin_enable" value="1" />
                                <input id="social-linkedin-no" type="radio" name="linkedin_enable" value="0" checked/>
                                <label for="social-linkedin-yes" data-value="Yes">Yes</label>
                                <label for="social-linkedin-no" data-value="No">No</label>
                            </div>
                        </span>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <input type="hidden" name="option" value="com_osgallery"/>
    <input type="hidden" name="task" value="save_gallery"/>
    <input id="catOrderIds" type="hidden" name="catOrderIds" value=""/>
    <input id="galerryId" type="hidden" name="galId" value="<?php echo $galId?>"/>
    <input id="hidden-title" type="hidden" name="gallery_title" value="<?php echo $galeryTitle?>"/>
</form>

<script src="components/com_osgallery/assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="components/com_osgallery/assets/js/jquery.slider.minicolors.js" type="text/javascript"></script>
<script src="components/com_osgallery/assets/js/jquery.json.js" type="text/javascript"></script>
<script language="JavaScript">

    String.prototype.replaceAll = function (replaceThis, withThis) {
       var re = new RegExp(replaceThis,"g"); 
       return this.replace(re, withThis);
    };

    var catId = <?php echo $activeIndex?>;
    var activeId = catId;
    var galId = <?php echo $galId?>;

    jQuery(document).ready(function(){

        jQuery("button.upload-folder-btn, button.upload-zip-btn").unbind('click');
        jQuery("button.upload-folder-btn, button.upload-zip-btn").click(function(event){
            event.preventDefault();

            var checkZip = jQuery(this).closest('.upload-zip-wrap').find("input[name=uploadZip]").val(); 
            // #fileUpload is to a input element of the type file
            if(checkZip != undefined){  
                var file = jQuery(this).closest('.upload-zip-wrap').find("input[name=uploadZip]")[0].files[0]
                var zip = new FormData();
                zip.append('uploadZip', file, 'uploadZip');
            }else{
                var zip = undefined;
            }

            var folder = jQuery(this).closest('.upload-folder-wrap').find("input[name=uploadFolder]").val();

            var pathFolder = "";
            var pathZip = "";
            var task = "";

            if(zip != undefined){
                task = "upload_zip";
                pathZip = zip;
            }else if(folder != undefined){
                task = "upload_folder";
                pathFolder = folder;
            }
            
            jQuery.ajax({
                type: 'POST',
                // dataType: 'json',
                processData:false,
                contentType:false,
                url: '<?php echo JURI::current()?>?option=com_osgallery&task='+task+'&catId='+activeId+'&galId='+galId+'&path='+pathFolder+'&format=raw',
                data: pathZip,
                beforeSend: function(){
                    jQuery(".upload-zip-wrap, .upload-folder-wrap, .upload-file-wrap")
                        .css({display:"none"});
                    jQuery('div.upload-loader').css({display:"block"});
                },
                complete: function(){
                    jQuery(".upload-zip-wrap, .upload-folder-wrap, .upload-file-wrap")
                        .css({display:"block"});
                    jQuery('div.upload-loader').css({display:"none"});
                },
                success:function(responce){

                    var responce = responce.replaceAll("}{","}|||{");
                    responce = responce.replaceAll(['{','}'],'');
                    responce = responce.split('|||');
                    
                    for(var i = 0; i < responce.length; i++){

                        var data = JSON.parse(responce[i]); 
                        if(!data.success){

                        }else{

                            fileName = data.file;
                            ext = data.ext;
                            imgId = data.id;

                            image = '<div id="img-'+imgId+'" class="img-block" data-image-id="'+imgId+'">'+
                                      '<span class="delete-image"><i class="material-icons">close</i></span>'+
                                      '<img src="<?php echo JURI::root()?>images/com_osgallery/gal-'+galId+'/thumbnail/'+fileName+ext+'" alt="'+fileName+'">'+
                                      '<input id="img-settings-'+imgId+'" class="block_bg_setting" type="hidden" name="imgSettings['+imgId+']" value="{}">'+
                                      '<div class="img_block_bg"><div class="block_bg_setting"></div></div>' +
                                    '</div>';
                                   
                            jQuery("#cat-"+activeId).append(image);
                            makeDeleteImage();
                            if(jQuery(".qq-upload-list li").not('.qq-upload-success').length == 0){
                                setTimeout(function(){
                                    uploader.clearStoredFiles();
                                }, 5000);
                            }
                            makeCatSortable();
                            imgSettingsFunctions();
                        }
                    }


                },
                error:function(){
                    // alert('Unknown error occurred');
                }

            });

        })

    })

    var galerryTrigger = true;

    //colorpicker
    jQuery("[name='watermark_text_color'], [name='load_more_background']").minicolors({
        control: "hue",
        defaultValue: "",
        format:"rgb",
        opacity: true,
        position: "top right",
        hideSpeed: 100,
        inline: false,
        theme: "bootstrap",
        change: function(value, opacity) {
          jQuery(this).attr("value",value);
        }
    });

    //fn for find position of dom obj
    function findPosY(obj) {
      var curtop = 0;
      if(obj.offsetParent){
        while(1){
          curtop+=obj.offsetTop;
          if(!obj.offsetParent){
            break;
          }
          obj=obj.offsetParent;
        }
      }else if (obj.y){
        curtop+=obj.y;
      }
      return curtop-100;
    }
  //end

    //on save
    Joomla.submitbutton = function(pressbutton) {
        if(pressbutton =='open_gallery_settings'){
            if(galerryTrigger){
                jQuery("#system-message-container").removeClass('gallery-main');
                jQuery("#system-message-container").addClass('gallery-settings');
                jQuery(".main-gallery-header a:last").tab('show');
                jQuery("#toolbar div:last button").html('Back to Gallery');
                galerryTrigger = false;
            }else{
                jQuery("#system-message-container").removeClass('gallery-settings');
                jQuery("#system-message-container").addClass('gallery-main');
                jQuery(".main-gallery-header a:first").tab('show');
                jQuery("#toolbar div:last button").html('<span class="icon-options"></span>Gallery Settings');
                galerryTrigger = true;
            }
            return;
        }else if(pressbutton!='close_gallery'){
            jQuery("#catOrderIds").val(jQuery("#osgalery-cat-tabs").sortable( "toArray" ));
            jQuery("#os-cat-tab-images div.tab-pane").each(function(index, el) {
               jQuery(this).find(".cat-img-ordering").val(jQuery(this).sortable( "toArray" ));
            });
            //check title
            if(!jQuery('#gallery-title').val()){
                window.scrollTo(0,findPosY(jQuery('#gallery-title'))-100);
                jQuery('#gallery-title').attr("placeholder", "<?php echo JText::_('Cannot be empty'); ?>");
                jQuery('#gallery-title').css("border-color","#FF0000");
                jQuery('#gallery-title').css("background","#FF0000");
                jQuery('#gallery-title').keypress(function() {
                    jQuery('#gallery-title').css("border-color","gray");
                    jQuery('#gallery-title').css("color","inherit");
                });
                return;
            } else if (jQuery('#gallery-title').val()){
                jQuery('#gallery-title').css("background", "inherit");
            }
            document.adminForm.task.value = pressbutton;
            if(pressbutton=='save_gallery'){
                if(jQuery("#new-cat-name")){
                    jQuery(".save-cat-name").trigger('click');
                }

                //grab all form data
                var formData = new FormData(jQuery("#adminForm")[0]);
                html = '<div id="gallery-waiting-spinner"><div class="gallery-wait-spinner">'+
                        'Please wait <div class="gallery-wait-bounce1"></div>'+
                        '<div class="gallery-wait-bounce2"></div>'+
                        '<div class="gallery-wait-bounce3"></div>'+
                        '</div></div>';
                jQuery("body").prepend(html);
                jQuery.ajax({
                    url: '?option=com_osgallery&task=save_gallery&format=raw',
                    type: 'POST',
                    data: formData,
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        jQuery("#gallery-waiting-spinner").remove();
                        try {
                            data = window.JSON.parse(data);
                        } catch (e) {
                            data.success = false;
                        }
                        if (data.success) {
                            params = window.JSON.parse(data.params);
                            jQuery("[name='exist_watermark_file']").val(params.watermark_file);
                            html = '<div class="alert alert-success">'+
                                        '<h4 class="alert-heading">Message</h4>'+
                                        '<div class="alert-message">'+data.message+'</div>'+
                                    '</div>';
                            jQuery("#system-message-container").html(html);
                            jQuery(".category-options-block").addClass("category-options-block-message");
                            setTimeout(function(){
                                jQuery("#system-message-container").empty();
                                 jQuery(".category-options-block").removeClass("category-options-block-message");
                            }, 3000);
                        }else{
                          console.log('oops');
                        }
                    }
                });
            }else{
                if(jQuery("#new-cat-name")){
                    jQuery(".save-cat-name").trigger('click');
                }
                document.adminForm.task.value = pressbutton;
                document.adminForm.submit();
            }
        }else{
            document.adminForm.task.value = pressbutton;
            document.adminForm.submit();
        }
    };

    //global counters
    var catId = <?php echo $activeIndex?>;
    var activeId = jQuery("#osgalery-cat-tabs a:first").data("cat-id");
    var galId = <?php echo $galId?>

    jQuery(".add-new-cat").click(function(event) {
        if(jQuery("#new-cat-name")){
            jQuery(".save-cat-name").trigger('click');
        }
        //native js faster
        catId++;

        //create new li
        var li = document.createElement('li');
        li.id = "order-id-"+catId;
        li.innerHTML = '<a href="#cat-'+catId+'" data-cat-id="'+catId+'">Category Title</a>'+
                        '<input type="hidden" name="category_names[]" value="'+catId+'|+|Category Title" placeholder="">'+
                        '<span class="edit-category-name"><i class="material-icons">mode_edit</i>'+
        'edit</span>'+
                        '<span class="delete-category"><i class="material-icons">delete</i></span>';
        list = document.getElementById("osgalery-cat-tabs");
        list.insertBefore(li, list.children[list.children.length-1]);

        //create new tab content
        var div = document.createElement('div');
        div.id = 'cat-'+catId;
        div.className = 'tab-pane fade';
        div.innerHTML = '<input class="cat-img-ordering" type="hidden" name="imageOrdering['+catId+']" value="">'+
                        '<input id="cat-settings-'+catId+'" type="hidden" name="catSettings['+catId+']" value="{}">';
        list = document.getElementById("os-cat-tab-images");
        list.insertBefore(div, list.children[list.children.length-1]);
        makeTabsCliked();

        //activated tab
        activeId = catId;
        jQuery("#osgalery-cat-tabs a[href='#cat-"+activeId+"'").tab('show');
        //update settings
        catSettings = window.JSON.parse('{}');
        jQuery("#cat-alias").val(catSettings.categoryAlias || '');
        jQuery("#cat-unpublish").prop("checked",!catSettings.categoryUnpublish);
        jQuery("#cat-show-title").prop("checked",catSettings.categoryShowTitle);
        jQuery("#cat-show-cat-title-caption").prop("checked",catSettings.categoryShowTitleCaption);
        jQuery(".category-options-block a:last").tab('show');

        //update settings
        imgSettings = window.JSON.parse('{}');
        jQuery("#img-title").val(imgSettings.imgTitle || '');
        jQuery("#video-link").val(imgSettings.videoLink || '');
        // jQuery("#img-alias").val(imgSettings.imgAlias || '');
        jQuery("#img-short-description").val(imgSettings.imgShortDescription || '');
        jQuery("#img-html").val(imgSettings.imgHtml || '');
        jQuery("#img-alt").val(imgSettings.imgAlt || '');
        jQuery("#img-link").val(imgSettings.imgLink || '');
        jQuery("#img-link-open").val(imgSettings.imgLinkOpen || '_blank');
        jQuery("#html-position-img").val(imgSettings.htmlPosition || 'bottom');

        if (imgSettings.imgHtmlShow) {
            if (imgSettings.imgHtmlShow == "yes") jQuery("#general-img-html").find('#general-img-html-yes').attr("checked",true);
            if (imgSettings.imgHtmlShow == "no") jQuery("#general-img-html").find('#general-img-html-no').attr("checked",true);
        } else {
            jQuery("#general-img-html").find('#general-img-html-yes').attr("checked",true);
        }

        if (imgSettings.htmlWidthAsImg) {
            if (imgSettings.htmlWidthAsImg == "yes") jQuery("#html-width-as-img").find('#html-width-as-img-yes').attr("checked",true);
            if (imgSettings.htmlWidthAsImg == "no") jQuery("#html-width-as-img").find('#html-width-as-img-no').attr("checked",true);
        } else {
            jQuery("#html-width-as-img").find('#html-width-as-img-yes').attr("checked",true);
        }


        

        //reload uploder params
        uploader.setParams({
            catId: activeId,
            galId: galId
        });
        makeCatSortable();
        catSettingsFunctions();
    });

    //uploaderz`
    var uploader = new qq.FineUploader({
    /* other required config options left out for brevity */
        element: document.getElementById("fine-uploader"),
        template: 'qq-template',
        validation: {
            allowedExtensions: ['jpg', 'jpeg', 'png', 'gif'],
            sizeLimit: 10 * 1024 * 1024,
        },
        request: {
            endpoint: '<?php echo JURI::current()?>?option=com_osgallery&task=upload_images&format=raw',
            params: {
              catId: activeId,
              galId: galId
            }
        },
        callbacks: {
            onComplete: function (id, filename, responseJSON) {
                if (!responseJSON.success) {
                }else{
                    //create image
                    fileName = responseJSON.file;
                    ext = responseJSON.ext;
                    imgId = responseJSON.id;
                    image = '<div id="img-'+imgId+'" class="img-block" data-image-id="'+imgId+'">'+
                              '<span class="delete-image"><i class="material-icons">close</i></span>'+
                              '<img src="<?php echo JURI::root()?>images/com_osgallery/gal-'+galId+'/thumbnail/'+fileName+ext+'" alt="'+fileName+'">'+
                              '<input id="img-settings-'+imgId+'" type="hidden" name="imgSettings['+imgId+']" value="{}">'+
                              '<div class="img_block_bg"><div class="block_bg_setting"></div></div>' +
                            '</div>';
                    jQuery("#cat-"+activeId).append(image);
                    makeDeleteImage();
                    if(jQuery(".qq-upload-list li").not('.qq-upload-success').length == 0){
                        setTimeout(function(){
                            uploader.clearStoredFiles();
                        }, 5000);
                    }
                    makeCatSortable();
                    imgSettingsFunctions();
                }
            }
        }
    });
//end

    //some click function
    function makeTabsCliked(){
        jQuery(".main-nav-tabs a,.settings-nav-tabs a").click(function(e){
            e.preventDefault();
            jQuery(this).tab('show');
        });

        //fn-for edit cat name
        jQuery(".edit-category-name").unbind('click');
        jQuery(".edit-category-name").click(function(event){
            if(jQuery("#new-cat-name")){
                jQuery(".save-cat-name").trigger('click');
            }
            jQuery("#osgalery-cat-tabs").sortable( "disable" );
            //short selectors
            li = jQuery(this).parent();
            a = li.find("a");
            li.children().hide();

            //add some tools for type new name
            li.append('<input id="new-cat-name" class="edit-cat-name" type="text" '+
                    'name="save_image" placeholder="type smth..." value="'+a.text()+'">'+
                    '<span class="save-cat-name edit-cat-name">Save</span>');
            //focus on input last symbol
            jQuery("#new-cat-name").focus();
            temp=jQuery("#new-cat-name").val();
            jQuery("#new-cat-name").val('');
            jQuery("#new-cat-name").val(temp);

            //save new name
            jQuery(".save-cat-name").click(function(event) {
                a.text(jQuery("#new-cat-name").val());
                li.find("input:not(#new-cat-name)").val(a.data("cat-id")+'|+|'+jQuery("#new-cat-name").val());
                jQuery(".edit-cat-name").remove();
                li.children().show();
                jQuery("#osgalery-cat-tabs").sortable( "enable" );
            });

            //esc
            jQuery(document).keyup(function(e) {
                if (e.keyCode == 27) { // escape key maps to keycode `27`
                    jQuery(".edit-cat-name").remove();
                    li.children().show();
                    jQuery("#osgalery-cat-tabs").sortable( "enable" );
                }
            });

            //endter
            jQuery(document).keypress(function(e) {
                if(e.which == 13) {
                    jQuery(".save-cat-name").trigger( "click" );
                }
            });
        });

        //fn-s for delete cat with photos // we will delete photos later after save // maybe add restore button
        jQuery(".delete-category").click(function(event) {
            if(jQuery("#osgalery-cat-tabs li").length == 1){
                html = '<div class="alert alert-error">'+
                            '<h4 class="alert-heading">Message</h4>'+
                            '<div class="alert-message">You must have at list 1 category!</div>'+
                        '</div>';
                jQuery("#system-message-container").html(html)
                setTimeout(function(){
                  jQuery("#system-message-container").empty();
                }, 5000);
                return;
            }
            li = jQuery(this).parent();
            a = li.find("a");
            catId = a.data("cat-id");
            jQuery("#adminForm").append('<input type="hidden" name="deletedCatIds[]" value="'+catId+'">')
            jQuery(li).fadeOut(500, function(){ jQuery(this).remove();});
            jQuery("#cat-"+catId).fadeOut(500, function(){ jQuery(this).remove();});
            //activated 1st tab// if we delete current 1-st tab
            if(activeId == catId){
                //show first
                jQuery("#osgalery-cat-tabs a:first").tab('show');
                //get new activeId
                activeId = jQuery("#osgalery-cat-tabs a:first").data("cat-id");

                //reload uploder params
                uploader.setParams({
                    catId: activeId,
                    galId: galId
                })
            }
        });
    }

    function parceOptions(string){
        try{
            string = decodeURI(string);
            return window.JSON.parse(string);
        }catch(err){
            return window.JSON.parse('{}');
        }
    }

    //function for make category tab and images sortable
    function makeCatSortable(){
        jQuery( "#osgalery-cat-tabs" ).sortable({
            handle: 'a',
            axis: "x",
            items: "> li"
        });

        jQuery("#os-cat-tab-images div").sortable({
            // cancel: null, // Cancel the default events on the controls
            // helper: "clone",
            // revert: true,
            tolerance: "pointer",
            // handle: 'img',
            items: ".img-block",
        });
        // jQuery( "#os-cat-tab-images div" ).disableSelection();
    }
   
    //cat settings functions
    function catSettingsFunctions(){
        //initialise first tab settings
        var catSettings = parceOptions(jQuery("#cat-settings-"+activeId).val());
        jQuery("#cat-alias").val(catSettings.categoryAlias || '');
        jQuery("#cat-unpublish").prop("checked",!catSettings.categoryUnpublish);
        jQuery("#cat-show-title").prop("checked",catSettings.categoryShowTitle);
        jQuery("#cat-show-cat-title-caption").prop("checked",catSettings.categoryShowTitleCaption);
        //end

        //change cat click function
        jQuery(".cat-nav-tabs a").click(function(e){
            e.preventDefault();
            jQuery(this).tab('show');
            jQuery(".category-options-block a:last").tab('show');
            activeId = jQuery(this).data("cat-id");
            //reload uploder params
            uploader.setParams({
                catId: activeId,
                galId: galId
            })

            //update settings
            catSettings = parceOptions(jQuery("#cat-settings-"+activeId).val());
            if(Object.keys(catSettings).length == 0 ) {
                jQuery("#cat-alias").val('');
                jQuery("#cat-unpublish").prop("checked",true);
                jQuery("#cat-show-title").prop("checked",true);
                jQuery("#cat-show-cat-title-caption").prop("checked",true);

            }else {
                jQuery("#cat-alias").val(catSettings.categoryAlias || '');
                jQuery("#cat-unpublish").prop("checked",!catSettings.categoryUnpublish);
                jQuery("#cat-show-title").prop("checked",catSettings.categoryShowTitle);
                jQuery("#cat-show-cat-title-caption").prop("checked",catSettings.categoryShowTitleCaption);
            }

        });
        //end

        //change options // maybe need improve on save. // now we save every option immediately when change value
        jQuery("#cat-layout, #cat-unpublish, #cat-show-title, #cat-show-cat-title-caption,#cat-alias").on('customCat', function (e) {
            //get params from jsonString
            catSettings = parceOptions(jQuery("#cat-settings-"+activeId).val());
            catSettings.categoryAlias = checkSpecialChar(jQuery("#cat-alias").val());
            catSettings.categoryUnpublish = !jQuery("#cat-unpublish").prop("checked");
            catSettings.categoryShowTitle = jQuery("#cat-show-title").prop("checked");
            catSettings.categoryShowTitleCaption = jQuery("#cat-show-cat-title-caption").prop("checked");

            //set params to Json
            jQuery("#cat-settings-"+activeId).val(encodeURI(window.JSON.stringify(catSettings)));
        });

        jQuery("#cat-layout, #cat-unpublish, #cat-show-title, #cat-show-cat-title-caption").change(function(event) {
            jQuery(this).trigger( "customCat");
        });
        jQuery("#cat-alias").on('input', function (e) {
            jQuery(this).trigger( "customCat");
        });
        //end
    }

    function checkSpecialChar(string){
        return string.replace(new RegExp('\\<', 'ig'),'').replace(new RegExp('\\>', 'ig'),'').replace(new RegExp('\\:', 'ig'),'');
    }

    ///img settings function
    function imgSettingsFunctions(){
        //change img click function
        jQuery("#os-cat-tab-images div[id^='img-']").click(function(e){

            jQuery('#modalImageSettings').modal();

            jQuery("#os-cat-tab-images div[id^='img-']").removeClass('active-img-block');
            jQuery(this).addClass('active-img-block');
            jQuery(".category-options-block a:first").tab('show');
            imageId = jQuery(this).data("image-id");

            jQuery("#modalImageSettingsLabel").text('Image ID-'+imageId);

            // get image settings based imageId
            imgSettings = parceOptions(jQuery("#img-settings-"+imageId).val());
            
            // set image settings
            //Title
            jQuery("#img-title").val(imgSettings.imgTitle || '');
            jQuery("#video-link").val(imgSettings.videoLink || '');
            //Short Description
            jQuery("#img-short-description").val(imgSettings.imgShortDescription || '');
            //Image Alt
            jQuery("#img-alt").val(imgSettings.imgAlt || '');
            //Link
            jQuery("#img-link").val(imgSettings.imgLink || '');
            //Target
            jQuery("#img-link-open").val(imgSettings.imgLinkOpen || '_blank');
            //Html Code 
            if (typeof(imgSettings.imgHtml) === "object" && imgSettings.imgHtml.html !== undefined ){
                jQuery("#img-html").val(imgSettings.imgHtml.html);
            }else{
                jQuery("#img-html").val('');
            }
            //Show main image in HTML code
            if ( imgSettings.imgHtmlShow ) {
                if (imgSettings.imgHtmlShow == "yes"){
                    jQuery("#general-img-html").find('#general-img-html-yes').attr("checked",true);
                    jQuery(".img-html-width, .html-position").slideDown(400)
                }

                if (imgSettings.imgHtmlShow == "no"){
                    jQuery("#general-img-html").find('#general-img-html-no').attr("checked",true);
                    jQuery(".img-html-width, .html-position").slideUp(400)
                }

            } else {
                jQuery("#general-img-html").find('#general-img-html-yes').attr("checked",true);
                jQuery(".img-html-width, .html-position").slideDown(400)
            }
            //Html position
            jQuery("#html-position-img").val(imgSettings.htmlPosition || 'bottom');
            // Set Html Code block width as Main Image width
            if ( imgSettings.htmlWidthAsImg ) {
                if (imgSettings.htmlWidthAsImg == "yes") jQuery("#html-width-as-img").find('#html-width-as-img-yes').attr("checked",true);
                if (imgSettings.htmlWidthAsImg == "no") jQuery("#html-width-as-img").find('#html-width-as-img-no').attr("checked",true);
            } else {
                jQuery("#html-width-as-img").find('#html-width-as-img-yes').attr("checked",true);
            }




            

            //change options // maybe need improve on save. // now we save every option immediately when change value
            jQuery("#img-title, #img-short-description, #img-alt, #img-link,"+
                    " #img-link-open, #img-html, #general-img-html, #html-position-img,"+
                    " #html-width-as-img , #video-link").on('customImg', function (e) {
                //get params from jsonString
                imgSettings = parceOptions(jQuery("#img-settings-"+imageId).val());

                imgSettings.imgTitle = jQuery("#img-title").val();
                imgSettings.videoLink = jQuery("#video-link").val();
                imgSettings.imgShortDescription = jQuery("#img-short-description").val();
                imgSettings.imgAlt = checkSpecialChar(jQuery("#img-alt").val());
                imgSettings.imgLink = jQuery("#img-link").val();
                imgSettings.imgLinkOpen = jQuery("#img-link-open").val();
                imgSettings.imgHtml = {};
                if (jQuery("#img-html").val() || jQuery("#img-html").val() == ''){
                    imgSettings.imgHtml.html = jQuery("#img-html").val();
                }else{
                    imgSettings.imgHtml.html = jQuery.quoteString(jQuery("#img-html").val());
                }               
                imgSettings.htmlPosition = jQuery("#html-position-img").val();

                jQuery("#img-settings-"+imageId).val(encodeURI(window.JSON.stringify(imgSettings)));
            });

            jQuery("#img-link-open").change(function(event) {
                jQuery(this).trigger( "customImg");
            });

            jQuery("#img-title, #img-short-description, #img-alt, #img-link, #img-html, #general-img-html, #html-position-img, #html-width-as-img, #video-link").on('input', function (e) {
                jQuery(this).trigger("customImg");
            });
            //end
        });
        //end
    }

    function makeDeleteImage(){
        jQuery(".delete-image").click(function(event) {
            event.stopPropagation();
            imgBlock = jQuery(this).parent();
            imgId = jQuery(imgBlock).data("image-id");
            jQuery(imgBlock).fadeOut(200, function(){ jQuery(this).remove();});
            jQuery("#adminForm").append('<input type="hidden" name="deletedImgIds[]" value="'+imgId+'">')
        });
    }

    function addCheckedToMainImgCheckbox () {
        jQuery(".img-html-show input").click(function(e) {
            var id = jQuery(this).attr('id');
            var imageId = jQuery('.active-img-block').data("image-id");
            var imgSettings = parceOptions(jQuery("#img-settings-"+imageId).val());

            if (id == 'general-img-html-yes') {
                jQuery(this).attr('checked', 'checked');
                jQuery(".img-html-show").find('#general-img-html-no').attr("checked",false);
                imgSettings.imgHtmlShow = "yes";
                jQuery("#img-settings-"+imageId).val(encodeURI(window.JSON.stringify(imgSettings)));

                jQuery(".img-html-width, .html-position").slideDown(400)
            } else {
                jQuery(this).attr('checked', 'checked');
                jQuery(".img-html-show").find('#general-img-html-yes').attr("checked",false);
                imgSettings.imgHtmlShow = "no";
                jQuery("#img-settings-"+imageId).val(encodeURI(window.JSON.stringify(imgSettings)));

                jQuery(".img-html-width, .html-position").slideUp(400)
            }

        });
    }

    function addCheckedWidthASMainImgCheckbox () {
        jQuery(".img-html-width input").click(function(e) {
            var id = jQuery(this).attr('id');
            var imageId = jQuery('.active-img-block').data("image-id");
            var imgSettings = parceOptions(jQuery("#img-settings-"+imageId).val());

            if (id == 'html-width-as-img-yes') {
                jQuery(this).attr('checked', 'checked');
                jQuery(".img-html-width").find('#html-width-as-img-no').attr("checked",false);
                imgSettings.htmlWidthAsImg = "yes";
                jQuery("#img-settings-"+imageId).val(encodeURI(window.JSON.stringify(imgSettings)));
            } else {
                jQuery(this).attr('checked', 'checked');
                jQuery(".img-html-width").find('#html-width-as-img-yes').attr("checked",false);
                imgSettings.htmlWidthAsImg = "no";
                jQuery("#img-settings-"+imageId).val(encodeURI(window.JSON.stringify(imgSettings)));
            }
        });
    }    


    function tabsChangeDependences(){

        //change galleryLayout
        jQuery(".gallery-layout[name='galleryLayout']").change(function(event) {
            
            var galleryLayout = jQuery(this).val();
            //masonry
            if(galleryLayout == 'masonry'){
                jQuery("#masonryLayout").slideDown(400);
                // jQuery("#osgallery-checkboxes-block-general").slideUp(400);
                // jQuery("#minImgSize").slideUp(400);
                jQuery("[name='number_images_at_once_effect']").val('none');
            }else{
                jQuery("#masonryLayout").slideUp(400);
                // jQuery("#osgallery-checkboxes-block-general").slideDown(400);
                // jQuery("#minImgSize").slideDown(400);
            }

            //albumMode
            if(galleryLayout == 'albumMode'){
                jQuery(".back-button-text-block").slideDown(400);
                // jQuery("select[name='showLoadMore'] option[value='auto']").attr("disabled", "disabled");
                // jQuery("select[name='showLoadMore']").val('0');
                jQuery("#load-more-button-block").slideUp(400);
                jQuery("#load-more-block").slideUp(400);
            }else{
                jQuery(".back-button-text-block").slideUp(400);
                jQuery("select[name='showLoadMore'] option[value='auto']").removeAttr("disabled");
            }

            //masonry & fit_rows
            if(galleryLayout != "masonry" && galleryLayout != "fit_rows"){
                jQuery("#imgWidth").slideDown(400);
                jQuery("#imgHeight").slideDown(400);
            }else{
                jQuery("#imgWidth").slideUp(400);
                jQuery("#imgHeight").slideUp(400);
            }

            //allInOne
            if(galleryLayout == 'allInOne'){
                jQuery(".main-load-more-block").slideUp(400);
                jQuery(".load_more_title").slideUp(400);
                jQuery("select[name='showLoadMore']").attr('disabled','disabled');
            }else{
                jQuery(".main-load-more-block").slideDown(400);
                jQuery(".load_more_title").slideDown(400);
                jQuery("select[name='showLoadMore']").removeAttr('disabled');
            }

            //allInOne & albumMode
            if(galleryLayout == "allInOne" || galleryLayout == "albumMode"){
                jQuery(".cat-show-title-block").slideUp(400);
            }else{
                jQuery(".cat-show-title-block").slideDown(400);
            }

        });
        //change galleryLayout

        //change loadMoreType
        jQuery("select[name='showLoadMore']").change(function(event) {
            var loadMoreType = jQuery(this).val();

            if(loadMoreType == '0'){
                jQuery("#load-more-button-block").slideUp(400);
                jQuery("#load-more-block").slideUp(400);
            }else{
                if(loadMoreType == 'button'){
                    jQuery("#load-more-button-block, #load-more-block").slideDown(400);
                }else{
                    jQuery("#load-more-button-block").slideUp(400);
                    jQuery("#load-more-block").slideDown(400);
                }
            }
        });
        //change loadMoreType


        //prev_next_effect
        jQuery("[name='prev_next_effect']").change(function(event) {
            var prev_next_effect = jQuery(this).val();                

            if(prev_next_effect != 'none'){
                jQuery(".os-fancybox-prev-next-speed-block").slideDown(400);
            }else{
                jQuery(".os-fancybox-prev-next-speed-block").slideUp(400);
            }
        });

        //open_close_effect
        jQuery("[name='open_close_effect']").change(function(event) {
            var open_close_effect = jQuery(this).val();

            if(open_close_effect != 'none'){
                jQuery(".os-fancybox-open-close-speed-block").show("slow");
            }else{
                jQuery(".os-fancybox-open-close-speed-block").hide("slow");
            }
        });

        //watermark_type
        jQuery("input[name='watermark_type']").change(function(event) {
            var watermark_type = jQuery(this).val();

            if(watermark_type == 1){
                jQuery("#watermark-image-block").slideDown(400);
                jQuery("#watermark-text-block").slideUp(400);
            }else{
                jQuery("#watermark-image-block").slideUp(400);
                jQuery("#watermark-text-block").slideDown(400);
            }
        });

        jQuery("#watermark-input").change(function(event) {
            var filename = jQuery('#watermark-input').val().replace(/C:\\fakepath\\/i, '')
            jQuery(".none-upload").html(filename);
        });
    }

    jQuery(document).ready(function(){
        makeTabsCliked();
        makeCatSortable();
        makeDeleteImage();
        catSettingsFunctions();
        imgSettingsFunctions();
        addCheckedToMainImgCheckbox();
        addCheckedWidthASMainImgCheckbox();
        tabsChangeDependences();

        jQuery("#osgalery-cat-tabs a:first,#osgalery-cat-tabs a:first,"+
                ".category-options-block a:last-child,"
                +".main-gallery-header a:first,.settings-nav-tabs a:first").tab('show');
        
        //init for free
        jQuery('.osg-pro-avaible, .osg-pro-avaible-string').prop('disabled', 'disabled');
        jQuery('.osg-pro-avaible *, .osg-pro-avaible-string *').prop('disabled', 'disabled');
        //
        jQuery("#system-message-container").addClass('gallery-main');
    });

    jQuery(window).scroll(function(){
        if(jQuery(window).scrollTop() >= 47) {
            jQuery(".category-options-block").addClass("category-options-block-fixed");
        } else {
            jQuery(".category-options-block").removeClass("category-options-block-fixed");
        }
    });

</script>