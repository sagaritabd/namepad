<?php
$hint=$_GET['hint'];
if(!empty($hint)){



$marriam_synonyms=array();
$url='https://www.dictionaryapi.com/api/v3/references/thesaurus/json/'.$hint.'?key=7ae373cc-ad0a-4436-bea8-933d23614299';
        
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$data = curl_exec($ch);
$info = curl_getinfo($ch);
curl_close($ch);
            
if ($info['http_code'] == 200) {
   //   print_r($data);
  $result = json_decode($data, true);

 
 // echo "Number of lists: ".count($result["response"])."<br>";
 // print_r($result);
//echo $result['meta']['sense'];
  foreach ($result as $value) {
   //   echo $value->tuuid;
       if(empty($value['meta']['syns'])){$marriam_synonyms=''; }else{
       foreach ($value['meta']['syns'] as $stem){
            foreach($stem as $syns){
//       echo $syns."<br>";}}
               
                if((strlen($syns))<8){
 
                    array_push($marriam_synonyms,$syns);
               
                        }
                
       }}


 
  
  }}
  
  
  
//}

} else echo "Http Error: ".$info['http_code'];

 








$apikey = "PFd8uZTfuiIwNktrqzDT"; // NOTE: replace test_only with your own key
$word = $hint; // any word
$language = "en_US"; // you can use: en_US, es_ES, de_DE, fr_FR, it_IT
$endpoint = "http://thesaurus.altervista.org/thesaurus/v1"; 


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "$endpoint?word=".urlencode($word)."&language=$language&key=$apikey&output=json");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$data = curl_exec($ch);
$info = curl_getinfo($ch);
curl_close($ch); 


$altavista_synonyms=array();

if ($info['http_code'] == 200) {
  $result = json_decode($data, true);
     if(empty($value['meta']['syns'])){$altavista_synonyms=''; }else{
 // echo "Number of lists: ".count($result["response"])."<br>";
  foreach ($result["response"] as $value) {
  $x= $value["list"]["synonyms"];
     $x = substr($x, 0, strpos($x, "("));
            if((strlen($x))<18){
               if(strpos($x,'|') !== false ){
                    $y=explode("|",$x);
                   
                   // print_r($y);
                    foreach($y as $z){
                        array_push($altavista_synonyms,$z);
                     
                    }
                 
                } elseif(strpos($x,' ') !==false){ 
            
                    $y=explode(" ",$x);
                   
                   // print_r($y);
                    foreach($y as $z){
                        array_push($altavista_synonyms,$z);
                     
                    }
                }else{
                    
                    
                    
                    
                    
                    array_push($altavista_synonyms,$x);}
                        }
    
    
     }}

} else echo "Http Error: ".$info['http_code'];
echo"<br/>";






//print_r($altavista_synonyms);
// print_r($marriam_synonyms);











$global_prefix=["eco","river","beauty","sound", "earth","smart","star","lead","value","Wise","Rapid","sky","easy","global","Deep","Machine","global","care","next","Mega","block","cyber","prime","Gate","drop","Micro","Fast","super","Insta","Advanced","simple","true","Lake","central", "digital","growth","business","urban","hyper", "AI", "reliable", "data", "domain", "media", "photo", "baby", "green","life", "capital", "After","shadow","strike" ];
$global_suffix=["design","spot","box", "rocket","wave","solution","hack","team","Light","nation","drop","focus","heaven","box","loop","gram","code","park","network","core","chain","token","media","fashion","jet", "planet","hub", "soft", "powered", "tech", "options", "academy","suggest", "street","ocean", "cloud", "store", "talent","junkie","pal","dom","ville","knight","nite","lite","saga","stone","glory","valley","glory","ninja","guru","club","legend","surfer","hero","master","land","strike","force","dunk","storm","fever","quest","shadow"];
$word_suffix=['ly','x','y','pa','la','ma','der','co','fy','ster','suggest','plex','mark',"spire",'logy','nomics','nomist','options','pick','versity','verse','dish','tive','fold','point','ject',"chemy","point","craft","through","mula","catch","plore",'think','pros','sign','pose','cover','vent','print','gram','pool','vise'];
$suffix2=['ed','os','eum','erly','ulla','ix','ify','ic','io','a'];


//$prefix_or_suffix;


$root_word=$hint;
$root_word_global_prefix=array();
foreach($global_prefix as $p){
   array_push($root_word_global_prefix,$p.$root_word);
}


$root_word_global_suffix=array();
foreach($global_suffix as $p){
   array_push($root_word_global_suffix,$root_word.$p);
}



$root_word_no_vowel_at_last=array();
foreach($word_suffix as $p){
      array_push($root_word_no_vowel_at_last,$root_word.$p);
   //   if()
}

$root_word_with_voewl_suffix2=array();

foreach($suffix2 as $s){
    if(substr($root_word,-1)=='a' or substr($root_word,-1)=='e' or substr($root_word,-1)=='i'or substr($root_word,-1)=='o' or substr($root_word,-1)=='u'){
       // $last_pos=strlen($rootword);
        
           $root_word = substr($root_word, 0, -1); // returns "de"     
    }
    
   // $rest = substr("abcdef", -3, -1); // returns "de"
    array_push($root_word_with_voewl_suffix2,$root_word.$s);
}






//print_r($altavista_synonyms);
// print_r($marriam_synonyms);


//echo $names;




$root_word_with_voewl_suffix2;
$root_word_no_vowel_at_last;
$root_word_global_prefix;
$root_word_global_suffix;

        

?>
<style type="text/css">
    
    body{
        background-color:#848282;
        text-align: center;
    }
        .recommendation1{
        background-color:#203a20;
        
        margin-left: 5%;
        width:90%;
        height:100px;
        padding-top:50px;
        font-family: "Comic Sans";
        font-size: 42px;
        text-align: center;

        color:white;
    }
   
    .recommendation{
        background-color:#e74d02;
        width:95%;
        margin-left:1%;
        height:100px;
        padding-top:50px;
        font-family: "Comic Sans";
        font-size: 42px;
        text-align: center;
                color:white;
        display:block;
         float:left;
    }
    
     .recommendation h5{
       font-size: 80px;
margin-top: -33px;
    }
    
    .recommendation h6{
        font-size:35px;
        margin-top: -8px;
    }
    
    .brandables{
        background-color:#848282;
        height:auto;
        width:90%;
        margin: auto;
        text-align: center;
        float:left;
        margin-left: 4%;
    }
    .inside_brandable{
         
         width:105%;
      
         
    
         background-color:#848282;
    }
   
    .name_label{
        width:17%;
        height:60px;
        margin:15px;
             text-align: center;
             background-color: #eaeaea;
     font-size: 18px;
      border: 3px solid;
        background:white;
        padding-bottom:10px;
        float:left;
       border-radius: 5px;
    }
    .name_label:hover{
         box-shadow: 5px 10px 18px orange;
         font-size: 19px;
        background-image: linear-gradient(#ff8e62, #ff9b6f);
    }
</style>
<body>
    <div class="recommendation1">
        <?php
        function check_next($i,$short_names){
    if($i==count($short_names)){
        echo "No available short domains were found";
    }
    else{ 
        $i=$i+1;
        if(checkdnsrr($short_names[$i], 'ANY')){
            check_next($i);
        }else
             echo "We found <b>".$short_names[$i].".com</b> which is still an unregistered domain";
        
    }
}
        $short_names=array("google","duxud","jicij", "luqul", "qivec","fohab","kezaj","wagoc","veduf","dujro","dulcu","jodgu","jovri","jutgi","kugma","lugka","nalpu","nevni","nodmu","pujco","pujnu","rudvi","rujme","sujmo","vofno","zarma");

    $i=0;
    if (checkdnsrr($short_names[$i].'.com', 'ANY') ) {
        check_next($i,$short_names);
    }
    else {
    
            echo "We found ".$short_names[$i].".com which is still an unregistered domain";

    }

        ?>
    </div>
    
<?php

$fonts = array("Helvetica", "Arial", "Comic Sans", "Tahoma");

shuffle($fonts);
$randomFont = array_shift($fonts); ?>
<div class="brandables" ><div class="inside_brandable">
        <div class="recommendation">
            <h5>Name as the Industry Leader</h5></div>
 <?php  


 function random_color_part() {
    return str_pad( dechex( mt_rand( 0, 90 ) ), 2, '0', STR_PAD_LEFT);
}

function random_color() {
    return random_color_part() . random_color_part() . random_color_part();
}
 function random_background_part() {
    return str_pad( dechex( mt_rand( 180, 255 ) ), 2, '0', STR_PAD_LEFT);
}

function random_background() {
    return random_background_part() . random_background_part() . random_background_part();
}

//echo random_color();
    $brandables=$root_word_no_vowel_at_last;
    foreach($brandables as $names){
        $font_style=array("normal","italic");
$font_weight=array("normal","bold");
         shuffle($font_weight);
        $random_weight=array_shift($font_weight);
         shuffle($font_style);
        $random_style=array_shift($font_style);
        $random_background=random_background();
        $random_color=random_color();
     echo"<div class='name_label' style='border-color:#".$random_color.";background-color:#".$random_background.";font-weight=".$random_weight.";font-style:".$random_style."'>";
        echo "<h4 style='font-family:".$randomFont.";color:#".$random_color.";'>".$names."</h4>";
        $fonts = array("Helvetica", "Arial", "Comic Sans", "Tahoma");
        shuffle($fonts);
        $randomFont = array_shift($fonts); 
       
    echo"</div>";
        
    }
    
    ?>
        
        
        
        
    </div></div><div class="gap"> </div>
    
    
    
    
<div class="brandables" ><div class="inside_brandable">
             <div class="recommendation">
                 <h5>Utilize the Classic Naming Pattern</h5></div>
 <?php  




//echo random_color();
    $brandables=$root_word_global_prefix;
    foreach($brandables as $names){
         $font_style=array("normal","italic");
$font_weight=array("normal","bold");
         shuffle($font_weight);
        $random_weight=array_shift($font_weight);
         shuffle($font_style);
        $random_style=array_shift($font_style);
             $random_background=random_background();
        $random_color=random_color();
    echo"<div class='name_label' style='border-color:#".$random_color.";background-color:#".$random_background.";font-weight=".$random_weight.";font-style:".$random_style."'>";
        echo "<h4 style='font-family:".$randomFont.";color:#".$random_color.";'>".$names."</h4>";
        $fonts = array("Helvetica", "Arial", "Comic Sans", "Tahoma");
        shuffle($fonts);
        $randomFont = array_shift($fonts); 
    echo"</div>";
        
    }
    
    ?>
        
        
        
        
    </div></div>
<div class="brandables" ><div class="inside_brandable">
             <div class="recommendation">
                 <h5>Some More Ideas</h5></div>
 <?php  




//echo random_color();
    $brandables=$root_word_global_suffix;
    foreach($brandables as $names){
         $font_style=array("normal","italic");
$font_weight=array("normal","bold");
         shuffle($font_weight);
        $random_weight=array_shift($font_weight);
         shuffle($font_style);
        $random_style=array_shift($font_style);
             $random_background=random_background();
        $random_color=random_color();
    echo"<div class='name_label' style='border-color:#".$random_color.";background-color:#".$random_background.";font-weight=".$random_weight.";font-style:".$random_style."'>";
        echo "<h4 style='font-family:".$randomFont.";color:#".$random_color.";'>".$names."</h4>";
        $fonts = array("Helvetica", "Arial", "Comic Sans", "Tahoma");
        shuffle($fonts);
        $randomFont = array_shift($fonts); 
    echo"</div>";
        
    }
    
    ?>
        
        
        
        
    </div></div>
    <div class="brandables" ><div class="inside_brandable">  <div class="recommendation">
                <h5>And More</h5></div>
 <?php  




//echo random_color();
    $brandables=$root_word_with_voewl_suffix2;
    foreach($brandables as $names){
         $font_style=array("normal","italic");
$font_weight=array("normal","bold");
         shuffle($font_weight);
        $random_weight=array_shift($font_weight);
         shuffle($font_style);
        $random_style=array_shift($font_style);
             $random_background=random_background();
        $random_color=random_color();
     echo"<div class='name_label' style='border-color:#".$random_color.";background-color:#".$random_background.";font-weight=".$random_weight.";font-style:".$random_style."'>";
        echo "<h4 style='font-family:".$randomFont.";color:#".$random_color.";'>".$names."</h4>";
        $fonts = array("Helvetica", "Arial", "Comic Sans", "Tahoma");
        shuffle($fonts);
        $randomFont = array_shift($fonts); 
    echo"</div>";
        
    }
    
    ?>
        
        
        
        
    </div></div>
      <?php     $brandables=$altavista_synonyms;
    if(!empty($brandables)){ ?>
     <div class="brandables" ><div class="inside_brandable">  <div class="recommendation">
                <h6>We also Found Some Synonyms . Run Namezard by clicking on them</h6></div>
 <?php  





    $brandables=$altavista_synonyms;
   foreach (array_keys($brandables, '') as $key) {
    unset($brandables[$key]);
}
    foreach($brandables as $names){
         $font_style=array("normal","italic");
$font_weight=array("normal","bold");
         shuffle($font_weight);
        $random_weight=array_shift($font_weight);
         shuffle($font_style);
        $random_style=array_shift($font_style);
             $random_background=random_background();
   //     print_r($names);
        $random_color=random_color();
        echo'<a href="https://namezard.itplugin.com/get_names.php?hint='.$names.'">';
   echo"<div class='name_label' style='border-color:#".$random_color.";background-color:#".$random_background.";font-weight=".$random_weight.";font-style:".$random_style."'>";
        echo "<h4 style='font-family:".$randomFont.";color:#".$random_color.";'>".$names."</h4>";
        $fonts = array("Helvetica", "Arial", "Comic Sans", "Tahoma");
        shuffle($fonts);
        $randomFont = array_shift($fonts); 
    echo"</div></a>";
        
    }} else { ?> 
          <div class="brandables" ><div class="inside_brandable">  <div class="recommendation">
                      <h5>We couldnt find any synonyms</h5></div> <?php
    }
    
    ?>
        
        
        
        
    </div></div>
    
    <?php     $brandables=$marriam_synonyms;
    if(!empty($brandables)){ ?>
     <div class="brandables" ><div class="inside_brandable">  <div class="recommendation">
                <h6>Here's a list of some related words. Run namezard by clicking on the names you like</h6></div>
 <?php  






    foreach($brandables as $names){
         $font_style=array("normal","italic");
$font_weight=array("normal","bold");
         shuffle($font_weight);
        $random_weight=array_shift($font_weight);
         shuffle($font_style);
        $random_style=array_shift($font_style);
             $random_background=random_background();
   //     print_r($names);
        $random_color=random_color();
        echo'<a href="https://namezard.itplugin.com/get_names.php?hint='.$names.'">';
    echo"<div class='name_label' style='border-color:#".$random_color.";background-color:#".$random_background.";font-weight=".$random_weight.";font-style:".$random_style."'>";
        echo "<h4 style='font-family:".$randomFont.";color:#".$random_color.";'>".$names."</h4>";
        $fonts = array("Helvetica", "Arial", "Comic Sans", "Tahoma");
        shuffle($fonts);
        $randomFont = array_shift($fonts); 
    echo"</div></a>";
        
    }} else { ?> 
          <div class="brandables" ><div class="inside_brandable">  <div class="recommendation">
                      <h5>We couldnt find any related words </h5></div> <?php
    }
    
    ?>
        
        
        
        
    </div></div>
    
    
</body>

<?php }else{
    header('Location: http://namezard.itplugin.com');
} ?>
