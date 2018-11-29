<?
function mlpl ($string) {
    $longestWordLength = 0;
    $longestWord = '';
    $charRemove = array(',', '!', '?', '.', ';', '"', '\'', '(', ')');
    $words  = explode(' ', $string);

    foreach ($words as $word) {
        $word = str_replace($charRemove, '', $word);
        if (strlen($word) > $longestWordLength) {
            $longestWordLength = strlen($word);
            $longestWord = $word;
        }
     }
     
    return $longestWord;
}


echo mlpl(htmlspecialchars($_GET['phrase']));