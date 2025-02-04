<?php

namespace App\Http\Controllers;

use App\Mail\ReceiptMail;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use App\Models\Receipt;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function booking(Request $request)
    {
        // dd($request);
        $request->validate([
            'guest' => 'required|string|max:255',
            'reservationDate' => 'required',
            'reservationTime' => 'required',
        ]);

        $booking = new Reservation();
        $booking->guest = $request->guest;
        $booking->reservationDate = $request->reservationDate;
        $booking->reservationTime = $request->reservationTime;
        $booking->reservationStatus = 'PENDING';
        $booking->bookingCode = 'NER' . strtoupper(bin2hex(random_bytes(4))) . '-' . 'IN' . time();
        $booking->save();

        $reservationData = [
            'id' => $booking->id,
            'bookingCode' => $booking->bookingCode,
            'reservationDate' => $booking->reservationDate,
            'reservationTime' => $booking->reservationTime,
            'guest' => $request->guest,
            'username' => auth()->user()->username,
        ];

        if (auth()->check()) {
            Mail::to(auth()->user()->email)->send(new ReceiptMail($reservationData));
        } else {
            return Redirect::back()->with('error', 'Reservation Failed');
        }
        // Redirect back with a success message
        return Redirect::back()->with('success', 'Your reservation has been made and details sent to your email!');
        compact('booking');
    }
    public function detailOrder(Request $request) {
        $orderData = json_decode($request->input('orderData'), true);
        // dd($orderData);
        $grandTotal = $request->input('grandTotal');

        $guestInfo = $request->input('guestInfo'); // Guest info
        $reservationInfo = $request->input('reservationInfo'); // Reservation info
        $restaurantName = $request->input('restaurantName'); // Restaurant name
        $restaurantCity = $request->input('restaurantCity'); // Restaurant city
        // $restaurants = Restaurant::find($request);
        // dd($grandTotal);
        return view('order.orderDetail', compact('orderData', 'grandTotal', 'guestInfo', 'reservationInfo', 'restaurantName', 'restaurantCity'));
    }    
}
