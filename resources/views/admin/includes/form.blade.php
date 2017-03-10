<form id="admin-post-form" class="container" method="post">
    <div class="row">
        <div class="twelve column">
            @section('title')
            <h1>Admin: form</h1>
            @show
        </div>
    </div>
    <div class="row">
        <div class="six columns">
            <label for="title">Title</label>
            <input class="u-full-width edit input" name="title" type="text" id="title" value="{{ $post->title }}">
        </div>
        <div class="six columns">
            <label>&nbsp;</label>
            <div class="buttons">
                @section('formButtons')
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                @show
            </div>
        </div>
    </div>
    <div class="row">
        <div class="twelve column">
            <label for="copy">Copy</label>
            <div class="edit input textarea" id="copy" name="copy">{!!$post->copy!!}</div>
        </div>
    </div>
</form>
@section('JS')
    @parent
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
    <script>
        domReady(function(){
            tinymce.init({ selector:'textarea,.edit',  inline: true });
            document.querySelector('label[for="copy"]').onclick = function(){
                setTimeout(function() {
                    document.querySelector('#copy').focus()
                    },0);
            };
        });
    </script>
@endsection
