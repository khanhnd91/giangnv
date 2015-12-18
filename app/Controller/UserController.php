<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class UserController extends AppController {
    public function register() {
        $data = array(
            'username' => $this->request->data['username'],
            'password' => $this->request->data['password'],
            'name'     => $this->request->data['name']
        );
        echo json_encode($data);
        exit();
    }
}

