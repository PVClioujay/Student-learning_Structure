@extends("~layout")

@section("content")
    <div class="formWrapper">
        <form action="/register" id="registForm" method="post">
        {{ csrf_field() }}
            <div class="form-group">
                <label for="username">User Name:</label>
                <input type="text" class="form-control" id="username" aria-describedby="username" name="username" placeholder="User Name" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" aria-describedby="pasword" name="passwd" placeholder="Password" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" aria-describedby="email" name="email" placeholder="email" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <style>
        .formWrapper {
            width: 400px;
            margin: 15% auto;
        }
        .form-group input[type=radio]{
            margin: 0px 10px;
        }
    </style>
    <script>
        $("#registForm").validate();
    </script>
@endsection