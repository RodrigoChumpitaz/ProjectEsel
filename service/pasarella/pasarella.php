<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <script src="https://www.paypal.com/sdk/js?client-id=AWUR1Vo9ZRAMNbLXXSLE58x4IM2XmtjRTdBB3l9Wj7C0Hjc9KR2ngNafxYtMcV5SEnGRrKYjQJt5A1n3"> 
    </script> -->
</head>
<script src="https://www.paypal.com/sdk/js?client-id=AWUR1Vo9ZRAMNbLXXSLE58x4IM2XmtjRTdBB3l9Wj7C0Hjc9KR2ngNafxYtMcV5SEnGRrKYjQJt5A1n3&currency=USD"> 
    </script>
<body>
    <div id="paypal-button-container">
    </div>

    <script>
        paypal.Buttons({ 
            style:{
                color:'blue',
                shape:'pill',
                label:'pay'
            },
            createOrder:function(data,actions){
                return actions.order.create({
                    purchase_units:[{
                        amount:{
                            value: 100
                        }
                    }]
                });
            },
            onApprove: function(data,actions){
                actions.order.capture().then(function(detalles){
                    // console.log(detalles)
                    window.location.href="/service/pruebas/completado.html"
                });
            },

            onCancel:function(data){
                alert("Pago cancelado");
                console.log(data)
            }
         }).render('#paypal-button-container')
    </script>
    
</body>
</html>