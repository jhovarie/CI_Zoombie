<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class BarikCrypt {

    public function encrypt($strsource) {
        $encrypted = "";
        for ($i = 0; $i < strlen($strsource); $i++) {
            $encrypted .= $this->encrypt2($strsource[$i]);
        }
        return $encrypted;
    }

    private function encrypt2($strsource) {
        $result = "";
        if (" " == $strsource) {
            $result = str_replace(" ", "Hv6B3l", $strsource);
        }
        if ("A" == $strsource) {
            $result = str_replace("A", "aFM8t0", $strsource);
        }
        if ("B" == $strsource) {
            $result = str_replace("B", "UzYs47", $strsource);
        }
        if ("C" == $strsource) {
            $result = str_replace("C", "gd5SK2", $strsource);
        }
        if ("D" == $strsource) {
            $result = str_replace("D", "h06vKG", $strsource);
        }
        if ("E" == $strsource) {
            $result = str_replace("E", "l2HKm8", $strsource);
        }
        if ("F" == $strsource) {
            $result = str_replace("F", "RwS3j7", $strsource);
        }
        if ("G" == $strsource) {
            $result = str_replace("G", "2Irm3P", $strsource);
        }
        if ("H" == $strsource) {
            $result = str_replace("H", "x49CfK", $strsource);
        }
        if ("I" == $strsource) {
            $result = str_replace("I", "pG8X2x", $strsource);
        }
        if ("J" == $strsource) {
            $result = str_replace("J", "9ApN1i", $strsource);
        }
        if ("K" == $strsource) {
            $result = str_replace("K", "5JIp2e", $strsource);
        }
        if ("L" == $strsource) {
            $result = str_replace("L", "7UnMi9", $strsource);
        }
        if ("M" == $strsource) {
            $result = str_replace("M", "72vrES", $strsource);
        }
        if ("N" == $strsource) {
            $result = str_replace("N", "G4v9Rb", $strsource);
        }
        if ("O" == $strsource) {
            $result = str_replace("O", "72BSva", $strsource);
        }
        if ("P" == $strsource) {
            $result = str_replace("P", "DFg04u", $strsource);
        }
        if ("Q" == $strsource) {
            $result = str_replace("Q", "G9w5tT", $strsource);
        }
        if ("R" == $strsource) {
            $result = str_replace("R", "Bs5Fd0", $strsource);
        }
        if ("S" == $strsource) {
            $result = str_replace("S", "2QzJ7t", $strsource);
        }
        if ("T" == $strsource) {
            $result = str_replace("T", "38TnFq", $strsource);
        }
        if ("U" == $strsource) {
            $result = str_replace("U", "30oKVb", $strsource);
        }
        if ("V" == $strsource) {
            $result = str_replace("V", "5YpzS9", $strsource);
        }
        if ("W" == $strsource) {
            $result = str_replace("W", "E6u3mG", $strsource);
        }
        if ("X" == $strsource) {
            $result = str_replace("X", "6CNa1s", $strsource);
        }
        if ("Y" == $strsource) {
            $result = str_replace("Y", "3J7Gke", $strsource);
        }
        if ("Z" == $strsource) {
            $result = str_replace("Z", "7mCX6a", $strsource);
        }
        if ("a" == $strsource) {
            $result = str_replace("a", "WO8iz1", $strsource);
        }
        if ("b" == $strsource) {
            $result = str_replace("b", "L8wA5j", $strsource);
        }
        if ("c" == $strsource) {
            $result = str_replace("c", "H6Us3u", $strsource);
        }
        if ("d" == $strsource) {
            $result = str_replace("d", "yH05wM", $strsource);
        }
        if ("e" == $strsource) {
            $result = str_replace("e", "MOq0i5", $strsource);
        }
        if ("f" == $strsource) {
            $result = str_replace("f", "4Oo5Iy", $strsource);
        }
        if ("g" == $strsource) {
            $result = str_replace("g", "5gFG0h", $strsource);
        }
        if ("h" == $strsource) {
            $result = str_replace("h", "9kqW2K", $strsource);
        }
        if ("i" == $strsource) {
            $result = str_replace("i", "4fEn9L", $strsource);
        }
        if ("j" == $strsource) {
            $result = str_replace("j", "tw9I1X", $strsource);
        }
        if ("k" == $strsource) {
            $result = str_replace("k", "MXw7h6", $strsource);
        }
        if ("l" == $strsource) {
            $result = str_replace("l", "KG59fw", $strsource);
        }
        if ("m" == $strsource) {
            $result = str_replace("m", "4Uhp5S", $strsource);
        }
        if ("n" == $strsource) {
            $result = str_replace("n", "k38TgQ", $strsource);
        }
        if ("o" == $strsource) {
            $result = str_replace("o", "8qaMG9", $strsource);
        }
        if ("p" == $strsource) {
            $result = str_replace("p", "02FLjq", $strsource);
        }
        if ("q" == $strsource) {
            $result = str_replace("q", "Mh6t2X", $strsource);
        }
        if ("r" == $strsource) {
            $result = str_replace("r", "6FD3dx", $strsource);
        }
        if ("s" == $strsource) {
            $result = str_replace("s", "86YbHn", $strsource);
        }
        if ("t" == $strsource) {
            $result = str_replace("t", "oLs31S", $strsource);
        }
        if ("u" == $strsource) {
            $result = str_replace("u", "T2pj1C", $strsource);
        }
        if ("v" == $strsource) {
            $result = str_replace("v", "7mK5kC", $strsource);
        }
        if ("w" == $strsource) {
            $result = str_replace("w", "i9J8rM", $strsource);
        }
        if ("x" == $strsource) {
            $result = str_replace("x", "xgP2N1", $strsource);
        }
        if ("y" == $strsource) {
            $result = str_replace("y", "X4yDc3", $strsource);
        }
        if ("z" == $strsource) {
            $result = str_replace("z", "szGO07", $strsource);
        }
        if ("0" == $strsource) {
            $result = str_replace("0", "YL0je8", $strsource);
        }
        if ("1" == $strsource) {
            $result = str_replace("1", "4fT0Bx", $strsource);
        }
        if ("2" == $strsource) {
            $result = str_replace("2", "5Ue4sF", $strsource);
        }
        if ("3" == $strsource) {
            $result = str_replace("3", "j24cAQ", $strsource);
        }
        if ("4" == $strsource) {
            $result = str_replace("4", "Z2R3mr", $strsource);
        }
        if ("5" == $strsource) {
            $result = str_replace("5", "Yo94Am", $strsource);
        }
        if ("6" == $strsource) {
            $result = str_replace("6", "1Mnz7E", $strsource);
        }
        if ("7" == $strsource) {
            $result = str_replace("7", "9UKdr8", $strsource);
        }
        if ("8" == $strsource) {
            $result = str_replace("8", "hOUj36", $strsource);
        }
        if ("9" == $strsource) {
            $result = str_replace("9", "hgI13T", $strsource);
        }
        if ("~" == $strsource) {
            $result = str_replace("~", "r2ClX6", $strsource);
        }
        if ("`" == $strsource) {
            $result = str_replace("`", "5Nm3qR", $strsource);
        }
        if ("!" == $strsource) {
            $result = str_replace("!", "M78xGi", $strsource);
        }
        if ("@" == $strsource) {
            $result = str_replace("@", "Hqk1S3", $strsource);
        }
        if ("#" == $strsource) {
            $result = str_replace("#", "O9g3Iz", $strsource);
        }
        if ("$" == $strsource) {
            $result = str_replace("$", "p1O7Er", $strsource);
        }
        if ("%" == $strsource) {
            $result = str_replace("%", "0IQ8ty", $strsource);
        }
        if ("^" == $strsource) {
            $result = str_replace("^", "J5nF7y", $strsource);
        }
        if ("&" == $strsource) {
            $result = str_replace("&", "0dO7Sk", $strsource);
        }
        if ("*" == $strsource) {
            $result = str_replace("*", "T17uYo", $strsource);
        }
        if ("(" == $strsource) {
            $result = str_replace("(", "v69MoG", $strsource);
        }
        if (")" == $strsource) {
            $result = str_replace(")", "D0s6Hu", $strsource);
        }
        if ("-" == $strsource) {
            $result = str_replace("-", "gW05dB", $strsource);
        }
        if ("_" == $strsource) {
            $result = str_replace("_", "lLxA97", $strsource);
        }
        if ("=" == $strsource) {
            $result = str_replace("=", "p8kOK2", $strsource);
        }
        if ("+" == $strsource) {
            $result = str_replace("+", "TAa28u", $strsource);
        }
        if ("{" == $strsource) {
            $result = str_replace("{", "vHa9K5", $strsource);
        }
        if ("[" == $strsource) {
            $result = str_replace("[", "T8Rbj1", $strsource);
        }
        if ("]" == $strsource) {
            $result = str_replace("]", "1Wur0I", $strsource);
        }
        if ("}" == $strsource) {
            $result = str_replace("}", "1er6TH", $strsource);
        }
        if ("|" == $strsource) {
            $result = str_replace("|", "x94QIz", $strsource);
        }
        if ("\\" == $strsource) {
            $result = str_replace("\\", "e5L0Vq", $strsource);
        }
        if (";" == $strsource) {
            $result = str_replace(";", "xI1w8U", $strsource);
        }
        if (":" == $strsource) {
            $result = str_replace(":", "u5BFa6", $strsource);
        }
        if ("\'" == $strsource) {
            $result = str_replace("\'", "rIk57H", $strsource);
        }
        if ("'" == $strsource) {
            $result = str_replace("'", "wfN24V", $strsource);
        }
        if ("\"" == $strsource) {
            $result = str_replace("\"", "1oLq3H", $strsource);
        }
        if ("," == $strsource) {
            $result = str_replace(",", "jqKQ15", $strsource);
        }
        if ("<" == $strsource) {
            $result = str_replace("<", "jp10FW", $strsource);
        }
        if ("." == $strsource) {
            $result = str_replace(".", "rKtG71", $strsource);
        }
        if (">" == $strsource) {
            $result = str_replace(">", "9fsF0A", $strsource);
        }
        if ("/" == $strsource) {
            $result = str_replace("/", "vp05ZD", $strsource);
        }
        if ("?" == $strsource) {
            $result = str_replace("?", "kG3j6X", $strsource);
        }
        return $result;
    }

    public function decrypt($strsource) {
        $space = str_replace("Hv6B3l", " ", $strsource);
        $A = str_replace("aFM8t0", "A", $space);
        $B = str_replace("UzYs47", "B", $A);
        $C = str_replace("gd5SK2", "C", $B);
        $D = str_replace("h06vKG", "D", $C);
        $E = str_replace("l2HKm8", "E", $D);
        $F = str_replace("RwS3j7", "F", $E);
        $G = str_replace("2Irm3P", "G", $F);
        $H = str_replace("x49CfK", "H", $G);
        $I = str_replace("pG8X2x", "I", $H);
        $J = str_replace("9ApN1i", "J", $I);
        $K = str_replace("5JIp2e", "K", $J);
        $L = str_replace("7UnMi9", "L", $K);
        $M = str_replace("72vrES", "M", $L);
        $N = str_replace("G4v9Rb", "N", $M);
        $O = str_replace("72BSva", "O", $N);
        $P = str_replace("DFg04u", "P", $O);
        $Q = str_replace("G9w5tT", "Q", $P);
        $R = str_replace("Bs5Fd0", "R", $Q);
        $S = str_replace("2QzJ7t", "S", $R);
        $T = str_replace("38TnFq", "T", $S);
        $U = str_replace("30oKVb", "U", $T);
        $V = str_replace("5YpzS9", "V", $U);
        $W = str_replace("E6u3mG", "W", $V);
        $X = str_replace("6CNa1s", "X", $W);
        $Y = str_replace("3J7Gke", "Y", $X);
        $Z = str_replace("7mCX6a", "Z", $Y);
        $a = str_replace("WO8iz1", "a", $Z);
        $b = str_replace("L8wA5j", "b", $a);
        $c = str_replace("H6Us3u", "c", $b);
        $d = str_replace("yH05wM", "d", $c);
        $e = str_replace("MOq0i5", "e", $d);
        $f = str_replace("4Oo5Iy", "f", $e);
        $g = str_replace("5gFG0h", "g", $f);
        $h = str_replace("9kqW2K", "h", $g);
        $i = str_replace("4fEn9L", "i", $h);
        $j = str_replace("tw9I1X", "j", $i);
        $k = str_replace("MXw7h6", "k", $j);
        $l = str_replace("KG59fw", "l", $k);
        $m = str_replace("4Uhp5S", "m", $l);
        $n = str_replace("k38TgQ", "n", $m);
        $o = str_replace("8qaMG9", "o", $n);
        $p = str_replace("02FLjq", "p", $o);
        $q = str_replace("Mh6t2X", "q", $p);
        $r = str_replace("6FD3dx", "r", $q);
        $s = str_replace("86YbHn", "s", $r);
        $t = str_replace("oLs31S", "t", $s);
        $u = str_replace("T2pj1C", "u", $t);
        $v = str_replace("7mK5kC", "v", $u);
        $w = str_replace("i9J8rM", "w", $v);
        $x = str_replace("xgP2N1", "x", $w);
        $y = str_replace("X4yDc3", "y", $x);
        $z = str_replace("szGO07", "z", $y);
        $zero = str_replace("YL0je8", "0", $z);
        $one = str_replace("4fT0Bx", "1", $zero);
        $two = str_replace("5Ue4sF", "2", $one);
        $three = str_replace("j24cAQ", "3", $two);
        $four = str_replace("Z2R3mr", "4", $three);
        $five = str_replace("Yo94Am", "5", $four);
        $six = str_replace("1Mnz7E", "6", $five);
        $seven = str_replace("9UKdr8", "7", $six);
        $eight = str_replace("hOUj36", "8", $seven);
        $nine = str_replace("hgI13T", "9", $eight);
        $tilday = str_replace("r2ClX6", "~", $nine);
        $smallquote = str_replace("5Nm3qR", "`", $tilday);
        $exclamation = str_replace("M78xGi", "!", $smallquote);
        $atsign = str_replace("Hqk1S3", "@", $exclamation);
        $sharp = str_replace("O9g3Iz", "#", $atsign);
        $dollar = str_replace("p1O7Er", "$", $sharp);
        $percent = str_replace("0IQ8ty", "%", $dollar);
        $up = str_replace("J5nF7y", "^", $percent);
        $and = str_replace("0dO7Sk", "&", $up);
        $asterisk = str_replace("T17uYo", "*", $and);
        $openparenthesis = str_replace("v69MoG", "(", $asterisk);
        $closeparenthesis = str_replace("D0s6Hu", ")", $openparenthesis);
        $subtract = str_replace("gW05dB", "-", $closeparenthesis);
        $undersscore = str_replace("lLxA97", "_", $subtract);
        $equal = str_replace("p8kOK2", "=", $undersscore);
        $add = str_replace("TAa28u", "+", $equal);
        $opencurlybrace = str_replace("vHa9K5", "{", $add);
        $openbraket = str_replace("T8Rbj1", "[", $opencurlybrace);
        $closebraket = str_replace("1Wur0I", "]", $openbraket);
        $closecurlybrace = str_replace("1er6TH", "}", $closebraket);
        $orsign = str_replace("x94QIz", "|", $closecurlybrace);
        $backslash = str_replace("e5L0Vq", "\\", $orsign);
        $colon = str_replace("xI1w8U", ";", $backslash);
        $semicolon = str_replace("u5BFa6", ":", $colon);
        $singlequotation = str_replace("rIk57H", "'", $semicolon);
        $doublequotation = str_replace("1oLq3H", "\"", $singlequotation);
        $comma = str_replace("jqKQ15", ",", $doublequotation);
        $lessthan = str_replace("jp10FW", "<", $comma);
        $period = str_replace("rKtG71", ".", $lessthan);
        $greaterthan = str_replace("9fsF0A", ">", $period);
        $slash = str_replace("vp05ZD", "/", $greaterthan);
        $questionmark = str_replace("kG3j6X", "?", $slash);
        $qutationnobackslash = str_replace("wfN24V", "'", $questionmark);
        return $qutationnobackslash;
    }

}
