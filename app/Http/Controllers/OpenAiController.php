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
        $precustion= "act as an SEO expert publish your answer in Serbian as a well formatted html page with meta tags and keywords, the page must be fully SEO ready and according to the W3C recommendations, keywords should be separated from the answer, and the question should read like this:";

            if (!empty($question)) {
                $messages[] = [
                    'role' => 'user',
                    'content' => $precustion . $question
                ];
            }
            else{
                $messages[] = [
                    'role' => 'user',
                    'content' => "This is just a test"
                ];
            }

            $result = OpenAI::chat()->create([
               // 'model' => 'gpt-3.5-turbo',
                'model' => 'gpt-3.5-turbo-0301',
                'messages' => $messages
            ]);

            $answer = $result['choices'][0]['message']['content'];

            $questionModel = new Question();
            $questionModel->question = $question;
            $questionModel->answer = htmlentities($answer);
            $questionModel->save();

            
            return view('gpt.ai', compact('answer'));
        } else {
            // Handle the case when the page is reloaded or refreshed
            // without submitting the form
            return view('gpt.ai');
        }
    }
}
