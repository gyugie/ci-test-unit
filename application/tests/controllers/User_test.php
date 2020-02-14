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
include APPPATH.'/libraries/Custom_factory.php';

class User_test extends TestCase
{
	protected $faker;

	public function __construct(){
        parent::__construct();
		$this->faker =  new CustomFactory;
    }
	
	public function test_user()
	{
        try {
			$output = $this->request('GET', 'users');
		} catch (CIPHPUnitTestExitException $e) {
			$output = ob_get_clean();
		}
		print_r($output);exit;
		$this->assertEquals(
			json_encode(
				['id' => 1, 'name' => 'Jim', 'email' => 'jim@example.com']
			),
			$output
		);
		$this->assertResponseCode(200);
    }	
	
	public function test_auth(){
		$payload 	= $this->faker->faker_user();
		
		$output = $this->request('POST', 'auth/login', $payload);
		$this->assertEquals(
			json_encode(
				[
					"status"    => 200,
					"message"   => "success add data",
					"data"      => $payload
				]
			),
			$output
		);
		$this->assertResponseCode(200);
	}

	
}
