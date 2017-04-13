<?php 

final class BitField
{
    public static function has($bitfield, $bit): bool {
        return ($bitfield & $bit) > 0;
    }

    public static function add($bitfield, $bit): int {
        return $bitfield | $bit;
    }

    public static function remove($bitfield, $bit): int {
        return $bitfield & ~$bit;
    }
}
