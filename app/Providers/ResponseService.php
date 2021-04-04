<?php

class ResponseService {

    public function response($success) {
        return ['success' => $success, 'status' => $success ? 'Error' : 'OK'];
    }

}