<?php/** * @author    Marcin Frymark * @email     contact@alekseon.com * @company   Alekseon * @website   www.alekseon.com */class Alekseon_MailTransport_Model_SentEmail extends Mage_Core_Model_Abstract{    protected $_correspondents;    public function __construct($args = array())    {		$this->_init('alekseon_mailTransport/sentEmail');    }        public function unsetData($key = null)    {        $this->_correspondents = null;        return parent::unsetData($key);    }    public function addReceipient($email, $name = null)    {        if (!is_array($email)) {            $this->_addCorrespondent(Alekseon_MailTransport_Model_SentEmail_Correspondent::TYPE_RECEIPIENT, $email, $name);        } else {            foreach ($email as $recipientName => $recipientEmail) {                $this->_addCorrespondent(Alekseon_MailTransport_Model_SentEmail_Correspondent::TYPE_RECEIPIENT, $recipientEmail, is_int($recipientName) ? '' : $recipientName);            }        }                return $this;    }        public function addBccReceipient($email, $name = null)    {        $this->_addCorrespondent(Alekseon_MailTransport_Model_SentEmail_Correspondent::TYPE_BCC, $email, $name);        return $this;    }        public function addSender($email, $name = null)    {        $this->_addCorrespondent(Alekseon_MailTransport_Model_SentEmail_Correspondent::TYPE_SENDER, $email, $name);        return $this;    }        public function getCorrespondents()    {        if (is_null($this->_correspondents)) {            $this->_correspondents = Mage::getModel('alekseon_mailTransport/sentEmail_correspondent')                                        ->getCollection()                                        ->addFieldToFilter('sentemail_id', $this->getId());        }                return $this->_correspondents;    }        protected function _beforeSave()    {        $controller =  Mage::app()->getFrontController()->getAction();        if (is_object($controller)) {            $this->setController(get_class($controller). '::' . $controller->getRequest()->getActionName());        }        return parent::_beforeSave();    }        protected function _afterSave()    {            if (null !== $this->getCorrespondents()) {            foreach($this->getCorrespondents() as $correspondent) {                if (!$correspondent->getId()) {                    $correspondent->setSentemailId($this->getId());                    $correspondent->save();                }            }        }        return parent::_afterSave();    }        protected function _addCorrespondent($type, $email, $name = null)    {        if (is_null($name)) {            $name = substr($email, 0, strpos($email, '@'));        }        $correspondent = Mage::getModel('alekseon_mailTransport/sentEmail_correspondent');        $correspondent->setType($type);        $correspondent->setName($name);        $correspondent->setEmail($email);        $this->getCorrespondents()->addItem($correspondent);        return $this;    }}