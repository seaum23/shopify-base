<?php

namespace App\Http\Controllers;

use mysqli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DbController extends Controller
{
    public function insert(Request $request)
    {
        // var_dump(iconv('utf8mb4_unicode_ci','latin1_swedish_ci',  $request->email));
        // var_dump(iconv('utf8mb4_unicode_ci','latin1_swedish_ci',  $request->email));
        $servername = "nvd-main-db-backup.c6wrrkxme5av.us-east-1.rds.amazonaws.com";
        $username = "admin";
        $password = "NVD129##hyi";

        // Create connection
        $conn = new mysqli($servername, $username, $password, "ecomnvd_navidium");

        $result = $conn->query("select * from `nvd_merchants` where `shop_url` = 'final-navidium.myshopify.com' and `nvd_merchants`.`deleted_at` is null");
        // exit(var_dump(serialize(mysqli_real_escape_string($conn, ($request->email)))));
        // $email = ($request->email);
        // $email = ($request->email);
        // $encoded = json_encode(['email' => $email]);
        // $encoded = json_encode($email);
        // $escaped = mysqli_real_escape_string($conn, $encoded);
        // var_dump($escaped);
        var_dump($request);
        exit();

        // $data = DB::insert('insert into nvd_orders_bin_4 (
        // `shop_url`,
        // `order_id`,
        // `order_date`,
        // `order_details`,
        // `line_items`,
        // `customer_details`,
        // `bump_user`,
        // `bump_details`,
        // `created_at`,
        // `updated_at`) values (?, ?,?, ?,?, ?,?, ?,?, ?)', ['rowe-casa.myshopify.com', '530795370930223321111', '2023-07-12 09:24:04', $escaped, $encoded, 'a:3:{s:11:\"customer_id\";s:0:\"\";s:13:\"customer_name\";s:0:\"\";s:14:\"customer_email\";s:22:\"designsbybeth@mail.com\";}', '0', 'a:0:{}', '2023-07-12 14:24:11', '2023-07-12 14:24:11']);
        // DB::update('UPDATE nvd_orders_bin_4 set line_items = ?', [$escaped]);
        $data = DB::table('nvd_orders_bin_4')->orderByDesc('id')->first();
        var_dump((json_decode($data->line_items)));
        // dd(((DB::table('nvd_orders_bin_4')->latest()->first()->line_items)));
        // DB::select('select * from users where active = ?', [1]);
        // $table = $request->table;

        // $insert_statement = "";
        // DB::table($table)->orderBy('id')->chunk(50, function ($data) use (&$insert _statement, $table) {
        //     $columns = implode(',',array_keys(get_object_vars($data[0])));
        //     $insert_statement .= "INSERT INTO `$table` ($columns) values ";
        //     foreach ($data as $item) {
        //         $values = json_encode(array_values(get_object_vars($item)));
        //         $values = ltrim($values, '[');
        //         $values = rtrim($values, ']');

        //         $insert_statement .= "($values),";
        //     }
        //     $insert_statement = rtrim($insert_statement, ',');
        //     $insert_statement .= ";\n\n";
        // });

        // return response($insert_statement);
    }
}
