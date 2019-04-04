<!DOCTYPE html>
<html>
   <head>
      <script src= "https://cdn.zingchart.com/zingchart.min.js"></script>
      <script> zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
      ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9","ee6b7db5b51705a13dc2339db3edaf6d"];</script></head>
   <body>
      <input type="hidden" name="year" id="year" class="form-control" placeholder="enter year">
      <div id='myChart'></div>
   </body>
    <script src="https://js.pusher.com/4.4/pusher.min.js"></script>
    <script>
    //Pusher.logToConsole = true;
    var pusher = new Pusher('21ce5477f6d4ba94c932', {
      cluster: 'ap1',
      forceTLS: true
    });
    var channel = pusher.subscribe('my-channel');
     channel.bind('record.create', function(data) {
      location.reload()
     })
      var x = [];
      var year = 2019;
      <?php  

         require "../config.php";
       
         $year = 2019;
         if(isset($_GET['year'])){
         ?>

         
         year = <?php echo $year = $_GET['year'] ?> ;
         document.getElementById('year').value = year;
         <?php
         }

         $years = getYearsInRecordsForGraph();
        //foreach ($years as $k => $v) {
           # code...

         $records = getDiseasesCountPerYear();
if(count($records) > 0){


      ?>
      var myConfig = {
         "type":"line",
          "title": {
	"text": "As of <?=todayForHumans()?>"
},
           "crosshair-x":{
             "scale-label":{
               "text":"%l "
             }
           },
           "scale-x":{
             "labels":[<?php 
                $ctr = 1;
                foreach ($years as $k => $v) {
                if($ctr==count($years)){
                 ?><?=$v['year']?><?php
                }else{
                  ?> 
                  <?=$v['year']?>,
                  <?php
                }
                $ctr++;
                }
              ?>],
             
           },
           "plot":{
             "tooltip":{
               "visible":false
             }
           },
         "legend":{
             
         },  
         "series":[
         <?php 
          foreach ($records as $key => $value) {
            
          
         ?>
   {
              "values": [<?php for ($i=1; $i <= count($years) ; $i++) { 
              if($i==count($years)){
              ?><?=$value[$i]?><?php
              }else{
              ?><?=$value[$i]?>,<?php
              }
              }?>],
              "text"  : "<?=$value[0]?>"
            },
          <?php } ?>
]
        }

           
         
<?php 

}else{
?>
var myConfig = {
         "type":"line",
          "title": {
	"text": "As of <?=todayForHumans()?>"
},
           "crosshair-x":{
             "scale-label":{
               "text":"%l "
             }
           },
           "scale-x":{
             "labels":["January","February","March","April","May","June","July","August","September","October","November","December"],
             
           },
           "plot":{
             "tooltip":{
               "visible":false
             }
           },
         "legend":{
             
         },  
         "series":[
          <?php 

            $diseases = getDiseases();
            $total = count($diseases);
            foreach($diseases as $k => $v){
          ?>{
            "values":[0,0,0,0,0,0,0,0,0,0,0,0],
            "text": "<?=$v['name']?>"
            },
            <?php } ?>]};
<?php 

}
?>
 
zingchart.render({ 
   id : 'myChart', 
   data : myConfig, 
   height: 450, 
   width: "100%" 
});</script>
</html>