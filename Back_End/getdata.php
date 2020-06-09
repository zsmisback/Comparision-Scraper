<?php

if($_SERVER['REQUEST_METHOD'] == "POST")
{ getcricketerdata($_POST['cricketer1'],$_POST['cricketcountry1']);
  ob_clean();
  getcricketerdata($_POST['cricketer2'],$_POST['cricketcountry2']);}	

function getcricketerdata($playername,$playercountry)
{

include('config.php');
  
include_once('simple_html_dom.php');

$_POST['cricketer1'] = $playername;
$_POST['cricketcountry1'] = $playercountry;

$starttest= 0;
          $startodi = 0;
          $startt20is = 0;
		  $startfirst = 0;
		  $startlist = 0;
		  $startt20s = 0;
		  
		  $starttest2= 0;
$startodi2 = 0;
$startt20is2 = 0;
$startfirst2 = 0;
$startlist2 = 0;
$startt20s2 = 0;
		  
$cricket1 = "";

$error = "";

  
    $cricket1 = $db->real_escape_string($playername);
	
	$crickcountry1 = $playercountry;
	
	
	if(empty($cricket1))
	{
		$error = "Please fill in the fields";
		
	}
	if(preg_match('/[^a-z\s-]/i',$cricket1))
	{
		$error = "Please only input letters or white spaces";
	}
	if(empty($error))
	{
		$cricketerinp1 = str_replace(' ','+',$cricket1);
		
		$crickinp1 = strtolower($cricketerinp1);
		
		$search_query = $crickinp1;
		
		$cricketcountryarray = $crickcountry1;
		
        
       	   
		   
         $se = $db->real_escape_string($search_query);
         $ch = curl_init();
         curl_setopt($ch,CURLOPT_URL,"http://search.espncricinfo.com/ci/content/player/search.html?search=$se&x=0&y=0");
         curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
         curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
         $response = curl_exec($ch);
         $html = new simple_html_dom();
         $html->load($response);
		 
		
			   
              
		   
		   
        foreach($html->find("a[href^=/$cricketcountryarray]") as $link)
		{
			
		}
		if(!$link->href)
			{
				echo "<script>alert(This player does not exist in the database);</script>";
			}
		else
		{			
		  $getlink = $link->href;
		  
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
		 
		 
		 for($j = $starttest+1;$j<=$startodi;$j++)
		 {
			 $test[] = $list2[$j]->plaintext;
			 
			 
			
		 }
		 for($k = $startodi+1;$k<=$startt20is;$k++)
		 {
			 $odi[] = $list2[$k]->plaintext;
			 
			 
			
		 }
		 for($l = $startt20is+1;$l<=$startfirst;$l++)
		 {
			 $t20i[] = $list2[$l]->plaintext;
			 
			 
			
		 }
		 for($m = $startfirst+1;$m<=$startlist;$m++)
		 {
			 $first_c[] = $list2[$m]->plaintext;
			 
			 
			
		 }
		 for($n = $startlist+1;$n<=$startt20s;$n++)
		 {
			 $list_a[] = $list2[$n]->plaintext;
			 
			 
			
		 }
		 for($o = $startt20s+1;$o<=90;$o++)
		 {
			 $t20[] = $list2[$o]->plaintext;
			 
			 
			
		 }
		   for($s=90;$s<174;$s++)
         {
             		
                               					
	        
		 
		   if($list2[$s]->plaintext === "Tests")
		   {
			   
			   $starttest2 = $s;
			   
		   }
		   if($list2[$s]->plaintext === "ODIs")
		   {
			   
			   $startodi2 = $s;
			   
		   }
		   if($list2[$s]->plaintext === "T20Is")
		   {
			   
			   $startt20is2 = $s;
			   
		   }
		   if($list2[$s]->plaintext === "First-class")
		   {
			   
			   $startfirst2 = $s;
			   
		   }
		   if($list2[$s]->plaintext === "List A")
		   {
			   
			   $startlist2 = $s;
			  
		   }
		   if($list2[$s]->plaintext === "T20s")
		   {
			   
			   $startt20s2 = $s;
			   
		   }
		   
		   
		   
			
	     }
		 
		 
		 for($t = $starttest2+1;$t<=$startodi2;$t++)
		 {
			 $test2[] = $list2[$t]->plaintext;
			 
			 
			
		 }
		 for($u = $startodi2+1;$u<=$startt20is2;$u++)
		 {
			 $odi2[] = $list2[$u]->plaintext;
			 
			 
			
		 }
		 for($v = $startt20is2+1;$v<=$startfirst2;$v++)
		 {
			 $t20i2[] = $list2[$v]->plaintext;
			 
			 
			
		 }
		 for($w = $startfirst2+1;$w<=$startlist2;$w++)
		 {
			 $first_c2[] = $list2[$w]->plaintext;
			 
			 
			
		 }
		 for($x = $startlist2+1;$x<=$startt20s2;$x++)
		 {
			 $list_a2[] = $list2[$x]->plaintext;
			 
			 
			
		 }
		 for($y = $startt20s2+1;$y<=174;$y++)
		 {
			 $t202[] = $list2[$y]->plaintext;
			 
			 
			
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
			   if($r == sizeof($test2))
			   {
				   
				 
				 break;
				 continue;
			   }
			   if($r == sizeof($odi2))
			   {
				   
				 
				 break;
				 continue;
			   }
			   if($r == sizeof($t20i2))
			   {
				   
				 
				 break;
				 continue;
			   }
			   if($r == sizeof($first_c2))
			   {
				   
				 
				 break;
				 continue;
			   }
			   if($r == sizeof($list_a2))
			   {
				   
				 
				 break;
				 continue;
			   }
			   if($r == sizeof($t202))
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
			   
			   $inserttest2 = $test2[$r];
			   $insertodi2 = $odi2[$r];
			   $insertt20i2 = $t20i2[$r];
			   $insertfirst_c2 = $first_c2[$r];
			   $insertlist_a2 = $list_a2[$r];
			   $insertt202 = $t202[$r];
			  
			   
			   
			   $sql = "INSERT INTO battingdata(Search_query,Tests,ODIs,T20IS,First_class,List_A,T20s)VALUES('$se','$inserttest','$insertodi','$insertt20i','$insertfirst_c','$insertlist_a','$insertt20')";
			   $result = $db->query($sql);
			   
			   $sql2 = "INSERT INTO bowlingdata(Search_query,Tests,ODIs,T20IS,First_class,List_A,T20s)VALUES('$se','$inserttest2','$insertodi2','$insertt20i2','$insertfirst_c2','$insertlist_a2','$insertt202')";
			   $result2 = $db->query($sql2);
			   
			   echo "<script>alert(Success);</script>";
			}
		     
		   
  
        
	  
         
        
		 
		}
         
        

       }
	   
	  
				   
			    
	   
			
	     
			
			
	}




















?>