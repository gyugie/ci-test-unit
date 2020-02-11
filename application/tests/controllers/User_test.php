<?php
/**
 * Part of ci-phpunit-test
 *
 * @author     Mugi <https://github.com/gyugie>
 * @license    MIT License
 * @copyright  2020 Mugi
 * @link       https://github.com/gyugie/ci-test-unit
 */

class User_test extends TestCase
{
	public function test_user()
	{
        try {
			$output = $this->request('POST', 'api/users/id/1');
		} catch (CIPHPUnitTestExitException $e) {
			$output = ob_get_clean();
		}

		$this->assertEquals(
			json_encode(
				['id' => 1, 'name' => 'Jim', 'email' => 'jim@example.com']
			),
			$output
		);
		$this->assertResponseCode(200);
    }
	
}
