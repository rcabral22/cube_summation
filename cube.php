<?php 

Class cube{
	
private $cube;
private $sum;
	
public function getCube()
{	
	return $this->cube;
}

public function setCube($x,$y,$z,$w)
{
	if ($x < 1 || $x > 100 || $y < 1 || $y > 100 || $z < 1 || $z > 100)
	{
		return 'Value for x, y and z must be an integer between 1 and 100';
	}
	if ($w < 0.000000001 || $w > 1000000000)
	{
		return 'Value for w must be a float between 0.000000001 and 1000000000';
	}
	$this->cube[$x][$y][$z]=$w;
	return '';
}

public function queryCube($i,$f){
	$this->sum=0;
		
	$x=$i[0];
	$y=$i[1];
	$z=$i[2];
	$fx=$f[0];
	$fy=$f[1];
	$fz=$f[2];

	if ($x < 1 || $x > 100 || $y < 1 || $y > 100 || $z < 1 || $z > 100 || 
		$fx < 1 || $fx > 100 || $fy < 1 || $fy > 100 || $fz < 1 || $fz > 100)
	{
		return 'Value for x, y and z must be an integer between 1 and 100';
	}
	if ($x > $fx || $y > $fy || $z > $fz)
	{
		return 'Initial values must be lower than final values';
	}
	
	for($x=$i[0];$x<=$fx;$x++)
	{
		
		for($y=$i[0];$y<=$fy;$y++){		
			for($z=$i[0];$z<=$fz;$z++)
			{
				$this->sum=$this->cube[$x][$y][$z]+$this->sum;
			}
			
		}
		
	}	
return 'Sum: '.$this->sum;
}
}

?>
