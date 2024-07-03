<?php

namespace App\Http\Controllers\Front\Chat;

use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;
use App\Http\Controllers\Controller;

class ChatController extends Controller
{

    public function index()
    {
        return view('front.pages.chat');
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:255',
        ]);
        $message = $request->input('message');
        $messages = [
            ['role' => 'user', 'content' => $message],
        ];

        try {
            $result = OpenAI::chat()->create([
                'model' => 'gpt-3.5-turbo',
                'messages' => $messages,
            ]);

            return response()->json(['success' => true, 'message' => $result->choices[0]->message->content], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }
}
