Pe-N15
=====

Encoding scheme for converting text to... a different output.

For each byte convert the 0-255 value to 8=D~, where the value is 8x(count ='s) + count(~)'s

## Converting

### byte -> Pe-N15:

    equals = floor(byte/8)
    tildes = byte % 8

### Pe-N15 -> bytes:

    byte = 8*equals + tildes
