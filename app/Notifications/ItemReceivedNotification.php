class ItemReceivedNotification extends Notification
{
    protected $item;
    protected $sender;

    public function __construct(Item $item, User $sender)
    {
        $this->item = $item;
        $this->sender = $sender;
    }

    public function toArray($notifiable)
    {
        return [
            'message' => 'لقد استلمت ' . $this->item->name . ' من ' . $this->sender->name,
            'item_id' => $this->item->id,
            'sender_id' => $this->sender->id,
        ];
    }
} 