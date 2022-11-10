<x-guest-layout>

    <form action="{{ route('checkout') }}" method="POST">
        @csrf
        <button type="submit">Checkout</button>
    </form>

</x-guest-layout>