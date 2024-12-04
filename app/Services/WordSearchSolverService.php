<?php

namespace App\Services;

class WordSearchSolverService {
    
    /**
     * Determines if a word exists in a word search puzzle grid, if so,
     * return the coordinates of all the matching characters
     * @param string $word The word to find.
     * @param array<string> $word_search The N by M word search grid.
     * @return array The coordinates of the matching characters (row, column); otherwise empty array.
     */
    public static function findWord(string $word, array $word_search) : array {
        $word = strtolower($word);
        $rows = count($word_search);
        $cols = strlen($word_search[0]);

        // Possible word checking directions
        $DIRS = [
            [-1, 0],  // UP
            [1, 0],   // DOWN
            [0, -1],  // LEFT
            [0, 1],   // RIGHT
            [-1, -1], // TOPLEFT
            [-1, 1],  // TOPRIGHT
            [1, -1],  // BOTTOMLEFT
            [1, 1]    // BOTTOMRIGHT
        ];

        for ($r = 0; $r < $rows; $r++) {
            for ($c = 0; $c < $cols; $c++) {

                // Letter in array doesn't match with the initial letter of the word to find
                if ($word[0] !== strtolower($word_search[$r][$c])) {
                    continue;
                }

                $pos = [$r, $c];
                foreach ($DIRS as $DIR) {

                    $matched_positions = [$pos]; // Positions that match chars
                    $match_char_count = 1; // The count of matched chars
                    $cur_pos = $pos; // The state of the current position

                    while (true) {
                        // The word was successfully found
                        if ($match_char_count == strlen($word)) {
                            return $matched_positions;
                        }

                        // The new row and column after being shifted by the current direction
                        $new_row = $cur_pos[0] + $DIR[0];
                        $new_col = $cur_pos[1] + $DIR[1];
                        $cur_pos = [$new_row, $new_col];

                        // In bounds
                        if (
                            $new_row >= 0 && $new_row <= $rows - 1 && 
                            $new_col >= 0 && $new_col <= $cols - 1
                        ) {
                            // Ensure grid letter is lowercase to prevent the equality check from failing
                            $currentGridLetter = strtolower($word_search[$new_row][$new_col]);
                            $currentWordLetter = $word[$match_char_count];

                            // If the chars match then add its position to the matched chars array
                            if ($currentGridLetter == $currentWordLetter) {
                                array_push($matched_positions, [$new_row, $new_col]);
                                $match_char_count++;
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

        // Return an empty array if no match was found
        return [];
    }
}

?>