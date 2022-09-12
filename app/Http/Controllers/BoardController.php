<?php
/**
 * Created by PhpStorm.
 * User: kim6515516
 * Date: 2022-09-12
 * Time: 20:48
 */

namespace App\Http\Controllers;


use App\Models\Board;
use App\Services\BoardService;
use Illuminate\Http\Request;

class BoardController extends Controller
{

    /**
     * BoardController constructor.
     */
    public function __construct(BoardService $boardService)
    {
        $this->boardService = $boardService;
    }

    public function index()
    {
        return response()->json();
    }

    public function store(Request $request)
    {

        $this->boardService->store($request->all());

        return response()->json([], 201);
    }

    public function show()
    {

    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
