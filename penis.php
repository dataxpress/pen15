<?php

// for each byte
// convert the 0-255 value to 8=D~, where the value is 8x(count ='s) + count(~)'s

// byte -> penis:
//  equals = floor(byte/8)
//  tildes = byte%8

// penis -> bytes:
//  byte = 8*equals + tildes

function bytesToPenis($bytes)
{
    $output = "";
    for($i=0; $i<strlen($bytes); $i++)
    {
        $byte = ord($bytes[$i]);
        $equals = floor($byte/8);
        $tildes = $byte%8;
        $output .= "8";
        $output .= str_repeat("=",$equals);
        $output .= "D";
        $output .= str_repeat("~",$tildes);
    }
    return $output;
}

function penisToBytes($penis)
{
    $chars = split("8",$penis);
    $output = "";
    foreach($chars as $char)
    {
        if(strlen($char) > 0)
        {
            $parts = split("D",$char);
            $equals = strlen($parts[0]);
            $tildes = strlen($parts[1]);
            $byteval = $equals*8 + $tildes;
            $output .= chr($byteval);
        }
    }
    return $output;
}

$input = "";

if(isset($_GET['output']))
{
    $input = penisToBytes($_GET['output']);
}

$output = "";
if(isset($_GET['input']))
{
    $output = bytesToPenis($_GET['input']);
}


?>

<form action='penis.php' method='get'>
    Input plain text: <input type='text' name='input' value='<?php echo htmlspecialchars($input, ENT_QUOTES); ?>' />
    <input type='submit' value='go' />
</form>


<form action='penis.php' method='get'>
    Input Pe-N15-encoded data: <br><textarea type='text' name='output' rows=5 cols=40><?php echo $output; ?></textarea>
    <br><input type='submit' value='go' />

</form>
