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

         $records = getDiseasesCountPer7Days($year);

         if(count($records) > 0){


      ?>
      var myConfig = {
         "type":"line",
          "title": {
	"text": "As of <?=todayForHumans()?>"
},
           "crosshair-x":{
             "scale-label":{
               "text":"%l"
             }
           },
           "scale-x":{
             "labels":["<?=lineGraphXLabel(7)?>","<?=lineGraphXLabel(6)?>","<?=lineGraphXLabel(5)?>","<?=lineGraphXLabel(4)?>","<?=lineGraphXLabel(3)?>","<?=lineGraphXLabel(2)?>","<?=lineGraphXLabel(1)?>"],
             
           },
           "plot":{
             "tooltip":{
               "visible":false
             }
           },
         "legend":{
             
         },  
         "series":[
            <?php foreach ($records as $k => $v) {?>
            {
               "values":[
                      <?=$v['7']?>,
                      <?=$v['6']?>,
                      <?=$v['5']?>,
                      <?=$v['4']?>,
                      <?=$v['3']?>,
                      <?=$v['2']?>,
                      <?=$v['1']?>],
               "text"  :'<?=$v['name']?>'
            },
            <?php 
            }
            ?> 
         ]};
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
               "text":"%l"
             }
           },
           "scale-x":{
             "labels":["<?=lineGraphXLabel(7)?>","<?=lineGraphXLabel(6)?>","<?=lineGraphXLabel(5)?>","<?=lineGraphXLabel(4)?>","<?=lineGraphXLabel(3)?>","<?=lineGraphXLabel(2)?>","<?=lineGraphXLabel(1)?>"],
             
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
            "values":[0,0,0,0,0,0,0],
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