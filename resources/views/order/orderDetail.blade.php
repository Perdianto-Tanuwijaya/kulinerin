<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Detail</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #DECEB0ff;
            min-height: 100vh;
        }
        .back-button {
            color: #000; 
            text-decoration: none; 
            display: inline-flex;
            align-items: center;
            margin-bottom: 1rem;
            font-size: 1rem;
            padding: 10px 20px;
            background-color: #D67B47ff; 
            border-radius: 5px;
            transition: background-color 0.3s ease, transform 0.2s ease; 
            cursor: pointer;
        }

        .back-button i {
            margin-right: 8px; 
        }

        /* Hover effect */
        .back-button:hover {
            background-color: rgb(237, 131, 70); 
            /* transform: translateY(-2px);  */
        }

        /* Active effect when clicked */
        .back-button:active {
            background-color: rgb(194, 78, 11); 
            /* transform: translateY(2px);  */
        }

        /* .back-button:hover {
            color: rgb(159, 105, 74);
        } */
        .back-button i {
            margin-right: 0.5rem;
        }
        .main-container {
            padding: 2rem;
            background-color: #DECEB0ff;
            min-height: 100vh;
            
        }
        .section-title {
            font-size: 1.75rem;
            font-weight: 500;
            /* margin-bottom: 1.5rem; */
        }
        .line-content{
            border: 1px solid #dee2e6;
            border-radius: 4px;
            /* padding: 0rem 1rem 1rem 1rem; */
        }
        .reservation-box {
            padding: 0rem 1rem 1rem 1rem;
            /* margin-bottom: rem; */
        }
        .menu-box {
            border: 1px solid #dee2e6;
            border-radius: 4px;
            margin-bottom: 1rem;
            
        }
        .menu-table {
            margin-bottom: 0;
            background-color: #DECEB0ff
        }
        .menu-table th {
            padding: 1rem;
            border-bottom: 1px solid #dee2e6;
            background-color: #DECEB0ff;
        }
        .menu-table td {
            padding: 1rem;
            background-color: #DECEB0ff;
        }
        .total-row {
            border-top: 1px solid #dee2e6;
        }
        .main-content {
            flex: 1;
            margin-right: 1.5rem;
        }
        .payment-sidebar {
            width: 40%;
            /* height: 100%; */
            /* height: 500px; */
        }
        .total-amount {
            font-size: 2rem;
            text-align: center;
            padding: 1.5rem;
            /* background-color: #fff; */
            background-color: #DECEB0ff;
            border: 1px solid #dee2e6;
            border-radius: 4px;
            margin-bottom: 1rem;
        }
        .payment-method {
            /* background-color: #fff; */
            background-color: #DECEB0ff;
            padding: 1rem;
            border: 1px solid #dee2e6;
            border-radius: 4px;
            margin-bottom: 1rem;
        }
        .pay-button {
            width: 100%;
            padding: 1rem;
            font-size: 1.25rem;
            background-color: #D67B47ff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        @media (max-width: 768px) {
            .order-content {
                flex-direction: column;
            }
            .main-content {
                margin-right: 0;
                margin-bottom: 1.5rem;
            }
            .payment-sidebar {
                width: 100%;
            }
            .main-container {
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="main-container">
        <button class="back-button" onclick="goBack()">
            <i class="fas fa-arrow-left"></i>
            Back
        </button>
        <div class="border border-dark rounded">
            <h1 class="section-title text-center" style="padding: 1rem 1rem 0.5rem 1rem;">Order detail</h1>
            {{-- <hr class="border border-dark rounded"> --}}
            <hr style="border: 1px solid black;">
            <div class="d-flex order-content" style="padding: 0rem 1rem 0.5rem 1rem;">
                <div class="main-content">
                    <div class="line-content" style="margin-bottom: 1rem;">
                        <h2 class="h5 mb-1" style="padding: 1rem 1rem 0rem 1rem;">Table</h2>
                        <hr style="color: #FFF">
                        <div class="reservation-box">
                            <p class="mb-2">You are making a reservation for</p>
                            <p class="mb-2" >{{ $guestInfo }}</p>
                            <p class="mb-2">At {{ $restaurantName }} ({{ $restaurantCity }}) on</p>
                            <p class="mb-2">{{ $reservationInfo }}</p>
                        </div>
                    </div>
    
                    <!-- orderdetail.blade.php -->
                    <div class="menu-box">
                        <table class="table menu-table">
                            <thead>
                                <tr>
                                    <th>Menu</th>
                                    <th style="width: 100px;" class="text-center">Qty</th>
                                    <th style="width: 150px;" class="text-end">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orderData as $item)
                                    <tr>
                                        <td>{{ $item['menuName'] }}</td>
                                        <td class="text-center">{{ $item['qty'] }}</td>
                                        <td class="text-end">{{ number_format($item['priceTotal'], -2) }}</td>
                                    </tr>
                                @endforeach
                                <tr class="total-row">
                                    <td colspan="2"><strong>Total</strong></td>
                                    <td class="text-end"><strong>{{ number_format($grandTotal, -2) }}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
    
                <div class="payment-sidebar">
                    <h4 class="text-center p-1">Payment Summary</h4>
                    <div class="total-amount">
                        {{ number_format($grandTotal, -2) }}
                    </div>
    
                    <div class="payment-method d-flex justify-content-between align-items-center">
                        <div class="col-4">
                            <span>Payment Method</span>
                        </div>
                        <div class="col-4 text-center">
                            <span>QRIS</span>
                        </div>
                    </div>
    
                    <button class="pay-button">
                        Pay Now
                    </button>
                </div>
            </div>
        </div>        
    </div>
</body>
<script>
    function goBack() {
    if (window.history.length > 1) {
        window.history.back(); 
    } else {
        window.location.href = "/"; 
    }
}
</script>
</html>