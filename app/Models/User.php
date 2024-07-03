<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Property;
use App\Models\Booking;
use App\Models\Review;
use App\Models\Message;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relationships
    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function sentMessages()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }

    public function receivedMessages()
    {
        return $this->hasMany(Message::class, 'receiver_id');
    }

    // Methods
    public function bookProperty(Property $property, $startDate, $endDate)
    {
        if ($property->availability) {
            $booking = Booking::create([
                'user_id' => $this->id,
                'property_id' => $property->id,
                'start_date' => $startDate,
                'end_date' => $endDate,
                'total_price' => $property->price * (strtotime($endDate) - strtotime($startDate)) / (60 * 60 * 24)
            ]);

            $property->availability = false;
            $property->save();

            return $booking;
        }

        return null;
    }

    public function leaveReview(Property $property, $reviewText, $rating)
    {
        return Review::create([
            'user_id' => $this->id,
            'property_id' => $property->id,
            'review' => $reviewText,
            'rating' => $rating,
        ]);
    }

    public function sendMessage(User $receiver, $messageText)
    {
        return Message::create([
            'sender_id' => $this->id,
            'receiver_id' => $receiver->id,
            'message' => $messageText,
        ]);
    }

    public function addProperty($title, $description, $location, $price, $availability)
    {
        return Property::create([
            'user_id' => $this->id,
            'title' => $title,
            'description' => $description,
            'location' => $location,
            'price' => $price,
            'availability' => $availability,
        ]);
    }

    public function updateProfile($name, $email, $password = null)
    {
        $this->name = $name;
        $this->email = $email;

        if ($password) {
            $this->password = bcrypt($password);
        }

        $this->save();

        return $this;
    }

    public function getBookings()
    {
        return $this->bookings()->with('property')->get();
    }

    public function getReceivedMessages()
    {
        return $this->receivedMessages()->with('sender')->get();
    }
}
