<?php 
//http://localhost/journey/traverses_linked_list.php?list=[%22apple%22,%22orange%22,%22tree%22,%22sky%22,%22house%22]
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


if (isset($_GET['list'])) {
    if (strlen($_GET['list']) > 0) {
        $list = json_decode($_GET['list'], true);
        $linkedList = new LinkedList();
        foreach ($list as $value) {
            $linkedList->add_node($value);
        }
        $filtered = $linkedList->traverse_filter();
        $response = [
            "states" => "1",
            "filtered_values" => $filtered
        ];
        echo json_encode($response);
    } else {
        $response = [
            "states" => "0",
            "message" => "please provide a valid list"
        ];
        echo json_encode($response);
    }
}

