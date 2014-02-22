<?php

class Hackathon_FrontendMonitoring_Model_Observer
{
    public function modelSaveAfter(Varien_Event_Observer $observer)
    {
        $action = Mage::getModel('hackathon_frontendmonitoring/user_action');
        $action->setSessionId(Mage::getSingleton('core/session')->getSessionId());
        $action->setCustomerId(Mage::getSingleton('customer/session')->getCustomerId());
        $action->setModel(get_class($observer));
        $action->setAction('save_after');
        $action->setTimestamp(now());

        $action->save();
    }
}
