<?php
/**
 * vcf 通信录文件 操作类
 *  author liuzailin@ldework.com
 */
 


/**
  * vcf 中编码 
  *Encode/Decode Quoted Printable utf-8
  * @param unknown_type $input
  * @param unknown_type $line_max
  * @param unknown_type $subject
  * @return unknown
  */ 
 function quoted_printable_encode4iy($input, $line_max = 75, $subject) { 
        /**    The Quoted Printable encodes only with 75 characters per ligne. 
        *    For encoding the subject of message, we must split the subject every 58 characters, 
        *    because of adding =?iso-8859-1?Q? at the beginning and ?= at the end of each split. 

            *    @param    string        $input            string to encode 
            *    @param    int        $line_max            max number of char per ligne 
            *    @param    string        $subject            specify if we encode a subject or any other string 

            *    @access    public 
            */ 
        $hex = array('0','1','2','3','4','5','6','7', 
                            '8','9','A','B','C','D','E','F'); 
        $lines = preg_split("/(?:\r\n|\r|\n)/", $input); 
        $linebreak = "\r\n"; 
        /* the linebreak also counts as characters in the mime_qp_long_line 
        * rule of spam-assassin */ 
        $line_max = $line_max - strlen($linebreak); 
        $escape = "="; 
        $output = ""; 
        $cur_conv_line = ""; 
        $length = 0; 
        $whitespace_pos = 0; 
        $addtl_chars = 0; 

        // iterate lines 
        for ($j=0; $j<count($lines); $j++) { 
            $line = $lines[$j]; 
            $linlen = strlen($line); 

            // iterate chars 
            for ($i = 0; $i < $linlen; $i++) { 
                $c = substr($line, $i, 1); 
                $dec = ord($c); 

                $length++; 

                if ($dec == 32) { 
                    // space occurring at end of line, need to encode 
                    if (($i == ($linlen - 1))) { 
                        $c = "=20"; 
                        $length += 2; 
                    } 

                    $addtl_chars = 0; 
                    $whitespace_pos = $i; 
                } else if ( ($dec == 61) || ($dec < 32 ) || ($dec > 126) ) { 
                    $h2 = floor($dec/16); $h1 = floor($dec%16); 
                    $c = $escape . $hex["$h2"] . $hex["$h1"]; 
                    $length += 2; 
                    $addtl_chars += 2; 
                } 

                // length for wordwrap exceeded, get a newline into the text 
                if ($length >= $line_max) { 
                    $cur_conv_line .= $c; 

                    // read only up to the whitespace for the current line 
                    $whitesp_diff = $i - $whitespace_pos + $addtl_chars; 

                    /* the text after the whitespace will have to be read 
                    * again ( + any additional characters that came into 
                    * existence as a result of the encoding process after the whitespace) 
                    * 
                    * Also, do not start at 0, if there was *no* whitespace in 
                    * the whole line */ 
                    if (($i + $addtl_chars) > $whitesp_diff) { 
                        if ($subject == "subject") { 
                            $output .= "=?ISO-8859-1?Q?".substr($cur_conv_line, 0, 
                                    (strlen($cur_conv_line) - $whitesp_diff))."?="; 
                        } else { 
                            $output .= substr($cur_conv_line, 0, 
                                    (strlen($cur_conv_line) - $whitesp_diff)).$linebreak; 
                        } 
                        $i = $i - $whitesp_diff + $addtl_chars; 
                    } else { 
                    /* emit continuation --mirabilos */ 
                        if ($subject == "subject") { 
                            $output .= "=?ISO-8859-1?Q?".$cur_conv_line."?="; 
                        } else { 
                            $output .= $cur_conv_line. '=' . $linebreak; 
                        } 
                    } 

                    $cur_conv_line = ""; 
                    $length = 0; 
                    $whitespace_pos = 0; 
                } else { 
                // length for wordwrap not reached, continue reading 
                    $cur_conv_line .= $c; 
                } 
            } // end of for 

            $length = 0; 
            $whitespace_pos = 0; 
            if ($subject == "subject") { 
                $output .= "=?ISO-8859-1?Q?".$cur_conv_line."?="; 
            } else { 
                $output .= $cur_conv_line; 
                if ($j<=count($lines)-1) { 
                    $output .= $linebreak; 
                } 
            } 
            $cur_conv_line = ""; 

            } // end for 

        return trim($output); 
    } 

   
?>