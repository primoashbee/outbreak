<?php
  require __DIR__ . '/vendor/autoload.php';

  $options = array(
    'cluster' => 'ap1',
    'useTLS' => true
  );
  $pusher = new Pusher\Pusher(
    '21ce5477f6d4ba94c932',
    '8c2262865eca4ce3a395',
    '746357',
    $options
  );
  if(isset($_POST['text'])){
    require 'config.php';
    $data = addslashes($_POST['text']);
    $sql = "Insert into messages (message) values('$data')";
    mysqli_query($conn,$sql);
    $id = mysqli_insert_id($conn);

    $sql ="Select * from messages where id ='$id'";
    $data = mysqli_fetch_assoc(mysqli_query($conn,$sql));
    $pusher->trigger('my-channel', 'my-event', $data);
  }
  
?>
<!DOCTYPE html>
<head>
  <title>Pusher Test</title>
  <script src="https://js.pusher.com/4.4/pusher.min.js"></script>
 
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('21ce5477f6d4ba94c932', {
      cluster: 'ap1',
      forceTLS: true
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      console.log(data);
    });
  </script>
</head>
<body>
  <h1>Realtime Sending</h1>
   <form action ="pusher.php" method="POST">
   <textarea type="text" id="text" name="text" rows = "3" cols="50">
  </textarea> <br>
   <button id="btnSubmit">Send</button>
  </form>

</body>
 <script src="assets/js/vue.js"></script>