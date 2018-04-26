<?php

class File{

    /**
     * [outputHTML description]
     * @param  [type] $path  [description]
     * @param  array  $words [description]
     * @return [type]        [description]
     */
    public static function outputHTML($path, $words = [])
    {
        if(self::is_file($path)){
            $output = "";
            ob_start();
            include($path);
            $output .= ob_get_contents();
            ob_end_clean();
            return self::changeContentKeyWords($output, $words);
        }else{
            die("File not exist ".$path);
            return false;
        }
    }

    /**
     * [changeContentKeyWords description]
     * @param  [type] $content [description]
     * @param  array  $words   [description]
     * @return [type]          [description]
     */
    public static function changeContentKeyWords($content, $words=[])
    {
        if(empty($words)){
            return $content;
        }
        foreach ($words AS $key => $value){
            $content = str_replace("{{" . $key . "}}", $value, $content);
        }
        return $content;
    }

    public static function is_file($path)
    {
        return file_exists($path);
    }    
}