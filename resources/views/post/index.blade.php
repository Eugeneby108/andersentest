
@extends('layouts.app')
@section('content')
<form class="form-horizontal" role="form">
          <div class="form-group row add">
            <label class="control-label col-sm-2" for="name">Name :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="name" name="name"
              placeholder="Your Name Here">
              <p class="error text-center alert alert-danger hidden"></p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="email">Email :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="email" name="email"
              placeholder="Your Email Here">
              <p class="error text-center alert alert-danger hidden"></p>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="message">Message :</label>
            <div class="col-sm-10">
              <textarea type="text" class="form-control" id="message" name="message"
              placeholder="Your Message Here"></textarea>
              <p class="error text-center alert alert-danger hidden"></p>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-warning" type="submit" id="add">
              <span class="glyphicon glyphicon-plus"></span>Submit
            </button>
          </div>
        </form>

<form>
  <div class="table table-responsive" >
    <table class="table table-bordered" id="table">
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Message</th>
        <th>Create Date</th> 
      </tr>
      {{ csrf_field() }}
      
      @foreach ($post as $value)
        <tr class="post{{$value->id}}">
          <td>{{ $value->name }}</td>
          <td>{{ $value->email }}</td>
          <td>{{ $value->message }}</td>
          <td>{{ $value->created_at }}</td>  
        </tr>
      @endforeach
    </table>
  </div>
</div>
@endsection
