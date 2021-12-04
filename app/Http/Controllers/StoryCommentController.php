<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReplyCommentRequest;
use App\Http\Requests\StoryCommentRequest;
use App\Models\Story;
use App\Models\StoryComment;
use App\Models\StoryReplyComment;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoryCommentController extends Controller
{
    public function getCommentByStory(Request $request, $storyId)
    {
        // comment
        $story = Story::find($storyId);
        $comments = StoryComment::where('story_id', $storyId)->orderBy('id', 'desc')->paginate(5);
        $linkComments = $comments
        // ->appends($parameters)
        ->links('front-ends.components.pagination');
        // end comment

         // Ajax response
         if ($request->ajax ()) {

            return response ()->json ([
                'listComments' => view("front-ends.components.comments.list-comment", ["comments" => $comments, 'story' => $story])->render(),
                'paginationComment' => $linkComments->toHtml(),
                'totalCommentStory' => $story->total_rating,
            ]);

        }
    }
    
    public function comment(StoryCommentRequest $request, $storyId)
    {
        if (!Auth::check()){
            return $request->ajax()
                ? response()->json([
                    "success" => false,
                    "status" => JsonResponse::HTTP_UNPROCESSABLE_ENTITY,
                    "message" => 'Not login',
                    "data" => [
                        'errors' => [
                            'story' => 'Not login'
                        ]
                    ]
                ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
                : new Exception("No login", JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }
        $story = Story::where('id', $storyId)->first();
        if (empty($story)){
            return $request->ajax()
            ? response()->json([
                "success" => false,
                "status" => JsonResponse::HTTP_UNPROCESSABLE_ENTITY,
                "message" => 'story not found',
                "data" => [
                    'errors' => [
                        'story' => 'story not found'
                    ]
                ]
            ],JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
            : new Exception("No find story", JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }
        
        $user = Auth::user();
        $data = $request->merge(['user_id' => $user->id, 'story_id'=>$story->id])->all();        
        $comment = StoryComment::create($data);
        $story->update([
            'total_rating' => $story->comments->count(),
            'average_rating' => $story->comments->avg('rating'),
        ]);
        return $request->ajax()
            ? response()->json([
                "success" => true,
                "status" => JsonResponse::HTTP_OK,
                "message" => 'create comment success',
                "data" => $comment->toArray(),
                
            ],JsonResponse::HTTP_OK)
            : new Exception("create comment fail", JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function replyComment(ReplyCommentRequest $request, $commentId)
    {
        if (!Auth::check()){
            return $request->ajax()
                ? response()->json([
                    "success" => false,
                    "status" => JsonResponse::HTTP_UNPROCESSABLE_ENTITY,
                    "message" => 'Not login',
                    "data" => [
                        'errors' => [
                            'story' => 'Not login'
                        ]
                    ]
                ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
                : new Exception("No login", JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }
        $comment = StoryComment::where('id', $commentId)->first();
        if (empty($comment)){
            return $request->ajax()
            ? response()->json([
                "success" => false,
                "status" => JsonResponse::HTTP_UNPROCESSABLE_ENTITY,
                "message" => 'comment not found',
                "data" => [
                    'errors' => [
                        'comment' => 'comment not found'
                    ]
                ]
            ],JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
            : new Exception("No find comment", JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }
        
        $user = Auth::user();
        $data = $request->merge(['user_id' => $user->id, 'story_comment_id'=>$comment->id])->all();        
        $replyComment = StoryReplyComment::create($data);
        return $request->ajax()
            ? response()->json([
                "success" => true,
                "status" => JsonResponse::HTTP_OK,
                "message" => 'create reply comment success',
                "data" => $replyComment->toArray(),
                
            ],JsonResponse::HTTP_OK)
            : new Exception("create reply comment fail", JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
    }
}
