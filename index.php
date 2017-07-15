<?php
print <<<TEXT
<html>
<head>
	<title> Matrix MxN </title>
	<meta charset='utf-8'>
</head>
<body>
	<header> Построение двумерной матрицы MxN </header>
	<p> Введите целочисленные значения M и N в диапазоне [1;50]. M - число строк(rows), N - столбцов(colums).
	</p>
	<form method='get'>
	M= <input type='text' name='M' value=$m> <br>
	N= <input type='text' name='N' value='$n'><br>
	<input type='submit' value='Построить матрицу'>
	</form>
TEXT;

if (isset($_GET['M']) && isset($_GET['N']))
{
		$m = (int)$_GET['M'];		
		$n = (int)$_GET['N'];

		if($m > 0 && $n > 0 && $m <= 50 && $n <= 50) //проверка корректности ввода
		{
			echo "Двумерный массив $m x $n";
			$matrix = array();//двумерная матрица
			//генерация двумерной матрицы
			for($i = 0; $i<$m; $i++) 
			{
				$zero_position = rand(0,$n-1);//индекс нуля в текущей строке
				for($j = 0; $j < $n; $j++)
				{
					if ($j == $zero_position)
					{
						$matrix[$i][$j] = 0;
					}
					else
					{
						$not_zero = rand(1,9);
						$matrix[$i][$j] = $not_zero;
					}			
				}		
			}
			//вывод двумерной матрицы
			echo "<table>";
			foreach($matrix as $row => $numbers)
			{
				echo"<tr>";
				foreach($numbers as $index => $value)
				{
					echo "<td>$value </td>";
				}
				echo"</tr>";
			}
			echo "</table>";
		}
		else
		{
			echo "Ошибка ввода. ";
		}
}
echo "</body></html>";
?>