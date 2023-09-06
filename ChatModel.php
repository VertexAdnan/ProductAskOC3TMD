<?php
class ModelChatChat extends Model
{
    public function createRoom($data)
    {
        $sql = "SELECT * FROM ec_chat WHERE `vendor_id` = '" . $data['vendor_id'] . "' AND product_id = '" . $data['product_id'] . "' LIMIT 1";
        $results = $this->db->query($sql)->row;

        if ($results) {
            return $results['room_id'];
        }

        $sql = "INSERT INTO ec_chat SET `vendor_id` = '" . $data['vendor_id'] . "', `product_id` = '" . $data['product_id'] . "', `createdat` = NOW()";
        $results = $this->db->query($sql);
        if (!$results) {
            return false;
        }

        return $this->db->getLastId();
    }

    public function getRoom($room_id){
        $sql = "SELECT ec.*, v.display_name FROM ec_chat ec LEFT JOIN oc_vendor v ON v.vendor_id = ec.vendor_id WHERE ec.`room_id` = '".$room_id."'";
        $results = $this->db->query($sql)->row;

        return $results;
    }

    public function createMessage($data)
    {
        $sql = "INSERT INTO ec_chat_messages SET `room_id` = '" . $data['room_id'] . "', `vendor_id` = '" . $data['vendor_id'] . "', `message` = '" . $this->db->escape($data['message']) . "', `createdat` = NOW()";
        $results = $this->db->query($sql);

        return $results;
    }

    public function getRooms($vendor_id)
    {
        $sql = "SELECT ch.*, p.name FROM ec_chat ch LEFT JOIN oc_product_description p ON ch.product_id = p.product_id WHERE ch.`vendor_id` = '" . $vendor_id . "' ORDER BY createdat DESC";
        return $this->db->query($sql)->rows;
    }

    public function getRoomsMyProducts($vendor_id){
        $sql = "SELECT ch.*, p.name FROM ec_chat ch LEFT JOIN oc_product_description p ON ch.product_id = p.product_id LEFT JOIN oc_vendor_to_product vtp ON vtp.product_id = p.product_id WHERE vtp.vendor_id = '".$vendor_id."'";
        $results = $this->db->query($sql)->rows;

        return $results;
    }

    public function getMessages($room_id){
        $sql = "SELECT * FROM ec_chat_messages WHERE room_id = '".$room_id."' ORDER BY createdat ASC";
        $results = $this->db->query($sql)->rows;

        return $results;
    }
}
