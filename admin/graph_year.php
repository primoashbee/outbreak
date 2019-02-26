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

         $years = getYearsInRecords();
        //foreach ($years as $k => $v) {
           # code...
              
         $records = getDiseasesCountPerYear($year);
if(count($records) > 0){


      ?>
      var myConfig = {
         "type":"line",
           "crosshair-x":{
             "scale-label":{
               "text":"%l "
             }
           },
           "scale-x":{
             "labels":[2018,2019,2020,2021,2022,2023,2024,2025],
             
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
              foreach ($records as $k => $v) {
                # code...
             
            ?>
            {
               "values":[<?=$v['2018']?>,<?=$v['2019']?>,<?=$v['2020']?>,<?=$v['2021']?>,<?=$v['2022']?>,<?=$v['2023']?>,<?=$v['2024']?>,<?=$v['2025']?>],
               "text"  : "<?=$v['name']?>"
            },
            <?php 
            }
            ?>
          ]
        }

           
         
<?php 

}else{
?>
var myConfig = {
         "type":"line",
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