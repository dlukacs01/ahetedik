<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Utility extends Model
{
    //

    public static function position_update($old_pos, $new_pos, $objects) {
        if($new_pos > $old_pos) { // from 2 to 6, move down
            foreach($objects as $object) {
                $current_pos = $object->position;
                if($current_pos > $old_pos && $current_pos <= $new_pos) {
                    $current_pos--;
                    $object->position = $current_pos;
                    $object->save();
                }
            }
        }

        if($new_pos < $old_pos) { // from 6 to 2, move up
            foreach($objects as $object) {
                $current_pos = $object->position;
                if($current_pos >= $new_pos && $current_pos < $old_pos) {
                    $current_pos++;
                    $object->position = $current_pos;
                    $object->save();
                }
            }
        }
    }
}
