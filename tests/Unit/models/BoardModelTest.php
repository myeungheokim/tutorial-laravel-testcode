<?php
/**
 * Created by PhpStorm.
 * User: kim6515516
 * Date: 2022-09-12
 * Time: 20:14
 */

namespace Tests\Unit\models;


use App\Models\Board;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * 테스트코드 작성할때 모델 생성, 관계에 관련해서 테스트코드 작성
 */
class BoardModelTest extends TestCase
{

    use RefreshDatabase;

    /** Board 모델을 생성할 수 있다. */
    public function testCreateModel() {
        // Given
        $mockUser = User::create([
            'name' => 'mockUser',
            'email' => 'aaa@aaa.com',
            'password' => 'password'
        ]);

        // When
        /** @var Board $board */
        $board = new Board();
        $board->title = "BBBBBBBBBBBB";
        $board->content = "content";
        $board->user()->associate($mockUser);
        $board->save();

        // Then
        $board->refresh();
        $this->assertSame('BBBBBBBBBBBB', $board->title);
        $this->assertDatabaseHas('boards', ['title' => 'BBBBBBBBBBBB']);
    }

}
