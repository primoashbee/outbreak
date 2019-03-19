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
   <script>
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

         $records = getDiseasesCountPerWeek($year);

         if(count($records) > 0){


      ?>
      var myConfig = {
         "type":"line",
         "title": {
	"text": "As of <?=todayForHumans()?>"
},
           "crosshair-x":{
             "scale-label":{
               "text":"%l <?=$year?>"
             }
           },
           "scale-x":{
             "labels":["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31","32","33","34","35","36","37","38","39","40","41","42","43","44","45","46","47","48","49","50","51","52"],
             
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
               "values":["<?=$v['1']?>","<?=$v['2']?>","<?=$v['3']?>","<?=$v['4']?>","<?=$v['5']?>","<?=$v['6']?>","<?=$v['7']?>","<?=$v['8']?>","<?=$v['9']?>","<?=$v['10']?>","<?=$v['11']?>","<?=$v['12']?>","<?=$v['13']?>","<?=$v['14']?>","<?=$v['15']?>","<?=$v['16']?>","<?=$v['17']?>","<?=$v['18']?>","<?=$v['19']?>","<?=$v['20']?>","<?=$v['21']?>","<?=$v['22']?>","<?=$v['23']?>","<?=$v['24']?>","<?=$v['25']?>","<?=$v['26']?>","<?=$v['27']?>","<?=$v['28']?>","<?=$v['29']?>","<?=$v['30']?>","<?=$v['31']?>","<?=$v['32']?>","<?=$v['33']?>","<?=$v['34']?>","<?=$v['35']?>","<?=$v['36']?>","<?=$v['37']?>","<?=$v['38']?>","<?=$v['39']?>","<?=$v['40']?>","<?=$v['41']?>","<?=$v['42']?>","<?=$v['43']?>","<?=$v['44']?>","<?=$v['45']?>","<?=$v['46']?>","<?=$v['47']?>","<?=$v['48']?>","<?=$v['49']?>","<?=$v['50']?>","<?=$v['51']?>","<?=$v['52']?>"],
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
               "text":"%l <?=$year?>"
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