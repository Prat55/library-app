 <?php

    use Carbon\Carbon;

    function counter($end_date)
    {
        $now = Carbon::now()->diffForHumans();
        $end = $end_date->diffForHumans();
        $return_in = $now - $end;

        return $return_in;
    }

    ?>
