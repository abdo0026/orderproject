<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class partone extends Controller
{
    
    public function segregate(&$arr, $size){
        $j = 0;
        for ($i = 0; $i < $size; $i++) {
            if ($arr[$i] <= 0) {
                $temp;
                $temp = $arr[$i];
                $arr[$i] = $arr[$j];
                $arr[$j] = $temp;
                // increment count of non-positive
                // integers
                $j++;
            }
        }
  
        return $j;
    }


    public function findMissingPositive($arr, $size)
    {
            for ($i = 0; $i < $size; $i++) {
                $x = abs($arr[$i]);
                if ($x - 1 < $size && $arr[$x - 1] > 0){
                    $arr[$x - 1] = -$arr[$x - 1];
                }
            }
      
            // Return the first index value at which
            // is positive
            for ($i = 0; $i < $size; $i++){
                if ($arr[$i] > 0){
                    return $i + 1; // 1 is added because indexes
                }
            }
      
            return $size + 1;
    }

    public function smallestpositive(Request $request){
        $arr_values = $request->arr_values;
        $arr = array_map('intval', $arr_values);
        $size = count($arr);

        $shift = $this->segregate($arr, $size);
        $arr2 = [];
        $j = 0;
        for ($i = $shift; $i < $size; $i++) {
            $arr2[$j] = $arr[$i];
            $j++;
        }
        return $this->findMissingPositive($arr, $size);
    }
    
   public function stringsequence(Request $request){
    $alphabet = [
        'a' => 1,
        'b' => 2,
        'c' => 3,
        'd' => 4,
        'e' => 5,
        'f' => 6,
        'g' => 7,
        'h' => 8,
        'i' => 9,
        'j' => 10,
        'k' => 11,
        'l' => 12,
        'm' => 13,
        'n' => 14,
        'o' => 15,
        'p' => 16,
        'q' => 17,
        'r' => 18,
        's' => 19,
        't' => 20,
        'u' => 21,
        'v' => 22,
        'w' => 23,
        'x' => 24,
        'y' => 25,
        'z' => 26,
    ];
   $input_string = str_split($request->input_string); 
   $len=count($input_string)-1;
   $result = 0;
   for($i = $len; $i >= 0; $i--){
      $index = $len-$i;
      $result += $alphabet[$input_string[$i]]*(26**$index);
   }
   return $result;
   }

}
