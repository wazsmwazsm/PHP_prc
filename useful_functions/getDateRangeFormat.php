<?php

function getDateRangeFormat($startDate, $endDate, $format = 'Ymd', $orderBy = 'asc')
{
    $startDate = strtotime($startDate);
    $endDate   = strtotime($endDate);
    
    $dateRange = [];
    $i = 0;
    while (($date = $startDate + $i * 86400) <= $endDate) {
        $dateRange[] = date($format, $date);
        $i++;
    }
    
    if ($orderBy == 'desc') {
        $dateRange = array_reverse($dateRange);
    }

    return $dateRange;
}

var_dump(getDateRangeFormat('2019-02-09', '2019-02-13', 'Ymd'));
var_dump(getDateRangeFormat('2019-02-09', '2019-02-13', 'Y m d', 'desc'));
