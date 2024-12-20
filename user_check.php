<?php

class Users
{
    public $email;
    public $password;

    public function __construct($optional) {
        $this->email = $optional['email'];
        $this->password = $optional['password'];
    }

    function check_password()
    {
        $password = $this->password ;
        if (strlen($password) >= 12) {
            if (preg_match('/[A-Z]/', $password)) {
                if (preg_match('/[a-z]/', $password)) {
                    if (preg_match('/[^A-Za-z0-9]/', $password)) {
                        return [
                            "states" => "1",
                            "messages" => 'your password is good  '
                        ];
                    } else {
                        return [
                            "states" => "0",
                            "messages" => 'your password must have 1 special char  '
                        ];
                    }
                } else {
                    return [
                        "states" => "0",
                        "messages" => 'your password must have 1 lower case '
                    ];
                }
            } else {
                return [
                    "states" => "0",
                    "messages" => 'your password must have 1 upper case '
                ];
            }
        } else {
            return [
                "states" => "0",
                "messages" => 'your password must be more than 12 characters'
            ];
        }
    }

    function validate_email(){
        $email = $this->email;
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            return [
                "states" => "1",
                "messages" => 'good email '
            ];

        }
        return [
            "states" => "0",
            "messages" => 'your email is not correct format '
        ];

    }

    function copy_with($optional = []){
        return new Users($optional);
    }
}
