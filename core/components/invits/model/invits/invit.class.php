<?php
/**
 * @package invits
 */
class Invit extends xPDOSimpleObject {
    /**
     * Overrides default xPDOObject::toArray() to include the "inviter" username
     *
     * @extends xPDOObject::toArray()
     * @return array An array representation of the object fields
     */
    public function toArray() {
        $invitArray = parent::toArray();
        $invitArray['sender'] = $this->xpdo->getObject('modUser', $this->get('sender_id'))->get('username');
        return $invitArray;
    }

    /**
     * Generates a (supposedly) unique invitation code
     *
     * @return string The generated invit code
     */
    public function createCode() {
        $date = time();
        $code = md5($this->get('sender_id').$date);
        return $code;
    }

    public function isValid() {
        if ($this->get('guest_registered') == 1) {
            return false;
        }
        return true;
    }
}
?>