@extends('layouts.master')
@section('title', 'Register')

@section('content')
<form action="{{ url('register_post') }}" method="post">
  @csrf
  <div class="form-group">
      <label for="exampleInputEmail1">name</label>
      <input name="name" type="text" class="form-control" value="{{ old('name') }}" id="exampleInputEmail1" aria-describedby="emailHelp" required>
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    {{ $errors->first('name') }}
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input name="email" type="email" class="form-control" value="{{ old('email') }}" id="exampleInputEmail1" aria-describedby="emailHelp" onblur="duplicateEmail(this.value) required">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <span class="duplicate_message">{{ $errors->first('email') }}</span>

    {{ $errors->first('email') }}
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input name="password" type="password" class="form-control" id="exampleInputPassword1" required>
    </div>
    {{ $errors->first('password') }}
    
    <div class="form-group">
      <label for="exampleInputPassword1">Confirm Password</label>
      <input name="confirm_password" type="password" class="form-control" id="exampleInputPassword1">
    </div>
    {{ $errors->first('password') }}
    <div class="form-group form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <p>
        <a href="{{ url('forget-password') }}">Forget password</a>
        <a href="{{ url('/') }}">Sign in</a>
    </p>
  </form>













  <script type="text/javascript">
    function duplicateEmail(element){
      var email = $(element).val();
      $.ajax({
        type: "POST",
        url: '{{ url('checkemail') }}',
        data: {
          email: email,
          _token: "{{ csrf_token() }}"
        },
        dataType: "json",
        success: function(res){
          if(res.exists){
            $('.duplicate_message').html("That Email is takem , try another");
          }else{
            $(".duplicate_message").html("");
          },
        }
        error:function(jqXHR, exception){

        }
      })
    }
  </script>











  @endsection