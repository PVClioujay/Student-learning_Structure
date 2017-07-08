@extends("~layout")

@section("content")
    <div class="formWrapper">
        <form method="post" id="myfrom" action="/posterManage">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="UserName">帳號</label>
                <input type="text" class="form-control" name="username" id="UserName" placeholder="Name">
            </div>
            <div class="form-group">
                <label for="UserName">密碼</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="password">
            </div>
            <button type="submit" class="btn btn-primary" id="submit" onclick="submit()">送出</button>
            <a href="/createUser">Don't have account?</a>
        </form>
    </div>
    <style>
        body {
            background: url({{asset("images/weather.png")}});
            background-size: cover;
        }

        .formWrapper {
            width: 400px;
            background-color: rgba(0,0,0,0.3);
            margin: 25% auto;
            border-radius: 5px;
        }

        .formWrapper form {
            padding: 15px;
        }

        .formWrapper form label {
            color: white;
        }

        .formWrapper form button {
            width: 368px;
        }

        .formWrapper form a{
            color: white;
        }
    </style>

    <script>
        const form = document.querySelector('#myform');
        let formData = new FormData(form);

        function submit(){
            alert(formData.get("UserName"));
        }

    </script>
@endsection


