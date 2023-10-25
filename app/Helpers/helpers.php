<?php


if (!function_exists("is_in_api")) {
    function is_in_api($request) {
        return $request->expectsJson() ? true : false;
    }
}


if (!function_exists("get_most_repeateds")) {
    function get_most_repeateds($model) {
        $values = [
        ];
        $models = $model::lazy();

        foreach ($models as $entry) {
            if (array_key_exists($entry->book->id, $values)) {
                $values[$entry->book->id]['name'] = $entry->book->name;
                $values[$entry->book->id]['count'] += 1;
            } else {
                $values[$entry->book->id]['count'] = 1;
                $values[$entry->book->id]['name'] = $entry->book->name;
            }
        }

        function sort_most_callback($a, $b) {
            if ($a['count'] == $b['count']) {
                return 0;
            }
            return $a['count'] > $b['count'] ? -1:1;
        }
        usort($values, "sort_most_callback");

        return array_slice($values, 0, 8);
    }
}


if (!function_exists("get_less_repeateds")) {
    function get_less_repeateds($model) {
        $values = [
        ];
        $models = $model::lazy();

        foreach ($models as $entry) {
            if (array_key_exists($entry->book->id, $values)) {
                $values[$entry->book->id]['name'] = $entry->book->name;
                $values[$entry->book->id]['count'] += 1;
            } else {
                $values[$entry->book->id]['count'] = 1;
                $values[$entry->book->id]['name'] = $entry->book->name;
            }
        }

        function sort_less_callback($a, $b) {
            if ($a['count'] == $b['count']) {
                return 0;
            }
            return $a['count'] < $b['count'] ? -1:1;
        }
        usort($values, "sort_less_callback");

        return array_slice($values, 0, 8);
    }
}