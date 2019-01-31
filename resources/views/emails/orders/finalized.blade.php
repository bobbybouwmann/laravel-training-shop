@component('mail::message')
# Hi,

Your order with number [{{ $order->id }}] has been finalized and will be processed soon.

@component('mail::button', ['url' => route('orders.show', $order->id)])
Show my order
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
