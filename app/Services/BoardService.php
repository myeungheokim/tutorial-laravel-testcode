<?php
/**
 * Created by PhpStorm.
 * User: kim6515516
 * Date: 2022-09-12
 * Time: 20:44
 */

namespace App\Services;


use App\Models\Board;
use Carbon\Carbon;
use http\Exception\RuntimeException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use PHPUnit\Framework\ExpectationFailedException;

class BoardService
{
    public function all()
    {

    }

    public function store($data = []) : void
    {
        Board::create($data);
    }

    public function show(int $id) : ?Board
    {
        return null;
    }

    /**
     * 예외가 발생했는지 확인해보자
     */
    public function checkException(int $id)
    {
        if ($id < 0) {
            throw new ModelNotFoundException("test");
        } else {
            throw new ExpectationFailedException("test");
        }
    }

    /**
     * 퀴즈
     * 2022.09.10 이전에는 10을 리턴 해야 한다
     * 2022.09.10 부터 30을 리턴해야 한다.
     */
    public function event() : int
    {
        $now = Carbon::now();
        $eventDate = Carbon::create(2022, 9, 10);

        if ($eventDate->greaterThan($now)) {
            return 10;
        } else {
            return 30;
        }
    }
}
