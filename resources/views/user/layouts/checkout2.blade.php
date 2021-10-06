@extends('auth.layouts.main')
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Ensures optimal rendering on mobile devices. -->
<meta http-equiv="X-UA-Compatible" content="IE=edge" /> <!-- Optimal Internet Explorer compatibility -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<script
    src="https://www.paypal.com/sdk/js?client-id=AWXc5pYLLMM4AGXQKWfHzURQFySm15MFb8uEHhv8bM7Qd_RXAMUKw6s2uY4U5w6ta5lW4LnUrueVbrce">
</script>
@section('breadcrumbs')

<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="{{ route('home') }}">Home<i class="fa fa-arrow-right"></i></a>
                        </li>
                        <li class="active"><a href="{{ route('shop-grid') }}">Shop Grid</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('main-content')

<section class="product-area shop-sidebar shop section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8 col-12">
                <div class="row">
                    <div class="col-12">
                        <h1>Shipping details</h1>
                        <form>
                            <div class="form-group">
                                <label>Phone number *</label>
                                <input required type="number" name="phone" class="form-control p_input">
                            </div>
                            <div class="form-group">
                                <label>Address *</label>
                                <input required type="text" name="state" class="form-control p_input"
                                    placeholder="State">
                            </div>
                            <div class="form-group">
                                <input required type="text" name="city" class="form-control p_input" placeholder="City">
                            </div>
                            <div class="form-group">
                                <input required type="text" name="street" class="form-control p_input"
                                    placeholder="Street">
                            </div>
                            <div class="form-group">
                                <input required type="text" name="zip_code" class="form-control p_input"
                                    placeholder="Postal Code">
                            </div>
                            <div id="paypal-button"></div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

<script>
    var products = JSON.parse(localStorage.getItem('cart'));
    if (products.length == 0) {
        history.go(-1);
    }
    var totalPrice = 0;
    for (let product of products) {
        totalPrice = totalPrice + (product.product.price * product.quantity)
    }

    var orderData = {
        amount: {
            currency_code: 'USD',
            value: totalPrice,
            breakdown: {
                item_total: {
                    currency_code: 'USD',
                    value: totalPrice,
                },
            },
        },
        items: [],
    };
    for (let product of products) {
        orderData.items.push({
            name: product.product.name,
            unit_amount: {
                currency_code: 'USD',
                value: product.product.price,
            },
            quantity: product.quantity,
        })
    }

    paypal.Buttons({
        createOrder: function (data, actions) {
            // This function sets up the details of the transaction, including the amount and line item details.
            return actions.order.create({
                purchase_units: [orderData],
            });
        },
        onApprove: function (data, actions) {
            orderData = orderData.customerData = [{
                    total_price: 180,
                    address: {
                        phone: $('input[name=phone]').val(),
                        state: $('input[name=state]').val(),
                        city: $('input[name=city]').val(),
                        street: $('input[name=street]').val(),
                        zip_code: $('input[name=zip_code]').val(),
                    }
                }

            ];
            return fetch('/capture-order', {
                method: 'post',
                headers: {
                    'content-type': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                body: JSON.stringify({
                    orderID: data.orderID,
                    orderData: orderData
                })
            })
        }
    }, ).render("#paypal-button")
</script>