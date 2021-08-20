<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AndersenTest</title>

    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    
  </head>
  <body>

<div class="container">
  @yield('content')
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript">


  $("#add").click(function() {
    $.ajax({
      type: 'POST',
      url: 'addPost',
      data: {
        '_token': $('input[name=_token]').val(),
        'name': $('input[name=name]').val(),
        'email': $('input[name=email]').val(),
        'message': $('textarea[name=message]').val()
      },
      success: function(data){
        if ((data.errors)) {
          $('.error').removeClass('hidden');
          $('.error').text(data.errors.name);
          $('.error').text(data.errors.email);
          $('.error').text(data.errors.message);
        } else {
          $('.error').remove();
          $('#table').append(
          "<td>" + data.name + "</td>"+
          "<td>" + data.email + "</td>"+
          "<td>" + data.message + "</td>"+
          "<td>" + data.created_at + "</td>"+
          "</tr>");
        }
      },
    });
    $('#name').val('');
    $('#email').val('');
    $('#message').val('');
  });


</script>
  </body>
</html>