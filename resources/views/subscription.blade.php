<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Subscription Details</div>
                    <div class="card-body">
                        @if ($subscription->active == true)
                        <p><strong>Subscription Status:</strong> {{ $subscription->active ? 'Active' : 'Inactive' }}</p>

                            <p><strong>Start Date:</strong> {{ $subscription->start_date }}</p>
                            <p><strong>End Date:</strong> {{ $subscription->end_date }}</p>
                            @if ($timeLeft)
                                <p>Remaining subscription time: {{ $timeLeft }} days</p>
                            @else
                                <p>Your subscription has expired. Please renew your subscription.</p>
                            @endif
                            <form action="{{ route('subscription.update', $subscription->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-primary">Extend Subscription by 30 Days</button>
                            </form>
                            <br>
                            <a href="/">HOME</a>
                            @else
                        <p>You don't have an active subscription. Please subscribe to access the game content.</p>
                        <form action="{{ route('subscription.extend') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="card_number">Card Number:</label>
                                <input type="text" id="card_number" name="card_number" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="expiration_date">Expiration Date:</label>
                                <input type="text" id="expiration_date" name="expiration_date" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="cvv">CVV:</label>
                                <input type="text" id="cvv" name="cvv" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Extend Subscription by 30 Days</button>
                        </form>                        
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
