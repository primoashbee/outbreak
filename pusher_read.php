<!DOCTYPE html>
<?php 
  
  require 'config.php';

  $sql="Select * from messages";
  $res = mysqli_fetch_all(mysqli_query($conn,$sql),MYSQLI_ASSOC);
  
?>
<head>
  <title>Pusher Test</title>
  <script src="https://js.pusher.com/4.4/pusher.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>
  <h1>Sample Realtime</h1>
  <div id="app">
    <ul v-for="message in messages">
      <li>{{message.message}}</li>
    </ul>
  </div>
</body>

 <script src="assets/js/vue.js"></script>

 <script>
     // Enable pusher logging - don't include this in production
    
    var app = new Vue({
      el:"#app",
      data: {
        messages: 
          <?=json_encode($res)?>
        
      },
      methods :{
        addMessage(data){
          this.messages.push(data)
          //console.log(data)
        }  
      }
    });

    //Pusher.logToConsole = true;
    var pusher = new Pusher('21ce5477f6d4ba94c932', {
      cluster: 'ap1',
      forceTLS: true
    });
    var channel = pusher.subscribe('my-channel');
    
    channel.bind('my-event', function(data) {
      $("#data").html(data.text);
      app.addMessage(data);
      console.log(data)
    });
    channel.bind('taga-sigaw',function(data){
      console.log("sigaw ni "+ data.text)
    })
 </script>