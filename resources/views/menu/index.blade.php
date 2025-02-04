<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Menu | {{$restaurants->restaurantName}}</title>
    <link rel="icon" href="{{ asset('asset/kulinerinLogo.png') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    .card img {
        height: 200px;
        object-fit: cover;
    }
    
    .nav-pills .nav-link {
        color: #333;
    }
    
    .nav-pills .nav-link.active {
        background-color: #007bff;
    }
    .card_style{
        height: 200px; 
        border-radius: 20px;
    }
    .image_style{
        height: 198px;
        width: 172px;
        border-radius: 20px 0px 0px 20px;
    }
</style>
@extends('master.masterCustomer')
@section('content')
<body class="bg-light">
    <div class="container mt-4">
        <ul class="nav nav-pills">
            {{-- <li class="nav-item">
                <a class="nav-link" href="#appetizer">Appetizer</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="#main-courses">Main Courses</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#desert">Desert</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#beverages">Beverages</a>
            </li> --}}

            <p class="reservation-text" id="guest-info"></p>
            <input type="hidden" id="hidden-guest-info" name="guest_info">
            <input type="hidden" id="hidden-restaurant-name" name="restaurant_name">
            <input type="hidden" id="hidden-restaurant-city" name="restaurant_city">
            <input type="hidden" id="hidden-reservation-info" name="reservation_info">

            <li class="nav-item ms-auto">
                <button class="btn btn-primary" onclick="detailOrder()">Go to cart</button>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="container my-4">

        <h2 class="mb-4">Appetizer</h2>
        <div class="row g-4">
            @foreach ($appetizer as $appetizerMenu)
            <div class="col-md-4">
                <div class="card h-100 card_style">
                    <div class="row g-0">
                        <div class="col-5 image_style">
                            <img src="{{ asset($appetizerMenu->menuImage) }}" class="img-fluid h-100 object-fit-cover image_style" alt="Menu Image">
                        </div>
                        <div class="col-7">
                            <div class="card-body">
                                <h5 class="card-title" id="menuName">{{ $appetizerMenu->menuName }}</h5>
                                <p class="card-text small">{{ $appetizerMenu->description }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span id="menuPrice" class="fw-bold">{{ $appetizerMenu->menuPrice }}</span>
                                    <div class="quantity-container">
                                        <button class="btn btn-outline-secondary plus-initial" type="button">+</button>
                                        <div class="input-group input-group-sm quantity-selector d-none" style="width: 100px;">
                                            <button class="btn btn-outline-secondary minus-btn" type="button">-</button>
                                            <input type="text" class="form-control text-center quantity-value" id="{{$appetizerMenu}}_qty" >
                                            <button class="btn btn-outline-secondary plus-btn" type="button">+</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <h2 class="mb-4 mt-5">Main Courses</h2>
        <div class="row g-4">
            @foreach ($mainCourses as $mainCoursesMenu)
            <div class="col-md-4">
                <div class="card h-100 card_style">
                    <div class="row g-0">
                        <div class="col-5 image_style">
                            <img src="{{ asset($mainCoursesMenu->menuImage) }}" class="img-fluid h-100 object-fit-cover image_style" alt="Menu Image">
                        </div>
                        <div class="col-7">
                            <div class="card-body">
                                <h5 class="card-title" id="menuName">{{ $mainCoursesMenu->menuName }}</h5>
                                <p class="card-text small">{{ $mainCoursesMenu->description }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span id="menuPrice" class="fw-bold">{{ $mainCoursesMenu->menuPrice }}</span>
                                    <div class="quantity-container">
                                        <button class="btn btn-outline-secondary plus-initial" type="button">+</button>
                                        <div class="input-group input-group-sm quantity-selector d-none" style="width: 100px;">
                                            <button class="btn btn-outline-secondary minus-btn" type="button">-</button>
                                            <input type="text" class="form-control text-center quantity-value" id="{{$mainCoursesMenu}}_qty" >
                                            <button class="btn btn-outline-secondary plus-btn" type="button">+</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <h2 class="mb-4 mt-5">Deserts</h2>
        <div class="row g-4">
            @foreach ($dessert as $dessertMenu)
            <div class="col-md-4">
                <div class="card h-100 card_style">
                    <div class="row g-0">
                        <div class="col-5 image_style">
                            <img src="{{ asset($dessertMenu->menuImage) }}" class="img-fluid h-100 object-fit-cover image_style" alt="Menu Image">
                        </div>
                        <div class="col-7">
                            <div class="card-body">
                                <h5 class="card-title" id="menuName">{{ $dessertMenu->menuName }}</h5>
                                <p class="card-text small">{{ $dessertMenu->description }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span id="menuPrice" class="fw-bold">{{ $dessertMenu->menuPrice }}</span>
                                    <div class="quantity-container">
                                        <button class="btn btn-outline-secondary plus-initial" type="button">+</button>
                                        <div class="input-group input-group-sm quantity-selector d-none" style="width: 100px;">
                                            <button class="btn btn-outline-secondary minus-btn" type="button">-</button>
                                            <input type="text" class="form-control text-center quantity-value" id="{{$dessertMenu}}_qty" >
                                            <button class="btn btn-outline-secondary plus-btn" type="button">+</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>


        <h2 class="mb-4 mt-5">Beverages</h2>
        <div class="row g-4">
            @foreach ($beverages as $beverageMenu)
            <div class="col-md-4">
                <div class="card h-100 card_style">
                    <div class="row g-0">
                        <div class="col-5 image_style">
                            <img src="{{ asset($beverageMenu->menuImage) }}" class="img-fluid h-100 object-fit-cover image_style" alt="Menu Image">
                        </div>
                        <div class="col-7">
                            <div class="card-body">
                                <h5 class="card-title" id="menuName">{{ $beverageMenu->menuName }}</h5>
                                <p class="card-text small">{{ $beverageMenu->description }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span id="menuPrice" class="fw-bold">{{ $beverageMenu->menuPrice }}</span>
                                    <div class="quantity-container">
                                        <button class="btn btn-outline-secondary plus-initial" type="button">+</button>
                                        <div class="input-group input-group-sm quantity-selector d-none" style="width: 100px;">
                                            <button class="btn btn-outline-secondary minus-btn" type="button">-</button>
                                            <input type="text" class="form-control text-center quantity-value" id="{{$beverageMenu}}_qty" >
                                            <button class="btn btn-outline-secondary plus-btn" type="button">+</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Use URLSearchParams to get the query parameters from the URL
        const urlParams = new URLSearchParams(window.location.search);
        
        // Retrieve the parameters from the URL
        const guestInfo = urlParams.get('guest_info');
        const reservationInfo = urlParams.get('reservation_info');
        const restaurantName = urlParams.get('restaurant_name');
        const restaurantCity = urlParams.get('restaurant_city');
        
        // You can now do something with these values, like displaying them on the page
        if (guestInfo) {
            document.getElementById('guest-info').textContent = decodeURIComponent(guestInfo);
        }
        if (reservationInfo) {
            document.getElementById('reservation-info').textContent = decodeURIComponent(reservationInfo);
        }
        if (restaurantName) {
            document.getElementById('restaurant-name').textContent = `${decodeURIComponent(restaurantName)} (${decodeURIComponent(restaurantCity)})`;
        }
    });
    function detailOrder() {
        const guestInfo = document.getElementById('hidden-guest-info').value;
        const reservationInfo = document.getElementById('hidden-reservation-info').value;
        const restaurantName = document.getElementById('hidden-restaurant-name').value;
        const restaurantCity = document.getElementById('hidden-restaurant-city').value;
        console.log(restaurantName);
        let orderData = [];
        let grandTotal = 0;
        // Collect all menu items with their qty, name, and price
        document.querySelectorAll('.card').forEach(function(card) {
            let qty = card.querySelector('.quantity-value').value;
            let menuName = card.querySelector('#menuName').textContent;
            let menuPrice = card.querySelector('#menuPrice').textContent;
            let priceTotal = qty*menuPrice;

            if (qty>0){
                orderData.push({
                qty: qty,
                menuName: menuName,
                menuPrice: menuPrice,
                priceTotal: priceTotal
            });
            }
            grandTotal += priceTotal;
        });

        const queryString = `orderData=${encodeURIComponent(JSON.stringify(orderData))}&grandTotal=${grandTotal}&guestInfo=${encodeURIComponent(guestInfo)}&reservationInfo=${encodeURIComponent(reservationInfo)}&restaurantName=${encodeURIComponent(restaurantName)}&restaurantCity=${encodeURIComponent(restaurantCity)}`;

        window.location.href = `{{ route('detailOrder') }}?${queryString}`;
    }


    document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".quantity-container").forEach(container => {
        const initialPlusBtn = container.querySelector(".plus-initial");
        const quantitySelector = container.querySelector(".quantity-selector");
        const minusBtn = container.querySelector(".minus-btn");
        const plusBtn = container.querySelector(".plus-btn");
        const quantityInput = container.querySelector(".quantity-value");
        let count = 0;

        // Show quantity selector when "+" is clicked
        initialPlusBtn.addEventListener("click", function () {
            initialPlusBtn.classList.add("d-none");
            quantitySelector.classList.remove("d-none");
            count++;
            quantityInput.value = count;    
        });

        // Increase quantity
        plusBtn.addEventListener("click", function () {
            count++;
            quantityInput.value = count;
        });

        // Decrease quantity, hide if count goes back to 1
        minusBtn.addEventListener("click", function () {
            if (count > 1) {
                count--;
                quantityInput.value = count;
            } else {
                quantitySelector.classList.add("d-none");
                initialPlusBtn.classList.remove("d-none");
                count = 0; // Reset to 1 when hidden
                quantityInput.value = count;
            }
        });
    });
});

</script>
@endsection
</html>