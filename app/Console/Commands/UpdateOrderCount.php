<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Shopify\Clients\Rest;
use App\Models\CronDetails;
use Illuminate\Console\Command;

class UpdateOrderCount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:order:count';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates order count';

    public function accTokenReverse($string, $length = 7)
    {

        $position = $length;

        $strlen =  strlen($string);

        $pos = $strlen - $length;

        list($beg_f, $end_f) = preg_split('/(?<=.{'.$pos.'})/', $string, 2);

        list($beg_l, $end_l) = preg_split('/(?<=.{'.$length.'})/', $beg_f, 2);

        return  'shpat_'.$end_l;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $min = new Carbon("2023-08-12 00:00:00");
        $max = new Carbon("2023-08-21 23:59:59");

        CronDetails::where('id', '>', 30)
        ->where('id', '<=', 1100)
        ->chunkById(30, function ($cronDetails) use ($min, $max) {
            foreach ($cronDetails as $cronDetail) {        
                $client = new Rest($cronDetail->shop_url, $this->accTokenReverse($cronDetail->access_token));
                $response = $client->get(path: '/admin/api/2023-07/orders/count.json', query: [
                    'created_at_min' => $min->toIso8601String(),
                    'created_at_max' => $max->toIso8601String(),
                    'status' => 'any'
                ]);
                echo "Fetched order count for: {$cronDetail->shop_url} ({$cronDetail->id})\n";
                $data = json_decode((string)$response->getBody());

                if(isset($data->count)){
                    echo "Updated order count for: {$cronDetail->shop_url} ({$cronDetail->id}) from {$cronDetail->order_count} => {$data->count}\n";
                    $cronDetail->order_count = $data->count;
                    $cronDetail->save();
                }else if(isset($data->errors) AND str_contains($data->errors, 'throttled')){
                    echo "Throttled\n";
                    exit;
                }else{
                    echo "$data->errors\n";
                    echo "Something went wrong!\n";
                }
                echo "\n";
            }

            $delay = 15;
            echo "Delaying for $delay seconds \n\n";
            sleep($delay);
        });
    }
}
