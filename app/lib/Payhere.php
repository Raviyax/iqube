<?php
class Payhere
{
    // Payment to purchase premium for a student
    public function premium( $cno, $address, $city, $fname, $lname)
    {
        $amount = 1000;
        $merchant_id = '1226057'; // Replace your Merchant ID
        // $merchant_secret = 'NDgyNjY3NzExMjgxODQyMDAyNTIxMDQ5Nzg3MzY3MDE5NDEyNQ=='; iqube.me
        $merchant_secret = 'NDAxNDY2NzkyMDIwMjk5NTg3MDQxMjc1NjI3OTQwMjA5ODU4MDQyOQ=='; 
        $return_url = URLROOT.'/student/profile'; // Replace with your Return URL
        $cancel_url = URLROOT.'/cancel'; // Replace with your Cancel URL
        $notify_url = URLROOT.'/student/purchase_premium'; // Replace with your Notify URL
        $first_name = $fname;
        $last_name = $lname;
        $email = $_SESSION['USER_DATA']['email'];
        $phone = $cno;
        $address = $address;
        $city = $city;
        $country = 'Sri Lanka';
        $order_id = $_SESSION['USER_DATA']['student_id'];
        $items = 'IQube Premium for a student';
        $currency = 'LKR';
        $mode = 'sandbox'; // sandbox or live
        $hash = strtoupper(
            md5(
                $merchant_id . 
                $order_id . 
                number_format($amount, 2, '.', '') . 
                $currency .  
                strtoupper(md5($merchant_secret)) 
            ) 
        );
        $payhere_args = array(
            'merchant_id' => $merchant_id,
            'return_url' => $return_url,
            'cancel_url' => $cancel_url,
            'notify_url' => $notify_url,
            'order_id' => $order_id,
            'items' => $items,
            'currency' => $currency,
            'amount' => number_format($amount, 2, '.', ''),
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'city' => $city,
            'country' => $country,
            'hash' => $hash,
            'mode' => $mode
        );
        return json_encode($payhere_args);
    }

    public function purchase_material($cno, $address, $city, $fname, $lname,$amount,$items){

        $merchant_id = '1226057'; // Replace your Merchant ID
        // $merchant_secret = 'NDgyNjY3NzExMjgxODQyMDAyNTIxMDQ5Nzg3MzY3MDE5NDEyNQ=='; iqube.me
        $merchant_secret = 'NDAxNDY2NzkyMDIwMjk5NTg3MDQxMjc1NjI3OTQwMjA5ODU4MDQyOQ=='; 
        $return_url = URLROOT.'/student/profile'; // Replace with your Return URL
        $cancel_url = URLROOT.'/cancel'; // Replace with your Cancel URL
        $notify_url = URLROOT.'/student/purchase_video'; // Replace with your Notify URL
        $first_name = $fname;
        $last_name = $lname;
        $email = $_SESSION['USER_DATA']['email'];
        $phone = $cno;
        $address = $address;
        $city = $city;
        $country = 'Sri Lanka';
        $order_id = $_SESSION['USER_DATA']['student_id'];
        $currency = 'LKR';
        $mode = 'sandbox'; // sandbox or live
        $hash = strtoupper(
            md5(
                $merchant_id . 
                $order_id . 
                number_format($amount, 2, '.', '') . 
                $currency .  
                strtoupper(md5($merchant_secret)) 
            ) 
        );
        $payhere_args = array(
            'merchant_id' => $merchant_id,
            'return_url' => $return_url,
            'cancel_url' => $cancel_url,
            'notify_url' => $notify_url,
            'order_id' => $order_id,
            'items' => $items,
            'currency' => $currency,
            'amount' => number_format($amount, 2, '.', ''),
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'city' => $city,
            'country' => $country,
            'hash' => $hash,
            'mode' => $mode
        );
        return json_encode($payhere_args);


    }
    public function verify_payment($data){
        $md5sig = $data['md5sig'];
        //locally generated hash
        $local_md5sig = strtoupper(md5(
            $data['merchant_id'] .
            $data['order_id'] .
            $data['payhere_amount'] .
            $data['payhere_currency'] .
            $data['status_code'] .
            strtoupper(md5('MjI0ODQ4MjI1MTY5NjI4Njg2MDI1MzkyOTcxMDcyMDA5MzcyNjI4'))
        ));
        if ($local_md5sig == $md5sig) {
            return $data['status_code'];
        }
        else{
            return false;
        }
    }
}
?>
