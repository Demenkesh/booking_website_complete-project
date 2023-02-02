<?php

namespace App\Console\Commands;

// use Log;
use Illuminate\Support\Carbon;
use App\Models\Staffdepartment;
use Illuminate\Console\Command;

class Paymentupdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'payment:stautsupdate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Payment stauts update';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // return Command::SUCCESS;
        $currentDate = Carbon::now()->format('Y-m-d');
        $allpayment = Staffdepartment::where('status',1)->get();
        foreach( $allpayment as $staffdepartments){
            $userDate = Carbon::parse($staffdepartments->created_at);
            $month = $userDate ->diffInMonths( $currentDate );
            if($month > 0){
                Staffdepartment::where('id',$staffdepartments->id)->update(['status'=>0]);
            }
            \Log::info($month);
        }
    }
}
