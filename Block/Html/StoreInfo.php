<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Liftmode\CustomBlocks\Block\Html;

/**
 * Html page header block
 *
 * @api
 * @since 100.0.2
 */
class StoreInfo extends \Magento\Framework\View\Element\Template
{
    /**
    * Retrieve phone text
    *
    * @return string
    */
    public function getPhone()
    {
        if (empty($this->_data['phone'])) {
            $this->_data['phone'] = $this->_scopeConfig->getValue(
                'general/store_information/phone',
                \Magento\Store\Model\ScopeInterface::SCOPE_STORE
            );
        }
        return __($this->_data['phone']);
    }


    /**
    * Retrieve email text
    *
    * @return string
    */
    public function getEmail()
    {
        if (empty($this->_data['email'])) {
            $this->_data['email'] = $this->_scopeConfig->getValue(
                'trans_email/ident_general/email',
                \Magento\Store\Model\ScopeInterface::SCOPE_STORE
            );
        }
        return __($this->_data['email']);
    }


    /**
    * Retrieve street text
    *
    * @return string
    */
    public function getStreet(int $id = 1)
    {
        $key = 'street' . $id;
        if (empty($this->_data[$key])) {
            $this->_data[$key] = $this->_scopeConfig->getValue(
                'general/store_information/street_line' . $id,
                \Magento\Store\Model\ScopeInterface::SCOPE_STORE
            );
        }
        return __($this->_data[$key]);
    }

    /**
    * Retrieve city text
    *
    * @return string
    */
    public function getCity()
    {
        if (empty($this->_data['city'])) {
            $this->_data['city'] = $this->_scopeConfig->getValue(
                'general/store_information/city',
                \Magento\Store\Model\ScopeInterface::SCOPE_STORE
            );
        }
        return __($this->_data['city']);
    }


    /**
    * Retrieve postcode text
    *
    * @return string
    */
    public function getPostcode()
    {
        if (empty($this->_data['postcode'])) {
            $this->_data['postcode'] = $this->_scopeConfig->getValue(
                'general/store_information/postcode',
                \Magento\Store\Model\ScopeInterface::SCOPE_STORE
            );
        }
        return __($this->_data['postcode']);
    }


    /**
    * Retrieve Region text
    *
    * @return string
    */
    public function getRegion()
    {
        if (empty($this->_data['region'])) {
            $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
            $region_id = $this->_scopeConfig->getValue(
                'general/store_information/region_id',
                \Magento\Store\Model\ScopeInterface::SCOPE_STORE
            );
            $region = $objectManager->create('Magento\Directory\Model\Region')
                        ->load($region_id);

            $this->_data['region'] =  $region->getCode();
        }
        return __($this->_data['region']);
    }

    /**
    * Retrieve store name text
    *
    * @return string
    */
    public function getStoreName()
    {
        if (empty($this->_data['storename'])) {
            $this->_data['storename'] = $this->_scopeConfig->getValue(
                'general/store_information/name',
                \Magento\Store\Model\ScopeInterface::SCOPE_STORE
            );
        }
        return __($this->_data['storename']);
    }
}
