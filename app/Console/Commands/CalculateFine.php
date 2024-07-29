<?php

namespace App\Console\Commands;

use App\Models\AssignBook;
use App\Models\Fine;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CalculateFine extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fines:calculate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Daily calculate and update fine information in database';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $issuedBooks = AssignBook::all();
        foreach ($issuedBooks as $issued_book) {
            $fine = Fine::where('user_id', $issued_book->user_id)
                ->where('book_id', $issued_book->book_id)
                ->first();

            $today = Carbon::now();
            $endDate = Carbon::parse($issued_book->end_date);

            $countOverdueDays = $today->diffInDays($endDate);
            $overdueDays = -number_format($countOverdueDays);

            $totalFine = $overdueDays * 100;

            if ($endDate < $today) {
                if (!$fine) {
                    $fine = new Fine();
                    $fine->user_id = $issued_book->user_id;
                    $fine->book_id = $issued_book->book_id;
                    $fine->overdue_days = $overdueDays;
                    $fine->total_amount = $totalFine;
                    $fine->save();
                } elseif ($fine && $fine->status === 'unpaid') {
                    if ($fine->overdue_days != $overdueDays) {
                        $fine->overdue_days = $overdueDays;
                        $fine->total_amount = $totalFine;
                        $fine->update();
                    }
                }
            }
        }
    }
}
