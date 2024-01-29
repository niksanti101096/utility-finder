<?php

use CodeIgniter\Controller;
use CodeIgniter\I18n\Time;
use Config\App;

function get_report_group_by($placeholder = 'Select', $for_mysql = false) {
        $arr = [
            1 => 'User',
            2 => 'Department',
            3 => 'Order Status'
        ];

        if ($for_mysql) return $arr;

        //Using + instead of array_merge to retain array keys
        return ['' => $placeholder] + $arr;
    };

?>