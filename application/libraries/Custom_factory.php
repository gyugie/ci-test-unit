<?php 

/**
 * Part of ci-phpunit-test
 *
 * @author     Mugi <https://github.com/gyugie>
 * @license    MIT License
 * @copyright  2020 Mugi
 * @link       https://github.com/gyugie/ci-test-unit
 * @link	   https://github.com/fzaninotto/Faker documentations faker 
 */

include APPPATH.'/third_party/faker/autoload.php';

class CustomFactory {

    protected $CI;
    protected $faker;

    function __construct() {
      $this->CI     =& get_instance();
      $this->faker  = Faker\Factory::create();
    }
    
    /**
     * faker user can create dummy user
     * @param $param custom field or value
     * 
     * @return array 
     */
    function faker_user($param = [] ) {
        $password = password_hash("secret password", PASSWORD_DEFAULT);

        $payload = [
                "username"              => $this->faker->name,
                "password"              => $password,
                "password_confirmation"	=> $password,
                "email"		            => $this->faker->email
            ];

        return array_merge($payload, $param);
    }

    
  }

