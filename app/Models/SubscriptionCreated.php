<?php

namespace App\Models;

use Illuminate\Notifications\Notification;
use NotificationChannels\MicrosoftTeams\MicrosoftTeamsChannel;
use NotificationChannels\MicrosoftTeams\MicrosoftTeamsMessage;

class SubscriptionCreated extends Notification
{
    public function via($notifiable)
    {
        return [MicrosoftTeamsChannel::class];
    }

    public function toMicrosoftTeams($notifiable)
    {
        return MicrosoftTeamsMessage::create()
            ->to(config('services.microsoft_teams.webhook_url'))
            ->type('success')
            ->title('Subscription Created')
            ->content('Yey, you got a **new subscription**. Maybe you want to contact him if he needs any support?')
            ->button('Check User', 'https://foo.bar/users/123');
    }
}