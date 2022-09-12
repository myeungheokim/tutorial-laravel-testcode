<?php
/**
 * Created by PhpStorm.
 * User: kim6515516
 * Date: 2022-09-12
 * Time: 21:08
 */

namespace Tests\Unit\Services;


use App\Models\User;
use App\Services\BoardService;
use Tests\TestCase;

/**
 * 비지니스 로직을 검증하는 테스트코드를 작성한다.
 */

class BoardServiceTest extends TestCase
{

    public function testStore()
    {
        // Given
        $mockUser = User::create([
            'name' => 'mockUser',
            'email' => 'aaa@aaa.com',
            'password' => 'password'
        ]);

        $params = [
            "title" => "postTitle",
            "content" => "PostContent",
            "user_id" => $mockUser->id
        ];

        // When
        $service = new BoardService();
        $response = $service->store($params);

        // Then
        $this->assertNull($response);
        $this->assertDatabaseHas('boards', ['title' => 'postTitle']);
    }
}
