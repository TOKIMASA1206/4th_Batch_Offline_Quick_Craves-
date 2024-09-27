<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PointPurchaseUpdate implements ShouldQueue
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public int $purchaseId; // orderIdをpurchaseIdに変更
    public array $paymentInfo;
    public string $paymentMethod;

    /**
     * Create a new event instance.
     *
     * @param int $purchaseId
     * @param array $paymentInfo
     * @param string $paymentMethod
     */
    public function __construct($purchaseId,$paymentInfo,$paymentMethod)
    {
        $this->purchaseId = $purchaseId;
        $this->paymentInfo = $paymentInfo;
        $this->paymentMethod = $paymentMethod;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
