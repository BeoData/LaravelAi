@extends('layouts.app')

 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h1>Questionz & Answerz</h1>
                    <div class="row">
                        @foreach ($questions as $question)

    
 
                        <div class="col-md-12 mb-4">
                            <div class="card">
                                <div class="card-body">
                                  
                                    {{-- <h2 class="card-title">  {{ ucfirst($question->question ) }}</h2> --}}
                                    <div class="card-text">
                                        <div class="auto-size-textareas" spellcheck="false"> {!! html_entity_decode($question->answer ) !!}</div>
<br>
<div>
   
</div>
                                      
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

 
<style>
    .auto-size-textarea {
        width: 100%;
        height: auto;
        resize: none;
        border: none;
        outline: none;
        overflow: hidden;
    }

    /* Remove vertical scrollbar */
    .auto-size-textarea::-webkit-scrollbar {
        width: 0.5em;
    }

    .auto-size-textarea::-webkit-scrollbar-thumb {
        background-color: #888;
    }

    .auto-size-textarea::-webkit-scrollbar-thumb:hover {
        background-color: #555;
    }
    pre {
      background-color: #f5f5f5;
      padding: 10px;
      font-family: Consolas, monospace;
    }
    code, pre {
    font-family: Söhne Mono,Monaco,Andale Mono,Ubuntu Mono,monospace!important;
}
.prose :where(pre):not(:where([class~=not-prose] *)) {
    background-color: #cb1d1d;
    border-radius: 0.375rem;
    color: currentColor;
    font-size: .875em;
    font-weight: 400;
    line-height: 1.7142857;
    margin: 0;
    overflow-x: auto;
    padding: 0;
}

.chat-response {
    background-color: #f5f5f5;
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 10px;
    font-family: Arial, sans-serif;
}

.chat-response code {
    background-color: #f8f8f8;
    padding: 2px 4px;
    color: #333;
    font-family: Consolas, Monaco, 'Courier New', monospace;
}

.chat-response pre {
    margin: 0;
    overflow-x: auto;
}

</style>
 


 
<script>
    function autoSizeAll() {
        const textareas = document.querySelectorAll('.auto-size-textarea');
        textareas.forEach(textarea => autoSize(textarea));
    }

    function autoSize(textarea) {
        textarea.style.height = 'auto';
        textarea.style.height = textarea.scrollHeight + 'px';
    }

    document.addEventListener('DOMContentLoaded', autoSizeAll);

</script>
 