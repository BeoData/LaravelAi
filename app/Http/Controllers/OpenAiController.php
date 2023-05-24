<?php
namespace App\Http\Controllers;

use App\Models\Question;
use OpenAI\Laravel\Facades\OpenAI;
use Illuminate\Http\Request;

class OpenAiController extends Controller
{
    public function gptAi(Request $request)
    {
        if ($request->isMethod('get')) {
            $question = $request->input('textfield', '');
          

            $messages = [
                [
                    'role' => 'system',
                    'content' => 'You are a helpful assistant.'
                ]
            ];

            if (!empty($question)) {
                $messages[] = [
                    'role' => 'user',
                    'content' => $question
                ];
            }

            $result = OpenAI::chat()->create([
                'model' => 'gpt-3.5-turbo',
                'messages' => $messages
            ]);

            $answer = $result['choices'][0]['message']['content'];

            $questionModel = new Question();
            $questionModel->question = $question;
            $questionModel->answer = $answer;
            $questionModel->save();

            
            return view('gpt.ai', compact('answer'));
        } else {
            // Handle the case when the page is reloaded or refreshed
            // without submitting the form
            return view('gpt.ai');
        }
    }
}
