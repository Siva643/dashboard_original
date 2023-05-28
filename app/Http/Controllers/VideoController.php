<?php

namespace App\Http\Controllers;

use App\Models\Information;
use App\Models\User;
use App\Models\VideoView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class VideoController extends Controller
{
    public function videoView(Request $request)
    {
        $videoId = $request->videoId;

        if (blank($videoId)) {
            return response()->json([
                "success" => false,
                "message" => "Video Id missing"
            ]);
        }

        $user = $request->user();

        $video = VideoView::where("user_id", $user->id)
                    ->where("video_id", $videoId)
                    ->first();
                
        if (!blank($video)) {
            $video->state = 1;
            $video->state();
        } else {
            VideoView::create([
                "user_id" => $user->id,
                "video_id" => $videoId
            ]);
        }

        return response()->json([
            "success" => true,
            "message" => "Done"
        ]);
    }

    public function videoEnded(Request $request)
    {
        $videoId = $request->videoId;

        if (blank($videoId)) {
            return response()->json([
                "success" => false,
                "message" => "Video Id missing"
            ]);
        }

        $user = $request->user();

        $video = VideoView::where("user_id", $user->id)
                    ->where("video_id", $videoId)
                    ->first();

        if (!blank($video)) {
            return response()->json([
                "success" => false,
                "message" => "Video not found"
            ]);
        }

        $video->state = 0;
        $video->state();

        return response()->json([
            "success" => true,
            "message" => "Done"
        ]);
    }

    public function viewCount()
    {
        $active_lines = VideoView::whereState(1)->count();

        $live_streams = VideoView::count();

        $login_count = Information::first()->login_count;

        return response()->json([
            "success" => true,
            "message" => "Views count",
            "active_lines" => $active_lines,
            "live_streams" => $live_streams,
            "login_count" => $login_count,
        ]);
    }
}
