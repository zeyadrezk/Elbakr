<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Http\Request;

trait Notification
{
    public function Notification($request)
    {
        $users = User::all(); // Retrieve all users

        foreach ($users as $user) {
            $notification = new \App\Models\Notification();
            $notification->type = 'default';
            $notification->notifiable_type = $request->notifiable_type ?? "broadcast"; // Set your notification type here
            $notification->data = [
                'title' => $request->title,
                'body' => $request->input('body'),
            ];
            $notification->notifiable_id = $user->id;
            $notification->date = today();
            $notification->save();
        }

        $serverKey = 'AAAAM2pz5tk:APA91bEwjnVahb8ftmB1eMUVw4UJTV2kGzkTJqWP3s3lmK1k3S0z2ITQCRoG-eha-bxsg3apjCrUuRgHva8F_tpV-PitEXSbx4dFGpf3dXSYgKMK4yH1ywZiBTeZAFEOe9n__ePp-O4I';
        $FcmToken = User::whereNotNull('fcm_token')->pluck('fcm_token')->toArray();
        $url = 'https://fcm.googleapis.com/fcm/send';


        $data = [
            "registration_ids" => $FcmToken,
            "notification" => [
                "title" => $request->title,
                "body" => $request->body,
            ]
        ];
        $encodedData = json_encode($data);

        $headers = [
            'Authorization:key=' . $serverKey,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        // Close connection
        curl_close($ch);

        return 1;
    }

    public function UserNotification(Request $request)
    {
        $user = User::findOrFail($request->user_id); // Assuming you have the $user_id
        $notification = new \App\Models\Notification();
        $notification->type = $request->notifiable_type ?? "broadcast";
        $notification->notifiable_type = "broadcast"; // Set your notification type here
        $notification->data = [
            'title' => $request->title,
            'body' => $request->input('body'),
        ];
        $notification->date = today();
        $notification->notifiable_id = $user->id; // Set your notification type her
        $notification->save(); // Set your notification type her

        $url = 'https://fcm.googleapis.com/fcm/send';
        $userName = $user->name;
        $FcmTokens = User::where('id', $request->user_id)->whereNotNull('fcm_token')->pluck('fcm_token')->toArray();

        $serverKey = 'AAAAM2pz5tk:APA91bEwjnVahb8ftmB1eMUVw4UJTV2kGzkTJqWP3s3lmK1k3S0z2ITQCRoG-eha-bxsg3apjCrUuRgHva8F_tpV-PitEXSbx4dFGpf3dXSYgKMK4yH1ywZiBTeZAFEOe9n__ePp-O4I';

        $data = [
            "registration_ids" => $FcmTokens, // Wrap $FcmToken in an array
            "notification" => [
                "title" => $request->title ?? 'Notification',
                "body" => $request['body'],
            ]
        ];
        $encodedData = json_encode($data);

        $headers = [
            'Authorization:key=' . $serverKey,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        $result = 1;
        // Close connection
        curl_close($ch);
        $resultArray = json_decode($result, true);

        return $result;
    }


}
