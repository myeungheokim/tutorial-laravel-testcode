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
use http\Exception\RuntimeException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use PHPUnit\Framework\ExpectationFailedException;
use Tests\TestCase;

/**
 * 비지니스 로직을 검증하는 테스트코드를 작성한다.
 */

class BoardServiceExceptionTest extends TestCase
{

    public function testException()
    {
        // Given
        $id = -1;

        // When && Then
        $this->expectException(ModelNotFoundException::class); // ture , flase
        $service = new BoardService();
        $response = $service->checkException($id);

    }
}
