<?php
/**
 * Created by PhpStorm.
 * User: kim6515516
 * Date: 2022-09-12
 * Time: 20:57
 */

namespace Tests\Feature\controllers;


use App\Models\User;
use App\Services\BoardService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\MockHelper;
use Tests\TestCase;

/**
 * 테스트코드 작성시 요청에 대한 유효성 검사(벨리데이션), 인증 등을 중점으로 테스팅한다(라우팅 관련된 것들).
 */
class BoardControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testAll()
    {
        // Given
        $params = [];

        // When
        $response = $this->json('GET', "/boards", $params);

        // Then
        $response->assertStatus(200);
    }

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
        $response = $this->json('POST', "/boards", $params);

        // Then
        $response->assertStatus(201);
        $this->assertDatabaseHas('boards', ['title' => 'postTitle']);
    }

    public function testStoreMockService()
    {
        // Given
        $mockUser = MockHelper::mockUser();

        $params = [
            "title" => "postTitle",
            "content" => "PostContent",
            "user_id" => $mockUser->id
        ];

        $mockService = \Mockery::mock(BoardService::class);
        $mockService->shouldReceive('store')
            ->andReturn([]);

        $this->app->instance(BoardService::class, $mockService);

        // When
        $response = $this->json('POST', "/boards", $params);

        // Then
        $response->assertStatus(201);
        $this->assertSoftDeleted();
//        $this->assertDatabaseHas('boards', ['title' => 'postTitle']);
    }


    public function testStoreValidationSuccess()
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

        $mockService = \Mockery::mock(BoardService::class);
        $mockService->shouldReceive('store')
            ->andReturn([]);

        $this->app->instance(BoardService::class, $mockService);

        // When
        $response = $this->json('POST', "/boards", $params);

        // Then
        $response->assertStatus(201);
    }
//
    public function testStoreValidationFail()
    {
        // Given
        $params = [
            "title" => "postTitle",
            "content" => "PostContent",
//            "user_id" => 0
        ];

        $mockService = \Mockery::mock(BoardService::class);

        $mockService->shouldReceive('store')
            ->andReturn([]);

        $this->app->instance(BoardService::class, $mockService);

        // When
        $response = $this->json('POST', "/boards", $params);

        // Then
        $response->assertStatus(422);
    }

}
