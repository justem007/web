<?php
class Ves_Themesettings_Block_Adminhtml_System_Config_Form_Field_Product_Fontpreview extends Mage_Adminhtml_Block_System_Config_Form_Field
{
    /**
     * Override field method to add js
     *
     * @param Varien_Data_Form_Element_Abstract $element
     * @return String
     */
    protected function _getElementHtml(Varien_Data_Form_Element_Abstract $element)
    {
        // Get the default HTML for this option
        $html = parent::_getElementHtml($element);
        
        $elementId = $element->getOriginalData();
        $id = "";
        if (isset($elementId['preview_id']))
        {
            $id = $elementId['preview_id'];
        }
        $html .= '<br/><div id="custom_font_preview'.$id.'" style="display:none;font-size:20px; margin-top:5px;">The quick brown fox jumps over the lazy dog</div>
        <script>
            var googleFontPreviewModel'.$id.' = Class.create();
            googleFontPreviewModel'.$id.'.prototype = {
                initialize : function()
                {
                    this.fontElement = $("'.$element->getHtmlId().'");
                    this.previewElement = $("custom_font_preview'.$id.'");
                    this.loadedFonts = "";
                    this.refreshPreview();
                    this.bindFontChange();
                },
                bindFontChange : function()
                {
                    Event.observe(this.fontElement, "change", this.refreshPreview.bind(this));
                    Event.observe(this.fontElement, "keyup", this.refreshPreview.bind(this));
                    Event.observe(this.fontElement, "keydown", this.refreshPreview.bind(this));
                },
                refreshPreview : function()
                {
                    if ( this.loadedFonts.indexOf( this.fontElement.value ) > -1 ) {
                        this.updateFontFamily();
                        return;
                    }
                    var ss = document.createElement("link");
                    ss.type = "text/css";
                    ss.rel = "stylesheet";
                    ss.href = "http://fonts.googleapis.com/css?family=" + this.fontElement.value;
                    document.getElementsByTagName("head")[0].appendChild(ss);
                    this.updateFontFamily();
                    this.loadedFonts += this.fontElement.value + ",";
                },
                updateFontFamily : function()
                {   
                    $(this.previewElement).setStyle({ fontFamily: this.fontElement.value });
                }
            }
            googleFontPreview = new googleFontPreviewModel'.$id.'();
        </script>
        ';
        return $html;
    }
}