@extends("~layout")
@extends("~header")
@section("content")

<div class="postWrapper">
    <div class="addPoster">
        <a class="btn btn-primary" onclick="openDialog()">Add Poster</a>
    </div>
    <div class="clearfix"></div>
    <table class="table table-striped">
        <thead>
            <tr>
            <th>#</th>
            <th>Message</th>
            <th>Poster</th>
            <th>Date Time</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td><span class="glyphicon glyphicon-share-alt"></span></td>
            </tr>
            <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
            <td><span class="glyphicon glyphicon-share-alt"></span></td>
            </tr>
            <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
            <td><span class="glyphicon glyphicon-share-alt"></span></td>
            </tr>
        </tbody>
    </table>
</div>
<div id="dialog-form" title="Create poster">
    <textarea name="postText" class="form-control" id="post_text"></textarea>
</div>
<script>
$("#dialog-form").dialog({
    autoOpen: false,
    height: 190,
    width: 400,
    modal: true,
    buttons: {
        "CreatPoster": creatPoster,
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

const Header = new Headers({
    'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
});

function creatPoster(){
    fetch("add",
        {
            headers: Header,
            method: 'post',
            body: JSON.stringify({
                postData: document.querySelector("#post_text").value
            })
        }
    ).then((response) => {
        if (response.status >= 200 && response.status < 300) {
            return response.json()
        } else {
            var error = new Error(response.statusText)
            error.response = response
            throw error
        }
    }).then((data) => {
        // success
        cconsole.log(data);
    }).catch((error) => {
        // error
        console.log('failed', error);
    }).then((errorData) => {
        console.log(errorData);
    })
}

function openDialog() {
    $("#dialog-form").dialog("open");
}
</script>
@endsection
