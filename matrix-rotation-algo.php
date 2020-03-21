<?php

function matrixRotation($matrix, $r) {
    // get size of row and column
    $m = count($matrix) - 1;
    $n = count($matrix[0]) - 1;

    // looping each data
    for( $i=0; $i<=$m; $i++ ){
        for( $j=0; $j<=$n; $j++ ){

            // get depth level by all spacing
            $deptLevel = min( $i, ($m - $i), $j, ($n - $j));

            $outTop = $deptLevel;
            $outLeft = $deptLevel;
            $outBottom = $m - $deptLevel;
            $outRight = $n - $deptLevel;

            $rowIdx = $i;
            $colIdx = $j; 

            // rotate step
            $maxStep = $r % ((($m-($deptLevel*2)) * 2) + (($n-($deptLevel*2))*2));

            for($step = 0; $step < $maxStep; $step++){
                // goto left one step
                if( $rowIdx == $outTop && $colIdx > $outLeft ) $colIdx--;
                // goto bottom one step
                else if( $colIdx == $outLeft && $rowIdx < $outBottom ) $rowIdx++;
                // goto right one step
                else if( $rowIdx == $outBottom && $colIdx < $outRight ) $colIdx++;
                // goto top one step
                else if( $colIdx == $outRight && $rowIdx > $outTop ) $rowIdx--;
            }

            if( ! isset($newMatrix[$rowIdx]) ) $newMatrix[$rowIdx] = [];
            $newMatrix[$rowIdx][$colIdx] = $matrix[$i][$j];
        }
        // print PHP_EOL;
    } 

    for($i=0; $i<=$m; $i++){
        for($j=0; $j<=$n; $j++){
            print $newMatrix[$i][$j] . ' ';
        }
        print PHP_EOL;
    }
}