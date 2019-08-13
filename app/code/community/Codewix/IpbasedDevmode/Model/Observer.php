<?php
/**
 * @package   Codewix_IPbasedDevmode
 * @author    Ravinder <codewix@gmail.com>
 */

class Codewix_IpbasedDevmode_Model_Observer {

    public function controller_action_predispatch($observer) {
        $helper = Mage::helper('ipbaseddevmode');
        if($helper->getConfig('enable')) {
            if(!empty($helper->getConfig('ip'))) {
                $ip = explode(',',$helper->getConfig('ip'));
                $userIp = $_SERVER['REMOTE_ADDR'];
                if(in_array($userIp,$ip)) {
                    Mage::setIsDeveloperMode(true);
                }
            } else {
                Mage::setIsDeveloperMode(true);
            }

        }

    }

}