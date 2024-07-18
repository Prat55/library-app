<?php

use App\Models\Fine;
use Carbon\Carbon;

function finecalculation($issuedBookId, $userId, $issuedBookEndDate)
{
    $fine = Fine::where('user_id', $userId)
        ->where('book_id', $issuedBookId)
        ->first();

    $today = Carbon::now();
    $endDate = Carbon::parse($issuedBookEndDate);

    $countOverdueDays = $today->diffInDays($endDate);
    $overdueDays = -number_format($countOverdueDays);

    $totalFine = $overdueDays * 100;

    if ($endDate < $today) {
        if (!$fine && $fine->status != 'paid') {
            $fine = new Fine();
            $fine->user_id = $userId;
            $fine->book_id = $issuedBookId;
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
