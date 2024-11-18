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

    private function count_vowels($string) {
        $vowels = ['a', 'e', 'i', 'o', 'u'];
        $count = 0;
        for ($i = 0; $i < strlen($string); $i++) {
            if (in_array(strtolower($string[$i]), $vowels)) {
                $count++;
            }
        }
        return $count;
    }

    public function traverse_filter() {
        $current = $this->head;
        $filtered = [];
        while ($current !== null) {
            if ($this->count_vowels($current->value) === 2) {
                $filtered[] = $current->value;
            }
            $current = $current->next;
        }
        return $filtered;
    }

}