<?php
/**
 * @package invits
 */
class Invit extends xPDOSimpleObject {
    /**
     * @extends xPDOObject::toArray()
     * @return array An array representation of the object fields
     */
    public function toArray() {
        $invitArray = parent::toArray();
        $invitArray['sender'] = $this->xpdo->getObject('modUser', $this->get('sender_id'))->get('username');
        return $invitArray;
    }

    public function createCode() {
        //$user_id = $this->xpdo->invits->modx->user->get('id');
        $date = time();
        $code = md5($this->get('sender_id').$date);
        $this->xpdo->log(modX::LOG_LEVEL_ERROR, $code);
        return $code;
    }
}
?>