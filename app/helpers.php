function shortWord($words, $wordlength){
    if(strlen($words) >= $wordlength){
        $myword = substr($words, 0, $wordlength)."...  ";
        return $myword;
    } else{
        return $words;
    }
}