<?php

namespace App\Http\Controllers;

use App\Models\comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commets=Comment::all();
        return response()->json($commets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comment=[
            'user_id'=>auth()->user()->id,
            'content'=>$request->countent,
            'strengths'=>$request->	trengths,
            'weak_points'=>$request->weak_points,

        ];

        Comment::created($comment);
        return response()->json($comment);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          $comment=Comment::query()->find($id);
          return response()->json($comment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment=Comment::query()->findOrFail($id);
        return response()->json($comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(comment $comment,$id)
    {
        $comment->where($id);
        $comment->delete();
        return response()->json($comment);
    }

//    public function commentOffersIndex()
//    {
//        $commentOffers=Comment::all();
//        return response()->json($commentOffers);
//    }
//
//    public function commentOffersCreate()
//    {
//
//    }
//
//    public function commentOffersStore(Request $request)
//    {
//        $comment=[
//            'offers'=>$request->offers,
//        ];
//        Comment::create($comment);
//        return response()->json($comment);
//    }
//

//    public function commentOffersShow($id)
//    {
//        $commentOffers=Comment::query()->find($id);
//        return response()->json($commentOffers);
//
//    }
//    public function commentOffersEdit($id)
//    {
//        $commentOffers=Comment::query()->find($id);
//        return response()->json($commentOffers);
//    }
//    public function commentOffersUpdate(Request $request,$id)
//    {
//        $commentOffers=Comment::query()->find($id)
//        ->update([
//            'offers'=>$request->offers,
//        ]);
//
//        return response()->json($commentOffers);
//
//    }
//    public function commentOffersDelete(Request $request,$id)
//    {
//        $commentOffers=Comment::query()->find($id)
//            ->delete();
//        return response()->json($commentOffers);
//
//    }



    public function status($id,Request $request)
    {
        $status=Comment::query()->find($id);
        $status->update([
                'status'=> !$status->status ,
            ]
        );
        return response()->json($status);
    }
}
