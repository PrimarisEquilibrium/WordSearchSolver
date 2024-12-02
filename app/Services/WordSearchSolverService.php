<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

class WordSearchSolverService {
    public static function elementAdd(array $pos, array $direction) : array {
        // Add direction to current position
        return [
            $pos[0] + $direction[0],
            $pos[1] + $direction[1]
        ];
    }

    public static function findWord(string $word, array $word_search) : array {
        $arr_word = str_split(strtolower($word));

        $UP = [-1, 0];
        $DOWN = [1, 0];
        $LEFT = [0, -1];
        $RIGHT = [0, 1];
        $TOPLEFT = [-1, -1];
        $TOPRIGHT = [-1, 1];
        $BOTTOMLEFT = [1, -1];
        $BOTTOMRIGHT = [1, 1];        
        $DIRS = [$UP, $DOWN, $LEFT, $RIGHT, $TOPLEFT, $TOPRIGHT, $BOTTOMLEFT, $BOTTOMRIGHT];

        for ($r = 0; $r < count($word_search); $r++) {
            for ($c = 0; $c < count($word_search); $c++) {

                // Letter in array doesn't match with the initial letter of the word to find
                if (strtolower($arr_word[0]) !== strtolower($word_search[$r][$c])) {
                    continue;
                }

                $pos = [$r, $c];
                foreach ($DIRS as &$DIR) {

                    $matched_positions = [$pos]; // Positions that match chars
                    $count = 1; // The count of matched chars
                    $cur_pos = $pos; // The state of the current position

                    while (true) {

                        // The word was successfully found
                        if ($count == strlen($word)) {
                            return $matched_positions;
                        }

                        // Move the current position using the current direction
                        $cur_pos = WordSearchSolverService::elementAdd($cur_pos, $DIR);

                        // In bounds
                        if (
                            $cur_pos[0] >= 0 && $cur_pos[0] <= count($word_search) && 
                            $cur_pos[1] >= 0 && $cur_pos[1] <= count($word_search)
                        ) {
                            // Decompose x and y coordinate from current position
                            $cur_pos_r = $cur_pos[0];
                            $cur_pos_c = $cur_pos[1];
                            
                            // Get the characters from the word and word search for comparison
                            $word_search_letter_at_pos = $word_search[$cur_pos_r][$cur_pos_c];
                            $word_letter_at_pos = $word[$count];

                            // If the chars match then add its position to the matched chars array
                            if (strtolower($word_search_letter_at_pos) == strtolower($word_letter_at_pos)) {
                                array_push($matched_positions, $cur_pos);
                                $count++;
                            } else {
                                break;
                            }
                        } else {
                            break;
                        }
                    }
                }
            }
        }

        return [];
    }
}

?>