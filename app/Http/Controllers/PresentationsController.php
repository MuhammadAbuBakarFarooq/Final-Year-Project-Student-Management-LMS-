<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presentations;
use App\Models\CoodinatorController;
use App\Models\Faculty;
use App\Scheduled_presentation;
use Illuminate\Support\Facades\DB;
use DateTime;
use DateInterval;
use DatePeriod;

class PresentationsController extends Controller
{

	protected $fiteness;
	protected $gene;
	protected $chromosome;
	protected $checkGroup;

	
	public function index(Request $request)
	{

		$start = $request->start_date;
		$end = $request->end_date;
		$presentation_name = $request->presentation_name;

		if ($start>$end) {
			 $request->session()->put('prst', 'Please Enter Valid Date');
            return redirect()->action('CoodinatorController@view_scheduled_presentations');
		}

		$start    = new DateTime($start);
		$end      = new DateTime($end);

		$interval = DateInterval::createFromDateString('1 day');
		$period   = new DatePeriod($start, $interval, $end);
		$gene = array();
		$temp_gene = array();
		$countdb = 0;

		foreach ($period as $dt)
		{
			$getDay = $dt->format("l");
			
			$fTime = $dt->format("Y-m-d");

			$fTime = date('d F, Y', strtotime($fTime));

			$group	=	DB::table('Presentations')->where([
				['group_avail', '=',0],['Supervisor_avail', '=', 0],['CoOrdinator_avail', '=', 0],['day', '=', $getDay],])->get();

			foreach ($group as $row) {

				$gid = $row->group_Id;
				$lecture = $row->lecture_Slot;
				$day = $row->day;
				$date = $fTime;

			// $facultyCount = DB::table('Faculty')
			// ->where([
			// 	['lecture_Slot', '=',$lecture],['day', '=', $day],['availiblity', '=', 0],])
			// ->distinct('faculty_id')->count('faculty_id');

			// if ($facultyCount >= 0) {
				$gene[$countdb][0] = $gid;
				$gene[$countdb][1] = $lecture;
				$gene[$countdb][2] = $day;
				$gene[$countdb][3] = $date;
				$countdb++;
			// }

			}
			
		}
		
		
		
		$groupCount = DB::table('Presentations')->distinct('group_Id')->count('group_Id');
		$temp_gene = $gene;
		$chromosomes =  array();
		for ($j=0; $j < 200; $j++) {
			$gene_count = 0;
			$chromosome = array();
			$temp_gene = $gene;
			
			do{
				$p = mt_rand(0,sizeof($temp_gene)-1);
				
				if (sizeof($chromosome) == 0) {

					$chromosome[$gene_count][0] = $temp_gene[$p][0];
					$chromosome[$gene_count][1] = $temp_gene[$p][1];
					$chromosome[$gene_count][2] = $temp_gene[$p][2];
					$chromosome[$gene_count][3] = $temp_gene[$p][3];
					$gene_count++;
					unset($temp_gene[$p]);
					$temp_gene = array_values (array_filter($temp_gene));
				}
				else 
				{
					$c =  self::checkGroup($chromosome, $temp_gene[$p][0]);	
					if ($c == 1) {
					$chromosome[$gene_count][0] = $temp_gene[$p][0];
					$chromosome[$gene_count][1] = $temp_gene[$p][1];
					$chromosome[$gene_count][2] = $temp_gene[$p][2];        		
					$chromosome[$gene_count][3] = $temp_gene[$p][3];        		
					$gene_count++;
					unset($temp_gene[$p]);
					$temp_gene = array_values (array_filter($temp_gene));

					if (sizeof($temp_gene)==0) {
						break;
					}
					}				
				}

			} while (sizeof($chromosome)< $groupCount);

			// $chromosome = self::sortChromo($chromosome);
			$chromosomes[$j] = $chromosome;
			// echo "<pre>";
			// print_r($chromosomes);
		}

		for ($r=0; $r < 100; $r++) { 

			$fit = array();
			$tempFit =array();
			for ($f=0; $f < sizeof($chromosomes) ; $f++) { 
				$fitness = self::fitenessFunc($chromosomes[$f]);
				if ($fitness == 0) {

					$df = $chromosomes[$f];
					
					// echo "okay ".$fitness;

					// $df = self::weeklyDivision($df);
					
					return view('presentations')->with('df',$df)->with('presentation_name',$presentation_name);
				}
				else {
					if ($f == 0) {
						$fit[0] = $chromosomes[0];
						$tempFit[0] = $fitness;
					}
					else {
						if ((sizeof($fit) == 1)) {
							$fit[1] = $chromosomes[$f];
							$tempFit[1] = $fitness;
						}
						elseif (sizeof($fit) == 2) {
							if ($fitness < $tempFit[0]) {
								$fit[0] = $chromosomes[$f];
								$tempFit[0] = $fitness;
							}
							elseif ($fitness < $tempFit[1]) {
								$fit[1] = $chromosomes[$f];
								$tempFit[1] = $fitness;
							}
						}	
					}
				}		
			}

			$a = mt_rand(0,sizeof($fit)-1);
			$b = mt_rand(0,sizeof($fit)-1);

			if ($a == $b) {
				while ($a==$b) {
					$b = mt_rand(0,sizeof($fit)-1);
				}
			}
			$crossover = self::crossOver($fit[$a],$fit[$b]);
			$sizeChromo = sizeof($chromosomes);
			$tempCrossOver = self::mutation($crossover[0]);
			$tempCrossOver1 = self::mutation($crossover[1]);

			$chromosomes[$sizeChromo] = $tempCrossOver;
			$chromosomes[$sizeChromo+1] = $tempCrossOver1;
			
			$chromosomes = self::discardBadChromosome($chromosomes);
			$chromosomes = self::discardBadChromosome($chromosomes);
			
		}

		$df = $fit[0];


		// echo"<pre>";
		// print_r(self::fitenessFunc($df));
              $request->session()->put('prst', 'Presentations cannot be Scheduled during this period please extend the period');
            return redirect()->action('CoodinatorController@view_scheduled_presentations');

		
		// $df = self::weeklyDivision($df);
		
	  return view('presentations')->with('df',$df)->with('presentation_name',$presentation_name);
	}

	public function checkGroup(array $chromosome, int $key)
	{
		for ($i=0; $i < sizeof($chromosome); $i++) { 
			if ($chromosome[$i][0] == $key) {
				return -1;
			}
		}
		return 1;
	}

	public function sortChromo(array $chromosome){

		$sortedChromo = array();
		$count=0;
		$singleArr = array(); 
		for ($f=0; $f < sizeof($chromosome) ; $f++) { 
			$singleArr[$f] = $chromosome[$f][0]; 
		}
		sort($singleArr);

		$c = 0;
		for ($j=0; $j < sizeof($chromosome) ; $j++){
			for ($i=0; $i < sizeof($chromosome) ; $i++) { 
				if ($singleArr[$j] == $chromosome[$i][0]) {

					$sortedChromo[$j][0] = $chromosome[$i][0];
					$sortedChromo[$j][1] = $chromosome[$i][1];
					$sortedChromo[$j][2] = $chromosome[$i][2];
					$sortedChromo[$j][3] = $chromosome[$i][3];

				}
			}

		}
		return $sortedChromo;
	}

	public function fitenessFunc(array $chromosomes){

		$fitness = 0;
		$size = (sizeof($chromosomes))/2;
		$int_cast = (int)$size;

		// $fitness = $fitness+(self::presentationsPerDay($chromosomes));

		for ($i=0; $i <= sizeof($chromosomes)-1 ; $i++) { 
			$tempG = $chromosomes[$i][0];
			$tempL = $chromosomes[$i][1];
			$tempD = $chromosomes[$i][2];
			$tempDate = $chromosomes[$i][3];

			for ($j=$i+1; $j < (sizeof($chromosomes)); $j++) { 
				$tempGi = $chromosomes[$j][0];
				$tempLe = $chromosomes[$j][1];
				$tempDa = $chromosomes[$j][2];
				$tempDt = $chromosomes[$j][3];
				
				if ($tempL == $tempLe && $tempD == $tempDa && $tempDate == $tempDt) {
					$fitness = $fitness+1;	
				}//clashes chek

				if ($tempG == $tempGi) {
					$fitness = $fitness+10;	
				}//group repitations check
			}
		}
		return $fitness;
	}

	public function crossOver(array $chromosome1, array $chromosome2){

		$offspring1= array();
		$offspring2= array();

		$crossoverRate = 3;

		$size = (sizeof($chromosome1))/$crossoverRate;
		$int_cast = (int)$size;
		$tempCount = $int_cast;

		for ($i=0; $i < $int_cast ; $i++) { 
			$offspring1[$i][0]=$chromosome1[$i][0];
			$offspring1[$i][1]=$chromosome1[$i][1];
			$offspring1[$i][2]=$chromosome1[$i][2];
			$offspring1[$i][3]=$chromosome1[$i][3];

			$offspring2[$i][0]=$chromosome2[$i][0];
			$offspring2[$i][1]=$chromosome2[$i][1];
			$offspring2[$i][2]=$chromosome2[$i][2];
			$offspring2[$i][3]=$chromosome2[$i][3];

		}

		for ($i=$int_cast; $i < sizeof($chromosome1) ; $i++) { 
			$offspring1[$i][0]=$chromosome2[$i][0];
			$offspring1[$i][1]=$chromosome2[$i][1];
			$offspring1[$i][2]=$chromosome2[$i][2];
			$offspring1[$i][3]=$chromosome2[$i][3];

			$offspring2[$i][0]=$chromosome1[$i][0];
			$offspring2[$i][1]=$chromosome1[$i][1];
			$offspring2[$i][2]=$chromosome1[$i][2];
			$offspring2[$i][3]=$chromosome1[$i][3];
		}

		$chromo = array();
		$chromo[0] =  $offspring1;
		$chromo[1] = $offspring2;
		return $chromo;
	}

	public function mutation(array $chromosome)
	{
		$mutationRate = 150;

		for ($i=0; $i < $mutationRate; $i++) { 
			
			$a = mt_rand(0,sizeof($chromosome)-1);
			$b = mt_rand(0,sizeof($chromosome)-1);

			if ($a == $b) {
				while ($a==$b) {
					$b = mt_rand(0,sizeof($chromosome)-1);
				}
			}

			$tempGeneI = $chromosome[$a][0];
			$tempGeneL = $chromosome[$a][1];
			$tempGeneD = $chromosome[$a][2];
			$tempGeneDt = $chromosome[$a][3];
			
			$chromosome[$a][0] = $chromosome[$b][0];
			$chromosome[$a][1] = $chromosome[$b][1];
			$chromosome[$a][2] = $chromosome[$b][2];
			$chromosome[$a][3] = $chromosome[$b][3];

			$chromosome[$b][0] = $tempGeneI;
			$chromosome[$b][1] = $tempGeneL;
			$chromosome[$b][2] = $tempGeneD;
			$chromosome[$b][3] = $tempGeneDt;
		}
		return $chromosome;
	}
	public function discardBadChromosome(array $chromosomes)
	{
		$fitness = 0;
		$badChromosome = 0;

		for ($i=0; $i < sizeof($chromosomes); $i++) { 

			$tempFitness = self::fitenessFunc($chromosomes[$i]);
			
			if ($i==0) {
				$badChromosome = $i;
				$fitness = $tempFitness;
			}
			else {
				if ($fitness < $tempFitness) {
					$badChromosome = $i;
					$fitness = $tempFitness;
				}
			}
		}

		unset($chromosomes[$badChromosome]);
		$chromosomes = array_values (array_filter($chromosomes));

		return $chromosomes;
	}

	// public function presentationsPerDay($chromosome)
	// {
	// 	$days = array(0,0,0,0,0,0);
	// 	$daysFitness = 0;
	// 	for ($i=0; $i < sizeof($chromosome); $i++) { 

	// 		$day = $chromosome[$i][2];

	// 		if ($day=="Monday") {
	// 			$days[0]++;
	// 		}
	// 		elseif ($day=="Tuesday") {
	// 			$days[1]++;
	// 		}
	// 		elseif ($day=="Wednesday") {
	// 			$days[2]++;
	// 		}
	// 		elseif ($day=="Thursday") {
	// 			$days[3]++;
	// 		}
	// 		elseif ($day=="Friday") {
	// 			$days[4]++;
	// 		}
	// 		elseif ($day=="Saturday") {
	// 			$days[5]++;
	// 		}
	// 	}

	// 	for ($j=0; $j < sizeof($days); $j++) { 
	// 		if ($days[$j] > 3) {
	// 			$daysFitness++;
	// 		}
	// 	}

	// 	return $daysFitness;
	// }

	public function multipleWeeks(array $chromosome, int $weekRate )
	{
		if ($weekRate < 1 || $weekRate > sizeof($chromosome)-2) {
			$weekRate = 1;
		}

		$offspring = array();
		$tempChromo = array();
		$dfc = array();
		$countT = 0;
		$ac = 0;
		
		$weekCount = 1;
		$size = (sizeof($chromosome))/$weekRate;
		$int_cast = (int)$size;
		
		for ($i=0; $i < $weekRate; $i++) { 

			for ($j=0; $j < $int_cast; $j++) { 
				$offspring[$j][0] = $chromosome[$ac][0];
				$offspring[$j][1] = $chromosome[$ac][1];
				$offspring[$j][2] = $chromosome[$ac][2];
				$offspring[$j][3] = "Week ".$weekCount;
				$ac++;
			}

			$tempChromo[$i] = $offspring;
			$weekCount++;			
		}

		for ($c=0; $c < sizeof($tempChromo); $c++) { 

			$offspring = $tempChromo[$c];

			for ($p=0; $p < sizeof($offspring); $p++) { 
				$dfc[$countT][0] = $offspring[$p][0];
				$dfc[$countT][1] = $offspring[$p][1];
				$dfc[$countT][2] = $offspring[$p][2];
				$dfc[$countT][3] = $offspring[$p][3];
				$countT++;
			}
		}

		return $dfc;
	}

	public function weeklyDivision(array $chromosome)
	{
		$r =0;
		$result = array();
		$weekCount = 1;
		$tempChromosome = $chromosome;
		

		do{
			$tempChromosome = array_values (array_filter($tempChromosome));
			$tempChromo = array();
			$counter = 0;
			$chromosome = $tempChromosome;
			$size = sizeof($chromosome);

			for ($i=0; $i < $size; $i++) { 

				$tempG = $chromosome[$i][0];
				$lecture = $chromosome[$i][1];
				$day = $chromosome[$i][2];

				if (sizeof($tempChromo) > 0) {
					$check = self::checkClash($tempChromo, $lecture, $day);
					if ($check == 1) {
						$tempChromo[$counter][0] = $tempG;
						$tempChromo[$counter][1] = $lecture;
						$tempChromo[$counter][2] = $day;
						$tempChromo[$counter][3] = "Week ".$weekCount;
						unset($tempChromosome[$i]);
						$counter++;
					}
				}
				else{
					$tempChromo[$counter][0] = $tempG;
					$tempChromo[$counter][1] = $lecture;
					$tempChromo[$counter][2] = $day;
					$tempChromo[$counter][3] = "Week ".$weekCount;
					unset($tempChromosome[$i]);
					$counter++;
				}

			}
			for ($c=0; $c < sizeof($tempChromo); $c++) { 
				$result[$r][0] = $tempChromo[$c][0];
				$result[$r][1] = $tempChromo[$c][1];
				$result[$r][2] = $tempChromo[$c][2];
				$result[$r][3] = $tempChromo[$c][3];
				$r++;
			}
			$weekCount++;	
		}while(sizeof($chromosome));
		
		return $result;
	}

	public function checkClash(array $chromosome, $lecture, $day)
	{
		$count = 0;
		for ($i=0; $i < sizeof($chromosome) ; $i++) { 
			$tempG = $chromosome[$i][0];
			$tempL = $chromosome[$i][1];
			$tempD = $chromosome[$i][2];

			if ($tempL == $lecture && $tempD == $day) {
				return -1;

			}
		}
		return 1;
	}


	


	

}