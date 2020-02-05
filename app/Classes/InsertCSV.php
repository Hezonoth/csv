<?php
namespace App\Classes;

class InsertCSV
{

    public function insert($file ="app\Classes\options.txt",$table="exchanges_data"){

        if (($f = fopen($file, "r")) !== FALSE) 
        {
          $skip = true;
          $keys = array();

          // Convert each line into the local $data variable
          while (($data = fgetcsv($f, 1000, ",")) !== FALSE) 
          {		
            if($skip){
                //Skip first row and save it as keys
                $keys = $data;
                $skip = false;
                continue;
            }

            $insertableData = array();

            for($i=0; $i<= count($keys,1) -1; $i++){
                   $insertableData[$keys[$i]] = $data[$i];
            }

            $insertableData['Trade_date'] = \DateTime::createFromFormat('m/d/Y', $insertableData['Trade_date']);
            $insertableData['Option_expiration'] = \DateTime::createFromFormat('m/d/Y', $insertableData['Option_expiration']);

            \DB::table($table)->insert($insertableData);
          }
          // Close the file
          unset($insertableData);
          fclose($f);
        }
    }
}

/*  Keys
    [0] => Symbol
    [1] => Exchange
    [2] => Company_name
    [3] => Trade_date
    [4] => Trade_time
    [5] => Option_trade_price
    [6] => Trade_size
    [7] => Trade_exchange
    [8] => Trade_condition
    [9] => Option_symbol
    [10] => Option_expiration
    [11] => Price_strike
    [12] => Call_Put
    [13] => Style
    [14] => Bid_price
    [15] => Bid_time
    [16] => Bid_size
    [17] => Bid_exchange
    [18] => Ask_price
    [19] => Ask_time
    [20] => Ask_size
    [21] => Ask_exchange
    [22] => Underlying_bid_price
    [23] => Underlying_bid_time
    [24] => Underlying_ask_price
    [25] => Underlying_ask_time
    [26] => Underlying_last_price
    [27] => Underlying_last_time
*/