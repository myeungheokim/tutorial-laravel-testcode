<?php
/**
 * Created by PhpStorm.
 * User: kim6515516
 * Date: 2022-09-12
 * Time: 21:08
 */

namespace Tests\Unit\Services;


use App\Services\BoardService;
use Carbon\Carbon;
use Tests\TestCase;

class BoardServiceEventTest extends TestCase
{
    /** 09월 11일 이전까지는 10을 리턴해야한다.  */
    public function testEventBefore0911()
    {
        // Given
        // 작성하시오

        // When
        $service = new BoardService();
        $value = $service->event();

        // Then
        // 작성하시오
    }

    /** 09월 11일 이후부터 30을 리턴해야한다.  */
    public function testEventAfter0911()
    {
        // Given
        // 작성하시오

        // When
        $service = new BoardService();
        $value = $service->event();

        // Then
        // 작성하시오
    }

    // 힌트
    //$now = Carbon::create(2022, 9, 13)->endOfDay();
    //Carbon::setTestNow($now);
}
