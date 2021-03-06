<?php
/**
 * Openwriter Cartmart
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Magento Team
 * that is bundled with this package of Openwriter.
 * =================================================================
 *                 MAGENTO EDITION USAGE NOTICE
 * =================================================================
 * This package designed for Magento COMMUNITY edition
 * Contact us Support does not guarantee correct work of this package
 * on any other Magento edition except Magento COMMUNITY edition.
 * =================================================================
 * 
 * @category    Openwriter
 * @package     Openwriter_Cartmart
**/
class Openwriter_Cartmart_Block_Adminhtml_Prooftype_Grid extends Mage_Adminhtml_Block_Widget_Grid {    

    public function __construct() {
        parent::__construct();
        $this->setId('prooftypeGrid');
        $this->setDefaultSort('entity_id');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
    }   

    protected function _prepareCollection() {
        $collection = Mage::getModel('cartmart/prooftype')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns() {
        $this->addColumn('entity_id', array(
            'header' => Mage::helper('adminhtml')->__('ID'),
            'align' => 'right',
            'width' => '50px',
            'index' => 'entity_id',
        ));

        $this->addColumn('name', array(
            'header' => Mage::helper('adminhtml')->__('Name'),
            'align' => 'left',
            'index' => 'name',
        ));       

        $this->addColumn('status', array(
            'header' => Mage::helper('adminhtml')->__('Status'),
            'align' => 'left',
            'index' => 'status',
            'width' => '90px',
            'type' => 'options',
            'options' => array(
                1 => Mage::helper('adminhtml')->__('Enabled'),
                0 => Mage::helper('adminhtml')->__('Disabled'),
            ),
        ));

        return parent::_prepareColumns();
    }

    /**
     * Row click url
     *
     * @return string
     */
    public function getRowUrl($row) {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }

}

?>
