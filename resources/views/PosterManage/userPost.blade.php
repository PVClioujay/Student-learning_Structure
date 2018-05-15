@extends("~layout")

@section("content")
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="postWrapper">
    <div class="addPoster">
        <a class="btn btn-primary" onclick="openDialog()">Add Poster</a>
    </div>
    <div class="clearfix"></div>
    <table class="table table-striped">
        <thead>
            <tr>
            <th>#</th>
            <th>Post</th>
            <th>Poster</th>
            </tr>
        </thead>
        <tbody>
            @php
                $postItem = 0;
            @endphp
            @foreach($posts as $post)
                <tr>
                    <th scope="row"> {{ $postItem += 1 }} </th>
                    <td> {{ $post->post }} </td>
                    <td> {{ $post->name }} </td>
                    <td>
                        @if($post->user_id == $userId)
                            <span class="glyphicon glyphicon-trash" onclick="del({{ $post->id }})"></span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<?php
    // print_r($posts);
?>
<div id="dialog-form" title="Create Post">
    <textarea name="postText" class="form-control" id="post_text"></textarea>
</div>
<script>

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})

$("#dialog-form").dialog({
    autoOpen: false,
    height: 190,
    width: 400,
    modal: true,
    buttons: {
        "Submit": submit,
        Cancel: function () {
            $("#post_text").val("");
            $(this).dialog("close");
        }
    },
    close: function () {
        $("#post_text").val("");
        $(this).dialog("close");
    }
});

function submit(){
    $.ajax({
        method: 'POST',
        url: '/addPost',
        data: {
            'post': $("#post_text").val(),
            'user_id': {{ $userId }}
        }
    }).done((e)=>{
        console.log(e);
        $("#dialog-form").dialog("close");
        location.reload();
    }).fail((error)=>{
        console.log(error);
    }).always((msg)=>{
        console.log(msg);
    })
}

function del(postId){
    // console.log(userId);
    $.ajax({
        type: 'DELETE',
        url: '/del',
        data: {
            'post': postId
        }
    }).done((e)=>{
        console.log(e);
    }).fail((error)=>{
        console.log(error);
    }).always((msg)=>{
        console.log(msg);
    })
}

function openDialog() {
    $("#dialog-form").dialog("open");
}
</script>
@endsection
