<?php 
class Node {
    public $value;
    public $next;

    public function __construct($value) {
        $this->value = $value;
        $this->next = null;
    }
}
class LinkedList {
    public $head;
    public function __construct() {
        $this->head = null;
    }
    public function add_node($value) {
        $new_node = new Node($value);
        if ($this->head === null) {
            $this->head = $new_node;
        } else {
            $current = $this->head;
            while ($current->next !== null) {
                $current = $current->next;
            }
            $current->next = $new_node;
        }
    }

}