<?php
if (!defined('_VALID_MOS') && !defined('_JEXEC')) die('Direct Access to ' . basename(__FILE__) . ' is not allowed.');

/**
* @package OS CCK
* @copyright 2016 OrdaSoft.
* @author Andrey Kvasnevskiy(akbet@mail.ru),Roman Akoev (akoevroman@gmail.com)
* @link http://ordasoft.com/cck-content-construction-kit-for-joomla.html
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* @description OrdaSoft Content Construction Kit
*/
$fName = $field->db_field_name;

$description_show = (isset($lParams['description_'.$fName])) ? 'checked="true"' : '';
$field_prefix = (isset($lParams[$fName.'_prefix'])) ? $lParams[$fName.'_prefix'] : '';
$field_suffix = (isset($lParams[$fName.'_suffix'])) ? $lParams[$fName.'_suffix'] : '';
$fld_alias = (isset($lParams[$fName.'_alias'])) ? $lParams[$fName.'_alias'] : $field->field_name;
$field_tooltip = (isset($lParams[$fName.'_tooltip'])) ? $lParams[$fName.'_tooltip'] : '';
$access_selected = (isset($lParams['access_'.$fName])) ? $lParams['access_'.$fName] : '1';
$field_digits = (isset($lParams[$fName.'_digits'])) ? $lParams[$fName.'_digits'] : 10;
$field_digits_points = (isset($lParams[$fName.'_digits_points'])) ? $lParams[$fName.'_digits_points'] : 0;
$field_price_field = (isset($lParams[$fName.'_price_field'])) ? $lParams[$fName.'_price_field'] : 0;
$field_placeholder = (isset($lParams[$fName.'_placeholder'])) ? $lParams[$fName.'_placeholder'] : '';
$fld_require = (isset($lParams[$fName.'_required'])) ? 'checked="true"' : '';

//publish checked default
$fld_published = (isset($lParams[$fName.'_published']) 
                    && $lParams[$fName.'_published'] == 'on') ? 'checked="true"' : '';
$fld_published = (!isset($lParams[$fName.'_published'])) ? 'checked="true"' : $fld_published;

//show name checked default
$fld_name_show = (isset($lParams['showName_'.$fName]) 
                    && $lParams['showName_'.$fName] == 'on') ? 'checked="true"' : '';
$fld_name_show = (!isset($lParams['showName_'.$fName])) ? 'checked="true"' : $fld_name_show;


?>
<div id="options-field-<?php echo $fName?>">
    <div>
        <input type="hidden" data-field-name="<?php echo $fName?>" name="fi_<?php echo $fName?>_published"
        <?php echo $fld_published?> value="0">
        <label><?php echo JText::_("COM_OS_CCK_LABEL_SHOW_FIELD_PUBLISHED")?></label>
        <input type="checkbox" data-field-name="<?php echo $fName?>" name="fi_<?php echo $fName?>_published" <?php echo $fld_published?>>
    </div>
    <div>
        <label><?php echo JText::_("COM_OS_CCK_LABEL_SHOW_FIELD_REQUIRED")?></label>
        <input class="require-checkbox" type="checkbox" data-field-name="<?php echo $fName?>" name="fi_<?php echo $fName?>_required" <?php echo $fld_require?>>
    </div>
    <div>
        <input type="hidden" data-field-name="<?php echo $fName?>" name="fi_showName_<?php echo $fName?>" 
        <?php echo $fld_name_show?> value="0">
        <label><?php echo JText::_("COM_OS_CCK_LABEL_SHOW_FIELD_NAME")?></label>
        <input type="checkbox" data-field-name="<?php echo $fName?>" name="fi_showName_<?php echo $fName?>" <?php echo $fld_name_show?>>
    </div>
    <div>
        <label><?php echo JText::_("COM_OS_CCK_LABEL_ALIAS")?></label>
        <input type="text" size="4" name="fi_<?php echo $fName?>_alias"  value="<?php echo $fld_alias?>" >
    </div>
    <div>
        <label><?php echo JText::_("COM_OS_CCK_LABEL_SHOW_DESCRIPTION")?></label>
        <input type="checkbox" data-field-name="<?php echo $fName?>" name="fi_description_<?php echo $fName?>" <?php echo $description_show?>>
    </div>
    <div>
        <label><?php echo JText::_("COM_OS_CCK_LABEL_TOOLTIP")?></label>
        <input type="text" size="4" name="fi_<?php echo $fName?>_tooltip"  value="<?php echo $field_tooltip?>" >
    </div>
    <div>
        <label><?php echo JText::_("COM_OS_CCK_LABEL_PREFIX")?></label>
        <input type="text" size="4" name="fi_<?php echo $fName?>_prefix"  value="<?php echo $field_prefix?>" >
    </div>
    <div>
        <label><?php echo JText::_("COM_OS_CCK_LABEL_SUFFIX")?></label>
        <input type="text" size="4" name="fi_<?php echo $fName?>_suffix"  value="<?php echo $field_suffix?>" >
    </div>
    <div>
        <label><?php echo JText::_("COM_OS_CCK_LABEL_SHOW_PLACEHOLDER")?></label>
        <input type="text" size="4" name="fi_<?php echo $fName?>_placeholder"  value="<?php echo $field_placeholder?>" >
    </div>
    <div>
        <label><?php echo JText::_("COM_OS_CCK_LABEL_DIGITS")?></label>
        <input type="text" size="4" name="fi_<?php echo $fName?>_digits"  value="<?php echo $field_digits?>" >
    </div>
    <div>
        <label><?php echo JText::_("COM_OS_CCK_LABEL_DIGITS_POINT")?></label>
        <input type="text" size="4" name="fi_<?php echo $fName?>_digits_points"  value="<?php echo $field_digits_points?>" >
    </div>
    <div>
        <label><?php echo JText::_("COM_OS_CCK_LABEL_FIELD_PRICE")?> <i title="<?php echo JText::_("COM_OS_CCK_PRICE_FIELD_TOOLTIP")?>" class="glyphicon glyphicon-info-sign date_tooltip"></i></label>
        <input type="radio" name="fi_<?php echo $fName?>_price_field"  <?php echo $field_price_field?'checked':''?> value="1">Yes
        <input type="radio" name="fi_<?php echo $fName?>_price_field"  <?php echo $field_price_field?'':'checked'?> value="0">No
    </div>

</div>