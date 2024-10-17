<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class Tally_webhook_controller extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('tally_webhook_model');
    }

    public function index_post()
    {
        $data = $this->post();
        $form_name = $data['data']['formName'];
        $count = count($data['data']['fields']);
        $temp = array();

        if ($form_name == "Get an Energy Quote") {
            for ($i=0; $i < $count; $i++) {
                if (array_key_exists('options', $data['data']['fields'][$i])) {
                    $key = array_search($data['data']['fields'][$i]['value'], array_column($data['data']['fields'][$i]['options'], 'id'));
    
                    if ($i == 0) {
                        $column = "lead_type";
                    } elseif ($i == 1) {
                        $column = "current_supplier";
                    } elseif ($i == 2) {
                        $column = "current_contract_ends";
                    } else {
                        return;
                    }
    
                    $temp[$column] = $data['data']['fields'][$i]['options'][$key]['text'];
                } else {
                    if ($i == 3) {
                        $column = "business_name";
                    } elseif ($i == 4) {
                        $column = "post_code";
                    } elseif ($i == 5) {
                        $column = "contact_name";
                    } elseif ($i == 6) {
                        $column = "email_address";
                    } elseif ($i == 7) {
                        $column = "phone_number";
                    }
                    $temp[$column] = $data['data']['fields'][$i]['value'];
                }
            }
    
            if ($temp['lead_type'] == "Electricity") {
                $temp['lead_type'] = 4;
            } elseif ($temp['lead_type'] == "Gas") {
                $temp['lead_type'] = 3;
            } elseif ($temp['lead_type'] == "Both") {
                $temp['lead_type'] = 2;
            } else {
                return;
            }

        } else {
            for ($i=0; $i < $count; $i++) {
                if (array_key_exists('options', $data['data']['fields'][$i])) {
                    $key = array_search($data['data']['fields'][$i]['value'], array_column($data['data']['fields'][$i]['options'], 'id'));
        
                    if ($i == 0) {
                        $column = "current_supplier";
                    } elseif ($i == 1) {
                        $column = "current_contract_ends";
                    } else {
                        return;
                    }
        
                    $temp[$column] = $data['data']['fields'][$i]['options'][$key]['text'];
                } else {
                    if ($i == 2) {
                        $column = "business_name";
                    } elseif ($i == 3) {
                        $column = "post_code";
                    } elseif ($i == 4) {
                        $column = "contact_name";
                    } elseif ($i == 5) {
                        $column = "email_address";
                    } elseif ($i == 6) {
                        $column = "phone_number";
                    }
                    $temp[$column] = $data['data']['fields'][$i]['value'];
                }
            }
            $temp['lead_type'] = 5; // WATER
        }

        $temp['lead_id'] = bin2hex(random_bytes(3));
        $temp['lead_source'] = "Webform";
        // $this->tally_webhook_model->post_tally_webhook($temp);
        echo json_encode($temp);
    }
}
