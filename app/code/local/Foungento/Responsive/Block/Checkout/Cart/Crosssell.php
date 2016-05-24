<?php
/**
 * Cart crosssell list
 *
 * @category   Armin
 * @package    Armin_Responsive
 * @author     Armin Core <armin.almuete@gmail.com>
 */
class Foungento_Responsive_Block_Checkout_Cart_Crosssell extends Mage_Checkout_Block_Cart_Crosssell
{
    /**
     * Items quantity will be capped to this value
     *
     * @var int
     */
    protected $_maxItemCount = 8;
}
