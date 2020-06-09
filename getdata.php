<?php

$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "users";
$starttest= 0;
          $startodi = 0;
          $startt20is = 0;
		  $startfirst = 0;
		  $startlist = 0;
		  $startt20s = 0;

$db = new mysqli($servername, $username, $password ,$dbname);


if ($db->connect_error) {
  die("Connection failed: " . $db->connect_error);

}
  
include('simple_html_dom.php');

$cricket1 = "";
$cricket2 = "";
$error = "";

if(isset($_POST['compare']))
{   
    $cricket1 = $db->real_escape_string($_POST['cricketer1']);
	$cricket2 = $db->real_escape_string($_POST['cricketer2']);
	$crickcountry1 = $_POST['cricketcountry1'];
	$crickcountry2 = $_POST['cricketcountry2'];
	
	if(empty($cricket1))
	{
		$error = "Please fill in the fields";
		
	}
	if(empty($cricket2))
	{
		$error = "Please fill in the fields";
	}
	if(preg_match('/[^a-z\s-]/i',$cricket1))
	{
		$error = "Please only input letters or white spaces";
	}
	if(preg_match('/[^a-z\s-]/i',$cricket2))
	{
		$error = "Please only input letters or white spaces";
	}
	if(empty($error))
	{
		$cricketerinp1 = str_replace(' ','+',$cricket1);
		$cricketerinp2 = str_replace(' ','+',$cricket2);
		$crickinp1 = strtolower($cricketerinp1);
		$crickinp2 = strtolower($cricketerinp2);
		$search_query = array($crickinp1,$crickinp2);
		
		$cricketcountryarray = array($crickcountry1,$crickcountry2);
		
        foreach($search_query as $search_querys)
       {  
       	   
		   $th[] = $search_querys;
         $se = $db->real_escape_string($search_querys);
         $ch = curl_init();
         curl_setopt($ch,CURLOPT_URL,"http://search.espncricinfo.com/ci/content/player/search.html?search=$se&x=0&y=0");
         curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
         curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
         $response = curl_exec($ch);
         $html = new simple_html_dom();
         $html->load($response);
		 
		 foreach($cricketcountryarray as $cricketcountryarrays)
	  {
			   
              
		   
		   
         foreach($html->find("a[href^=/$cricketcountryarrays]") as $link)
        {
			if(!$link->href)
			{
				$error = "This player does not exist/The player and the country do not match";
			}
		  $getlink = $link->href;
		     
		   
  
        }
	  }
         
          $mainlink = "espncricinfo.com$getlink";
         $ch2 = curl_init();
          curl_setopt($ch2,CURLOPT_URL,"$mainlink");
          curl_setopt($ch2,CURLOPT_FOLLOWLOCATION,1);
          curl_setopt($ch2,CURLOPT_RETURNTRANSFER,1);
          $response2 = curl_exec($ch2);

          $html2 = new simple_html_dom();
          $html2->load($response2);

          $list2 = $html2->find('td[nowrap="nowrap"]');
          $clean = $html2->find('h1',1)->plaintext;
          $c = $db->real_escape_string($clean);
          $d = str_replace('&nbsp;', '',$c);
		  
          
          
		  
		  
          for($i=0;$i<90;$i++)
         {
             		
                               					
	        
		 
		   if($list2[$i]->plaintext === "Tests")
		   {
			   
			   $starttest = $i;
			   
		   }
		   if($list2[$i]->plaintext === "ODIs")
		   {
			   
			   $startodi = $i;
			   
		   }
		   if($list2[$i]->plaintext === "T20Is")
		   {
			   
			   $startt20is = $i;
			   
		   }
		   if($list2[$i]->plaintext === "First-class")
		   {
			   
			   $startfirst = $i;
			   
		   }
		   if($list2[$i]->plaintext === "List A")
		   {
			   
			   $startlist = $i;
			  
		   }
		   if($list2[$i]->plaintext === "T20s")
		   {
			   
			   $startt20s = $i;
			   
		   }
		   
		   
		   
			
	     }
		 
		 
		 for($j = $starttest;$j<$startodi;$j++)
		 {
			 $test[] = $list2[$j]->plaintext;
			 
			 
			
		 }
		 for($k = $startodi+1;$k<$startt20is;$k++)
		 {
			 $odi[] = $list2[$k]->plaintext;
			 
			 
			
		 }
		 for($l = $startt20is+1;$l<$startfirst;$l++)
		 {
			 $t20i[] = $list2[$l]->plaintext;
			 
			 
			
		 }
		 for($m = $startfirst+1;$m<$startlist;$m++)
		 {
			 $first_c[] = $list2[$m]->plaintext;
			 
			 
			
		 }
		 for($n = $startlist+1;$n<$startt20s;$n++)
		 {
			 $list_a[] = $list2[$n]->plaintext;
			 
			 
			
		 }
		 for($o = $startt20s+1;$o<90;$o++)
		 {
			 $t20[] = $list2[$o]->plaintext;
			 
			 
			
		 }
		 
			
         
        

       }
	   
	  
				   
			    
	   for($r=0;$r<90;$r++)
			{   
		     
		       if($r == sizeof($test))
			   {
				   
				 
				 break;
				 continue;
			   }
			   if($r == sizeof($odi))
			   {
				   
				 
				 break;
				 continue;
			   }
			   if($r == sizeof($t20i))
			   {
				   
				 
				 break;
				 continue;
			   }
			   if($r == sizeof($first_c))
			   {
				   
				 
				 break;
				 continue;
			   }
			   if($r == sizeof($list_a))
			   {
				   
				 
				 break;
				 continue;
			   }
			   if($r == sizeof($t20))
			   {
				   
				 
				 break;
				 continue;
			   }
			   $inserttest = $test[$r];
			   $insertodi = $odi[$r];
			   $insertt20i = $t20i[$r];
			   $insertfirst_c = $first_c[$r];
			   $insertlist_a = $list_a[$r];
			   $insertt20 = $t20[$r];
			   
			  
			   
			   
			   $sql = "INSERT INTO fetchdatatest(Tests,ODIs,T20IS,First_class,List_A,T20s)VALUES('$inserttest','$insertodi','$insertt20i','$insertfirst_c','$insertlist_a','$insertt20')";
			   $result = $db->query($sql);
			   $error = "Success";
				
			}
			
	     
			
			
	}
}



















?>