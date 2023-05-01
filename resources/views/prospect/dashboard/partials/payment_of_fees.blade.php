{{-- <form action="{{ route('razorpay.payment.store') }}" method="POST" >
    @csrf --}}
    <script src="https://checkout.razorpay.com/v1/checkout.js"
            data-key="{{ env('RAZORPAY_KEY') }}"
            data-amount="1000"
            data-buttontext="Pay 10 INR"
            data-name="ItSolutionStuff.com"
            data-description="Rozerpay"
            data-image="https://www.itsolutionstuff.com/frontTheme/images/logo.png"
            data-prefill.name="name"
            data-prefill.email="email"
            data-theme.color="#ff7529">
    </script>
{{-- </form> --}}